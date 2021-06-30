<?php

namespace App\Controllers\Android;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Model_tempat;
use App\Models\Model_pengaduan;
use App\Models\Model_pengguna_apps;
use App\Models\Model_kategori_pengaduan;
use App\Models\Model_android;
use App\Models\Model_foto_tempat;
use App\Models\Model_api;

class Api extends ResourceController
{
    protected $modelName = 'App\Models\Model_pengaduan';
    protected $format = 'json';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function delete_lokasi()
    {
        $model = new Model_tempat();
        $id = $this->request->getPost('ID_TEMPAT');

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

    public function delete_pengaduan()
    {
        $model = new Model_pengaduan();
        $id = $this->request->getPost('ID_PENGADUAN');

        $pengaduan = $model->detail_data($id)->getRowArray();
        $foto = $pengaduan['FOTO_PENGADUAN'];
        if ($foto != "") {
            if (file_exists($foto)) {
                unlink($foto);
            }
        }

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

    public function detail_fotoprofil()
    {
        $model = new Model_pengguna_apps();
        $encrypter = \Config\Services::encrypter();
        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $pengguna_apps = $model->detail_data($id)->getRowArray();
        $pass = $pengguna_apps['PASSWORD_PENGGUNA_APPS'];
        $password = $encrypter->decrypt(base64_decode($pass));
        $data =
            [
                'apps' => $pengguna_apps,
                'password' => $password
            ];

        return $this->respond(array("result" => $data, 200));
    }

    public function detail_lokasi()
    {
        $model = new Model_tempat();
        $id = $this->request->getPost('ID_TEMPAT');
        $data = $model->detail_data($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function detail_pengaduan()
    {
        $model = new Model_pengaduan();
        $id = $this->request->getPost('ID_PENGADUAN');
        $data = $model->detail_data($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_id_tempat()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $nama = $this->request->getPost('NAMA_TEMPAT');
        $alamat = $this->request->getPost('ALAMAT_TEMPAT');
        $data = $model->get_id_tempat($id, $nama, $alamat)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_idkategori()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_KATEGORI_TEMPAT');
        $data = $model->get_idkategori($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_idkategoripengaduan()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_KATEGORI_PENGADUAN');
        $data = $model->get_idkategoripengaduan($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_idweb()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_WEB');
        $data = $model->get_idweb($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_kategorilokasi()
    {
        $model = new Model_api();
        $data = $model->get_kategorilokasi()->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_kategoripengaduan()
    {
        $model = new Model_api();
        $data = $model->get_kategoripengaduan()->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function get_tempatweb()
    {
        $model = new Model_api();
        $data = $model->get_tempatweb()->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function kategori_lokasi()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_KATEGORI_TEMPAT');
        $data = $model->kategori_lokasi($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    // start lokasi

    public function lokasi_get()
    {
        $model = new Model_api();
        $data = $model->lokasi_get()->getResultArray();;
        return $this->respond(array("result" => $data, 200));
    }

    public function lokasi_post()
    {
        $model = new Model_tempat();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $data = array(
            'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
            'ID_KATEGORI_TEMPAT'   => $this->request->getPost('ID_KATEGORI_TEMPAT'),
            'NAMA_TEMPAT'   => $this->request->getPost('NAMA_TEMPAT'),
            'LONG_TEMPAT'   => $this->request->getPost('LONG_TEMPAT'),
            'LAT_TEMPAT'   => $this->request->getPost('LAT_TEMPAT'),
            'ALAMAT_TEMPAT'   => $this->request->getPost('ALAMAT_TEMPAT'),
            'DESKRIPSI_TEMPAT'   => $this->request->getPost('DESKRIPSI_TEMPAT'),
            'NO_TELP_TEMPAT'   => $this->request->getPost('NO_TELP_TEMPAT'),
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

    public function lokasi_put()
    {
        $model = new Model_tempat();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $input = $this->request->getRawInput();
        $id =  $input['ID_TEMPAT'];

        $data = array(
            'ID_PENGGUNA_APPS'    => $input['ID_PENGGUNA_APPS'],
            'NAMA_TEMPAT'   => $input['NAMA_TEMPAT'],
            'ALAMAT_TEMPAT'   => $input['ALAMAT_TEMPAT'],
            'DESKRIPSI_TEMPAT'   => $input['DESKRIPSI_TEMPAT'],
            'NO_TELP_TEMPAT'   => $input['NO_TELP_TEMPAT']
        );
        $model = new Model_tempat();
        if ($model->update_data($data, $id)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini dipakai di tabel lain dan tidak bisa diubah', 400);
        }
    }
    // end  lokasi

    // start pengaduan
    public function pengaduan_get()
    {
        $model = new Model_api();
        $data = $model->pengaduan_get()->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function pengaduan_post()
    {
        $model = new Model_api();
        helper(['form', 'url']);
        $image = \Config\Services::image();
        $data = $this->request->getPost();

        $avatar      = $this->request->getFile('file');

        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/admin/assets/img/foto_pengaduan', $namabaru);
        $data = array(
            'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
            'ID_WEB'    => $this->request->getPost('ID_WEB'),
            'ID_KATEGORI_PENGADUAN'    => $this->request->getPost('ID_KATEGORI_PENGADUAN'),
            'JUDUL_PENGADUAN'    => $this->request->getPost('JUDUL_PENGADUAN'),
            'ISI_PENGADUAN'    => $this->request->getPost('ISI_PENGADUAN'),
            'WAKTU_PENGADUAN'    => date('Y-m-d H:i:s'),
            'TEMPAT_KEJADIAN'    => $this->request->getPost('TEMPAT_KEJADIAN'),
            'STATUS_PENGADUAN'    => 'Pengajuan',
            'FOTO_PENGADUAN'    => "docs/admin/assets/img/foto_pengaduan/" . $namabaru
        );

        if ($model->pengaduan_post($data)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini tidak bisa ditambah', 400);
        }
    }

    public function pengaduan_detail()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_KATEGORI_PENGADUAN');
        $data = $model->pengaduan_detail($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function pengaduan_put()
    {
        $model = new Model_pengaduan();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $id = $this->request->getPost('id_pengaduan');
        if (!$model->detail_data($id)) {
            return $this->fail('Id tidak ditemukan', 400);
        }

        $file = $this->request->getFile('file');
        if ($file == '') {
            $data = array(
                'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
                'ID_WEB'    => $this->request->getPost('ID_WEB'),
                'ID_KATEGORI_PENGADUAN'    => $this->request->getPost('ID_KATEGORI_PENGADUAN'),
                'JUDUL_PENGADUAN'    => $this->request->getPost('JUDUL_PENGADUAN'),
                'ISI_PENGADUAN'    => $this->request->getPost('ISI_PENGADUAN'),
                'TEMPAT_KEJADIAN'    => $this->request->getPost('TEMPAT_KEJADIAN'),
                'STATUS_PENGADUAN'    => $this->request->getPost('STATUS_PENGADUAN')
            );
        } else {
            $foto = $this->request->getPost('foto');
            if ($foto != "") {
                if (file_exists($foto)) {
                    unlink($foto);
                }
            }
            $avatar      = $this->request->getFile('file');
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/admin/assets/img/foto_pengaduan', $namabaru);
            $data = array(
                'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
                'ID_WEB'    => $this->request->getPost('ID_WEB'),
                'ID_KATEGORI_PENGADUAN'    => $this->request->getPost('ID_KATEGORI_PENGADUAN'),
                'JUDUL_PENGADUAN'    => $this->request->getPost('JUDUL_PENGADUAN'),
                'ISI_PENGADUAN'    => $this->request->getPost('ISI_PENGADUAN'),
                'TEMPAT_KEJADIAN'    => $this->request->getPost('TEMPAT_KEJADIAN'),
                'STATUS_PENGADUAN'    => $this->request->getPost('STATUS_PENGADUAN'),
                'FOTO_PENGADUAN'    => "docs/admin/assets/img/foto_pengaduan/" . $namabaru
            );
        }
        $model = new Model_pengaduan();
        if ($model->pengaduan_put($data, $id)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini dipakai di tabel lain dan tidak bisa diubah', 400);
        }
    }
    // end pengaduan 

    public function profil()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $data = $model->profil($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function riwayat_lokasi()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $data = $model->riwayat_lokasi($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function riwayat_pengaduan()
    {
        $model = new Model_api();
        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $data = $model->riwayat_pengaduan($id)->getRowArray();
        return $this->respond(array("result" => $data, 200));
    }

    public function ubah_password_post()
    {
        $model = new Model_api();
        $encrypter = \Config\Services::encrypter();
        $data = base64_encode($encrypter->encrypt($this->request->getPost('PASSWORD_PENGGUNA_APPS')));
        $id = $this->request->getPost('ID_PENGGUNA');
        $data = $model->ubah_password_post($data, $id);
        return $this->respond(array("result" => $data, 200));
    }

    public function ubah_password_put()
    {
        $model = new Model_api();
        $encrypter = \Config\Services::encrypter();
        $data = base64_encode($encrypter->encrypt($this->request->getPost('PASSWORD_PENGGUNA_APPS')));
        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $data = $model->ubah_password_post($data, $id);
        return $this->respond(array("result" => $data, 200));
    }

    public function update_fotoprofil_post()
    {
        $model = new Model_api();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $foto = $this->request->getPost('foto');
        if ($foto != "") {
            if (file_exists($foto)) {
                unlink($foto);
            }
        };
        $avatar      = $this->request->getFile('file');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/admin/assets/img/foto_pengguna_apps', $namabaru);
        $data = array(
            'FOTO_PENGGUNA_APPS'      => "docs/admin/assets/img/foto_pengguna_apps/" . $namabaru
        );
        if ($model->update_fotoprofil_post($data, $id)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini dipakai di tabel lain dan tidak bisa diubah', 400);
        }
    }

    public function update_fotoprofil_put()
    {
        $model = new Model_api();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $id = $this->request->getPost('ID_PENGGUNA_APPS');
        $foto = $this->request->getPost('foto');
        if ($foto != "") {
            if (file_exists($foto)) {
                unlink($foto);
            }
        };
        $avatar      = $this->request->getFile('file');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/admin/assets/img/foto_pengguna_apps', $namabaru);
        $data = array(
            'FOTO_PENGGUNA_APPS'      => "docs/admin/assets/img/foto_pengguna_apps/" . $namabaru
        );
        if ($model->update_fotoprofil_put($data, $id)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini dipakai di tabel lain dan tidak bisa diubah', 400);
        }
    }

    public function update_profil()
    {
        $model = new Model_api();
        $input = $this->request->getRawInput();
        $id =  $input['ID_PENGGUNA_APPS'];
        $data = array(
            'ID_PENGGUNA_APPS'   => $input['ID_PENGGUNA_APPS'],
            'KTP'      => $input['KTP'],
            'USERNAME_PENGGUNA_APPS' => $input['USERNAME_PENGGUNA_APPS'],
            'EMAIL_PENGGUNA_APPS'    => $input['EMAIL_PENGGUNA_APPS'],
            'NAMA_LENGKAP_APPS'    => $input['NAMA_LENGKAP_APPS'],
            'NO_HP_PENGGUNA_APPS'    => $input['NO_HP_PENGGUNA_APPS'],
            'ALAMAT_PENGGUNA_APPS'    => $input['ALAMAT_PENGGUNA_APPS']
        );
        $data = $model->update_profil($data, $id);
        return $this->respond(array("result" => $data, 200));
    }

    public function upload_lokasi_post()
    {
        $model = new Model_foto_tempat();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['file'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {

                    $namabaru     = $img->getRandomName();
                    $img->move('docs/admin/assets/img/foto_tempat', $namabaru);
                    $data = array(
                        'ID_TEMPAT'     => $this->request->getPost('ID_TEMPAT'),
                        'NAMA_FOTO'      => 'docs/admin/assets/img/foto_tempat/' . $namabaru
                    );
                    $model->add_data($data);
                }
                return $this->respond($data);
            }
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data sudah berhasil ditambah'
                ]
            ];
            return $this->respondCreated($response, 200);
        };

        return $this->fail('Data ini tidak bisa ditambah', 400);
    }

    public function upload_lokasi_put()
    {
        $model = new Model_foto_tempat();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $id = $this->request->getPost('ID_TEMPAT');
        $avatar      = $this->request->getFile('image');

        $foto = $this->request->getPost('foto');
        if ($foto != "") {
            if (file_exists($foto)) {
                unlink($foto);
            }
        }
        $avatar->move('docs/admin/assets/img/foto_tempat', $this->request->getPost('filename'));
        $data = array(
            'ID_TEMPAT'     => $this->request->getPost('ID_TEMPAT'),
            'NAMA_FOTO'      => $this->request->getPost('namafile')
        );

        $model = new Model_foto_tempat();
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

    public function upload_pengaduan_post()
    {
        $model = new Model_pengaduan();
        helper(['form', 'url']);
        $image = \Config\Services::image();
        $data = $this->request->getPost();

        $avatar      = $this->request->getFile('file');

        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/admin/assets/img/foto_pengaduan', $namabaru);
        $data = array(
            'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
            'ID_WEB'    => $this->request->getPost('ID_WEB'),
            'ID_KATEGORI_PENGADUAN'    => $this->request->getPost('ID_KATEGORI_PENGADUAN'),
            'JUDUL_PENGADUAN'    => $this->request->getPost('JUDUL_PENGADUAN'),
            'ISI_PENGADUAN'    => $this->request->getPost('ISI_PENGADUAN'),
            'WAKTU_PENGADUAN'    => date('Y-m-d H:i:s'),
            'TEMPAT_KEJADIAN'    => $this->request->getPost('TEMPAT_KEJADIAN'),
            'STATUS_PENGADUAN'    => 'Pengajuan',
            'FOTO_PENGADUAN'    => "docs/admin/assets/img/foto_pengaduan/" . $namabaru
        );

        if ($model->add_data($data)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini tidak bisa ditambah', 400);
        }
    }

    public function upload_pengaduan_put()
    {
        $model = new Model_pengaduan();
        helper(['form', 'url']);
        $image = \Config\Services::image();

        $id = $this->request->getPost('ID_PENGADUAN');

        $file = $this->request->getFile('file');
        if ($file == '') {
            $data = array(
                'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
                'ID_WEB'    => $this->request->getPost('ID_WEB'),
                'ID_KATEGORI_PENGADUAN'    => $this->request->getPost('ID_KATEGORI_PENGADUAN'),
                'JUDUL_PENGADUAN'    => $this->request->getPost('JUDUL_PENGADUAN'),
                'ISI_PENGADUAN'    => $this->request->getPost('ISI_PENGADUAN'),
                'TEMPAT_KEJADIAN'    => $this->request->getPost('TEMPAT_KEJADIAN')
            );
        } else {
            $foto = $this->request->getPost('foto');
            if ($foto != "") {
                if (file_exists($foto)) {
                    unlink($foto);
                }
            }
            $avatar      = $this->request->getFile('file');
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/admin/assets/img/foto_pengaduan', $namabaru);
            $data = array(
                'ID_PENGGUNA_APPS'    => $this->request->getPost('ID_PENGGUNA_APPS'),
                'ID_WEB'    => $this->request->getPost('ID_WEB'),
                'ID_KATEGORI_PENGADUAN'    => $this->request->getPost('ID_KATEGORI_PENGADUAN'),
                'JUDUL_PENGADUAN'    => $this->request->getPost('JUDUL_PENGADUAN'),
                'ISI_PENGADUAN'    => $this->request->getPost('ISI_PENGADUAN'),
                'TEMPAT_KEJADIAN'    => $this->request->getPost('TEMPAT_KEJADIAN'),
                'FOTO_PENGADUAN'    => "docs/admin/assets/img/foto_pengaduan/" . $namabaru
            );
        }
        if ($model->update_data($data, $id)) {
            return $this->respond(array("result" => $data, 200));
        } else {
            return $this->fail('Data ini dipakai di tabel lain dan tidak bisa diubah', 400);
        }
    }
}