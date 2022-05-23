<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::resou('book', [BookController::class, 'index']);

//Public Route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected Route
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('profile', function(Request $request){
        return auth()->user();
    });

    // Route::get('book', [BookController::class, 'index']);
    Route::resource('book', BookController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});

