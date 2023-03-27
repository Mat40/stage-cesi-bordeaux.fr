<h2>Nouvelle candidature à l'offre "{{ $mailData['offerTitle'] }}"</h2>
<p>Un nouvel étudiant a postulé à votre offre de stage :</p>
<ul>
    <li><strong>Nom et prénom :</strong> {{ $mailData['userFullName'] }}</li>
    <li><strong>E-mail :</strong> {{ $mailData['userEmail'] }}</li>
    <li><strong>CV :</strong> <a href="{{ $mailData['cvUrl'] }}">Consulter le CV</a></li>
</ul>