<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pengaturan Kuis - DIAGLO QUIZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #f0f8ff;">
    <div class="container mt-5">
        <h2>Pengaturan Kuis</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.quiz_settings.update') }}">
            @csrf

            <div class="mb-3">
                <label for="time_limit" class="form-label">Batas Waktu (menit)</label>
                <input type="number" class="form-control" id="time_limit" name="time_limit" value="{{ old('time_limit', $settings['time_limit']->value ?? 30) }}" min="1" required />
                @error('time_limit')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3">
                <label for="passing_score" class="form-label">Nilai Minimal Lulus (%)</label>
                <input type="number" class="form-control" id="passing_score" name="passing_score" value="{{ old('passing_score', $settings['passing_score']->value ?? 70) }}" min="0" max="100" required />
                @error('passing_score')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3">
                <label for="max_attempts" class="form-label">Maksimal Percobaan</label>
                <input type="number" class="form-control" id="max_attempts" name="max_attempts" value="{{ old('max_attempts', $settings['max_attempts']->value ?? 3) }}" min="1" required />
                @error('max_attempts')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </form>
    </div>
</body>
</html>
