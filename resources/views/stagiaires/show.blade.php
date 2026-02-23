<!-- resources/views/stagiaires/show.blade.php -->

<h1>Détails du Stagiaire</h1>

<p><strong>Nom :</strong> {{ $stagiaire->nom }}</p>
<p><strong>Prénom :</strong> {{ $stagiaire->prenom }}</p>
<p><strong>Email :</strong> {{ $stagiaire->email }}</p>

<a href="{{ route('stagiaires.index') }}">Retour à la liste</a>
<a href="{{ route('stagiaires.edit', $stagiaire->id) }}">Modifier</a>