<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_login;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('username_login') && $session->get('level_login') == 'Admin') {
            return redirect()->to('/smartapps/Dashboard/Dashboard');
        } else if ($session->get('username_login') && $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/User/Dashboard');
        }

        helper(['form']);
        $data = [
            'judul' => 'Login || SIMPELDAT'
        ];
        return view('backend/vLogin', $data);
    }

    public function login()
    {
        $session = session();
        $model = new Model_login();
        $encrypter = \Config\Services::encrypter();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->get_login($username);
        if ($data) {
            $pass = $data['PASSWORD_WEB'];
            $verify_pass =  $encrypter->decrypt(base64_decode($pass));
            if ($verify_pass == $password) {
                $ses_data = [
                    'id_login'       => $data['ID_WEB'],
                    'username_login'     => $data['USERNAME_WEB'],
                    'nama_login'    => $data['NAMA_WEB'],
                    'foto_login'    => $data['FOTO_WEB'],
                    'level_login'    => 'User',
                    'logged_in'     => TRUE,
                    'is_admin'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/smartapps/Dashboard/Dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Tidak Sesuai');
                return redirect()->to('/smartapps/Dashboard/Login');
            }
        } else {
            $data_admin = $model->get_login_admin($username);
            if ($data_admin) {
                $pass = $data_admin['PASSWORD'];
                $verify_pass =  $encrypter->decrypt(base64_decode($pass));
                if ($verify_pass == $password) {
                    $ses_data = [
                        'id_login'       => $data_admin['ID_USER'],
                        'username_login'     => $data_admin['USERNAME'],
                        'nama_login'    => 'Admin',
                        'foto_login'    => $data_admin['FOTO'],
                        'level_login'    => 'Admin',
                        'logged_in'     => TRUE,
                        'is_admin'     => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/smartapps/Dashboard/Dashboard');
                } else {
                    $session->setFlashdata('msg', 'Password Tidak Sesuai');
                    return redirect()->to('/smartapps/Dashboard/Login');
                }
            } else {
                $session->setFlashdata('msg', 'Username Tidak di Temukan');
                return redirect()->to('/smartapps/Dashboard/Login');
            }
        }
    }

    public function resetPassword()
    {

        session();
        $data = [
            'judul' => 'Reset Password || SIMPELDAT',
            'validation' => \Config\Services::validation()
        ];
        return view('backend/vResetPassword', $data);
    }

    public function check()
    {
        $model = new Model_login();
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        helper(['form', 'url']);
        if (!$this->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'repassword' => 'required|matches[password]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('Dashboard/Login/resetPassword'))->withInput()->with('validation', $validation);
        }

        $data_cek = $model->cek_user($email, $username);
        if ($data_cek) {
            $id = $data_cek['ID_WEB'];
            $data = [
                'username' => $username,
                'password' => $password,
                'email' => $email
            ];
            $reset = $model->reset_password($id, $data);
            $session->setFlashdata('sukses', 'Password Sudah Berhasil Diubah');
            return redirect()->to(base_url('Dashboard/Login/resetPassword'));
        } else {
            $session->setFlashdata('msg', 'Username Tidak di Temukan');
            return redirect()->to(base_url('Dashboard/Login/resetPassword'))->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/smartapps/Dashboard/Login');
    }
}