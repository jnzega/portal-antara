<?php
// Mulai session
session_start();
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,250,0,0" />

    <!-- Personal CSS -->
    <link rel="stylesheet" href="http://localhost/portal-antara/assets/css/styles.css">
</head>

<body>
    <header>
        <div class="header-top center-item-horizontal">
            <div class="header-top-container container-width center-item-vertical">
                <div class="header-top-info">
                    <ul>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FDD428">
                                <path d="M144-144v-528h144v-144h360v288h168v384H528v-144h-96v144H144Zm72-72h72v-72h-72v72Zm0-156h72v-72h-72v72Zm0-156h72v-72h-72v72Zm144 156h72v-72h-72v72Zm0-156h72v-72h-72v72Zm0-144h72v-72h-72v72Zm144 300h72v-72h-72v72Zm0-156h72v-72h-72v72Zm0-144h72v-72h-72v72Zm168 456h72v-72h-72v72Zm0-156h72v-72h-72v72Z" />
                            </svg>
                            Wisma Antara B, Jl. Cikini IV No. 11, Jakarta Pusat (10350).
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FDD428">
                                <path d="M763-145q-121-9-229.5-59.5T339-341q-86-86-135.5-194T144-764q-2-21 12.29-36.5Q170.57-816 192-816h136q17 0 29.5 10.5T374-779l24 106q2 13-1.5 25T385-628l-97 98q20 38 46 73t57.97 65.98Q422-361 456-335.5q34 25.5 72 45.5l99-96q8-8 20-11.5t25-1.5l107 23q17 5 27 17.5t10 29.5v136q0 21.43-16 35.71Q784-143 763-145ZM255-600l70-70-17.16-74H218q5 38 14 73.5t23 70.5Zm344 344q35.1 14.24 71.55 22.62Q707-225 744-220v-90l-75-16-70 70ZM255-600Zm344 344Z" />
                            </svg>
                            021-2239-5579
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FDD428">
                                <path d="M96-144v-648h384v144h384v504H96Zm72-72h240v-72H168v72Zm0-144h240v-72H168v72Zm0-144h240v-72H168v72Zm0-144h240v-72H168v72Zm312 432h312v-360H480v360Zm72-216v-72h168v72H552Zm0 144v-72h168v72H552Z" />
                            </svg>
                            <a style="text-decoration: none; color: white" href="https://korporat.antaranews.com" target="_blank" rel="noopener noreferrer">korporat.antaranews.com</a>
                        </li>
                    </ul>
                </div>
                <div class="header-top-search">
                    <form>
                        <div class="search">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#6C757D">
                                <path d="M765-144 526-383q-30 22-65.79 34.5-35.79 12.5-76.18 12.5Q284-336 214-406t-70-170q0-100 70-170t170-70q100 0 170 70t70 170.03q0 40.39-12.5 76.18Q599-464 577-434l239 239-51 51ZM384-408q70 0 119-49t49-119q0-70-49-119t-119-49q-70 0-119 49t-49 119q0 70 49 119t119 49Z" />
                            </svg>
                            <input class="search-input" type="search" placeholder="Pencarian kata kunci">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <nav class="header-nav center-item-horizontal">
            <div class="header-nav-container container-width center-item-vertical">
                <div class="header-nav-link center-item-vertical">
                    <a href="http://localhost/portal-antara/">
                        <img src="http://localhost/portal-antara/assets/img/Logo-LKBN-Antara.png" alt="">
                    </a>
                    <ul class="nav-menu">
                        <li><a href="#">Beranda</a></li>
                        <li class="dropdown">
                            <a href="#">
                                Profil
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2a3855">
                                    <path d="M480-357.85 253.85-584 296-626.15l184 184 184-184L706.15-584 480-357.85Z" />
                                </svg>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                                Regulasi
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2a3855">
                                    <path d="M480-357.85 253.85-584 296-626.15l184 184 184-184L706.15-584 480-357.85Z" />
                                </svg>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                                Informasi Publik
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2a3855">
                                    <path d="M480-357.85 253.85-584 296-626.15l184 184 184-184L706.15-584 480-357.85Z" />
                                </svg>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                                Standar Layanan
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#2a3855">
                                    <path d="M480-357.85 253.85-584 296-626.15l184 184 184-184L706.15-584 480-357.85Z" />
                                </svg>
                            </a>
                        </li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="header-nav-login center-item-vertical">
                    <a href="http://localhost/portal-antara/page/login-admin">
                        <span class="title-button">Tombol Login Admin</span>
                        <div class="login-button center-item-horizontal center-item-vertical">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fdd428">
                                <path d="M680-280q25 0 42.5-17.5T740-340q0-25-17.5-42.5T680-400q-25 0-42.5 17.5T620-340q0 25 17.5 42.5T680-280Zm0 120q31.38 0 57.19-14.31t42.19-38.31Q757-226 732-233q-25-7-52-7t-52 7q-25 7-47.38 20.38 16.38 24 42.19 38.31Q648.62-160 680-160Zm-200 59.23q-129.77-35.39-214.88-152.77Q180-370.92 180-516v-230.15l300-112.31 300 112.31v226.61q-14-5.69-29.39-10.27-15.38-4.57-30.61-7.19v-167.38L480-794l-240 89.62V-516q0 53.15 15 103.81 15 50.65 41.35 94.69 26.34 44.04 62.96 79.08 36.61 35.04 79.46 55.96l1.16-.39q7.92 22 20.53 42.16 12.62 20.15 28.69 36.61-2.53.77-4.57 1.66-2.04.88-4.58 1.65Zm200 .77q-74.92 0-127.46-52.54Q500-205.08 500-280q0-74.92 52.54-127.46Q605.08-460 680-460q74.92 0 127.46 52.54Q860-354.92 860-280q0 74.92-52.54 127.46Q754.92-100 680-100ZM480-488.23Z" />
                            </svg>
                        </div>
                    </a>
                    <div class="menu-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#6C757D">
                            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </nav>
    </header>