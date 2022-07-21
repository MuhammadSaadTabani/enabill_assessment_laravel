<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::controller(UserController::class)
    ->prefix('user')
    ->group(function(){
        Route::get('/home', 'home');
        Route::get('/query', 'query');
        Route::post('/query', 'postQuery');
        Route::get('/subscription', 'subscription');
        
        Route::get('/logout', [UserController::class, 'logout']);
});

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });
    


    Route::get('/logout', [AdminController::class, 'logout']);
});


