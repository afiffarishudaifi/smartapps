<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_dashboard;

class Dashboard extends BaseController
{

    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model = new Model_dashboard();
        $id = $session->get('id_login');
        $tanggal = $this->request->getPost('daterange');
        if ($tanggal == null && $tanggal == '') {
            $akhir = date('Y-m-d');
            $awal = date('Y-m-d', strtotime('-30 days', strtotime($akhir)));
            $range = "30 Hari Terakhir";
        } else {
            if ($tanggal) {
                $tgl = explode(' - ', $tanggal);
            }
            if ($tanggal) {
                $awal = date("Y-m-d", strtotime($tgl[0]));
            }
            if ($tanggal) {
                $akhir = date("Y-m-d", strtotime($tgl[1]));
            }
            $range = $awal . ' s/d ' . $akhir;
        }

        $param =
            [
                'id' => $id,
                'awal' => $awal,
                'akhir' => $akhir
            ];
        $data_pengaduan = $model->pengaduan($param);
        $hasil = count($data_pengaduan);
        if ($hasil == 0) {
            $data_pengaduan = array(
                "0" => array(
                    "date(WAKTU_PENGADUAN)" => $awal,
                    "ID_PENGADUAN" => "0"
                ),
                "1" => array(
                    "date(WAKTU_PENGADUAN)" => $akhir,
                    "ID_PENGADUAN" => "0"
                )
            );
        }

        $jumlah_pengajuan_tempat = $model->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan();
        $total_web = $model->total_web();
        $total_tempat_pengajuan = $model->total_tempat_pengajuan();
        $total_tempat_terkonfirmasi = $model->total_tempat_terkonfirmasi();
        $total_pengaduan_ditolak = $model->total_pengaduan_ditolak();
        $total_pengaduan_pengajuan = $model->total_pengaduan_pengajuan();
        $total_pengaduan_terkonfirmasi = $model->total_pengaduan_terkonfirmasi();
        $total_pengaduan_penanganan = $model->total_pengaduan_penanganan();
        $total_pengaduan_selesai = $model->total_pengaduan_selesai();

        $data = [
            'judul' => 'Dashboard',
            'range' => $range,
            'pengaduan' => $data_pengaduan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'total_web' => $total_web,
            'total_tempat_pengajuan' => $total_tempat_pengajuan,
            'total_tempat_terkonfirmasi' => $total_tempat_terkonfirmasi,
            'total_pengaduan_ditolak' => $total_pengaduan_ditolak,
            'total_pengaduan_pengajuan' => $total_pengaduan_pengajuan,
            'total_pengaduan_terkonfirmasi' => $total_pengaduan_terkonfirmasi,
            'total_pengaduan_penanganan' => $total_pengaduan_penanganan,
            'total_pengaduan_selesai' => $total_pengaduan_selesai
        ];
        helper(['form']);
        return view('backend/vDashboard', $data);
    }

    public function jumlah_pengajuan()
    {
        $model = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan();
        $result['total_tempat'] = $jumlah_pengajuan_tempat['ID_TEMPAT'];
        $result['total_pengaduan'] = $jumlah_pengajuan_pengaduan['ID_PENGADUAN'];
        echo json_encode($result);
    }

    public function detail_pengaduan($param)
    {
        $session = session();
        
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
    
        $model = new Model_dashboard();
        $pengaduan = $model->view_detail_pengaduan($param);
        $data = [
            'judul' => 'Pengaduan ' . $param,
            'page_header' => 'Pengaduan ' . $param,
            'panel_title' => 'Pengaduan ' . $param,
            'pengaduan' => $pengaduan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vDetailPengaduan', $data);
    }

    public function detail_tempat($param)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
    
        $model = new Model_dashboard();
        $tempat = $model->view_detail_tempat($param);
        $data = [
            'judul' => 'Tempat ' . $param,
            'page_header' => 'Tempat ' . $param,
            'panel_title' => 'Tempat ' . $param,
            'tempat' => $tempat,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vDetailTempat', $data);
    }

    // public function saveToken($token)
    // {
    //     $session = session();
    //     $model = new Model_dashboard();
    //     $id = $session->get('id_login');
    //     $data = [
    //         'TOKEN' => $token,
    //         'ID_USER' => $id
    //     ];
    //     $data_token = $model->search_token($id);
    //     if($data_token) {
    //         $data = [
    //             'TOKEN' => $token
    //         ];            
    //         $saveToken = $model->updateToken($id, $data);
    //     } else {
    //         $saveToken = $model->saveToken($data);
    //     }
    // }
}