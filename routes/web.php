<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Table\OfferController;
use App\Http\Controllers\Table\CvController;
use App\Http\Controllers\Page\ProfileController;
use App\Http\Controllers\Page\AdministrateursController;
use App\Http\Controllers\Page\PiloteController;
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

Route::get('/Admin_offre', [AdministrateursController::class, 'Offer'])->middleware('auth');
Route::get('/Admin_etudiant', [AdministrateursController::class,'Etudiant'])->middleware('auth');
Route::get('/Admin_entreprise', [AdministrateursController::class, 'Entreprise'])->middleware('auth');
Route::get('/Admin_pilotes', [AdministrateursController::class, 'Pilotes'])->middleware('auth');


Route::get('/Pilote_offre', [PiloteController::class, 'Offer'])->middleware('auth');
Route::get('/Pilote_entreprise', [PiloteController::class, 'Entreprise'])->middleware('auth');
Route::get('/Pilote_etudiant', [PiloteController::class,'Etudiant'])->middleware('auth');



Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });
Auth::routes();

Route::get('profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('profile', [CvController::class, 'store'])->middleware('auth')->name('file.store');

Route::get('/cv/{filename}', function ($filename) {
    $path = storage_path('app/uploads/' . $filename);
    return response()->file($path);
})->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
