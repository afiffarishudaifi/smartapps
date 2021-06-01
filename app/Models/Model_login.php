<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_login extends Model
{
    protected $table = 't_pengguna_web';

    protected $allowedFields = ['USERNAME_WEB', 'PASSWORD_WEB'];

    public function get_login($username)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "Login/get_login/" . $username, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function get_login_admin($username)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "Login/get_login_admin/" . $username, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function cek_user($emai, $username)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "Login/cek_user/" . $username . '/' . $emai, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function reset_password($id, $data)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('POST', $link . 'Login/update_data/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }
}