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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user-dashboard', function () {
    return view('User_dashboard');
})->name('user.dashboard');

Route::get('/add-question', function () {
    return view('add_question');
})->name('add.question');

Route::get('/admin-dashboard', function(){
    return view('admin.Admin_dashboard');
})->name('admin.dashboard');

Route::get('/answer-questions', function() {
    return view('welcome');
})->name('answer.questions');