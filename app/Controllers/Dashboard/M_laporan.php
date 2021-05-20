<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_laporan_admin;
use App\Models\Model_dashboard;

class M_laporan extends BaseController
{

    protected $Model_laporan_admin;
    public function __construct()
    {
        $this->Model_laporan_admin = new Model_laporan_admin();
        helper('form');
    }

    public function laporan_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan();

        $model = new Model_laporan_admin();
        $pengaduan = $model->view_data();
        $data = [
            'judul' => 'Laporan Pengaduan',
            'page_header' => 'Laporan Pengaduan',
            'panel_title' => 'Laporan Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vLaporanPengaduan', $data);
    }

    public function data_kategori()
    {
        $session = session();
        $model = new Model_laporan_admin();
        $data_kategori = $model->view_data_kategori();
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
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        if ($tanggal) $tgl = explode('%20-%20', $tanggal);
        if ($tanggal) $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0]));
        if ($tanggal) $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1]));
        if ($kategori != 'null') $param['id_kategori_pengaduan'] = $kategori;
        if ($status != 'null') $param['status_pengaduan'] = $status;

        $model = new Model_laporan_admin();
        $laporan = $model->view_data_filter($param);

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


    public function laporan_tempat()
    {
        $session = session();
        $id = $session->get('id_login');
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan();

        $model = new Model_laporan_admin();
        $laporan = $model->view_data_tempat($id);
        $data = [
            'judul' => 'Laporan Pengajuan Tempat',
            'page_header' => 'Laporan Pengajuan Tempat',
            'panel_title' => 'Laporan Pengajuan Tempat',
            'laporan' => $laporan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vLaporanTempat', $data);
    }

    public function data_kategori_tempat()
    {
        $session = session();
        $model = new Model_laporan_admin();
        $data_kategori_tempat = $model->view_data_kategori_tempat();
        $respon = json_decode(json_encode($data_kategori_tempat), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_KATEGORI_TEMPAT'];
            $isi['text'] = $value['NAMA_KATEGORI_TEMPAT'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    public function data_tempat($tanggal = null, $kategori = null, $status = null)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        if ($tanggal) $tgl = explode('%20-%20', $tanggal);
        if ($tanggal) $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0]));
        if ($tanggal) $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1]));
        if ($kategori != 'null') $param['id_kategori_tempat'] = $kategori;
        if ($status != 'null') $param['status_tempat'] = $status;

        $model = new Model_laporan_admin();
        $laporan = $model->view_data_filter_tempat($param);

        $respon = $laporan;
        $data = array();

        if ($respon['status'] == 0) {
            foreach ($respon['data'] as $value) {
                $isi['ID_TEMPAT'] = $value['ID_TEMPAT'];
                $isi['NAMA_TEMPAT'] = $value['NAMA_TEMPAT'];
                $isi['ALAMAT_TEMPAT'] = $value['ALAMAT_TEMPAT'];
                $isi['NO_TELP_TEMPAT'] = $value['NO_TELP_TEMPAT'];
                $isi['DESKRIPSI_TEMPAT'] = $value['DESKRIPSI_TEMPAT'];
                $isi['STATUS_TEMPAT'] = $value['STATUS_TEMPAT'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }
}