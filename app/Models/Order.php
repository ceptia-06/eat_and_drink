<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Les champs qui peuvent être remplis via un formulaire ou la méthode create().
     */
    protected $fillable = [
        'stand_id',
        'details_commande',
    ];

    /**
     * Dit à Laravel de traiter la colonne 'details_commande' comme un tableau PHP,
     * pas comme du texte JSON brut. C'est très pratique !
     */
    protected $casts = [
        'details_commande' => 'array',
    ];

    /**
     * Une commande appartient à un stand.
     */
    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
}