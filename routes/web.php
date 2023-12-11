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

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');


Route::get('/categories', function () {
    return view('categories');
})->middleware('auth')->name('categories');

Route::get('/my-cover', function () {
    return view('my-cover');
})->middleware('auth')->name('my-cover');


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [UserController::class, 'create']);

Route::post('/login', [LoginController::class, 'login']);

Route::put('/login', [LoginController::class, 'logout']);

