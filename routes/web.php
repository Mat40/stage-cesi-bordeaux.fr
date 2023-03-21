<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Table\OfferController;
use App\Http\Controllers\Table\CvController;
use App\Http\Controllers\Table\UserController;
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

Route::get('/', [OfferController::class, 'index'])->name('index');;
Route::get('/register')->middleware('auth')->name('register');;

Route::get('/Admin_offre', [AdministrateursController::class, 'Offer'])->middleware('auth');
Route::get('/Admin_etudiant', [AdministrateursController::class,'Etudiant']);
Route::get('/Admin_entreprise', [AdministrateursController::class, 'Entreprise']);
Route::get('/Admin_pilotes', [AdministrateursController::class, 'Pilotes']);


Route::get('/Pilote_offre', [PiloteController::class, 'Offer'])->middleware('auth');
Route::get('/Pilote_entreprise', [PiloteController::class, 'Entreprise'])->middleware('auth');
Route::get('/Pilote_etudiant', [PiloteController::class,'Etudiant'])->middleware('auth');

Route::get('/delete/{id}', [UserController::class, 'softDelete'])->middleware('auth');
Route::post('/update/{id}', [UserController::class, 'update'])->middleware('auth');



Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });
Auth::routes();

Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
Route::post('/profil', [CvController::class, 'upload'])->middleware('auth')->name('cv.upload');
Route::put('/profil', [CvController::class, 'update'])->middleware('auth')->name('cv.update');
Route::delete('/profil', [CvController::class, 'delete'])->middleware('auth')->name('cv.delete');
Route::patch('/profil', [UserController::class, 'upload'])->middleware('auth')->name('pp.upload');
Route::get('/profil/cv/download', [CvController::class, 'download'])->middleware('auth')->name('cv.download');

Route::get('/cv/{filename}', function ($filename) {
    $path = storage_path('app/uploads/' . $filename);
    return response()->file($path);
})->middleware('auth');

Route::get('/profil-picture/{filename}', function ($filename) {
    $path = storage_path('app/uploads/' . $filename);
    return response()->file($path);
})->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
