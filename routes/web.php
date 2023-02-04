<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwoFAController;
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
    return view('welcome');
});

Auth::routes();

Route::controller(TwoFAController::class)->group(function(){
    Route::get('two-factor-authentication', 'index')->name('2fa.index');
    Route::post('two-factor-authentication/store', 'store')->name('2fa.store');
    Route::get('two-factor-authentication/resend', 'resend')->name('2fa.resend');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

