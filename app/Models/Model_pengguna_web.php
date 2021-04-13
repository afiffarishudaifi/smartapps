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

    //======= DINAS ======= //

    public function view_data()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_web')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function add_data($data, $gambar)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

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
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_web/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['web'];
    }

     public function detail_data_password($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_web/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        if ($data['file'] == '') {
            $response = $client->request('POST', $link . 'M_pengguna_web/update_data' . '/' . $id, [
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
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_pengguna_web/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_1($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_web/cek_foreign_1/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function cek_foreign_2($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_web/cek_foreign_2/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    //======= DINAS ======= //
}