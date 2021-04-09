<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Model_validasi_user;
use App\Models\Model_dashboard_user;

class M_validasi extends BaseController
{

    protected $Model_validasi_user;
    public function __construct()
    {
        $this->Model_validasi_user = new Model_validasi_user();
        helper('form');
    }

    public function index()
    {
        $session = session();

        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model_dash = new Model_dashboard_user();
        $id = $session->get('id_login');
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model_dash->jumlah_penanganan($id);

        $model = new Model_validasi_user();
        $pengaduan = $model->view_data_pengaduan();
        $data = [
            'judul' => 'Validasi Pengaduan',
            'page_header' => 'Validasi Pengaduan',
            'panel_title' => 'Validasi Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan
        ];
        return view('user/vValidasiPengaduan', $data);
    }

    public function validasi_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        helper(['form', 'url']);
        $id = $this->request->getVar('id_pengaduan');
        $model = new Model_validasi_user();
        $data = array(
            'status_pengaduan'    => $this->request->getVar('status_pengaduan')
        );
        $model->update_data_pengaduan($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil divalidasi');
        return redirect()->to(base_url('public/User/M_validasi'));
    }

    // begin penanganan
    public function index_penanganan()
    {
        $session = session();

        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model_dash = new Model_dashboard_user();
        $id = $session->get('id_login');
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model_dash->jumlah_penanganan($id);

        $model = new Model_validasi_user();
        $pengaduan = $model->view_data_penanganan();
        $data = [
            'judul' => 'Validasi Pengaduan',
            'page_header' => 'Validasi Pengaduan',
            'panel_title' => 'Validasi Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan
        ];
        return view('user/vValidasiPengaduan', $data);
    }
    // end penanganan
}