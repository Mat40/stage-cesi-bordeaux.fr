
<form class="search_filter_min" type="get" action="{{route('student/search')}}">
	<h2>Panel administration</h2>
	<div class="switch_page">
		<button type="submit" formaction="/admin/offre">Offres</button>
		<button type="submit" formaction="/admin/entreprise">Entreprises</button>
		<button type="submit" formaction="/admin/etudiant">Etudiants</button>
		@if (auth()->user()->permission == "admin")
			<button type="submit" formaction="/admin/pilote">Pilotes</button>
		@endif
	</div>
	<section class="container_min">
		<div>
			<i  class="fa-solid fa-magnifying-glass"></i>
			<input type="search" name="q" id="search_min" placeholder="{{ $placeholder}}">
		</div>
		<button type="submit" value="Submit">Rechercher</button>
	</section>

	<script>
		var url = window.location.pathname;
		$(".switch_page button").each(function() {
			if ($(this).attr("formaction") == url) {
				$(this).addClass("active");
			}
		});
	</script>

</form>
<body>


