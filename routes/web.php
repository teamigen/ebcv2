<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JoborderController;

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

// Route::get('/', function () {
//     return view('login');
// });

//default controller
Route::get('/', [LoginController::class, 'login']);




Route::controller(DashboardController::class)->group(function() {
    Route::post('/home', 'home')->name('welcomehome');
    Route::get('/home', 'home')->name('welcomehome');
    Route::get('dashboard', 'dashboard')->name('dashboard');

});

Route::controller(JoborderController::class)->group(function() {
    Route::get('joborder/managejoborder', 'managejoborder')->name('managejoborder');

});

