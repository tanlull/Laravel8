<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\BoraController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return view('welcome');
});

//http://localhost/laravel8/public/api/hello
// Route::get('/hello', function () {
//     return env("APP_NAME") . " , Hello API : " . now() . "  " . config("app.timezone");
// });
Route::get('/hello', [CompanyController::class, 'index']);


//http://localhost/laravel8/public/api/staff
Route::get('/staff', function () {
    return config("app.url") . " , Hello staff ";
});

//http://localhost/laravel8/public/api/staff/3
// Route::get('/staff/{id}', function ($id) {
//     return config("app.url") . " , Hello staff id = " . $id;
// });
Route::get('/staff/{id}', [CompanyController::class, 'show']);

Route::apiResource('/product', ProductController::class);


//http://localhost/laravel8/public/api/bora
Route::apiResource('/bora', BoraController::class);
Route::post('/bora/authen1', [BoraController::class, 'authen1']);
Route::post('/bora/authen2', [BoraController::class, 'authen2']);
