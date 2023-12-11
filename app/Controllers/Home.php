<?php

namespace App\Controllers;

class Home extends BaseController
{

    protected $cache;

    public function __construct()
    {
        // Menggunakan dependency injection untuk mendapatkan layanan cache
        $this->cache = \Config\Services::cache();

        // Membersihkan semua cache
        $this->cache->clean();
    }

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

    public function pdfReader()
    {
        $id_buku = $this->request->getPost('id_buku');
        $result = $this->detailModel->getPathAndStatusById($id_buku);

        if ($result) {
            $path = $result['path'];
            $data = [
                'path' => $path,
                'title' => 'Halaman Buku',
            ];
            if ($result['status_premium'] == '1' && (in_groups('admin') || in_groups('membership_user'))) {
                return view('readerpremium', $data);
            }else if($result['status_premium'] == '1' && !(in_groups('admin') || in_groups('membership_user'))){
                session()->setFlashdata('nonpremium', true);
                return view('Transaction/membership');


            } 
            else {

                return view('reader', $data);
            }

        } else {
            return 'id buku tidak ditemukan';
        }
    }




}
