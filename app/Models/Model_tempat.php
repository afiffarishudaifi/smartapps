<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_tempat extends Model
{
    protected $table = 't_tempat';
    protected $primaryKey = 'ID_TEMPAT';
    protected $useTimestamps = true;

    public function view_tempat()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_tempat", [
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
        $result = $curl->request("GET", $link . 'M_tempat/show/' . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        // $client = new Client([
        //     'base_uri' => $link,
        // ]);

        // $response = $client->request('POST', $link . 'M_tempat/create', [
        //    'multipart' => [
        //         [
        //             'name'     => 'id_pengguna_apps',
        //             'contents' => $data['id_pengguna_apps']
        //         ],[
        //             'name'     => 'id_kategori_tempat',
        //             'contents' => $data['id_kategori_tempat']
        //         ],[
        //             'name'     => 'nama_tempat',
        //             'contents' => $data['nama_tempat']
        //         ],[
        //             'name'     => 'long_tempat',
        //             'contents' => $data['long_tempat']
        //         ],[
        //             'name'     => 'lat_tempat',
        //             'contents' => $data['lat_tempat']
        //         ],[
        //             'name'     => 'alamat_tempat',
        //             'contents' => $data['alamat_tempat']
        //         ],[
        //             'name'     => 'deskripsi_tempat',
        //             'contents' => $data['deskripsi_tempat']
        //         ],[
        //             'name'     => 'no_telp_tempat',
        //             'contents' => $data['no_telp_tempat']
        //         ],[
        //             'name'     => 'status_tempat',
        //             'contents' => $data['status_tempat']
        //         ]
        //     ]
        // ]);
        // return $response;
        // dd($data);
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('POST', $link . 'M_tempat/create', [
            'form_params' => $data
        ]);
        return $response;
    }

    public function add_data_foto($data)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_tempat/create_foto', [
           'multipart' => [
                [
                    'name'     => 'id_tempat',
                    'contents' => $data['id_tempat']
                ],[
                    'name'     => 'file',
                    'contents' => fopen($data['file'], 'r')
                ],[
                    'name'     => 'nama_file',
                    'contents' => $data['nama_file']
                ]
            ]
        ]);
        return $response;
    }

    public function data_pengguna_apps()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_tempat/data_pengguna_apps", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function data_kategori_tempat()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_tempat/data_kategori_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function data_max_id()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_tempat/data_max_id", [
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
        $response = $curl->request('PUT', $link . 'M_tempat/update/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function delete_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_tempat/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function delete_foto_tempat($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_tempat/delete_foto_tempat/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function data_edit_dropwdown($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_tempat/data_edit_dropwdown/" . $id, [
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
        $result = $curl->request("GET", $link . "M_tempat/detail_data_foto/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
}