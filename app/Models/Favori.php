<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $table = 'favoris';

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
