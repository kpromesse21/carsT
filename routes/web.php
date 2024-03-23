<?php

use App\Http\Controllers\Car;
use App\Http\Controllers\Assurences;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContraventionController;
use App\Http\Controllers\PayementController;
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
    Route::middleware(["agent_dgi"])->group(function(){
        Route::post('/assurence/enregistrement','App\Http\Controllers\AssurenceController@store')->name('assurence.store');
        Route::delete('/assurence/suppression','App\Http\Controllers\AssurenceController@destroy')->name('assurence.destroy');
        Route::resource('/payement','App\Http\Controllers\PayementController');
        Route::get('/enregistrement-voiture', [CarController::class, 'register'])->name('register.car');
        Route::get('/assurence/{assurence}','App\Http\Controllers\AssurenceController@show')->name('assurence.show');
        Route::get('/gestion-vehicule/{car}',[CarController::class,'show'])->name('car.show');
        Route::get('/gestion-vehicule-edit/{car}',[CarController::class,'edit'])->name('car.edit');
        Route::post('/gestion-vehicule-update',[CarController::class,'update'])->name('car.update');
        Route::post('/gestion-vehicule-search',[CarController::class,'rechercher'])->name('car.recherche');
        Route::post('/gestion-vehicule-proprio',[CarController::class,'ajout_proprio'])->name('car.proprio');
        Route::post('/enregistrement-voiture/confirm', [CarController::class, 'registerConfirm'])->name('register.confirm');
        Route::resource('/assurence','App\Http\Controllers\AssurenceController')->except('show');
       
    });

    //Route::put('/assurence/editer','App\Http\Controllers\AssurenceController@update')->name('assurence.update')->middleware(['agent_dgi']);
    
    //agent PCR
     Route::middleware(['agent_pcr'])->group(function (){
        Route::resource('/contravention','App\Http\Controllers\ContraventionController');
        Route::post('/contravation_store',[ContraventionController::class,'store'])->name('contravation.store');
        Route::get('payement-contravention/',[PayementController::class,"payement_contravention_index"]);
        Route::post('payement-contravention-select/',[PayementController::class,"payement_contravention_select"])->name('contravention.payement.select');
    });

    // Route::resource('/contravention','App\Http\Controllers\ContraventionController');
    

    Route::resource('/vehicule','App\Http\Controllers\Car');
    // Route::get("/car/edition/{car}",[Car::class,'edit'])->name("car.edit");
    Route::get('/vehicule/traquer/{vehicule}','App\Http\Controllers\Car@show1')->name('vehicule.show1');
});

require __DIR__.'/auth.php';
