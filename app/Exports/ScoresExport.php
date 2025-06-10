<?php

namespace App\Exports;

use App\Models\Score;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ScoresExport implements FromCollection, WithHeadings
{
    // Mengambil data semua skor peserta
    public function collection()
    {
        // Ambil data yang ingin diekspor
        return Score::select('id', 'user_id', 'score', 'created_at')->get();
    }

    // Judul kolom pada file Excel
    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Score',
            'Tanggal',
        ];
    }
}
