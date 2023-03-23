document.addEventListener("DOMContentLoaded", function () {

    // Récupération de tous les éléments avec la classe "annonce"
    const users = document.querySelectorAll('.user-item');

    const submitBtn = document.getElementById('submit');
    // const updateBtn = document.getElementById('update');
    const deleteBtn = document.getElementById('delete');

    // updateBtn.style.display = "none";
    deleteBtn.style.display = "none";

    let id;
    // Boucle sur chaque élément pour ajouter l'événement de clic
    users.forEach(user => {

        const firstname = user.querySelector('.user-firstname').textContent;
        const lastname = user.querySelector('.user-lastname').textContent;

        var initials = firstname.charAt(0).toUpperCase() + lastname.charAt(0).toUpperCase();
        var element = user.querySelector(".pp-initials");

        if (element) {
            element.innerHTML = initials;
        }

        user.addEventListener('click', () => {
            id = user.getAttribute('id');
            // Récupération des valeurs à partir de l'user cliquée

            // const firstname = user.querySelector('.user-firstname').textContent;
            // const lastname = user.querySelector('.user-lastname').textContent;
            const email = user.querySelector('.user-email').textContent;
            const campus = user.querySelector('.user-campus').textContent;
            const grade = user.querySelector('.user-grade').textContent;
            submitBtn.textContent = "Mettre à jour";

            // Remplissage du formulaire avec les valeurs récupérées
            document.getElementById('firstname').value = firstname;
            document.getElementById('lastname').value = lastname;
            document.getElementById('campus').value = campus;
            document.getElementById('grade').value = grade;
            document.getElementById('email').value = email;

            // Mise à jour de l'attribut "action" du formulaire pour qu'il pointe vers l'action "update"
            document.querySelector('.form-student').setAttribute('action', 'etudiant/update/' + id);

            // // Affichage des boutons "update" et "delete"
            // document.getElementById('update').style.display = 'inline-block';
            // document.getElementById('delete').style.display = 'inline-block';
            // submitBtn.style.display = "none";
            deleteBtn.style.display = "block";
            // updateBtn.style.display = "block";
        });

        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = 'etudiant/delete/' + id;
        });
    });

    document.querySelector(".user-add").addEventListener("click", function() {
        // submitBtn.style.display = "block";
        // updateBtn.style.display = "none";
        deleteBtn.style.display = "none";
        submitBtn.textContent = "Soumettre";

        document.querySelector('.form-student').setAttribute('action', "/register");

        document.getElementById('firstname').value = "";
        document.getElementById('lastname').value = "";
        document.getElementById('campus').value = "";
        document.getElementById('grade').value = "";
        document.getElementById('email').value = "";
    });



    // Ajout d'un événement de clic au bouton "update"
    // submitBtn.addEventListener('click', (event) => {
    //     event.preventDefault();
    //     document.querySelector(".form-student").submit();
    // });
    // Ajout d'un événement de clic au bouton "update"
});