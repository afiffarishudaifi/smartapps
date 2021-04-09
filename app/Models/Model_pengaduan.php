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
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $client = \Config\Services::curlrequest();
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $avatar = $data['filename'];

        if ($avatar == "") {
            $response = $client->request('POST', $link . 'M_pengaduan/create', [
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
         $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        if ($data['file'] == '') {
            $response = $client->request('POST', $link . 'M_pengaduan/update_data' . '/' . $id, [
                'form_params' => $data
            ]);
            return $response;
        } else {
                $response = $client->request('POST', $link . 'M_pengaduan/update_data' . '/' . $id, [
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
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_pengaduan/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    // ======= PENGADUAN ======= //

    //======= WEB ======= //

    public function view_data_web()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/view_data_web')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_web($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/detail_data_web/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }
    //======= WEB ======= //

    //======= PENGGUNA APPS ======= //

    public function view_data_pengguna_apps()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/view_data_pengguna_apps')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_pengguna_apps($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/detail_data_pengguna_apps/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }
    //======= PENGGUNA APPS ======= //

    //======= KATEGORI PENGADUAN ======= //

    public function view_data_kategori_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/view_data_kategori_pengaduan')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_kategori_pengaduan($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/detail_data_kategori_pengaduan/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }
    //======= KATEGORI PENGADUAN ======= //


    public function data_edit_dropwdown($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/data_edit_dropwdown/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

}