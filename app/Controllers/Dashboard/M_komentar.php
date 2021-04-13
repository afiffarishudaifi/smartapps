<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_komentar;
use App\Models\Model_dashboard;

class M_komentar extends BaseController
{

    protected $Model_komentar;
    public function __construct()
    {
        $this->Model_komentar = new Model_komentar();
        helper('form');
    }

    // ======= KOMENTAR ======= //
    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_komentar();
        $komentar = $model->view_data();
        $data = [
            'judul' => 'Manajemen Komentar',
            'page_header' => 'Manajemen Komentar',
            'panel_title' => 'Tabel Komentar',
            'komentar' => $komentar,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vKomentar', $data);
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
            'judul' => 'Form Tambah Komentar',
            'page_header' => 'Form Tambah Komentar',
            'panel_title' => 'Form Komentar',
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vAddKomentar', $data);
    }

    public function add_komentar()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        helper(['form', 'url']);

        if (!$this->validate([
            'isi_komentar' => 'required',
            'id_pengguna_apps' => 'required',
            'id_tempat' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_komentar/form_tambah'))->withInput()->with('validation', $validation);
        }

        $data = array(
            'isi_komentar'     => $this->request->getVar('isi_komentar'),
            'id_pengguna_apps'     => $this->request->getVar('id_pengguna_apps'),
            'id_tempat'     => $this->request->getVar('id_tempat')
        );
        $model = new Model_komentar();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Dashboard/M_komentar'));
    }

    public function detail_komentar($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_komentar();
        $komentar = $model->detail_data($id);
        $data =
        [
            'judul' => 'Form Ubah Komentar',
            'page_header' => 'Form Ubah Komentar',
            'panel_title' => 'Form Komentar',
            'komentar' => $komentar,
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vUpdateKomentar', $data);
    }

    public function update_komentar()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        helper(['form', 'url']);
        $model = new Model_komentar();
        $id = $this->request->getVar('id_komentar');
        
        if (!$this->validate([
            'isi_komentar' => 'required',
            'id_pengguna_apps' => 'required',
            'id_tempat' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_komentar/detail_komentar' . '/' . $id))->withInput()->with('validation', $validation);
        }

        $data = array(
            'isi_komentar'     => $this->request->getVar('isi_komentar'),
            'id_pengguna_apps'     => $this->request->getVar('id_pengguna_apps'),
            'id_tempat'     => $this->request->getVar('id_tempat'),
            'id_komentar'     => $this->request->getVar('id_komentar')
        );
        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Dashboard/M_komentar'));
    }

    public function delete_komentar()
    {
        $model = new Model_komentar();
        $id = $this->request->getPost('id_komentar');
        $session = session();
        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/smartapps/Dashboard/M_komentar');
    }

    // ====== KOMENTAR ====== //

    // ======= PENGGUNA APPS ======= //

    public function data_apps()
    {
        $model = new Model_komentar();
        $data_apps = $model->view_data_apps();
        $respon = json_decode(json_encode($data_apps), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_PENGGUNA_APPS'];
            $isi['text'] = $value['NAMA_LENGKAP_APPS'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    public function detail_dropdown($id)
    {
        $model = new Model_komentar();
        $dropdown = $model->detail_data_dropdown($id);
        $respon = json_decode(json_encode($dropdown), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_pengguna_apps'] = $value['ID_PENGGUNA_APPS'];
            $isi['nama_lengkap_apps'] = $value['NAMA_LENGKAP_APPS'];
            $isi['id_tempat'] = $value['ID_TEMPAT'];
            $isi['nama_tempat'] = $value['NAMA_TEMPAT'];
        endforeach;
        echo json_encode($isi);
    }

    // ======= PENGGUNA APPS ======= //

    // ======= PENGGUNA TEMPAT ======= //

    public function data_tempat()
    {
        $model = new Model_komentar();
        $data_tempat = $model->view_data_tempat();
        $respon = json_decode(json_encode($data_tempat), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_TEMPAT'];
            $isi['text'] = $value['NAMA_TEMPAT'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }
    // ======= PENGGUNA TEMPAT ======= //
}