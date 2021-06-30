<?php

namespace App\Controllers\Android;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Model_tempat;
use App\Models\Model_foto_tempat;
use App\Models\Model_android;
use App\Models\Model_kategori_tempat;
use App\Models\Model_pengguna_web;

class M_tempat extends ResourceController
{
    protected $modelName = 'App\Models\Model_tempat';
    protected $format = 'json';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    // Begin CRUD Tempat //

    public function index_view($id = null)
    {
        $model = new Model_android();
        $data = $model->view_tempat($id)->getResultArray();;
        return $this->respond($data, 200);
    }

    public function create()
    {
        $model = new Model_tempat();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $data = array(
            'ID_PENGGUNA_APPS'    => $this->request->getVar('id_pengguna_apps'),
            'ID_KATEGORI_TEMPAT'   => $this->request->getVar('id_kategori_tempat'),
            'NAMA_TEMPAT'   => $this->request->getVar('nama_tempat'),
            'LONG_TEMPAT'   => $this->request->getVar('long_tempat'),
            'LAT_TEMPAT'   => $this->request->getVar('lat_tempat'),
            'ALAMAT_TEMPAT'   => $this->request->getVar('alamat_tempat'),
            'DESKRIPSI_TEMPAT'   => $this->request->getVar('deskripsi_tempat'),
            'NO_TELP_TEMPAT'   => $this->request->getVar('no_telp_tempat'),
            'STATUS_TEMPAT'   => 'Pengajuan'
        );
        if ($model->add_data($data)) {
            $query_max = $model->data_max_id()->getRowArray();
            $id_max = $query_max['ID_TEMPAT'];
            if ($imagefile = $this->request->getFiles()) {
                foreach ($imagefile['file'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $namabaru     = $img->getRandomName();
                        $img->move('docs/admin/assets/img/foto_tempat', $namabaru); // Masuk database
                        $data = array(
                            'ID_TEMPAT'     => $id_max,
                            'NAMA_FOTO'      => "docs/admin/assets/img/foto_tempat/" . $namabaru
                        );
                        $model->add_data_foto($data);
                    }
                }
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Data sudah berhasil ditambah'
                    ]
                ];
                return $this->respondCreated($response, 200);
            }
        } else {
            return $this->fail('Data ini tidak bisa ditambah', 400);
        }
    }

    public function show($id = null)
    {
        $data = $this->model->detail_data($id)->getRowArray();
        if (!$data) {
            return $this->fail('Data tidak ditemukan', 400);
        }

        return $this->respond($data, 200);
    }

    public function update($id = null)
    {
        $model = new Model_tempat();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $input = $this->request->getRawInput();
        $id =  $input['id_tempat'];
        $data = $this->request->getRawInput();
        $data['ID_TEMPAT'] = $id;

        if (!$model->detail_data($id)) {
            return $this->fail('Id tidak ditemukan', 400);
        }

        // $id = $this->request->getVar('id_pengajuan');
        $data = array(
            'ID_PENGGUNA_APPS'    => $input['id_pengguna_apps'],
            'ID_KATEGORI_TEMPAT'   => $input['id_kategori_tempat'],
            'NAMA_TEMPAT'   => $input['nama_tempat'],
            'LONG_TEMPAT'   => $input['long_tempat'],
            'LAT_TEMPAT'   => $input['lat_tempat'],
            'ALAMAT_TEMPAT'   => $input['alamat_tempat'],
            'DESKRIPSI_TEMPAT'   => $input['deskripsi_tempat'],
            'NO_TELP_TEMPAT'   => $input['no_telp_tempat']
        );
        $model = new Model_tempat();
        if ($model->update_data($data, $id)) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data telah berhasil diubah'
                ]
            ];
            return $this->respondUpdated($response, 200);
        } else {
            return $this->fail('Data ini dipakai di tabel lain dan tidak bisa diubah', 400);
        }
    }

    public function delete($id = null)
    {
        $model = new Model_tempat();
        if (!$model->detail_data($id)) {
            return $this->failNotFound('Id tidak ditemukan');
        }

        $item_foto = $model->detail_data_foto($id)->getResultArray();
        foreach ($item_foto as $foto_dihapus) {
            $foto = $foto_dihapus['NAMA_FOTO'];
            if ($foto != "") {
                if (file_exists($foto)) {
                    unlink($foto);
                }
            }
        }
        $model->delete_foto_tempat($id);

        if ($this->model->delete($id)) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data telah berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response, 200);
        }
    }

    public function view_kategori_tempat()
    {
        $model = new Model_kategori_tempat();
        $data = $model->findAll();
        return $this->respond(array("result" => $data, 200));
    }

    public function view_tempat()
    {
        $model = new Model_tempat();
        $data = $model->findAll();
        return $this->respond(array("result" => $data, 200));
    }

    public function view_web()
    {
        $model = new Model_pengguna_web();
        $data = $model->findAll();
        return $this->respond(array("result" => $data, 200));
    }
    // End CRUD Tempat //

    // Begin Amry 
    public function index_view_ar()
    {
        $model = new Model_tempat();
        $id = 1;
        $data = $model->view_tempat_android($id)->getResultArray();;
        return $this->respond(
            $data,
            200
        );
    }

    public function view_foto($id)
    {
        $model = new Model_foto_tempat();
        $data = $model->view_foto_tempat($id)->getResultArray();;
        return $this->respond($data, 200);
    }
    // End Amry 

}