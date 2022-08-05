<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Http\Resources\ServiceResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('service',function (){
    $service = Service::all();
    return new ServiceResource($service);
});

Route::get('customer',function (){
    $customer = \App\Models\Customer::all();
    return new \App\Http\Resources\CustomerResource($customer);
});





/*Route::get('service',[ServiceController::class,'index']);
Route::post('service/create',[ServiceController::class,'store']);
Route::put('service/{id}',[ServiceController::class,'update']);
Route::delete('service/{id}',[ServiceController::class,'destroy']);*/





