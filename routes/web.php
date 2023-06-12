<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth']);

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('progress_login');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekIsAdmin']], function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');
    });
    Route::get('/editor', function () {
        return view('editor');
    })->name('editor');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});