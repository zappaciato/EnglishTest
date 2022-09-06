<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user-dashboard', function () { return view('User_dashboard');})->name('user.dashboard');
Route::get('/test-question', [QuestionController::class, 'randomQuestion'])->name('test.question');

Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/add-question', [AdminController::class, 'create'])->name('add.question');
Route::post('/add-question', [AdminController::class, 'store']);

// Route::get('/admin/question/{id}', [AdminController::class, 'edit'])->name('admin.post.edit');
// Route::put('/admin/question/{id}', [AdminController::class, 'update']);