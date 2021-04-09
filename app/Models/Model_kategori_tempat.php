<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_kategori_tempat extends Model
{
    protected $table = 't_kategori_tempat';
    protected $primaryKey = 'ID_KATEGORI_TEMPAT';
    protected $allowedFields = ['NAMA_KATEGORI_TEMPAT'];
    protected $useTimestamps = true;

    public function view_data()
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_kategori_tempat')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function add_data($data)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';

        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_kategori_tempat/create', [
            'form_params' => $data
        ]);
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_kategori_tempat/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil[0];
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';

        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('PUT', $link . 'M_kategori_tempat/update' . '/' . $id, [
            'form_params' => $data,
        ]);
        return $response;
    }

    public function delete_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_kategori_tempat/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function cek_foreign($id)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_kategori_tempat/cek_foreign/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }
}