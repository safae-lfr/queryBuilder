<!-- resources/views/stagiaires/edit.blade.php -->

<h1>Modifier le Stagiaire</h1>

<form action="{{ route('stagiaires.update', $stagiaire->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $stagiaire->nom) }}" required>
        @error('nom')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $stagiaire->prenom) }}" required>
        @error('prenom')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="{{ old('email', $stagiaire->email) }}" required>
        @error('email')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Mettre à jour</button>
</form>

<a href="{{ route('stagiaires.index') }}">Retour à la liste</a>