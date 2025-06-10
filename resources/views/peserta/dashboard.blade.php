<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peserta - DIAGLO QUIZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: rgba(0, 123, 255, 0.8);
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .dashboard-content {
            padding: 60px 20px;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.4); /* optional semi-transparent overlay */
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            margin-right: 10px;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-outline {
            background-color: white;
            color: #007bff;
        }

        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px;
            flex-shrink: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">DIAGLO QUIZ</a>
        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="dashboard-content text-center">
    <div class="container">
        <h1 class="mb-3">Dashboard Peserta</h1>
        <p class="lead">Halo, {{ Auth::user()->name }}! Selamat datang di DIAGLO</p>

        <div class="mt-4">
            <a href="{{ route('quiz.start') }}" class="btn-custom">Mulai Kuis</a>
            <a href="{{ route('quiz.result') }}" class="btn-custom btn-outline">Lihat Skor</a>
        </div>
    </div>
</div>

<footer>
    <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
</footer>

</body>
</html>
