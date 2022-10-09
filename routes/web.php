<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CreateQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
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

Route::get('/test-question', [TestController::class, 'displayQuestion'])->name('test.question');
Route::post('/test-question', [TestController::class, 'store']);


Route::get('/question-list', [QuestionController::class, 'index'])->name('questions.list');

//question edit
// Route::get('/test-question/{id}', [QuestionController::class, 'edit'])->name('admin.post.edit');
// Route::put('/test-question/{id}', [QuestionController::class, 'update']);


//question delete
// Route::delete('/test-question/{id}', [QuestionController::class, 'destroy'])->name('admin.post.delete');


Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/add-question', [AdminController::class, 'create'])->name('add.question');
Route::get('/add-multi-question', [CreateQuestionController::class, 'createMultipleChoice'])->name('create.question.multi');
Route::get('/add-truefalse-question', [CreateQuestionController::class, 'createTrueFalse'])->name('create.question.truefalse');
Route::get('/add-reading-question', [CreateQuestionController::class, 'createReading'])->name('create.question.reading');
Route::get('/add-listening-question', [CreateQuestionController::class, 'createListening'])->name('create.question.listening');

Route::post('/add-multi-question', [CreateQuestionController::class, 'store']);
Route::post('/add-truefalse-question', [CreateQuestionController::class, 'store']);
Route::post('/add-reading-question', [CreateQuestionController::class, 'store']);
Route::post('/add-listening-question', [CreateQuestionController::class, 'store']);

