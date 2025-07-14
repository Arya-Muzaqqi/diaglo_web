<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Soal - DIAGLO QUIZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .sup-preview {
            font-style: italic;
            color: #555;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Soal</h2>
    <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="pertanyaan" class="form-label">Pertanyaan</label>
            <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" required>
            <div class="sup-preview mt-1">Preview: <span id="preview-pertanyaan"></span></div>
        </div>

        <div class="mb-3">
            <label for="media" class="form-label">Media (opsional)</label>
            <input type="file" class="form-control" name="media">
        </div>

        <div class="mb-3">
            <label class="form-label">Opsi Jawaban</label>
            @foreach(['a', 'b', 'c', 'd', 'e'] as $opsi)
                <input type="text" class="form-control mb-2" name="opsi[{{ $opsi }}]" placeholder="Opsi {{ strtoupper($opsi) }}" required>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="jawaban_benar" class="form-label">Jawaban Benar</label>
            <select class="form-control" name="jawaban_benar" required>
                @foreach(['a', 'b', 'c', 'd', 'e'] as $opsi)
                    <option value="{{ $opsi }}">{{ strtoupper($opsi) }}</option>
                @endforeach
            </select>
        </div>

        <hr>
        <h5>Alasan (Tier 2)</h5>

        <div class="mb-3">
            <label for="alasan" class="form-label">Alasan</label>
            <input type="text" class="form-control" name="alasan" id="alasan">
            <div class="sup-preview mt-1">Preview: <span id="preview-alasan"></span></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Opsi Alasan</label>
            @foreach(['a', 'b', 'c', 'd', 'e'] as $opsi)
                <input type="text" class="form-control mb-2" name="alasan_opsi[{{ $opsi }}]" placeholder="Opsi {{ strtoupper($opsi) }}">
            @endforeach
        </div>

        <div class="mb-3">
            <label for="alasan_jawaban_benar" class="form-label">Jawaban Benar Alasan</label>
            <select class="form-control" name="alasan_jawaban_benar">
                <option value="">-- Pilih --</option>
                @foreach(['a', 'b', 'c', 'd', 'e'] as $opsi)
                    <option value="{{ $opsi }}">{{ strtoupper($opsi) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    function convertSuperscript(text) {
        return text.replace(/\^(\d+)/g, "<sup>$1</sup>");
    }

    const pertanyaanInput = document.getElementById('pertanyaan');
    const previewPertanyaan = document.getElementById('preview-pertanyaan');
    const alasanInput = document.getElementById('alasan');
    const previewAlasan = document.getElementById('preview-alasan');

    function updatePreview() {
        previewPertanyaan.innerHTML = convertSuperscript(pertanyaanInput.value);
        previewAlasan.innerHTML = convertSuperscript(alasanInput.value);
    }

    pertanyaanInput.addEventListener('input', updatePreview);
    alasanInput.addEventListener('input', updatePreview);

    // Inisialisasi awal kosong
    updatePreview();
</script>
</body>
</html>
