<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Petunjuk Pengerjaan Kuis - DIAGLO QUIZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .navbar, footer {
            background-color: rgba(0, 123, 255, 0.8);
        }
        .navbar-brand, .nav-link, footer {
            color: white !important;
        }
        .container {
            flex: 1 0 auto;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            margin-top: 60px;
            padding: 30px 25px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #565e64;
            color: white;
        }
        footer {
            flex-shrink: 0;
            padding: 12px 0;
            text-align: center;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
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

<div class="container">
    <div class="card shadow">
        <h2 class="mb-4 text-center">Petunjuk Pengerjaan Kuis</h2>

        <p>1. Bacalah setiap soal dengan seksama.</p>
        <p>2. Pilih satu jawaban yang menurut Anda paling tepat.</p>
        <p>3. Setiap soal bisa dilihat kembali jika belum yakin.</p>
        <p>4. Jika ada gambar, perhatikan dengan baik untuk membantu menjawab soal.</p>
        <p>5. Gunakan tombol "Jawab & Lanjutkan" untuk menyimpan jawaban dan pindah ke soal berikutnya.</p>
        <p>6. Setelah selesai semua soal, Anda akan melihat skor akhir.</p>
        <p>7. Pastikan koneksi internet Anda stabil selama mengikuti kuis.</p>
        <p>8. Pastikan mengerjakan soal sebelum waktunya selesai.</p>
        <p>Selamat mengerjakan dan semoga sukses!</p>

    <div class="text-center mt-4">
        <form method="POST" action="{{ route('quiz.begin') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Mulai Kuis Sekarang</button>
        </form>
        <a href="{{ url('/peserta/dashboard') }}" class="btn btn-secondary mt-2">Kembali</a>
    </div>


<footer class="mt-auto bg-primary text-white text-center py-3">
    <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
</footer>
</body>
</html>
