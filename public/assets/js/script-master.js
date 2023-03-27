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

if (!navigator.serviceWorker.controller) {
  navigator.serviceWorker.register("/sw.js").then(function (reg) {
      console.log("Service worker has been registered for scope: " + reg.scope);
  });
}