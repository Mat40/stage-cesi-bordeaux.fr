document.addEventListener("DOMContentLoaded", function () {

    // Récupération de tous les éléments avec la classe "annonce"
    const companies = document.querySelectorAll('.company-item');

    const submitBtn = document.getElementById('submit');
    // const updateBtn = document.getElementById('update');
        const deleteBtn = document.getElementById('delete');

        // updateBtn.style.display = "none";
        deleteBtn.style.display = "none";

        let id;
        // Boucle sur chaque élément pour ajouter l'événement de clic
        companies.forEach(company => {

            const name = company.querySelector('.company_name').textContent;
            const description = company.querySelector('.company_trust').getAttribute('data-description');


            company.addEventListener('click', () => {
                id = company.getAttribute('id');
                // Récupération des valeurs à partir de l'user cliquée

                // const firstname = user.querySelector('.user-firstname').textContent;
                // const lastname = user.querySelector('.user-lastname').textContent;
                const description = company.querySelector('.description_bdd').getAttribute('data-description');
                const place = company.querySelector('.place').textContent;
                const area = company.querySelector('.area').textContent;
                const postal = company.querySelector('.postal_code').textContent;
                const number_of_trainees= company.querySelector('.number_of_trainees').textContent;
                submitBtn.textContent = "Mettre à jour";

                // Remplissage du formulaire avec les valeurs récupérées
                document.getElementById('name').value = name;
                document.getElementById('area_activity').value = area;
                document.getElementById('city').value = place;
                document.getElementById('postal_code').value = postal;
                document.getElementById('number_of_trainees').value =number_of_trainees ;
                document.getElementById('note').value = trust;
                document.getElementById('description').value = description;

                // Mise à jour de l'attribut "action" du formulaire pour qu'il pointe vers l'action "update"
                document.querySelector('.form_company').setAttribute('action', 'company/update/' + id);

                // // Affichage des boutons "update" et "delete"
                // document.getElementById('update').style.display = 'inline-block';
                // document.getElementById('delete').style.display = 'inline-block';
                // submitBtn.style.display = "none";
                deleteBtn.style.display = "block";
                // updateBtn.style.display = "block";
            });

        deleteBtn.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = 'company/delete/' + id;
        });
    });

    document.querySelector(".company-add").addEventListener("click", function() {
        // submitBtn.style.display = "block";
        // updateBtn.style.display = "none";
        deleteBtn.style.display = "none";
        submitBtn.textContent = "Soumettre";

        document.querySelector('.form-student').setAttribute('action', "/register");

        document.getElementById('name').value = "";
        document.getElementById('area_activity').value = "";
        document.getElementById('city').value = "";
        document.getElementById('postal_code').value = "";
        document.getElementById('number_of_trainees').value = "";
        document.getElementById('trust').value = "";
        document.getElementById('description').value = "";
    });



    // Ajout d'un événement de clic au bouton "update"
    // submitBtn.addEventListener('click', (event) => {
    //     event.preventDefault();
    //     document.querySelector(".form-student").submit();
    // });
    // Ajout d'un événement de clic au bouton "update"
});