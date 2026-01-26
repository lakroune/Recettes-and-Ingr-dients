<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }
}
