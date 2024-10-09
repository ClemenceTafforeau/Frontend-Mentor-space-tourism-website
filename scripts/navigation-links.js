const navLinks = document.querySelectorAll('.nav_item');
const underline = document.querySelector('.underline');
const activeLink = document.querySelector('.active-link');

window.addEventListener('DOMContentLoaded', () => {
    if (activeLink) {
      moveUnderline(activeLink);
    }
});
  
navLinks.forEach(link => {
    link.addEventListener('mouseover', function() {
        moveUnderline(link);
    });

    link.addEventListener('mouseout', function() {
        if (activeLink) {
          moveUnderline(activeLink);
        }
    });

    link.addEventListener('click', function() {
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        moveUnderline(link);
    });
});

function moveUnderline(link) {
    const linkRect = link.getBoundingClientRect();
    const navRect = link.closest('ul').getBoundingClientRect();
    // The Element.getBoundingClientRect() method returns a DOMRect object providing information about the size of an element and its position relative to the viewport.

    underline.style.width = `${linkRect.width}px`;
    underline.style.left = `${linkRect.left - navRect.left}px`;
}