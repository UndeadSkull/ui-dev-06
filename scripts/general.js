// Sticky Header
const observer = new IntersectionObserver(
    ([e]) => e.target.toggleAttribute('stuck', e.intersectionRatio < 1),
    { threshold: [1] }
);
observer.observe(document.querySelector('header'));

// Mobile Nav
const mobileNav = document.getElementById("mobile-nav")
openNav = () => mobileNav.style.width = "300px"
closeNav = () => mobileNav.style.width = "0"