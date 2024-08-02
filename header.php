<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['title'] ?></title>

    <!-- Bootstrap Framework Components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,250,0,0" />

    <!-- Personal CSS -->
    <link rel="stylesheet" href="http://localhost/portal-antara/assets/css/styles.css">
</head>

<body>
    <header>
        <div class="header-address-top">
            <div class="header-address-top-container">
                <div class="address-text-container">
                    <span id="address">
                        <span class="location-icon material-symbols-outlined">
                            location_on
                        </span>
                        Wisma Antara B, Jln. Cikini IV No. 11, Jakarta Pusat 10350.
                    </span>
                    <span id="telephone">
                        <span class="telephone-icon material-symbols-outlined">
                            call
                        </span>
                        (021) 22395579
                    </span>
                </div>
                <form>
                    <div class="search-box">
                        <span class="search-icon material-symbols-outlined">
                            search
                        </span>
                        <input class="search-input" type="search" placeholder="Pencarian Kata Kunci">
                    </div>
                </form>
            </div>
        </div>
    </header>
    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/portal-antara/">
                <img src="http://localhost/portal-antara/assets/img/Logo-LKBN-Antara.png" alt="Lembaga Kantor Berita Nasional ANTARA">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="http://localhost/portal-antara/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Antara</a>
                                <ul class="dropdown-menu dropdown-sub-submenu">
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/antara/profil">Profil</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/antara/visi-dan-misi">Visi dan Misi</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/antara/profil-dewas">Profil Dewan Pengawas</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/antara/profil-direksi">Profil Dewan Direksi</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/antara/nilai-nilai-perusahaan">Nilai-nilai Perusahaan</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/antara/sejarah-singkat">Sejarah Singkat</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">PPID Antara</a>
                                <ul class="dropdown-menu dropdown-sub-submenu">
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/ppid/profil">Profil</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/ppid/tugas-dan-kewenangan">Tugas dan Kewenangan</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/ppid/visi-dan-misi">Visi dan Misi</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/ppid/struktur-organisasi">Struktur Organisasi</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/portal-antara/page/ppid/regulasi">Regulasi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pelaksana</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi Publik
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Informasi Berkala</a></li>
                            <li><a class="dropdown-item" href="#">Informasi Serta Merta</a></li>
                            <li><a class="dropdown-item" href="#">Informasi Setiap Saat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan Informasi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Permohonan Informasi</a></li>
                            <li><a class="dropdown-item" href="#">Permohonan Keberatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>