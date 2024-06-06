<?php

class About extends Controller{
    public function index(){
        $data['title'] = 'PPID | Profil';
        $this->view('templates/header', $data);
        $this->view('about/profil');
        $this->view('templates/footer');
    }

    public function tugas_dan_fungsi(){
        $data['title'] = 'PPID | Tugas dan Fungsi';
        $this->view('templates/header', $data);
        $this->view('about/tugas_dan_fungsi');
        $this->view('templates/footer');
    }
}