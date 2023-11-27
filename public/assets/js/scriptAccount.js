/* PAGE ACCOUNT */

/* Disable / enable buttons (pseudo, mail) */

const inputPseudo = document.querySelector('#input-pseudo'), inputMail = document.querySelector('#input-mail');
const btnPseudo = document.querySelector('#btn-pseudo'), btnMail = document.querySelector('#btn-mail');

if (btnPseudo && btnMail){
    btnPseudo.disabled = true;
    btnMail.disabled = true;

    inputPseudo.addEventListener('input', () =>{
        btnPseudo.disabled = !inputPseudo.value.trim();
    })

    inputMail.addEventListener('input', () =>{
        btnMail.disabled = !inputMail.value.trim();
    })

    /* Disable / enable buttons (IdIngame) */

    const inputGames = document.querySelectorAll('.input-inGame'), btnGames = document.querySelectorAll('.button-inGame');

    btnGames.forEach((btnGame, index) => {
        btnGame.disabled = true;

        inputGames[index].addEventListener('input', () => {
            btnGame.disabled = !inputGames[index].value.trim();
        });
    });

    /* Submit form notification

document.querySelector("#SwitchCheck").addEventListener('change', function(){
    document.querySelector("#formNotification").submit();
});

 */
}


/* PAGE HUB */

/* enable tab create new room */

const newRoom = document.querySelector('#newRoom');
const newRoomHubTab = document.querySelector('#new-room-hub-tab');
const newRoomHubTabPane = document.querySelector('#new-room-hub-tab-pane');
const hubTabPane = document.querySelector('#hub-tab-pane');
const hubTab = document.querySelector('#hub-tab');

if (newRoom && newRoomHubTab){
    newRoom.addEventListener("click", () =>{
        newRoomHubTab.classList.remove('d-none');
        newRoomHubTab.classList.add('active');
        newRoomHubTabPane.classList.add('active');
        hubTab.classList.remove('active');
        hubTabPane.classList.remove('active');

        // Défiler vers l'élément
        newRoomHubTab.scrollIntoView({
            behavior: 'smooth', // Ajoute un effet de défilement fluide
            block: 'start'      // Aligner l'élément en haut de la fenêtre
        });
    });
}

