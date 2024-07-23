<?php 

class Antara extends Controller {

    public function profil(){
        $data['title'] = 'PPID | PROFIL ANTARA';
        $this->view('header', $data);
        $this->view('page/antara/antara-profil');
        $this->view('footer');
    }

    public function visi_dan_misi(){
        $data['title'] = 'PPID | VISI DAN MISI ANTARA';
        $this->view('header', $data);
        $this->view('page/antara/antara-visi-dan-misi');
        $this->view('footer');
    }

    public function profil_dewas(){
        $data['title'] = 'PPID | VISI DAN MISI ANTARA';
        $this->view('header', $data);
        $this->view('page/antara/antara-profil-dewas');
        $this->view('footer');
    }

    public function profil_direksi(){
        $data['title'] = 'PPID | VISI DAN MISI ANTARA';
        $this->view('header', $data);
        $this->view('page/antara/antara-profil-direksi');
        $this->view('footer');
    }
}