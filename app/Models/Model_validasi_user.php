<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_validasi_user extends Model
{
    protected $table = 't_tempat';
    protected $primaryKey = 'ID_TEMPAT';
    protected $useTimestamps = true;

    public function view_data_pengaduan()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/index_pengaduan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data_pengaduan($data, $id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('POST', $link . 'M_validasi/update_data_pengaduan/' . $id, [
            'form_params' => $data
        ]);
        return $response;
    }

    public function view_data_penanganan()
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/User/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("GET", $link . "M_validasi/index_penanganan", [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    // end validasi Pengaduan //

}