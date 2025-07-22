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
            background-color: rgba(0, 0, 0, 0.4);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            margin: 10px;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-outline {
            background-color: white;
            color: #007bff;
        }

        .edit-profile {
            margin-right: 10px;
        }

        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px;
            flex-shrink: 0;
        }

        h1, .lead {
            font-size: 28px;
        }

        .lead {
            font-size: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">DIAGLO QUIZ</a>
        <div class="ms-auto d-flex">
            <a href="{{ route('peserta.profile.edit') }}" class="btn btn-outline-light btn-sm edit-profile">Edit Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="dashboard-content text-center">
    <div class="container">
        <h1 class="mb-3">Dashboard Peserta</h1>
        <p class="lead">Halo, {{ Auth::user()->name }}, kelas {{ Auth::user()->kelas ?? '-' }}! Selamat datang di DIAGLO</p>

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
