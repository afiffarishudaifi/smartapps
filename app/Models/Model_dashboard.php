<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;


class Model_dashboard extends Model
{
    protected $table = 't_pengaduan';

    public function pengaduan($param)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard", [
            "headers" => [
                "Accept" => "application/json"
            ],
            "query" => $param
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function jumlah_pengajuan_tempat()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/jumlah_pengajuan_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function jumlah_pengajuan_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/jumlah_pengajuan_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function total_web()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_web", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_WEB'];
    }

    public function total_tempat_pengajuan()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_tempat_pengajuan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGGUNA_APPS'];
    }

    public function total_tempat_terkonfirmasi()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_tempat_terkonfirmasi", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_TEMPAT'];
    }

    public function total_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_pengajuan()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_pengaduan_pengajuan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_terkonfirmasi()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_pengaduan_terkonfirmasi", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_penanganan()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_pengaduan_penanganan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_selesai()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_pengaduan_selesai", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_ditolak()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/total_pengaduan_ditolak", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function view_detail_pengaduan($param)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();

        $result = $curl->request("get", $link . "Dashboard/view_detail_pengaduan/" . $param, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
}