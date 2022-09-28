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
        Log::info("I am in the construck in Admin controller.");
        $this->middleware('auth');
        $this->middleware('can:manage-page');
    }

    public function createMultipleChoice()
    {
        return view('question_types.multipleChoice');
    }

    public function createTrueFalse()
    {
        return view('question_types.trueFalse');
    }

    public function createReading()
    {
        return view('question_types.reading');
    }

    public function createListening()
    {
        return view('question_types.listening');
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

        // $validated = Arr::add($validated, 'grammar', 0);
        // $validated = Arr::add($validated, 'tenses', 0);
        // $validated = Arr::add($validated, 'present_simple', 0);
        // $validated = Arr::add($validated, 'vocabulary', 0);
        // $validated = Arr::add($validated, 'business', 0);
        Log::info('Below is validated data: ');
        Log::debug($validated);

        return $validated;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('I am in the store method');

        $data = $this->validator($request->all());
        // var_dump($data);
        // Question::create($data);

        // session()->flash('message', 'Your question has been added!'); 

        // return redirect(route('admin.admin_dashboard'));

        if (isset($data['listening'])) {
            $path = $request->file('listening')->store('/public/listenings');
            $data['listening'] = $path;
            Log::info('Adding Question to the db with listening;');

            Question::create([
                'type' => $data['type'],
                'level' => $data['level'],
                'instruction' => $data['instruction'],
                'content' => $data['content'],
                'listening' => $data['listening'],
            ]);

            Answer::create([
                'answer_a' => $data['answer_a'],
                'answer_b' => $data['answer_b'],
                'answer_c' => $data['answer_c'],
                'answer_d' => $data['answer_d'],
                'correct'  => $data['correct'],
            ]);

            Category::create([

                'tenses' => $data['tenses'] ? 1 : 0,
                'grammar' => $data['grammar'] ? 1 : 0,
                'present_simple' => $data['present_simple'] ? 1 : 0,
                'vocabulary' => $data['vocabulary'] ? 1 : 0,
                'business' => $data['business'] ? 1 : 0,

            ]);

            



            Log::info('Adding Question to the db with listening-> only categories;');

        } else {
            Log::info('Adding Question to the db');
            Log::debug($data);
            Answer::create([
                
                'answer_a' => $data['answer_a'],
                'answer_b' => $data['answer_b'],
                'answer_c' => $data['answer_c'],
                'answer_d' => $data['answer_d'],

            ]);

            Category::create([

                'tenses' => $data['tenses'] ? 1 : 0,
                'grammar' => $data['grammar'] ? 1 : 0,
                'present_simple' => $data['present_simple'] ? 1 : 0,
                'vocabulary' => $data['vocabulary'] ? 1 : 0,
                'business' => $data['business'] ? 1 : 0,
                
            ]);

            Question::create([
                'type' => $data['type'],
                'level' => $data['level'],
                'instruction' => $data['instruction'],
                'content' => $data['content'],
                'listening' => $data['listening'],



            ]);
            Log::info('Adding Question to the db-> only categories;');
            
        }

        // Log::debug($data['listening']);



        session()->flash('message', 'Your question has been added!');
        return redirect(route('admin.dashboard'));
    }
}
