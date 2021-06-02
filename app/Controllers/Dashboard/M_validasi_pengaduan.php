<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_validasi;
use App\Models\Model_dashboard;
use App\Models\Model_pengaduan;

class M_validasi_pengaduan extends BaseController
{

    protected $Model_validasi;
    public function __construct()
    {
        $this->Model_validasi = new Model_validasi();
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
    
        $model = new Model_validasi();
        $pengaduan = $model->view_data_pengaduan();
        $data = [
            'judul' => 'Validasi Pengaduan',
            'page_header' => 'Validasi Pengaduan',
            'panel_title' => 'Validasi Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vValidasiPengaduan', $data);
    }

    public function detail_pengaduan($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_validasi();
        $pengaduan = $model->detail_data_pengaduan($id);
        $data =
        [
            'judul' => 'Form Ubah Pengaduan',
            'page_header' => 'Form Ubah Pengaduan',
            'panel_title' => 'Form Pengaduan',
            'pengaduan' => $pengaduan,
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vUpdateValidasiPengaduan', $data);
    }

    public function validasi_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        helper(['form', 'url']);
        $id = $this->request->getVar('id_pengaduan');
        $image = \Config\Services::image();
        $model = new Model_validasi();
        $data = array(
            'status_pengaduan'    => $this->request->getVar('status_pengaduan'),
            'id_web'    => $this->request->getVar('id_web'),
            'id_pengaduan' => $id
        );
        
        $model->update_data_pengaduan($data, $id);

        $session->setFlashdata('sukses', 'Data sudah berhasil divalidasi');
        return redirect()->to(base_url('Dashboard/M_validasi_pengaduan'));
    }
    // ======= KATEGORI PENGADUAN ======= //
}