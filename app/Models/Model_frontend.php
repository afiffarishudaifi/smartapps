<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;


class Model_frontend extends Model
{

    public function view_data_tempat()
    {
        $link = 'http://localhost/api_smartapps/public/Frontend/';

        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Frontend/view_data_tempat')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_tempat($id)
    {
        $link = 'http://localhost/api_smartapps/public/Frontend/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Frontend/detail_data_tempat/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function view_data_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/public/Frontend/';

        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Frontend/view_data_pengaduan')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_pengaduan($id)
    {
        $link = 'http://localhost/api_smartapps/public/Frontend/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Frontend/detail_data_pengaduan/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }
}