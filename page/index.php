<?php
include '#inc/data.php';

// Setel lokal untuk bahasa Indonesia
setlocale(LC_TIME, 'id_ID.UTF-8');

function formatTanggal($tanggal) {
    $date = new DateTime($tanggal);
    return strftime('%A, %e %B %Y', $date->getTimestamp());
}
?>

<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://localhost/portal-antara/assets/img/image-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="http://localhost/portal-antara/assets/img/image-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="http://localhost/portal-antara/assets/img/image-3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Selanjutnya</span>
    </button>
</div>
<nav class="information-navigation container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-4 information-navigation-container">
        <div class="card-container col">
            <div class="inside-card-container card h-100">
                <span class="information-navigation-icon material-symbols-outlined">
                    history_toggle_off
                </span>
                <div class="card-body">
                    <h5 class="card-title"><a class="information-navigation-link" href="http://localhost/portal-antara/#">Informasi Berkala</a></h5>
                    <p class="card-text">Informasi yang wajib disediakan dan diumumkan secara rutin atau berkala sekurang-kurangnya setiap 6 bulan sekali.</p>
                </div>
            </div>
        </div>
        <div class="card-container col">
            <div class="card h-100">
                <span class="information-navigation-icon material-symbols-outlined">
                    list_alt
                </span>
                <div class="card-body">
                    <h5 class="card-title"><a class="information-navigation-link" href="http://localhost/portal-antara/#">Informasi Serta Merta</a></h5>
                    <p class="card-text">Informasi yang wajib disediakan dan diumumkan terkait hajat hidup orang banyak dan ketertiban umum.</p>
                </div>
            </div>
        </div>
        <div class="card-container col">
            <div class="card h-100">
                <span class="information-navigation-icon material-symbols-outlined">
                    concierge
                </span>
                <div class="card-body">
                    <h5 class="card-title"><a class="information-navigation-link" href="http://localhost/portal-antara/#">Informasi Setiap Saat</a></h5>
                    <p class="card-text">Informasi yang wajib disediakan untuk bisa langsung diberikan kepada Pemohon Informasi Publik ketika terdapat permohonan.</p>
                </div>
            </div>
        </div>
    </div>
</nav>




<section class="antara-update">
    <h1 class="float-in-top">ANTARA UPDATE</h1>
    <div class="divider">
        <span class="line-divider wipe-in-left"></span>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($updates as $update): ?>
                <div class="card-container col float-in-top">
                    <div class="card w-100" style="width: 18rem;">
                        <img class="antara-update-thumbnail" src="<?= htmlspecialchars($update['image']); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($update['title']); ?></h5>
                            <p class="card-date-update"><?= formatTanggal(htmlspecialchars($update['date'])); ?></p>
                            <p class="card-text"><?= htmlspecialchars($update['text']); ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link">Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--icon-color)"><path d="M304-76.26 242.26-139l343-343-343-343L304-887.74 709.74-482 304-76.26Z"/></svg></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>