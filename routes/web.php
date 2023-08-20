<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(TodoController::class)->middleware(['auth'])->group(function () {
    Route::prefix('todos')->group(function () {

        Route::get('index',  'index')->name('todos.index');
        Route::get('create', 'create')->name('todos.create');
        Route::post('store', 'store')->name('todos.store');
        Route::get('edit/{id}', 'edit')->name('todos.edit');
        Route::post('update', 'update')->name('todos.update');
        Route::get('delete/{id}', 'delete')->name('todos.delete');
        Route::get('show/{id}', 'show')->name('todos.show');
    });
});
