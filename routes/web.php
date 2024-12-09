<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPost;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(\App\Http\Middleware\AdminMiddleware::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->controller(AdminPost::class)
    ->group(function () {
        Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
        Route::get('/admin/posts', 'index')->name('admin.post.index');
        Route::get('/admin/post/create', 'create')->name('admin.post.create');
        Route::post('/admin/posts', 'store')->name('admin.post.store');
        Route::get('/admin/post/edit/{id}', 'edit')->name('admin.post.edit');
        Route::patch('/admin/post/edit/{id}', 'update')->name('admin.post.update');
        Route::delete('/admin/post/{id}', 'destroy')->name('admin.post.destroy');
    });

Route::middleware(AdminMiddleware::class)->controller(AdminUserController::class)->group(function () {
   Route::get('/admin/users', 'index')->name('admin.user.index');
   Route::get('/admin/user/create', 'create')->name('admin.user.create');
   Route::post('/admin/users', 'store')->name('admin.user.store');
   Route::get('/admin/user/edit/{id}', 'edit')->name('admin.user.edit');
   Route::patch('/admin/user/{id}', 'update')->name('admin.user.update');
   Route::delete('/admin/user/{id}', 'destroy')->name('admin.user.destroy');
});
