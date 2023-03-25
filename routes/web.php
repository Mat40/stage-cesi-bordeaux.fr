<?php
use App\Http\Controllers\Table\CompanyController;
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

Route::middleware(['auth', 'checkRole:admin'])->group(function() {
    // Pilote
    Route::get('/admin/pilote', [AdministrateursController::class, 'Pilotes']);
    Route::get('/admin/pilote/delete/{id}', [UserController::class, 'delete']);
    Route::post('/admin/pilote/update/{id}', [UserController::class, 'update']);
});

Route::middleware(['auth', 'checkRole:pilote'])->group(function() {
    // Offers
    Route::get('/admin/offre', [AdministrateursController::class, 'Offer']);
    Route::post('/admin/offre', [OfferController::class, 'create'])->name('admin/offre');

    // Student
    Route::get('/admin/etudiant', [AdministrateursController::class,'Etudiant']);
    Route::get('/admin/etudiant/delete/{id}', [UserController::class, 'delete']);
    Route::post('/admin/etudiant/update/{id}', [UserController::class, 'update']);

    // Company
    Route::get('/admin/entreprise', [AdministrateursController::class, 'Entreprise']);
    Route::post('/register/company', [CompanyController::class, 'create'])->name('register/company');
    Route::get('/admin/company/delete/{id}', [CompanyController::class, 'delete']);
    Route::post('/admin/company/update/{id}', [CompanyController::class, 'update']);
});
Route::get('/', [OfferController::class, 'index'])->name('index');;

Route::middleware(['auth'])->group(function() {
    Route::get('/', [OfferController::class, 'index'])->name('index');;
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    Route::get('/register')->name('register');;


    Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profil', [CvController::class, 'upload'])->name('cv.upload');
    Route::put('/profil', [CvController::class, 'update'])->name('cv.update');
    Route::delete('/profil', [CvController::class, 'delete'])->name('cv.delete');
    Route::patch('/profil', [UserController::class, 'upload'])->name('pp.upload');
    Route::get('/profil/cv/download', [CvController::class, 'download'])->name('cv.download');

    Route::get('/cv/{filename}', function ($filename) {
        $path = storage_path('app/uploads/' . $filename);
        return response()->file($path);
    });

    Route::get('/profil-picture/{filename}', function ($filename) {
        $path = storage_path('app/uploads/' . $filename);
        return response()->file($path);
    });
 });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
