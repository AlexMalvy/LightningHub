// Diplay or hide the list of disconnected users

const listDisconnected = document.querySelector('#list-disconnected');
const principalRow = document.querySelector('#principal');
const flexSwitchCheckDefault = document.querySelector('#flexSwitchCheckDefault');

flexSwitchCheckDefault.addEventListener('click', displayDisconnected);
function displayDisconnected(){
    if (listDisconnected.classList.contains('d-none')){
        listDisconnected.classList.remove('d-none');
    }
    else{
        listDisconnected.classList.add('d-none');
    }
}

principalRow.addEventListener('click', function(event){
    if (event.target.classList.contains('delete'))  {
        const idToDelete = document.querySelector('#idToDelete');
        idToDelete.value = event.target.dataset.id;
    }
})



// Copy the id
const copy = document.querySelector('#copy');
copy.addEventListener('click', copyId);

function copyId(){

    const textToCopy = document.querySelector('#myProfile');

    // Create a textarea element to hold the text temporarily
    const tempTextArea = document.createElement("textarea");
    tempTextArea.value = textToCopy.textContent;
    document.body.appendChild(tempTextArea);

    // Select the text in the textarea
    tempTextArea.select();
    tempTextArea.setSelectionRange(0, 99999); /* For mobile devices */

    // Copy the text to the clipboard
    document.execCommand("copy");

    // Remove the temporary textarea
    document.body.removeChild(tempTextArea);


}

let friends = [];
friends = document.querySelector('#friends').value;

let friends_tab = friends.split(',');

const searchFriend = document.querySelector('#searchFriend');
searchFriend.addEventListener('input', findUser);
// Find the user in the list of friends

function findUser(){
    const verifGood = document.querySelector('#verificationUserGood');
    const verifNotGood = document.querySelector('#verificationUserNotGood');
    const bouttonSearch = document.querySelector('#btnAddFriend');


    if (friends_tab.includes(document.querySelector('#searchFriend').value)){ // if Users Array contains user

        verifGood.classList.remove('d-none');
        if (!verifNotGood.classList.contains('d-none')){
            verifNotGood.classList.add('d-none');
        }
        bouttonSearch.disabled = false;
    }
    else{
        if (!verifGood.classList.contains('d-none')){
            verifGood.classList.add('d-none');
        }

        if (verifNotGood.classList.contains('d-none')){
            verifNotGood.classList.remove('d-none');
        }

        if (!bouttonSearch.disabled){
            bouttonSearch.disabled = true;
        }


    }



}

const btnChangeTab = document.querySelector('.tabs');
btnChangeTab.addEventListener('click', function(e){
    if (e.target.classList.contains('change-tab')){
        changerOnglet(e.target.dataset.id);
    }
})

function changerOnglet(numeroOnglet) {
    // Mettre à jour l'onglet actif
    document.getElementById('myTab').querySelector('.active').classList.remove('active');
    document.getElementById('myTab').querySelectorAll('.nav-item')[numeroOnglet - 1].querySelector('.nav-link').classList.add('active');

    // Mettre à jour le contenu de l'onglet côté client
    document.querySelector('.tab-content').querySelector('.active').classList.remove('show', 'active');
    document.querySelector('.tab-content').querySelectorAll('.tab-pane')[numeroOnglet - 1].classList.add('show', 'active');

    return fetch("mettre_a_jour_onglet.php?onglet=" + numeroOnglet)
        .then(response => {
            if (!response.ok) {
                throw new Error("Erreur lors de la requête AJAX");
            }
            return response.text();
        })
        .catch(error => {
            // La requête a échoué
            console.error("Erreur :", error);
        });

}

