<?php

use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//New api routes added

Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/update',[ProductController::class,'update'])->name('product.update');
Route::get('/product/delete',[ProductController::class,'delete'])->name('product.delete');