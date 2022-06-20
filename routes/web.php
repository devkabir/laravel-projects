<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/users-datatable', [App\Http\Controllers\HomeController::class, 'users_datatable'])->name('users.datatable');
Route::get('/tasks', [App\Http\Controllers\HomeController::class, 'tasks'])->name('tasks');
Route::get('/tasks-datatable', [App\Http\Controllers\HomeController::class, 'tasks_datatable'])->name('tasks.datatable');
