<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_pengaduan_user extends Model
{
    protected $table = "t_pengaduan";
    protected $primaryKey = "ID_PENGADUAN";
    protected $useTimestamps = true;

    // ======= PENGADUAN ======= //

    public function view_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/index_view/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/show/' . $id)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
         $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_pengaduan/update_data' . '/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    // ======= PENGADUAN ======= //

    //======= WEB ======= //

    public function view_data_web()
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/view_data_web')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_web($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/detail_data_web/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }
    //======= WEB ======= //

    //======= PENGGUNA APPS ======= //

    public function view_data_pengguna_apps()
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/view_data_pengguna_apps')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_pengguna_apps($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/detail_data_pengguna_apps/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }
    //======= PENGGUNA APPS ======= //

    //======= KATEGORI PENGADUAN ======= //

    public function view_data_kategori_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/view_data_kategori_pengaduan')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function detail_data_kategori_pengaduan($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/detail_data_kategori_pengaduan/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }
    //======= KATEGORI PENGADUAN ======= //


    public function data_edit_dropwdown($id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_pengaduan/data_edit_dropwdown/' . $id)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function view_data_kategori_pengaduan_user($id_web)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('t_kategori_pengaduan');
        $builder->where('ID_WEB', $id_web);
        return $builder->get();
    }

    public function detail_data_kategori_pengaduan_user($id, $id_web)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('t_kategori_pengaduan');
        $builder->where('ID_KATEGORI_PENGADUAN', $id);
        $builder->where('ID_WEB', $id_web);
        return $builder->get();
    }
    // ======= UNTUK USER ======= //

}