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

require __DIR__.'/auth.php';

// Роутинг старого курса
Route::get('/', [GoodController::class, 'index'])->name('home');
Route::get('/good/{id}/', [GoodController::class, 'good'])->name('good');
Route::get('/category/{id}/', [GoodController::class, 'category'])->name('category');
Route::get('/about/', [GoodController::class, 'about'])->name('about');
Route::get('/news/', [NewsController::class, 'news'])->name('news');
Route::get('/news/{id}/', [NewsController::class, 'detail'])->name('news-detail');
Route::get('/order/buy/{id}/', [OrderController::class, 'buy'])->name('buy');
Route::get('/order/current/', [OrderController::class, 'current'])->name('order-current');
Route::get('/order/process/', [OrderController::class, 'process'])->name('order-process');
Route::get('/my-order/', [OrderController::class, 'close'])->name('order-close');

Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
    Route::get('/admin/', [AdminController::class, 'admin'])->name('admin');
    Route::get('/admin/categories/', [AdminController::class, 'categories'])->name('admin-categories');
    Route::get('/admin/goods/', [AdminController::class, 'goods'])->name('admin-goods');
    Route::get('/admin/order/', [AdminController::class, 'orderAdmin'])->name('orderAdmin');
    Route::get('/admin/emails/', [AdminController::class, 'emails'])->name('emails');

    Route::get('/admin/category/edit/{id}/', [AdminController::class, 'updateCategory'])->name('category-edit');
    Route::post('/admin/category/update/{id}/', [AdminController::class, 'updateCategorySubmit'])->name('category-update-submit');
    Route::get('/admin/category/delete/{id}/', [AdminController::class, 'deleteCategory'])->name('category-delete');
    Route::get('/admin/category/add/', [AdminController::class, 'addCategory'])->name('category-add');
    Route::post('/admin/category/add/submit/', [AdminController::class, 'addCategorySubmit'])->name('add-category-submit');

    Route::get('/admin/good/edit/{id}/', [AdminController::class, 'updateGood'])->name('good-edit');
    Route::post('/admin/good/update/{id}/', [AdminController::class, 'updateGoodSubmit'])->name('good-update-submit');
    Route::get('/admin/good/delete/{id}/', [AdminController::class, 'deleteGood'])->name('good-delete');
    Route::get('/admin/good/add/', [AdminController::class, 'addGood'])->name('good-add');
    Route::post('/admin/good/add/submit/', [AdminController::class, 'addGoodSubmit'])->name('add-good-submit');

    Route::get('/admin/emails/edit/{id}/', [AdminController::class, 'updateEmails'])->name('emails-edit');
    Route::post('/admin/emails/update/{id}/', [AdminController::class, 'updateEmailsSubmit'])->name('emails-update-submit');
    Route::get('/admin/emails/delete/{id}/', [AdminController::class, 'deleteEmails'])->name('emails-delete');
    Route::get('/admin/emails/add/', [AdminController::class, 'addEmails'])->name('emails-add');
    Route::post('/admin/emails/add/submit/', [AdminController::class, 'addEmailsSubmit'])->name('add-emails-submit');
});

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
