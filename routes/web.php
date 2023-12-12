<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use \App\Http\Middleware\IsAdmin;

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

Route::get('/', function (Request $request) {
    
    $user = Auth::user();
    if ( isset($user) ) {
        $role = $user->role_id;

        if ($role === 1) {
            return redirect()->intended('/categories');

        } else if ($role === 2) {
            return redirect()->intended('/news');
        }
    }
    return redirect()->intended('/login');

    }
);

Route::resource("/news-sources", NewsSourceController::class, ['middleware' => ['auth', 'user']]);
Route::resource("/news", NewsController::class, ['middleware' => ['auth', 'user']]);
Route::resource("/categories", CategoryController::class, ['middleware' => ['auth', 'admin']]);
Route::resource("/user", UserController::class);
Route::resource("/login", LoginController::class);
Route::resource("/mail", MailController::class);

Route::get('/login', function () {
    return view('session.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('session.register');
})->name('register');

Route::get('/guest/{username}', [NewsController::class, 'guestPage']);

Route::post('/register', [UserController::class, 'create']);

Route::post('/login', [LoginController::class, 'login']);
Route::put('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/search', [NewsController::class,'search'])->middleware('auth');
Route::get('/category', [NewsController::class,'filterCategory'])->middleware('auth');
Route::get('/labels', [NewsController::class,'filterLabels'])->middleware('auth');

Route::post('/publish', [UserController::class,'changeAccess'])->middleware('auth');
