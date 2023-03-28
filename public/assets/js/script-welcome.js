document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("nav").classList.remove("hide-nav");
    let id;
    $(document).ready(function() {
      const annonces = document.querySelectorAll('.offer-item');
      const grandeOffre = document.querySelector('.card-form-offer');
      annonces.forEach(annonce => {
        id = annonce.getAttribute('id');
        annonce.addEventListener('click',() => {
          $(".container-form-offer2").css("visibility", "visible");
          const title = annonce.querySelector('.offer-title').textContent;
          const company = annonce.querySelector('.company-trust').textContent;
          const location = annonce.querySelector('.offer-city').textContent;
          const description = annonce.querySelector('.offer-description').getAttribute('data-description');

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

    $(document).ready(function() {
      $('.offer-item').each(function() {
        const id = $(this).attr('id');
        $(this).on('click', function() {
          if (window.innerWidth < 768) {
            window.open('offre/apply/' + id);
          }
        });
      });
    });