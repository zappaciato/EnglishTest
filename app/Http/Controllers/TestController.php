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
        
        do {
            // do the loop again as long as the difference is = 0, if it isn't it stops the loop (gives false);
            //get random questions only ids limited to 3 per draw output array of obj [];
            $randomQuestionsIds = Question::all('id')->random(3);

            //get all questions answered by user (it can be slow..) output array of obj[];
            $allAnsweredQuestionsIds = Result::where('user_id', auth()->user()->id)->get(['question_id AS id']);

            //compare the arrays with method diff() //it lists only the difference; 
            $difference = $randomQuestionsIds->diff($allAnsweredQuestionsIds); 

            //if all answered are equal to question number in the db stop the do while loop
            if (count($allAnsweredQuestionsIds) === count(Question::all())) break;
            
        } while (count($difference) == 0);

        //get the random Id from the $difference in the do statement // do it only when user has not answered all the questions;
        if(count($allAnsweredQuestionsIds) !== count(Question::all())) {
            $randomQuestionId = $difference->random(1)[0]->id;
        } else {
            $randomQuestionId = null;
        }

            return $randomQuestionId;
    }

    protected function getAnswers($questionId) {
            $answers = Answer::where('question_id', $questionId)->first();
            return $answers;
        }

    protected function getCategories($questionId) {
        //get only those categories which are true (1)
        $categories = Category::where('question_id', $questionId)->get(['grammar', 'tenses', 'present_simple', 'vocabulary', 'business'])->toArray()[0];
        $activeCategories = array_filter($categories); //returns only those categories with value 1; 

            return $activeCategories;
        }

    public function displayQuestion()
        {
            //check if there are any questions in the database;
            if (Question::first() !== null) { 

                $questionId = $this->getRandomQuestionId();
            //onlly with questionId !== null get full question data with answers and categories based on valid QuestionId;
                if($questionId !== null) {

                    $question = Question::where('id', $questionId)->first();
                    $answers = $this->getAnswers($questionId);

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

            } else {
                    if (auth()->user()->id === 1) {
                        return redirect()->route('admin.dashboard')->with('warningMessage', 'There are no questions left in the database.');
                    } else {
                        return redirect()->route('user.dashboard')->with('warningMessage', 'There are no questions left in the database.');
                    }
                }
            } 
        }

    public function store(Request $request)
        {
            Log::info('I am in the store method');
            //get the tested user answer with the user id
            $data = $request->all();
            $userId = auth()->user()->id;

            //define success correct answer:: defualt false (incorrect); it is used for Results only;
            $successAnswer = 0;
            //get the question ID to retrive correct answer provided from hidden input in the form;
            $questionId = $data['question_id'];

            //get active categories for this quesiton for Statistics. Only categories with value true (1);
            $activeCategories = array_keys($this->getCategories($questionId)); //tu mamy aktywne kateogrie z wartoscia 1 w formie tablicy;
                        
            $questionLevel = Question::where('id', $questionId)->get('level')[0]->level;

            // get answers fro the given questionID; i do this twice in displayquestion and here in the store method
            $answers = $this->getAnswers($questionId);

            //get the row of Statistics table for the user who is doing the test
            $statsUpdate = Statistics::find($userId);

            //check if answer is correct and update/increment the result table and the statistics table;
                if ($answers->correct == $data['user_answer']) {

                    $successAnswer = 1;
                    $statsUpdate->increment('general_correct');

                // update stats table accordingly
                foreach ($activeCategories as $cat) {
                    $statsUpdate->increment('cat_' . $cat . '_correct');
                }

                } else {

                    $statsUpdate->increment('general_incorrect');

                foreach ($activeCategories as $cat) {
                    $statsUpdate->increment('cat_' . $cat . '_incorrect');
                }
            };

            //add the results to the db 
            Result::create([
                'user_id' => $userId,
                'question_id' => $data['question_id'],
                'user_answer' => $data['user_answer'],
                'correct' => $successAnswer,
                'level' => $questionLevel,
            ]);

        // if ($userId == 1) {
        //     return redirect(route('test.question')); //change to results view later
        // } else {
        //     return redirect(route('test.question'));
        // }
        return redirect(route('test.question'));
        
        }
}
