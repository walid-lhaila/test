<?php

use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationsController;
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

Route::get('register', [RegisterController:: class, 'register']);
Route::get('login', [LoginController:: class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);




Route::post('client.store', [RegisterController::class, 'clientStore'])->name('client.store');
Route::Post('proprietaire.store', [RegisterController::class, 'proprietaireStore'])->name('proprietaire.store');



// Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('clientDashboard');
// Route::get('/proprietaire/dashboard', [ProprietaireController::class, 'dashboard'])->name('proprietaireDashboard');


Route::middleware(['auth', 'role:proprietaire'])->group(function () {
    Route::get('/proprietaire/dashboard', [ProprietaireController::class, 'dashboard'])->name('proprietaireDashboard');
    Route::get('/proprietaire/annonces', [ProprietaireController::class, 'annonces'])->name('proprietaireAnnonces');
    Route::post('/annonce.store', [ProprietaireController::class, 'addAnnonces'])->name('annonce.store');
    Route::delete('/annonces/{id}', [AnnoncesController::class, 'destroy'])->name('annonces.destroy');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('clientDashboard');
    Route::get('/client/annonces', [ClientController::class, 'annonces'])->name('clientAnnonces');
    Route::get('/client/reservations', [ClientController::class, 'reservations'])->name('clientReservations');
    Route::post('/store.annonce', [ClientController::class, 'addAnnonce'])->name('store.annonce');
    Route::delete('/annonce/{id}', [AnnoncesController::class, 'destroy'])->name('destroy');
    Route::post('/reserve/{annonce}', [ReservationsController::class, 'reserve'])->name('reserve');
});