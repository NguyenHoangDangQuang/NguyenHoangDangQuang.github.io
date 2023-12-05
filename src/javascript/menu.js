document.addEventListener('DOMContentLoaded', function () {
    const hamburgerMenu = document.getElementById('hamburger-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    
    let isOpen = false;

    hamburgerMenu.addEventListener('click', function () {
        if (!isOpen) {
            hamburgerMenu.src = './images/close.svg'; // Change to close icon
            mobileMenuOverlay.classList.remove('hidden');
        } else {
            hamburgerMenu.src = './images/hamburgerMenu.svg'; // Change back to original hamburger icon
            mobileMenuOverlay.classList.add('hidden');
        }
        isOpen = !isOpen;
    });
});
