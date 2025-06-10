{{-- resources/views/admin/questions/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Soal - DIAGLO QUIZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            padding-top: 40px;
            padding-bottom: 60px;
        }

        .table-wrapper {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .btn-primary, .btn-secondary, .btn-warning, .btn-danger {
            border-radius: 8px;
        }

        .btn-danger {
            color: white;
        }

        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container content">
        <div class="table-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Manajemen Soal</h2>
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">Kembali ke Dashboard</a>
                    <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">+ Tambah Soal</a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Media</th>
                        <th>Jawaban Benar</th>
                        <th>Alasan (Tier 2)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $index => $q)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $q->pertanyaan }}</td>
                            <td>
                                @if ($q->media)
                                    @if(Str::endsWith($q->media, ['.mp4']))
                                        <video width="120" controls>
                                            <source src="{{ asset('storage/' . $q->media) }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img src="{{ asset('storage/' . $q->media) }}" width="120" alt="Media">
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ strtoupper($q->jawaban_benar) }}</td>
                            <td>
                                @if($q->reason)
                                    {{ $q->reason->alasan }}<br>
                                    <small>Jawaban: <strong>{{ strtoupper($q->reason->jawaban_benar) }}</strong></small>
                                @else
                                    <span class="text-danger">Belum Ada</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.questions.edit', $q->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.questions.destroy', $q->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus soal ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($questions->isEmpty())
                        <tr><td colspan="6" class="text-center">Belum ada soal.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p class="mb-0">© 2025 DIAGLO QUIZ. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
