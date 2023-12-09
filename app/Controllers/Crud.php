<?php

namespace App\Controllers;

class Crud extends BaseController
{


    //mencari buku yang ingin di-CRUD
    public function search()
    {
        $id_buku = $this->request->getGet('id_buku');

        // Perform the search based on the book ID
        $searchResult = $this->detailModel->getDetailById($id_buku);

        $data = [
            ['title' => 'Search Results',
                'data' => $searchResult,]

        ];


        return view('CRUD/crud', $data);
    }

    public function updateBook($id)
{
    $book = $this->detailModel->getDetailBook($id);
    $validation = \Config\Services::validation();
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
    // Validasi form
    $validationRules = [
        'judul' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'sinopsis' => 'required',
        'status_premium' => 'required',
        'pdfFile' => 'mime_in[pdfFile,application/pdf]|max_size[pdfFile,10240]|ext_in[pdfFile,pdf]',
        'sampul' => 'mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,2048]',
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to(base_url("updateBook/" . $id))
            ->withInput()
            ->with('validation_errors', $this->validator->getErrors());
    }

    // Ambil data dari form
    $judul = $this->request->getVar("judul");
    $pengarang = $this->request->getVar("pengarang");
    $penerbit = $this->request->getVar("penerbit");
    $tahun_terbit = $this->request->getVar("tahun_terbit");
    $sinopsis = $this->request->getVar("sinopsis");
    $status_premium = $this->request->getVar("status_premium");

    // Ambil nama file lama dari database
    $book = $this->detailModel->getDetailBook($id);
    $namaImageLama = $book['sampul'];
    $namaPdfLama = $book['path'];

    // Periksa apakah ada file gambar sampul yang diunggah
    $fileImage = $this->request->getFile('sampul');
    $namaImageBaru = $fileImage->getError() == 4 ? $namaImageLama : $fileImage->getRandomName();
    if ($namaImageBaru !== $namaImageLama) {
        // Pindahkan file baru dan dapatkan nama baru
        $fileImage->move('covers', $namaImageBaru);

        // Hapus file lama jika nama berbeda
        if ($namaImageLama !== 'default.jpg') {
            unlink('covers/' . $namaImageLama);
        }
    }

    // Periksa apakah ada file PDF yang diunggah
    $pdfFile = $this->request->getFile('pdfFile');
    $namaPdfBaru = $pdfFile->getError() == 4 ? $namaPdfLama : $pdfFile->getRandomName();
    if ($namaPdfBaru !== $namaPdfLama) {
        // Pindahkan file baru dan dapatkan nama baru
        $pdfFile->move('books', $namaPdfBaru);

        // Hapus file lama jika nama berbeda
        unlink('books/' . $namaPdfLama);
    }

    // Data untuk dimasukkan ke database
    $data = [
        "judul" => $judul,
        "pengarang" => $pengarang,
        "penerbit" => $penerbit,
        "tahun_terbit" => $tahun_terbit,
        "sinopsis" => $sinopsis,
        "status_premium" => $status_premium,
        "sampul" => $namaImageBaru,
        "path" => $namaPdfBaru,
    ];

    // Update data ke database
    $this->detailModel->updateBook($id, $data);

    return redirect()->to(base_url("updateBook/" . $id));
}



    public function createBook()
    {
        $validation = \Config\Services::validation();
        //dd($validation);
        $errors = $validation->getErrors();
        $data = [
            "title" => "Create Buku",
            "errors" => $errors,
            'validation' => $validation
        ];
        return view("CRUD/create", $data);
    }
    public function createBookAction()
    {
        // Validasi form
        if (
            !$this->validate([
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul tidak boleh kosong.',
                    ]
                ],
                'pengarang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pengarang tidak boleh kosong.'
                        // Pesan khusus untuk field 'pengarang' dapat ditambahkan di sini
                    ]
                ],
                'penerbit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Penerbit tidak boleh kosong.'
                        // Pesan khusus untuk field 'penerbit' dapat ditambahkan di sini
                    ]
                ],
                'tahun_terbit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Terbit tidak boleh kosong.'
                        // Pesan khusus untuk field 'tahun_terbit' dapat ditambahkan di sini
                    ]
                ],
                'sinopsis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sinopsis tidak boleh kosong.'
                        // Pesan khusus untuk field 'sinopsis' dapat ditambahkan di sini
                    ]
                ],
                'status_premium' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Premium tidak boleh kosong.'
                        // Pesan khusus untuk field 'status_premium' dapat ditambahkan di sini
                    ]
                ],
                'pdfFile' => [
                    'rules' => 'uploaded[pdfFile]|mime_in[pdfFile,application/pdf]|max_size[pdfFile,10240]|ext_in[pdfFile,pdf]',
                    'errors' => [
                        'uploaded' => 'File PDF tidak boleh kosong.',
                        'mime_in' => 'File harus berformat PDF.',
                        'max_size' => 'Ukuran file PDF tidak boleh lebih dari 10 MB.',
                        'ext_in' => 'File harus berformat PDF.'
                    ]
                ],
                'sampul' => [
                    'rules' => 'uploaded[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,2048]',
                    'errors' => [
                        'uploaded' => 'File sampul tidak boleh kosong.',
                        'mime_in' => 'File sampul harus berformat JPG, JPEG, atau PNG.',
                        'max_size' => 'Ukuran file sampul tidak boleh lebih dari 2 MB.'
                    ]
                ],


            ])
        ) {
            return redirect()->to(base_url("halamanCreate/"))->withInput()->with('validation_errors',
                $this->validator->getErrors());
        }

        // Ambil file gambar sampul
        $fileImage = $this->request->getFile('sampul');

        // Handle jika file error atau tidak diupload
        if ($fileImage->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {
            // Generate nama image biar random
            $namaImage = $fileImage->getRandomName();
            // Pindahkan gambar sampul ke folder public/covers
            $fileImage->move('covers', $namaImage);
        }

        // Ambil file PDF
        $pdfFile = $this->request->getFile('pdfFile');

        // Handle jika file error atau tidak diupload
        if ($pdfFile->getError() == 4) {
            // Handle error file kosong
            return redirect()->to(base_url("halamanCreate/"))->withInput()->with('validation_errors', ['pdfFile' => 'Pilih file PDF.']);
        }

        // Generate nama file acak
        $namaPdf = $pdfFile->getRandomName();

        // Pindahkan file PDF ke folder public/books
        $pdfFile->move('books', $namaPdf);

        // Ambil data dari form
        $judul = $this->request->getVar("judul");
        $pengarang = $this->request->getVar("pengarang");
        $penerbit = $this->request->getVar("penerbit");
        $tahun_terbit = $this->request->getVar("tahun_terbit");
        $sinopsis = $this->request->getVar("sinopsis");
        $status_premium = $this->request->getVar("status_premium");

        // Data untuk dimasukkan ke database
        // Data untuk dimasukkan ke database
        $data = [
            "judul" => $judul,
            "pengarang" => $pengarang,
            "penerbit" => $penerbit,
            "tahun_terbit" => $tahun_terbit,
            "sinopsis" => $sinopsis,
            "path" => $namaPdf, // Set path sesuai dengan direktori books
            "sampul" => $namaImage, // Set path sampul sesuai dengan direktori covers
            "status_premium" => $status_premium,
        ];


        // Simpan data ke database
        $this->detailModel->insert($data);

    }

    public function deleteBook($id)
    {
        $this->detailModel->delete($id);
        return redirect()->to(base_url("/crud"));
    }
}
?>