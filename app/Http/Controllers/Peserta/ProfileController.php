<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Tampilkan form edit profil peserta.
     */
    public function edit()
    {
        if (auth()->user()->role !== 'peserta') {
            abort(403, 'Akses hanya untuk peserta.');
        }

        return view('peserta.edit-profile');
    }

    /**
     * Simpan perubahan profil peserta.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string|max:255',
            'asal_sekolah' => 'nullable|string|max:255',
            'kelas' => 'nullable|string|max:50',
            'pekerjaan_ortu' => 'nullable|string|max:255',
            'suku' => 'nullable|string|max:255',
        ]);

        // Simpan data ke user
        $user->update([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
            'suku' => $request->suku,
        ]);

        return redirect()->route('peserta.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
