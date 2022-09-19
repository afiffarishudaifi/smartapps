<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_kategori_tempat extends Model
{
    protected $table = 't_kategori_tempat';
    protected $primaryKey = 'ID_KATEGORI_TEMPAT';
    protected $allowedFields = ['NAMA_KATEGORI_TEMPAT'];
    protected $useTimestamps = true;

    public function view_data()
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_kategori_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('POST', $link . 'M_kategori_tempat/create', [
            'form_params' => $data
        ]);
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . 'M_kategori_tempat/show/' . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil[0];
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('PUT', $link . 'M_kategori_tempat/update/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function delete_data($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_kategori_tempat/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_kategori_tempat/cek_foreign/' . $id)->getBody();
        return json_decode($response, true);
    }
}