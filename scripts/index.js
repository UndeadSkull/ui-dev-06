let slideIndex = 1;
showSlides(slideIndex);

setInterval(function () {
  plusSlides(1)
}, 5000);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

const scrollContainer1 = document.querySelector(".gallery-container");
scrollContainer1.addEventListener("wheel", (evt) => {
  evt.preventDefault();
  sideScroll(scrollContainer1, evt.deltaY, 5, 300);
});

const scrollContainer2 = document.querySelector(".facilities-container");

function scrollRight() {
  sideScroll(scrollContainer2, 300, 5, 320)
}
function scrollLeft() {
  sideScroll(scrollContainer2, -300, 5, 320)
}

function sideScroll(element, delta, speed, distance) {
  step = delta / 50;
  scrollAmount = 0;
  var slideTimer = setInterval(function () {
    element.scrollLeft += step;
    scrollAmount += Math.abs(step);
    if (scrollAmount >= distance) {
      window.clearInterval(slideTimer);
    }
  }, speed);
}