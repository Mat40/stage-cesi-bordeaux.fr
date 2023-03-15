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

<div class="affichage-annonce">
<tr>
            <th>name</th>
            <th>activity_area</th>
            <th>number_of_trainees</th>
            <th>trust</th>
			<th>description</th>
            
        </tr>
        @foreach ($company as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->activity_area }}</td>
            <td>{{ $company->number_of_trainees }}</td>
            <td>{{ $company->trust}}</td>
			<td>{{ $company->description}}</td>

            <td>
		@endforeach		
</div>


@endsection 