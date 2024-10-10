const main = document.querySelector('main');
const header = document.querySelector('header');
const menu = document.querySelector('.menu-btn');
const nav = document.querySelector('.navigation');

menu.addEventListener('click', () => {
    main.classList.toggle('fixed');
    nav.classList.toggle('nav-slide');
    menu.classList.toggle('opened');
    menu.setAttribute('aria-expanded', menu.classList.contains('opened'));
    nav.setAttribute('aria-expanded', menu.classList.contains('opened'));
})

window.addEventListener('scroll', () => {
    if(scrollY > 0) {
        header.classList.add('blurred-backdrop');
    } else {
        header.classList.remove('blurred-backdrop');
    }
})