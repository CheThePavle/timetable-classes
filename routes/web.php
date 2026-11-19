<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MethodistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
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


// страницы
Route::get('/', [WebController::class, 'showIndex'])->name('index');
Route::get('/table', [WebController::class, 'showTable'])->name('table');
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::get('/login', [UserController::class, 'showLogin'])->name('login');

Route::get('/lk', [WebController::class, 'showLk'])->name('lk');
Route::get('/methodist', [MethodistController::class, 'showMethodist'])->name('methodist');
Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin');


// обработчики
Route::post('/register', [UserController::class, 'register'])->name('createUser');
Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/schedule', [MethodistController::class, 'schedule'])->name('schedule');

Route::post('/admin', [AdminController::class, 'showAdmin'])->name('admin');
Route::post('/group', [AdminController::class, 'addGroup'])->name('addGroup');
Route::post('/speciality', [AdminController::class, 'addSpeciality'])->name('addSpeciality');
Route::post('/item', [AdminController::class, 'addItem'])->name('addItem');
Route::post('/cabinet', [AdminController::class, 'addCabinet'])->name('addCabinet');

Route::post('/role', [AdminController::class, 'changeRole'])->name('changeRole');

Route::delete('/speciality', [AdminController::class, 'delSpeciality'])->name('delSpeciality');
Route::delete('/group', [AdminController::class, 'delGroup'])->name('delGroup');
Route::delete('/item', [AdminController::class, 'delItem'])->name('delItem');
Route::delete('/cabinet', [AdminController::class, 'delCabinet'])->name('delCabinet');

