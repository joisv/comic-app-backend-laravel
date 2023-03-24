<?php

use App\Http\Controllers\BulkdeleteController;
use App\Models\Series;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReadmeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\SettinguserController;
use App\Http\Controllers\DashboardepsController;
use App\Http\Controllers\DashboardgenreController;
use App\Http\Controllers\DashboardseriesController;
use App\Http\Controllers\DashboardepisodeController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home
// Route::get('/', [HomeController::class, 'index'])->name('login');
// Route::get('/manga/{series:slug}', [HomeController::class, 'show']);
// Route::get('/search/series', [HomeController::class, 'search']);
// Route::get('/episode/{episode:slug}', [ReadmeController::class, 'index']);
// Route::get('/trending', [TrendingController::class, 'trending']);
// Route::get('/favourite', [TrendingController::class, 'favourite']);
// Route::get('/genre', [GenreController::class, 'index']);
// Route::get('/genre/{slug}', [GenreController::class, 'getSeries']);

// Dashboard
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardsController::class, 'index'])->middleware('auth');
Route::get('/dashboard/settings', [SettinguserController::class, 'index'])->middleware('auth');
Route::put('/dashboard/settings/{user:name}', [SettinguserController::class, 'update'])->middleware('auth');
Route::get('/dashboard/series/checkSlug' ,[DashboardseriesController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/series', DashboardseriesController::class)->middleware('auth');
Route::get('/dashboard/user', [RegisterController::class, 'index'])->middleware('auth');
Route::post('/dashboard/user', [RegisterController::class, 'store'])->middleware('auth');
Route::resource('/dashboard/episode', DashboardepisodeController::class)->middleware('auth');
Route::resource('dashboard/genre', DashboardgenreController::class)->middleware('auth');
Route::get('/dashboard/episode/create/{series:id}',[DashboardepsController::class,'show']);
Route::post('/dashboard/episode/create/',[DashboardepsController::class,'store']);
Route::get('/search', [DashboardseriesController::class, 'search']);
Route::get('/search/episode', [DashboardepisodeController::class, 'search']);
Route::get('/search/genre', [DashboardgenreController::class, 'search']);
Route::delete('/dashboard/series/bulk-delete', [BulkdeleteController::class, 'delete']);