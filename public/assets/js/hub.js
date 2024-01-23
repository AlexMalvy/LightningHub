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

if (chatWindowOptions) {
    chatWindowOptions.addEventListener("click", () => chatMembersCollapseExpend());
}
if (membersClose) {
    membersClose.addEventListener("click", () => chatMembersCollapseExpend());
}


/* enable tab create new room / update room */
const newRoom = document.querySelector('#newRoom');
const newRoomHubTab = document.querySelector('#new-room-hub-tab');
const newRoomHubTabPane = document.querySelector('#new-room-hub-tab-pane');

const hubTab = document.querySelector('#hub-tab');
const hubTabPane = document.querySelector('#hub-tab-pane');

const hubFriendTab = document.querySelector('#friends-tab');
const hubFriendTabPane = document.querySelector('#friends-tab-pane');

const hubPendingTab = document.querySelector('#pending-tab');
const hubPendingTabPane = document.querySelector('#pending-tab-pane');

const hubCurrentTab = document.querySelector('#current-hub-tab');
const hubCurrentTabPane = document.querySelector('#current-hub-tab-pane');

const updateRoom = document.querySelector('#update-room');
const updateRoomTab = document.querySelector('#update-room-hub-tab');
const updateRoomTabPane = document.querySelector('#update-room-hub-tab-pane');

let newRoomTabOpen = false;
let updateRoomTabOpen = false;

function displayTabs(tab, tabPane) {
    tab.classList.add('active');
    tabPane.classList.add('active');
    tab.classList.remove('d-none');
}

function hideTabs() {
    const tabs = [hubTab, hubFriendTab, hubPendingTab, hubCurrentTab];
    const tabPanes = [hubTabPane, hubFriendTabPane, hubPendingTabPane, hubCurrentTabPane];

    tabs.forEach(tab => {
        if(tab) {
        tab.classList.remove('active')
        }
    });
    tabPanes.forEach(tabPane => {
        if(tabPane) {
            tabPane.classList.remove('active')
        }
    });
}

if (newRoom && newRoomHubTab || updateRoom) {

    if (newRoom) {
        newRoom.addEventListener("click", () => {
            if(!newRoomTabOpen){
                displayTabs(newRoomHubTab, newRoomHubTabPane);
                hideTabs();
                if (updateRoomTab) {
                    updateRoomTab.classList.remove('active');
                }
                if (updateRoomTabPane) {
                    updateRoomTabPane.classList.remove('active');
                }
                newRoomTabOpen = true;
            } else{
                newRoomHubTab.classList.add("active");
                newRoomHubTabPane.classList.add("active");
                newRoomHubTabPane.classList.add("show");
                if (updateRoomTab) {
                    updateRoomTab.classList.remove('active');
                }
                if (updateRoomTabPane) {
                    updateRoomTabPane.classList.remove('active');
                }
                hideTabs();
            }
        });
    }

    if (updateRoom) {
        updateRoom.addEventListener("click", () => {
            const updateRoomTab = document.querySelector('#update-room-hub-tab');
            const updateRoomTabPane = document.querySelector('#update-room-hub-tab-pane');

            if (!updateRoomTabOpen){
                displayTabs(updateRoomTab, updateRoomTabPane);
                hideTabs();
                updateRoomTabOpen = true;
            } else{
                updateRoomTab.classList.add("active");
                updateRoomTabPane.classList.add("active");
                updateRoomTabPane.classList.add("show");
                newRoomHubTab.classList.remove('active');
                newRoomHubTabPane.classList.remove('active');
                hideTabs();
            }
        });
    }
}


// Filters display

const filterGame = document.querySelector("#game");
const filterGamemode = document.querySelector("#game_type");

const createNewRoomGame = document.querySelector("#game_new_room");
const createNewRoomGamemode = document.querySelector("#game_type_new_room");

const modifyRoomGame = document.querySelector("#game_update_room");
const modifyRoomGamemode = document.querySelector("#game_type_update_room");

