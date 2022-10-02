<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    #show all questions and categories zipped into one array of objects...
    public function index()
    {
        $user = auth()->user();
        $questions =  Question::get();
        $questions->toArray();
        $categories =  Category::get();
        $questionData = $questions->zip($categories);

        return view('question_list', compact('questionData'));
    }


    #show a random question and filter through those which are done by this user
    public function randomQuestion()
    {   $user = auth()->user();
        $question = Question::inRandomOrder()->firstOrFail();
        $id = $question->id;
        Log::debug($question);

        $answers = Answer::find($id = $question->id);
        Log::debug($answers);
        $categories = Category::find($id = $question->id);
        Log::debug($categories);
        $results = Result::find($id === 1);
        Log::debug($results);
        return view('test_question', compact('question', 'answers'));
    }

    // public function edit ($id)  {
    //         //szukamy posta z danym id
    //         $question = Question::findOrFail($id);
            
    //         return view('admin.post.edit', compact('post'));
    //     }

    public function result()
    {
        //
    }
}
