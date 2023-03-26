<!DOCTYPE html>
<html>
	<head>
		<html lang="fr">
		<link rel="stylesheet" href="{{asset('assets/css/style-master.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-welcome.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-profile.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-section-search_all_role.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpanelstudent.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpanelpilote.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpaneloffer.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpanelcompany.css')}}">
		<link  rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">

		<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
		<script src="{{asset('assets/js/jquery-3.6.3.js')}}"></script>
		<script src="{{asset('assets/js/script-master.js')}}"></script>
		<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

	<title>Stage</title>
	</head>
	<body>
		<header>
			<nav>
				<ul class="content_nav-bar">

					<li><a class="logo" href="#home"><img src="{{asset('assets/images/cesi.png')}}" class="logo"></a></li>
					<div class="link_nav-bar">
						<li class="Recherche_Stage"><a href="{{ route('index') }}">Recherche de stage</a></li>
						@if (auth()->user()->permission == "admin" || auth()->user()->permission == "pilote")
							<li class="adminpanel-button"><a href="{{ route('admin/offre') }}">Panel administrateur</a></li>
						@endif
						<li class="icon" id="fav"><a href="#favoris" ><i class="fa-regular fa-heart"></i></a></li>
						<span class="vertical-separator"></span>
						<li class="icon">
						<a href="#user" ><i class="fa-regular fa-user"></i></a>
						<div class="contenu">
							<a href="{{ route('profile') }}">Profil</a>
							<a href="{{ route('logout') }}">Déconnexion</a>
						</div>
						</li>
					</div>
					<button class="menu-hamburger"><i class="fa fa-bars"></i></button>

	 			 </ul>

			</nav>
		</header>
		<main>

        @yield("contenu")

   		 </main>
		<footer>
			<a href="#mention" class="mention">Copyright © CESI Ecole d'Ingénieurs</a>
		</footer>
	</body>

	<script>
		const menuHamburger = document.querySelector(".menu-hamburger");
		const responsive = document.querySelector(".link_nav-bar");
		let defaultStyle = 'block'; // Remplacez cette valeur par la valeur par défaut que vous souhaitez

		menuHamburger.addEventListener('click', () => {
		responsive.classList.toggle('mobile-menu');
		var elements = document.getElementsByClassName('fa-play');
		for (var i = 0; i < elements.length; i++) {
			if (elements[i].style.display === 'none') {
			elements[i].style.display = defaultStyle;
			} else {
			defaultStyle = elements[i].style.display;
			elements[i].style.display = 'none';
			}
		}
		});
	</script>
</html>