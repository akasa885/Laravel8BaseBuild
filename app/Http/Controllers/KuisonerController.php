<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizSession;

class KuisonerController extends Controller
{
    public function fill(Request $request, $token)
    {
        $quizSession = QuizSession::where('token', $token)->openQuiz()->firstOrFail();
        $quizSession->load('quiz', 'quiz.questions');
        $quiz = $quizSession->quiz;

        return view('pages.quiz-page', 
        [
            'title' => 'Quiz - ' . $quizSession->quiz->title,
        ],
        compact('quizSession', 'quiz'));
    }
}
