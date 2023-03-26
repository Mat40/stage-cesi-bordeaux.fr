<form class="search_filter" type="get" action="{{route('offer/search')}}">
		<section class="container">
  			<div>
  				<i class="fa-solid fa-magnifying-glass"></i>
    			<input type="search" name="q" id="search" placeholder="Métier, mots-clés, entreprise, compétences...">
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