<form action="{{ route('stagiaires.store') }}" method="POST">
    @csrf

    <div>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        @error('nom')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
        @error('prenom')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Envoyer</button>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif
</form>