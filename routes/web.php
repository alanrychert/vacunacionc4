<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VaccinatedController;
use App\Http\Controllers\BatchController;

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

//Vaccinated routes
Route::get('/vaccinateds/create', [VaccinatedController::class,'create'])->middleware('auth')->name('vaccinated.create');
Route::get('/vaccinateds/{vaccinated}', [VaccinatedController::class,'edit'])->middleware('auth')->name('vaccinated.edit');
Route::post('/vaccinateds/register', [VaccinatedController::class,'store'])->middleware('auth')->name('vaccinated.store');
Route::put('/vaccinateds/{vaccinated}/actualizar', [VaccinatedController::class,'update'])->middleware('auth')->name('vaccinated.update');
Route::delete('/vaccinateds/{vaccinated}', [VaccinatedController::class, 'destroy'])->middleware('auth')->name('vaccinated.destroy');

//Batch routes
Route::get('/batch/create', [BatchController::class,'create'])->middleware('auth')->name('batch.create');
Route::get('/batch/{batch}', [BatchController::class,'edit'])->middleware('auth')->name('batch.edit');
Route::post('/batch/register', [BatchController::class,'store'])->middleware('auth')->name('batch.store');
Route::put('/batch/{batch}/actualizar', [BatchController::class,'update'])->middleware('auth')->name('batch.update');
Route::delete('/batch/{batch}', [BatchController::class, 'destroy'])->middleware('auth')->name('batch.destroy');

require __DIR__.'/auth.php';
