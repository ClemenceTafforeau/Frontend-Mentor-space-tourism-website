<template>
    <HeaderComponent />
    <main>
        <router-view></router-view>
    </main>
</template>
  
<script>
import HeaderComponent from './components/HeaderComponent.vue';

export default {
  components: {
    HeaderComponent,
  },
  name: 'App',
  mounted() {
    this.initializeEventListeners();
    this.moveUnderlineOnLoad();
  },
  beforeDestroy() {
    this.cleanupEventListeners();
  },
  methods: {
    initializeEventListeners() {
      const main = document.querySelector('main');
      const header = document.querySelector('header');
      const menu = document.querySelector('.menu-btn');
      const nav = document.querySelector('.navigation');
      const underline = document.querySelector('.underline');
      const navLinks = document.querySelectorAll('.nav_item');

      // Toggle navigation visibility
      menu.addEventListener('click', () => {
        main.classList.toggle('fixed');
        nav.classList.toggle('nav-slide');
        menu.classList.toggle('opened');
        menu.setAttribute('aria-expanded', menu.classList.contains('opened'));
        nav.setAttribute('aria-expanded', menu.classList.contains('opened'));
      });

      // Change header style on scroll
      window.addEventListener('scroll', this.handleScroll);

      // Set underline position for nav links
      navLinks.forEach(link => {
        link.addEventListener('mouseover', () => this.moveUnderline(link, underline));
        link.addEventListener('focus', () => this.moveUnderline(link, underline));
        link.addEventListener('mouseout', () => {
          const activeLink = document.querySelector('.router-link-active');
          if (activeLink) {
            this.moveUnderline(activeLink, underline);
          }
        });
        link.addEventListener('click', () => {
          navLinks.forEach(l => l.classList.remove('router-link-active'));
          link.classList.add('router-link-active');
          this.moveUnderline(link, underline);
        });
      });
    },
    cleanupEventListeners() {
      const menu = document.querySelector('.menu-btn');
      const header = document.querySelector('header');
      const navLinks = document.querySelectorAll('.nav_item');

      menu.removeEventListener('click', this.toggleMenu);
      window.removeEventListener('scroll', this.handleScroll);
      
      navLinks.forEach(link => {
        link.removeEventListener('mouseover', this.moveUnderline);
        link.removeEventListener('focus', this.moveUnderline);
        link.removeEventListener('mouseout', this.moveUnderline);
        link.removeEventListener('click', this.moveUnderline);
      });
    },
    handleScroll() {
      const header = document.querySelector('header');
      if (window.scrollY > 0) {
        header.classList.add('blurred-backdrop');
      } else {
        header.classList.remove('blurred-backdrop');
      }
    },
    moveUnderlineOnLoad() {
      const activeLink = document.querySelector('.router-link-active');
      const underline = document.querySelector('.underline');
      if (activeLink) {
        this.moveUnderline(activeLink, underline);
      } else {
        // Move underline to the first link if no active link
        const firstLink = document.querySelector('.nav_item'); // Adjust this selector based on your HTML structure
        if (firstLink) {
          this.moveUnderline(firstLink, underline);
        }
      }
    },
    moveUnderline(link, underline) {
      const linkRect = link.getBoundingClientRect();
      const navRect = link.closest('ul').getBoundingClientRect();

      underline.style.width = `${linkRect.width}px`;
      underline.style.left = `${linkRect.left - navRect.left}px`;
    }
  }
};
</script>

<style src="@/assets/styles/helpers.css"></style>
<style src="@/assets/styles/reset.css"></style>
<style src="@/assets/styles/style.css"></style>