<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_kategori_pengaduan;
use App\Models\Model_dashboard;

class M_kategori_pengaduan extends BaseController
{

    protected $Model_kategori_pengaduan;
    public function __construct()
    {
        $this->Model_kategori_pengaduan = new Model_kategori_pengaduan();
        helper('form');
    }

    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_kategori_pengaduan();
        $Kategori = $model->view_data();
        $data = [
            'judul' => 'Manajemen Kategori Pengaduan',
            'page_header' => 'Manajemen Kategori Pengaduan',
            'panel_title' => 'Tabel Kategori Pengaduan',
            'kategori' => $Kategori,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vKategoriPengaduan', $data);
    }

    public function form_tambah()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        };

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        session();
        $data =
        [
            'judul' => 'Form Tambah Kategori Pengaduan',
            'page_header' => 'Form Tambah Kategori Pengaduan',
            'panel_title' => 'Form Kategori Pengaduan',
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vAddKategoriPengaduan', $data);
    }

    public function add_kategori_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        
        helper(['form', 'url']);
        if (!$this->validate([
            'nama_kategori_pengaduan' => 'required|is_unique[t_kategori_pengaduan.NAMA_KATEGORI_PENGADUAN]',
            'id_web' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_kategori_pengaduan/form_tambah'))->withInput()->with('validation', $validation);
        }

        $data = array(
            'nama_kategori_pengaduan'    => $this->request->getVar('nama_kategori_pengaduan'),
            'id_web'    => $this->request->getVar('id_web')
        );
        $model = new Model_kategori_pengaduan();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Dashboard/M_kategori_pengaduan'));
    }

    public function detail_kategori_pengaduan($id)
    {
        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_kategori_pengaduan();
        $kategori = $model->detail_data($id);
        $data =
            [
                'judul' => 'Form Ubah Kategori Pengaduan',
                'page_header' => 'Form Ubah Kategori Pengaduan',
                'panel_title' => 'Form Kategori Pengaduan',
                'kategori' => $kategori,
                'validation' => \Config\Services::validation(),
                'jml_tempat' => $jumlah_pengajuan_tempat,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan
            ];
        return view('backend/vUpdateKategoriPengaduan', $data);
    }

    public function update_kategori_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        helper(['form', 'url']);
        $model = new Model_kategori_pengaduan();

        // cek nama kategori
        $id = $this->request->getVar('id_kategori_pengaduan');
        $kategori = $model->detail_data($id);
        if($kategori['NAMA_KATEGORI_PENGADUAN'] == $this->request->getVar('nama_kategori_pengaduan')) {
            $rule_kategori = 'required';
        } else {
            $rule_kategori = 'required|is_unique[t_kategori_pengaduan.NAMA_KATEGORI_PENGADUAN]';
        }
        // end cek nama kategori
        
        if (!$this->validate([
            'nama_kategori_pengaduan' => $rule_kategori,
            'id_web' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_kategori_pengaduan/detail_kategori_pengaduan' . '/' . $id))->withInput()->with('validation', $validation);
        }

        $data = array(
            'nama_kategori_pengaduan'    => $this->request->getVar('nama_kategori_pengaduan'),
            'id_web'    => $this->request->getVar('id_web')
        );
        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
        return redirect()->to(base_url('Dashboard/M_kategori_pengaduan'));
    }

    public function delete_kategori_pengaduan()
    {
        $model = new Model_kategori_pengaduan();
        $id = $this->request->getVar('id_kategori');
        $session = session();
        $foreign = $model->cek_foreign($id);
        // dd($foreign);
        if ($foreign == 0) {
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('sukses', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }
        return redirect()->to('/smartapps/Dashboard/M_kategori_pengaduan');
    }

    // ======= KATEGORI PENGADUAN ======= //
    // ======= WEB ======= //

    public function data_web()
    {
        $model = new Model_kategori_pengaduan();
        $data_web = $model->view_data_web();
        $respon = json_decode(json_encode($data_web), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_WEB'];
            $isi['text'] = $value['NAMA_WEB'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    public function detail_web($id_web)
    {
        $model = new Model_kategori_pengaduan();
        $web = $model->detail_data_web($id_web);
        $respon = json_decode(json_encode($web), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_web'] = $value['ID_WEB'];
            $isi['nama_web'] = $value['NAMA_WEB'];
        endforeach;
        echo json_encode($isi);
    }

    // ======= WEB ======= //

}