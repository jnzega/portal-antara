<?php

class Layanan extends Controller {
    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('templates/header', $data);
        $this->view('beranda/index');
        $this->view('templates/footer');
    }
}