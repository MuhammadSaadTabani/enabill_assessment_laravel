<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::prefix('user')->group(function(){
    Route::get('/home', function(){
        return view('user.home');
    });
    Route::get('/query', function(){
        return view('user.query');
    });
    Route::post('/query', [UserController::class, 'query']);
    
    Route::get('/subscription', function(){
        return view('user.subscription');
    });
});

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });
});


