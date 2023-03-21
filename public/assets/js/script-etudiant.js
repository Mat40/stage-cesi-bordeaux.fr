document.addEventListener("DOMContentLoaded", function () {

    // Récupération de tous les éléments avec la classe "annonce"
    const users = document.querySelectorAll('.user-item');
    document.querySelector("#update").style.display = "none";
    document.querySelector("#delete").style.display = "none";

    const updateBtn = document.getElementById('update');
    const deleteBtn = document.getElementById('delete');

    // Boucle sur chaque élément pour ajouter l'événement de clic
    users.forEach(user => {
        const id = user.getAttribute('id');
        user.addEventListener('click', () => {
            // Récupération des valeurs à partir de l'user cliquée

            const firstname = user.querySelector('.user-firstname').textContent;
            const lastname = user.querySelector('.user-lastname').textContent;
            const email = user.querySelector('.user-email').textContent;
            const campus = user.querySelector('.user-campus').textContent;
            const grade = user.querySelector('.user-grade').textContent;

            // Remplissage du formulaire avec les valeurs récupérées
            document.getElementById('firstname').value = firstname;
            document.getElementById('lastname').value = lastname;
            document.getElementById('campus').value = campus;
            document.getElementById('grade').value = grade;
            document.getElementById('email').value = email;

            // Mise à jour de l'attribut "action" du formulaire pour qu'il pointe vers l'action "update"
            document.querySelector('.form_creation').setAttribute('action', '/update/' + id);

            // // Affichage des boutons "update" et "delete"
            // document.getElementById('update').style.display = 'inline-block';
            // document.getElementById('delete').style.display = 'inline-block';
            document.querySelector("#submit").style.display = "none";
            document.querySelector("#delete").style.display = "block";
            updateBtn.style.display = "block";
        });

        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = '/delete/' + id;
        });

    });

    document.querySelector(".add").addEventListener("click", function() {
        document.querySelector("#submit").style.display = "block";
        document.querySelector("#update").style.display = "none";
        document.querySelector("#delete").style.display = "none";

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