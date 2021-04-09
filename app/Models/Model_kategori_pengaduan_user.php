<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_kategori_pengaduan_user extends Model
{
    protected $table = 't_kategori_pengaduan';
    protected $primaryKey = 'ID_KATEGORI_PENGADUAN';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';

    // ======= KATEGORI PENGADUAN ======= //

    public function view_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_kategori_pengaduan/index_view/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function add_data($data)
    {
        $link = 'http://localhost/api_smartapps/public/User/';

        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_kategori_pengaduan/create', [
            'form_params' => $data
        ]);
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_kategori_pengaduan/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';

        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('PUT', $link . 'M_kategori_pengaduan/update/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function delete_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_kategori_pengaduan/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_kategori_pengaduan/cek_foreign/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    // ======= KATEGORI PENGADUAN ======= //
}