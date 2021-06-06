<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Model_list_pengaduan;

class Pengaduan extends BaseController
{

	public function __construct()
	{
        helper(['form']);
        $this->Model_list_pengaduan = new Model_list_pengaduan();
	}

    public function index()
    {
        // $model = new Model_list_pengaduan();
        // $pengaduan = $model->view_data();

        $data = [
            'judul' => 'Pengaduan | Riwayat Pengaduan Masyarakat',
            // 'pengaduan' => $pengaduan
            'pengaduan' => $this->Model_list_pengaduan->paginate(1, 't_pengaduan'),
            'pager' => $this->Model_list_pengaduan->pager
        ];
        return view('frontend/vListPengaduan', $data);
    }

    public function detail_pengaduan($id)
    {

    }
}