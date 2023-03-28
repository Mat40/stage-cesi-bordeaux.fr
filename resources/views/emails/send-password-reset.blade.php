<h2>Votre compte a bien été créé sur https://stage-cesi-bordeaux.fr"</h2>
<p>Veuillez réinitialiser votre mot de passe :</p>
<ul>
    <li><strong>Nom et prénom :</strong> {{ $mailData['userFullName'] }}</li>
    <li><strong>E-mail :</strong> {{ $mailData['userEmail'] }}</li>
    <li><a href="{{ $mailData['resetPasswordURL'] }}">Réinitialiser votre mot de passe</a></li>
</ul>