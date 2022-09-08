<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CreateQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
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

Route::get('/user-dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/test-question', [QuestionController::class, 'randomQuestion'])->name('test.question');

Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/add-question', [AdminController::class, 'create'])->name('add.question');
Route::get('/add-multi-question', [CreateQuestionController::class, 'createMultipleChoice'])->name('question.multi');
Route::get('/add-truefalse-question', [CreateQuestionController::class, 'createTrueFalse'])->name('question.truefalse');
Route::get('/add-reading-question', [CreateQuestionController::class, 'createReading'])->name('question.reading');
Route::get('/add-listening-question', [CreateQuestionController::class, 'createListening'])->name('question.listening');

Route::post('/add-multi-question', [CreateQuestionController::class, 'store']);
Route::post('/add-truefalse-question', [CreateQuestionController::class, 'store']);
Route::post('/add-reading-question', [CreateQuestionController::class, 'store']);
Route::post('/add-listening-question', [CreateQuestionController::class, 'store']);

// Route::get('/admin/question/{id}', [AdminController::class, 'edit'])->name('admin.post.edit');
// Route::put('/admin/question/{id}', [AdminController::class, 'update']);
