<?php
include 'koneksi.php';

if (!function_exists('formatTanggal')) {
    setlocale(LC_TIME, 'id_ID.UTF-8');

    function formatTanggal($tanggal) {
        $fmt = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );
        $date = new DateTime($tanggal);
        return $fmt->format($date);
    }
}

try {
    // Mengambil data dari tabel updates
    $sql = "SELECT title, date, text, image, link FROM updates";
    $stmt = $pdo->query($sql);
    $updates = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $updates[] = $row;
    }

    // Mengambil data dari tabel carousel
    $sqlCarousel = "SELECT title, image FROM carousel ORDER BY id ASC";
    $stmtCarousel = $pdo->query($sqlCarousel);
    $carouselImages = [];
    while ($rowCarousel = $stmtCarousel->fetch(PDO::FETCH_ASSOC)) {
        $carouselImages[] = $rowCarousel;
    }
    
} catch (PDOException $e) {
    echo "Kesalahan: " . $e->getMessage();
}
?>
