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
        $recettes = Recette::where('is_deleted', false)->with(['user', 'categorie'])->get();
        $recette_jour = Recette::where('is_deleted', false)->where('is_recipe_of_day', true)->first();
        $categories = Categorie::all();
        return view('home', compact('recettes', 'categories', 'recette_jour'));
    }
    public function search(Request $request)
    {
        $query = Recette::query();

        $query->when($request->search, function ($q) use ($request) {
            return $q->where('title_recette', 'ilike', '%' . $request->search . '%');
        });
        if ($request->categorie_id != "")
            $query->when($request->categorie_id, function ($q) use ($request) {
                return $q->where('categorie_id', $request->categorie_id);
            });
        $query->where('is_deleted', false);

        $recettes = $query->get();
        $categories = Categorie::all();
        return view('home', compact('recettes', 'categories', 'request'));
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

        $request->validate([
            'title_recette' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'temp_preparation' => 'required|integer|min:1',
            'difficulte' => 'required|in:Facile,Moyen,Expert',
            'calories' => 'required|integer|min:0',
            'image_principale' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images' => 'array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

            'ingredients' => 'required|array|min:1',
            'ingredients.*.nom_ingredient' => 'required|string|max:255',
            'ingredients.*.quantite' => 'required|integer|min:1',
            'ingredients.*.unite' => 'required|string|max:50',

            'etapes' => 'required|array|min:1',
            'etapes.*' => 'required|string',
        ]);


        DB::transaction(function () use ($request) {
            $recette = new Recette();
            $recette->title_recette = $request->title_recette;
            $recette->categorie_id = $request->categorie_id;
            $recette->temp_preparation = $request->temp_preparation;
            $recette->difficulte = $request->difficulte;
            $recette->calories = $request->calories;
            $recette->user_id = Auth::id();
            $recette->save();
            if ($request->hasFile('image_principale')) {
                $path = $request->file('image_principale')->store('recette', 'public');
                $image = new Image();
                $image->recette_id = $recette->id;
                $image->is_principal = true;
                $image->url_image = $path;
                $image->save();
            }
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('recette', 'public');
                    $image = new Image();
                    $image->recette_id = $recette->id;
                    $image->url_image = $path;
                    $image->save();
                }
            }
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
                $etape->description_etape = $description;
                $etape->order_etape = $index + 1;
                $etape->save();
            }
        });
        return redirect()->route('recette.create')->with('success', 'Recette ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recette = Recette::find($id);
        return view('recette.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recette = Recette::find($id);
        return view('recette.edit', compact('recette'));
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
        $recette = Recette::where('user_id', Auth::user()->id)->find($id);
        $recette->update(['is_deleted' => true]);
        $recette->save();
        return redirect()->route('gestion')->with('success', 'Recette supprimée');
    }
}
