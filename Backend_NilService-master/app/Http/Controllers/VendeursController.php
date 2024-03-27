<?php

namespace App\Http\Controllers;

use App\Models\Vendeurs;
use Illuminate\Http\Request;

class VendeursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vendeurs::all();
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
        $request->validate(
            [
                'nom' => 'required|max:255', 
                'email' => 'required|max:255', 
                'phone' => 'required|max:255',  
                'pays' => 'required|max:255', 
                'lieu' => 'required|max:255',
                'ville' => 'required|max:255', 
                'boutique' => 'required|max:255', 
                'code' => 'required|max:255', 
                'parrain' => 'required|max:255', 
                
            ],
            [
                'nom' => 'Obligatoire !', 
                'email' => 'Obligatoire !', 
                'phone' => 'Obligatoire !', 
                'pays' => 'Obligatoire !', 
                'lieu' => 'required|max:255', 
                'ville' => 'Obligatoire !', 
                'quartier' => 'Obligatoire !', 
                'boutique' => 'Obligatoire !', 
                'code' => 'Obligatoire !', 
                'parrain' => 'Obligatoire !', 
                 
            ]
        );
        $vendeurs = new Vendeurs(); 
        $vendeurs->nom = $request->nom; 
        $vendeurs->email = $request->email; 
        $vendeurs->phone = $request->phone;
        $vendeurs->pays = $request->pays; 
        $vendeurs->lieu = $request->lieu; 
        $vendeurs->ville = $request->ville;  
        $vendeurs->quartier = $request->quartier; 
        $vendeurs->boutique = $request->boutique; 
        $vendeurs->code = $request->code; 
        $vendeurs->parrain = $request->parrain; 
        $vendeurs->status = $request->status;
        $vendeurs->dateCreation = now();

        $vendeurs->save(); // puis on sauvegarde tous ca dans notre objet vendeur
        return response()->json([
            'message' => 'Le vendeur est cree avec succes !' // et on envoie un json comme message de succes.
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vendeurs = Vendeurs::findOrFail($id); // recuperation de l'id entrer par l'utilisateur
        if ($vendeurs) { // verifications du vendeur si ca existe dans la base
            return $vendeurs; // envoie du resultat de la recherche avec toutes les infos du vendeur
        } else {
            return response()->json([
                'message' => 'Ce vendeur existe pas' //envoie du resultat de la recherche avec echec
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vendeurs = Vendeurs::findOrFail($id);
        if ($vendeurs) {
            if ($vendeurs->status==0) {
                $vendeurs->status=1;
            } else {
                $vendeurs->status=0;
            }

            $vendeurs->update();
            return response()->json([
                'message' => 'Mise a jours effectuee avec succes !'
            ]);
        } else {
            return response()->json([
                'message' => 'Ce vendeur existe pas.'
            ]);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nom' => 'required|max:255', 
                'email' => 'required|max:255',
                'phone' => 'required|max:255',  
                'pays' => 'required|max:255', 
                'lieu' => 'required|max:255', 
                'ville' => 'required|max:255', 
                'quartier' => 'required|max:255', 
                'boutique' => 'required|max:255', 
                'code' => 'required|max:255', 
                'parrain' => 'required|max:255', 
                'status' => 'required|max:255' 
            ],
            [
                'nom' => 'Obligatoire !', 
                'email' => 'Obligatoire !', 
                'phone' => 'Obligatoire !', 
                'pays' => 'Obligatoire !', 
                'lieu' => 'required|max:255', 
                'ville' => 'Obligatoire !', 
                'quartier' => 'Obligatoire !', 
                'boutique' => 'Obligatoire !', 
                'code' => 'Obligatoire !', 
                'parrain' => 'Obligatoire !', 
                'status' => 'Obligatoire !' 
            ]
        );
        $vendeurs = Vendeurs::findOrFail($id); // recuperation de l'id entrer par l'utilisateur
        if ($vendeurs) { // verifications du vendeur si ca existe dans la base
            $vendeurs->nom = $request->nom; 
            $vendeurs->email = $request->email; 
            $vendeurs->phone = $request->phone; 
            $vendeurs->pays = $request->pays; 
            $vendeurs->lieu = $request->lieu; 
            $vendeurs->ville = $request->ville; 
            $vendeurs->quartier = $request->quartier; 
            $vendeurs->boutique = $request->boutique; 
            $vendeurs->code = $request->code; 
            $vendeurs->parrain = $request->parrain; 
            $vendeurs->status = $request->status; 
            
            
            $vendeurs->update();
            return response()->json([
                'message' => 'Mise a jours effectuee avec succes !'
            ]);
        } else {
            return response()->json([
                'message' => 'Ce vendeur existe pas.'
            ]);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vendeurs = Vendeurs::findOrFail($id);
        if ($vendeurs) {
            $vendeurs->delete();
            return response()->json([
                'message' => 'Le vendeur est supprimee avec succes !'
            ]);
        } else {
            return response()->json([
                'message' => 'Ce vendeur existe pas.'
            ]);
        }
    }


public function toggleActivation($id)
{
    $vendeurs = Vendeurs::find($id);

    if ($vendeurs) {
        
        
        if ($vendeurs->status==1) {
            $vendeurs->status =0;
            $vendeurs->update();
        
            return response()->json([
                'message' => 'Le vendeur est Desactiver.'
            ]);
        }else {
            $vendeurs->status =1;
            $vendeurs->update();
            
            return response()->json([
                'message' => 'Le vendeur est Activer.'
            ]);
        }
       
    } else {
        return response()->json([
            'message' => 'Ce vendeur existe pas.'
        ]);
    }
}
}

