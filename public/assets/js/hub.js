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

// How to get to each elements
// for (let gameId in gamemodes) {
//     for (let gameName in gamemodes[gameId]) {
//         console.log("game id : " + gameId + " || game : " + gameName);
//         for (let gamemodeId in gamemodes[gameId][gameName]) {
//             console.log("gamemode id : " + gamemodeId + " || gamemode : " + gamemodes[gameId][gameName][gamemodeId]);
//         }
//     }
// }

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
    loadGamemodeOptions(filterGame, filterGamemode);
});

createNewRoomGame.addEventListener("change", () => {
    loadGamemodeOptions(createNewRoomGame, createNewRoomGamemode);
});

if (modifyRoomGame) {
    modifyRoomGame.addEventListener("change", () => {
        loadGamemodeOptions(modifyRoomGame, modifyRoomGamemode);
    });
}


function deleteRoom($fieldId) {
    const fieldToChange = document.querySelector($fieldId);
    fieldToChange.setAttribute("value", "delete");
}


function changeValueToGamemodeId($selectFieldId, $hiddenInputFieldId) {
    // Get select html element
    const selectField = document.querySelector($selectFieldId);
    // Get input html element that will carry the gamemode id
    const hiddenInputField = document.querySelector($hiddenInputFieldId);

    // Retrieve currently selected (not the attribute) option
    let currentlySelectedIndex = selectField.options.selectedIndex;
    // Get the currently selected option via it's index
    let currentlySelectedOption = selectField.options.item(currentlySelectedIndex);
    // Retrieve the gamemode id value through it's attribute
    let currentlySelectedGamemodeId = currentlySelectedOption.getAttribute("gamemode_id")

    // Replace the attribute "value" to the new gamemode id
    hiddenInputField.setAttribute("value", currentlySelectedGamemodeId);
}