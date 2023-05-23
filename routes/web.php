<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\Authenticate;

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


/* Rotta per la vista 'home' */
Route::get('/', [PublicController::class, 'showHome']) ->name('home');

/* Rotta per la vista 'catalogo' */
Route::get('/catalogo/{Categoria?}', [PublicController::class, 'showCatalog'])->name('catalogo');

/* Rotta per la vista 'faq' */
Route::get('/faq', [PublicController::class, 'showFaq']) ->name('faq');

/* Rotta per la vista 'info' */
Route::get('/info', [PublicController::class, 'showInfo']) ->name('info');

/* Rotta per la vista 'aziende' */
Route::get('/aziende', [PublicController::class, 'showAziende'])->name('aziende');

/*Rotta per la singola azienda*/
Route::get('/azienda/{id}', [PublicController::class, 'showSingleAzienda'])->name('paginaazienda');

/* Rotta per la vista 'login' */
/*Route::get('/login', [PublicController::class, 'showLogin']) ->name('login');*/
//Route::post('/login', [PublicController::class, 'showLogin'])->name('login');
//Route::post('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');


/* Rotta per la vista 'coupon' */
Route::get('/coupon/{id?}', [PublicController::class, 'showCoupon']) ->name('coupon');

/* Rotta per la vista 'registrati' */
Route::get('/registrazione', [PublicController::class, 'showSignIn']) ->name('registrazione');

/* Rotta per la barra di ricerca */
Route::get('/search', [PublicController::class, 'search'])->name('search');



/*CUD Faq----------------------------------------------------------------------------------------------------------------*/
Route::get('/insertfaq', [AdminController::class, 'insertfaq'])->name('insertfaq');

Route::post('/storefaq', [AdminController::class, 'storefaq'])->name('storefaq');

Route::get('/deletefaq', [AdminController::class, 'deletefaq'])->name('deletefaq');

Route::delete('/destroyfaq/{id}', [AdminController::class, 'destroyfaq'])->name('destroyfaq');

Route::get('/gestionefaq', [AdminController::class, 'gestionefaq'])->name('gestionefaq');

Route::get('/updatefaq/{id}', [AdminController::class, 'updatefaq'])->name('updatefaq');

Route::put('/modifyfaq/{id}', [AdminController::class, 'modifyfaq'])->name('modifyfaq');
/*------------------------------------------------------------------------------------------------------------------------*/


/*CUD Azienda----------------------------------------------------------------------------------------------------------------*/
Route::get('/insertazienda', [AdminController::class, 'insertazienda'])->name('insertazienda');

Route::post('/storeazienda', [AdminController::class, 'storeazienda'])->name('storeazienda');

Route::get('/deleteazienda', [AdminController::class, 'deleteazienda'])->name('deleteazienda');

Route::delete('/destroyazienda/{id}', [AdminController::class, 'destroyazienda'])->name('destroyazienda');

Route::get('/modificaazienda', [AdminController::class, 'modificaazienda'])->name('modificaazienda');

Route::get('/updateazienda/{id}', [AdminController::class, 'updateazienda'])->name('updateazienda');

Route::put('/modifyazienda/{id}', [AdminController::class, 'modifyazienda'])->name('modifyazienda');
/*------------------------------------------------------------------------------------------------------------------------*/



/* Rotta che protegge altre rotte quando l'utente non è autenticato*/

/*Route::middleware([Authenticate::class, 'auth'])->group(function () {
        // Rotte protette dall'autenticazione
        // mettere rotta che ti collega alla pagina del coupon da stampare

    }); */

Route::get('/amministratore', [AdminController::class, 'homeadmin'])->name('amministratore');

Route::get('/homeuser', [UserController::class, 'showHomeUser'])->name('homeuser');



require __DIR__.'/auth.php';

//Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/prova', [PublicController::class, 'showCatalog']) ->name('prova');

/* CUD Users -------------------------------------------------------------------------------------------- */
Route::get('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::get('/deleteProfile', [UserController::class, 'deleteProfile'])->name('deleteProfile');
/* ------------------------------------------------------------------------------------------------------ */

Route::get('/homestaff', [StaffController::class, 'showHomeStaff'])->name('homestaff');

/* CUD Offerte -------------------------------------------------------------------------------------------- */
Route::get('/insertofferta', [StaffController::class, 'insertofferta'])->name('insertofferta');

Route::post('/storeofferta', [StaffController::class, 'storeofferta'])->name('storeofferta');

Route::get('/deleteofferta', [StaffController::class, 'deleteofferta'])->name('deleteofferta');

Route::delete('/destroyofferta/{id}', [StaffController::class, 'destroyofferta'])->name('destroyofferta');

Route::get('/modificaofferta', [StaffController::class, 'modificaofferta'])->name('modificaofferta');

Route::get('/updateofferta/{id}', [StaffController::class, 'updateofferta'])->name('updateofferta');

Route::put('/modifyofferta/{id}', [StaffController::class, 'modifyofferta'])->name('modifyofferta');


/* ------------------------------------------------------------------------------------------------------ */