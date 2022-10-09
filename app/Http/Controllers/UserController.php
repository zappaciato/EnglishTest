<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\Statistics;
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

        if($correctRatio < 10) {
            return 'A1';
        } elseif( $correctRatio >20 && $correctRatio <= 40) {
            return 'A2';
        } elseif($correctRatio >= 41 && $correctRatio <= 69) {
            return 'B1';
        } elseif ($correctRatio >= 70 && $correctRatio <= 80) {
            return 'B2';
        } elseif ($correctRatio > 90) {
            return 'C1';
        }

    } else {
        return 'no questions answered yet!';
    }
    }

    protected function calculateStats($userId) {

            $allStats = Statistics::where('user_id', $userId)->first();

            //calculate tenses category
            $tensesRatio = ($allStats->cat_tenses_correct / ($allStats->cat_tenses_correct + $allStats->cat_tenses_incorrect))* 100;
            //calculate grammar category
            $grammarRatio = ($allStats->cat_grammar_correct / ($allStats->cat_grammar_correct + $allStats->cat_grammar_incorrect)) * 100;
            //calculate present Simple category
            $present_simpleRatio = ($allStats->cat_present_simple_correct / ($allStats->cat_present_simple_correct + $allStats->cat_present_simple_incorrect)) * 100;
            //caluclate vocabulary category
            $vocabularyRatio = ($allStats->cat_vocabulary_correct / ($allStats->cat_vocabulary_correct + $allStats->cat_vocabulary_incorrect)) * 100;
            //calculate vocabulary Business
            $vocabulary_businessRatio = ($allStats->cat_business_correct / ($allStats->cat_business_correct + $allStats->cat_business_incorrect)) * 100;
            
            $allCategoriesResults = ['Tenses' => $tensesRatio, 'Grammar' => $grammarRatio, 'Present Simple' => $present_simpleRatio, 'Vocabulary' => $vocabularyRatio, 'Business' => $vocabulary_businessRatio];

            return  $allCategoriesResults;


    }

    public function index(Request $request)
    {
        Log::debug($request);
        $userId = auth()->user()->id;
        $questions = Question::all();
        $resultsAll = Result::get()->where('user_id', $userId);
        $resultsCorrect = $resultsAll->where('correct', '=', 1);
        $englishLevel = $this->calculateGeneralResults($resultsAll, $resultsCorrect);
        $allCategoriesResults = $this->calculateStats($userId);
        Log::debug($allCategoriesResults);
        return view('user_dashboard', compact('questions', 'resultsAll', 'resultsCorrect', 'englishLevel', 'allCategoriesResults'));
    }
}
