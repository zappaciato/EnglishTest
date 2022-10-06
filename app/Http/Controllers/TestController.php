<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Result;
use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    #show a random question TODO: and filter through those which are done by this user
    public function randomQuestion()
    {
        // $userId = auth()->user()->id;
        // $question = [];
        do {
            Log::info('initializing do-while loop');
            //get random questions only ids limited to 3 per draw output array of obj [];
            $randomQuestionsIds = Question::all('id')->random(3);

            //get all questions answered by user (it can be slow..) output array of obj[];
            $allAnsweredQuestionsIds = Result::where('user_id', auth()->user()->id)->get(['question_id AS id']);
            //compare the arrays with method diff(); 

            $difference = $randomQuestionsIds->diff($allAnsweredQuestionsIds); //it lists only the difference
            //return the question which hasn't been answered

            $question = Question::findOrFail($difference->random(1));

        } while(count($difference) === 0);

        //get the question id to find matched answers and categories;
        $questionId = $question[0]->id;
        $answers = Answer::find($questionId);
        $categories = Category::find($questionId);

        //redirect to the view related to the randomly picked question;
        if ($question[0]->type === 'multi-choice') {
            return view('answer_question_types.multi_test_question', compact('question', 'answers'));
        } else if ($question[0]->type === 'trueFalse') {
            return view('answer_question_types.trueFalse_test_question', compact('question', 'answers'));
        } else if ($question[0]->type === 'listening') {
            return view('answer_question_types.listening_test_question', compact('question', 'answers'));
        } else if ($question[0]->type === 'reading') {
            return view('answer_question_types.reading_test_question', compact('question', 'answers'));
        }
    }

    public function store(Request $request)
    {
        Log::info('I am in the RESULT store method');
        //submitted answer
        $data = $request->all();
        Log::info('got all data from request');
        $userId = auth()->user()->id;
        //define success correct answer defualt false (incorrect); it is used for Results only;
        $successAnswer = 0;
        //get the question ID to retrive correct answer;
        $questionId = $data['question_id'];
        Log::info('got the questiuon ID and below are the answers');
        //Get the correct answer from db
        $answer = Answer::get()->where('id', $questionId)->first();
        Log::debug($answer);
        //get the row of Statistics for the user who is doing the test
        $statsUpdate = Statistics::find($userId);

        //check if answer is correct and update/increment the result table and the statistics table;
        if ($answer->correct == $data['user_answer']) {
            $successAnswer = 1;
            $statsUpdate->increment('general_correct');

        } else {
            $statsUpdate->increment('general_incorrect');
        };

        //add the results to the db 
        Result::create([
            'user_id' => $userId,
            'question_id' => $data['question_id'],
            'user_answer' => $data['user_answer'],
            'correct' => $successAnswer,
        ]);
        
        if ($userId === 1) {
            return redirect(route('admin.dashboard')); //change to results view later
        } else {
            return redirect(route('user.dashboard'));
        }
    }
}
