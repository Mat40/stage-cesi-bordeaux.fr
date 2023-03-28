<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" href="{{asset('assets/css/style-master.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-welcome.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-profile.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-section-search_all_role.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpanelstudent.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpanelpilote.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpaneloffer.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-adminpanelcompany.css')}}">
		<link  rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script src="{{asset('assets/js/script-master.js')}}"></script>
		<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

		@laravelPWA
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
						<li class="icon" id="fav"><a href="{{ route('follow') }}" ><i class="fa-regular fa-heart"></i></a></li>
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
</html>