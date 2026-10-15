<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;

class HomeController extends Controller
{
    // US #13 : page d'accueil
    public function index()
    {
        // Les catégories sont pour l'instant la colonne "categorie" des puzzles
        $categories = Puzzle::select('categorie')->distinct()->orderBy('categorie')->pluck('categorie');

        // Les meilleures ventes (7 derniers jours) viendront avec les commandes (sprint suivant)
        $nouveautes = Puzzle::latest()->take(4)->get();

        return view('accueil', compact('categories', 'nouveautes'));
    }
}
