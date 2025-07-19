<?php

// Fichier: app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Models\Product; // Important pour trouver le produit
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        // On récupère le panier actuel depuis la session.
        // S'il n'y a pas de panier, on prend un tableau vide.
        $cart = session()->get('cart', []);

        // On vérifie si le produit est déjà dans le panier
        if(isset($cart[$product->id])) {
            // Si oui, on incrémente la quantité
            $cart[$product->id]['quantity']++;
        } else {
            // Si non, on l'ajoute avec ses infos et une quantité de 1
            $cart[$product->id] = [
                "nom" => $product->nom,
                "quantity" => 1,
                "prix" => $product->prix,
                "image_url" => $product->image_url
            ];
        }

        // On sauvegarde le panier mis à jour dans la session
        session()->put('cart', $cart);

        // On redirige l'utilisateur vers la page précédente avec un message.
        return back()->with('success', 'Produit ajouté au panier !');
    }
    
    public function index()
    {
        $cart = session('cart', []); // Récupère le panier de la session
        
        $total = 0;
        foreach($cart as $id => $details) {
            $total += $details['prix'] * $details['quantity'];
        }

        return view('public.cart.index', compact('cart', 'total'));
    }


    // Dans CartController.php

    public function remove(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Produit retiré du panier.');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        // Sécurité : ne pas créer de commande si le panier est vide
        if (empty($cart)) {
            return redirect()->route('exposants.index');
        }

        // Simplification : On imagine que le visiteur entre ses infos
        // ou qu'elles sont attachées à une commande "guest".
        // On va juste enregistrer les produits dans la table 'commandes'.
        // Important: ce modèle suppose qu'une commande ne vient que d'un stand,
        // ce qui est une simplification. On va créer une commande pour le premier
        // produit trouvé. Dans une vraie app, il faudrait grouper par stand.
        $firstProductId = array_key_first($cart);
        $firstProduct = Product::find($firstProductId);

         \App\Models\Order::create([
        'stand_id' => $firstProduct->stand_id,
        'details_commande' => $cart, 
        ]);

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Votre commande a bien été passée ! Merci.');
        }

        // Les autres méthodes viendront plus tard
}
