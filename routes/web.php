<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Models\Service;
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
    $service = Service::all();

    return new \App\Http\Resources\ServiceResource($service);
});


Route::prefix('admin')->group(function (){
    Route::get('/',[AuthController::class,'loginPage'])
        ->name('admin.login');

    Route::get('logout',[AuthController::class,'logout'])
    ->name('admin.logout');

    Route::post('login',[AuthController::class,'authendticate'])
        ->name('admin.authenticate');
});


Route::middleware(['admin'])->group(function (){
    //Route::resource('service',ServiceController::class);

    //Route::resource('customer',CustomerController::class);
});


Route::resource('customer',CustomerController::class);

Route::resource('service',ServiceController::class);

Route::get('/json-regencies/{plate}',[ServiceController::class,'regencies']);


