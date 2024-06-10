<?php

class Tentang extends Controller{
    public function index(){
        $data['title'] = 'PPID | PERUM LKBN ANTARA';
        $this->view('templates/header', $data);
        $this->view('beranda/index');
        $this->view('templates/footer');
    }

    public function profil(){
        $data['title'] = 'PPID | Profil';
        $this->view('templates/header', $data);
        $this->view('tentang/profil');
        $this->view('templates/footer');
    }

    public function tugas_dan_fungsi(){
        $data['title'] = 'PPID | Tugas dan Fungsi';
        $this->view('templates/header', $data);
        $this->view('tentang/tugas_dan_fungsi');
        $this->view('templates/footer');
    }

    public function visi_dan_misi(){
        $data['title'] = 'PPID | Visi dan Misi';
        $this->view('templates/header', $data);
        $this->view('tentang/visi_dan_misi');
        $this->view('templates/footer');
    }

    public function struktur_organisasi(){
        $data['title'] = 'PPID | Struktur Organisasi';
        $this->view('templates/header', $data);
        $this->view('tentang/struktur_organisasi');
        $this->view('templates/footer');
    }

    public function regulasi(){
        $data['title'] = 'PPID | Regulasi';
        $this->view('templates/header', $data);
        $this->view('tentang/regulasi');
        $this->view('templates/footer');
    }
}