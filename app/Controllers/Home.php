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
            "tittle" => "Halaman Create"
        ];
        return view('/CRUD/create',$data);
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
        //$this->session->setFlashData("success", "Mahasiswa has been added");
        return redirect()->to(base_url("halamanCreate"));
    }
    public function deleteBook($id)
    {
        $this->detailModel->delete($id);
        return redirect()->to(base_url("/crud"));
    }
    public function updateBook($id)
    {
        $book = $this->detailModel->getDetailBook($id);

        $data = [
            "title" => "Update Buku",
            "book" => $book,
            //'validation' => \Config\Services::validation()
        ];
        return view("CRUD/update", $data);
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
        // if (!$this->validate([
        //   'nama' => [
        //     'rules' => 'required|is_unique[mahasiswa.nama]',
        //     'error' => [
        //       'required' => '{field} must been inputed form',
        //       'is_unique' => 'sudah digunakan',
        //     ]
        //   ],
        //   'npm' => 'required',
        //   'prodi' => 'required',
        //   'minat' => 'required',
        //   'domisili' => 'required',
        //   'jenis_kelamin' => 'required'
        // ])) {
        //   return redirect()->to(base_url("updateMahasiswa/" . $id))->withInput();
        // }

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
        //$this->session->setFlashData("success", "Mahasiswa has been updated");
        return redirect()->to(base_url("updateBook/" . $id));

    }
}
