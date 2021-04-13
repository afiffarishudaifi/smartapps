<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Contactus extends BaseController
{

	public function __construct()
	{
        helper(['form']);
      	$this->email = \Config\Services::email();
	}

    public function index()
    {
        $data = [
            'judul' => 'Color Admin | Blog Concept Front End Theme'
        ];
        return view('frontend/vContactus', $data);
    }

     public function send_mail()
    {

        $subject= $this->request->getVar('nama');
        $to = $this->request->getVar('email');
        $message = $this->request->getVar('komentar');
      // Konfigurasi email
      

		$this->email->setFrom($to, $subject);
		$this->email->setTo('afiffaris5@gmail.com');

		$this->email->setSubject('Admin mendapat pesan dari' . ' ' . $subject);
		$this->email->setMessage($message);

		if ($this->email->send()) {
			// session()->setFlashdata('error', 'Send Email successfully');
            return redirect()->to('/smartapps/Frontend/Contactus');
			// return true;
		} else {
			session()->setFlashdata('error', "Send Email failed. Error: ");
            return redirect()->to('/smartapps/Frontend/Contactus');
			// return 'gagal';
		}
    }
}