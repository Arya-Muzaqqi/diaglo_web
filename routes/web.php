<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SkorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Peserta\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard redirect berdasarkan role
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    } else {
        return redirect('/peserta/dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Peserta routes
Route::middleware(['auth'])->group(function () {
    Route::get('/peserta/dashboard', function () {
        return view('peserta.dashboard');
    })->name('peserta.dashboard');

    Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');   // tampilkan halaman petunjuk mulai kuis
    Route::post('/quiz/begin', [QuizController::class, 'begin'])->name('quiz.begin');  // reset session & mulai kuis

    Route::get('/quiz', [QuizController::class, 'quiz'])->name('quiz.quiz');            // tampilkan soal kuis
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit'); 
    Route::get('/quiz/result', [QuizController::class, 'result'])->name('quiz.result');
    Route::get('/quiz/previous', [QuizController::class, 'previous'])->name('quiz.previous');

    
    Route::get('/peserta/profile/edit', [ProfileController::class, 'edit'])->name('peserta.profile.edit');
    Route::post('/peserta/profile/update', [ProfileController::class, 'update'])->name('peserta.profile.update');
});

// Admin routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Manajemen User
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    // Manajemen Soal
    Route::resource('questions', QuestionController::class);

    // Skor peserta
    Route::get('/skor', [SkorController::class, 'index'])->name('skor.index');
    Route::get('/skor/export', [SkorController::class, 'export'])->name('skor.export');
    Route::delete('/skor/{id}', [SkorController::class, 'destroy'])->name('skor.destroy');
});

Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.settings.index');
Route::post('/admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');

// Auth routes
require __DIR__.'/auth.php';
