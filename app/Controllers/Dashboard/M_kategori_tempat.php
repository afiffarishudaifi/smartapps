<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_kategori_tempat;
use App\Models\Model_dashboard;

class M_kategori_tempat extends BaseController
{

    protected $Model_kategori_tempat;
    public function __construct()
    {
        $this->Model_kategori_tempat = new Model_kategori_tempat();
        helper('form');
    }

    // ======= KATEGORI TEMPAT ======= //
    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_kategori_tempat();
        $kategori = $model->view_data();
        $data = [
            'judul' => 'Manajemen Kategori Tempat',
            'page_header' => 'Manajemen Kategori Tempat',
            'panel_title' => 'Tabel Kategori Tempat',
            'kategori' => $kategori,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vKategoriTempat', $data);
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
            'judul' => 'Form Tambah Kategori Tempat',
            'page_header' => 'Form Tambah Kategori Tempat',
            'panel_title' => 'Form Kategori Tempat',
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vAddKategoriTempat', $data);
    }

    public function add_kategori_tempat()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        helper(['form', 'url']);

        if (!$this->validate([
            'nama_kategori' => 'required|is_unique[t_kategori_tempat.NAMA_KATEGORI_TEMPAT]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_kategori_tempat/form_tambah'))->withInput()->with('validation', $validation);
        }

        $data = array(
            'nama_kategori'     => $this->request->getVar('nama_kategori')
        );
        $model = new Model_kategori_tempat();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Dashboard/M_kategori_tempat'));
    }

    public function detail_kategori_tempat($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_kategori_tempat();
        $kategori = $model->detail_data($id);
        $data =
            [
                'judul' => 'Form Ubah Kategori Tempat',
                'page_header' => 'Form Ubah Kategori Tempat',
                'panel_title' => 'Form Kategori Tempat',
                'kategori' => $kategori,
                'validation' => \Config\Services::validation(),
                'jml_tempat' => $jumlah_pengajuan_tempat,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan
            ];
        return view('backend/vUpdateKategoriTempat', $data);
    }

    public function update_kategori_tempat()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        helper(['form', 'url']);
        $model = new Model_kategori_tempat();
        
        // cek nama kategori
        $id = $this->request->getVar('id_kategori_tempat');
        $kategori = $model->detail_data($id);
        if($kategori['NAMA_KATEGORI_TEMPAT'] == $this->request->getVar('nama_kategori')) {
            $rule_kategori = 'required';
        } else {
            $rule_kategori = 'required|is_unique[t_kategori_tempat.NAMA_KATEGORI_TEMPAT]';
        }
        // end cek nama kategori
        
        if (!$this->validate([
            'nama_kategori' => $rule_kategori
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_kategori_tempat/detail_kategori_tempat' . '/' . $id))->withInput()->with('validation', $validation);
        }

        $data = array(
            'nama_kategori'     => $this->request->getVar('nama_kategori'),
            'id_kategori'     => $this->request->getVar('id_kategori_tempat')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Dashboard/M_kategori_tempat'));
    }

    public function delete_kategori_tempat()
    {
        $model = new Model_kategori_tempat();
        $id = $this->request->getPost('id_kategori');
        $session = session();
        $foreign = $model->cek_foreign($id);
        if ($foreign == 0) {
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('sukses', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }
        return redirect()->to('/smartapps/Dashboard/M_kategori_tempat');
    }

    // ====== KATEGORI TEMPAT ====== //
}