<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Request;

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
Route::get('/', [GoodController::class, 'index'])->name('home');
Route::get('/good/{id}/', [GoodController::class, 'good'])->name('good');
Route::get('/category/{id}/', [GoodController::class, 'category'])->name('category');


// Роуты второго курса
// Route::get('/', function() {
//     return view('home-view');
// })->name('home');

// Route::get('/about/', function() {
//     return view('about');
// })->name('about');

// Route::get('/contact/', function() {
//     return view('contact');
// })->name('contact');

// Route::get('/contact/all/{id}/', [ContactController::class, 'showOneMessage'])->name('contact-data-one');
// Route::get('/contact/all/{id}/update/', [ContactController::class, 'updateMessage'])->name('contact-update');
// Route::get('/contact/all/{id}/delete/', [ContactController::class, 'deleteMessage'])->name('contact-delete');
// Route::get('/contact/all/', [ContactController::class, 'allData'])->name('contact-all');
// Route::post('/contact/all/{id}/update/', [ContactController::class, 'updateMessageSubmit'])->name('contact-update-submit');
// Route::post('/contact/submit/', [ContactController::class, 'submit'])->name('contact-form');
