<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\AreaController;
use App\Http\Controllers\Api\WhatsappController;
use App\Http\Controllers\Api\V1\PerfilController;
use App\Http\Controllers\Api\GoogleMeetController;
use App\Http\Controllers\Api\V1\CountryController;
use App\Http\Controllers\Api\V1\DistrictController;
use App\Http\Controllers\Api\V1\DivisionController;
use App\Http\Controllers\Api\V1\platformController;
use App\Http\Controllers\Api\V1\ProvinceController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\ApplierController as ApplierV1;
use App\Http\Controllers\Api\V1\AssistController;

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

// Login        -------------------------------------------------
Route::post('login',[LoginController::class,'login']);

Route::get('whts',WhatsappController::class);
//Route::get('email',TokenController::class);
Route::get('meet',GoogleMeetController::class);

Route::middleware('auth:sanctum')->group(function(){

});


//V1-------------------------------------------------
Route::apiResource('v1/appliers',ApplierV1::class);
Route::apiResource('v1/countries',CountryController::class);
Route::apiResource('v1/provinces',ProvinceController::class);
Route::apiResource('v1/perfiles',PerfilController::class);
Route::apiResource('v1/areas',AreaController::class);
Route::apiResource('v1/divisiones',DivisionController::class);
Route::apiResource('v1/department',DepartmentController::class);
Route::apiResource('v1/distritos',DistrictController::class);
Route::apiResource('v1/plataformas',platformController::class);
Route::post('v1/assist',[AssistController::class,'registro']);

