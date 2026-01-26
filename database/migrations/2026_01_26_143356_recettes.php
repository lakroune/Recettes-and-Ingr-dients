<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('categorie_id');
            $table->string('title_recette');
            $table->text('description_recette');
            $table->boolean('is_recipe_of_day')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('favoris');
        Schema::dropIfExists('etapes');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('commentaires');
        Schema::dropIfExists('recettes');
    }
};
