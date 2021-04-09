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
            return redirect()->to('/smartapps/public/Dashboard/Dashboard');
        } else if ($session->get('username_login') && $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/public/User/Dashboard');
        }

        helper(['form']);
        $data = [
            'judul' => 'Login || SIPESAR'
        ];
        return view('backend/vLogin', $data);
        // return view('backend/vLogin');
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
                return redirect()->to('/smartapps/public/Dashboard/Dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Tidak Sesuai');
                return redirect()->to('/smartapps/public/Dashboard/Login');
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
                    // dd($ses_data);
                    $session->set($ses_data);
                    return redirect()->to('/smartapps/public/Dashboard/Dashboard');
                } else {
                    $session->setFlashdata('msg', 'Password Tidak Sesuai');
                    return redirect()->to('/smartapps/public/Dashboard/Login');
                }
            } else {
                $session->setFlashdata('msg', 'Username Tidak di Temukan');
                return redirect()->to('/smartapps/public/Dashboard/Login');
            }
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/smartapps/public/Dashboard/Login');
    }
}