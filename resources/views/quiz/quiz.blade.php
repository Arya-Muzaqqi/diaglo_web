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
            float: right;
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
            <div id="timer"></div>
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

            <p><strong>{{ $question->pertanyaan }}</strong></p>

            @foreach($question->opsi as $key => $opsi)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban" id="jawaban_{{ $key }}" value="{{ $key }}">
                    <label class="form-check-label" for="jawaban_{{ $key }}">
                        <strong>{{ strtoupper($key) }}.</strong> {{ $opsi }}
                    </label>
                </div>
            @endforeach

            @if($question->reason)
                <p class="mt-4"><strong>{{ $question->reason->alasan }}</strong></p>
                @foreach($question->reason->opsi as $key => $opsi)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban_alasan" id="alasan_{{ $key }}" value="{{ $key }}">
                        <label class="form-check-label" for="alasan_{{ $key }}">
                            <strong>{{ strtoupper($key) }}.</strong> {{ $opsi }}
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

    updateTimer(); // show first second immediately
    const timerInterval = setInterval(updateTimer, 1000);
</script>

</body>
</html>
