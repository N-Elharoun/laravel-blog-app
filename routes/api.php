<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login', [api\AuthController::class, 'login']);
    Route::post('/register', [api\AuthController::class, 'register']);
    Route::post('/logout', [api\AuthController::class, 'logout']);
    Route::post('/refresh', [api\AuthController::class, 'refresh']);
    Route::get('/user_profile', [api\AuthController::class, 'userProfile']);
}); 

Route::group([
    'middleware'=>['api', 'check.user.access']
], function(){

Route::get('blog',[api\BlogController::class,'index']);
Route::get('/blog/{blog}',[api\BlogController::class,'show']);
Route::post('/blog',[api\BlogController::class,'store']);
Route::put('/blog/{blog}',[api\BlogController::class,'update']);
Route::delete('/blog/{blog}',[api\BlogController::class,'destroy']);

});
