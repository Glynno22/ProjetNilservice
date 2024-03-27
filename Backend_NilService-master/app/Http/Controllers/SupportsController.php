<?php

namespace App\Http\Controllers;

use App\Models\Supports;
use Illuminate\Http\Request;

class SupportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        //chercher tous les supports et les afficher
         $support = Supports::all();
         return $support;
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
        $support = new Supports;

        //inserer un nouveau support dans la base
        $support->id = $request->id;
        $support->nomSup = $request->nomSup;
        $support->emailSup = $request->emailSup;
        $support->motPass = $request->motPass;
        $support->telSup = $request->telSup;
        $support->positionSup = $request->positionSup;
        $support->save();
        
        //retourner le message si afficher
        return response()->json([
            'message'=>'ajouter avec success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $support = Supports::find($id);
        if($support){
            return $support;

        }else{
            return response()->json([
                'message'=>'aucun support  ne correspond a cet id '
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supports $supports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //verifier si ce support existe
        $support = Supports::find($id);

        if($support){
            //si oui modifier et afficher le message
            $support->id = $request->id;
            $support->nomSup = $request->nomSup;
            $support->emailSup = $request->emailSup;
            $support->motPass = $request->motPass;
            $support->telSup = $request->telSup;
            $support->positionSup = $request->positionSup;
            $support->update();
    
            return response()->json([
                'message'=>'modifier avec success'
            ]);
        }
        else{
            //si non afficher le message le disant
            return response()->json([
                'message'=>'support introuvable'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supports $supports,$id)
    {
        $support = Supports::find($id);

        if($support){
            //supprimer le support
           $support->delete();
           return response()->json([
            'message'=>'supprimer avec success'
        ]);
        }
        else{
            return response()->json([
                'message'=>'support introuvable'
            ]);
        }
    }
}
