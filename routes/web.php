<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(
    [
        'prefix' => '/dashboard',
        'middleware' => ['IsAdmin'],
        'as' => 'dashboard.',
    ],
    function () {
        Route::resource('/tasks', TasksController::class);
        Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload');
    }
);
