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

$(document).ready(function() {
    // Fungsi untuk memeriksa apakah elemen dalam viewport
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Memeriksa dan menambahkan kelas visible ke elemen yang sesuai
    function checkVisibility() {
        $('.float-in-top').each(function() {
            if (isElementInViewport(this)) {
                $(this).addClass('visible');
            }
        });

        $('.wipe-in-left').each(function() {
            if (isElementInViewport(this)) {
                $(this).addClass('visible');
            }
        });

        $('.card-container').each(function(index) {
            var $this = $(this);
            if (isElementInViewport(this)) {
                setTimeout(function() {
                    $this.addClass('visible');
                }, index * 300); // Penundaan 300ms untuk setiap card
            }
        });
    }

    // Event listener untuk scroll
    $(window).on('scroll', function() {
        checkVisibility();
    });

    // Memeriksa visibilitas saat halaman pertama kali dimuat
    checkVisibility();
});


