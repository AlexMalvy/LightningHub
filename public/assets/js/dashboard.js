/* PAGE DASHBOARD ADMIN */

const navHome = document.querySelector('#nav-welcome');
const home = document.querySelector('#dashboard-welcome');
const navFaq = document.querySelector('#nav-faq');
const dashboardFaq = document.querySelector('#dashboard-faq');
const navHub = document.querySelector('#nav-hub');
const dashboardHub = document.querySelector('#dashboard-hub');
const sections = document.querySelectorAll('section');

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
    //alert("lala");
   // dashboardHub.classList.add('d-block');
    dismissAll();
    dashboardHub.classList.remove('d-none');
    //home.classList.add('d-none');

})

function dismissAll(){
    for (const section of sections) {
        section.classList.add('d-none');
    }
}