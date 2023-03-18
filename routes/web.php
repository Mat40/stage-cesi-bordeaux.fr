<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AdministrateursController;
use App\Http\Controllers\PiloteController;
use App\Http\Controllers\Auth\LogoutController;

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

Route::get('/', [OfferController::class, 'index'])->middleware('auth')->name('index');;
Route::get('/register')->middleware('auth')->name('register');;

Route::get('/Admin_offre', [AdministrateursController::class, 'Offer']);
Route::get('/Admin_etudiant', [AdministrateursController::class,'Etudiant']);
Route::get('/Admin_entreprise', [AdministrateursController::class, 'Entreprise']);
Route::get('/Admin_pilotes', [AdministrateursController::class, 'Pilotes']);


Route::get('/Pilote_offre', [PiloteController::class, 'Offer']);
Route::get('/Pilote_entreprise', [PiloteController::class, 'Entreprise']);
Route::get('/Pilote_etudiant', [PiloteController::class,'Etudiant']);



Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
