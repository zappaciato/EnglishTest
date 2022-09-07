<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        Log::debug($request);
        $users = User::all();
        $questions = Question::all();
        return view('user_dashboard', compact('questions'));
    }
}
