<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

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
    return view('session.login');
})->name('login')->middleware('guest');

Route::resource("/news-sources", NewsSourceController::class);
Route::resource("/news", NewsController::class);
Route::resource("/categories", CategoryController::class);
Route::resource("/user", UserController::class);
Route::resource("/login", LoginController::class);
Route::resource("/mail", MailController::class);

Route::get('/login', function () {
    return view('session.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('session.register');
})->name('register');

Route::post('/register', [UserController::class, 'create']);

Route::post('/login', [LoginController::class, 'login']);

Route::put('/logout', [LoginController::class, 'logout']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/search', [NewsController::class,'search']);

Route::get('/category', [NewsController::class,'filterCategory']);

Route::get('/labels', [NewsController::class,'filterLabels']);
