<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReadmeController;
use App\Http\Controllers\TrendingController;


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
Route::group(['prefix' => 'v1'], function(){
    Route::get('/posts/{categ}', [HomeController::class, 'index']);
    Route::get('/detail/{series:slug}', [HomeController::class, 'show']);
    Route::get('/search/{query}', [HomeController::class, 'search']);
    Route::get('/episode/{episode:slug}', [ReadmeController::class, 'index']);
    Route::get('/trending', [TrendingController::class, 'trending']);
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{slug}', [GenreController::class, 'getSeries']);
});

