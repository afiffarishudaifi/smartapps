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
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Login/get_login/' . $username)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }

    public function get_login_admin($username)
    {
        $link = 'http://localhost/api_smartapps/public/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'Login/get_login_admin/' . $username)->getBody()->getContents();
        $hasil = json_decode($response, true);
        return $hasil;
    }
}