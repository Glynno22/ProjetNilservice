<?php

namespace App\Http\Controllers;

use App\Models\Prestataires;
use Illuminate\Http\Request;

class PrestatairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestataire=Prestataires::all();
        if($prestataire!= Null){
            return $prestataire;
        }else{
            return response()->json([
                'message'=>'aucune prestataire enregistre'
            ]);
        }
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
        $request->validate([
            'nom'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'pays'=>'required',
            'quartier'=>'required',
            'ville'=>'required',
            'categorie'=>'required',
            'scanner'=>'required',
            'photo'=>'required',
            'cni'=>'required',
            'description'=>'required',
            'code'=>'required',
            'parrain'=>'required',
            'statut'=>'required',
            'dateCreation'=>'required',
            

        ],
        [
        'cni'=>'veillez remplire tout les champs',
        ]
        );

        $prestataire= new Prestataires;
  
        $prestataire->nom = $request->nom;
        $prestataire->email = $request->email;
        $prestataire->phone = $request->phone;
        $prestataire->pays = $request->pays;
        $prestataire->ville = $request->ville;
        $prestataire->quartier = $request->quartier;
        $prestataire->categorie = $request->categorie;
        $prestataire->scanner = $request->scanner;
        $prestataire->photo = $request->photo;
        $prestataire->cni = $request->cni;
        $prestataire->description = $request->description;
        $prestataire->code = $request->code;
        $prestataire->parrain = $request->parrain;
        $prestataire->statut = $request->statut;
        $prestataire->dateCreation = $request->dateCreation;
        $prestataire->save();

        return response()->json([
            'message'=>'prestataire cree avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prestataire=Prestataires::find($id);
        if($prestataire){
            return $prestataire;

        }else{
            return response()->json([
                'message'=>'aucun prestataire  ne correspond a cet id '
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestataires $prestataires)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         
        $request->validate([
            'nom'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'pays'=>'required',
            'quartier'=>'required',
            'ville'=>'required',
            'categorie'=>'required',
            'scanner'=>'required',
            'photo'=>'required',
            'cni'=>'required',
            'description'=>'required',
            'code'=>'required',
            'parrain'=>'required',
            'statut'=>'required',
            'dateCreation'=>'required',
            

        ],
        [
                'cni'=>'veillez remplire tout les champs',
        ]
        );

        $prestataire=Prestataires::find($id);

        if($prestataire){
            $prestataire->nom = $request->nom;
            $prestataire->email = $request->email;
            $prestataire->phone = $request->phone;
            $prestataire->pays = $request->pays;
            $prestataire->quartier = $request->quartier;
            $prestataire->ville = $request->ville;
            $prestataire->categorie = $request->categorie;
            $prestataire->description = $request->description;
            $prestataire->code = $request->code;
            $prestataire->parrain = $request->parrain;
            $prestataire->statut = $request->statut;
            $prestataire->dateCreation = $request->dateCreation;

            if ($request->hasFile('scanner')) {
                $scanner = $request->file('scanner');
                $scanner->store('public/images_scanner'); // Remplace "images" par le nom de ton dossier de stockage
                $prestataire->scanner = $scanner->getClientOriginalName();
            }

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photo->store('public/images_photos'); // Remplace "images" par le nom de ton dossier de stockage
                $prestataire->photo = $photo->getClientOriginalName();
            }
        
            if ($request->hasFile('cni')) {
                $cni = $request->file('cni');
                $cni->store('public/images_cni'); // Remplace "images" par le nom de ton dossier de stockage
                $prestataire->cni = $cni->getClientOriginalName();
            }
            $prestataire->save();

            return response()->json([
                'message' => 'Prestataire mis à jour avec succès',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestataire=Prestataires::find($id);
        if($prestataire){
          
          $prestataire->delete();

          return response()->json([
            "message"=>"prestataire suprimer avec succes"
          ]);
        }else{
            return response()->json([
                "message"=>"aucun prestataire ne correspond a cette id"
            ]);
        }
    }

    public function toggleActivation($id)
    { 
          $prestataire = Prestataires::find($id);

             if ($prestataire ) {

                 if ($prestataire->statut==1) {

                     $prestataire->statut =0;
                     $prestataire->update();
                     return response()->json([
                         'message' => 'Le prestataire est Desactiver.'
                     ]);
                 }
                 else {
                     $prestataire->statut =1;
                     $prestataire->update();
                     return response()->json([
                         'message' => 'Le prestaire est Activer.'
                     ]);
                 }
       
            } 
            else {
                 return response()->json([
                     'message' => 'Ce prestataire existe pas.'
                 ]);
            }
    }

    
}


