<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class Penulis extends BaseController
{
    protected $penulisModel;
    public function __construct()
    {
        $this->penulisModel = new PenulisModel();
    }
    public function index()
    {
        $pageSekarang = $this->request->getVar('page_penulis')
            ? $this->request->getVar('page_penulis') : 1;

        $katakunci = $this->request->getVar('keyword');
        if ($katakunci) {
            $penulis = $this->penulisModel->search($katakunci);
        } else {
            $penulis = $this->penulisModel;
        }

        $data = [
            'title' => 'Daftar Penulis',
            //'penulis' => $this->penulisModel->findAll()
            'penulis' => $penulis->paginate(10, 'penulis'),
            'pager' => $this->penulisModel->pager,
            'pageSekarang' => $pageSekarang
        ];
        return view('penulis/index', $data);
    }
}