<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_dashboard_user extends Model
{
    protected $table = 't_pengaduan';

    public function pengaduan($param)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard", [
            'query' => $param,
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function jumlah_pengajuan_pengaduan($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard/jumlah_pengajuan_pengaduan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function jumlah_penanganan($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard/jumlah_penanganan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function total_pengaduan_terkonfirmasi($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard/total_pengaduan_terkonfirmasi/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_penanganan($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard/total_pengaduan_penanganan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_selesai($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard/total_pengaduan_selesai/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function view_detail_pengaduan($param, $id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("GET", $link . "Dashboard/view_detail_pengaduan/" . $param . '/' . $id, [
            "headers" => [
                "Accept" => "application/json"
            ],
            "query" => $param
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
}