<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\QuizResult;  // Asumsi ada model QuizResult untuk skor peserta
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Contoh statistik dasar:
        $totalUsers = User::count();
        $totalQuizzes = DB::table('quiz_results')->count();
        $averageScore = DB::table('quiz_results')->avg('score');

        // Statistik peserta per status lulus/gagal (asumsi passing_score di settings)
        $passingScore = DB::table('quiz_settings')->where('key', 'passing_score')->value('value') ?? 70;

        $passedCount = DB::table('quiz_results')->where('score', '>=', $passingScore)->count();
        $failedCount = DB::table('quiz_results')->where('score', '<', $passingScore)->count();

        return view('admin.reports.index', compact(
            'totalUsers',
            'totalQuizzes',
            'averageScore',
            'passedCount',
            'failedCount',
            'passingScore'
        ));
    }
}
