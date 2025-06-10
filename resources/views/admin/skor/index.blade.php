<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Skor Peserta - DIAGLO QUIZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
        .content-box {
            background-color: rgba(255, 255, 255, 0.92);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }
        .navbar {
            background-color: rgba(51, 153, 255, 0.9);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">DIAGLO QUIZ</a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.skor.index') }}">Skor Peserta</a>
                    </li>
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

    <div class="container content">
        <div class="content-box">
            <h3>Daftar Skor Peserta</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.skor.export') }}" class="btn btn-success">Export ke Excel</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email Peserta</th>
                            <th>Total Skor</th>
                            <th>Tanggal Tes Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($scores as $index => $score)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $score->name }}</td>
                                <td>{{ $score->email }}</td>
                                <td>{{ $score->total_skor }}</td>
                                <td>{{ $score->last_test_date ? $score->last_test_date->format('d-m-Y H:i') : '-' }}</td>
                                <td>
                                    <form action="{{ route('admin.skor.destroy', $score->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data skor peserta ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data skor peserta.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <p class="mb-0">© 2025 DIAGLO QUIZ. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
