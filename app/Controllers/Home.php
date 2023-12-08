<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): string
    {
        $detail = $this->detailModel->getDetail();
        $data = [
            "tittle" => "Halaman Utama",
            "data" => $detail
        ];
        return view('index', $data);
    }
    public function product(): string
    {
        $detail = $this->detailModel->getDetail();
        $data = [
            "data" => $detail
        ];
        return view('product', $data);
    }
    public function about(): string
    {
        return view('about');
    }

    //CRUD
    public function halamanCreate()
    {
        $data = [
            "title" => "Halaman Create"
        ];
        return view('/CRUD/create', $data);
    }
    public function crud(): string
    {
        $detail = $this->detailModel->getDetail();
        $data = [
            "tittle" => "Halaman CRUD",
            "data" => $detail
        ];
        return view('/CRUD/crud', $data);
    }
    public function createBook()
    {
        $validation = \Config\Services::validation();
        //dd($validation);
        $errors = $validation->getErrors();
        $data = [
            "title" => "Create Buku",
            "book" => $book,
            "errors" => $errors,
            'validation' => $validation
        ];
        return view("CRUD/create", $data);
    }
    public function createBookAction()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul,id,{id}]',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'is_unique' => 'Judul sudah digunakan.'
                ]
            ],
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'sinopsis' => 'required',
            'path' => 'required',
            'status_premium' => 'required',
            'sampul' => 'required'
        ])) {
            return redirect()->to(base_url("halamanCreate/"))->withInput()->with('validation_errors', $this->validator->getErrors());
        }
        // ambil gambar
        $fileImage = $this->request->getFile('sampul');
        if ($fileImage->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {
            // generate nama image biar random
            $namaImage = $fileImage->getRandomName();
            // pindahkan gambar Image ke file kita dan pada folder public/img 
            $fileImage->move('covers', $namaImage);
        }

        $judul = $this->request->getVar("judul");
        $pengarang = $this->request->getVar("pengarang");
        $penerbit = $this->request->getVar("penerbit");
        $tahun_terbit = $this->request->getVar("tahun_terbit");
        $sinopsis = $this->request->getVar("sinopsis");
        $path = $this->request->getVar("path");
        $status_premium = $this->request->getVar("status_premium");
        $data = [
            "judul" => $judul,
            "pengarang" => $pengarang,
            "penerbit" => $penerbit,
            "tahun_terbit" => $tahun_terbit,
            "sinopsis" => $sinopsis,
            "path" => $path,
            "sampul" => $namaImage,
            "status_premium" => $status_premium,
        ];

        $this->detailModel->insert($data);
        return redirect()->to(base_url("halamanCreate"));
    }
    public function deleteBook($id)
    {
        $this->detailModel->delete($id);
        return redirect()->to(base_url("/crud"));
    }

    public function detailBuku($id)
    {
        $buku = $this->detailModel->getDetailBook($id);
        $data = [
            "title" => "Detail Buku",
            "buku" => $buku,
        ];
        return view('CRUD/detail', $data);
    }
    public function updateBook($id)
    {
        $book = $this->detailModel->getDetailBook($id);
        $validation = \Config\Services::validation();
        //dd($validation);
        $errors = $validation->getErrors();
        $data = [
            "title" => "Update Buku",
            "book" => $book,
            "errors" => $errors,
            'validation' => $validation
        ];
        return view("CRUD/update", $data);
    }
    public function updateBookAction($id)
    {
        $judul = $this->request->getVar("judul");
        $pengarang = $this->request->getVar("pengarang");
        $penerbit = $this->request->getVar("penerbit");
        $tahun_terbit = $this->request->getVar("tahun_terbit");
        $sinopsis = $this->request->getVar("sinopsis");
        $path = $this->request->getVar("path");
        $status_premium = $this->request->getVar("status_premium");
        $sampul = $this->request->getVar("sampul");

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul,id,{id}]',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'is_unique' => 'Judul sudah digunakan.'
                ]
            ],
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'sinopsis' => 'required',
            'path' => 'required',
            'status_premium' => 'required',
            'sampul' => 'required'
        ])) {
            return redirect()->to(base_url("updateBook/" . $id))->withInput()->with('validation_errors', $this->validator->getErrors());
        }
        

        $data = [
            "judul" => $judul,
            "pengarang" => $pengarang,
            "penerbit" => $penerbit,
            "tahun_terbit" => $tahun_terbit,
            "sinopsis" => $sinopsis,
            "path" => $path,
            "status_premium" => $status_premium,
            "sampul" => $sampul
        ];

        $this->detailModel->updateBook($id, $data);
        return redirect()->to(base_url("updateBook/" . $id));
    }
}
