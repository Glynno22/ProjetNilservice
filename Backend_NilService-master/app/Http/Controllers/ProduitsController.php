<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //afficher tous les produits crees sous forme de tableau json
          $produit =Produits::all();
          return $produit;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        try{
            $request->validate(
                [
                    'nom' =>'required|max:255',
                    'prix'=>'required',
                    'categorie'=>'required',
                    'numero'=>'required',
                    'message'=>'required',
                    'imageProd'=>'required'
                ],
                [
                    'nom' =>'ajouter nom',
                    'prix'=>'ajouter prix',
                    'categorie'=>'ajouter categorie',
                    'numero'=>'ajouter numero',
                    'message'=>'ajouter message',
                    'imageProd'=>'ajouter image'
                ]
            );
            //creer une nouvelle instance
            $produit= new Produits;
   
            //creer un nom aleatoire de l'image
            $imageName = Str::random().'.'.$request->imageProd->getClientOriginalExtension();
            $request->imageProd->storeAs('image',$imageName,'public');
    
            //inserer les donnees dans la base
            $produit->nom = $request->nom;
            $produit->prix = $request->prix;
            $produit->categorie = $request->categorie;
            $produit->numero = $request->numero;
            $produit->message = $request->message;
            $produit->imageProd = $imageName;
            $produit->save();
    
            return response()->json([
                "message"=>"produit creer avecc success"
             ]);
            }
            catch(\Throwable $th){
                return $th;
              }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Produits::find($id);
        if($produit){
            return $produit;

        }else{
            return response()->json([
                'message'=>'aucun produit  ne correspond a cet id '
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produits $produits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produits::find($id);
        
        
        if($produit){
           if($request->imagePro){
                //verifier si une image existe deja
                 $exist = Storage::disk('public')->exists("image/{$produit->imageProd}");
                 try{
                     if($exist){
                          //si oui la supprimer
                           Storage::disk('public')->delete("image/{$produit->imageProd}");
                     }

                     //creer la nouvelle image
                 
                     $imageName=Str::random().'.'.$request->imageProduit->getClientOriginalExtension();
                     $request->imageProduit->storeAs('image',$imageName,'public');
                  
                     //update la base
                     $produit->nom = $request->nom;
                     $produit->prix = $request->prix;
                     $produit->categorie = $request->categorie;
                     $produit->numero = $request->numero;
                     $produit->message = $request->message;
                     $produit->imageProd = $imageName;

                     $produit->update();

                     return response()->json([
                         "message"=>"produit modifie"
                     ]);
                 }
                 catch(\Throwable $th){
                      return $th;
                 }
            }

            else{
                 $produit->fill($request->post())->update(); 
                 return response()->json([
                      "message"=>"produit modifie"
                 ]);
            } 
        }
        else{
                 return response()->json([
                   "message"=>"aucun produit trouve"
                 ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produits::find($id);
        if($produit){
            try{
            //verifier si une image existe
           $exist = Storage::disk('public')->exists("image/{$produit->imageProd}");
           if($exist){
               //si oui la supprimer
               Storage::disk('public')->delete("image/{$produit->imageProd}");
           }
           $produit->delete();
           return response()->json([
            "message"=>"produit supprime"
           ]);}
           catch(\Throwable $th){
                  return  $th;
           }
        }
        else{
            return response()->json([
                "message"=>"produit non existant"
               ]);
        }
    }
    
}
