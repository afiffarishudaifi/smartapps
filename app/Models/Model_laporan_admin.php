<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_laporan_admin extends Model
{

    // ======= PENGADUAN ======= //

    public function view_data()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/index_view", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_kategori()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/data_kategori", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_filter($param)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/index_filter", [
            'query' => $param,
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_tempat()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/index_view_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_kategori_tempat()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/data_kategori_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_filter_tempat($param)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_laporan/index_filter_tempat", [
            'query' => $param,
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

}