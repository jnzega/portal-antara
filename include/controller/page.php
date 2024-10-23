<?php

class Page extends Controller{

    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('header', $data);
        $this->view('page/index');
        $this->view('footer');
    }

    public function login_admin(){
        $data['title'] = 'PPID | Login Admin';
        $this->view('header', $data);
        $this->view('page/login-admin');
        $this->view('footer');
    }

    public function register_admin(){
        $data['title'] = 'PPID | Login Admin';
        $this->view('header', $data);
        $this->view('page/register-admin');
        $this->view('footer');
    }

}