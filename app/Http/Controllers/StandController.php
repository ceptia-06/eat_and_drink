<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;
use Illuminate\Support\Facades\Auth;

class StandController extends Controller
{
    public function edit()
    {
        $stand = Auth::user()->stand;
        return view('stand.edit', compact('stand'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'nom_stand' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // La magie de `updateOrCreate` :
        // Il cherche un stand qui appartient à cet utilisateur.
        // S'il le trouve, il le met à jour.
        // S'il ne le trouve pas, il le crée.
        Auth::user()->stand()->updateOrCreate(
            ['user_id' => Auth::id()], // Les conditions pour chercher
            [
                'nom_stand' => $request->nom_stand, // Les données à mettre à jour ou créer
                'description' => $request->description,
            ]
        );

        // On redirige vers la même page avec un message de succès
        return redirect()->route('stand.edit')->with('success', 'Informations du stand mises à jour !');
    }
}
