<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs',[BlogController::class,'index'])->name('blogs.index');
Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
Route::post('/blogs',[BlogController::class,'store'])->name('blogs.store');
Route::get('/blogs/{blog}',[BlogController::class,'show'])->name('blogs.show');
Route::get('/blogs/{blog}/edit',[BlogController::class,'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}',[BlogController::class,'update'])->name('blogs.update');
Route::delete('/blogs/{blog}',[BlogController::class,'destroy'])->name('blogs.destroy');
