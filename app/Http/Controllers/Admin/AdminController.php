<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Result;
use App\Models\Statistics;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        Log::info('I am in index Admin Controller. ');
        $users = User::all();
        $questions = Question::all();
        $results = Result::get();
        // Log::debug($results);

        //Array of leaders in correctly answered questions
        // $numberOfUsers = Result::distinct()->count('user_id'); //to nam daje liczbe odrebnych id czyli ilośc userów; 
        // for($i=0; $i<$numberOfUsers; $i++) {
        //     $resultsPerUser = Result::where('user_id', $i+1)->get();
        //     $numberCorrectAnswers = count($resultsPerUser->where('correct', '=', 1));
        //     $rankingArr[$i+1] = $numberCorrectAnswers;
        // }
        // print_r($rankingArr);
        
        //get user with most correct answers

        $stats = Statistics::orderBy('general_correct', 'desc')->first();

        //get the username
        $userName = $users->find($stats->id);

        return view('admin.admin_dashboard', compact('users', 'questions', 'results', 'stats', 'userName'));
    }

    public function create() {
        return view('add_question');
    }
}
