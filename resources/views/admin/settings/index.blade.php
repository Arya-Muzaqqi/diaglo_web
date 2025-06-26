<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Waktu - DIAGLO QUIZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .settings-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 16px;
            margin-top: 60px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="settings-container mt-5">
            <h2 class="mb-4">Pengaturan Waktu Pengerjaan Soal</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="durasi_menit" class="form-label">Durasi Pengerjaan (dalam menit)</label>
                    <input type="number" name="durasi_menit" id="durasi_menit" class="form-control" min="1" max="300" value="{{ old('durasi_menit', $setting->durasi_menit) }}" required>
                    <small class="text-muted">Contoh: 30 menit</small>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </form>
        </div>
    </div>

    <footer class="mt-auto bg-primary text-white text-center py-3">
        <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
    </footer>
</body>
</html>
