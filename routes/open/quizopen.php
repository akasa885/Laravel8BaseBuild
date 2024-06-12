<?php

use Illuminate\Support\Facades\Route;
use App\Models\QuizSession;
use App\Http\Controllers\KuisonerController;

// this will be the route for the storage file local view
$quizsession = QuizSession::select('token')->openQuiz()->get();
$quizwhereRoute = [];
foreach ($quizsession as $quiz) {
    $quizwhereRoute[] = $quiz->token;
}
$stringRoute = implode('|', $quizwhereRoute);

Route::get('{token}')
    ->where('token', $stringRoute)
    ->name('quiz.open')
    ->uses([KuisonerController::class, 'fill']);

Route::get('{token}/result')
    ->where('token', $stringRoute)
    ->name('quiz.result')
    ->uses([KuisonerController::class, 'result']);

Route::post('{token}/submit')
    ->where('token', $stringRoute)
    ->name('quiz.submit')
    ->uses([KuisonerController::class, 'submit']);

Route::get('{token}/statistic')
    ->where('token', $stringRoute)
    ->name('quiz.statistic')
    ->uses([KuisonerController::class, 'statistic']);
