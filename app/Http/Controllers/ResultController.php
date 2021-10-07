<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        if (session('user_role')=='admin'){
            return view('user.result-page')->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
                ->join('users','results.user_id','=','users.id')
                ->get());
        }
        return view('user.result-page')->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
            ->where('user_id',session('user_id'))->get());
    }
}
