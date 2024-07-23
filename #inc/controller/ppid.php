<?php 

class Ppid extends Controller {

    public function profil(){
        $data['title'] = 'PPID | PROFIL PPID ANTARA';
        $this->view('header', $data);
        $this->view('page/ppid/ppid-profil');
        $this->view('footer');
    }

    public function tugas_dan_fungsi(){
        $data['title'] = 'PPID | TUGAS DAN FUNGSI PPID ANTARA';
        $this->view('header', $data);
        $this->view('page/ppid/ppid-tugas-dan-fungsi');
        $this->view('footer');
    }

    public function visi_dan_misi(){
        $data['title'] = 'PPID | VISI DAN MISI PPID ANTARA';
        $this->view('header', $data);
        $this->view('page/ppid/ppid-visi-dan-misi');
        $this->view('footer');
    }

    public function struktur_ppid(){
        $data['title'] = 'PPID | STRUKTUR ORGANISASI PPID ANTARA';
        $this->view('header', $data);
        $this->view('page/ppid/ppid-struktur-organisasi');
        $this->view('footer');
    }
}