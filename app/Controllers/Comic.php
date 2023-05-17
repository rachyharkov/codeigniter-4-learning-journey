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

        // echo '
        //     <script type="text/javascript">
        //         const toastLiveExample = document.getElementById("liveToast")

        //         const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        //         toastBootstrap.show()

        //         window.location.href = "' . base_url('comic') . '";
        //     </script>
        // ';

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/comic');
    }
}
