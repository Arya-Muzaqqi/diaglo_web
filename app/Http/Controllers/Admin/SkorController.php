<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SkorExport;
use Carbon\Carbon; 

class SkorController extends Controller
{
    /**
     * Menampilkan daftar skor total per peserta (user).
     */
    public function index()
    {
        // Ambil user yang punya skor, hitung total skor per user dan tanggal tes terakhir
        $scores = User::whereHas('skors')
            ->with(['skors' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->get()
            ->map(function ($user) {
                return (object)[
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'total_skor' => $user->skors->sum('nilai'),
                    'last_test_date' => $user->skors->first()?->last_test_date
                        ? \Carbon\Carbon::parse($user->skors->first()->last_test_date)
                        : null,
                ];
            });

        return view('admin.skor.index', compact('scores'));
    }

    /**
     * Export skor ke Excel.
     */
    public function export()
    {
        return Excel::download(new SkorExport, 'skor_peserta.xlsx');
    }

    /**
     * Hapus data skor berdasarkan ID (jika kamu simpan data skor per record).
     */
    public function destroy($userId)
    {
        // Hapus semua skor milik user dengan user_id = $userId
        Skor::where('user_id', $userId)->delete();

        return redirect()->route('admin.skor.index')->with('success', 'Data skor peserta berhasil dihapus.');
    }
}
