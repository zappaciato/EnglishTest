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
        //get all the data needed for dispplaying on Admin Dashboard;
        $users = User::get();
        $questions = Question::all();
        $results = Result::get();

        //get user with most correct answers
        
        $stats = Statistics::orderBy('general_correct', 'desc')->first();


        return view('admin.admin_dashboard', compact('users', 'questions', 'results', 'stats'));
    }

    public function create() {
        return view('add_question');
    }
    
}
