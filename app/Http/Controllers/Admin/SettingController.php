<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil data setting pertama
        $setting = Setting::first();

        // Jika belum ada, buat default
        if (!$setting) {
            $setting = Setting::create(['durasi_menit' => 30]);
        }

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'durasi_menit' => 'required|integer|min:1|max:300', // max 5 jam
        ]);

        $setting = Setting::first();

        if ($setting) {
            $setting->update(['durasi_menit' => $request->durasi_menit]);
        } else {
            Setting::create(['durasi_menit' => $request->durasi_menit]);
        }

        return redirect()->back()->with('success', 'Durasi pengerjaan berhasil diperbarui.');
    }
}
