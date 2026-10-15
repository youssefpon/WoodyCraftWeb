<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;

class CategorieController extends Controller
{
    // US #18 : page d'une catégorie avec ses puzzles
    public function show(string $categorie)
    {
        $puzzles = Puzzle::where('categorie', $categorie)->get();

        return view('categorie', compact('categorie', 'puzzles'));
    }

    public function index()
    {
    $categories = Puzzle::select('categorie')->distinct()->orderBy('categorie')->pluck('categorie');

    return view('categories', compact('categories'));
    }
}
