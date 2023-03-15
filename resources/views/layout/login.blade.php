<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link  rel="stylesheet"href="{{asset('assets/fontawesome/css/all.min.css')}}">
	<link  rel="stylesheet"href="{{asset('assets/css/style-login.css')}}">
	<title>Search</title>

</head>

<body>
	<div class="image_gauche">
		<img src="{{asset('assets/images/login_image.jpg')}}">
	</div>
	<div class ="right">
		<div class="header-right">
			<img src="{{asset('assets/images/cesi.png')}}">
		</div>
		<div class="formulaire">
			
			<p class="indication">Connexion avec votre compte professionnel</p>
			
			<form action="{{ route('login') }}" method="POST">
   				@csrf
				<input id="top" type="email" name="email" placeholder="xyz@example.com"></input></form>
				<input type="password" name="password" placeholder="Mot de passe">
				<button type="submit" value="Connexion">Connexion</button>
			</form>
			<p class="aide">Vous avez besoin d'aide</p>
			<ul>
				<li ><a href="https://sts.viacesi.fr/adfs/portal/updatepassword ">Changer son mot de passe.</a></li>
				<li ><a href="# ">Mot de passe perdu.</a></li>
				<li ><a href="#">Besoin d'aide.</a></li>
			</ul>
			
		</div>
		<footer class="condition"> Â© 2016 Microsoft    Home    Aide</footer>
	</div>
</body>
</html>