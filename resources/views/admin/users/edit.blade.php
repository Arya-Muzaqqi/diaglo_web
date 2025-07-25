<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit User #{{ $user->id }} - DIAGLO QUIZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f8ff;
        }
        .navbar, footer {
            background-color: #3399ff;
        }
        .navbar-brand, .nav-link, footer {
            color: white !important;
        }
        .card {
            border-radius: 1rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">DIAGLO QUIZ</a>
        <div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.questions.index') }}">Manajemen Soal</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Manajemen User</a></li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-light ms-2">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="mb-4">Edit User #{{ $user->id }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password <small>(kosongkan jika tidak ingin ganti)</small></label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role User</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="peserta" {{ old('role', $user->role) == 'peserta' ? 'selected' : '' }}>Peserta</option>
                </select>
            </div>

            <hr>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" value="{{ old('asal_sekolah', $user->asal_sekolah) }}">
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas', $user->kelas) }}">
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ortu" class="form-label">Pekerjaan Orang Tua</label>
                <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" class="form-control" value="{{ old('pekerjaan_ortu', $user->pekerjaan_ortu) }}">
            </div>

            <div class="mb-3">
                <label for="suku" class="form-label">Suku</label>
                <input type="text" name="suku" id="suku" class="form-control" value="{{ old('suku', $user->suku) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<footer class="text-center mt-5 py-3">
    <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
</footer>
</body>
</html>
