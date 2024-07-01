$(document).ready(function(){
    // Inisialisasi carousel secara manual
    var $carousel = $('#carouselExampleIndicators');
    
    // Atur interval untuk mengganti gambar setiap 15 detik (15000 ms)
    setInterval(function(){
        $carousel.carousel('next');
    }, 5000);

    // Event hover untuk dropdown dengan efek fade
    $('.dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeIn(300);
        }, 
        function() {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeOut(300);
        }
    );
});