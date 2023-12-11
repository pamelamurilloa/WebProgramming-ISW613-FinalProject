<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


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
});

Route::resource("/news-sources", NewsSourceController::class);
Route::resource("/category", CategoryController::class);
Route::resource("/user", UserController::class);
Route::resource("/login", LoginController::class);


Route::get('/login', function () {
    return view('session.login');
})->name('login')->middleware('guest');

Route::get('/categories', function () {
    return view('categories.index');
})->middleware('auth')->name('categories');

Route::get('/my-cover', function () {
    return view('my-cover.index');
})->middleware('auth')->name('my-cover');

Route::get('/register', function () {
    return view('session.register');
})->name('register');

Route::get('/news-sources', function () {
    return view('news-sources.index');
})->middleware('auth')->name('news-sources');

Route::post('/register', [UserController::class, 'create']);

Route::post('/login', [LoginController::class, 'login']);

Route::put('/login', [LoginController::class, 'logout']);

Route::get('/logout', [LoginController::class, 'logout']);

