// Gallery Scroll

const scrollContainer = document.querySelector(".gallery-container");
scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    sideScroll(scrollContainer, evt.deltaY, 5, 300);
});

const imageWidth = scrollContainer.children[1].offsetWidth;
const scrollWidth = imageWidth + (imageWidth * .1)
scrollRight = () => sideScroll(scrollContainer, 300, 1, scrollWidth)
scrollLeft = () => sideScroll(scrollContainer, -300, 1, scrollWidth)

// Date Set
dateChange = (elem) => {
    let date
    elem
        ? date = new Date(document.querySelector("#checkout").value)
        : date = new Date(document.querySelector("#checkin").value)

    var day = date.getDate();
    var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
        "Sep", "Oct", "Nov", "Dec"][date.getMonth()];
    var year = date.getFullYear();
    var str = '\'' + day + ' ' + month + ' ' + year + '\'';
    elem
        ? document.querySelector(".booking-container").style.setProperty('--date2', str)
        : document.querySelector(".booking-container").style.setProperty('--date1', str)
}