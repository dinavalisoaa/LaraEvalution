<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;




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
   return redirect('/home');
});

// Route::get('admin/login', function () {
//     return view('admin.login',
//         [ 
//             'id'=>'1'
//         ])->name('a_login');
// });
// /Route::get('test/{id}',[UsersController::class,'test']); 
// Route::get('/home',[ArticleController::class,'home']); 
Route::get('/home',[ArticleController::class,'home']); 
Route::get('/{slug}-{id}.html',[ArticleController::class,'detail'])->where(['id'=>'(\d+)','slug'=>'([a-zA-Z0-9\-]+)']); 
Route::post('/articles/create',[ArticleController::class,'create']); 
Route::get('/articles',[ArticleController::class,'list']); 
Route::get('/test',[ArticleController::class,'test']); 
