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

        // dd($data['validation']->getErrors());

        return view('comic/create', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => 'Terdeteksi bahwa {field} yang diisi sudah ada, silahkan isi {field} dengan nama lain.'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'volume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'cover' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/comic/create')->withInput()->with('validation', $validation);
        }

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

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/comic');
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/comic');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Comic | My Webshet',
            'comic' => $this->comicModel->getComic($slug),
            'validation' => \Config\Services::validation()
        ];

        return view('comic/edit', $data);
    }

    public function update($id)
    {
        $oldComic = $this->comicModel->getComic($this->request->getVar('slug'));
        if($oldComic['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[comics.title]';
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        if(!$this->validate([
            'title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => 'Terdeteksi bahwa {field} yang diisi sudah ada, silahkan isi {field} dengan nama lain.'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'volume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'cover' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/comic/edit/'.$oldComic['slug'])->withInput()->with('validation', $validation);
        }

        $this->comicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'volume' => $this->request->getVar('volume'),
            'description' => $this->request->getVar('description'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/comic');
    }
}
