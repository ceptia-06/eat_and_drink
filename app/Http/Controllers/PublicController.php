<?php

// Fichier: app/Http/Controllers/PublicController.php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Affiche la liste de tous les stands approuvés.
     */
    public function index()
    {
        // C'est ici que le lien entre User et Stand devient puissant !
        // On veut les stands UNIQUEMENT des utilisateurs qui sont 'entrepreneur_approuve'
        $stands = Stand::whereHas('user', function ($query) {
            $query->where('role', 'entrepreneur_approuve');
        })->get();

        return view('public.exposants.index', compact('stands'));
    }

    /**
     * Affiche la page détaillée d'un stand avec ses produits.
     * Laravel fait le Route Model Binding pour trouver le $stand automatiquement !
     */
    public function show(Stand $stand)
    {
        // On doit vérifier que le propriétaire de ce stand est bien approuvé,
        // pour ne pas afficher accidentellement des stands de comptes en attente.
        if ($stand->user->role !== 'entrepreneur_approuve') {
            abort(404); // On fait comme si la page n'existait pas.
        }

        // On charge les produits du stand.
        // La relation 'products' que nous avons définie fait tout le travail.
        $products = $stand->products;

        return view('public.exposants.show', compact('stand', 'products'));
    }

    /**
     * Page d'accueil (peut-être la même que la liste des exposants pour commencer)
     */
    public function home()
    {
        // Pour ce projet, la page d'accueil peut simplement être la liste des exposants.
        return redirect()->route('exposants.index');
    }
}
