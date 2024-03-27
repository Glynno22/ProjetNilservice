<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = clients::all();
        if ($clients != NULL){
            return $clients;
        }
        else{
            return response()->json([
                'message'=>'Aucun client enregistrée'
            ]);
        }
        return $clients;
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
             'pseudoClient'=>'required|max:255',
             'adresseClient'=>'required|max:255',
             'motPasse'=>'required|max:255',
             'telClient'=>'required|max:255',
             'statut'=>'required|max:255'

        ],

        [
             'pseudoClient'=>'Le nom de boutique est obligatoire',
             'adresseClient'=>'L adresse du client est obligatoire',
             'motPasse'=>'L adresse du client est obligatoire',
             'telClient'=>'Le telephone du client est obligatoire',
             'statut'=>'Le statut du client est obligatoire'
        ]
        );

        $clients = new clients;
        $clients->pseudoClient = $request->pseudoClient;
        $clients->adresseClient = $request->adresseClient;
        $clients->motPasse = $request->motPasse;
        $clients->telClient = $request->telClient;
        $clients->statut = $request->statut;
        $clients->save();
        return response()->json([
            'message' => 'client creer avec succès'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pseudoClient'=>'required|max:255',
            'adresseClient'=>'required|max:255',
            'motPasse'=>'required|max:255',
            'telClient'=>'required|max:255',
            'statut'=>'required|max:255'

        ],

        [
             'pseudoClient'=>'Le nom de boutique est obligatoire',
             'adresseClient'=>'L adresse du client est obligatoire',
             'motPasse'=>'L adresse du client est obligatoire',
             'telClient'=>'Le telephone du client est obligatoire',
              'statut'=>'Le statut du client est obligatoire'
        ]
        );

        $clients = clients::find($id);
        if($clients){
            $clients->pseudoClient = $request->pseudoClient;
            $clients->adresseClient = $request->adresseClient;
            $clients->motPasse = $request->motPasse;
            $clients->telClient = $request->telClient;
            $clients->statut = $request->statut;
            $clients->update();
            return response()->json([
                'message'=>'Mise a jour avec succes'
            ]);
        }
        else{
            return response()->json([
                'message'=>'Aucun client ne correspond a cet identifiant..'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clients = clients::find($id);
        if($clients){
           $clients->delete();
           return response()->json([
            'message'=>'Suppression avec succes...'
           ]);
        }else{
            return response()->json([
                'message' => 'Aucun client ne correspond a cet identifiant...'
            ]);
        }
    }

    public function toggleActivation($id)
    {
        $client = Clients::find($id);
    
        if ( $client ) {
            
            // 0 signifie activer et 1 desactiver
            if ( $client ->statut==1) {
                 $client->statut =0;
                 $client->update();
            
                return response()->json([
                    'message' => 'Le client est Desactiver.'
                ]);
            }else {
                $client->statut =1;
                $client->update();
                
                return response()->json([
                    'message' => 'Le client est Activer.'
                ]);
            }
           
        } else {
            return response()->json([
                'message' => 'Ce client existe pas.'
            ]);
        }
    }
}
