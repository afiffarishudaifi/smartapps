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
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_apps')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function add_data($data, $gambar)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

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
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_apps/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['apps'];
    } 

    public function detail_data_password($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_apps/show/' . $id)->getBody()->getContents();
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
            $response = $client->request('POST', $link . 'M_pengguna_apps/update_data' . '/' . $id, [
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
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_pengguna_apps/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign_1($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_apps/cek_foreign_1/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function cek_foreign_2($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_apps/cek_foreign_2/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function cek_foreign_3($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengguna_apps/cek_foreign_3/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function delete_token($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_pengguna_apps/delete_token/' . $id)->getBody();
        return json_decode($response, true);
    }
}