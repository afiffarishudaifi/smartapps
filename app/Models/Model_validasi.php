<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_validasi extends Model
{
    protected $table = 't_tempat';
    protected $primaryKey = 'ID_TEMPAT';
    protected $useTimestamps = true;

    public function view_tempat()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('t_tempat');
        $builder->where('ID_TEMPAT', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function data_edit_dropwdown($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/data_edit_dropwdown/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_foto($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/detail_data_foto/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }


    // begin validasi pengaduan //
    public function view_data_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/index_pengaduan')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_pengaduan($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/show_pengaduan/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function update_data_pengaduan($data, $id)
    {
         $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_validasi/update_data_pengaduan' . '/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function data_edit_dropwdown_pengaduan($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/data_edit_dropwdown_pengaduan/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    // end validasi pengaduan //

}