<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalRequestController;
use App\Models\Animal;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('animals',AnimalController::class);

Route::resource('animal_requests',AnimalRequestController::class);

Route::get('myrequests', [App\Http\Controllers\AnimalRequestController::class, 'myrequests'])->name('myrequests');
Route::get('adoptees', [App\Http\Controllers\AnimalRequestController::class, 'adoptees'])->name('adoptees');
Route::get('image', [App\Http\Controllers\AnimalController::class, 'image'])->name('image');






