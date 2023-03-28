document.addEventListener("DOMContentLoaded", function () {
  document.querySelector("nav").classList.remove("hide-nav");
  let id;
  $(document).ready(function () {
    const annonces = document.querySelectorAll('.offer-item');
    const grandeOffre = document.querySelector('.card-form-offer');
    annonces.forEach(annonce => {

      annonce.addEventListener('click', () => {
        id = annonce.getAttribute('id');

        $.ajax({
          url: '/check-offer-applied',
          method: 'GET',
          data: { offer_id: id },
          success: function (response) {
            if (response.isApplied) {
              $('.divpostul button').attr('disabled', 'disabled').css('opacity', '0.5');
            } else {
              $('.divpostul button').removeAttr('disabled').css('opacity', '1');
            }
          },
          error: function () {
            alert("Erreur lors de la vérification de l'offre");
          }
        });

        $.ajax({
          url: '/check-offer-followed',
          method: 'GET',
          data: { offer_id: id },
          success: function (response) {
            if (response.isFollowed) {
              $('.btnfavoris').addClass('clicked');
            } else {
              $('.btnfavoris').removeClass('clicked');
            }
          },
          error: function () {
            alert("Erreur lors de la vérification de l'offre");
          }
        });

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
      });
    })
  })

  // Bouton Favoris
  let btnFavoris = document.querySelector('.btnfavoris');
  if (btnFavoris) {
    btnFavoris.addEventListener('click', function (event) {
      event.preventDefault();
      window.location.href = 'offre/follow/' + id;
    });
  }

  let btnFavorisClicked = document.querySelector('.btnfavoris.clicked');
  if (btnFavorisClicked) {
    btnFavorisClicked.addEventListener('click', function (event) {
      event.preventDefault();
      window.location.href = 'offre/unfollow/' + id;
    });
  }
});

$(document).ready(function () {
  $('.form-offer').submit(function () {
    $(this).find(':submit').prop('disabled', true);
  });
});

$(document).ready(function () {
  $('.offer-item').each(function () {
    const id = $(this).attr('id');
    $(this).on('click', function () {
      if (window.innerWidth < 768) {
        window.open('offre/apply/' + id);
      }
    });
  });
});