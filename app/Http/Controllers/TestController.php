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
use Ramsey\Uuid\Type\Integer;

class TestController extends Controller
{

    protected function getRandomQuestionId() {

        Log::info("I am in GETrANDOMquestion");
        do {
            Log::info('initializing do-while loop');
            //get random questions only ids limited to 10 per draw output array of obj [];
            $randomQuestionsIds = Question::all('id')->random(10);

            //get all questions answered by user (it can be slow..) output array of obj[];
            $allAnsweredQuestionsIds = Result::where('user_id', auth()->user()->id)->get(['question_id AS id']);
            //compare the arrays with method diff(); 

            $difference = $randomQuestionsIds->diff($allAnsweredQuestionsIds); //it lists only the difference
            $randomQuestionId = $difference->random(1)[0]->id;
            //return the question which hasn't been answered

        } while (count($difference) === 0);

            return $randomQuestionId;
        }

    protected function getAnswers($questionId) {
            $answers = Answer::where('question_id', $questionId)->first();
            return $answers;
        }

    protected function getCategories($questionId) {
            $categories = Category::find($questionId);
            return $categories;
        }

    public function displayQuestion()
        {
            $questionId = $this->getRandomQuestionId();
            //get full question data with answers and categories based on QuestionId;

            $question = Question::where('id', $questionId)->first();
            $answers = $this->getAnswers($questionId);
            $categories = $this->getCategories($questionId);

            //return correct views
            if ($question->type === 'multi-choice') {
                return view('answer_question_types.multi_test_question', compact('question', 'answers'));
            } else if ($question->type === 'trueFalse') {
                return view('answer_question_types.trueFalse_test_question', compact('question', 'answers'));
            } else if ($question->type === 'listening') {
                return view('answer_question_types.listening_test_question', compact('question', 'answers'));
            } else if ($question->type === 'reading') {
                return view('answer_question_types.reading_test_question', compact('question', 'answers'));
            }
        }

    public function store(Request $request)
        {
            $data = $request->all();
            $userId = auth()->user()->id;
            //define success correct answer defualt false (incorrect); it is used for Results only;
            $successAnswer = 0;
            //get the question ID to retrive correct answer;
            $questionId = $data['question_id'];
            $questionLevel = Question::where('id', $questionId)->get('level')[0]->level;
            $answer = Answer::get()->where('id', $questionId)->first();
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
                'level' => $questionLevel,
            ]);
            
            if ($userId === 1) {
                return redirect(route('admin.dashboard')); //change to results view later
            } else {
                return redirect(route('user.dashboard'));
            }
        }
}
