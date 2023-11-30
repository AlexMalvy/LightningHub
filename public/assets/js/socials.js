function displayDisconnected(){
    const listDisconnected = document.querySelector('#list-disconnected');
    if (listDisconnected.classList.contains('d-none')){
        listDisconnected.classList.remove('d-none');
    }
    else{
        listDisconnected.classList.add('d-none');
    }
}

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