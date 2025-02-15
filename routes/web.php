<?php

use App\Http\Controllers\SessionController;
use App\Http\Middleware\RateLimitWhileSessionActive;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SessionController::class, 'storeSession']);

Route::post('/clear-session', [SessionController::class, 'clearSession'])->name('clear.session');




