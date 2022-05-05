// Gallery Scroll

const scrollContainer = document.querySelector(".gallery-container");

const imageWidth = scrollContainer.children[1].offsetWidth;
const scrollWidth = imageWidth + (imageWidth * .1)
scrollRight = () => sideScroll(scrollContainer, 300, 1, scrollWidth)
scrollLeft = () => sideScroll(scrollContainer, -300, 1, scrollWidth)