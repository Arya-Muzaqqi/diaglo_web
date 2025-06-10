<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\Reason;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function index()
    {
        // Mengambil 5 soal per halaman dengan relasi reason
        $questions = Question::with('reason')->paginate(5); 
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4',
            'opsi' => 'required|array',
            'jawaban_benar' => 'required|in:a,b,c,d,e',
            'alasan' => 'nullable|string',
            'alasan_opsi' => 'nullable|array',
            'alasan_jawaban_benar' => 'nullable|in:a,b,c,d,e',
        ]);

        $path = $request->hasFile('media') ? $request->file('media')->store('media', 'public') : null;

        $question = Question::create([
            'pertanyaan' => $validated['pertanyaan'],
            'media' => $path,
            'opsi' => $validated['opsi'],
            'jawaban_benar' => $validated['jawaban_benar'],
        ]);

        if (!empty($validated['alasan']) && !empty($validated['alasan_opsi']) && !empty($validated['alasan_jawaban_benar'])) {
            $question->reason()->create([
                'alasan' => $validated['alasan'],
                'opsi' => $validated['alasan_opsi'],
                'jawaban_benar' => $validated['alasan_jawaban_benar'],
            ]);
        }

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4',
            'opsi' => 'required|array',
            'jawaban_benar' => 'required|in:a,b,c,d,e',
            'alasan' => 'nullable|string',
            'alasan_opsi' => 'nullable|array',
            'alasan_jawaban_benar' => 'nullable|in:a,b,c,d,e',
        ]);

        if ($request->hasFile('media')) {
            if ($question->media) {
                Storage::disk('public')->delete($question->media);
            }
            $path = $request->file('media')->store('media', 'public');
            $question->media = $path;
        }

        $question->update([
            'pertanyaan' => $validated['pertanyaan'],
            'opsi' => $validated['opsi'],
            'jawaban_benar' => $validated['jawaban_benar'],
        ]);

        if (!empty($validated['alasan']) && !empty($validated['alasan_opsi']) && !empty($validated['alasan_jawaban_benar'])) {
            $question->reason()->updateOrCreate(
                ['question_id' => $question->id],
                [
                    'alasan' => $validated['alasan'],
                    'opsi' => $validated['alasan_opsi'],
                    'jawaban_benar' => $validated['alasan_jawaban_benar'],
                ]
            );
        }

        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil diupdate.');
    }

    public function destroy(Question $question)
    {
        if ($question->media) {
            Storage::disk('public')->delete($question->media);
        }
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Soal berhasil dihapus.');
    }
}
