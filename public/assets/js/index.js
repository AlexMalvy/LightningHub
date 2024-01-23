function acceptCookies() {
    document.getElementById("cookie-banner").style.display = "none";

    // Définissez un cookie pour enregistrer l'acceptation des cookies (valable pendant, par exemple, 30 jours)
    let date = new Date();
    date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
    let expires = "expires=" + date.toUTCString();
    document.cookie = "accept_cookies=true; " + expires + "; path=/";
}

document.addEventListener("DOMContentLoaded", function() {
    // Vérifiez si l'utilisateur a déjà accepté les cookies
    if (!document.cookie.includes('accept_cookies')) {
        let cookieBanner = document.createElement('div');
        cookieBanner.id = 'cookie-banner';
        cookieBanner.innerHTML = `
            <div class="offcanvas offcanvas-bottom h-auto" tabindex="-1" id="offcanvasPopup" aria-labelledby="Popup-cookie">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title reconstruct" id="offcanvasPopupBottom">COOKIE INFORMATION</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">
                    <p class="fs-6">Nous utilisons des cookies<br></p>
            
                    <ul class="fs-6">
                        <li>Fonctionnel</li>
                    </ul>
            
                    <p class="fs-6">En cliquant sur << J'accepte >>, vous donnez votre consentement à toutes les fins énoncées.</p>
            
                    <form action="#" method="POST" class="d-flex mt-3 p-0">
                        <button class="btn lh-buttons-purple-faded me-3" data-bs-dismiss="offcanvas"   aria-label="Annuler">Je refuse</button>
                        <button id="cookie_accept" class="btn lh-buttons-purple" data-bs-dismiss="offcanvas"  aria-label="Confirmer">J'accepte</button>
                    </form>
                </div>
            </div>
        `;

        document.body.appendChild(cookieBanner);
        const offcanvas = document.querySelector('#offcanvasPopup');
        offcanvas.style.display = 'block';

        // Use setTimeout to trigger the display of the offcanvas after the specified delay
        new bootstrap.Offcanvas(offcanvas).show();
        let btn = document.querySelector('#cookie_accept');

        btn.addEventListener('click', function(){

            acceptCookies();

        })
    }
});