<?php

namespace App\Http\Controllers;

use App\Models\administrateur;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return administrateur::all();
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
        $administrateur = new administrateur;
        $administrateur->nom = $request->nom;
        $administrateur->email = $request->email;
        $administrateur->motPasse = $request->motPasse;

        $administrateur->save();

        return response()->json([
            "message"=>"ajouter avec success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(administrateur $administrateur , $id)
    {
        $administrateur = administrateur::find($id);
        if($administrateur){
            return $administrateur;
        }
        else{
            return response()->json([
                "message"=>"aucun admin trouver avec cet id"
           ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(administrateur $administrateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $administrateur = administrateur::find($id);
        if($administrateur){
            $administrateur->nom = $request->nom;
             $administrateur->email = $request->email;
             $administrateur->motPasse = $request->motPasse;

             $administrateur->update();

             return response()->json([
                  "message"=>"modifier avec success"
             ]);
        }
        else{
            return response()->json([
                "message"=>"aucun admin trouver avec cet id"
           ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administrateur $administrateur ,$id)
    {
        $administrateur = administrateur::find($id);
        if($administrateur){
             $administrateur->delete();

             return response()->json([
                  "message"=>"supprimer avec success"
             ]);
        }
        else{
            return response()->json([
                "message"=>"aucun admin trouver avec cet id"
           ]);
        }
    }
}
