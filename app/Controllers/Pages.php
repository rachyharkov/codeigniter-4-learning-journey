<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | My Webshet'
        ];
        echo view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | My Webshet'
        ];

        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact | My Webshet',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'jl. abc no. 123',
                    'kota' => 'bandung'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'jl. setiabudi no. 193',
                    'kota' => 'bandung'
                ]
            ]
        ];

        echo view('pages/contact', $data);
    }
}
