
document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.querySelector('.dropdown');
    var dropdownContent = document.querySelector('.dropdown-content');

    dropdown.addEventListener('mouseover', function () {
        dropdownContent.style.display = 'block';
        setTimeout(function () {
            dropdownContent.style.opacity = '1';
        }, 10);
    });

    dropdown.addEventListener('mouseout', function () {
        dropdownContent.style.opacity = '0';
        setTimeout(function () {
            dropdownContent.style.display = 'none';
        }, 500);
    });
});

