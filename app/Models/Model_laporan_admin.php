<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_laporan_admin extends Model
{

    // ======= PENGADUAN ======= //

    public function view_data()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_laporan/index_view')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_kategori()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_laporan/data_kategori')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_filter($param)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('GET', $link . 'M_laporan/index_filter' , [
            'query' => $param
        ])->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_tempat()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_laporan/index_view_tempat')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_kategori_tempat()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_laporan/data_kategori_tempat')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_filter_tempat($param)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('GET', $link . 'M_laporan/index_filter_tempat' , [
            'query' => $param
        ])->getBody()->getContents();
        return json_decode($response, true);
    }

}