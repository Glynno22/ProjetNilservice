<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

      
   //specifier la table a utiliser
   protected $table = 'ajoutProduit';

   protected $fillable = [
       'nom',
       'prix',
       'categorie',
       'numero',
       'message'
   ];
}
