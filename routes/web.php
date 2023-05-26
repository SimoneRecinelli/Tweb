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
Route::get('/', [PublicController::class, 'homeScadenza', 'showHome' ]) ->name('home');
// Route::get('/', [PublicController::class, 'homeScadenza']) ->name('homeScadenza');

/* Rotta per la vista 'catalogo' */
Route::get('/catalogo/{Categoria?}', [PublicController::class, 'showCatalog'])->name('catalogo');

/* Rotta per la vista 'faq' */
Route::get('/faq', [PublicController::class, 'showFaq']) ->name('faq');

/* Rotta per la vista 'info' */
Route::get('/info', [PublicController::class, 'showInfo']) ->name('info');

/* Rotta per la vista 'aziende' */
Route::get('/aziende', [PublicController::class, 'showAziende'])->name('aziende');

/*Rotta per la singola azienda*/
Route::get('/azienda/{idAzienda}', [PublicController::class, 'showSingleAzienda'])->name('paginaazienda');

/* Rotta per la vista 'login' */
/*Route::get('/login', [PublicController::class, 'showLogin']) ->name('login');*/
//Route::post('/login', [PublicController::class, 'showLogin'])->name('login');
//Route::post('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');


/* Rotta per la vista 'coupon' */
Route::get('/coupon/{idOfferta}', [PublicController::class, 'showCoupon']) ->name('coupon');

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

Route::delete('/destroyazienda/{idAzienda}', [AdminController::class, 'destroyazienda'])->name('destroyazienda');

Route::get('/modificaazienda', [AdminController::class, 'modificaazienda'])->name('modificaazienda');

Route::get('/updateazienda/{idAzienda}', [AdminController::class, 'updateazienda'])->name('updateazienda');

Route::put('/modifyazienda/{idAzienda}', [AdminController::class, 'modifyazienda'])->name('modifyazienda');
/*------------------------------------------------------------------------------------------------------------------------*/




/* Rotta che protegge altre rotte quando l'utente non è autenticato*/

/*Route::middleware([Authenticate::class, 'auth'])->group(function () {
        // Rotte protette dall'autenticazione
        // mettere rotta che ti collega alla pagina del coupon da stampare

    }); */



Route::get('/homeuser', [UserController::class, 'showHomeUser'])->name('homeuser');



require __DIR__.'/auth.php';

//Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/prova', [PublicController::class, 'showCatalog']) ->name('prova');

/* CUD Users -------------------------------------------------------------------------------------------- */
Route::get('/showUser', [UserController::class, 'showUser'])->name('showUser');
Route::put('/putProfile', [UserController::class, 'updateProfile'])->name('putProfile');
Route::get('/modificapassword', [UserController::class, 'modificapassword'])->name('modificapassword');
Route::put('/putpassword', [UserController::class, 'putpassword'])->name('putpassword');
Route::get('/deleteProfile', [UserController::class, 'deleteProfile'])->name('deleteProfile');
/* ------------------------------------------------------------------------------------------------------ */

/* ROTTE STAFF ----------------------------------------------------------------------------------------- */

Route::get('/homestaff', [StaffController::class, 'showHomeStaff'])->name('homestaff');

/* CUD Offerte ------------------------------------------------------ */
Route::get('/insertofferta', [StaffController::class, 'insertofferta'])->name('insertofferta');

Route::post('/storeofferta', [StaffController::class, 'storeofferta'])->name('storeofferta');

Route::get('/deleteofferta', [StaffController::class, 'deleteofferta'])->name('deleteofferta');

Route::delete('/destroyofferta/{idOfferta}', [StaffController::class, 'destroyofferta'])->name('destroyofferta');

Route::get('/modificaofferta', [StaffController::class, 'modificaofferta'])->name('modificaofferta');

Route::get('/updateofferta/{idOfferta}', [StaffController::class, 'updateofferta'])->name('updateofferta');

Route::put('/modifyofferta/{idOfferta}', [StaffController::class, 'modifyofferta'])->name('modifyofferta');

/* ------------------------------------------------------------------ */

/* ------------------------------------------------------------------------------------------------------ */



/* ROTTE AMMINISTRATORE ---------------------------------------------------------------------------------- */

Route::get('/amministratore', [AdminController::class, 'homeadmin'])->name('amministratore');
Route::get('/showStatistiche', [AdminController::class, 'showStatistiche'])->name('showStatistiche');

/* CRUD Staff ------------------------------------------------------------- */
Route::get('/insertStaff', [AdminController::class, 'insertStaff'])->name('insertStaff');

Route::post('/storeStaff', [AdminController::class, 'storeStaff'])->name('storeStaff');

Route::get('/showStaff', [AdminController::class, 'showStaff'])->name('showStaff');

Route::get('/updateStaff/{id}', [AdminController::class, 'updateStaff'])->name('updateStaff');

Route::put('/modifyStaff/{id}', [AdminController::class, 'modifyStaff'])->name('modifyStaff');

Route::get('/deleteStaff', [AdminController::class, 'deleteStaff'])->name('deleteStaff');

Route::delete('/destroyStaff/{id}', [AdminController::class, 'destroyStaff'])->name('destroyStaff');
/* ----------------------------------------------------------------------- */
/* Delete Utenti ------------------------------------------------------------- */
Route::get('/showUtenti', [AdminController::class, 'showUtenti'])->name('showUtenti');

Route::delete('/destroyUtenti/{id}', [AdminController::class, 'destroyUtenti'])->name('destroyUtenti');

/* ----------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------- */
Route::get('/newcoupon/{idOfferta}', [UserController::class, 'newcoupon'])->name('newcoupon');

Route::get('/statsutente/{id}}', [AdminController::class, 'statsutente'])->name('statsutente');

Route::get('/statsofferta/{idOfferta}}', [AdminController::class, 'statsofferta'])->name('statsofferta');
