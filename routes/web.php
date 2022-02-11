<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return redirect()->route('post.index');
    });

    Route::get('/dashboard', function () {
        return redirect()->route('post.index');
    })->name('dashboard');

    Route::resource('post', PostController::class)->except(['update', 'edit', 'destroy']);
});


Route::prefix('auth/google')->name('google.')->group(function() {
    Route::get('/', [LoginController::class,  'redirectToGoogle'])->name('redirect');

    Route::get('callback', [LoginController::class,  'handleGoogleCallback'])->name('callback');
});
