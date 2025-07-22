<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil - DIAGLO QUIZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .navbar {
            background-color: rgba(0, 123, 255, 0.85);
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            color: #000;
        }

        label {
            font-weight: bold;
        }

        footer {
            background-color: rgba(0, 123, 255, 0.85);
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">DIAGLO QUIZ</a>
        <div class="ms-auto">
            <a href="{{ route('peserta.dashboard') }}" class="btn btn-outline-light btn-sm me-2">Kembali</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="form-container">
    <h2 class="mb-4 text-center">Edit Profil Peserta</h2>

    <form method="POST" action="{{ route('peserta.profile.update') }}">
        @csrf

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ Auth::user()->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ Auth::user()->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', Auth::user()->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', Auth::user()->asal_sekolah) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" value="{{ old('kelas', Auth::user()->kelas) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Pekerjaan Orang Tua</label>
            <input type="text" name="pekerjaan_ortu" value="{{ old('pekerjaan_ortu', Auth::user()->pekerjaan_ortu) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Suku</label>
            <input type="text" name="suku" value="{{ old('suku', Auth::user()->suku) }}" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>

<footer>
    <p>© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
</footer>

</body>
</html>
