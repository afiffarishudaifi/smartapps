<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;


class Model_foto_tempat extends Model
{
    protected $table = 't_foto_tempat';
    protected $primaryKey = 'ID_FOTO';
    protected $useTimestamps = true;

    public function view_foto_tempat($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . "M_foto_tempat/view/" . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function add_data($data)
    {

        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_foto_tempat/create', [
            // 'form_params' => $data,
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

    public function detail_data($id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $result = $curl->request("get", $link . 'M_foto_tempat/show/' . $id, [
            "headers" => [
                "Accept" => "application/json"
            ]
        ])->getbody();

        $hasil = json_decode($result, true);
        return $hasil;
    }

    public function update_data($data, $id)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $client = new Client([
            'base_uri' => $link,
        ]);

        $response = $client->request('POST', $link . 'M_foto_tempat/update_data/' . $id, [
           'multipart' => [
                [
                    'name'     => 'id_tempat',
                    'contents' => $data['id_tempat']
                ],[
                    'name'     => 'file',
                    'contents' => fopen($data['gambar'], 'r'),
                    'filename' => $data['filename']
                ],[
                    'name'     => 'namafile',
                    'contents' => $data['filename']
                ],[
                    'name'     => 'foto',
                    'contents' => $data['foto']
                ]
            ]
        ]);
        return $response;
    }

    public function delete_data($id, $id_tempat)
    {
        $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Admin/';
        $curl = \Config\Services::curlrequest();
        $response = $curl->request('DELETE', $link . 'M_foto_tempat/delete_data/' . $id)->getBody();
        return json_decode($response, true);
    }
}