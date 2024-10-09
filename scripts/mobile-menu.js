const menu = document.querySelector('.menu-btn');
const nav = document.querySelector('.navigation');

menu.addEventListener('click', () => {
    nav.classList.toggle('nav-slide');
    menu.classList.toggle('opened');
    menu.setAttribute('aria-expanded', menu.classList.contains('opened'));
    nav.setAttribute('aria-expanded', menu.classList.contains('opened'));
})