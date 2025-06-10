<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Skor;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Tampilkan halaman petunjuk sebelum mulai kuis
    public function start()
    {
        return view('quiz.start');
    }

    // Reset session dan mulai kuis
    public function begin(Request $request)
    {
        $request->session()->forget(['current_question', 'answered', 'skor']);
        $request->session()->put('current_question', 0);
        return redirect()->route('quiz.quiz');
    }

    // Tampilkan soal berdasarkan sesi
    public function quiz(Request $request)
    {
        $questions = Question::with('reason')->get();
        $current = $request->session()->get('current_question', 0);

        if ($current >= $questions->count()) {
            return redirect()->route('quiz.result');
        }

        $question = $questions[$current];
        $nomor = $current + 1;

        return view('quiz.quiz', compact('question', 'questions', 'current', 'nomor'));
    }

    // Proses jawaban peserta
    public function submit(Request $request)
    {
        $questionId = $request->input('question_id');
        $jawaban = $request->input('jawaban');
        $jawabanAlasan = $request->input('jawaban_alasan');
        $nomor = $request->input('nomor');

        $question = Question::with('reason')->findOrFail($questionId);

        // Logika penilaian two-tier
        $skorSoal = 0;
        $kategori = 'Tidak Paham';

        $jawabanBenar = $jawaban === $question->jawaban_benar;
        $alasanBenar = $question->reason && $jawabanAlasan === $question->reason->jawaban_benar;

        if ($jawabanBenar && $alasanBenar) {
            $skorSoal = 2;
            $kategori = 'Paham Konsep';
        } elseif ($jawabanBenar && !$alasanBenar) {
            $skorSoal = 1;
            $kategori = 'Miskonsepsi';
        } else {
            $skorSoal = 0;
            $kategori = 'Tidak Paham';
        }

        // Simpan ke tabel `skors`
        if (Auth::check()) {
            Skor::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'question_id' => $question->id
                ],
                [
                    'nilai' => $skorSoal,
                    'kategori' => $kategori,
                ]
            );
        }

        // Simpan jawaban ke session (opsional untuk result blade)
        $answered = $request->session()->get('answered', []);
        $answered[$question->id] = [
            'jawaban' => $jawaban,
            'jawaban_alasan' => $jawabanAlasan ?? null,
            'skor' => $skorSoal,
            'kategori' => $kategori,
        ];
        $request->session()->put('answered', $answered);

        // Tambah skor ke total session
        $skor = $request->session()->get('skor', 0);
        $skor += $skorSoal;
        $request->session()->put('skor', $skor);

        // Lanjut soal berikutnya
        $nextQuestionIndex = $nomor;
        $request->session()->put('current_question', $nextQuestionIndex);

        return redirect()->route('quiz.quiz');
    }

    // Tampilkan hasil akhir
    public function result(Request $request)
    {
        $skor = $request->session()->get('skor', 0);
        $answered = $request->session()->get('answered', []);

        return view('quiz.result', compact('skor', 'answered'));
    }

    // Soal sebelumnya (jika ingin back)
    public function previous(Request $request)
    {
        $current = $request->session()->get('current_question', 0);
        if ($current > 0) {
            $current--;
            $request->session()->put('current_question', $current);
        }

        return redirect()->route('quiz.quiz');
    }
}
