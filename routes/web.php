<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
Route::get('/vaccinateds/create', [UserController::class,'create'])->middleware('auth')->name('vaccinated.create');
Route::get('/vaccinateds/{vaccinated}', [UserController::class,'edit'])->middleware('auth')->name('vaccinated.edit');
Route::post('/vaccinateds/register', [UserController::class,'store'])->middleware('auth')->name('vaccinated.store');
Route::put('/vaccinateds/{vaccinated}/actualizar', [UserController::class,'update'])->middleware('auth')->name('vaccinated.update');
Route::delete('/vaccinateds/{vaccinated}', [UserController::class, 'destroy'])->middleware('auth')->name('vaccinated.destroy');

require __DIR__.'/auth.php';
