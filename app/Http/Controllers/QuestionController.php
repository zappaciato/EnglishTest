<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    
    // Log::debug("I am in Question Controller.");
    #show all questions
    public function index() {

        $allquestions = Question::all();
        // $questions = Question::all();
        
        // $questions = Question::inRandomOrder()->first(); //draws a random question from the db
        if($allquestions->id === 2) {
            $questions = $allquestions->inRandomOrder()->first();
        }
        return view('test_question', compact('questions'));
    }
    #show a random question and filter through those which are done by this user
    public function randomQuestion() {
        $allquestions = Question::all();
    }
}
