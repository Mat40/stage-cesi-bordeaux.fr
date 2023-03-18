
<form class="search_filter_min" type="get" action="">
	<h2>{{$title}}</h2>
		<div class="switch_page">
			<button type="submit" formaction="{{ $path1}}">Offre</button>
			<button type="submit" formaction="{{ $path2}}">Entreprise</button>
			<button type="submit" formaction="{{ $path3}}">Etudiants</button>
			{!!$button!!}
		</div>
		<section class="container_min">
  			<div>
  				<i  class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="" id="search_min" placeholder="{{ $placeholder}}">
  			</div>
  			<button type="submit" value="Submit">Rechercher</button>
		</section>

</form>	



<body>


