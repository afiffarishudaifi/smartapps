<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_tempat extends Model
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
        $response = $client->request('GET', 'M_tempat')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_tempat/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_tempat/create', [
           'multipart' => [
                [
                    'name'     => 'id_pengguna_apps',
                    'contents' => $data['id_pengguna_apps']
                ],[
                    'name'     => 'id_kategori_tempat',
                    'contents' => $data['id_kategori_tempat']
                ],[
                    'name'     => 'nama_tempat',
                    'contents' => $data['nama_tempat']
                ],[
                    'name'     => 'long_tempat',
                    'contents' => $data['long_tempat']
                ],[
                    'name'     => 'lat_tempat',
                    'contents' => $data['lat_tempat']
                ],[
                    'name'     => 'alamat_tempat',
                    'contents' => $data['alamat_tempat']
                ],[
                    'name'     => 'deskripsi_tempat',
                    'contents' => $data['deskripsi_tempat']
                ],[
                    'name'     => 'no_telp_tempat',
                    'contents' => $data['no_telp_tempat']
                ],[
                    'name'     => 'status_tempat',
                    'contents' => $data['status_tempat']
                ]
            ]
        ]);
        return $response;
    }

    public function add_data_foto($data)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_tempat/create_foto', [
           'multipart' => [
                [
                    'name'     => 'id_tempat',
                    'contents' => $data['id_tempat']
                ],[
                    'name'     => 'file',
                    'contents' => fopen($data['file'], 'r')
                ],[
                    'name'     => 'nama_file',
                    'contents' => $data['nama_file']
                ]
            ]
        ]);
        return $response;
    }

    public function data_pengguna_apps()
    {
        $link = 'http://localhost/api_smartapps/Admin/';

        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_tempat/data_pengguna_apps')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function data_kategori_tempat()
    {
        $link = 'http://localhost/api_smartapps/Admin/';

        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_tempat/data_kategori_tempat')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function data_max_id()
    {
        $link = 'http://localhost/api_smartapps/Admin/';

        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_tempat/data_max_id')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('t_tempat');
        $builder->where('ID_TEMPAT', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_tempat/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function delete_foto_tempat($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('DELETE', 'M_tempat/delete_foto_tempat/' . $id)->getBody();
        return json_decode($response, true);
    }

    public function data_edit_dropwdown($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_tempat/data_edit_dropwdown/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_foto($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_tempat/detail_data_foto/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }
}