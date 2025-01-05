<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPost;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CuratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController as TeacherControllerAlias;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware(\App\Http\Middleware\AdminMiddleware::class);

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => auth()->user()]);
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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(AdminMiddleware::class)->controller(\App\Http\Controllers\StudentGroupController::class)->group(function () {
    Route::get('/admin/student-groups', 'index')->name('admin.student-group.index');
    Route::get('/admin/student-group/create', 'create')->name('admin.student-group.create');
    Route::post('/admin/student-groups', 'store')->name('admin.student-group.store');
    Route::get('/admin/student-group/edit/{id}', 'edit')->name('admin.student-group.edit');
    Route::patch('/admin/student-group/{id}', 'update')->name('admin.student-group.update');
    Route::delete('/admin/student-group/{id}', 'destroy')->name('admin.student-group.destroy');
});

Route::middleware(AdminMiddleware::class)->controller(CuratorController::class)->group(function () {
   Route::get('/admin/curators', 'index')->name('admin.curator.index');
   Route::get('/admin/curator/create', 'create')->name('admin.curator.create');
   Route::post('/admin/curators', 'store')->name('admin.curator.store');
   Route::get('/admin/curator/edit/{curator}', 'edit')->name('admin.curator.edit');
   Route::patch('/admin/curator/{curator}', 'update')->name('admin.curator.update');
   Route::delete('/admin/curator/{curator}', 'destroy')->name('admin.curator.destroy');
});

Route::middleware(AdminMiddleware::class)->controller(TeacherControllerAlias::class)->group(function () {
    Route::get('/admin/teachers', 'index')->name('admin.teacher.index');
    Route::get('/admin/teacher/create', 'create')->name('admin.teacher.create');
    Route::post('/admin/teachers', 'store')->name('admin.teacher.store');
    Route::get('/admin/teacher/edit/{teacher}', 'edit')->name('admin.teacher.edit');
    Route::patch('/admin/teacher/{teacher}', 'update')->name('admin.teacher.update');
    Route::delete('/admin/teacher/{teacher}', 'destroy')->name('admin.teacher.destroy');
});

Route::middleware(AdminMiddleware::class)->controller(SubjectController::class)->group(function () {
   Route::get('/admin/subjects', 'index')->name('admin.subject.index');
   Route::get('/admin/subject/create', 'create')->name('admin.subject.create');
   Route::post('/admin/subjects', 'store')->name('admin.subject.store');
   Route::get('/admin/subject/edit/{subject}', 'edit')->name('admin.subject.edit');
   Route::patch('/admin/subject/{subject}', 'update')->name('admin.subject.update');
   Route::delete('/admin/subject/{subject}', 'destroy')->name('admin.subject.destroy');
});

Route::middleware(AdminMiddleware::class)->controller(ScheduleController::class)->group(function () {
    Route::get('/admin/schedules', 'index')->name('admin.schedule.index');
    Route::get('/admin/schedule/create', 'create')->name('admin.schedule.create');
    Route::post('/admin/schedules', 'store')->name('admin.schedule.store');
    Route::get('/admin/schedule/edit/{schedule}', 'edit')->name('admin.schedule.edit');
    Route::patch('/admin/schedule/{schedule}', 'update')->name('admin.schedule.update');
    Route::delete('/admin/schedule/{schedule}', 'destroy')->name('admin.schedule.destroy');
    Route::post('/admin/schedule', 'selectSchedule')->name('admin.schedule.select');
});

Route::middleware(AdminMiddleware::class)->controller(\App\Http\Controllers\ClassroomController::class)->group(function () {
   Route::get('/admin/classrooms', 'index')->name('admin.classroom.index');
   Route::get('/admin/classroom/create', 'create')->name('admin.classroom.create');
   Route::post('/admin/classrooms', 'store')->name('admin.classroom.store');
   Route::get('/admin/classroom/edit/{classroom}', 'edit')->name('admin.classroom.edit');
   Route::patch('/admin/classroom/{classroom}', 'update')->name('admin.classroom.update');
   Route::delete('/admin/classroom/{classroom}', 'destroy')->name('admin.classroom.destroy');
});
