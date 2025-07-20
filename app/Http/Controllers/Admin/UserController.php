<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Approuve un utilisateur en changeant son rôle.
     */
    public function approve(User $user)
    {
        // Étape 1: On vérifie que l'utilisateur est bien en attente pour éviter des erreurs
        if ($user->role === 'entrepreneur_en_attente') {

            // Étape 2: On change son rôle
            $user->role = 'entrepreneur_approuve';
            
            // Étape 3: On sauvegarde le changement dans la base de données
            $user->save();
        }

        // Étape 4: On redirige l'admin vers le tableau de bord avec un message de succès.
        return redirect()->route('admin.dashboard')
                         ->with('success', 'L\'entrepreneur "' . $user->nom_entreprise . '" a été approuvé avec succès !');
    }
}
