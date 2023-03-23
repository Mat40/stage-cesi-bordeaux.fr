document.addEventListener("DOMContentLoaded", function () {

    // Récupération de tous les éléments avec la classe "annonce"
    const pilotes = document.querySelectorAll('.pilote-item');

    const submitBtn = document.getElementById('submit');
    // const updateBtn = document.getElementById('update');
    const deleteBtn = document.getElementById('delete');

    // updateBtn.style.display = "none";
    deleteBtn.style.display = "none";

    let id;
    // Boucle sur chaque élément pour ajouter l'événement de clic
    pilotes.forEach(pilote => {

        const firstname = pilote.querySelector('.pilote-firstname').textContent;
        const lastname = pilote.querySelector('.pilote-lastname').textContent;

        var initials = firstname.charAt(0).toUpperCase() + lastname.charAt(0).toUpperCase();
        var element = pilote.querySelector(".pp-initials");

        if (element) {
            element.innerHTML = initials;
        }

        pilote.addEventListener('click', () => {
            id = pilote.getAttribute('id');
            // Récupération des valeurs à partir de l'pilote cliquée

            // const firstname = pilote.querySelector('.pilote-firstname').textContent;
            // const lastname = pilote.querySelector('.pilote-lastname').textContent;
            const email = pilote.querySelector('.pilote-email').textContent;
            const campus = pilote.querySelector('.pilote-campus').textContent;
            const grade = pilote.querySelector('.pilote-grade').textContent;
            submitBtn.textContent = "Mettre à jour";

            // Remplissage du formulaire avec les valeurs récupérées
            document.getElementById('firstname').value = firstname;
            document.getElementById('lastname').value = lastname;
            document.getElementById('campus').value = campus;
            document.getElementById('grade').value = grade;
            document.getElementById('email').value = email;

            // Mise à jour de l'attribut "action" du formulaire pour qu'il pointe vers l'action "update"
            document.querySelector('.form-pilote').setAttribute('action', 'pilote/update/' + id);

            // // Affichage des boutons "update" et "delete"
            // document.getElementById('update').style.display = 'inline-block';
            // document.getElementById('delete').style.display = 'inline-block';
            // submitBtn.style.display = "none";
            deleteBtn.style.display = "block";
            // updateBtn.style.display = "block";
        });

        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = 'pilote/delete/' + id;
        });
    });

    document.querySelector(".pilote-add").addEventListener("click", function() {
        // submitBtn.style.display = "block";
        // updateBtn.style.display = "none";
        deleteBtn.style.display = "none";
        submitBtn.textContent = "Soumettre";

        document.querySelector('.form-pilote').setAttribute('action', "/register");

        document.getElementById('firstname').value = "";
        document.getElementById('lastname').value = "";
        document.getElementById('campus').value = "";
        document.getElementById('grade').value = "";
        document.getElementById('email').value = "";
    });



    // Ajout d'un événement de clic au bouton "update"
    // submitBtn.addEventListener('click', (event) => {
    //     event.preventDefault();
    //     document.querySelector(".form-pilote").submit();
    // });
    // Ajout d'un événement de clic au bouton "update"
});