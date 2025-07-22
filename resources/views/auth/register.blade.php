<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - DIAGLO QUIZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 0 25px rgba(0,0,0,0.2);
        }

        .form-control, .form-select {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4da3ff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #3390f0;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h3 class="mb-4 text-center">Registrasi Peserta</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Asal Sekolah</label>
            <input type="text" class="form-control" name="asal_sekolah" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pekerjaan Orang Tua</label>
            <input type="text" class="form-control" name="pekerjaan_ortu" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Suku</label>
            <input type="text" class="form-control" name="suku" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>
</div>

</body>
</html>
