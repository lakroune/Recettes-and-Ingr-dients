<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $table = 'recettes';

    protected $fillable = ['user_id', 'categorie_id', 'title_recette', 'temp_preparation', 'difficulte', 'calories', 'is_recipe_of_day', 'is_deleted'];
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function favoris()
    {
        return $this->hasMany(Favori::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
