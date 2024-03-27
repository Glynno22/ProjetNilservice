<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendeurs extends Model
{
    use HasFactory;

    protected $table = 'vendeur';
    
    protected $fillable=[
        'nom',
        'email',
        'passe',
        'phone',
        'pays',
        'lieu',
        'ville',
        'quartier',
        'boutique',
        'dateCreation',
        'code',
        'parrain',
        'status'
        
    ];
    protected $casts = [ //Pour gerer les types booleen
        'active' => 'boolean',
    ];
}
