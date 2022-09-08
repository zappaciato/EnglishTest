<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
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
        Log::info('I am in validator queston');
        return Validator::make($data, [
            'type' => ['required', 'in:multi-choice,reading,listening,trueFalse'],
            'instruction' => ['required', 'string', 'max:255'],
            'content' => ['required', 'unique:questions'],
            'listening' => ['string'],
            'answer_a' => ['string'],
            'answer_b' => ['string'],
            'answer_c' => ['string'],
            'answer_d' => ['string'],
            'correct' => ['required', 'alpha'],

            'grammar' => ['boolean'],
            'tenses' => ['boolean'],
            'present_simple' => ['boolean'],
            'vocabulary' => ['boolean'],
            'business' => ['boolean'],
        ])->validate();
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

        Question::create([
            'instruction' => $data['instruction'],
            'content' => $data['content'],
            'answer_a' => $data['answer_a'],
            'answer_b' => $data['answer_b'],
            'answer_c' => $data['answer_c'],
            'answer_d' => $data['answer_d'],
            'correct' => $data['correct'],
            // 'tenses' => $data['tenses'],
            // 'vocabulary' => $data['vocabulary'],
        ]);
        session()->flash('message', 'Your question has been added!');
        return redirect(route('admin.dashboard'));
    }


    // /**
    //  * The question has been added.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  mixed  $user
    //  * @return mixed
    //  */
    // protected function registered(Request $request)
    // {
    //     Log::info($request);
    //     session()->flash('message', 'Your question has been added!');
    // }
}
