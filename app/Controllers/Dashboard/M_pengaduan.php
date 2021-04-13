<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_pengaduan;
use App\Models\Model_dashboard;

class M_pengaduan extends BaseController
{

    protected $Model_pengaduan;
    public function __construct()
    {
        $this->Model_pengaduan = new Model_pengaduan();
        helper('form');
    }

    public function index()
    {
        $session = session();
        
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        

        $model = new Model_pengaduan();
        $pengaduan = $model->view_data();
        $data = [
            'judul' => 'Manajemen Pengaduan',
            'page_header' => 'Manajemen Pengaduan',
            'panel_title' => 'Tabel Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vPengaduan', $data);
    }

    public function index_user($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        

        $model = new Model_pengaduan();
        $pengaduan = $model->view_data_user($id)->getResultArray();
        $data = [
            'judul' => 'Manajemen Pengaduan',
            'page_header' => 'Manajemen Pengaduan',
            'panel_title' => 'Tabel Pengaduan',
            'pengaduan' => $pengaduan,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vPengaduan', $data);
    }

    public function form_tambah()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        };

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        session();
        $data =
        [
            'judul' => 'Form Tambah Pengaduan',
            'page_header' => 'Form Tambah Pengaduan',
            'panel_title' => 'Form Pengaduan',
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vAddPengaduan', $data);
    }

    public function add_pengaduan()
    {
        $session = session();
       if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        helper(['form', 'url']);
        $image = \Config\Services::image();
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->validate([
            'file'=> 'mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,1024]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_pengaduan/form_tambah'))->withInput()->with('validation', $validation);
        }

