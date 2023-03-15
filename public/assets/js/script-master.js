let prevScrollPos = window.pageYOffset;
window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  if (prevScrollPos > currentScrollPos) {
    document.querySelector("nav").classList.remove("hide-nav");
  } else {
    document.querySelector("nav").classList.add("hide-nav");
  }
  prevScrollPos = currentScrollPos;
}

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("nav").classList.remove("hide-nav");
});