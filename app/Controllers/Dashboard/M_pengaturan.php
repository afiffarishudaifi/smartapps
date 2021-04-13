<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_admin;
use App\Models\Model_dashboard;

class M_pengaturan extends BaseController
{

    protected $Model_admin;
    public function __construct()
    {
        $this->Model_admin = new Model_admin();
        helper('form');
    }

    public function index()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        $id = $session->get('id_login');
        $model = new Model_dashboard();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan();
        $jumlah_pengajuan_tempat = $model->jumlah_pengajuan_tempat();

        $model = new Model_admin();
        $encrypter = \Config\Services::encrypter();
        $pengguna_admin_pass = $model->detail_data_password($id);
        $pass = $pengguna_admin_pass['password'];
        $pengguna_admin = $model->detail_data($id);
        $data =
            [
                'judul' => 'Pengaturan Akun',
                'page_header' => 'Pengaturan Akun',
                'panel_title' => 'Pengaturan Akun',
                'admin' => $pengguna_admin,
                'password' => $pass,
                'validation' => \Config\Services::validation(),
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
                'jml_tempat' => $jumlah_pengajuan_tempat
            ];
        return view('backend/vPengaturan', $data);
    }

    public function pengaturan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        helper(['form', 'url']);
        $model = new Model_admin();

        $id = $this->request->getVar('id_user');

        // cek username
        $admin = $model->detail_data($id);
        if ($admin['USERNAME'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[t_admin.USERNAME]';
        }
        // end cek username

        if (!$this->validate([
            'username' => $rule_username
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('backend/M_pengaturan'))->withInput()->with('validation', $validation);
        }

        $file = $this->request->getFile('file');
        if ($file == '') {
            $data = array(
                'username'    => $this->request->getVar('username'),
                'password'    => $this->request->getVar('password'),
                'file'      => $this->request->getFile('file')
            );
            $model->update_data($data, $id);
            $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
            return redirect()->to(base_url('Dashboard/Login/logout'));
        } else {
            $avatar      = $this->request->getFile('file');
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/admin/assets/img/foto_admin', $namabaru);
            $data = array(
                'username'    => $this->request->getVar('username'),
                'password'    => $this->request->getVar('password'),
                'file'      => $this->request->getFile('file'),
                'foto' =>   $this->request->getVar('foto'),
                'filename' => "docs/admin/assets/img/foto_admin/" . $namabaru,
                'gambar' => 'docs/admin/assets/img/foto_admin/' . $namabaru
            );
            $model->update_data($data, $id);
            $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');

            if (file_exists($data['gambar'])) {
                unlink($data['gambar']);
            }

            return redirect()->to(base_url('Dashboard/Login/logout'));
        }
    }
}