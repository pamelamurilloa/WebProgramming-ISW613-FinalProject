<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsSourceController;

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

Route::get('/news-sources', [NewsSourceController::Class, 'index'])->name('source.index');

Route::get('/news-sources/form', [NewsSourceController::Class, 'showForm'])->name('source.form');

Route::post('/news-sources', [NewsSourceController::Class, 'create'])->name('source.create');


