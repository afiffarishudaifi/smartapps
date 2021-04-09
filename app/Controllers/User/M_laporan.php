<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Model_laporan;
use App\Models\Model_dashboard_user;

class M_laporan extends BaseController
{

    protected $Model_laporan;
    public function __construct()
    {
        $this->Model_laporan = new Model_laporan();
        helper('form');
    }

    public function index()
    {
        $session = session();
        $id = $session->get('id_login');
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);

        $model = new Model_laporan();
        $laporan = $model->view_data($id);
        $data = [
            'judul' => 'Laporan Pengaduan',
            'page_header' => 'Laporan Pengaduan',
            'panel_title' => 'Tabel Laporan Pengaduan',
            'laporan' => $laporan,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan
        ];
        return view('user/vLaporan', $data);
    }

    public function data_kategori()
    {
        $session = session();
        $id = $session->get('id_login');
        $model = new Model_laporan();
        $data_kategori = $model->view_data_kategori($id);
        $respon = json_decode(json_encode($data_kategori), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_KATEGORI_PENGADUAN'];
            $isi['text'] = $value['NAMA_KATEGORI_PENGADUAN'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    public function data($tanggal = null, $kategori = null, $status = null)
    {
        $session = session();
        $id = $session->get('id_login');
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        if ($tanggal) $tgl = explode('%20-%20', $tanggal);
        if ($tanggal) $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0]));
        if ($tanggal) $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1]));
        if ($kategori != 'null') $param['id_kategori_pengaduan'] = $kategori;
        if ($status != 'null') $param['status_pengaduan'] = $status;

        $model = new Model_laporan();
        $laporan = $model->view_data_filter($param, $id);

        $respon = $laporan;
        $data = array();

        if ($respon['status'] == 0) {
            foreach ($respon['data'] as $value) {
                $isi['ID_PENGADUAN'] = $value['ID_PENGADUAN'];
                $isi['JUDUL_PENGADUAN'] = $value['JUDUL_PENGADUAN'];
                $isi['WAKTU_PENGADUAN'] = date("d-m-Y h:i:s", strtotime($value['WAKTU_PENGADUAN']));
                $isi['ISI_PENGADUAN'] = $value['ISI_PENGADUAN'];
                $isi['STATUS_PENGADUAN'] = $value['STATUS_PENGADUAN'];
                $isi['NAMA_LENGKAP_APPS'] = $value['NAMA_LENGKAP_APPS'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }
}