<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_validasi;
use App\Models\Model_dashboard;
use App\Models\Model_tempat;

class M_validasi_tempat extends BaseController
{
    protected $Model_validasi;
    public function __construct()
    {
        $this->Model_validasi = new Model_validasi();
        helper(['form', 'url']);
    }

    // ======= TEMPAT ======= //

    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_validasi();
        $tempat = $model->view_tempat();
        $data = [
            'judul' => 'Validasi Tempat',
            'page_header' => 'Validasi Tempat',
            'panel_title' => 'Valiadi Tempat',
            'tempat' => $tempat,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vValidasiTempat', $data);
    }

    public function validasi_tempat()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        $id = $this->request->getVar('id_tempat');
        $data = array(
            'status_tempat'   => $this->request->getVar('status_tempat'),
            'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps')
        );

        $model = new Model_validasi();
        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data telah berhasil divalidasi');
        return redirect()->to(base_url('Dashboard/M_validasi_tempat'));
    }

    // ======= TEMPAT ======= //
}