function displayDisconnected(){
    const listDisconnected = document.querySelector('#list-disconnected');
    if (listDisconnected.classList.contains('d-none')){
        listDisconnected.classList.remove('d-none');
    }
    else{
        listDisconnected.classList.add('d-none');
    }
}