<?php
include 'koneksi.php';

// Periksa apakah fungsi formatTanggal sudah ada
if (!function_exists('formatTanggal')) {
    // Setel lokal untuk bahasa Indonesia
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

$sql = "SELECT title, date, text, image FROM updates";
$result = $conn->query($sql);

$updates = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $updates[] = $row;
    }
}

$conn->close();
?>
