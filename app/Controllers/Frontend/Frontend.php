<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Model_frontend;

class Frontend extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        $model = new Model_frontend();
        $tempat = $model->view_data_tempat();
        $pengaduan = $model->view_data_pengaduan();
        $data = [
            'judul' => 'Sistem Smartapps dan E-Complaint',
            'tempat' => $tempat,
            'pengaduan' => $pengaduan
        ];
        return view('frontend/vIndex', $data);
    }

    public function detail($id)
    {
    	$data = [
            'judul' => 'Color Admin | Blog Concept Front End Theme'
        ];
        return view('frontend/vPostdetail', $data);
    }

    public function send_mail()
    {

        $subject= $this->request->getVar('nama');
        $to = $this->request->getVar('email');
        $message = $this->request->getVar('komentar');

        $this->email->setFrom($to, $subject);
        $this->email->setTo('afiffaris5@gmail.com');

        $this->email->setSubject('Admin mendapat pesan dari' . ' ' . $subject);
        $this->email->setMessage($message);

        if ($this->email->send()) {
            return redirect()->to('/smartapps/Frontend/Frontend');
        } else {
            session()->setFlashdata('error', "Send Email failed. Error: ");
            return redirect()->to('/smartapps/Frontend/Frontend');
        }
    }
}