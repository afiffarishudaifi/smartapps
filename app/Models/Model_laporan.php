<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_laporan extends Model
{
    protected $table = "t_pengaduan";
    protected $primaryKey = "ID_PENGADUAN";
    protected $useTimestamps = true;

    // ======= PENGADUAN ======= //

    public function view_data($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/index_view/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_kategori($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/data_kategori/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_filter($param, $id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/index_filter/" . $id, [
            'query' => $param,
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

}