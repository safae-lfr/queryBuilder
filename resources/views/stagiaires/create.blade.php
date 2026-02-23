<form action="{{ route('stagiaires.store') }}" method="POST">
    @csrf
    <label>Nom:</label>
    <input type="text" name="nom" required><br>

    <label>Prénom:</label>
    <input type="text" name="prenom" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <button type="submit">Envoyer</button>
</form>