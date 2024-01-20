const hubs = document.querySelector('#hubs');
hubs.addEventListener('click', function(event){
    if (event.target.classList.contains('delete'))  {
        const idToDelete = document.querySelector('#room_id');
        console.log(idToDelete);
        idToDelete.value = event.target.dataset.id;
    }
})
