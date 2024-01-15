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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->enum('categorie', ['Luxe', 'Moyen', 'Classique']);
            $table->string('image')->nullable();
            $table->string('description');
            $table->string('adresse_localisation');
            $table->enum('status', ['Occupé', 'Non Occupé']);
            $table->integer('nbrChambre');
            $table->float('dimension');
            $table->integer('nbrToilette');
            $table->integer('nbrBalcon')->nullable();
            $table->integer('nbrEspaceVert')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
