<?php

use App\Http\Controllers\Car;
use App\Http\Controllers\Assurences;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //profile
    Route::get('/profile-vue', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    //dashboard
    Route::get('/assurances', [Assurences::class, 'assurance'])->name('assurence');
    Route::post('/assurances/recherche', [Assurences::class, 'search'])->name('assurence.search');
    Route::post('/dashboard/recherche', [Car::class, 'search'])->name('vehicule.search');


    //admin
    Route::get('/gestion-agents', [AdminController::class, 'gestionAgent'])->name('gestion.agent')->middleware(['admin']);
    Route::post('/gestion-agents/search', [AdminController::class, 'gestionAgentSearch'])->name('gestion.agent.search')->middleware(['admin']);
    Route::get('/gestion-agents/statut', [AdminController::class, 'gestionAgentStatut'])->name('gestion.agent.statut')->middleware(['admin']);
    Route::get('/gestion-agents/statut-change', [AdminController::class, 'gestionAgentStatutPlus'])->name('gestion.agent.statutP')->middleware(['admin']);

    //agent DGI
    Route::get('/enregistrement-voiture', [CarController::class, 'register'])->name('register.car')->middleware(['agent_dgi']);
    Route::post('/enregistrement-voiture/confirm', [CarController::class, 'registerConfirm'])->name('register.confirm')->middleware(['agent_dgi']);
    Route::resource('/assurence','App\Http\Controllers\AssurenceController')->except('show')->middleware(['agent_dgi']);
    Route::get('/assurence/{assurence}','App\Http\Controllers\AssurenceController@show')->name('assurence.show');

    Route::post('/assurence/enregistrement','App\Http\Controllers\AssurenceController@store')->name('assurence.store')->middleware(['agent_dgi']);
    Route::delete('/assurence/suppression','App\Http\Controllers\AssurenceController@destroy')->name('assurence.destroy')->middleware(['agent_dgi']);
    Route::resource('/payement','App\Http\Controllers\PayementController')->middleware(['agent_dgi']);
    //Route::put('/assurence/editer','App\Http\Controllers\AssurenceController@update')->name('assurence.update')->middleware(['agent_dgi']);
    
    //agent PCR
    Route::resource('contravention','App\Http\Controllers\ContraventionController');
    





    Route::resource('/vehicule','App\Http\Controllers\Car');
    Route::get('/vehicule/traquer/{vehicule}','App\Http\Controllers\Car@show1')->name('vehicule.show1');
});

require __DIR__.'/auth.php';
