<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calculateGeneralResults($resultsAll, $resultsCorrect) {
        if(count($resultsAll) >0) {
        $correctRatio = (count($resultsCorrect) / count($resultsAll)) * 100;
        if($correctRatio < 25) {
            return 'A1';
        } elseif( $correctRatio >25 && $correctRatio < 40) {
            return 'A2';
        } elseif($correctRatio > 40 && $correctRatio < 60) {
            return 'B1';
        } elseif ($correctRatio > 60 && $correctRatio < 80) {
            return 'B2';
        } elseif ($correctRatio > 80) {
            return 'C1';
        }
    } else {
        return 'no questions answered';
    }
    }

    public function index(Request $request)
    {
        Log::debug($request);
        $userId = auth()->user()->id;;
        $questions = Question::all();
        $resultsAll = Result::get()->where('user_id', $userId);
        $resultsCorrect = $resultsAll->where('correct', '=', 1);
        $englishLevel = $this->calculateGeneralResults($resultsAll, $resultsCorrect);
        // $correctRatio = (count($resultsCorrect) / count($resultsAll))*100;


        
        return view('user_dashboard', compact('questions', 'resultsAll', 'resultsCorrect', 'englishLevel'));
    }
}
