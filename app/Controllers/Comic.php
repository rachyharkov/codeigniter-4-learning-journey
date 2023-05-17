<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComicModel;

class Comic extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        $data = [
            'title' => 'My Comic Collection | My Webshet',
            // 'comics' => $this->comicModel->findAll()
            'comics' => $this->comicModel->getComic()
        ];

        // dd($this->comicModel->findAll());

        return view('comic/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->comicModel->getComic($slug);
        // dd($komik);

        $data = [
            'title' => 'Detail Comic | My Webshet',
            'comic' => $komik
        ];

        return view('comic/detail', $data);
    }
}
