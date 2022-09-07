<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        Log::info("I am in the construck in Admin controller.");
        $this->middleware('auth');
        $this->middleware('can:manage-page');
    }

    public function index()
    {
        $users = User::all();
        $questions = Question::all();
        // Log::debug($questions);
        // return view('admin.admin_dashboard')->with('questions', 'users');
        return view('admin.admin_dashboard', compact('questions', 'users'));
    }

    public function create()
    {
        return view('add_question');
    }

    protected function validator(array $data)
    {
        Log::info('I am in validator queston');
        return Validator::make($data, [
            'instruction' => ['required', 'string', 'max:255'],
            'content' => ['required', 'unique:questions'],
            'answer_a' => ['required'],
            'answer_b' => ['required'],
            'answer_c' => ['required'],
            'answer_d' => ['required'],
            'correct' => ['required', 'alpha'],
            // 'tenses' => ['true'],
            // 'vocabulary' => ['false']
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
