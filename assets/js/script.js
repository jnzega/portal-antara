$(document).ready(function () {
    // Inisialisasi carousel secara manual
    var $carousel = $('#carouselExampleIndicators');

    // Atur interval untuk mengganti gambar setiap 15 detik (15000 ms)
    setInterval(function () {
        $carousel.carousel('next');
    }, 5000);

    // Event hover untuk dropdown dengan efek fade
    $('.dropdown').hover(
        function () {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeIn(50);
        },
        function () {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeOut(50);
        }
    );

    function adjustSnippetLines() {
        $('.update-card').each(function () {
            var $title = $(this).find('.update-card-title');
            var $snippet = $(this).find('.update-card-snippet');

            // Calculate the number of lines in the title
            var titleHeight = $title[0].scrollHeight;
            var lineHeight = parseFloat($title.css('line-height'));
            var titleLines = Math.round(titleHeight / lineHeight);

            // Calculate the new line clamp for the snippet
            var maxLines = 7 - (titleLines - 1);
            var snippetHeight = $snippet[0].scrollHeight;

            // Check if the snippet overflows
            if (snippetHeight > maxLines * lineHeight) {
                // Truncate the text manually and add ellipsis
                var originalText = $snippet.text();
                var truncatedText = originalText;

                while ($snippet[0].scrollHeight > maxLines * lineHeight) {
                    truncatedText = truncatedText.slice(0, -1);
                    $snippet.text(truncatedText + '...');
                }
            }
        });
    }

    // Adjust snippet lines on document ready
    adjustSnippetLines();

    // Adjust snippet lines on window resize
    $(window).on('resize', function () {
        adjustSnippetLines();
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var ttsEnabled = false;
    var currentSpeech;

    // Fungsi untuk memulai text-to-speech
    function speak(text) {
        if ('speechSynthesis' in window) {
            var speech = new SpeechSynthesisUtterance(text);
            speech.lang = 'id-ID'; // Bahasa Indonesia
            speech.rate = 1.25; // Kecepatan bicara
            window.speechSynthesis.speak(speech);
            return speech;
        } else {
            alert("Text-to-speech tidak didukung di browser Anda.");
        }
    }

    // Fungsi untuk menambahkan event hover ke semua elemen teks
    function addTextToSpeechToElements() {
        var textElements = document.querySelectorAll('p, li, h1, h2, h3, h4, h5, h6, span, a, div');

        textElements.forEach(function (element) {
            element.addEventListener('mouseover', function () {
                if (ttsEnabled) {
                    currentSpeech = speak(element.textContent.trim());
                }
            });

            element.addEventListener('mouseout', function () {
                if (ttsEnabled && currentSpeech) {
                    window.speechSynthesis.cancel();
                    currentSpeech = null;
                }
            });
        });
    }

    // Fungsi untuk menyimpan preferensi ke cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Fungsi untuk mengambil nilai dari cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Fungsi untuk menginisialisasi status switch berdasarkan cookie
    function initializeTtsSwitch() {
        var ttsSwitch = document.getElementById('ttsSwitch');
        var cookieValue = getCookie('ttsEnabled');
        if (cookieValue === 'true') {
            ttsSwitch.checked = true;
            ttsEnabled = true;
        } else {
            ttsSwitch.checked = false;
            ttsEnabled = false;
        }
    }

    // Aktifkan fitur text-to-speech
    addTextToSpeechToElements();
    initializeTtsSwitch();

    // Event listener untuk switch
    var ttsSwitch = document.getElementById('ttsSwitch');
    ttsSwitch.addEventListener('change', function () {
        ttsEnabled = ttsSwitch.checked;
        setCookie('ttsEnabled', ttsEnabled, 7); // Cookie berlaku selama 7 hari
    });
});