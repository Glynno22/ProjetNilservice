<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PrestatairesController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\SupportsController;
use App\Http\Controllers\VendeursController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*--------------------route pour produits-------------------------------------*/
Route::get('listeproduit',[ProduitsController::class,'index']);
Route::post('ajouterproduit',[ProduitsController::class,'store']);
Route::put('editerproduit/{id}',[ProduitsController::class,'update']);
Route::delete('supprimerproduit/{id}',[ProduitsController::class,'destroy']);
Route::get('rechercherproduit/{id}',[ProduitsController::class,'show']);



/*---------------------------route pour supports------------------------------*/
Route::get('listesupport',[SupportsController::class,'index']);
Route::post('ajoutersupport',[SupportsController::class,'store']);
Route::put('editersupport/{id}',[SupportsController::class,'update']);
Route::delete('supprimersupport/{id}',[SupportsController::class,'destroy']);
Route::get('recherchersupport/{id}',[SupportsController::class,'show']);



/*-------------------------route pour vendeurs------------------*/
Route::put('changeStatut/{id}',[VendeursController::class,'edit']);

 
Route::get('listevendeur',[VendeursController::class,'index']);
// Route::post('ajoutervendeur',[VendeursController::class,'store']);
Route::post('ajoutervendeur',[VendeursController::class,'store']);
Route::get('recherchervendeur/{id}',[VendeursController::class,'show']);
Route::put('editervendeur/{id}',[VendeursController::class,'update']);
Route::delete('supprimervendeur/{id}',[VendeursController::class,'destroy']);
Route::put('modifierstatutvendeur/{id}',[VendeursController::class,'toggleActivation']);


/*-------------------- les routes pour Prestataires------------------------*/

Route::get('listeprestataire',[PrestatairesController::class,'index']);
Route::post('ajouterprestataire',[PrestatairesController::class,'store']);
Route::get('rechercheprestataire/{id}',[PrestatairesController::class,'show']);
Route::put('editerprestataire/{id}',[PrestatairesController::class,'update']);
Route::delete('supprimerprestataire/{id}',[PrestatairesController::class,'destroy']);
Route::put('modifierstatutprestataire/{id}',[PrestatairesController::class,'toggleActivation']);


/*-----------------------routes pour clients------------------------------*/
Route::get('listeclient',[ClientsController::class,'index']);
Route::post('ajouterclient',[ClientsController::class,'store']);
Route::put('editerclient/{id}',[ClientsController::class,'update']);
Route::delete('supprimerclient/{id}',[ClientsController::class,'destroy']);
Route::put('modifierstatutclient/{id}',[ClientsController::class,'toggleActivation']);
Route::get('rechercheclient/{id}',[ClientsController::class,'show']);


/*------------------------routes pour administrateur------------------------------*/
Route::get('listeadmin',[AdministrateurController::class,'index']);
Route::post('ajouteradmin',[AdministrateurController::class,'store']);
Route::put('editeradmin/{id}',[AdministrateurController::class,'update']);
Route::delete('supprimeradmin/{id}',[AdministrateurController::class,'destroy']);
Route::get('rechercheadmin/{id}',[AdministrateurController::class,'show']);



