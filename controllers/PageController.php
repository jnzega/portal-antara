<?php
class PageController {
    public function render($page) {
        include 'views/templates/header.php';

        switch ($page) {
            case 'home':
                include 'views/home.php';
                break;
            case 'tentang_ppid':
                include 'views/tentang_ppid.php';
                break;
            case 'pelaksana':
                include 'views/pelaksana.php';
                break;
            case 'informasi_publik':
                include 'views/informasi_publik.php';
                break;
            case 'layanan_informasi':
                include 'views/layanan_informasi.php';
                break;
            case 'kontak':
                include 'views/kontak.php';
                break;
            default:
                include 'views/home.php';
                break;
        }

        include 'views/templates/footer.php';
    }
}
?>
