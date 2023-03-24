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
  $(document).ready(function() {
    const annonces = document.querySelectorAll('.annonce');
    const grandeOffre = document.querySelector('.grande_offre');
    annonces.forEach(annonce => {
      const id = annonce.getAttribute('id');
      annonce.addEventListener('click',() => {
        $(".grande_offre").css("visibility", "visible");
        const title = annonce.querySelector('.name_entreprise').textContent;
        const company = annonce.querySelector('.petite_note').textContent;
        const location = annonce.querySelector('.lieu').textContent;
        const description = annonce.querySelector('.txtdescription').getAttribute('data-description');
        grandeOffre.querySelector('.titre').textContent = title;
        grandeOffre.querySelector('.titreentreprise').textContent = company;
        grandeOffre.querySelector('.lieux').textContent = location;
        grandeOffre.querySelector('.description').textContent = description;
      })
    })
  });
});



