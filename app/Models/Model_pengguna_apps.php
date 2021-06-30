<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_pengguna_apps extends Model
{
    protected $table = 't_pengguna_apps';
    protected $primaryKey = 'ID_PENGGUNA_APPS';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';

    public function view_data()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengguna_apps", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data, $gambar)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        if($gambar != 'docs/admin/assets/img/foto_pengguna_apps/default.png') {
            $response = $client->request('POST', $link . 'M_pengguna_apps/create', [
               'multipart' => [
                    [
                        'name'     => 'ktp',
                        'contents' => $data['ktp']
                    ],[
                        'name'     => 'username',
                        'contents' => $data['username']
                    ],[
                        'name'     => 'password',
                        'contents' => $data['password']
                    ],[
                        'name'     => 'nama_lengkap',
                        'contents' => $data['nama_lengkap']
                    ],[
                        'name'     => 'no_hp',
                        'contents' => $data['no_hp']
                    ],[
                        'name'     => 'alamat',
                        'contents' => $data['alamat']
                    ],[
                        'name'     => 'email',
                        'contents' => $data['email']
                    ],[
                        'name'     => 'file',
                        'contents' => fopen($gambar, 'r'),
                        'filename' => $data['filename']
                    ],[
                        'name'     => 'namafile',
                        'contents' => $data['filename']
                    ]
                ]
            ]);
        } else {
            $curl = \Config\Services::curlrequest();
            $response = $curl->request('POST', $link . 'M_pengguna_apps/create', [
                'form_params' => $data
            ]);
        }
        $hasil = json_decode($response->getbody(), true);
        return $hasil['messages']['success'];
    }

    public function detail_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengguna_apps/show/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['apps'];
    } 

    public function detail_data_password($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengguna_apps/show/" . $id, [
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
        $client = new Client([
            'base_uri' => $link,
        ]);

        if ($data['file'] == '') {
            $curl = \Config\Services::curlrequest();
            $response = $curl->request('POST', $link . 'M_pengguna_apps/update_data/' . $id, [
                'form_params' => $data
            ]);
            return $response;
        }

        $response = $client->request('POST', $link . 'M_pengguna_apps/update_data' . '/' . $id, [
           'multipart' => [
                [
                    'name'     => 'ktp',
                    'contents' => $data['ktp']
                ],[
                    'name'     => 'username',
                    'contents' => $data['username']
                ],[
                    'name'     => 'password',
                    'contents' => $data['password']
                ],[
                    'name'     => 'nama_lengkap',
                    'contents' => $data['nama_lengkap']
                ],[
                    'name'     => 'no_hp',
                    'contents' => $data['no_hp']
                ],[
                    'name'     => 'alamat',
                    'contents' => $data['alamat']
                ],[
                    'name'     => 'email',
                    'contents' => $data['email']
                ],[
                    'name'     => 'file',
                    'contents' => fopen($data['gambar'], 'r'),
                    'filename' => $data['filename']
                ],[
                    'name'     => 'namafile',
                    'contents' => $data['filename']
                ],[
                    'name'     => 'foto',
                    'contents' => $data['foto']
                ]
            ]
        ]);
        return $response;
    }
    
    public function delete_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_pengguna_apps/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_1($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_pengguna_apps/cek_foreign_1/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_2($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_pengguna_apps/cek_foreign_2/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_3($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_pengguna_apps/cek_foreign_3/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function delete_token($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_pengguna_apps/delete_token/' . $id)->getBody();
        return json_decode($response, true);
    }
}