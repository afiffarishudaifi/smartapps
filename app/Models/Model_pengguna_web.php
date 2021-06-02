<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_pengguna_web extends Model
{
    protected $table = 't_pengguna_web';
    protected $primaryKey = 'ID_WEB';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';

    public function view_data()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengguna_web", [
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
        // dd($data);

        // $curl = \Config\Services::curlrequest();
        // $response = $curl->request('POST', $link . 'M_kategori_pengaduan/create', [
        //     'form_params' => $data
        // ]);

        // $data = [
        //             'username_web' => $data['username_web'],
        //             'password_web' => $data['password_web'],
        //             'nama_web' => $data['nama_web'],
        //             'no_telp_web' => $data['no_telp_web'],
        //             'alamat_web' => $data['alamat_web'],
        //             'email_web' => $data['email_web'],
        //             'file' => new \CURLFile($gambar),
        //             'filename' => $data['filename'],
        //             'namafile' => $data['filename']
        //         ];

        // $data = [
        //             'username_web' => $data['username_web'],
        //             'password_web' => $data['password_web'],
        //             'nama_web' => $data['nama_web'],
        //             'no_telp_web' => $data['no_telp_web'],
        //             'alamat_web' => $data['alamat_web'],
        //             'email_web' => $data['email_web'],
        //             'file' => new \CURLFile($gambar),
        //             'filename' => $data['filename'],
        //             'namafile' => $data['filename']
        //         ];

        $response = $client->request('POST', $link . 'M_pengguna_web/create', [
           'multipart' => [
                [
                    'name'     => 'username_web',
                    'contents' => $data['username_web']
                ],[
                    'name'     => 'password_web',
                    'contents' => $data['password_web']
                ],[
                    'name'     => 'nama_web',
                    'contents' => $data['nama_web']
                ],[
                    'name'     => 'no_telp_web',
                    'contents' => $data['no_telp_web']
                ],[
                    'name'     => 'alamat_web',
                    'contents' => $data['alamat_web']
                ],[
                    'name'     => 'email_web',
                    'contents' => $data['email_web']
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
        // $response = $curl->request('POST', $link . 'M_pengguna_web/create', [
        //     'multipart' => [
        //             'Content-Type' => 'multipart/form-data',
        //             'username_web' => $data['username_web'],
        //             'password_web' => $data['password_web'],
        //             'nama_web' => $data['nama_web'],
        //             'no_telp_web' => $data['no_telp_web'],
        //             'alamat_web' => $data['alamat_web'],
        //             'email_web' => $data['email_web'],
        //             'file' => new \CURLFile($gambar),
        //             'filename' => $data['filename'],
        //             'namafile' => $data['filename']
        //         ]
        // ]);
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengguna_web/show/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil['web'];
    }

     public function detail_data_password($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengguna_web/show/" . $id, [
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
            $response = $curl->request('POST', $link . 'M_pengguna_web/update_data/' . $id, [
                'form_params' => $data
            ]);
            return $response;
        }

        $response = $client->request('POST', $link . 'M_pengguna_web/update_data' . '/' . $id, [
           'multipart' => [
                [
                    'name'     => 'username_web',
                    'contents' => $data['username_web']
                ],[
                    'name'     => 'password_web',
                    'contents' => $data['password_web']
                ],[
                    'name'     => 'nama_web',
                    'contents' => $data['nama_web']
                ],[
                    'name'     => 'no_telp_web',
                    'contents' => $data['no_telp_web']
                ],[
                    'name'     => 'alamat_web',
                    'contents' => $data['alamat_web']
                ],[
                    'name'     => 'email_web',
                    'contents' => $data['email_web']
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
        $response = $curl->request('DELETE', $link . 'M_pengguna_web/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_1($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_pengguna_web/cek_foreign_1/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_2($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('GET', $link . 'M_pengguna_web/cek_foreign_2/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function delete_token($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_pengguna_web/delete_token/' . $id)->getBody();
        return json_decode($response, true);
    }
}