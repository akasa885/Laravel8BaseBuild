<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizSession;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptAnswer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KuisonerController extends Controller
{
    public function fill(Request $request, $token)
    {
        $quizSession = QuizSession::where('token', $token)->openQuiz()->firstOrFail();
        $quizSession->load('quiz', 'quiz.questions');
        $quiz = $quizSession->quiz;

        return view(
            'pages.quiz-page',
            [
                'title' => 'Quiz - ' . $quizSession->quiz->title,
            ],
            compact('quizSession', 'quiz')
        );
    }

    public function submit(Request $request, $token)
    {
        $request->merge(['quiz_session_id' => QuizSession::where('token', $token)->openQuiz()->firstOrFail()->id]);
        $request->merge(['user_ip' => $request->ip()]);
        $request->merge(['user_agent' => $request->userAgent()]);
        $validator = Validator::make($request->all(), [
            'quiz_session_id' => 'required|exists:quiz_sessions,id',
            'user_ip' => 'required|string',
            'user_agent' => 'required|string',
            'answers' => 'required|array|min:10',
            'answers.*' => 'required',
        ], [], [
            'answers' => 'jawaban',
            'answers.*' => 'jawaban',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();


        try {
            $quizSession = QuizSession::find($request->quiz_session_id);
            $questionQuiz = $quizSession->quiz->questions;

            foreach ($validated['answers'] as $questionId => $answer) {
                $questionQuizId = $questionQuiz->pluck('id')->toArray();

                if (!in_array($questionId, $questionQuizId)) {
                    dd($questionId, $questionQuizId);
                    return back()->withErrors(['error' => 'Data pertanyaan tidak valid.']);
                }

                $options = $questionQuiz->find($questionId)->options;

                if (!in_array(intval($answer), array_column($options, 'value'))) {
                    return back()->withErrors(['error' => 'Data jawaban tidak valid.']);
                }
                
                
            }

            DB::beginTransaction();
            $quizAttempt = $quizSession->attempts()->create([
                'user_name' => 'user-' . Str::random(5),
                'quiz_id' => $quizSession->quiz_id,
                'user_ip' => $validated['user_ip'],
                'user_agent' => $validated['user_agent'],
            ]);


            $answers = [];

            foreach ($validated['answers'] as $questionId => $answer) {
                $answers[] = new QuizAttemptAnswer([
                    'question_id' => $questionId,
                    'answer' => [ 'value' => $answer ],
                ]);
            }

            $quizAttempt->answers()->saveMany($answers);

            DB::commit();

            return redirect()->route('quiz.quiz.result', ['token' => $token, 'attempt' => $quizAttempt]);
        } catch (\Throwable $th) {
            DB::rollBack();
            if (config('app.debug')) {
                throw $th;
            }

            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    public function result(Request $request, $token, QuizAttempt $attempt)
    {
        $quizSession = QuizSession::where('token', $token)->openQuiz()->firstOrFail();
        $quizSession->load('quiz', 'quiz.questions');
        $quiz = $quizSession->quiz;
        $answers = $attempt->answers;

        [$resultPoint, $answerLabeling] = $this->stressTestCheck($answers);

        return view(
            'pages.quiz-result',
            [
                'title' => 'Hasil Quiz - ' . $quizSession->quiz->title,
                'quiz_attempt' => $attempt,
            ],
            compact('quizSession', 'quiz', 'resultPoint', 'answerLabeling')
        );
    }

    private function stressTestCheck($answer)
    {
        $jawaban = $answer->pluck('answer');
        $pointAnswer = 0;

        foreach ($jawaban as $jawab) {
            $pointAnswer += $jawab->value;
        }

        $answerLabeling = 'Tidak Stres';

        if ($pointAnswer >= 0 && $pointAnswer <= 13) {
            $answerLabeling = 'Stres Ringan';
        } elseif ($pointAnswer >= 14 && $pointAnswer <= 26) {
            $answerLabeling = 'Stres Sedang';
        } elseif ($pointAnswer >= 27 && $pointAnswer <= 40) {
            $answerLabeling = 'Stres Berat';
        }

        return [$pointAnswer, $answerLabeling];
    }
}
