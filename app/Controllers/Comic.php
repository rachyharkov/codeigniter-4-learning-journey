<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComicModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
        // dd($komik);

        $data = [
            'title' => 'Detail Comic | My Webshet',
            'comic' => $this->comicModel->getComic($slug)
        ];

        if (empty($data['comic'])) {
            throw new PageNotFoundException('Comic ' . $slug . ' not found.');
        }

        return view('comic/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Comic | My Webshet',
        ];

        return view('comic/create', $data);
    }

    public function save()
    {
        $request = $this->request->getVar();
        $this->comicModel->save([
            'title' => $request['title'],
            'slug' => url_title($request['title'], '-', true),
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'volume' => $request['volume'],
            'description' => $request['description'],
            'cover' => $request['cover']
        ]);

        return redirect()->to('/comic');
    }
}
