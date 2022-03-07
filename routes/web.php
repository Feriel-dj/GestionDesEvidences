<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\admindashboardController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\admin\GérerutilisateursController;
use App\Http\Controllers\admin\outils;
Use App\Http\Controllers\Enqueteur\AjoutDemandeController;
use App\Http\Controllers\Avocat\GérerlesévidencessController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', [ HomeController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::group(['Middleware' => 'auth'],function() {
    Route::group(['Middleware' => 'role:admin', 'prefix' =>'admin', 'as' => 'admin.'], function() {
        Route::resource('Gérerutilisateurs', GérerutilisateursController::class);
        Route::resource('admindashboard', admindashboardController::class);
       // Route::resource('Demande', DemandeController::class);

       Route::get('/admindashboard', function () {
        return view('admin.admindashboard.index'); 
    })->name('admindashboard.index');
        Route::get('/outils', function () {
            return view('admin.outils.index'); 
        })->name('outils.index');

        Route::get('/Users', function () {
            return view('admin.Users.index');    
        })->name('Users.index');

        
        Route::get('/user-permissions', function () {
            return view('admin.user-permissions');    
        })->name('user-permissions');

        Route::get('/Demande', function () {
            return view('admin.Demande.index');    
        })->name('Demande.index');

        Route::get('/demande-success', function () {
            return view('admin.demande-success');    
        })->name('demande-success');

        Route::get('/journal-de-cas', function () {
            return view('admin.journal-de-cas');    
        })->name('journal-de-cas');
            });
            
    Route::group(['Middleware' => 'role:Enqueteur', 'prefix' =>'Enqueteur', 'as' => 'Enqueteur.'], function() {
Route::resource('AjoutDemande', AjoutDemandeController::class);
Route::get('/outils', function () {
    return view('admin.outils.index'); 
})->name('outils.index');
    });
    Route::group(['Middleware' => 'role:Avocat', 'prefix' =>'Avocat', 'as' => 'Avocat.'], function() {
        Route::resource('Gérerlesévidencess', GérerlesévidencessController::class);
            });

});


