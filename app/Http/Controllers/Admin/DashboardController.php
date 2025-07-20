<?php

// Fichier: app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // <-- Importer le modèle User
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer uniquement les utilisateurs dont le rôle est 'entrepreneur_en_attente'
        $pendingUsers = User::where('role', 'entrepreneur_en_attente')->get();

        // On renvoie la vue en lui passant la liste des utilisateurs
        return view('admin.dashboard', [
            'pendingUsers' => $pendingUsers
        ]);
    }
}
