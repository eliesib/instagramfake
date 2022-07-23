<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;


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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});
//inicio
Route::get('/dashboard', [InicioController::class, 'inicio'])->name('dashboard');



//mensaje
Route::get('/mensaje', [InicioController::class, 'mensaje'])->name('mensaje');


//Imagenes

Route::group(['prefix' => 'image'], function () {
    Route::GET('/upload', [ImageController::class, 'upload'])->name('upload');
    Route::POST('/save', [ImageController::class, 'save'])->name('image.save');
    Route::get('/mostrar/{filename}', [ImageController::class, 'getImage'])->name('image.mostrar');
    Route::get('{user}/{id}', [ImageController::class, 'detalles'])->name('img-detalles');
});

/* Comentarios */
Route::group(['prefix' => 'comment'], function () {
    Route::get('save', [CommentController::class, 'save'])->name('comment.save');
    Route::get('delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
});
/* Like */
Route::group(['prefix' => ''], function () {
    Route::get('like/{image_id}', [LikeController::class, 'like'])->name('like');
    Route::get('dislike/{image_id}', [LikeController::class, 'dislike'])->name('dislike');
});

/* Perfil de usuario */
Route::group(['prefix' => 'perfil'], function () {
    Route::get('/PER/{usuario?}', [PerfilController::class, 'perfil'])->name('perfil');
    Route::post('/guardados', [PerfilController::class, 'perfil'])->name('guardados');
    Route::get('/configuracion', [PerfilController::class, 'configuracion'])->name('configuracion');
    Route::post('/cambiar', [PerfilController::class, 'perfil'])->name('cambiar');
    Route::POST('/update', [PerfilController::class, 'update'])->name('update');
    Route::get('/avatar/{filename}', [PerfilController::class, 'getImage'])->name('avatar');
});
