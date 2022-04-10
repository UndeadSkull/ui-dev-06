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

// Horizontal Scrolling
sideScroll = (element, delta, speed, distance, flag = true) => {
    step = delta / 50;
    scrollAmount = 0;
    var slideTimer = setInterval(function () {
        element.scrollLeft += step;
        scrollAmount += Math.abs(step);
        if (scrollAmount >= distance) {
            window.clearInterval(slideTimer);
        }
        flag && checkHide(element);
    }, speed);
    if ((delta <= 0 && element.scrollLeft == 0) || (delta >= 0 && element.scrollLeft + window.innerWidth >= element.scrollWidth))
        window.scrollBy({ top: delta * 2, behavior: 'smooth' });
}

// Hide Scroll Buttons at ends
checkHide = (element) => {
    const btnLeft = document.querySelector(".btn-scroll.left")
    const btnRight = document.querySelector(".btn-scroll.right")
    element.scrollLeft == 0
        ? btnLeft.classList.add("hide")
        : btnLeft.classList.remove("hide")
    element.scrollLeft + window.innerWidth >= element.scrollWidth
        ? btnRight.classList.add("hide")
        : btnRight.classList.remove("hide")
}
