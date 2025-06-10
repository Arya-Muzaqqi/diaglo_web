@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Pengaturan Quiz</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="quiz_name" class="form-label">Nama Quiz</label>
            <input type="text" name="quiz_name" class="form-control" value="{{ old('quiz_name', $settings['quiz_name'] ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="time_limit" class="form-label">Durasi (menit)</label>
            <input type="number" name="time_limit" class="form-control" value="{{ old('time_limit', $settings['time_limit'] ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="passing_score" class="form-label">Skor Kelulusan (%)</label>
            <input type="number" name="passing_score" class="form-control" value="{{ old('passing_score', $settings['passing_score'] ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
