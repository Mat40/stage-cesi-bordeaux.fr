<form class="search_filter_min" method="get" action="">
	<h2>Vos offres enregistrés</h2>
	<div class="switch_page">
		<button type="submit" formaction="/follow">Offres enregistrées</button>
		<button type="submit" formaction="/apply">Candidatures envoyés</button>
	</div>
	<section class="container_min">
		<div>
			<i  class="fa-solid fa-magnifying-glass"></i>
			<input type="search" name="" id="search_min" placeholder="{{ $placeholder}}">
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