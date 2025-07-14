<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DIAGLO Quiz - Soal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/bg-peserta.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .quiz-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 16px;
            margin-top: 40px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        #timer {
            font-weight: bold;
            font-size: 18px;
            color: red;
        }

        video, img {
            max-height: 320px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand text-white" href="#">DIAGLO QUIZ</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-light">Logout</button>
        </form>
    </div>
</nav>

<div class="container">
    <div class="quiz-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Soal No. {{ $nomor }}</h4>
            <div id="timer">00:00</div>
        </div>

        <form action="{{ route('quiz.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="hidden" name="nomor" value="{{ $nomor }}">

            @if($question->media)
                <div class="mb-3">
                    @if(Str::endsWith($question->media, '.mp4'))
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $question->media) }}" type="video/mp4">
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $question->media) }}" class="img-fluid" alt="Media Soal">
                    @endif
                </div>
            @endif

            <p id="pertanyaan"><strong>{{ $question->pertanyaan }}</strong></p>

            @foreach($question->opsi as $key => $opsi)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban" id="jawaban_{{ $key }}" value="{{ $key }}" required>
                    <label class="form-check-label" for="jawaban_{{ $key }}">
                        <strong>{{ strtoupper($key) }}.</strong> <span class="convert-super">{{ $opsi }}</span>
                    </label>
                </div>
            @endforeach

            @if($question->reason)
                <p class="mt-4"><strong id="alasan-utama">{{ $question->reason->alasan }}</strong></p>
                @foreach($question->reason->opsi as $key => $opsi)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban_alasan" id="alasan_{{ $key }}" value="{{ $key }}" required>
                        <label class="form-check-label" for="alasan_{{ $key }}">
                            <strong>{{ strtoupper($key) }}.</strong> <span class="convert-super">{{ $opsi }}</span>
                        </label>
                    </div>
                @endforeach
            @endif

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('quiz.previous') }}" class="btn btn-secondary" @if($nomor == 1) style="visibility:hidden" @endif>Sebelumnya</a>
                <button type="submit" class="btn btn-primary">Jawab & Lanjutkan</button>
            </div>
        </form>
    </div>
</div>

<script>
    let totalSeconds = {{ $remainingSeconds }};
    const timerDisplay = document.getElementById("timer");

    function updateTimer() {
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;
        timerDisplay.innerText = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (totalSeconds <= 0) {
            clearInterval(timerInterval);
            window.location.href = "{{ route('quiz.result') }}";
        }

        totalSeconds--;
    }

    updateTimer(); 
    const timerInterval = setInterval(updateTimer, 1000);

    // Fungsi konversi ^2 menjadi ², ^3 menjadi ³, dll
    function convertSuperscript(text) {
        return text
            .replace(/\^2/g, '²')
            .replace(/\^3/g, '³')
            .replace(/\^1/g, '¹')
            .replace(/\^0/g, '⁰')
            .replace(/\^4/g, '⁴')
            .replace(/\^5/g, '⁵')
            .replace(/\^6/g, '⁶')
            .replace(/\^7/g, '⁷')
            .replace(/\^8/g, '⁸')
            .replace(/\^9/g, '⁹');
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.convert-super').forEach(el => {
            el.innerText = convertSuperscript(el.innerText);
        });

        const pertanyaanEl = document.getElementById('pertanyaan');
        if (pertanyaanEl) {
            pertanyaanEl.innerHTML = convertSuperscript(pertanyaanEl.innerHTML);
        }

        const alasanUtama = document.getElementById('alasan-utama');
        if (alasanUtama) {
            alasanUtama.innerHTML = convertSuperscript(alasanUtama.innerHTML);
        }
    });
</script>

</body>
</html>
