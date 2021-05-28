<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/language/{language}', 'LangController@setLanguage');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/contact', [ContactController::class, 'sendContact']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/user-info', [AuthController::class, 'userProfile']);
    Route::get('/photo-unused', [App\Http\Controllers\PhotoController::class, 'getListPhotoUnused']);
    Route::get('/get-size-product/{slug}' , [App\Http\Controllers\ProductController::class , 'getProductSize'])->name('getProductSize');
    Route::get('/get-background-product/{slug}' , [App\Http\Controllers\ProductController::class , 'getProductBackground'])->name('getProductBackground');
});

Route::get('/get-qa', [App\Http\Controllers\QaController::class , 'getQa'])->name('getQa');
Route::get('/get-product' , [App\Http\Controllers\ProductController::class , 'getProduct'])->name('getProduct');
Route::get('/get-guide' , [App\Http\Controllers\GuideController::class , 'getGuide'])->name('getGuide');
Route::get('/get-news' , [App\Http\Controllers\NewsController::class , 'getNews'])->name('getNews');
Route::get('/get-product-name/{slug}' , [App\Http\Controllers\ProductController::class , 'getProductName'])->name('getProductName');


