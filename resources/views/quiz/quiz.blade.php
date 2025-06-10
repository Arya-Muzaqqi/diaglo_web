<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DIAGLO Quiz - Soal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
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

        .quiz-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px 20px;
            border-radius: 16px;
            margin-top: 60px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .form-check-label {
            color: #333;
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
        }

        footer {
            margin-top: 50px;
        }
    </style>
</head>
<body>
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
    <div class="quiz-container">
        <h4 class="mb-4">Soal No. {{ $nomor }}</h4>

        <form action="{{ route('quiz.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="hidden" name="nomor" value="{{ $nomor }}">

            @if($question->media)
                <div class="mb-3">
                    @if(Str::endsWith($question->media, ['.mp4']))
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $question->media) }}" type="video/mp4">
                            Browser tidak mendukung pemutaran video.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $question->media) }}" class="img-fluid" alt="Media Soal">
                    @endif
                </div>
            @endif

            <div class="mb-3">
                <strong>{{ $question->pertanyaan }}</strong>
            </div>

            <div class="mb-4">
                @foreach($question->opsi as $key => $opsi)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban" id="jawaban_{{ $key }}" value="{{ $key }}">
                        <label class="form-check-label" for="jawaban_{{ $key }}">
                            <strong>{{ strtoupper($key) }}.</strong> {{ $opsi }}
                        </label>
                    </div>
                @endforeach
            </div>

            @if($question->reason)
                <div class="mb-3">
                    <strong>{{ $question->reason->alasan }}</strong>
                </div>

                <div class="mb-4">
                    @foreach($question->reason->opsi as $key => $opsi)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban_alasan" id="alasan_{{ $key }}" value="{{ $key }}">
                            <label class="form-check-label" for="alasan_{{ $key }}">
                                <strong>{{ strtoupper($key) }}.</strong> {{ $opsi }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <a href="{{ route('quiz.previous') }}" class="btn btn-secondary" @if($nomor == 1) style="visibility: hidden;" @endif>Sebelumnya</a>
                <button type="submit" class="btn btn-primary">Jawab & Lanjutkan</button>
            </div>
        </form>
    </div>
</div>

<footer class="text-center py-3">
    <p class="mb-0">© {{ date('Y') }} DIAGLO QUIZ. All rights reserved.</p>
</footer>
</body>
</html>
