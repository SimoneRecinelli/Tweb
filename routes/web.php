<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;


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

/* ROTTE UTENTE NON REGISTRATO--------------------------------------------------------------------------------------- */

/* Rotta per la vista 'home' */
Route::get('/', [PublicController::class, 'showHome']) ->name('home');

/* Rotta per la vista 'catalogo' */
Route::get('/catalogo/{Categoria?}', [PublicController::class, 'showCatalog'])->name('catalogo');

/* Rotta per la barra di ricerca */
Route::get('/search', [PublicController::class, 'search'])->name('search');

/* Rotta per la vista 'faq' */
Route::get('/faq', [PublicController::class, 'showFaq']) ->name('faq');

/* Rotta per la vista 'info' */
Route::get('/info', [PublicController::class, 'showInfo']) ->name('info');

/* Rotta per la vista 'aziende' */
Route::get('/aziende', [PublicController::class, 'showAziende'])->name('aziende');

/*Rotta per la singola azienda*/
Route::get('/azienda/{idAzienda}', [PublicController::class, 'showSingleAzienda'])->name('paginaazienda');

/* Rotta per la vista 'coupon' */
Route::get('/coupon/{idOfferta}', [PublicController::class, 'showCoupon']) ->name('coupon');

/* Rotta per la barra di ricerca */
Route::get('/search', [PublicController::class, 'search'])->name('search');

/* -------------------------------------------------------------------------------------------------------------------*/

 Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')
    ->middleware('auth');


/* ROTTE UTENTE REGISTRATO -------------------------------------------------------------------------------------------*/

Route::get('/homeuser', [UserController::class, 'showHomeUser'])->name('homeuser')
    ->middleware('can:isUser');

require __DIR__.'/auth.php';


/* CRUD Users -------------------------------------------------------------------------------------------- */
Route::get('/showUser', [UserController::class, 'showUser'])->name('showUser')
    ->middleware('auth');
Route::put('/putProfile', [UserController::class, 'updateProfile'])->name('putProfile')
    ->middleware('auth');
Route::get('/modificapassword', [UserController::class, 'modificapassword'])->name('modificapassword')
    ->middleware('auth');
Route::put('/putpassword', [UserController::class, 'putpassword'])->name('putpassword')
    ->middleware('auth');
Route::get('/deleteProfile', [UserController::class, 'deleteProfile'])->name('deleteProfile')
    ->middleware('auth');
/* ------------------------------------------------------------------------------------------------------ */
Route::get('/newcoupon/{idOfferta}', [UserController::class, 'newcoupon'])->name('newcoupon')
    ->middleware('can:isUser');
/* ------------------------------------------------------------------------------------------------------------------ */


/* ROTTE STAFF ------------------------------------------------------------------------------------------------------ */

Route::get('/homestaff', [StaffController::class, 'showHomeStaff'])->name('homestaff')
    ->middleware('can:isStaff');

/* CRUD Offerte ------------------------------------------------------ */
Route::get('/insertofferta', [StaffController::class, 'insertofferta'])->name('insertofferta')
    ->middleware('can:isStaff');

Route::post('/storeofferta', [StaffController::class, 'storeofferta'])->name('storeofferta')
    ->middleware('can:isStaff');

Route::get('/deleteofferta', [StaffController::class, 'deleteofferta'])->name('deleteofferta')
    ->middleware('can:isStaff');

Route::delete('/destroyofferta/{idOfferta}', [StaffController::class, 'destroyofferta'])->name('destroyofferta')
    ->middleware('can:isStaff');

Route::get('/modificaofferta', [StaffController::class, 'modificaofferta'])->name('modificaofferta')
    ->middleware('can:isStaff');

Route::get('/updateofferta/{idOfferta}', [StaffController::class, 'updateofferta'])->name('updateofferta')
    ->middleware('can:isStaff');

Route::put('/modifyofferta/{idOfferta}', [StaffController::class, 'modifyofferta'])->name('modifyofferta')
    ->middleware('can:isStaff');

/* ------------------------------------------------------------------ */

/* ------------------------------------------------------------------------------------------------------------------ */


/* ROTTE AMMINISTRATORE ---------------------------------------------------------------------------------- */

Route::get('/amministratore', [AdminController::class, 'homeadmin'])->name('amministratore')
    ->middleware('can:isAdmin');

