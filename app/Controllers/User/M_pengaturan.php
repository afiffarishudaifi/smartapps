<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Model_pengguna_web;
use App\Models\Model_dashboard_user;

class M_pengaturan extends BaseController
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
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }
        $id = $session->get('id_login');
        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);

        $model = new Model_pengguna_web();
        $encrypter = \Config\Services::encrypter();
        $pengguna_web_pass = $model->detail_data_password($id);
        $pass = $pengguna_web_pass['password'];
        $pengguna_web = $model->detail_data($id);
        $data =
            [
                'judul' => 'Pengaturan Akun',
                'page_header' => 'Pengaturan Akun',
                'panel_title' => 'Pengaturan Akun',
                'web' => $pengguna_web,
                'password' => $pass,
                'validation' => \Config\Services::validation(),
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
                'jml_penanganan' => $jumlah_penanganan
            ];
        return view('user/vPengaturan', $data);
    }

    public function pengaturan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        helper(['form', 'url']);
        $model = new Model_pengguna_web();

        $id = $this->request->getVar('id_web');

        // cek email, username
        $pengguna_web = $model->detail_data($id);
        if ($pengguna_web['USERNAME_WEB'] == $this->request->getVar('username_web')) {
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
            return redirect()->to(base_url('User/M_pengaturan'))->withInput()->with('validation', $validation);
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
            return redirect()->to(base_url('Dashboard/Login/logout'));
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

            return redirect()->to(base_url('Dashboard/Login/logout'));
        }
    }
}