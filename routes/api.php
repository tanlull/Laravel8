<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OfficerController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\BoraController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ETDAController;

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

Route::apiResource('/department', DepartmentController::class);
Route::apiResource('/officer', OfficerController::class);

//http://localhost/laravel8/public/api/bora
Route::apiResource('/bora', BoraController::class);
Route::post('/bora/authen1', [BoraController::class, 'authen1']);
Route::post('/bora/authen2', [BoraController::class, 'authen2']);


// Find by department name
//api/search/department?name=A
Route::get('/search/department', [DepartmentController::class, 'search'])->middleware('auth::sanctum');


// Authenticate
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// get profile
Route::get('/auth/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');

//http://localhost/laravel8/public/api/etda
// ETDAController
Route::get('/etda', [ETDAController::class, 'upload']);
