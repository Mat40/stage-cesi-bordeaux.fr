<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="image_gauche">
      <img src="{{ asset('assets/images/main.jpg') }}">
    </div>
    <div class="right">
      <div class="header-right">
        <img src="{{ asset('assets/images/cesi.png') }}">
      </div>
      <div class="formulaire">
        <br>
        <p class="indication">Connexion avec votre compte professionnel</p>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div>
            <div>
              <input id="email" type="email" placeholder="{{ __('xyz@example.com') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <br>
          <div>
            <div>
              <input id="password" type="password" placeholder="{{ __('Mot de Passe') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div>
            <div class="">
              <button type="submit" class="btn btn-primary">{{ __('Connexion') }}</button>
            </div>
          </div>
        </form>
        <p class="aide">Vous avez besoin d'aide</p>
        <ul>
          <li><a href="#">Changer son mot de passe.</a></li>
          <li><a href="# ">Mot de passe perdu.</a></li>
          <li><a href="#">Besoin d'aide.</a></li>
        </ul>
      </div>
      <footer class="condition">© 2016 Microsoft Home Aide</footer>
    </div>
  </body>
</html>
