<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;


class Model_dashboard extends Model
{
    protected $table = 't_pengaduan';

    public function pengaduan($param)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('GET', $link . 'Dashboard', [
            'query' => $param
        ])->getBody()->getContents();
        return json_decode($response, true);
    }

    public function jumlah_pengajuan_tempat()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/jumlah_pengajuan_tempat')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function jumlah_pengajuan_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/jumlah_pengajuan_pengaduan')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function total_web()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_web')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_WEB'];
    }

    public function total_tempat_pengajuan()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_tempat_pengajuan')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGGUNA_APPS'];
    }

    public function total_tempat_terkonfirmasi()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_tempat_terkonfirmasi')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_TEMPAT'];
    }

    public function total_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_pengajuan()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_pengajuan')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_terkonfirmasi()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_terkonfirmasi')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_penanganan()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_penanganan')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_selesai()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_selesai')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function total_pengaduan_ditolak()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/total_pengaduan_ditolak')->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil['ID_PENGADUAN'];
    }

    public function view_detail_pengaduan($param)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Dashboard/view_detail_pengaduan/' . $param)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }
}