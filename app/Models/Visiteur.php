<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends User
{
    protected $table = 'users';

    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function  favoris()
    {
        return $this->hasMany(Favori::class);
    }
}
