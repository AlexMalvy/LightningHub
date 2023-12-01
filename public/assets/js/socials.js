// Diplay or hide the list of disconnected users
function displayDisconnected(){
    const listDisconnected = document.querySelector('#list-disconnected');
    if (listDisconnected.classList.contains('d-none')){
        listDisconnected.classList.remove('d-none');
    }
    else{
        listDisconnected.classList.add('d-none');
    }
}

// Copy the id
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

// Find the user in the list of friends

function findUser(){
    const nameUser = "ismaelel67";
    let tabUsers = ["ismaelel67","ismaelel68","ismaelel69","ismaelel70"];
    const verifGood = document.querySelector('#verificationUserGood');
    const verifNotGood = document.querySelector('#verificationUserNotGood');
    const bouttonSearch = document.querySelector('#btnAddFriend');


    if (tabUsers.includes(document.querySelector('#searchFriend').value)){
        //alert("trouvé");

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