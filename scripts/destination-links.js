const destinationLinks = document.querySelectorAll('.destination_item');
const destinationUnderline = document.querySelector('.destination-underline');
const activeDestinationLink = document.querySelector('.destination-active');

window.addEventListener('DOMContentLoaded', () => {
    if (activeDestinationLink) {
      moveDestinationUnderline(activeDestinationLink);
    }
});
  
destinationLinks.forEach(destinationLink => {
    destinationLink.addEventListener('mouseover', function() {
        moveDestinationUnderline(destinationLink);
    });

    destinationLink.addEventListener('focus', function() {
        moveDestinationUnderline(destinationLink);
    });

    destinationLink.addEventListener('mouseout', function() {
        if (activeDestinationLink) {
            moveDestinationUnderline(activeDestinationLink);
        }
    });

    destinationLink.addEventListener('click', function() {
        destinationLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        moveDestinationUnderline(destinationLink);
    });
});

function moveDestinationUnderline(destinationLink) {
    const destinationLinkRect = destinationLink.getBoundingClientRect();
    const destinationNavRect = destinationLink.closest('ul').getBoundingClientRect();
    // The Element.getBoundingClientRect() method returns a DOMRect object providing information about the size of an element and its position relative to the viewport.

    destinationUnderline.style.width = `${destinationLinkRect.width}px`;
    destinationUnderline.style.left = `${destinationLinkRect.left - destinationNavRect.left}px`;
}