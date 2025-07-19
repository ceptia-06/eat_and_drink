<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;
    
    // Liste blanche des champs qu'on peut remplir via un formulaire
    protected $fillable = ['stand_id', 'nom', 'description', 'prix', 'image_url'];

    /**
     * Le stand auquel ce produit appartient.
     */
    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
}
