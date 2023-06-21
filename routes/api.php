<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\PlaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->middleware('api')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::get('user', 'user');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('registration', 'registration');

});
Route::get('places', [PlaceController::class, 'getPlaces']);
Route::post('users/{userId}/wishlist', [PlaceController::class, 'addToWishlist']);
Route::get('users/{userId}/wishlist', [PlaceController::class, 'getWishlist']);

