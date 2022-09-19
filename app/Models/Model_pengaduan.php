<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_pengaduan extends Model
{
    protected $table = "t_pengaduan";
    protected $primaryKey = "ID_PENGADUAN";
    protected $useTimestamps = true;

    // ======= PENGADUAN ======= //

    public function view_data()
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/show/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $client = \Config\Services::curlrequest();
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $avatar = $data['filename'];

        if ($avatar == "") {
            $curl = \Config\Services::curlrequest();
            $response = $curl->request('POST', $link . 'M_pengaduan/create', [
                'form_params' => $data
            ]);
            return $response;
        }

        $response = $client->request('POST', $link . 'M_pengaduan/create', [
           'multipart' => [
                [
                    'name'     => 'id_pengguna_apps',
                    'contents' => $data['id_pengguna_apps']
                ],[
                    'name'     => 'id_web',
                    'contents' => $data['id_web']
                ],[
                    'name'     => 'id_kategori_pengaduan',
                    'contents' => $data['id_kategori_pengaduan']
                ],[
                    'name'     => 'judul_pengaduan',
                    'contents' => $data['judul_pengaduan']
                ],[
                    'name'     => 'isi_pengaduan',
                    'contents' => $data['isi_pengaduan']
                ],[
                    'name'     => 'waktu_pengaduan',
                    'contents' => $data['waktu_pengaduan']
                ],[
                    'name'     => 'tempat_kejadian',
                    'contents' => $data['tempat_kejadian']
                ],[
                    'name'     => 'tipe_pengaduan',
                    'contents' => $data['tipe_pengaduan']
                ],[
                    'name'     => 'status_pengaduan',
                    'contents' => $data['status_pengaduan']
                ],[
                    'name'     => 'file',
                    'contents' => fopen($data['filename'], 'r'),
                    'filename' => $data['filename']
                ],[
                    'name'     => 'namafile',
                    'contents' => $data['filename']
                ]
            ]
        ]);
        return $response;
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        if ($data['file'] == '') {
            $curl = \Config\Services::curlrequest();
            $response = $curl->request('POST', $link . 'M_pengaduan/update_data/' . $id, [
                'form_params' => $data
            ]);
            return $response;
        } else {
                $response = $client->request('POST', $link . 'M_pengaduan/update_data/' . $id, [
                   'multipart' => [
                    [
                        'name'     => 'id_pengguna_apps',
                        'contents' => $data['id_pengguna_apps']
                    ],[
                        'name'     => 'id_web',
                        'contents' => $data['id_web']
                    ],[
                        'name'     => 'id_kategori_pengaduan',
                        'contents' => $data['id_kategori_pengaduan']
                    ],[
                        'name'     => 'judul_pengaduan',
                        'contents' => $data['judul_pengaduan']
                    ],[
                        'name'     => 'isi_pengaduan',
                        'contents' => $data['isi_pengaduan']
                    ],[
                        'name'     => 'waktu_pengaduan',
                        'contents' => $data['waktu_pengaduan']
                    ],[
                        'name'     => 'tempat_kejadian',
                        'contents' => $data['tempat_kejadian']
                    ],[
                        'name'     => 'tipe_pengaduan',
                        'contents' => $data['tipe_pengaduan']
                    ],[
                        'name'     => 'status_pengaduan',
                        'contents' => $data['status_pengaduan']
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
    }

    public function delete_data($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_pengaduan/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    // ======= PENGADUAN ======= //

    //======= WEB ======= //

    public function view_data_web()
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/view_data_web", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_web($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/detail_data_web/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    //======= WEB ======= //

    //======= PENGGUNA APPS ======= //

    public function view_data_pengguna_apps()
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/view_data_pengguna_apps", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_pengguna_apps($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/detail_data_pengguna_apps/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    //======= PENGGUNA APPS ======= //

    //======= KATEGORI PENGADUAN ======= //

    public function view_data_kategori_pengaduan()
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/view_data_kategori_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_kategori_pengaduan($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/detail_data_kategori_pengaduan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    //======= KATEGORI PENGADUAN ======= //


    public function data_edit_dropwdown($id)
    {
        $link = 'http://localhost:8080/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_pengaduan/data_edit_dropwdown/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

}