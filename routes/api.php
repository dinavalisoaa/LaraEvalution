<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facebookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('log',[ facebookController::class, 'login']);


Route::get('membres',[facebookController::class,'getall']);

Route::post('Samis',[facebookController::class,'getSamis']);

Route::post('amis',[facebookController::class,'getAmis']);

Route::post('demandeE',[facebookController::class,'getDemandeE']);

Route::post('demandeR',[facebookController::class,'getDemandeR']);

Route::post('react',[facebookController::class,'getReact']);

Route::post('Pub',[facebookController::class,'getPub']);

Route::get('annuler/{id}&&{id_mb}',[facebookController::class,'annuler_demand']);

Route::post('inscrit',[facebookController::class,'inscrit']);
