<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JoborderController;
use App\Http\Controllers\SettingsController;
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
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout/{id}', [AuthController::class, 'logout'])->name('logout');


Route::controller(DashboardController::class)->group(function() {
    Route::post('/home', 'home')->name('home');
    Route::get('/home', 'home')->name('home');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('logout/{id}', 'logout')->name('logout');


});

Route::controller(JoborderController::class)->group(function(){
                // link        //controller function         //indexfromhome
    Route::get('joborder/manage','managejoborder')->name('managejoborder');
    Route::get('joborder/createnew','createjoborder')->name('createjoborder');
});


Route::controller(SettingsController::class)->group(function(){

    Route::get("settings/home","index")->name("managesettings");
    Route::get("settings/productparameter","productparameter")->name("productparameter");
    Route::get("settings/tax","tax")->name("tax");
    Route::get("settings/productcategory","productcategory")->name("productcategory");
    Route::get("settings/productsubcategory","productsubcategory")->name("productsubcategory");
    Route::get("settings/producttype","producttype")->name("producttype");
    Route::get("settings/printers","printers")->name("printers");
    Route::get("settings/customertype","customertype")->name("customertype");
    Route::get("settings/addons","addons")->name("addons");

    Route::post("settings/saveparameter","saveparameter")->name("saveparameter");
    Route::get("settings/editparameter/{id}","editparameter")->name("editparameter");

    Route::post("settings/savetax","savetax")->name("savetax");
    Route::get("settings/edittax/{id}","edittax")->name("edittax");

    Route::post("settings/saveproductcategory","saveproductcategory")->name("saveproductcategory");
    Route::get("settings/editproductcategory/{id}","editproductcategory")->name("editproductcategory");

    Route::post("settings/saveproductsubcategory","saveproductsubcategory")->name("saveproductsubcategory");
    Route::get("settings/editproductsubcategory/{id}","editproductsubcategory")->name("editproductsubcategory");

    Route::post("settings/saveproducttype","saveproducttype")->name("saveproducttype");
    Route::get("settings/editproducttype/{id}","editproducttype")->name("editproducttype");

    Route::post("settings/saveprinter","saveprinter")->name("saveprinter");
    Route::get("settings/editprinter/{id}","editprinter")->name("editprinter");

    Route::post("settings/savecustomertype","savecustomertype")->name("savecustomertype");
    Route::get("settings/editcustomertype/{id}","editcustomertype")->name("editcustomertype");

    Route::post("settings/saveaddons","saveaddons")->name("saveaddons");
    Route::get("settings/editaddons/{id}","editaddons")->name("editaddons");

    // Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);
});