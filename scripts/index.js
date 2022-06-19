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
const scrollContainer1 = document.querySelectorAll(".gallery-container");
scrollContainer1[0].addEventListener("wheel", (evt) => {
  if (Math.abs(evt.deltaX) < Math.abs(evt.deltaY)) {
    evt.preventDefault()
  }
  sideScroll(scrollContainer1[0], evt.deltaY, 5, 300, false);

});
scrollContainer1[1].addEventListener("wheel", (evt) => {
  if (Math.abs(evt.deltaX) < Math.abs(evt.deltaY)) {
    evt.preventDefault()
  }
  sideScroll(scrollContainer1[1], evt.deltaY, 5, 300);
});

scrollRight = (elem) => {
  const element = document.querySelector("." + elem + "-container");
  // console.log(element);
  sideScroll(element, 300, 5, 620)
}
scrollLeft = (elem) => {
  const element = document.querySelector("." + elem + "-container");
  sideScroll(element, -300, 5, 620)
}