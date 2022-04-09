// Gallery And Facilities Scroll
sideScroll = (element, delta, speed, distance) => {
    step = delta / 50;
    scrollAmount = 0;
    var slideTimer = setInterval(function () {
        element.scrollLeft += step;
        scrollAmount += Math.abs(step);
        if (scrollAmount >= distance) {
            window.clearInterval(slideTimer);
        }
    }, speed);
    if (delta > 0 && element.scrollLeft + window.innerWidth >= element.scrollWidth)
        window.scroll({ top: 200, behavior: 'smooth' });

}

const scrollContainer = document.querySelector(".gallery-container");
scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    sideScroll(scrollContainer, evt.deltaY, 5, 300);
});

const imageWidth = scrollContainer.children[1].offsetWidth;
const scrollWidth = imageWidth + (imageWidth * .1)
scrollRight = () => sideScroll(scrollContainer, 300, 5, scrollWidth)
scrollLeft = () => sideScroll(scrollContainer, -300, 5, scrollWidth)