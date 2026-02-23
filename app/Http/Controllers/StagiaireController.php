<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    /**
     * Affiche tous les stagiaires
     */
    public function index()
    {
        // Récupère tous les stagiaires depuis la table 'stagiaires'
        $stagiaires = DB::table('stagiaires')->get();

        // Retourne la vue 'stagiaires.index' avec les données
        return view('stagiaires.index', compact('stagiaires'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau stagiaire
     */
    public function create()
    {
        return view('stagiaires.create');
    }

    /**
     * Enregistre un nouveau stagiaire dans la base de données
     */
    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:stagiaires,email',
        ]);

        // Insertion dans la table 'stagiaires'
        DB::table('stagiaires')->insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirection vers la liste avec message de succès
        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire ajouté avec succès !');
    }
 /**
     * Affiche un stagiaire spécifique
     */
    public function show($id)
    {
        $stagiaire = DB::table('stagiaires')->where('id', $id)->first();

        if (!$stagiaire) {
            return redirect()->route('stagiaires.index')->with('error', 'Stagiaire non trouvé.');
        }

        return view('stagiaires.show', compact('stagiaire'));
    }

    /**
     * Affiche le formulaire pour éditer un stagiaire
     */
    public function edit($id)
    {
        $stagiaire = DB::table('stagiaires')->where('id', $id)->first();

        if (!$stagiaire) {
            return redirect()->route('stagiaires.index')->with('error', 'Stagiaire non trouvé.');
        }

        return view('stagiaires.edit', compact('stagiaire'));
    }

    /**
     * Met à jour un stagiaire dans la base
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:stagiaires,email,' . $id,
        ]);

        DB::table('stagiaires')->where('id', $id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'updated_at' => now(),
        ]);

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire mis à jour avec succès !');
    }

    /**
     * Supprime un stagiaire par son ID
     */
    public function destroy($id)
    {
        DB::table('stagiaires')->where('id', $id)->delete();

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire supprimé avec succès !');
    }
}