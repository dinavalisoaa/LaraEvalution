<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facebookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MouvementMatiereController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('users.login',
        [ 
            'id'=>'1'
        ]);
});

// Route::get('admin/login', function () {
//     return view('admin.login',
//         [ 
//             'id'=>'1'
//         ])->name('a_login');
// });
// /Route::get('test/{id}',[UsersController::class,'test']); 
Route::get('users/home',[UsersController::class,'test']); 
Route::get('admin/login',[AdminController::class,'toLogin']); 


// Route::get('test','UsersController@test'); 


// Route::get('users/actionLogin',[UsersController::class,'action_login'])->name('actionLog'); 
//{{route('actionLog')}}
Route::get('users/actionLogin',[UsersController::class,'action_login'])->name('actionLog'); 
Route::get('users/actionSignup',[UsersController::class,'action_inscription'])->name('actionSign'); 
Route::get('users/signup',[UsersController::class,'toSignUp'])->name('signup'); 
Route::get('admin/home',[AdminController::class,'home'])->name('home'); 


Route::get('admin/actionLogin',[AdminController::class,'action_login'])->name('a_actionLog'); 
Route::get('admin/actionSignup',[AdminController::class,'action_inscription'])->name('a_actionSign'); 
Route::get('admin/signup',[AdminController::class,'toSignUp'])->name('a_signup'); 
Route::get('admin/valider/{id}',[AdminController::class,'valider'])->name('valider'); 

Route::get('matieres',[MouvementMatiereController::class,'liste_matiere']);///->name('valider'); 
Route::get('matieres/saisie',[MouvementMatiereController::class,'saisie_matiere']);///->name('valider'); 





// action_inscription

Route::put('traite/ho',[facebookController::class,'login']); 

Route::get('traite/demand',[facebookController::class,'envoi_demand']); 
Route::get('traite/annuler',[facebookController::class,'annul_demand']); 
Route::get('traite/accept',[facebookController::class,'accept_demand']);
Route::get('traite/delete',[facebookController::class,'delete_demand']);
Route::put('traite/message',[facebookController::class,'messagerie']);
Route::put('request/message',[facebookController::class,'send_message']);
Route::put('traite/publication',[facebookController::class,'set_publication']);
Route::put('set/reaction',[facebookController::class,'add_reaction']);