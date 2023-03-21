    document.addEventListener("DOMContentLoaded", function () {

    // Récupération de tous les éléments avec la classe "annonce"
    const annonces = document.querySelectorAll('.annonce');
    document.querySelector("#update").style.display = "none";

    const updateBtn = document.getElementById('update');
    const deleteBtn = document.getElementById('delete');

     // Boucle sur chaque élément pour ajouter l'événement de clic
    annonces.forEach(annonce => {
        annonce.addEventListener('click', () => {
            // Récupération des valeurs à partir de l'annonce cliquée
            const id = annonce.getAttribute('id');
            const nom = annonce.querySelector('.name_entreprise').textContent;
            const email = annonce.querySelector('.email').textContent;
            const campus = annonce.querySelector('.grade_campus').textContent.split(' ')[1];
            const grade = annonce.querySelector('.grade_campus').textContent.split(' ')[0];

            // Remplissage du formulaire avec les valeurs récupérées
            document.getElementById('firstname').value = nom.split(' ')[1];
            document.getElementById('lastname').value = nom.split(' ')[0];
            document.getElementById('campus').value = campus;
            document.getElementById('grade').value = grade;
            document.getElementById('email').value = email;

            // Mise à jour de l'attribut "action" du formulaire pour qu'il pointe vers l'action "update"
            document.querySelector('.form_creation').setAttribute('action', '/update/' + id);

            // // Affichage des boutons "update" et "delete"
            // document.getElementById('update').style.display = 'inline-block';
            // document.getElementById('delete').style.display = 'inline-block';
            document.querySelector("#soumettre").style.display = "none";
            updateBtn.style.display = "block";
        });

        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            const id = annonce.getAttribute('id');
            window.location.href = '/delete/' + id;
            });

        });

        document.querySelector(".add").addEventListener("click", function() {
        document.querySelector("#soumettre").style.display = "block";
        document.querySelector("#update").style.display = "none";
        document.getElementById('firstname').value = "";
        document.getElementById('lastname').value = "";
        document.getElementById('campus').value = "";
        document.getElementById('grade').value = "";
        document.getElementById('email').value = "";
    });

    // Ajout d'un événement de clic au bouton "update"
    updateBtn.addEventListener('click', (event) => {
        event.preventDefault();
        document.querySelector('.form_creation').submit();
    });
});
