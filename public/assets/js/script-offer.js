document.addEventListener("DOMContentLoaded", function () {

    // Récupération de tous les éléments avec la classe "annonce"
    const pilotes = document.querySelectorAll('.offer-item');

    const submitBtn = document.getElementById('submit');
    // const updateBtn = document.getElementById('update');
    const deleteBtn = document.getElementById('delete');

    // updateBtn.style.display = "none";
    deleteBtn.style.display = "none";

    let id;
    // Boucle sur chaque élément pour ajouter l'événement de clic
    pilotes.forEach(offer => {

        offer.addEventListener('click', () => {
            id = offer.getAttribute('id');
            // Récupération des valeurs à partir de l'offer cliquée

            const title = offer.querySelector('.offer-title').textContent;
            const company = offer.querySelector('.offer-company').textContent;
            const address = offer.querySelector('.offer-address').textContent;
            const type = offer.querySelector('.offer-type').textContent;
            const date = offer.querySelector('.offer-date').textContent;
            const skills = offer.querySelector('.offer-skills').textContent;
            const salary = offer.querySelector('.offer-salary').textContent;
            const numberofplaces = offer.querySelector('.offer-numberofplaces').textContent;
            const description = offer.querySelector('.offer-description').textContent;


            submitBtn.textContent = "Mettre à jour";

            // Remplissage du formulaire avec les valeurs récupérées
            document.getElementById('title').value = title;
            document.getElementById('name').value = company;
            document.getElementById('city').value = address;
            document.getElementById('type').value = type;
            document.getElementById('release_date').value = date;
            document.getElementById('skills').value = skills;
            document.getElementById('salary').value = salary;
            document.getElementById('number_of_places').value = numberofplaces;
            document.getElementById('description').value = description;



            // Mise à jour de l'attribut "action" du formulaire pour qu'il pointe vers l'action "update"
            document.querySelector('.form-offer').setAttribute('action', 'offer/update/' + id);

            // // Affichage des boutons "update" et "delete"
            // document.getElementById('update').style.display = 'inline-block';
            // document.getElementById('delete').style.display = 'inline-block';
            // submitBtn.style.display = "none";
            deleteBtn.style.display = "block";
            // updateBtn.style.display = "block";
        });

        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = 'offer/delete/' + id;
        });
    });

    document.querySelector(".offer-add").addEventListener("click", function() {
        // submitBtn.style.display = "block";
        // updateBtn.style.display = "none";
        deleteBtn.style.display = "none";
        submitBtn.textContent = "Soumettre";

        document.querySelector('.form-offer').setAttribute('action', "/register");

        document.getElementById('firstname').value = "";
        document.getElementById('lastname').value = "";
        document.getElementById('campus').value = "";
        document.getElementById('grade').value = "";
        document.getElementById('email').value = "";
    });



    // Ajout d'un événement de clic au bouton "update"
    // submitBtn.addEventListener('click', (event) => {
    //     event.preventDefault();
    //     document.querySelector(".form-offer").submit();
    // });
    // Ajout d'un événement de clic au bouton "update"
});