const observer = new IntersectionObserver(
    ([e]) => e.target.toggleAttribute('stuck', e.intersectionRatio < 1),
    { threshold: [1] }
);

observer.observe(document.querySelector('header'));

function openNav() {
    document.getElementById("mobile-nav").style.width = "300px";
}

function closeNav() {
    document.getElementById("mobile-nav").style.width = "0";
}