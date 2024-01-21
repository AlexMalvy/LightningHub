const hubs = document.querySelector('#hubs')
if (hubs) {
    hubs.addEventListener('click', function(event){
        if (event.target.classList.contains('delete'))  {
            const idToDelete = document.querySelector('#room_id');
            idToDelete.value = event.target.dataset.id;
        }
    })
}


const games = document.querySelector('#games');
if (games) {
    games.addEventListener('click', function(event){
        if (event.target.classList.contains('delete'))  {
            const idToDelete = document.querySelector('#idgame');
            idToDelete.value = event.target.dataset.id;
        }
    })

}

