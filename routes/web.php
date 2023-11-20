<?php

use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Bien;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/acceuil',[BienController::class, 'acceuil'])->name('acceuil');
Route::get('/apropos',[BienController::class, 'apropos'])->name('apropos');
Route::get('/bien{id}',[UserController::class,'biens'])->name('biens');
Route::get('/detailBien{id}',[UserController::class,'show'])->name('detailBien');

Route::get('/comment', [CommentaireController::class, 'index'])->name('comment');
Route::post('/ajoutcommentaire', [CommentaireController::class, 'store'])->name('commentaire.store');
Route::get('/idcomment', [CommentaireController::class, 'show'])->name('test');
Route::delete('/deletecomment1/{id}', [CommentaireController::class, 'destroy'])->name('deletecomment');

Route::get('/index',[BienController::class,'index'])->name('index');
Route::get('/user',[UserController::class,'index'])->name('user');
Route::post('/ajout',[BienController::class,'store'])->name('bien.store');
Route::get('/show{id}',[BienController::class,'show'])->name('bien.show');
Route::get('/bien/detail/{id}',[BienController::class,'detail'])->name('bien.detail');
Route::patch('/update{id}',[BienController::class,'update'])->name('bien.update');
Route::delete('/delete{id}',[BienController::class,'destroy'])->name('bien.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
