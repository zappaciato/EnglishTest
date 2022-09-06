<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    #show all questions
    public function index()
    {
        //
    }

    #show a random question and filter through those which are done by this user
    public function randomQuestion()
    {
        $question = Question::inRandomOrder()->first();
        Log::debug('I am in Question Controller->randomquestion.');
        return view('test_question', compact('question'));
    }
}
