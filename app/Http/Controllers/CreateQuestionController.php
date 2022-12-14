<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CreateQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:manage-page');
    }

    public function createMultipleChoice()
    {
        return view('question_types.create_multipleChoice');
    }

    public function createTrueFalse()
    {
        return view('question_types.create_trueFalse');
    }

    public function createReading()
    {
        return view('question_types.create_reading');
    }

    public function createListening()
    {
        return view('question_types.create_listening');
    }

    protected function validator(array $data)
    {
        Log::info('I am in validator queston below is the entry data');
        Log::debug($data);
        $validated =  Validator::make($data, [
            'type' => ['required', 'in:multi-choice,reading,listening,trueFalse'],
            'level' => ['required'],
            'instruction' => ['required', 'string', 'max:255'],
            'content' => ['required', 'unique:questions'],
            'listening' => [''],

            //answers validation
            'answer_a' => ['required'],
            'answer_b' => ['required'],
            'answer_c' => ['required'],
            'answer_d' => ['required'],
            'correct'  => ['required'],

            //categories validation
            'grammar' => ['boolean'],
            'tenses' => ['boolean'],
            'present_simple' => ['boolean'],
            'vocabulary' => ['boolean'],
            'business' => ['boolean'],
        ])->validate();

        return $validated;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //TODO: This method needs to be refactored.
    public function store(Request $request)
    {
        Log::info('I am in the store method');

        $data = $this->validator($request->all());

        if (isset($data['listening'])) {

            $path = $request->file('listening')->store('/public/listenings'); //TODO: to fix it 
            $data['listening'] = $path;

            Log::info('Adding Question to the db with listening;');

            $question = Question::create([
                'type' => $data['type'],
                'level' => $data['level'],
                'instruction' => $data['instruction'],
                'content' => $data['content'],
                'listening' => $data['listening'],
            ]);

            Answer::create([
                'question_id' => $question->id,
                'answer_a' => $data['answer_a'],
                'answer_b' => $data['answer_b'],
                'answer_c' => $data['answer_c'],
                'answer_d' => $data['answer_d'],
                'correct'  => $data['correct'],
            ]);

            Category::create([
                'question_id' => $question->id,
                'tenses' => $data['tenses'] ? 1 : 0,
                'grammar' => $data['grammar'] ? 1 : 0,
                'present_simple' => $data['present_simple'] ? 1 : 0,
                'vocabulary' => $data['vocabulary'] ? 1 : 0,
                'business' => $data['business'] ? 1 : 0,
            ]);

            Log::info('Finished adding question with Listening');

        } else {
            Log::info('Adding Question to the db wothout listening');
            Log::debug($data);

            $question = Question::create([
                Log::info("Starting adding questions"),
                'type' => $data['type'],
                'level' => $data['level'],
                'instruction' => $data['instruction'],
                'content' => $data['content'],
            ]);

            Log::debug($question);
            Answer::create([
                Log::info("Starting adding answers"),
                Log::debug($question->id),
                'question_id' => $question->id,
                'answer_a' => $data['answer_a'],
                'answer_b' => $data['answer_b'],
                'answer_c' => $data['answer_c'],
                'answer_d' => $data['answer_d'],
                'correct' => $data['correct'],
            ]);
            Log::info("Starting adding cateogires");

            Category::create([
                'question_id' => $question->id,
                'tenses' => $data['tenses'] ? 1 : 0,
                'grammar' => $data['grammar'] ? 1 : 0,
                'present_simple' => $data['present_simple'] ? 1 : 0,
                'vocabulary' => $data['vocabulary'] ? 1 : 0,
                'business' => $data['business'] ? 1 : 0,
                
            ]);

            Log::info('Finished adding question without listening');
            
        }

        session()->flash('message', 'Your question has been added!');
        return redirect(route('admin.dashboard'));
    }
}
