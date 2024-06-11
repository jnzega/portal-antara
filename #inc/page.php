<?php

class Page extends Controller{


    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('header', $data);
        $this->view('page/index');
        $this->view('footer');
    }

    public function profil(){
        $data['title'] = 'PPID | Profil';
        $this->view('header', $data);
        $this->view('page/profil');
        $this->view('footer');
    }

    public function tugas_dan_fungsi(){
        $data['title'] = 'PPID | Tugas dan Fungsi';
        $this->view('header', $data);
        $this->view('page/tugas_dan_fungsi');
        $this->view('footer');
    }

    public function visi_dan_misi(){
        $data['title'] = 'PPID | Visi dan Misi';
        $this->view('header', $data);
        $this->view('page/visi_dan_misi');
        $this->view('footer');
    }

    public function struktur_organisasi(){
        $data['title'] = 'PPID | Struktur Organisasi';
        $this->view('header', $data);
        $this->view('page/struktur_organisasi');
        $this->view('footer');
    }

    public function regulasi(){
        $data['title'] = 'PPID | Regulasi';
        $this->view('header', $data);
        $this->view('page/regulasi');
        $this->view('footer');
    }

}