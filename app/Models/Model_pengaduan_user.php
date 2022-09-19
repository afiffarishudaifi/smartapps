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
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/index_view/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/show/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
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
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/view_data_web", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_web($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/detail_data_web/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    //======= WEB ======= //

    //======= PENGGUNA APPS ======= //

    public function view_data_pengguna_apps()
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/view_data_pengguna_apps", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_pengguna_apps($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/detail_data_pengguna_apps/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    //======= PENGGUNA APPS ======= //

    //======= KATEGORI PENGADUAN ======= //

    public function view_data_kategori_pengaduan()
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/view_data_kategori_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_kategori_pengaduan($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/detail_data_kategori_pengaduan/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    //======= KATEGORI PENGADUAN ======= //


    public function data_edit_dropwdown($id)
    {
        $link = 'http://localhost:8080/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_pengaduan/data_edit_dropwdown/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    // public function view_data_kategori_pengaduan_user($id_web)
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('t_kategori_pengaduan');
    //     $builder->where('ID_WEB', $id_web);
    //     return $builder->get();
    // }

    // public function detail_data_kategori_pengaduan_user($id, $id_web)
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('t_kategori_pengaduan');
    //     $builder->where('ID_KATEGORI_PENGADUAN', $id);
    //     $builder->where('ID_WEB', $id_web);
    //     return $builder->get();
    // }
    // ======= UNTUK USER ======= //

}