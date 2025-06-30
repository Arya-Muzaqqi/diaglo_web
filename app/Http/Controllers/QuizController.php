<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Skor;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Halaman petunjuk
    public function start()
    {
        return view('quiz.start');
    }

    // Reset session & mulai kuis
    public function begin(Request $request)
    {
        $request->session()->forget(['current_question', 'answered', 'skor', 'end_time']);
        $request->session()->put('current_question', 0);

        // Ambil durasi dari tabel settings
        $durasi = Setting::first()->durasi_menit ?? 30;
        $endTime = now()->addMinutes($durasi)->timestamp;
        $request->session()->put('end_time', $endTime);

        return redirect()->route('quiz.quiz');
    }

    // Menampilkan soal kuis sesuai sesi
    public function quiz(Request $request)
    {
        $questions = Question::with('reason')->get();
        $current = $request->session()->get('current_question', 0);

        if ($current >= $questions->count()) {
            return redirect()->route('quiz.result');
        }

        // Ambil waktu berakhir dari session
        $endTime = $request->session()->get('end_time');
        if (!$endTime) {
            return redirect()->route('quiz.result'); // Jika session hilang
        }

        $remainingSeconds = max(0, $endTime - now()->timestamp);
        if ($remainingSeconds <= 0) {
            return redirect()->route('quiz.result');
        }

        $question = $questions[$current];
        $nomor = $current + 1;

        return view('quiz.quiz', compact('question', 'nomor', 'remainingSeconds'));
    }

    // Proses jawaban soal
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

        // Simpan skor ke DB
        if (Auth::check()) {
            Skor::updateOrCreate(
                ['user_id' => auth()->id(), 'question_id' => $question->id],
                ['nilai' => $skorSoal, 'kategori' => $kategori]
            );
        }

        // Simpan jawaban ke session
        $answered = $request->session()->get('answered', []);
        $answered[$question->id] = [
            'jawaban' => $jawaban,
            'jawaban_alasan' => $jawabanAlasan ?? null,
            'skor' => $skorSoal,
            'kategori' => $kategori,
        ];
        $request->session()->put('answered', $answered);

        // Tambah skor ke total
        $skor = $request->session()->get('skor', 0);
        $skor += $skorSoal;
        $request->session()->put('skor', $skor);

        // Cek apakah soal terakhir
        $questions = Question::all();
        $nextIndex = $nomor;
        $request->session()->put('current_question', $nextIndex);

        if ($nextIndex >= $questions->count()) {
            // Simpan tanggal tes terakhir
            Skor::where('user_id', auth()->id())->update(['last_test_date' => now()]);
            return redirect()->route('quiz.result');
        }

        return redirect()->route('quiz.quiz');
    }

    // Kembali ke soal sebelumnya
    public function previous(Request $request)
    {
        $current = $request->session()->get('current_question', 0);
        if ($current > 0) {
            $current--;
            $request->session()->put('current_question', $current);
        }
        return redirect()->route('quiz.quiz');
    }

    // Tampilkan hasil akhir
    public function result(Request $request)
    {
        $skor = $request->session()->get('skor', 0);
        $answered = $request->session()->get('answered', []);
        return view('quiz.result', compact('skor', 'answered'));
    }
}
