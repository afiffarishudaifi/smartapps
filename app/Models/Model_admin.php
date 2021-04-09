<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_admin extends Model
{
    protected $table = 't_admin';
    protected $primaryKey = 'ID_USER';

    //======= ADMIN ======= //

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaturan/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['admin'];
    }

    public function detail_data_password($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaturan/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        if ($data['file'] == '') {
            $response = $client->request('POST', $link . 'M_pengaturan/update_data' . '/' . $id, [
                'form_params' => $data
            ]);
            return $response;
        }

        $response = $client->request('POST', $link . 'M_pengaturan/update_data' . '/' . $id, [
            'multipart' => [
                [
                    'name'     => 'username',
                    'contents' => $data['username']
                ], [
                    'name'     => 'password',
                    'contents' => $data['password']
                ], [
                    'name'     => 'file',
                    'contents' => fopen($data['gambar'], 'r'),
                    'filename' => $data['filename']
                ], [
                    'name'     => 'namafile',
                    'contents' => $data['filename']
                ], [
                    'name'     => 'foto',
                    'contents' => $data['foto']
                ]
            ]
        ]);
        return $response;
    }

    //======= ADMIN ======= //
}