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
    public function edit(Product $product)
    {
        // Sécurité : Vérifier que le produit appartient bien au stand de l'utilisateur connecté
        if ($product->stand_id !== Auth::user()->stand->id) {
            abort(403, 'Action non autorisée.');
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Met à jour un produit existant.
     */
    public function update(Request $request, Product $product)
    {
        // Même validation et sécurité que pour edit/store
        if ($product->stand_id !== Auth::user()->stand->id) {
            abort(403);
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès !');
    }

    /**
     * Supprime un produit.
     */
    public function destroy(Product $product)
    {
        if ($product->stand_id !== Auth::user()->stand->id) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}