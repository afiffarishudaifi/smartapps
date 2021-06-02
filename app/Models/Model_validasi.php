<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_validasi extends Model
{
    protected $table = 't_tempat';
    protected $primaryKey = 'ID_TEMPAT';
    protected $useTimestamps = true;

    public function view_tempat()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/show/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('PUT', $link . 'M_validasi/update/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function data_edit_dropwdown($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/data_edit_dropwdown/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_foto($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/detail_data_foto/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }


    // begin validasi pengaduan //
    public function view_data_pengaduan()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/index_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_pengaduan($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/show_pengaduan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data_pengaduan($data, $id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
         $curl = \Config\Services::curlrequest();
        $response = $curl->request('POST', $link . 'M_validasi/update_data_pengaduan/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function data_edit_dropwdown_pengaduan($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/data_edit_dropwdown_pengaduan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    // end validasi pengaduan //

}