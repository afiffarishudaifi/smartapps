<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Model_dashboard_user;

class Dashboard extends BaseController
{

    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model = new Model_dashboard_user();
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
                    "WAKTU_PENGADUAN" => $awal,
                    "ID_PENGADUAN" => "0"
                ),
                "1" => array(
                    "WAKTU_PENGADUAN" => $akhir,
                    "ID_PENGADUAN" => "0"
                )
            );
        }

        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);
        $total_pengaduan_terkonfirmasi = $model->total_pengaduan_terkonfirmasi($id);
        $total_pengaduan_penanganan = $model->total_pengaduan_penanganan($id);
        $total_pengaduan_selesai = $model->total_pengaduan_selesai($id);

        $data = [
            'judul' => 'Dashboard',
            'range' => $range,
            'pengaduan' => $data_pengaduan,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan,
            'total_pengaduan_terkonfirmasi' => $total_pengaduan_terkonfirmasi,
            'total_pengaduan_penanganan' => $total_pengaduan_penanganan,
            'total_pengaduan_selesai' => $total_pengaduan_selesai
        ];
        return view('user/vDashboard', $data);
    }

    public function jumlah_pengajuan()
    {
        $session = session();
        $id = $session->get('id_login');
        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $result['total_pengaduan'] = $jumlah_pengajuan_pengaduan['ID_PENGADUAN'];
        echo json_encode($result);
    }

    public function jumlah_penanganan()
    {
        $session = session();
        $id = $session->get('id_login');
        $model = new Model_dashboard_user();
        $jumlah_penanganan = $model->jumlah_penanganan($id);
        $result['total_penanganan'] = $jumlah_penanganan['ID_PENGADUAN'];
        echo json_encode($result);
    }

    public function detail_pengaduan($param)
    {
        $session = session();
        
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $id = $session->get('id_login');
        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);
        $jumlah_ditolak = $model->jumlah_ditolak($id);
    
        $model = new Model_dashboard_user();
        $pengaduan = $model->view_detail_pengaduan($param, $id);
        $data = [
            'judul' => 'Pengaduan ' . $param,
            'page_header' => 'Pengaduan ' . $param,
            'panel_title' => 'Pengaduan ' . $param,
            'pengaduan' => $pengaduan,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan,
            'jml_ditolak' => $jumlah_ditolak
        ];
        return view('user/vDetailPengaduan', $data);
    }
}