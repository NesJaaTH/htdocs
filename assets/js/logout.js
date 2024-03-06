const mobileMenu = document.getElementById('myBtn');
var prevScrollpos = 0;

mobileMenu.addEventListener('click', () => {
    const menu = document.getElementById('myDropdown');
    if (menu.classList.contains('show')) {
        menu.classList.remove('animate__animated');
        menu.classList.remove('animate__fadeInUp');
        menu.classList.add('animate__animated');
        menu.classList.add('animate__fadeOutDown');
        setTimeout(() => {
            menu.classList.remove('show');
            menu.classList.remove('animate__animated');
            menu.classList.remove('animate__fadeOutDown');
            console.log('remove');
        }, 1000);

    } else {
        menu.classList.add('show');
        menu.classList.add('animate__animated');
        menu.classList.add('animate__fadeInUp');
    }
});

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    var currentScrollPossum = currentScrollPos;
    const dropbtn = document.getElementById('myBtn');
    if (prevScrollpos < currentScrollPossum) {
        dropbtn.classList.add('topch');
    }else {
        dropbtn.classList.remove('topch');
    }
}