<?php

use App\Http\Controllers\EmployesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// hadi dyl statistics

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/employes/statistics', [App\Http\Controllers\EmployesController::class, 'statistics'])->name('employes.statistics');
});


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('home',function (){
        return view('home');
    });
  
    Route::resource('employes' , EmployesController::class) ; 

    Route::get('/employes/{employe}/vacation', [EmployesController::class , 'vacationRequest'])->name('vacation.request') ;
    Route::get('/employes/{id}/certificate', [EmployesController::class , 'certificateRequest'])->name('certificate.request');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

