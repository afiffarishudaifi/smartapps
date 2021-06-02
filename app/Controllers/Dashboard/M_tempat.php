<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_tempat;
use App\Models\Model_dashboard;

class M_tempat extends BaseController
{
    protected $Model_tempat;
    public function __construct()
    {
        $this->Model_tempat = new Model_tempat();
        helper(['form', 'url']);
    }

    // ======= TEMPAT ======= //
    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_tempat();
        $tempat = $model->view_tempat();
        $data = [
            'judul' => 'Manajemen Tempat',
            'page_header' => 'Manajemen Tempat',
            'panel_title' => 'Tabel Tempat',
            'tempat' => $tempat,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vTempat', $data);
    }

    public function add_tempat()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        if (isset($_POST['tambah'])) {
            $image = \Config\Services::image();

            $validated =  $this->validate([
                'file'         => [
                    'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[file,4096]',
                ]
            ]);

            if ($validated) {
                $model = new Model_tempat();

                $data = array(
                    'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps'),
                    'id_kategori_tempat'   => $this->request->getVar('id_kategori_tempat'),
                    'nama_tempat'   => $this->request->getVar('nama_tempat'),
                    'long_tempat'   => $this->request->getVar('long_tempat'),
                    'lat_tempat'   => $this->request->getVar('lat_tempat'),
                    'alamat_tempat'   => $this->request->getVar('alamat_tempat'),
                    'deskripsi_tempat'   => $this->request->getVar('deskripsi_tempat'),
                    'no_telp_tempat'   => $this->request->getVar('no_telp_tempat'),
                    'status_tempat'   => $this->request->getVar('status_tempat')
                );
                $model->add_data($data);
                $query_max = $model->data_max_id();
                $id_max = $query_max[0]['ID_TEMPAT'];
                if($imagefile = $this->request->getFiles())
                {
                    foreach($imagefile['file'] as $img)
                    {
                      if ($img->isValid() && ! $img->hasMoved())
                        {
                            $namabaru     = $img->getRandomName();
                            $img->move('docs/admin/assets/img/foto_tempat', $namabaru);
                            $data = array(
                                'id_tempat'     => $id_max,
                                'file'      => "docs/admin/assets/img/foto_tempat/" . $namabaru,
                                'nama_file'      => "docs/admin/assets/img/foto_tempat/" . $namabaru
                            );
                            $model->add_data_foto($data);
                        } 
                    }
                }
                $session->setFlashdata('sukses', 'Data telah berhasil ditambah');                
                return redirect()->to(base_url('Dashboard/M_tempat'));
            } else {
                session()->setFlashdata('eror', \Config\Services::validation()->listErrors());
                $model = new Model_tempat();
                $data =
                [
                    'judul' => 'Form Tambah Tempat',
                    'page_header' => 'Form Tambah Tempat',
                    'panel_title' => 'Tabel Tempat',
                    'jml_tempat' => $jumlah_pengajuan_tempat,
                    'jml_pengaduan' => $jumlah_pengajuan_pengaduan
                ];
                return view('backend/vAddTempat', $data);
            }
        } else {
            $model = new Model_tempat();
            $pengguna_apps = $model->data_pengguna_apps();
            $data =
                [
                    'judul' => 'Form Tambah Tempat',
                    'page_header' => 'Form Tambah Tempat',
                    'panel_title' => 'Form Tambah Tempat',
                    'pengguna_apps' => $pengguna_apps,
                    'jml_tempat' => $jumlah_pengajuan_tempat,
                    'jml_pengaduan' => $jumlah_pengajuan_pengaduan
                ];
            return view('backend/vAddTempat', $data);
        }
    }

    public function detail_tempat($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_tempat();
        $tempat = $model->detail_data($id);
        $data = 
        [
            'judul' => 'Form Ubah Tempat',
            'page_header' => 'Form Ubah Tempat',
            'panel_title' => 'Form Ubah Tempat',
            'tempat' => $tempat,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vUpdateTempat', $data);
    }

    public function update_tempat()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        if (isset($_POST['edit'])) {
            $id = $this->request->getVar('id_tempat');
            $data = array(
                'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps'),
                'id_kategori_tempat'   => $this->request->getVar('id_kategori_tempat'),
                'nama_tempat'   => $this->request->getVar('nama_tempat'),
                'long_tempat'   => $this->request->getVar('long_tempat'),
                'lat_tempat'   => $this->request->getVar('lat_tempat'),
                'alamat_tempat'   => $this->request->getVar('alamat_tempat'),
                'deskripsi_tempat'   => $this->request->getVar('deskripsi_tempat'),
                'no_telp_tempat'   => $this->request->getVar('no_telp_tempat'),
                'status_tempat'   => $this->request->getVar('status_tempat'),
                'id_tempat' => $id
            );
            $model = new Model_tempat();
            $model->update_data($data, $id);
            $session->setFlashdata('sukses', 'Data telah berhasil diubah');
            return redirect()->to(base_url('Dashboard/M_tempat'));
        } else {
            $model = new Model_tempat();
            $tempat = $model->detail_data($id);
            $data = 
            [
                'judul' => 'Form Ubah Tempat',
                'page_header' => 'Form Ubah Tempat',
                'panel_title' => 'Form Ubah Tempat',
                'tempat' => $tempat,
                'jml_tempat' => $jumlah_pengajuan_tempat,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan
            ];
            return view('backend/vUpdateTempat', $data);
        }
    }

    public function delete_tempat()
    {
        $model = new Model_tempat();
        $id = $this->request->getVar('id_tempat');
        $model->delete_data($id);
        $session = session();
        $session->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/smartapps/Dashboard/M_tempat');
    }

    // ======= TEMPAT ======= //


    // ======= PENGGUNA APPS ======= //

    public function data_pengguna_apps()
    {
        $model = new Model_tempat();
        $data_pengguna_apps = $model->data_pengguna_apps();
        $respon = json_decode(json_encode($data_pengguna_apps), true);
        $data['results'] = array();
        foreach ($respon as $value) {
            $isi['id'] = $value['ID_PENGGUNA_APPS'];
            $isi['text'] = $value['NAMA_LENGKAP_APPS'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }
    // ======= PENGGUNA APPS ======= //


    // ======= PENGGUNA APPS ======= //
    public function data_kategori_tempat()
    {
        $model = new Model_tempat();
        $data_kategori_tempat = $model->data_kategori_tempat();
        $respon = json_decode(json_encode($data_kategori_tempat), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_KATEGORI_TEMPAT'];
            $isi['text'] = $value['NAMA_KATEGORI_TEMPAT'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }
    // ======= PENGGUNA APPS ======= //

    // ======= DETAIL DROPDOWN ======= //
    public function data_edit_dropdown($id)
    {
        $model = new Model_tempat();
        $data_dropdown = $model->data_edit_dropwdown($id);
        $respon = json_decode(json_encode($data_dropdown), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_kategori_tempat'] = $value['ID_KATEGORI_TEMPAT_DETAIL'];
            $isi['nama_kategori_tempat'] = $value['NAMA_KATEGORI_TEMPAT'];
            $isi['id_pengguna_apps'] = $value['ID_PENGGUNA_APPS_DETAIL'];
            $isi['nama_lengkap_apps'] = $value['NAMA_LENGKAP_APPS'];
        endforeach;
        echo json_encode($isi);
    }
    // ======= DETAIL DROPDOWN ======= //


}