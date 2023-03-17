@extends("layout.master")

@section("contenu")

<form method="post">
    {{csrf_field()}}
    <input type="text" name="Nom" placeholder="Nom">
    <input type="text" name="Prenom" placeholder="Prenom">
    <input type="email" name="email" placeholder="Mail">
    <input type="text" name="Centre" placeholder="Centre">
    <input type="text" name="Promotion" placeholder="Promotion">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="submit" value="ajouter">
</form>


@endsection