        $avatar      = $this->request->getFile('file');
        $nama      = $this->request->getFile('file')->getName();
        if (empty($nama)) {
            $data = array(
                'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps'),
                'id_web'    => $this->request->getVar('id_web'),
                'id_kategori_pengaduan'    => $this->request->getVar('id_kategori_pengaduan'),
                'judul_pengaduan'    => $this->request->getVar('judul_pengaduan'),
                'isi_pengaduan'    => $this->request->getVar('isi_pengaduan'),
                'waktu_pengaduan'    => date('Y-m-d H:i:s'),
                'tempat_kejadian'    => $this->request->getVar('tempat_kejadian'),
                'tipe_pengaduan'    => $this->request->getVar('tipe_pengaduan'),
                'status_pengaduan'    => $this->request->getVar('status_pengaduan'),
                'filename' => ''
            );
        } else {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/admin/assets/img/foto_pengaduan', $namabaru);

            $data = array(
                'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps'),
                'id_web'    => $this->request->getVar('id_web'),
                'id_kategori_pengaduan'    => $this->request->getVar('id_kategori_pengaduan'),
                'judul_pengaduan'    => $this->request->getVar('judul_pengaduan'),
                'isi_pengaduan'    => $this->request->getVar('isi_pengaduan'),
                'waktu_pengaduan'    => date('Y-m-d H:i:s'),
                'tempat_kejadian'    => $this->request->getVar('tempat_kejadian'),
                'tipe_pengaduan'    => $this->request->getVar('tipe_pengaduan'),
                'status_pengaduan'    => $this->request->getVar('status_pengaduan'),
                'file'      => $this->request->getFile('file'),
                'filename' => "docs/admin/assets/img/foto_pengaduan/" . $namabaru
            );
        }
        $model = new Model_pengaduan();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        if ($data['filename'] != "") {
            if (file_exists($data['filename'])) {
                unlink($data['filename']);
            }
        }
        return redirect()->to(base_url('Dashboard/M_pengaduan'));
    }

    public function detail_pengaduan($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_pengaduan();
        $pengaduan = $model->detail_data($id);
        $data =
        [
            'judul' => 'Form Ubah Pengaduan',
            'page_header' => 'Form Ubah Pengaduan',
            'panel_title' => 'Form Pengaduan',
            'pengaduan' => $pengaduan,
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vUpdatePengaduan', $data);
    }

    public function update_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        if (isset($_POST['edit'])) {
            helper(['form', 'url']);
            $image = \Config\Services::image();
            $model = new Model_pengaduan();

            $id = $this->request->getVar('id_pengaduan');
            $file = $this->request->getFile('file');
            if ($file == '') {
                $data = array(
                    'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps'),
                    'id_web'    => $this->request->getVar('id_web'),
                    'id_kategori_pengaduan'    => $this->request->getVar('id_kategori_pengaduan'),
                    'judul_pengaduan'    => $this->request->getVar('judul_pengaduan'),
                    'isi_pengaduan'    => $this->request->getVar('isi_pengaduan'),
                    'waktu_pengaduan'    => date('Y-m-d H:i:s'),
                    'tempat_kejadian'    => $this->request->getVar('tempat_kejadian'),
                    'tipe_pengaduan'    => $this->request->getVar('tipe_pengaduan'),
                    'status_pengaduan'    => $this->request->getVar('status_pengaduan'),
                    'file'    => $this->request->getFile('file')
                );
                $model->update_data($data, $id);
            } else {
                $foto = $this->request->getVar('foto');
                if ($foto != "") {
                    if (file_exists($foto)) {
                        unlink($foto);
                    }
                }
                $avatar      = $this->request->getFile('file');
                $namabaru     = $avatar->getRandomName();
                $avatar->move('docs/admin/assets/img/foto_pengaduan', $namabaru);
                $data = array(
                    'id_pengguna_apps'    => $this->request->getVar('id_pengguna_apps'),
                    'id_web'    => $this->request->getVar('id_web'),
                    'id_kategori_pengaduan'    => $this->request->getVar('id_kategori_pengaduan'),
                    'judul_pengaduan'    => $this->request->getVar('judul_pengaduan'),
                    'isi_pengaduan'    => $this->request->getVar('isi_pengaduan'),
                    'waktu_pengaduan'    => date('Y-m-d H:i:s'),
                    'tempat_kejadian'    => $this->request->getVar('tempat_kejadian'),
                    'tipe_pengaduan'    => $this->request->getVar('tipe_pengaduan'),
                    'status_pengaduan'    => $this->request->getVar('status_pengaduan'),
                    'file'    => "docs/admin/assets/img/foto_pengaduan/" . $namabaru,
                    'foto' =>   $this->request->getVar('foto'),
                    'filename' => "docs/admin/assets/img/foto_pengaduan/" . $namabaru,
                    'gambar' => 'docs/admin/assets/img/foto_pengaduan/' . $namabaru
                );
                $model->update_data($data, $id);
                if (file_exists($data['gambar'])) {
                    unlink($data['gambar']);
                }
            }
            $session->setFlashdata('sukses', 'Data sudah berhasil Diubah');
            return redirect()->to(base_url('Dashboard/M_pengaduan'));
        } else {
            return redirect()->to('Dashboard/M_pengaduan');
        }
    }

    public function delete_pengaduan()
    {
        $model = new Model_pengaduan();
        $id = $this->request->getVar('id_pengaduan');
        $model->delete_data($id);
        $session = session();
        $session->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/smartapps/Dashboard/M_pengaduan');
    }

    // ======= KATEGORI PENGADUAN ======= //
    // ======= DINAS ======= //

    public function data_web()
    {
        $model = new Model_pengaduan();
        $data_web = $model->view_data_web();
        $respon = json_decode(json_encode($data_web), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_WEB'];
            $isi['text'] = $value['NAMA_WEB'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }
    // ======= DINAS ======= //
    // ======= PENGGUNA APPS ======= //

    public function data_pengguna_apps()
    {
        $model = new Model_pengaduan();
        $data_pengguna_apps = $model->view_data_pengguna_apps();
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
    // ======= KATEGORI PENGADUAN ======= //

    public function data_kategori_pengaduan()
    {
        $model = new Model_pengaduan();
        $data_kategori_pengaduan = $model->view_data_kategori_pengaduan();
        $respon = json_decode(json_encode($data_kategori_pengaduan), true);
        $data['results'] = array();

        foreach ($respon as $value) {
            $isi['id'] = $value['ID_KATEGORI_PENGADUAN'];
            $isi['text'] = $value['NAMA_KATEGORI_PENGADUAN'];
            array_push($data['results'], $isi);
        }
        echo json_encode($data);
    }

    // ======= KATEGORI PENGADUAN ======= //

    // ======= DETAIL DROPDOWN ======= //
    public function data_edit_dropdown($id)
    {
        $model = new Model_pengaduan();
        $data_dropdown = $model->data_edit_dropwdown($id);
        $respon = json_decode(json_encode($data_dropdown), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_kategori_pengaduan'] = $value['ID_KATEGORI_PENGADUAN_DETAIL'];
            $isi['nama_kategori_pengaduan'] = $value['NAMA_KATEGORI_PENGADUAN'];
            $isi['id_web'] = $value['ID_WEB_DETAIL'];
            $isi['nama_web'] = $value['NAMA_WEB'];
            $isi['id_pengguna_apps'] = $value['ID_PENGGUNA_APPS_DETAIL'];
            $isi['nama_lengkap_apps'] = $value['NAMA_LENGKAP_APPS'];
        endforeach;
        echo json_encode($isi);
    }
    // ======= DETAIL DROPDOWN ======= //

}