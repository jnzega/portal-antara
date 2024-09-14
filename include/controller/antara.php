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

    public function nilai_nilai_perusahaan(){
        $data['title'] = 'PPID | NILAI-NILAI PERUSAHAAN ANTARA';
        $this->view('header', $data);
        $this->view('page/antara/antara-nilai-nilai');
        $this->view('footer');
    }

    public function sejarah_singkat(){
        $data['title'] = 'PPID | SEJARAH SINGKAT ANTARA';
        $this->view('header', $data);
        $this->view('page/antara/antara-sejarah');
        $this->view('footer');
    }
}