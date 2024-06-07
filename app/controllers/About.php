<?php

class About extends Controller{
    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('templates/header', $data);
        $this->view('beranda/index');
        $this->view('templates/footer');
    }

    public function profil(){
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

    public function visi_dan_misi(){
        $data['title'] = 'PPID | Visi dan Misi';
        $this->view('templates/header', $data);
        $this->view('about/visi_dan_misi');
        $this->view('templates/footer');
    }

    public function struktur_organisasi(){
        $data['title'] = 'PPID | Struktur Organisasi';
        $this->view('templates/header', $data);
        $this->view('about/struktur_organisasi');
        $this->view('templates/footer');
    }

    public function regulasi(){
        $data['title'] = 'PPID | Regulasi';
        $this->view('templates/header', $data);
        $this->view('about/regulasi');
        $this->view('templates/footer');
    }
}