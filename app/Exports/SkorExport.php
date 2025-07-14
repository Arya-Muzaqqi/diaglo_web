<?php

namespace App\Exports;

use App\Models\Skor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SkorExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Skor::with(['user', 'question'])->get()->map(function ($skor) {
            return [
                'Nama Peserta' => $skor->user->name ?? '-',
                'ID Soal' => $skor->question_id ?? '-',
                'Nilai' => strval($skor->nilai ?? 0),
                'Kategori Pemahaman' => $skor->kategori ?? '-',
                'Waktu' => $skor->created_at ? $skor->created_at->format('d-m-Y H:i') : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Peserta',
            'ID Soal',
            'Nilai',
            'Kategori Pemahaman',
            'Waktu'
        ];
    }
}
