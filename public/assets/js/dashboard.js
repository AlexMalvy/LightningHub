/* PAGE DASHBOARD ADMIN */

const navHome = document.querySelector('#nav-welcome');
const home = document.querySelector('#dashboard-welcome');
const navFaq = document.querySelector('#nav-faq');
const dashboardFaq = document.querySelector('#dashboard-faq');
const navHub = document.querySelector('#nav-hub');
const dashboardHub = document.querySelector('#dashboard-hub');
const navCreateHub = document.querySelector('#nav-create-hub');
const dashboardCreateHub = document.querySelector('#dashboard-create-hub');
const navUpdateHub = document.querySelector('#nav-update-hub');
const dashboardUpdateHub = document.querySelector('#dashboard-update-hub');
const sections = document.querySelectorAll('section');
let test2 = document.querySelector('#test2');
navHome.addEventListener('click', () => {

    home.classList.add('d-block');
    home.classList.remove('d-none');
    dashboardFaq.classList.add('d-none');
})

navFaq.addEventListener('click', () => {

    dashboardFaq.classList.add('d-block');
    dashboardFaq.classList.remove('d-none');
    home.classList.add('d-none');
})

navHub.addEventListener('click', () => {
    // dashboardHub.classList.add('d-block');
    dismissAll();
    dashboardHub.classList.remove('d-none');
    //home.classList.add('d-none');

})

navCreateHub.addEventListener('click', () => {
    dismissAll();
    dashboardCreateHub.classList.remove('d-none');
})

navUpdateHub.addEventListener('click', () => {
    dismissAll();
    dashboardUpdateHub.classList.remove('d-none');
    const update = document.querySelector('#ACHANGER');
    update.innerHTML = 'TEST';
})

function dismissAll(){
    for (const section of sections) {
        section.classList.add('d-none');
    }
}

alert('lala');