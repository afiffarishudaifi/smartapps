<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_kategori_pengaduan_user extends Model
{
    protected $table = 't_kategori_pengaduan';
    protected $primaryKey = 'ID_KATEGORI_PENGADUAN';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';

    // ======= KATEGORI PENGADUAN ======= //

    public function view_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_kategori_pengaduan/index_view/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('POST', $link . 'M_kategori_pengaduan/create', [
            'form_params' => $data
        ]);
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . 'M_kategori_pengaduan/show/' . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('PUT', $link . 'M_kategori_pengaduan/update/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function delete_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_kategori_pengaduan/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_kategori_pengaduan/cek_foreign/' . $id)->getBody();
        return json_decode($response, true);
    }

    // ======= KATEGORI PENGADUAN ======= //
}