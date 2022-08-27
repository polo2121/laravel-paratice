<?php

use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::group(array('prefix' => '{lang}'), function () {

    Route::middleware('access_verified')->group(function () {
        // Route::resource('/message/edit', MessageController::class);
        // Route::resource('/message/create', MessageController::class);
        // Route::resource('/message/store', MessageController::class);
        // Route::resource('/message/update', MessageController::class);
        Route::resource('/message', MessageController::class);
        Route::resource('/drugs', DrugController::class);

        // Route::resource('/drugs/store', DrugController::class);


        Route::get('/index', [HomeController::class, 'index'])->name('index');
    });

    Route::middleware('user_logined')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/register', [LoginController::class, 'registration'])->name('register');
        Route::post('/checkData', [LoginController::class, 'validateRegister'])->name('checkData');
        Route::post('/checkLogin', [LoginController::class, 'authLogin'])->name('checkLogin');
    });
});
