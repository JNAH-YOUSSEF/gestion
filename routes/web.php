<?php

use App\Http\Controllers\EmployeeAuthController;
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

// hadi dyl request

Route::prefix('admin')->middleware('auth')->group(function () {
    // Route pour les demandes
    Route::get('/employes/requests', [App\Http\Controllers\EmployesController::class, 'requests'])->name('employes.requests');
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

Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('/employee/login', [EmployeeAuthController::class, 'login']);
Route::post('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');


Route::get('/employee/dashboard', function () {
    if (!session()->has('employee_id')) {
        return redirect('/employee/login');
    }
    return view('employee.dashboard');
});


Route::get('/employee/dashboard', function () {
    // Check if the employee is authenticated
    if (!auth('employee')->check()) {
        return redirect('/employee/login');
    }

    // Get the authenticated employee
    $employee = auth('employee')->user();


    // Pass the employee data to the dashboard view
    return view('employee.dashboard', compact('employee'));
});

