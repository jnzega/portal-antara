const menuToggle = document.querySelector('.menu-toggle');
const headerNav = document.querySelector('.nav-menu');

menuToggle.addEventListener('click', () => {
    headerNav.classList.toggle('active');
})

$(document).ready(function () {
    // Inisialisasi carousel secara manual
    var $carousel = $('#carouselExampleIndicators');

    // Atur interval untuk mengganti gambar setiap 15 detik (15000 ms)
    setInterval(function () {
        $carousel.carousel('next');
    }, 5000);
});