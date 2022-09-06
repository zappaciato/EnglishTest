<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $questions = Question::all();
        // Log::debug($questions);
        // return view('admin.admin_dashboard')->with('questions', 'users');
        return view('admin.admin_dashboard', compact('questions', 'users'));
    }
}
