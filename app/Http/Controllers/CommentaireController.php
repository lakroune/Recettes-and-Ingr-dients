<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'recette_id' => 'required',
            'commentaire' => 'required|string|max:255',
        ]);

        $commentaire = new Commentaire();
        $commentaire->user_id = Auth::id();
        $commentaire->recette_id = $request->recette_id;
        $commentaire->commentaire = $request->commentaire;
        $commentaire->save();
        echo "cocio";
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
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
        $request->validate([
            'commentaire' => 'required|string|max:255',
            'comment_id'  => 'required|integer|exists:commentaires,id',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->commentaire = $request->commentaire;
        $commentaire->save();

        return redirect()->back()->with('success', 'Commentaire modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès');
    }
}
