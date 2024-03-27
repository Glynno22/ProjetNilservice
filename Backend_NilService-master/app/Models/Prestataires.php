<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataires extends Model
{
    use HasFactory;

    protected $table = 'prestataire';

    protected $fillable=[
         'nom',
         'email',
         'passe',
         'phone',
         'pays',
         'ville',
         'quartier',
         'categorie',
         'scanner',
         'photo',
         'cni', 
         'description',
         'code',
         'parrain',
         'statut',
         'dateCreation',
         'cv',
         'diplome',
    ];
}


