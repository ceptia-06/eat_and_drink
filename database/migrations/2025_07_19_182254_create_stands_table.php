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
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->string('nom_stand');
            $table->text('description')->nullable(); // On le met nullable, peut-être qu'ils remplissent ça plus tard

            // C'est la clé étrangère qui lie le stand à l'utilisateur propriétaire
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // ->constrained() dit que ça référence la table 'users' sur la colonne 'id'
            // ->onDelete('cascade') veut dire que si l'utilisateur est supprimé, son stand l'est aussi.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stands');
    }
};
