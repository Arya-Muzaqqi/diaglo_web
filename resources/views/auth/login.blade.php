<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - DIAGLO QUIZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            color: #003b6f;
        }

        .login-container {
            max-width: 540px; /* diperbesar */
            margin: 80px auto;
            background-color: rgba(255, 255, 255, 0.96);
            padding: 40px 45px; /* diperlebar padding */
            border-radius: 18px;
            box-shadow: 0 0 25px rgba(0,0,0,0.25);
        }

        .btn-primary {
            background-color: #4da3ff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #3390f0;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-label {
            font-weight: 600;
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #005fa3;
            text-align: center;
            margin-bottom: 25px;
        }

        .register-link {
            margin-top: 20px;
            text-align: center;
        }

        .register-link a {
            color: #005fa3;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo">DIAGLO QUIZ</div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <div class="register-link">
        Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
    </div>
</div>

</body>
</html>
