<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
        // echo 'hello worlddddddd';
    }

    public function about($about)
    {
        echo 'ini halaman about ' . $about;
    }
}
