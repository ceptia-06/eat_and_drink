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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // La clé étrangère qui lie le produit à un stand.
            $table->foreignId('stand_id')->constrained()->onDelete('cascade');
            // onDelete('cascade') : si un stand est supprimé, tous ses produits le sont aussi.

            $table->string('nom');
            $table->text('description')->nullable();
            
            // Le prix est un nombre décimal.
            // 8 chiffres au total, 2 après la virgule. Permet des prix jusqu'à 999999.99
            $table->decimal('prix', 8, 2); 
            
            $table->string('image_url')->nullable(); // L'URL de l'image est optionnelle
            
            $table->timestamps();
        });
    }
};
