@extends("layout.master")

@section("contenu")
<form class="search_filter" type="get" action="">
		<section class="container">
  			<div>
  				<i class="fa-solid fa-magnifying-glass"></i>
    			<input type="search" name="" id="search" placeholder="Métier, mots-clés, entreprise, compétences...">
  			</div>
  			<button type="submit" value="Submit">Rechercher</button>
		</section>
		<div class="filter">
			<div class = "select">
				<select class="selecteur">
					<option value="">Type</option>
					<option value="">First</option>		
					<option value="">First</option>	
					<option value="">First</option>	
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select">
				<select class="selecteur">
					<option value="">Date</option>
					<option value="">First</option>		
					<option value="">First</option>	
					<option value="">First</option>	
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = select>
				<select class="selecteur">
					<option value="">Lieux</option>
					<option value="">First</option>		
					<option value="">First</option>	
					<option value="">First</option>	
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Domaine">
				<select class="selecteur" id="Domaines">
					<option value="">Domaine</option>
					<option value="">First</option>		
					<option value="">First</option>	
					<option value="">First</option>	
				</select>
				<i class="fa-solid fa-play"></i>
			</div>

			<div class = "select" id="Entreprise" >
				<select class="selecteur" id="Entreprises">>
					<option value="">Entreprise</option>
					<option value="">First</option>		
					<option value="">First</option>	
					<option value="">First</option>	
				</select>
				<i class="fa-solid fa-play"></i>
			</div>
		</div>
</form>	

<div class="display">
	<div class="display-list_offer">
@foreach ($offer as $offers)
	<div class="annonce" id="{{ $offers->id}}">
		<div class="title_offer">
			<img src="" alt="logo"> 
			<h3 class="name_entreprise">{{ $offers->title}}</h3>
		</div>
		<div class="description">
			<p> {{ $offers->company->name}} {{ number_format($offers->company->trust, 2, ',', ' ') }} <i class="fa-solid fa-star"></i> </p>
			<p>{{ $offers->address->city}}</p>
			<p>{{ Str::limit($offers->description, 50) }}</p>
		</div>
	</div>  
@endforeach
</div>         		
</div>
<script>
    // Sélectionnez tous les éléments .annonce
    var annonces = document.querySelectorAll('.annonce');

    // Bouclez sur chaque élément et ajoutez un gestionnaire d'événement "click"
    annonces.forEach(function(annonce) {
        annonce.addEventListener('click', function() {
            // Sélectionnez l'élément div à cloner
            var divOriginal = annonce;

            // Cloner l'élément div
            var divClone = divOriginal.cloneNode(true);

            // Modifier le titre dans le div cloné
            var titreClone = divClone.querySelector('.name_entreprise');
            titreClone.textContent = 'Nouveau titre';

            // Ajouter un style à l'élément cloné
            divClone.style.backgroundColor = 'red';
            divClone.style.color = 'white';
            divClone.style.marginLeft = '250px';

            // Ajouter le clone à la page
            document.body.appendChild(divClone);
        });
    });
</script>

@endsection 