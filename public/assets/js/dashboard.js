/* PAGE DASHBOARD ADMIN */

const navHome = document.querySelector('#nav-welcome');
const home = document.querySelector('#dashboard-welcome');
const navFaq = document.querySelector('#nav-faq');
const dashboardFaq = document.querySelector('#dashboard-faq');


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