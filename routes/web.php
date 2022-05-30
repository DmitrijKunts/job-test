<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LuckyController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\HomeUserAccess;
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

Route::get('/', function () {
    return view('home');
})->name('home');



Route::middleware('guest')->group(
    function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'check'])->name('login.check');
    }
);
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('newusers', RegisterUserController::class)->only(['create', 'store']);

Route::middleware(HomeUserAccess::class)->group(function () {
    Route::get('/home/{user:home_page_link}', [HomeController::class, 'index'])
        ->name('home_link');
    Route::post('/home/{user:home_page_link}/regenerate', [HomeController::class, 'regenerateLink'])
        ->name('home_link_regenerate');
    Route::post('/home/{user:home_page_link}/disable', [HomeController::class, 'disableLink'])
        ->name('home_link_disable');

    Route::get('/home/{user:home_page_link}/lucky/gen', [LuckyController::class, 'gen'])
        ->name('lucky.gen');
    Route::get('/home/{user:home_page_link}/lucky/history', [LuckyController::class, 'history'])
        ->name('lucky.history');
});


Route::resource('users', UserController::class)->middleware('can:admin');
