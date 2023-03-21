    /*formualire cration etudiant*/
    $(document).ready(function(){
        $("#update").hide();
        $(".annonce").click(function() {
        // Récupération des données de l'annonce sélectionnée
        var firstname = $(this).find(".name_entreprise").text().split(' ')[0];
        var lastname = $(this).find(".name_entreprise").text().split(' ')[1];
        var grade = $(this).find(".grade_campus").text().split(' ')[0];
        var campus = $(this).find(".grade_campus").text().split(' ')[1];
        var email = $(this).find(".email").text(); 
        var id = $(this).attr("id");    
        
        $("#firstname").val(firstname);
        $("#lastname").val(lastname);
        $("#campus").val(campus);
        $("#grade").val(grade);
        $("#email").val(email);
        $("#delete").attr("href", "SoftDelete/" + id)   ;
        $("#update").attr("href", "Update/" + id)   ;
        $("#soumettre").hide();
        $("#update").show();
    })
    
    $(".add").click(function(){
        $("#soumettre").show();
        $("#update").hide();
       
    
    })
    
    });
    