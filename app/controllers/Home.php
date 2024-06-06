<?php
class Home extends Controller{
    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}