function loadGamemodeOptionsFilters(game_element, gamemode_element) {
    const filterOptionGamemode = gamemode_element.querySelectorAll("option");
    filterOptionGamemode.forEach(option => {
        option.remove();
    });
    
    let html_option = document.createElement("option");
    html_option.setAttribute("value", "");
    let inner_html = document.createTextNode("Tout");
    html_option.appendChild(inner_html);
    gamemode_element.appendChild(html_option);

    for (let gameId in gamemodes) {
        for (let gameName in gamemodes[gameId]) {
            if (game_element.value == gameName) {
                for (let gamemodeId in gamemodes[gameId][gameName]) {
                    let html_option = document.createElement("option");
                    html_option.setAttribute("value", gamemodes[gameId][gameName][gamemodeId]);
                    html_option.setAttribute("gamemode_id", [gamemodeId]);
                    let inner_html = document.createTextNode(gamemodes[gameId][gameName][gamemodeId]);
                    html_option.appendChild(inner_html);
                    gamemode_element.appendChild(html_option);
                }
            }
        }
    }
}

function loadGamemodeOptions(game_element, gamemode_element) {
    const filterOptionGamemode = gamemode_element.querySelectorAll("option");
    filterOptionGamemode.forEach(option => {
        option.remove();
    });

    for (let gameId in gamemodes) {
        for (let gameName in gamemodes[gameId]) {
            if (game_element.value == gameName) {
                for (let gamemodeId in gamemodes[gameId][gameName]) {
                    let html_option = document.createElement("option");
                    html_option.setAttribute("value", gamemodes[gameId][gameName][gamemodeId]);
                    html_option.setAttribute("gamemode_id", [gamemodeId]);
                    let inner_html = document.createTextNode(gamemodes[gameId][gameName][gamemodeId]);
                    html_option.appendChild(inner_html);
                    gamemode_element.appendChild(html_option);
                }
            }
        }
    }
}

filterGame.addEventListener("change", () => {
    loadGamemodeOptionsFilters(filterGame, filterGamemode);
});

if (createNewRoomGame) {
    createNewRoomGame.addEventListener("change", () => {
        loadGamemodeOptions(createNewRoomGame, createNewRoomGamemode);
    });
}

if (modifyRoomGame) {
    modifyRoomGame.addEventListener("change", () => {
        loadGamemodeOptions(modifyRoomGame, modifyRoomGamemode);
    });
}


function deleteRoom($fieldId) {
    const fieldToChange = document.querySelector($fieldId);
    fieldToChange.setAttribute("value", "delete");
}

const deleteRoomButton = document.querySelector("#delete_room_button");
if (deleteRoomButton) {
    deleteRoomButton.addEventListener("click", () => {
        deleteRoom("#update-action-field");
    })
}


function changeValueToGamemodeId($selectFieldName, $hiddenInputFieldName) {
    // Get select html element
    const selectField = $selectFieldName;
    // Get input html element that will carry the gamemode id
    const hiddenInputField = $hiddenInputFieldName;

    // Retrieve currently selected (not the attribute) option
    let currentlySelectedIndex = selectField.options.selectedIndex;
    // Get the currently selected option via it's index
    let currentlySelectedOption = selectField.options.item(currentlySelectedIndex);
    // Retrieve the gamemode id value through it's attribute
    let currentlySelectedGamemodeId = currentlySelectedOption.getAttribute("gamemode_id")

    // Replace the attribute "value" to the new gamemode id
    hiddenInputField.setAttribute("value", currentlySelectedGamemodeId);
    
}

const filtersForm = document.forms["filters"];
const createRoomForm = document.forms["create_room"];
const updateRoomForm = document.forms["update_room"];

if (createRoomForm) {
    createRoomForm.addEventListener("submit", () => {
        changeValueToGamemodeId(createRoomForm["room_game_type"], createRoomForm["room_game_type_id"]);
    })
}

if (updateRoomForm) {
    updateRoomForm.addEventListener("submit", () => {
        changeValueToGamemodeId(updateRoomForm["room_game_type"], updateRoomForm["room_game_type_id"]);
    })
}


// Request to join AJAX
const requestToJoinPannel = document.querySelector("#requestToJoinHeader");

