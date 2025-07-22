<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'        => ['required', 'confirmed', Rules\Password::defaults()],
            'jenis_kelamin'   => ['required', 'in:Laki-laki,Perempuan'],
            'alamat'          => ['required', 'string'],
            'asal_sekolah'    => ['required', 'string', 'max:100'],
            'kelas'           => ['required', 'string', 'max:20'],
            'pekerjaan_ortu'  => ['required', 'string', 'max:100'],
            'suku'            => ['required', 'string', 'max:50'],
            'role'            => ['nullable', 'in:peserta,admin'], // boleh kosong, default peserta
        ]);

        $user = User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'jenis_kelamin'   => $request->jenis_kelamin,
            'alamat'          => $request->alamat,
            'asal_sekolah'    => $request->asal_sekolah,
            'kelas'           => $request->kelas,
            'pekerjaan_ortu'  => $request->pekerjaan_ortu,
            'suku'            => $request->suku,
            'role'            => $request->role ?? 'peserta', // default 'peserta'
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
