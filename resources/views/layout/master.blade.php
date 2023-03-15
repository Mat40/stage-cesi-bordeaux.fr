<!DOCTYPE html>
<html>
<head>
	<html lang="fr">
	<link rel="stylesheet" href="{{asset('assets/css/style-master.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-welcome.css')}}">
	<link  rel="stylesheet"href="{{asset('assets/fontawesome/css/all.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
	<script src="{{asset('assets/js/script-master.js')}}"></script>
	<title>Stage</title>
</head>
<body>
	<header>
		<nav>
			<ul class="menu-responsive">

				<li><a class="logo" href="#home"><img src="{{asset('assets/images/cesi.png')}}" class="logo"></a></li>
				<div class="responsive">
					<li class="Recherche_Stage"><a href="#recherche">Recherche de stage</a></li>
					<li class="icon" id="fav"><a href="#favoris" ><i class="fa-regular fa-heart"></i></a></li>
					<span class="vertical-separator"></span>
					<li class="icon">
		  			<a href="#user" ><i class="fa-regular fa-user"></i></a>
		 	 		<div class="contenu">
						<a href="login.blade.php">connexion</a>
						<a href="#">CHOISIR</a>
						<a href="#">CHOISIR</a>
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
</body>
<footer>
	<a href="#mention" class="mention">Copyright © CESI Ecole d'Ingénieurs</a>
</footer>
<script>
      const menuHamburger = document.querySelector(".menu-hamburger");
	  const responsive = document.querySelector(".responsive");

	menuHamburger.addEventListener('click', () => {
  		responsive.classList.toggle('mobile-menu');
});
</script>
</html>