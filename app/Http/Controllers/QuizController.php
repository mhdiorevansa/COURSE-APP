<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\User;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quizIndex()
    {
        $quiz = quiz::get();
        return view('quiz', compact('quiz'));
    }
    public function resetScore()
    {
        $userScore = user::where('skor', auth()->user()->skor)->first();

        if ($userScore) {
            $userScore->skor = 0;
            $userScore->save();
        }
        $quiz = quiz::get();
        $quizId = $quiz[0]->id_quiz;
        return redirect()->route('quiz', $quizId);
    }
    public function showQuiz($id)
    {
        $quiz = quiz::findOrFail($id);
        return view('detail-quiz', compact('quiz'));
    }
    public function checkAnswer(Request $request)
    {
        $questionId = $request->input('id_quiz');
        $userAnswer = $request->input('jawaban');

        $question = quiz::findOrFail($questionId);

        // Memeriksa jawaban pengguna
        if ($userAnswer == $question->jawaban) {
            // Jika jawaban benar, user mendapatkan skor 10
            $skor = 10;

            // Menambahkan skor ke data pengguna
            $user = User::findOrFail(auth()->user()->id_user);
            $user->skor += $skor;
            $user->save();
        } else {
            // Jika jawaban salah, user tidak mendapatkan skor
            $skor = 0;
        }

        // Mendapatkan pertanyaan selanjutnya dari database
        $nextQuestion = quiz::where('id_quiz', '>', $questionId)->first();

        if ($nextQuestion) {
            return redirect()->route('quiz', $nextQuestion)->with('nextQuestion', $nextQuestion);
        } else {
            return view('quiz-result', compact('skor'));
        }
    }
}
