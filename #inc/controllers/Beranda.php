<?php
class Beranda extends Controller{
    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('header', $data);
        $this->view('beranda/index');
        $this->view('footer');
    }
}