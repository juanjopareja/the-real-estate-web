document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    darkMode();
});

function darkMode() {
    const darkModeButton = document.querySelector('.dark-mode-button');

    darkModeButton.addEventListener('click', function() {
        document.body.classList.toggle(`dark-mode`);
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', responsiveNavigation);
}

function responsiveNavigation() {
    const navigation = document.querySelector('.navigation');

    navigation.classList.toggle('show');
}