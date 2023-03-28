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

document.addEventListener("DOMContentLoaded", function () {
  const menuHamburger = document.querySelector(".menu-hamburger");
  const responsive = document.querySelector(".link_nav-bar");
  let defaultStyle = 'block'; // Remplacez cette valeur par la valeur par défaut que vous souhaitez

  menuHamburger.addEventListener('click', () => {
    responsive.classList.toggle('mobile-menu');
    var elements = document.getElementsByClassName('fa-play');
    for (var i = 0; i < elements.length; i++) {
      if (elements[i].style.display === 'none') {
        elements[i].style.display = defaultStyle;
      } else {
        defaultStyle = elements[i].style.display;
        elements[i].style.display = 'none';
      }
    }
  });
});