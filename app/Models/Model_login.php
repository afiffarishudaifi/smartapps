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
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Login/get_login/' . $username)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function get_login_admin($username)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Login/get_login_admin/' . $username)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function cek_user($emai, $username)
    {
        $link = 'http://localhost/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Login/cek_user/' . $username . '/' . $emai)->getBody()->getContents();
        $hasil = json_decode($response, true);
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