<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return view('home');
});

Route::get('/inscribete', function () {
    return view('inscribete');
});

Route::get('/about', function () {
    return view('nosotros');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//


    Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('enrollments', 'livewire.enrollments.index')->middleware('auth');
	Route::view('bookings', 'livewire.bookings.index')->middleware('auth');
	Route::view('teachers', 'livewire.teachers.index')->middleware('auth');
	Route::view('packages', 'livewire.packages.index')->middleware('auth');
	Route::view('clients', 'livewire.clients.index')->middleware('auth');

	

