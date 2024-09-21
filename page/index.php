<?php
include 'include/data.php';

setlocale(LC_TIME, 'id_ID.UTF-8');
?>

<div id="carouselExampleIndicators" class="carousel slide">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <?php foreach ($carouselImages as $index => $carousel): ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($carouselImages as $index => $carousel): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= htmlspecialchars($carousel['image']) ?>" class="d-block w-100" alt="<?= htmlspecialchars($carousel['title']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
    </div>
</div>

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