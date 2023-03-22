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
    annonces.forEach(annonce => {
      const id = annonce.getAttribute('id');
      annonce.addEventListener('click',() => {
        $(".grande_offre").css("visibility", "visible");
        const titre = annonce.querySelector('.name_entreprise').textContent;
        const entreprise = annonce.querySelector('.title_offer').textContent;
        const note = annonce.querySelector('.petite_note').textContent;
        const lieu = annonce.querySelector('.lieu').textContent;
        const description = annonce.querySelector('.txtdescription').textContent;

        document.getElementsByClassName('titreentreprise').textContent = entreprise;
        document.getElementsByClassName('titre').textContent = titre;
        document.getElementsByClassName('note').textContent = note;
        document.getElementsByClassName('lieux').textContent = lieu;
        document.getElementsByClassName('description').textContent = description;
      })
    })
  });
});

