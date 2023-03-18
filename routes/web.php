<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Table\OfferController;
use App\Http\Controllers\Table\CvController;
use App\Http\Controllers\Page\ProfileController;
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
