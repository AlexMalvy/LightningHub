/* Disable / enable buttons (pseudo, mail) */

const inputPseudo = document.querySelector('#input-pseudo'), inputMail = document.querySelector('#input-mail');
const btnPseudo = document.querySelector('#btn-pseudo'), btnMail = document.querySelector('#btn-mail');

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