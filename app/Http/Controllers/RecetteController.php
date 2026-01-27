<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Etape;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('recette.add', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $recette = new Recette();
            $recette->title_recette = $request->title_recette;
            $recette->categorie_id = $request->categorie_id;
            $recette->temp_preparation = $request->temp_preparation;
            $recette->difficulte = $request->difficulte;
            $recette->calories = $request->calories;
            $recette->user_id = Auth::id();
            $recette->save();
            // foreach ($request->file('images') as $index => $image) {
            //     $path = $image->store('recettes', 'public');
            //     $image = new Image();
            //     $image->recette_id = $recette->id;
            //     $image->url_image = $path;
            //     $image->save();
            // }
            foreach ($request->ingredients as  $ingredient) {
                $ingredientObject = new Ingredient();
                $ingredientObject->recette_id = $recette->id;
                $ingredientObject->nom_ingredient = $ingredient['nom_ingredient'];
                $ingredientObject->quantite = $ingredient['quantite'];
                $ingredientObject->unite = $ingredient['unite'];
                $ingredientObject->save();
            }
            foreach ($request->etapes as $index => $description) {
                $etape = new Etape();
                $etape->recette_id = $recette->id;
                $etape->description = $description;
                $etape->ordre = $index + 1;
                $etape->save();
            }
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
