<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis - DIAGLO Quiz</title>
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
            color: #333;
        }

        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .navbar, footer {
            background-color: rgba(0, 123, 255, 0.8);
        }

        .navbar-brand, .nav-link, footer {
            color: white !important;
        }

        .result-card {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px 20px;
            border-radius: 16px;
            margin-top: 60px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        footer {
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">DIAGLO QUIZ</a>
            <div class="d-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="content container">
        <div class="result-card text-center">
            <h3 class="mb-4">Hasil Kuis Anda</h3>
            <p><strong>Nilai Akhir:</strong> {{ $skor }}</p>

            <div class="mt-4">
                <a href="{{ url('/peserta/dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>

    <footer>
        <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
