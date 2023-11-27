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

// Chat/Members window collapse/expend

const chatWindow = document.querySelector("#chat-window");
const chatWindowOptions = document.querySelector("#chat-window-room-options");
const chatMembersWindow = document.querySelector("#chat-members-window");
const membersClose = document.querySelector("#chat-members-close");

const chatMembersCollapseExpend = () => {
    if (chatMembersWindow.getAttribute("aria-selected") === "false") {
        chatWindow.classList.remove("col");
        chatWindow.classList.remove("d-flex");
        chatWindow.classList.add("col-lg-7");
        chatWindow.classList.add("col-xl-9");
        chatWindow.classList.add("d-none");
        chatWindow.classList.add("d-lg-flex");

        chatMembersWindow.classList.remove("d-none");
        chatMembersWindow.classList.add("col");
        chatMembersWindow.classList.add("col-lg-5");
        chatMembersWindow.classList.add("col-xl-3");
        chatMembersWindow.classList.add("d-flex");
        chatMembersWindow.setAttribute("aria-selected", "true");
    } else {
        chatWindow.classList.add("col");
        chatWindow.classList.add("d-flex");
        chatWindow.classList.remove("col-lg-7");
        chatWindow.classList.remove("col-xl-9");
        chatWindow.classList.remove("d-none");
        chatWindow.classList.remove("d-lg-flex");

        chatMembersWindow.classList.add("d-none");
        chatMembersWindow.classList.remove("col");
        chatMembersWindow.classList.remove("col-lg-5");
        chatMembersWindow.classList.remove("col-xl-3");
        chatMembersWindow.classList.remove("d-flex");
        chatMembersWindow.setAttribute("aria-selected", "false");
    }
}

chatWindowOptions.addEventListener("click", () => chatMembersCollapseExpend());
membersClose.addEventListener("click", () => chatMembersCollapseExpend());

/* PAGE HUB */

/* enable tab create new room */

const newRoom = document.querySelector('#newRoom');
const newRoomHubTab = document.querySelector('#new-room-hub-tab');
const newRoomHubTabPane = document.querySelector('#new-room-hub-tab-pane');
const hubTabPane = document.querySelector('#hub-tab-pane');
const hubTab = document.querySelector('#hub-tab');
const hubFriendTab = document.querySelector('#friends-tab');
const hubFriendTabPane = document.querySelector('#friends-tab-pane');
const hubPendingTab = document.querySelector('#pending-tab');
const hubPendingTabPane = document.querySelector('#pending-tab-pane');
const hubCurrentTab = document.querySelector('#current-hub-tab');
const hubCurrentTabPane = document.querySelector('#current-hub-tab-pane');


const updateRoom = document.querySelector('#update-room');

if (newRoom && newRoomHubTab || updateRoom){
    newRoom.addEventListener("click", () => {
        newRoomHubTab.classList.remove('d-none');
        newRoomHubTab.classList.add('active');
        newRoomHubTabPane.classList.add('active');
        hubTab.classList.remove('active');
        hubTabPane.classList.remove('active');
        hubFriendTab.classList.remove('active');
        hubFriendTabPane.classList.remove('active');
        hubPendingTab.classList.remove('active');
        hubPendingTabPane.classList.remove('active');
        hubCurrentTab.classList.remove('active');
        hubCurrentTabPane.classList.remove('active');

        // Défiler vers l'élément
        newRoomHubTab.scrollIntoView({
            behavior: 'smooth', // Ajoute un effet de défilement fluide
            block: 'start'      // Aligner l'élément en haut de la fenêtre
        });
    });

        updateRoom.addEventListener("click", () =>{
            const updateRoomTab = document.querySelector('#update-room-hub-tab');
            const updateRoomTabPane = document.querySelector('#update-room-hub-tab-pane');

            updateRoomTab.classList.add('active');
            updateRoomTabPane.classList.add('active');
            updateRoomTab.classList.remove('d-none');
            hubTab.classList.remove('active');
            hubTabPane.classList.remove('active');
            hubFriendTab.classList.remove('active');
            hubFriendTabPane.classList.remove('active');
            hubPendingTab.classList.remove('active');
            hubPendingTabPane.classList.remove('active');
            hubCurrentTab.classList.remove('active');
            hubCurrentTabPane.classList.remove('active');

            // Défiler vers l'élément
            newRoomHubTab.scrollIntoView({
                behavior: 'smooth', // Ajoute un effet de défilement fluide
                block: 'start'      // Aligner l'élément en haut de la fenêtre
            });
        });


}



