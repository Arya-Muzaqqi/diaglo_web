<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    // Form tambah user baru
    public function create()
    {
        return view('admin.users.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|confirmed|min:6',
            'role'            => ['required', Rule::in(['admin', 'peserta'])],
            'jenis_kelamin'   => 'nullable|string|max:20',
            'alamat'          => 'nullable|string|max:255',
            'asal_sekolah'    => 'nullable|string|max:255',
            'kelas'           => 'nullable|string|max:20',
            'pekerjaan_ortu'  => 'nullable|string|max:100',
            'suku'            => 'nullable|string|max:100',
        ]);

        User::create([
            'name'            => $validated['name'],
            'email'           => $validated['email'],
            'password'        => Hash::make($validated['password']),
            'role'            => $validated['role'],
            'jenis_kelamin'   => $validated['jenis_kelamin'] ?? null,
            'alamat'          => $validated['alamat'] ?? null,
            'asal_sekolah'    => $validated['asal_sekolah'] ?? null,
            'kelas'           => $validated['kelas'] ?? null,
            'pekerjaan_ortu'  => $validated['pekerjaan_ortu'] ?? null,
            'suku'            => $validated['suku'] ?? null,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Form edit user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => ['required','email', Rule::unique('users')->ignore($user->id)],
            'password'        => 'nullable|confirmed|min:6',
            'role'            => ['required', Rule::in(['admin', 'peserta'])],
            'jenis_kelamin'   => 'nullable|string|max:20',
            'alamat'          => 'nullable|string|max:255',
            'asal_sekolah'    => 'nullable|string|max:255',
            'kelas'           => 'nullable|string|max:20',
            'pekerjaan_ortu'  => 'nullable|string|max:100',
            'suku'            => 'nullable|string|max:100',
        ]);

        $user->name            = $validated['name'];
        $user->email           = $validated['email'];
        $user->role            = $validated['role'];
        $user->jenis_kelamin   = $validated['jenis_kelamin'] ?? null;
        $user->alamat          = $validated['alamat'] ?? null;
        $user->asal_sekolah    = $validated['asal_sekolah'] ?? null;
        $user->kelas           = $validated['kelas'] ?? null;
        $user->pekerjaan_ortu  = $validated['pekerjaan_ortu'] ?? null;
        $user->suku            = $validated['suku'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate.');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
