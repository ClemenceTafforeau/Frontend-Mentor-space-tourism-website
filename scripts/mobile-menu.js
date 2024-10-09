const main = document.querySelector('main')
const menu = document.querySelector('.menu-btn');
const nav = document.querySelector('.navigation');

menu.addEventListener('click', () => {
    main.classList.toggle('fixed');
    nav.classList.toggle('nav-slide');
    menu.classList.toggle('opened');
    menu.setAttribute('aria-expanded', menu.classList.contains('opened'));
    nav.setAttribute('aria-expanded', menu.classList.contains('opened'));
})