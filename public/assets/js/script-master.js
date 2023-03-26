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
  let id;
  $(document).ready(function() {
    const annonces = document.querySelectorAll('.annonce');
    const grandeOffre = document.querySelector('.grande_offre');
    annonces.forEach(annonce => {
      id = annonce.getAttribute('id');
      annonce.addEventListener('click',() => {
        $(".grande_offre").css("visibility", "visible");
        const title = annonce.querySelector('.name_entreprise').textContent;
        const company = annonce.querySelector('.petite_note').textContent;
        const location = annonce.querySelector('.lieu').textContent;
        const description = annonce.querySelector('.txtdescription').getAttribute('data-description');

        document.querySelector('.form-offer').setAttribute('action', 'offre/apply/' + id);

        grandeOffre.querySelector('.titre').textContent = title;
        grandeOffre.querySelector('.titreentreprise').textContent = company;
        grandeOffre.querySelector('.lieux').textContent = location;
        grandeOffre.querySelector('.description').innerHTML = description;
      })
    })

    // Bouton Favoris
    let btnFavoris = document.querySelector('.btnfavoris');
    if(btnFavoris){
      btnFavoris.addEventListener('click', function(event) {
          event.preventDefault();
          window.location.href = 'offre/follow/' + id;
      });
    }

    let btnFavorisClicked = document.querySelector('.btnfavoris.clicked');
    if(btnFavorisClicked){
      btnFavorisClicked.addEventListener('click', function(event) {
          event.preventDefault();
          window.location.href = 'offre/unfollow/' + id;
      });
    }
  });
});

  $(document).ready(function() {
    $('.form-offer').submit(function() {
      $(this).find(':submit').prop('disabled', true);
    });
  });

  // let button = document.querySelector('.btnfavoris');
  // button.addEventListener('click', function() {
  //   button.classList.toggle('clicked');
  // });




