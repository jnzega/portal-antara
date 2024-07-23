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
            $(this).find('.dropdown-menu').first().stop(true, true).fadeIn(50);
        }, 
        function() {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeOut(50);
        }
    );

    function adjustSnippetLines() {
        $('.update-card').each(function() {
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
    $(window).on('resize', function() {
        adjustSnippetLines();
    });
});