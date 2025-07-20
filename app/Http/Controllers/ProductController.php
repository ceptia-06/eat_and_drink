<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Affiche la liste des produits du stand de l'utilisateur.
     */
    public function index()
    {
        // On doit d'abord trouver le stand de l'utilisateur
        $stand = Auth::user()->stand;

        // Cas important : si l'entrepreneur n'a pas encore créé son stand
        if (!$stand) {
            return redirect()->route('stand.edit')->with('error', 'Vous devez d\'abord créer votre stand avant d\'ajouter des produits.');
        }

        // On charge les produits via la relation définie dans le modèle Stand
        $products = $stand->products;

        return view('products.index', compact('products'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau produit.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Sauvegarde un nouveau produit dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            // 'image_url' => 'nullable|url' // Validation si on veut forcer une URL
        ]);

        $stand = Auth::user()->stand;

        // La meilleure façon de créer un produit lié au stand
        $stand->products()->create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès !');
    }
    
    /**
     * Affiche le formulaire pour éditer un produit existant.
     */
    public function edit(Product $produit)
    {
        


        // Le code de sécurité en dessous ne sera PAS exécuté pour l'instant
        $stand = Auth::user()->stand;


        // VÉRIFICATION 1 : L'utilisateur a-t-il seulement un stand ?
        if (!$stand) {
            abort(403, 'Vous devez avoir un stand pour modifier des produits.');
        }

        // VÉRIFICATION 2 : Le produit appartient-il bien à SON stand ?
        if ($produit->stand_id !== $stand->id) {
            abort(403, 'Action non autorisée.');
        }

        return view('products.edit', compact('produit'));
    }

    /**
     * Met à jour un produit existant.
     */
        public function update(Request $request, Product $produit)    {
        $stand = Auth::user()->stand;

        if (!$stand || $produit->stand_id !== $stand->id) {
            abort(403, 'Action non autorisée.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès !');
    }

    /**
     * Supprime un produit.
     */
    public function destroy(Product $produit)    {
        $stand = Auth::user()->stand;

        if (!$stand || $produit->stand_id !== $stand->id) {
            abort(403, 'Action non autorisée.');
        }

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}