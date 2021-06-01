<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_komentar extends Model
{
    protected $table = 't_komentar';
    protected $primaryKey = 'ID_KOMENTAR';

    // ======= KOMENTAR ======= //

    public function view_data()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_komentar", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('POST', $link . 'M_komentar/create', [
            'form_params' => $data
        ]);
        return $response;
    }

    public function detail_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . 'M_komentar/show/' . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('PUT', $link . 'M_komentar/update/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function delete_data($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_komentar/delete/' . $id)->getBody();
        return json_decode($response, true);
    }

    // ======= KOMENTAR ======= //

    // ======= WEB ======= //

    public function view_data_apps()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_komentar/view_data_apps", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function detail_data_dropdown($id)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_komentar/detail_data_dropdown/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    // ======= WEB ======= //

    // ======= WEB ======= //

    public function view_data_tempat()
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_komentar/view_data_tempat", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }
    // ======= WEB ======= //

    // ======= UNTUK USER ======= //
    public function view_data_user($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('t_kategori_pengaduan');
        $builder->select('NAMA_DINAS, NAMA_KATEGORI_PENGADUAN, ID_KATEGORI_PENGADUAN');
        $builder->join('t_pengguna_web', 't_pengguna_web.ID_WEB=t_kategori_pengaduan.ID_WEB');
        $builder->where('t_pengguna_web.ID_WEB', $id);
        return $builder->get();
    }
    // ======= UNTUK USER ======= //
}