<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Skor;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function start()
    {
        return view('quiz.start');
    }

    public function begin(Request $request)
    {
        $request->session()->forget(['current_question', 'answered', 'skor', 'end_time']);
        $request->session()->put('current_question', 0);

        // Atur durasi dari setting
        $durasi = Setting::first()->durasi_menit ?? 30;
        $request->session()->put('end_time', now()->addMinutes($durasi)->timestamp);

        return redirect()->route('quiz.quiz');
    }

    public function quiz(Request $request)
    {
        $questions = Question::with('reason')->get();
        $current = $request->session()->get('current_question', 0);

        if ($current >= $questions->count()) {
            return redirect()->route('quiz.result');
        }

        $endTime = session('end_time', now()->addMinutes(30)->timestamp);
        $remainingSeconds = max(0, (int) round($endTime - now()->timestamp));

        if ($remainingSeconds <= 0) {
            return redirect()->route('quiz.result');
        }

        $question = $questions[$current];
        $nomor = $current + 1;

        return view('quiz.quiz', compact('question', 'nomor', 'remainingSeconds'));
    }

    public function submit(Request $request)
    {
        $questionId = $request->input('question_id');
        $jawaban = $request->input('jawaban');
        $jawabanAlasan = $request->input('jawaban_alasan');
        $nomor = $request->input('nomor');

        $question = Question::with('reason')->findOrFail($questionId);

        $skorSoal = 0;
        $kategori = 'Tidak Paham';

        $jawabanBenar = $jawaban === $question->jawaban_benar;
        $alasanBenar = $question->reason && $jawabanAlasan === $question->reason->jawaban_benar;

        if ($jawabanBenar && $alasanBenar) {
            $skorSoal = 2;
            $kategori = 'Paham Konsep';
        } elseif ($jawabanBenar) {
            $skorSoal = 1;
            $kategori = 'Miskonsepsi';
        }

        if (Auth::check()) {
            Skor::updateOrCreate(
                ['user_id' => auth()->id(), 'question_id' => $question->id],
                ['nilai' => $skorSoal, 'kategori' => $kategori]
            );
        }

        $answered = $request->session()->get('answered', []);
        $answered[$question->id] = [
            'jawaban' => $jawaban,
            'jawaban_alasan' => $jawabanAlasan ?? null,
            'skor' => $skorSoal,
            'kategori' => $kategori,
        ];
        $request->session()->put('answered', $answered);

        $skor = $request->session()->get('skor', 0);
        $skor += $skorSoal;
        $request->session()->put('skor', $skor);

        $request->session()->put('current_question', $nomor);

        return redirect()->route('quiz.quiz');
    }

    public function previous(Request $request)
    {
        $current = $request->session()->get('current_question', 0);
        if ($current > 0) {
            $current--;
            $request->session()->put('current_question', $current);
        }
        return redirect()->route('quiz.quiz');
    }

    public function result(Request $request)
    {
        $skor = $request->session()->get('skor', 0);
        $answered = $request->session()->get('answered', []);
        return view('quiz.result', compact('skor', 'answered'));
    }
}
