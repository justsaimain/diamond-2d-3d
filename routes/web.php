<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [LoginController::class, 'showLoginForm']);
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');


Route::middleware(['auth:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class)->only(['index', 'show', 'store', 'destroy', 'update']);
    Route::get('users/datatable/ssd', [UserController::class, 'ssd']);
});


Route::get('/test', function () {
    $words = preg_split('//', 'abcdefghijklmnopqrstuvwxyz0123456789', -1);
    shuffle($words);
    $code = '';
    foreach ($words as $word) {
        if (strlen($code) < 5) {
            $code .= $word;
        }
    }
    return $code;
});
