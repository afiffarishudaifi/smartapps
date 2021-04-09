<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Model_login;

class Aboutme extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Color Admin | Blog Concept Front End Theme'
        ];
        return view('frontend/vAboutme', $data);
    }
}