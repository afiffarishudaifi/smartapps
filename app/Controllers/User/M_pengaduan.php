<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Model_pengaduan_user;
use App\Models\Model_dashboard_user;

class M_pengaduan extends BaseController
{

    protected $Model_pengaduan_user;
    public function __construct()
    {
        $this->Model_pengaduan_user = new Model_pengaduan_user();
        helper('form');
    }

    public function index()
    {
        $session = session();
        $id = $session->get('id_login');
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);

        $model = new Model_pengaduan_user();
        $pengaduan = $model->view_data($id);
        $data = [
            'judul' => 'Manajemen Pengaduan',
            'page_header' => 'Manajemen Pengaduan',
            'panel_title' => 'Tabel Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan
        ];
        return view('user/vPengaduan', $data);
    }

    public function detail_pengaduan($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $id = $session->get('id_login');
        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);

        $model = new Model_pengaduan_user();
        $pengaduan = $model->detail_data($id);
        $data =
            [
                'judul' => 'Form Ubah Pengaduan',
                'page_header' => 'Form Ubah Pengaduan',
                'panel_title' => 'Form Pengaduan',
                'pengaduan' => $pengaduan,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
                'jml_penanganan' => $jumlah_penanganan
            ];
        return view('user/vUpdatePengaduan', $data);
    }

    public function update_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        if (isset($_POST['edit'])) {
            helper(['form', 'url']);
            $image = \Config\Services::image();
            $model = new Model_pengaduan_user();

            $id = $this->request->getVar('id_pengaduan');
            $data = array(
                'status_pengaduan'    => $this->request->getVar('status_pengaduan')
            );
            $model->update_data($data, $id);
            $session->setFlashdata('sukses', 'Data sudah berhasil Diubah');
            return redirect()->to(base_url('user/M_pengaduan'));
        } else {
            return redirect()->to('user/M_pengaduan');
        }
    }

    // ======= KATEGORI PENGADUAN ======= //
    // ======= DINAS ======= //

    public function data_web()
    {
        $model = new Model_pengaduan_user();
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
    // ======= DINAS ======= //
    // ======= PENGGUNA APPS ======= //

    public function data_pengguna_apps()
    {
        $model = new Model_pengaduan_user();
        $data_pengguna_apps = $model->view_data_pengguna_apps();
        $respon = json_decode(json_encode($data_pengguna_apps), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_PENGGUNA_APPS'];
            $isi['text'] = $value['NAMA_LENGKAP_APPS'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    // ======= PENGGUNA APPS ======= //
    // ======= KATEGORI PENGADUAN ======= //

    public function data_kategori_pengaduan()
    {
        $model = new Model_pengaduan_user();
        $data_kategori_pengaduan = $model->view_data_kategori_pengaduan();
        $respon = json_decode(json_encode($data_kategori_pengaduan), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_KATEGORI_PENGADUAN'];
            $isi['text'] = $value['NAMA_KATEGORI_PENGADUAN'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    // ======= KATEGORI PENGADUAN ======= //

    // ======= DETAIL DROPDOWN ======= //
    public function data_edit_dropdown($id)
    {
        $model = new Model_pengaduan_user();
        $data_dropdown = $model->data_edit_dropwdown($id);
        $respon = json_decode(json_encode($data_dropdown), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_kategori_pengaduan'] = $value['ID_KATEGORI_PENGADUAN_DETAIL'];
            $isi['nama_kategori_pengaduan'] = $value['NAMA_KATEGORI_PENGADUAN'];
            $isi['id_web'] = $value['ID_WEB_DETAIL'];
            $isi['nama_web'] = $value['NAMA_WEB'];
            $isi['id_pengguna_apps'] = $value['ID_PENGGUNA_APPS_DETAIL'];
            $isi['nama_lengkap_apps'] = $value['NAMA_LENGKAP_APPS'];
        endforeach;
        echo json_encode($isi);
    }
    // ======= DETAIL DROPDOWN ======= //

}