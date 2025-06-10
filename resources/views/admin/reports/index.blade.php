<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Laporan & Statistik - DIAGLO QUIZ</title>
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

        .card-header {
            font-weight: bold;
        }

        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container content">
        <div class="content-box">
            <h2>Laporan & Statistik</h2>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Total Peserta</div>
                        <div class="card-body">
                            <h3>{{ $totalUsers }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Total Quiz Diikuti</div>
                        <div class="card-body">
                            <h3>{{ $totalQuizzes }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">Rata-rata Nilai</div>
                        <div class="card-body">
                            <h3>{{ number_format($averageScore, 2) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mt-5">Status Kelulusan (Passing Score: {{ $passingScore }}%)</h4>
            <div class="progress mb-3" style="height: 30px;">
                @php
                    $total = $passedCount + $failedCount;
                    $passPercent = $total > 0 ? ($passedCount / $total) * 100 : 0;
                    $failPercent = $total > 0 ? ($failedCount / $total) * 100 : 0;
                @endphp
                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $passPercent }}%" aria-valuenow="{{ $passPercent }}" aria-valuemin="0" aria-valuemax="100">
                    Lulus: {{ round($passPercent, 2) }}%
                </div>
                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $failPercent }}%" aria-valuenow="{{ $failPercent }}" aria-valuemin="0" aria-valuemax="100">
                    Gagal: {{ round($failPercent, 2) }}%
                </div>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
        </div>
    </div>

    <footer>
        <p class="mb-0">© 2025 DIAGLO QUIZ. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
