<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;


class Model_frontend extends Model
{

    public function view_data_tempat()
    {
        $link = 'http://localhost:8080/api_smartapps/Frontend/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "Frontend/view_data_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_tempat($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Frontend/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "Frontend/detail_data_tempat/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function view_data_pengaduan()
    {
        $link = 'http://localhost:8080/api_smartapps/Frontend/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "Frontend/view_data_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_pengaduan($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Frontend/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "Frontend/detail_data_pengaduan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
}