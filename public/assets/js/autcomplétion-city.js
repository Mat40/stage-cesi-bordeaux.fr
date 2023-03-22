$(document).ready(function() {

  // Écouter l'événement "blur" sur le champ "code postal"
  $("#cp").on("blur", function() {
      // Envoyer une requête AJAX à l'API Adresse
      $.get("https://api-adresse.data.gouv.fr/search/?q=8+bd+du+port&postcode=" + $(this).val(), function(data) {
          // Extraire la liste des villes correspondantes du JSON renvoyé
          var villes = [];
          $.each(data.features, function(i, feature) {
              villes.push(feature.properties.city);
          });

          // Afficher les villes dans un menu déroulant
          $("#ville").empty();
          $.each(villes, function(i, ville) {
              $("#ville").append("<option value='" + ville + "'>" + ville + "</option>");
          });
      });
  });

  // Écouter l'événement "blur" sur le champ "ville"
  $("#cp").on("blur", function() {
      // Envoyer une nouvelle requête AJAX à l'API Adresse
      $.get("https://api-adresse.data.gouv.fr/search/?q=8+bd+du+port&postcode=" + $(this).val(), function(data) {

          // Extraire la liste des régions correspondantes du JSON renvoyé
          var regions = [];

          $.each(data.features, function(i, feature) {
              regions.push(feature.properties.context);
          });

          // Afficher les régions dans un menu déroulant
          $("#reg").empty();

          $.each(regions, function(i, region) {
              $("#reg").append("<option value='" + region + "'>" + region + "</option>");
          });

      });

  });

  // Utiliser la fonction "autocomplete" de jQuery UI pour le champ "adresse"
  $("#adr").autocomplete({

      source: function (request, response) {

           // Envoyer une requête AJAX à l'API Adresse avec le code postal sélectionné
          $.get("https://api-adresse.data.gouv.fr/search/?q=8+bd+du+port&postcode=" + $("#cp").val() + "&q=" + request.term, function(data) {
              // Extraire la liste des adresses correspondantes du JSON renvoyé
              var adresses = [];
              $.each(data.features, function(i, feature) {
                  // Vérifier que l'adresse correspond au code postal sélectionné
                  if (feature.properties.postcode == $("#cp").val()) {
                      adresses.push(feature.properties.name);
                  }
              });
              // Appeler la fonction "response" avec la liste des adresses
              response(adresses);
          });
      }
  });

  
});