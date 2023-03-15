@extends("layout.master")

@section("contenu")
<form class="filtre-recherche" type="get" action="">
		<section class="container">
  			<div>
  				<i class="fa-solid fa-magnifying-glass"></i>
    			<input type="search" name="" id="search" placeholder="Métier, mots-clés, entreprise, compétences...">
  			</div>
  			<button type="submit" value="Submit">Rechercher</button>
		</section>
		<div class="filtre">
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
@foreach ($company as $companies)
	<div class="annonce">
		<div class="titre_offre">
			<img src="" alt="logo"> 
			<h3 class="name_entreprise">{{ $companies->name }}</h3>
		</div>
		<div class="description">
			<p>{{ $companies->name }}  {{ $companies->trust	 }} etoile(fontawesome)</p>
			<p>Lieux</p>
			<p>lorem hgdvyuedc eubvfduyebfd efkjrebfibre  feibfejbhfpe vjezbfezbfzejfh beupfb hjuvy</p>
		</div>
	</div>  
@endforeach
</div>         		
</div>


@endsection 