<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_dashboard_user extends Model
{
    protected $table = 't_pengaduan';

    public function pengaduan($param)
    {
        $link = 'http://localhost/api_smartapps/User/';

        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('GET', $link . 'Dashboard', [
            'query' => $param
        ])->getBody()->getContents();
        return json_decode($response, true);
    }

    public function jumlah_pengajuan_pengaduan($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/jumlah_pengajuan_pengaduan/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function jumlah_penanganan($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/jumlah_penanganan/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function total_pengaduan_terkonfirmasi($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_terkonfirmasi/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_penanganan($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_penanganan/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_selesai($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_selesai/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function view_detail_pengaduan($param, $id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/view_detail_pengaduan/' . $param .'/'.$id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function insert_token($data_token) 
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'Dashboard/insert_token', [
            'form_params' => $data_token
        ]);
        return $response;
    }
}