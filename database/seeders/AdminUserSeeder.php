<?php

// Fichier: database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // N'oubliez pas d'importer le modèle User
use Illuminate\Support\Facades\Hash; // Et la classe Hash pour le mot de passe

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On vérifie d'abord si l'admin existe pour ne pas le créer plusieurs fois
        User::firstOrCreate(
            ['email' => 'admin@eatdrink.com'], // La valeur unique pour le trouver
            [
                'name' => 'Admin Eat&Drink',
                'nom_entreprise' => 'Administration Eat&Drink',
                'password' => Hash::make('azertyuiop'), // <-- CHANGEZ CE MOT DE PASSE !
                'role' => 'admin', // <-- C'EST LA LIGNE LA PLUS IMPORTANTE
            ]
        );
    }
}
