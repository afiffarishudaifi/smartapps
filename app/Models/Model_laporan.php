<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_laporan extends Model
{
    protected $table = "t_pengaduan";
    protected $primaryKey = "ID_PENGADUAN";
    protected $useTimestamps = true;

    // ======= PENGADUAN ======= //

    public function view_data($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_laporan/index_view/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_kategori($id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_laporan/data_kategori/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_filter($param, $id)
    {
        $link = 'http://localhost/api_smartapps/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('GET', $link . 'M_laporan/index_filter/' . $id, [
            'query' => $param
        ])->getBody()->getContents();
        return json_decode($response, true);
    }

}