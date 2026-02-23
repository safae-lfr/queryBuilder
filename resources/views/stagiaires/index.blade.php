<h1>Liste des Stagiaires</h1>
<a href="{{ route('stagiaires.create') }}">Ajouter un stagiaire</a>
<ul>
    @foreach ($stagiaires as $stagiaire)
        <li>{{ $stagiaire->nom }} {{ $stagiaire->prenom }} - {{ $stagiaire->email }}
    
     <!-- Formulaire pour supprimer -->
        <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer?')">Supprimer</button>
        </form>
        </li>
        @endforeach

</ul>