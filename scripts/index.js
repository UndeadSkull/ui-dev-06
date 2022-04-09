// Hero Section Slider
showSlides = (n) => {
  let i;
  let slides = document.getElementsByClassName("heroSlides");
  if (n > slides.length) slideIndex = 1
  if (n < 1) slideIndex = slides.length
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

let slideIndex = 1;
showSlides(slideIndex);

setInterval(() => plusSlides(1), 5000)
plusSlides = (n) => showSlides(slideIndex += n)

// Booking Input Value
inputChange = (elem) => {
  document.querySelectorAll(".subtitle")[elem].innerHTML = document.querySelectorAll(".book-input")[elem].value
}

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
}

const scrollContainer1 = document.querySelector(".gallery-container");
scrollContainer1.addEventListener("wheel", (evt) => {
  evt.preventDefault();
  sideScroll(scrollContainer1, evt.deltaY, 5, 300);
});

const scrollContainer2 = document.querySelector(".facilities-container");
scrollRight = () => sideScroll(scrollContainer2, 300, 5, 320)
scrollLeft = () => sideScroll(scrollContainer2, -300, 5, 320)