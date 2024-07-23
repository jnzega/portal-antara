<?php
include '#inc/data.php';

setlocale(LC_TIME, 'id_ID.UTF-8');
?>

<div id="carouselExampleIndicators" class="carousel slide">
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

</div>
<nav class="information-navigation container-fluid">
    <nav class="information-navigation container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4 information-navigation-container">
            <div class="card-container col">
                <div class="inside-card-container hovered-shadow card h-100">
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
                <div class="card hovered-shadow h-100">
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
                <div class="card hovered-shadow h-100">
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
</nav>

<section class="antara-update section-title">
    <h1>ANTARA UPDATE</h1>
    <div class="divider">
        <span class="line-divider"></span>
    </div>
    <div class="container-fluid">
        <div class="update-card-container">
            <?php foreach ($updates as $update) : ?>
            <div class="update-card hovered-shadow">
                <img src="<?= htmlspecialchars($update['image']); ?>" alt="" class="update-card-thumbnail">
                <div class="update-card-description">
                    <h5 class="update-card-title">
                        <a href="<?= htmlspecialchars($update['link']); ?>" target="_blank"><?= htmlspecialchars($update['title']); ?></a>
                    </h5>
                    <p class="update-card-date"><?= formatTanggal(htmlspecialchars($update['date'])); ?></p>
                    <p class="update-card-snippet" title="<?= htmlspecialchars($update['text']); ?>"><?= htmlspecialchars($update['text']); ?></p>
                </div>
                <div class="update-card-footer">
                    <a href="<?= htmlspecialchars($update['link']); ?>" target="_blank">Selengkapnya</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>