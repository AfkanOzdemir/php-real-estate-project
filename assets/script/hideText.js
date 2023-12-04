document.addEventListener('DOMContentLoaded', function () {
    let hiddentext = document.querySelectorAll('.hiddentext');
    let savedText = hiddentext[0].children[1].innerHTML;
    console.log(savedText);
    hiddentext[0].children[1].innerHTML = 'Numara için tıklayınız';
    hiddentext[0].addEventListener('click', function () {
        hiddentext[0].children[1].innerHTML = savedText;
    }
    );
});