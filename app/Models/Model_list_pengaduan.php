<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class Model_list_pengaduan extends Model
{
    protected $table = 't_pengaduan';
    protected $primaryKey = 'ID_PENGADUAN';
    protected $allowedFields = [
        'ID_PENGADUAN', 'ID_KATEGORI_PENGADUAN', 'ID_PENGGUNA_APPS', 'ID_WEB', 'JUDUL_PENGADUAN', 'ISI_PENGADUAN', 'WAKTU_PENGADUAN', 'TEMPAT_KEJADIAN', 'TIPE_PENGADUAN', 'STATUS_PENGADUAN', 'FOTO_PENGADUAN', 'DURASI_PENGADUAN'
    ];

    // public function view_data()
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('t_pengaduan');
    //     $builder->select('ID_PENGADUAN, JUDUL_PENGADUAN, ISI_PENGADUAN, WAKTU_PENGADUAN, NAMA_WEB, NAMA_LENGKAP_APPS, NAMA_KATEGORI_PENGADUAN, STATUS_PENGADUAN, FOTO_PENGADUAN');
    //     $builder->join('t_pengguna_web', 't_pengguna_web.ID_WEB=t_pengaduan.ID_WEB');
    //     $builder->join('t_pengguna_apps', 't_pengguna_apps.ID_PENGGUNA_APPS = t_pengaduan.ID_PENGGUNA_APPS');
    //     $builder->join('t_kategori_pengaduan', 't_kategori_pengaduan.ID_KATEGORI_PENGADUAN = t_pengaduan.ID_KATEGORI_PENGADUAN');
    //     return $builder->get();
    // }

    // public function view_data()
    // {
    //     // $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Frontend/';
    //     $link = 'http://localhost/api_smartapps/Frontend/';
    //     $curl = \Config\Services::curlrequest();
    //     $result = $curl->request("get", $link . "Pengaduan", [
    //         "headers" => [
    //             "Accept" => "application/json"
    //         ]
    //     ])->getbody();

    //     $hasil = json_decode($result, true);
    //     return $hasil;
    // }

    // public function detail_data($id)
    // {
    //     // $link = 'http://smartapps.tamif2021.my.id/api_smartapps/Frontend/';
    //     $link = 'http://localhost/api_smartapps/Frontend/';
    //     $curl = \Config\Services::curlrequest();
    //     $result = $curl->request("get", $link . 'Pengaduan/show/' . $id, [
    //         "headers" => [
    //             "Accept" => "application/json"
    //         ]
    //     ])->getbody();

    //     $hasil = json_decode($result, true);
    //     return $hasil;
    // }

}