Route::get('/showStatistiche', [AdminController::class, 'showStatistiche'])->name('showStatistiche')
    ->middleware('can:isAdmin');

/* CRUD Staff ------------------------------------------------------------- */
Route::get('/insertStaff', [AdminController::class, 'insertStaff'])->name('insertStaff')
    ->middleware('can:isAdmin');

Route::post('/storeStaff', [AdminController::class, 'storeStaff'])->name('storeStaff')
    ->middleware('can:isAdmin');

Route::get('/showStaff', [AdminController::class, 'showStaff'])->name('showStaff')
    ->middleware('can:isAdmin');

Route::get('/updateStaff/{id}', [AdminController::class, 'updateStaff'])->name('updateStaff')
    ->middleware('can:isAdmin');

Route::put('/modifyStaff/{id}', [AdminController::class, 'modifyStaff'])->name('modifyStaff')
    ->middleware('can:isAdmin');

Route::get('/deleteStaff', [AdminController::class, 'deleteStaff'])->name('deleteStaff')
    ->middleware('can:isAdmin');

Route::delete('/destroyStaff/{id}', [AdminController::class, 'destroyStaff'])->name('destroyStaff')
    ->middleware('can:isAdmin');
/* ----------------------------------------------------------------------- */

/* Delete Utenti ------------------------------------------------------------- */
Route::get('/showUtenti', [AdminController::class, 'showUtenti'])->name('showUtenti')
    ->middleware('can:isAdmin');

Route::delete('/destroyUtenti/{id}', [AdminController::class, 'destroyUtenti'])->name('destroyUtenti')
    ->middleware('can:isAdmin');

/* ----------------------------------------------------------------------- */
/*CRUD Faq------------------------------------------------------------------------------------------------------------*/
Route::get('/insertfaq', [AdminController::class, 'insertfaq'])->name('insertfaq')
    ->middleware('can:isAdmin');

Route::post('/storefaq', [AdminController::class, 'storefaq'])->name('storefaq')
    ->middleware('can:isAdmin');

Route::get('/deletefaq', [AdminController::class, 'deletefaq'])->name('deletefaq')
    ->middleware('can:isAdmin');

Route::delete('/destroyfaq/{id}', [AdminController::class, 'destroyfaq'])->name('destroyfaq')
    ->middleware('can:isAdmin');

Route::get('/gestionefaq', [AdminController::class, 'gestionefaq'])->name('gestionefaq')
    ->middleware('can:isAdmin');

Route::get('/updatefaq/{id}', [AdminController::class, 'updatefaq'])->name('updatefaq')
    ->middleware('can:isAdmin');

Route::put('/modifyfaq/{id}', [AdminController::class, 'modifyfaq'])->name('modifyfaq')
    ->middleware('can:isAdmin');
/*-----------------------------------------------------------------------------------------------------------*/
/*CRUD Azienda-----------------------------------------------------------------------------------------------*/
Route::get('/insertazienda', [AdminController::class, 'insertazienda'])->name('insertazienda')
    ->middleware('can:isAdmin');

Route::post('/storeazienda', [AdminController::class, 'storeazienda'])->name('storeazienda')
    ->middleware('can:isAdmin');

Route::get('/deleteazienda', [AdminController::class, 'deleteazienda'])->name('deleteazienda')
    ->middleware('can:isAdmin');

Route::delete('/destroyazienda/{idAzienda}', [AdminController::class, 'destroyazienda'])->name('destroyazienda')
    ->middleware('can:isAdmin');

Route::get('/modificaazienda', [AdminController::class, 'modificaazienda'])->name('modificaazienda')
    ->middleware('can:isAdmin');

Route::get('/updateazienda/{idAzienda}', [AdminController::class, 'updateazienda'])->name('updateazienda')
    ->middleware('can:isAdmin');

Route::put('/modifyazienda/{idAzienda}', [AdminController::class, 'modifyazienda'])->name('modifyazienda')
    ->middleware('can:isAdmin');
/*-----------------------------------------------------------------------------------------------------------*/
/* Statistiche ----------------------------------------------------------------------------------------------*/
Route::get('/statsutente/{id}}', [AdminController::class, 'statsutente'])->name('statsutente')
    ->middleware('can:isAdmin');

Route::get('/statsofferta/{idOfferta}}', [AdminController::class, 'statsofferta'])->name('statsofferta')
    ->middleware('can:isAdmin');
/* -------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------------------ */


