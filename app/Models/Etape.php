<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table = 'etapes';

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }
}
