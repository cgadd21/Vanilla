const currentPage = window.location.pathname.substring(1);
const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
    const href = link.getAttribute('href').substring(1);
    if (currentPage.includes(href)){
        link.classList.add('active');
    }
});