$(document).ready(function () {
    // Inisialisasi carousel secara manual
    var $carousel = $('#carouselExampleIndicators');

    // Atur interval untuk mengganti gambar setiap 15 detik (15000 ms)
    setInterval(function () {
        $carousel.carousel('next');
    }, 5000);
});