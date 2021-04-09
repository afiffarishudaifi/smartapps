<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_validasi_user extends Model
{
    protected $table = 't_tempat';
    protected $primaryKey = 'ID_TEMPAT';
    protected $useTimestamps = true;

    // begin validasi Pengaduan //
    public function view_data_pengaduan()
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/index_pengaduan')->getBody()->getContents();
        return json_decode($response, true);
    }

    public function update_data_pengaduan($data, $id)
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_validasi/update_data_pengaduan' . '/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function view_data_penanganan()
    {
        $link = 'http://localhost/api_smartapps/public/User/';
        $client = new Client([
            'base_uri' => $link,
        ]);
        $response = $client->request('GET', 'M_validasi/index_penanganan')->getBody()->getContents();
        return json_decode($response, true);
    }

    // end validasi Pengaduan //

}