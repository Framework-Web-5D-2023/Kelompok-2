<?php

namespace App\Controllers;

use App\Models\DetailModel;
use App\Models\OrderModel;


class Order extends BaseController
{
    public function dataForForm($order_id)
    {
        session();
        $validation = session('validation');
        // Membuat instance dari model DetailModel
        $detailModel = new DetailModel();

        // Menggunakan model untuk mendapatkan detail berdasarkan ID
        $detail = $detailModel->getDetailById($order_id);

        $data = [
            'detail' => $detail,
            'validation' => $validation
        ];
        if ($detail) {
            // Detail produk ditemukan, lempar ke view 'order'
            return view('Transaction/order', $data);
        } else {
            // Produk tidak ditemukan, tangani sesuai kebutuhan
            return "Produk tidak ditemukan";
        }
    }


    public function makeOrder()
    {

        $orderModel = new OrderModel();

        $id_product = $this->request->getPost('id_product');
        $nama = $this->request->getPost('nama');
        $jumlah = intval($this->request->getPost('jumlah'));
        $alamat = $this->request->getPost('alamat');
        $harga = floatval($this->request->getPost('harga'));
        $penerima = $this->request->getPost('penerima');
        $provinsi = $this->request->getPost('provinsi');
        $kabupaten = $this->request->getPost('kabupaten');
        $kecamatan = $this->request->getPost('kecamatan');
        $kodepos = $this->request->getPost('kodePos');

        if (
            !$this->validate([
                'jumlah' => [
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => [
                        'required' => 'Jumlah harus diisi',
                        'numeric' => 'Jumlah harus berupa angka',
                        'greater_than' => 'Jumlah minimal 1'
                    ]
                ],
                'penerima' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Penerima harus diisi'
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi harus diisi'
                    ]
                ],
                'kabupaten' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kabupaten harus diisi'
                    ]
                ],
                'kecamatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kecamatan harus diisi'
                    ]
                ],
                'kodePos' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Kode Pos harus diisi',
                        'numeric' => 'Kode Pos harus berupa angka'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat harus diisi'
                    ]
                ]
            ])
        ) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url("/order/" . $id_product))->withInput()->with('validation', $validation);

        }



        // Hitung jumlah bayar
        $jumlahbayar = $jumlah * $harga;

        $data = [
            'id_product' => $id_product,
            'nama' => $nama,
            'penerima' => $penerima,
            'jumlah' => $jumlah,
            'alamat' => $alamat,
            'jumlahbayar' => $jumlahbayar,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kodepos' => $kodepos
        ];

        session()->setFlashdata('order_created', true);

        $orderModel->saveOrder($data);

        return redirect()->to(base_url('/orderlist'));
    }




    public function orderList()
    {

        $detail = $this->orderModel->getDetail();
        $data = [
            "data" => $detail
        ];
        return view('Transaction/orderlist', $data);
    }
    public function updateOrder()
    {
        session();
        $validation = session('validation');
        $id = $this->request->getGet('id');
        $data = $this->orderModel->getSpecific($id);

        $detail = [
            'data' => $data,
            'validation' => $validation
        ];

        if (!isset($data)) {

        } else {
            return view('Transaction/updateorder', ['detail' => $detail]);
        }


    }

    public function uploadStruk()
    {

        $fileImage = $this->request->getFile('bukti_pembayaran');
        $id = $this->request->getPost('order_id');

        if (
            !$this->validate([
                'bukti_pembayaran' => [
                    'rules' => 'uploaded[bukti_pembayaran]|is_image[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png,image/webp]|max_size[bukti_pembayaran,1024]'
                ],
                
            ])
        ) {
            session()->setFlashdata('image_problem', true);
            return redirect()->to(base_url('/orderlist'));
        } else {

            $namaImage = $fileImage->getRandomName();
            $fileImage->move('Transaction', $namaImage);

            $data = [
                'bukti_pembayaran' => $namaImage
            ];


            $this->orderModel->updateAction($id, $data);

            session()->setFlashdata('order_updated', true);
            return redirect()->to(base_url('/orderlist'));
        }
        ;

    }

    public function updateAction()
    {



        $id = $this->request->getPost('id');
        $jumlahbefore = intval($this->request->getPost('jumlahbefore'));
        $alamat = $this->request->getPost('alamat');
        $hargabefore = floatval($this->request->getPost('hargabefore'));
        $jumlah = intval($this->request->getPost('jumlah'));
        $jumlahbayar = ($hargabefore / $jumlahbefore) * $jumlah;
        $penerima = $this->request->getPost('penerima');
        $provinsi = $this->request->getPost('provinsi');
        $kabupaten = $this->request->getPost('kabupaten');
        $kecamatan = $this->request->getPost('kecamatan');
        $kodepos = $this->request->getPost('kodepos');



        if (
            !$this->validate([

                'jumlah' => [
                    'rules' => 'required|numeric|greater_than[0]',
                    'errors' => [
                        'required' => 'Jumlah harus diisi',
                        'numeric' => 'Jumlah harus berupa angka',
                        'greater_than' => 'Jumlah minimal 1'
                    ]
                ],
                'penerima' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Penerima harus diisi'
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi harus diisi'
                    ]
                ],
                'kabupaten' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kabupaten harus diisi'
                    ]
                ],
                'kecamatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kecamatan harus diisi'
                    ]
                ],
                'kodepos' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Kode Pos harus diisi',
                        'numeric' => 'Kode Pos harus berupa angka'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat harus diisi'
                    ]
                ]
            ])
        ) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url("/updateproduct?id=") . $id)->withInput()->with('validation', $validation);

        }

        $data = [
            'jumlah' => $jumlah,
            'alamat' => $alamat,
            'jumlahbayar' => $jumlahbayar,
            'penerima' => $penerima,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kodepos' => $kodepos,
        ];


        $this->orderModel->updateAction($id, $data);

        session()->setFlashdata('order_updated', true);

        return redirect()->to(base_url('/orderlist'));


    }

    public function deleteOrder()
    {
        $id = $this->request->getPost('id');
        $this->orderModel->delete($id);

        session()->setFlashdata('order_deleted', true);

        return redirect()->to(base_url('/orderlist'));

    }

}