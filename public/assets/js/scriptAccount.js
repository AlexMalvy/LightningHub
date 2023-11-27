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