function requestsAjax() {
    const instructions = {
        action: "request"
    }
    const instructionsJSON = JSON.stringify(instructions);
    const options = {
        method: "POST",
        body: instructionsJSON,
        headers: {
            "Content-Type": "application/json"
        }
    }

    const request = fetch("handlers/hub-handler.php", options);
    request.then(function(response){
        return response.json();
    })
    .then(function(data){
        let html = "";
        const {requests} = data;

        if(requests.length === 0){
            html = `<h2 class="text-center py-5">Les utilisateurs qui veulent rejoindre votre salon apparaîtrons ici.</h2>`
        }

        requests.forEach(function(request){
            date = new Date(request.timeRequest);
            html += `
            <article class="col d-flex flex-column flex-md-row justify-content-between align-items-center p-2 border">
                <div class="d-flex justify-content-between align-items-center w-100 px-1 px-md-0">
                    <div>${request.username}#${request.idUser}</div>
                    <div class="ms-auto">${date.getHours()}:${date.getMinutes()}</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <form action="handlers/room-handler.php" method="POST" class="ms-5">
                        <input type="text" name="action" value="accept" hidden>
                        <input type="text" name="targetId" value="${request.idUser}" hidden>
                        <input type="text" name="room_id" value="${request.idRoom}" hidden>
                        <button class="btn lh-buttons-purple">Accepter</button>
                    </form>
                    <form action="handlers/room-handler.php" method="POST" class="ms-2">
                        <input type="text" name="action" value="decline" hidden>
                        <input type="text" name="targetId" value="${request.idUser}" hidden>
                        <input type="text" name="room_id" value="${request.idRoom}" hidden>
                        <button class="btn lh-buttons-red">X</button>
                    </form>
                </div>
            </article>
            `;
        })

        requestToJoinPannel.innerHTML = html;
    })
}

if (requestToJoinPannel) {
    setInterval(() => {
        requestsAjax();
    }, 5000);
}


// Joined a Room AJAX
const toastLiveExample = document.getElementById('liveToast');
const toastLiveBody = document.querySelector("#notification-body");

function joinedAjax() {
    const instructions = {
        action: "joined"
    }
    const instructionsJSON = JSON.stringify(instructions);
    const options = {
        method: "POST",
        body: instructionsJSON,
        headers: {
            "Content-Type": "application/json"
        }
    }

    const request = fetch("handlers/hub-handler.php", options);
    
    request.then(function(response){
        return response.json();
    })
    .then(function(data){
        const {joined} = data;

        if (joined.length > 0) {
            text = `Vous avez été accepter dans ${joined[0].title}`;
        
            toastLiveBody.innerText = text;
            
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastBootstrap.show()
        }
    })
}

if (hubCurrentTabPane == null) {
    setInterval(() => {
        joinedAjax();
    }, 5000);
}


// Chat Room AJAX
const chatMessages = document.querySelector("#chat-messages");
let lastAmountOfMessages;

function messagesAjax() {
    const instructions = {
        action: "messages"
    }
    const instructionsJSON = JSON.stringify(instructions);
    const options = {
        method: "POST",
        body: instructionsJSON,
        headers: {
            "Content-Type": "application/json"
        }
    }

    const request = fetch("handlers/roomChat-handler.php", options);
    
    request.then(function(response){
        return response.json();
    })
    .then(function(data){
        let html = `
        <article class="col disclaimer">
            <p>System : Soyez gentils.</p>
        </article>`;

        if(data.roomChat.length === 0){
            html += `<h2 class="text-center py-5">Les messages du salons apparaîtront ici.</h2>`
        }

        if(data != []){
            if (lastAmountOfMessages != data.roomChat.length) {
                data.roomChat.forEach(function(message){
                    date = new Date(message.timeMessage);
                    if(!message.profilePicture){
                        userProfilePicture = 'assets/images/Avatar_default.png';
                    } else {
                        // Prefix to remove
                        prefixToRemove = '../../public/';

                        // Delete Prefix
                        relativePath = str_replace(prefixToRemove, '', message.profilePicture);

                        userProfilePicture = relativePath;
                    }
                    html += `
                    
                    <article class="col message">
                        <img src="${userProfilePicture}" alt="profile picture" class="avatar-50x50">

                        <div class="message-body">

                            <div class="message-header">
                                <h2 class="card-title">${message.username}</h2>
                                <small>${date.getHours()}:${date.getMinutes()}</small>
                                <form action="handlers/roomMessage-handler.php" method="POST" class="ms-auto">
                                    <input type="text" name="action" value="report" hidden>
                                    <input type="text" name="message_id" value="${message.idMessage}" hidden>
                                    <button class="btn">
                                        <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                    </button>
                                </form>
                            </div>

                            <p class="card-text text-break">${message.message}</p>
                        </div>
                    </article>
                    `;
                })
                lastAmountOfMessages = data.roomChat.length;

                chatMessages.innerHTML = html;
            }
        }

    })
}

if (chatMessages != null) {
    setInterval(() => {
        messagesAjax();
    }, 2000);
}