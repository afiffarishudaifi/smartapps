<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_pengguna_apps;
use App\Models\Model_dashboard;

class M_pengguna_apps extends BaseController
{

    protected $Model_pengguna_apps;
    public function __construct()
    {
        $this->Model_pengguna_apps = new Model_pengguna_apps();
        helper('form');
    }

    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_pengguna_apps();
        $apps = $model->view_data();
        $data = [
            'judul' => 'Manajemen Pengguna Apps',
            'page_header' => 'Manajemen Pengguna Apps',
            'panel_title' => 'Tabel Pengguna Apps',
            'apps' => $apps,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vPenggunaApps', $data);
    }

    public function form_tambah()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        };

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        session();
        $data =
            [
                'judul' => 'Form Tambah Pengguna Apps',
                'page_header' => 'Form Tambah Pengguna Apps',
                'panel_title' => 'Form Pengguna Apps',
                'validation' => \Config\Services::validation(),
                'jml_tempat' => $jumlah_pengajuan_tempat,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan
            ];
        return view('backend/vAddPenggunaApps', $data);
    }

    public function add_pengguna_apps()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        helper(['form', 'url']);
        $image = \Config\Services::image();
        $encrypter = \Config\Services::encrypter();

        if (!$this->validate([
            'ktp' => 'required|is_unique[t_pengguna_apps.KTP]',
            'username' => 'required|is_unique[t_pengguna_apps.USERNAME_PENGGUNA_APPS]',
            'password' => 'required',
            'email' => 'required|is_unique[t_pengguna_apps.EMAIL_PENGGUNA_APPS]|valid_email'
            // 'file'=> 'mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,2048]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('public/Dashboard/M_pengguna_apps/form_tambah'))->withInput()->with('validation', $validation);
        }

        $avatar      = $this->request->getFile('file');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/admin/assets/img/foto_pengguna_apps', $namabaru);
        $data = array(
            'ktp'     => $this->request->getVar('ktp'),
            'username'    => $this->request->getVar('username'),
            'password'    => $this->request->getVar('password'),
            'email'   => $this->request->getVar('email'),
            'nama_lengkap'   => $this->request->getVar('nama_lengkap'),
            'no_hp'   => $this->request->getVar('no_hp'),
            'alamat'   => $this->request->getVar('alamat'),
            'file'      => $this->request->getFile('file'),
            'filename' => "docs/admin/assets/img/foto_pengguna_apps/" . $namabaru
        );

        $model = new Model_pengguna_apps();
        $gambar = 'docs/admin/assets/img/foto_pengguna_apps/' . $namabaru;
        $model->add_data($data, $gambar);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');

        if (file_exists($gambar)) {
            unlink($gambar);
        }

        return redirect()->to(base_url('public/Dashboard/M_pengguna_apps'));
    }

    public function detail_pengguna_apps($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $encrypter = \Config\Services::encrypter();
        $model = new Model_pengguna_apps();
        $pengguna_apps_pass = $model->detail_data_password($id);
        $pass = $pengguna_apps_pass['password'];
        $pengguna_apps = $model->detail_data($id);
        $data =
            [
                'judul' => 'Form Ubah Pengguna Apps',
                'page_header' => 'Form Ubah Pengguna Apps',
                'panel_title' => 'Form Pengguna Apps',
                'apps' => $pengguna_apps,
                'password' => $pass,
                'validation' => \Config\Services::validation(),
                'jml_tempat' => $jumlah_pengajuan_tempat,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan
            ];
        return view('backend/vUpdatePenggunaApps', $data);
    }

    public function update_pengguna_apps()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }
        if (isset($_POST['edit'])) {
            helper(['form', 'url']);
            $model = new Model_pengguna_apps();
            $id = $this->request->getVar('id_pengguna_apps');

            // cek ktp, username
            $pengguna_apps = $model->detail_data($id);
            if ($pengguna_apps['KTP'] == $this->request->getVar('ktp')) {
                $rule_ktp = 'required';
            } else {
                $rule_ktp = 'required|is_unique[t_pengguna_apps.KTP]';
            }

            if ($pengguna_apps['USERNAME_PENGGUNA_APPS'] == $this->request->getVar('username')) {
                $rule_username = 'required';
            } else {
                $rule_username = 'required|is_unique[t_pengguna_apps.USERNAME_PENGGUNA_APPS]';
            }
            // end cek ktp, username

            if (!$this->validate([
                'ktp' => $rule_ktp,
                'username' => $rule_username
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('public/Dashboard/M_pengguna_apps/detail_pengguna_apps' . '/' . $id))->withInput()->with('validation', $validation);
            }

            $file = $this->request->getFile('file');
            if ($file == '') {
                $data = array(
                    'ktp'     => $this->request->getVar('ktp'),
                    'username'    => $this->request->getVar('username'),
                    'password'    => $this->request->getVar('password'),
                    'email'   => $this->request->getVar('email'),
                    'nama_lengkap'   => $this->request->getVar('nama_lengkap'),
                    'no_hp'   => $this->request->getVar('no_hp'),
                    'alamat'   => $this->request->getVar('alamat'),
                    'file' => $this->request->getFile('file')
                );
                $model->update_data($data, $id);
                $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
                return redirect()->to(base_url('public/Dashboard/M_pengguna_apps'));
            } else {
                $avatar      = $this->request->getFile('file');
                $namabaru     = $avatar->getRandomName();
                $avatar->move('docs/admin/assets/img/foto_pengguna_apps', $namabaru);
                $data = array(
                    'ktp'     => $this->request->getVar('ktp'),
                    'username'    => $this->request->getVar('username'),
                    'password'    => $this->request->getVar('password'),
                    'email'   => $this->request->getVar('email'),
                    'nama_lengkap'   => $this->request->getVar('nama_lengkap'),
                    'no_hp'   => $this->request->getVar('no_hp'),
                    'alamat'   => $this->request->getVar('alamat'),
                    'file'      => $this->request->getFile('file'),
                    'foto' =>   $this->request->getVar('foto'),
                    'filename' => "docs/admin/assets/img/foto_pengguna_apps/" . $namabaru,
                    'gambar' => 'docs/admin/assets/img/foto_pengguna_apps/' . $namabaru
                );
                $gambar = 'docs/admin/assets/img/foto_pengguna_apps/' . $namabaru;
                $model->update_data($data, $id);
                $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');

                if (file_exists($gambar)) {
                    unlink($gambar);
                }

                return redirect()->to(base_url('public/Dashboard/M_pengguna_apps'));
            }
        } else {
            return redirect()->to('public/Dashboard/M_pengguna_apps');
        }
    }

    public function delete_pengguna_apps()
    {
        $session = session();
        $model = new Model_pengguna_apps();
        $id = $this->request->getVar('id_pengguna');
        $foreign_1 = $model->cek_foreign_1($id);
        $foreign_2 = $model->cek_foreign_2($id);
        $foreign_3 = $model->cek_foreign_3($id);
        if ($foreign_1 == 0 && $foreign_2 == 0 && $foreign_3 == 0) {
            $model->delete_data($id);
            $session = session();
            $session->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('sukses', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }

        return redirect()->to('/smartapps/public/Dashboard/M_pengguna_apps');
    }
}