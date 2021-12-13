<?php

namespace App\Http\Controllers;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Роутинг старого курса
// Route::get('/', [GoodController::class, 'index'])->name('home');
// Route::get('/good/{id}/', [GoodController::class, 'good'])->name('good');
// Route::get('/category/{id}/', [GoodController::class, 'category'])->name('category');

Route::get('/', function() {
    return view('home-view');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::post('/contact/submit', function() {
    return 'form ok';
});
