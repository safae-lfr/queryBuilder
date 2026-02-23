<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    public function index()
    {
        //// Query Builder select :: Affiche tous les stagiaires
        $stagiaires = DB::table('stagiaires')->get(); // Récupère tous les stagiaires depuis la table 'stagiaires'
// Retourne la vue index.blade.php avec les données
        return view('stagiaires.index', compact('stagiaires'));
    }
//Affiche le formulaire pour ajouter un nouveau stagiaire
    public function create()
    {
        return view('stagiaires.create');
    }

    public function store(Request $request) //Enregistre un nouveau stagiaire dans la base de données
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:stagiaires,email' // // email obligatoire, format email, unique dans la table
        ]);
//Insertion dans la table 'stagiaires'
        DB::table('stagiaires')->insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
// Redirection vers la liste des stagiaires avec message success
        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire ajouté avec succès!');
    }

public function destroy($id)
{
    // Supprimer le stagiaire par ID
    DB::table('stagiaires')->where('id', $id)->delete();

    // Rediriger vers la liste avec message success
    return redirect()->route('stagiaires.index');
                     
}


}