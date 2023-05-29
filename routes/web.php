<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;

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

Route::get('/', [HomeController::class, 'home'])->name('index');
Route::get('/movies', [HomeController::class, 'movies'])->name('movies');
Route::get('/movie-{id}', [HomeController::class, 'movieDetail']);
Route::get("search", [PostController::class, 'search']);
Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->Middleware('auth')->name('admin');
Route::get('/insertMovie', [App\Http\Controllers\HomeController::class, 'insertMovie'])->Middleware('auth')->name('insertMovie');
Route::post('/insert', [PostController::class, 'insert'])->name('insert')->Middleware('auth');
Route::get('/trash', [HomeController::class, 'trash'])->name('trash')->Middleware('auth');
Route::post('/update', [PostController::class, 'update'])->name('update')->Middleware('auth');
Route::post('/delete', [PostController::class, 'delete'])->name('delete')->Middleware('auth');
// Route::get('/adminSearch', [PostController::class, 'adminSearch'])->name('adminSearch');
Route::post('/adminDetail', [HomeController::class, 'adminDetail'])->Middleware('auth')->name('adminDetail');
Route::post('/genre-filter', [PostController::class, 'genreFilter'])->name('genreFilter');
// Route::get('/movies-filtered', [HomeController::class, 'moviesFiltered'])->name('moviesFiltered');
