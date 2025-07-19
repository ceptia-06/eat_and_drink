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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Le stand auquel la commande est passée
            $table->foreignId('stand_id')->constrained()->onDelete('cascade');
            
            // On va stocker tout le panier (la liste des produits, les quantités) ici.
            // Le type 'json' est parfait pour ça.
            $table->json('details_commande'); 
            
            // La fonction timestamps() s'occupe de la date de la commande (created_at)
            $table->timestamps();
        });
    }

};
