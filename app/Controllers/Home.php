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
}
