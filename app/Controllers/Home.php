<?php

namespace App\Controllers;

class Home extends BaseController
{

    //halaman utama
    public function index(): string
    {
        $detail = $this->detailModel->getDetail();
        $data = [
            "tittle" => "Halaman Utama",
            "data" => $detail
        ];
        return view('index', $data);
    }

    //halaman penampil semua buku
    public function product(): string
    {
        $detail = $this->detailModel->getDetail();
        $data = [
            "data" => $detail
        ];
        return view('product', $data);
    }

    //halaman about
    public function about(): string
    {
        return view('about');
    }

    //CRUD
    public function halamanCreate()
    {
        $data = [
            "tittle" => "Tambah Buku"
        ];
        return view('/CRUD/create', $data);
    }

    //halaman crud
    public function crud(): string
    {
        $detail = $this->detailModel->getDetail();
        $data = [
            "tittle" => "Update Buku",
            "data" => $detail
        ];
        return view('/CRUD/crud', $data);
    }


    //halaman detail buku
    public function detailBuku($id)
    {
        $buku = $this->detailModel->getDetailBook($id);
        $data = [
            "title" => "Detail Buku",
            "buku" => $buku,
        ];
        return view('CRUD/detail', $data);
    }

    public function pdfReader($path)
    {
        $data = [
            'path' => $path,
            'title' => 'Halaman Buku',
        ];
        return view('reader', $data);
    }


}
