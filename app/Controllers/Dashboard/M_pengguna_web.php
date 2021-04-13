<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_pengguna_web;
use App\Models\Model_dashboard;

class M_pengguna_web extends BaseController
{

    protected $Model_pengguna_web;
    public function __construct()
    {
        $this->Model_pengguna_web = new Model_pengguna_web();
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
        
        $model = new Model_pengguna_web();
        $web = $model->view_data();
        $data = [
            'judul' => 'Manajemen Pengguna Web',
            'page_header' => 'Manajemen Pengguna Web',
            'panel_title' => 'Tabel Pengguna Web',
            'web' => $web,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vPenggunaWeb', $data);
    }

    public function form_tambah()
    {
        session();
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $data =
        [
            'judul' => 'Form Tambah Pengguna Web',
            'page_header' => 'Form Tambah Pengguna Web',
            'panel_title' => 'Form Pengguna Web',
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vAddPenggunaWeb', $data);
    }

    public function add_pengguna_web()
    {
        $session = session();
       if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        helper(['form', 'url']);
        $image = \Config\Services::image();
        $encrypter = \Config\Services::encrypter();
        if (!$this->validate([
            'username_web' => 'required|is_unique[t_pengguna_web.USERNAME_WEB]',
            'password_web' => 'required',
            'email_web' => 'required|is_unique[t_pengguna_web.EMAIL_WEB]|valid_email',
            'nama_web' => 'required',
            'no_telp_web' => 'required',
            'alamat_web' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/M_pengguna_web/form_tambah'))->withInput()->with('validation', $validation);
        }

        $avatar      = $this->request->getFile('file');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/admin/assets/img/foto_pengguna_web', $namabaru);
        $data = array(
            'username_web'    => $this->request->getVar('username_web'),
            'password_web'    => $this->request->getVar('password_web'),
            'nama_web'   => $this->request->getVar('nama_web'),
            'email_web'   => $this->request->getVar('email_web'),
            'no_telp_web'   => $this->request->getVar('no_telp_web'),
            'alamat_web'   => $this->request->getVar('alamat_web'),
            'file'      => $this->request->getFile('file'),
            'filename' => "docs/admin/assets/img/foto_pengguna_web/" . $namabaru
        );
        $model = new Model_pengguna_web();
        $gambar = 'docs/admin/assets/img/foto_pengguna_web/' . $namabaru;
        $model->add_data($data, $gambar);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');

        if (file_exists($gambar)) {
            unlink($gambar);
        }

        return redirect()->to(base_url('Dashboard/M_pengguna_web'));
    }

    public function detail_pengguna_web($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();
        
        $model = new Model_pengguna_web();
        $encrypter = \Config\Services::encrypter();
        $pengguna_web_pass = $model->detail_data_password($id);
        $pass = $pengguna_web_pass['password'];
        $pengguna_web = $model->detail_data($id);
        if (empty($pengguna_web)) {
            throw new \CodeIgniter\Exceptions\PageNotfoundException('Data Tidak Ditemukan');
        }
        $data =
        [
            'judul' => 'Form Ubah Pengguna Web',
            'page_header' => 'Form Ubah Pengguna Web',
            'panel_title' => 'Form Pengguna Web',
            'web' => $pengguna_web,
            'password' => $pass,
            'validation' => \Config\Services::validation(),
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vUpdatePenggunaWeb', $data);
    }

    public function update_pengguna_web()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        if (isset($_POST['edit'])) {
            helper(['form', 'url']);
            $image = \Config\Services::image();
            $encrypter = \Config\Services::encrypter();
            $model = new Model_pengguna_web();

            $id = $this->request->getVar('id_web');

            // cek email, username
            $pengguna_web = $model->detail_data($id);
            if($pengguna_web['USERNAME_WEB'] == $this->request->getVar('username_web')) {
                $rule_username = 'required';
            } else {
                $rule_username = 'required|is_unique[t_pengguna_web.USERNAME_WEB]';
            }

            if ($pengguna_web['EMAIL_WEB'] == $this->request->getVar('email_web')) {
                $rule_email = 'required';
            } else {
                $rule_email = 'required|is_unique[t_pengguna_web.EMAIL_WEB]';
            }
            // end cek email, username

            if (!$this->validate([
                'username_web' => $rule_username,
                'email_web' => $rule_email
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('Dashboard/M_pengguna_web/detail_pengguna_web' . '/' . $id))->withInput()->with('validation', $validation);
            }

            $file = $this->request->getFile('file');
            if ($file == '') {
                $data = array(
                    'username_web'    => $this->request->getVar('username_web'),
                    'password_web'    => $this->request->getVar('password_web'),
                    'nama_web'   => $this->request->getVar('nama_web'),
                    'email_web'   => $this->request->getVar('email_web'),
                    'no_telp_web'   => $this->request->getVar('no_telp_web'),
                    'alamat_web'   => $this->request->getVar('alamat_web'),
                    'file'      => $this->request->getFile('file')
                );
                $model->update_data($data, $id);
                $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
                return redirect()->to(base_url('Dashboard/M_pengguna_web'));
            } else {
                $avatar      = $this->request->getFile('file');
                $namabaru     = $avatar->getRandomName();
                $avatar->move('docs/admin/assets/img/foto_pengguna_web', $namabaru);
                $data = array(
                    'username_web'    => $this->request->getVar('username_web'),
                    'password_web'    => $this->request->getVar('password_web'),
                    'nama_web'   => $this->request->getVar('nama_web'),
                    'email_web'   => $this->request->getVar('email_web'),
                    'no_telp_web'   => $this->request->getVar('no_telp_web'),
                    'alamat_web'   => $this->request->getVar('alamat_web'),
                    'file'      => $this->request->getFile('file'),
                    'foto' =>   $this->request->getVar('foto'),
                    'filename' => "docs/admin/assets/img/foto_pengguna_web/" . $namabaru,
                    'gambar' => 'docs/admin/assets/img/foto_pengguna_web/' . $namabaru
                );
                $model->update_data($data, $id);
                $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');

                if (file_exists($data['gambar'])) {
                    unlink($data['gambar']);
                }
                return redirect()->to(base_url('Dashboard/M_pengguna_web'));
            }
        } else {
            return redirect()->to('Dashboard/M_pengguna_web');
        }
    }

    public function delete_pengguna_web()
    {
        $model = new Model_pengguna_web();
        $id = $this->request->getVar('id_web');
        $session = session();
        $foreign_1 = $model->cek_foreign_1($id);
        $foreign_2 = $model->cek_foreign_2($id);
        if ($foreign_1 == 0 && $foreign_2 == 0) {
            $model->delete_data($id);
            $session = session();
            $session->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('sukses', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }

        return redirect()->to('/smartapps/Dashboard/M_pengguna_web');
    }

    // ======= WEB ======= //

}