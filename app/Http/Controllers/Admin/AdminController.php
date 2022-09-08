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
        return view('admin.admin_dashboard', compact('users', 'questions'));
    }

    public function create() {
        return view('add_question');
    }
}
