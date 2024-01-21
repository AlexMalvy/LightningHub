function displayPopupCookie() {

    const offcanvas = document.querySelector('#offcanvasPopup');
    const time = 1000;

    // Utiliser setTimeout pour déclencher l'affichage de l'offcanvas après le délai spécifié
    setTimeout(function() {
    offcanvas.style.display = 'block';

    // Use setTimeout to trigger the display of the offcanvas after the specified delay
    new bootstrap.Offcanvas(offcanvas).show();
    }, time);
}

displayPopupCookie();
