<!-- resources/views/stagiaires/index.blade.php -->

<h1>Liste des Stagiaires</h1>

<a href="{{ route('stagiaires.create') }}" style="margin-bottom: 20px; display:inline-block;">Ajouter un stagiaire</a>

<!-- Messages de succès ou d'erreur -->
@if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div style="color:red">{{ session('error') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->id }}</td>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->email }}</td>
                <td>
                    <!-- Bouton Voir -->
                    <a href="{{ route('stagiaires.show', $stagiaire->id) }}">Voir</a>

                    <!-- Bouton Modifier -->
                    <a href="{{ route('stagiaires.edit', $stagiaire->id) }}">Modifier</a>

                    <!-- Formulaire Supprimer -->
                    <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce stagiaire ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Aucun stagiaire trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>