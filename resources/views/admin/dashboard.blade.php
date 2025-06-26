<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - DIAGLO QUIZ</title>
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

        footer {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">DIAGLO QUIZ</a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.questions.index') }}">Manajemen Soal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.settings.index') }}">Pengaturan Timer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Manajemen User</a>
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

    <div class="dashboard-content text-center">
        <div class="container">
            <h1 class="mb-3">Dashboard Admin</h1>
            <p class="lead">Halo, {{ Auth::user()->name }}! Selamat datang di DIAGLO</p>
        </div>
    </div>

    <footer>
        <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
    </footer>
</body>
</html>