<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VaccinatedController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\AdministratorController;

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

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

//Vaccine routes
Route::get('/vaccines', [VaccineController::class,'index'])->middleware('auth')->name('vaccine.index');

//Vaccinated routes
Route::get('/vaccinateds', [VaccinatedController::class,'index'])->middleware('auth')->name('vaccinated.index');
Route::get('/vaccinateds/create', [VaccinatedController::class,'create'])->middleware('auth')->name('vaccinated.create');


Route::get('/vaccinateds/byDose', [VaccinatedController::class,'getVaccinatedsByDose'])->middleware('auth')->name('vaccinated.byDose');
Route::get('/vaccinateds/withComorbidity', [VaccinatedController::class,'getVaccinatedsWithComorbidity'])->middleware('auth')->name('vaccinated.withComorbidity');
Route::get('/vaccinateds/byAge', [VaccinatedController::class,'getVaccinatedsByAge'])->middleware('auth')->name('vaccinated.byAge');
Route::get('/vaccinateds/byDate', [VaccinatedController::class,'getVaccinatedsByDate'])->middleware('auth')->name('vaccinated.byDate');

Route::get('/vaccinateds/{vaccinated}', [VaccinatedController::class,'edit'])->middleware('auth')->name('vaccinated.edit');
Route::post('/vaccinateds/register', [VaccinatedController::class,'store'])->middleware('auth')->name('vaccinated.store');
Route::put('/vaccinateds/{vaccinated}/actualizar', [VaccinatedController::class,'update'])->middleware('auth')->name('vaccinated.update');
Route::delete('/vaccinateds/{vaccinated}', [VaccinatedController::class, 'destroy'])->middleware('auth')->name('vaccinated.destroy');
Route::post('/vaccinateds/create', [VaccinatedController::class,'nextForm'])->middleware('auth')->name('vaccinated.form');

//Batch routes
Route::get('/batches/allBatches', [BatchController::class,'getAllBatches'])->name('batch.getAllBatches');
Route::get('/batches/create', [BatchController::class,'create'])->middleware('auth')->name('batch.create');
Route::get('/batches/{batch}', [BatchController::class,'edit'])->middleware('auth')->name('batch.edit');
Route::post('/batches/register', [BatchController::class,'store'])->middleware('auth')->name('batch.store');
Route::post('/batches/available_batches', [BatchController::class,'getAvailableBatches'])->middleware('auth')->name('batch.getAvailableBatches');
Route::post('/batches/available_vaccines', [BatchController::class,'getAvailableVaccines'])->middleware('auth')->name('batch.getAvailableVaccines');
Route::put('/batches/{batch}/actualizar', [BatchController::class,'update'])->middleware('auth')->name('batch.update');
Route::delete('/batches/{batch}', [BatchController::class, 'destroy'])->middleware('auth')->name('batch.destroy');



//User route
Route::post('/register/regions', [UserController::class,'getRegions'])->middleware('auth')->name('register.getRegions');

//Admin routes
Route::get('/administrators', [AdministratorController::class,'index'])->middleware('auth')->name('admin.index');

//ruta random
Route::get('/vacuna', function () {
    return view('vaccine-form');
});

require __DIR__.'/auth.php';
