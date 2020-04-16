function barraUnbOpenMenu(e) {
    const buttonElement = e.target.parentElement;
    const menuElement = document.getElementById('menu-collapse');

    if (buttonElement.classList.contains('collapsed')) {
        buttonElement.classList.remove('collapsed');
        menuElement.classList.add('in');
        menuElement.style.setProperty('height', '137px');
        menuElement.style.setProperty('height', 'auto');
    } else {
        buttonElement.classList.add('collapsed');
        menuElement.classList.remove('in');
        menuElement.style.setProperty('height', '0px');
    }
}