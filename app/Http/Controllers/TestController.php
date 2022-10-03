<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    protected $questionId;
    #show a random question and filter through those which are done by this user
    public function randomQuestion()
    {
        $user = auth()->user();
        $question = Question::inRandomOrder()->firstOrFail();
        $questionId = $question->id;
        $this->questionId = $questionId;
        Log::info('I am in random question in Test Controller');
        Log::debug($this->questionId);

        $answers = Answer::find($this->questionId);
        // Log::debug($answers);
        $categories = Category::find($this->questionId);
        // Log::debug($categories);

        
        // session()->set('questionId', $questionId);

        // $results = Result::find($id === 1);
        // Log::debug($results);

        if($question->type === 'multi-choice') {
            return view('answer_question_types.multi_test_question', compact('question', 'answers'));
        } 
        else if ($question->type === 'trueFalse') {
            return view('answer_question_types.trueFalse_test_question', compact('question', 'answers'));
        } 
        else if ($question->type === 'listening') {
            return view('answer_question_types.listening_test_question', compact('question', 'answers'));
        } 
        else if ($question->type === 'reading') {
            return view('answer_question_types.reading_test_question', compact('question', 'answers'));
        }
    }



    public function store(Request $request)
    {   
        $userId = auth()->user()->id;

        Log::info('I am in the RESULT store method');
        // $questionId = $this->questionId;
        
        // $data = $this->validator($request->all());
        $data = $request->all();
        Log::debug($data);

        Result::create([
            'user_id' => $userId,
            'question_id' => '666',
            'user_answer' => $data['user_answer'],
        ]);

        if($userId === 1) {
            return redirect(route('admin.dashboard')); //change to results veiw later
        } else {
            return redirect(route('user.dashboard'));
        }
        
    }
}
