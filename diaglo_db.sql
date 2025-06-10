-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Bulan Mei 2025 pada 12.26
-- Versi server: 8.0.30
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diaglo_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1),
(10, '2025_05_16_071648_add_role_to_users_table', 1),
(11, '2025_05_16_074146_create_questions_table', 1),
(12, '2025_05_16_074209_create_reasons_table', 1),
(13, '2025_05_22_025950_create_skors_table', 2),
(14, '2025_05_22_055336_create_quiz_settings_table', 3),
(15, '2025_05_25_084206_create_questions_table', 4),
(16, '2025_05_25_084209_create_reasons_table', 4),
(17, '2025_05_25_084356_create_skors_table', 5),
(18, '2025_05_25_085253_add_question_id_and_kategori_to_skors_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `pertanyaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi` json NOT NULL,
  `jawaban_benar` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id`, `pertanyaan`, `media`, `opsi`, `jawaban_benar`, `created_at`, `updated_at`) VALUES
(1, 'Salah satu hiburan yang ditemukan dipasar malam Sekaten yaitu komidi putar. Salah satu komidi putar pada sekaten tersebut memiliki diameter 4 meter serta memiliki momen inersia  125kgm^2 berotasi dengan kelajuan 0.5 putaran per detik. Tiga orang anak secara spontan melompat dan duduk ditepi. Masing- masing tersebut bermassa 20 kg, 25 kg dan 30 kg. Torsi dapat diabaikan karena fenomena tersebut  dianggap tidak menyumbangkan torsi, maka kecepatan sudut komidi putarnya adalah ….', 'media/yTdio7rZobj3lN1ai5viM0bijjOUk1Qnw2yKU24p.png', '{\"a\": \"0,104 putaran/s\", \"b\": \"0,147 putaran/s\", \"c\": \"0,208 putaran/s\", \"d\": \"0,227 putaran/s\", \"e\": \"0,313 putaran/ s\"}', 'b', '2025-05-25 02:01:35', '2025-05-25 02:49:05'),
(2, 'Permainan tradisional gangsing seperti gangsing diputar dengan kuat sampai berputar stabil dalam waktu yang cukup lama. Kecenderungan gangsing untuk tetap berputar ini menunjukkan adanya sifat...', 'media/nKN5hfWeHqkHChRlCawlgSPRXaUy2wXMm1ZsJIKL.png', '{\"a\": \"momen gaya\", \"b\": \"gaya\", \"c\": \"momen inersia\", \"d\": \"massa benda\", \"e\": \"hukum kekekalan momentum sudut\"}', 'c', '2025-05-25 02:19:29', '2025-05-25 02:19:29'),
(3, 'Dalam pementasan Tari Gambyong yang berasal dari Solo, penari bergerak bergeser atau berpindah arah menjaga keseimbangan tubuh agar tetap stabil. Keseimbangan gerakan tersebut dapat terjadi jika posisi titik berat tubuh berada dalam posisi...', 'media/wQTuyqC6TYgQxUj7iN5pHkZO03SRwUjMafe6z1lu.png', '{\"a\": \"Dekat dengan tanah dan di tengah-tengah tubuh\", \"b\": \"Di atas kepala\", \"c\": \"Berpindah ke tangan yang bergerak\", \"d\": \"Berpindah mengikuti irama music\", \"e\": \"Bergerak acak mengikuti gerakan kaki\"}', 'a', '2025-05-25 02:21:57', '2025-05-25 02:21:57'),
(4, 'Rumah Joglo adalah rumah tradisional Jawa Tengah yang memiliki ciri khas atap berbentuk limasan bertingkat (tumpang). Asumsikan bentuk atapnya sebagai sebuah limas segi empat simetris. Sebuah atap Joglo memiliki panjang alas 8 m, lebar alas 8 m, dan tinggi atap 6 m. Apabila ketebalan material diabaikan, maka letak koordinat titik berat atap rumah Joglo tersebut adalah...', 'media/OQLnQQBg3QX3P2aKRhv65sURLWSYbb9oweu8OSSf.png', '{\"a\": \"(4; 4; 2 m)\", \"b\": \"(2; 2; 3 m)\", \"c\": \"(4; 4; 4 m)\", \"d\": \"(4; 4; 3 m)\", \"e\": \"(3; 3; 2 m)\"}', 'a', '2025-05-25 02:24:08', '2025-05-25 02:24:08'),
(5, 'Perhatikan gambar tersebut (Gunungan pada acara grebeg Sudiro), Benda dirangkai sedemikian rupa sehingga menunjukkan bahwa gaya-gaya yang bekerja pada benda berada dalam keadaan seimbang. Total gaya berat benda berada pada suatu titik sehingga benda tetap stabil saat dipikul berada pada titik…', 'media/oIzxj1MWwCvxC2pcu1MVp2WtEA491rjQEUsZcJCp.png', '{\"a\": \"Titik pusat tekanan\", \"b\": \"Titik pusat massa\", \"c\": \"Titik berat\", \"d\": \"Titik tumpu dinamis\", \"e\": \"Titik keseimbangan semu\"}', 'c', '2025-05-25 02:26:54', '2025-05-25 02:26:54'),
(6, 'Dalam perayaan Festival Lesung Musik di Sukoharjo, ibu-ibu memainkan lesung tradisional dengan memukulnya menggunakan alu. Lesung diposisikan seperti jungkat-jungkit dan digunakan sebagai alat musik tradisional. Tiga orang ibu berdiri di titik yang berbeda dari poros tumpuan dan memberikan gaya untuk menciptakan suara ritmis. •	Ibu A memberikan gaya ke bawah sebesar 30 N pada jarak 1 meter dari titik tumpu. •	Ibu B memberikan gaya ke bawah sebesar 15 N pada jarak 1,5 meter dari titik tumpu. •	Ibu C berdiri pada sisi sebaliknya dengan jarak 3 meter dari titik tumpu dan akan memberikan gaya ke atas untuk menjaga keseimbangan lesung. Agar lesung tetap seimbang dan tidak berputar, berapa besar gaya minimum yang harus diberikan oleh Ibu C?', 'media/gjw0heWgIGsW91plkDYgOyTrB1xgQLwiRkIIgCW7.png', '{\"a\": \"15 N\", \"b\": \"20 N\", \"c\": \"25 N\", \"d\": \"30 N\", \"e\": \"35 N\"}', 'b', '2025-05-25 02:51:33', '2025-05-25 02:51:33'),
(7, 'Seorang pengrajin batik di Solo menggunakan alat pemintal benang tradisional. Saat memutar tuas ke kanan dengan tangan kanan, benang tergulung ke arah berlawanan. Arah torsi yang dihasilkan tangan pengrajin saat memutar tuas ke kanan dari atas adalah...', 'media/wD7hMoKtw4aVWYrYQSYnMnllgmpbHpiJcdb8j6sC.png', '{\"a\": \"Ke kiri (arah berlawanan jarum jam)\", \"b\": \"Ke bawah (negatif)\", \"c\": \"Ke kanan (searah jarum jam)\", \"d\": \"Ke atas\", \"e\": \"Ke dalam (arah gaya sejajar dengan batang tuas)\"}', 'c', '2025-05-25 02:53:30', '2025-05-25 02:53:30'),
(8, 'Dalam musim tanam para petani di Sukoharjo menggunakan bambu untuk mengangkat bibit padi.  Panjang bambu 6 m, ujung kiri terdapat 4 bibit padi (3 kg/bibit padi), ujung kanan 2 bibit padi (3 kg/ bibit padi). Agar batang bambu dalam keadaan setimbang, titik tumpu harus berada...', 'media/cxRJF0qsuTO5zECVEGiXFuBCMYqJpsHXTVIvS5mu.png', '{\"a\": \"Tepat di tengah (3 m)\", \"b\": \"1,5 m dari ujung kiri\", \"c\": \"2 m dari ujung kiri\", \"d\": \"3,5 m dari ujung kiri\", \"e\": \"4 dari ujung kiri\"}', 'c', '2025-05-25 02:55:09', '2025-05-25 03:04:09'),
(9, 'Perhatikan gambar diatas, seorang anak menaiki biang lala. Biang lala tersebut berputar 3 kali yang dimulai dari bawah kemudian keatas dan kembali kebawah. Apabila kecepatan putaran mainan meningakat tajam, anak tersebut akan mengalami…', 'media/vIiaOM9jJuwgmJgX9NRFhmDAOOMmfqVL3zbblCtP.png', '{\"a\": \"Anak terdorong keluar karena gaya sentrifugal\", \"b\": \"Anak tetap pada posisi\", \"c\": \"Anak bergerak lebih pelan\", \"d\": \"Anak mengalami gaya sentripetal yang mengecil\", \"e\": \"Anak dipengaruhi oleh gaya berat yang menjadi dominan\"}', 'a', '2025-05-25 02:56:36', '2025-05-25 02:56:36'),
(10, 'Perhatikan gambar gong tersebut. Letak pusat massa dari gong berada di…', 'media/LOxYAAvTZ9C45e8wWf8lnb3RVRtSG4Q59CbbJJM7.png', '{\"a\": \"Tepat di tengah\", \"b\": \"Lebih dekat ke sisi tipis\", \"c\": \"Lebih dekat ke sisi tebal\", \"d\": \"Di luar gong\", \"e\": \"Berubah-ubah sesuai sumber bunyi\"}', 'c', '2025-05-25 02:58:13', '2025-05-25 02:58:13'),
(11, 'Didi Nini Towok memutar topeng besar di atas kepala. Gaya utama yang menjaga topeng tidak jatuh saat diputar yaitu...', 'media/3DXY0h377LSe4pWzOUOziMvG31LxHCrJ27EjJoZE.png', '{\"a\": \"Gaya gesek\", \"b\": \"Gaya berat\", \"c\": \"Gaya sentripetal\", \"d\": \"Gaya normal\", \"e\": \"Gaya magnet\"}', 'c', '2025-05-25 02:59:34', '2025-05-25 02:59:34'),
(12, 'Sebuah jembatan bambu di daerah Sukoharjo dilewati oleh orang dan membawa beban. Jika seseorang berdiri 2 m dari ujung jembatan sepanjang 6 m dan berat orang 600 N, berapa momen gaya terhadap ujung?', 'media/SN0Se3hqIOY951KtPUJtGwMLQNE22hK3MLNPIWoZ.png', '{\"a\": \"1200 Nm\", \"b\": \"1800 Nm\", \"c\": \"2400 Nm\", \"d\": \"3000 Nm\", \"e\": \"3600 Nm\"}', 'a', '2025-05-25 03:03:48', '2025-05-25 03:03:48'),
(13, 'Penari Solo berputar makin cepat sambil memegang selendang. Jika kecepatan meningkat, apa yang terjadi pada percepatan sentripetal?', 'media/jbyzUneVbCGzUV4YisNXkTf2t9eoXPNYfi6X4lO2.png', '{\"a\": \"Meningkat\", \"b\": \"Menurun\", \"c\": \"Tetap\", \"d\": \"Nol\", \"e\": \"Tidak menentu\"}', 'a', '2025-05-25 03:05:38', '2025-05-25 03:05:38'),
(14, 'Dalam proses pembuatan batik cap Solo, alat cap logam berbentuk silinder diputar untuk dicelupkan ke malam (campuran lilin, parafin, dan damar yang digunakan sebagai bahan perintang untuk menutup bagian kain agar tidak terkena warna saat proses membatik). Dua pekerja memberi gaya sebesar 20 N pada sisi alat. Pekerja A memberi gaya pada ujung pegangan sejauh 0,3 m dari pusat silinder, sedangkan Pekerja B memberi gaya pada jarak 0,15 m. Jika momen inersia silinder tetap, siapa yang menghasilkan percepatan sudut lebih besar?', NULL, '{\"a\": \"Pekerja A\", \"b\": \"Pekerja B\", \"c\": \"Sama besar\", \"d\": \"Tidak ada yang menghasilkan percepatan\", \"e\": \"Tidak dapat ditentukan\"}', 'a', '2025-05-25 03:06:55', '2025-05-25 03:06:55'),
(15, 'Dalam kirab budaya di Solo, seekor kebo hias dinaikkan ke atas papan kayu panjang 4 meter sebagai simbol persembahan hasil bumi. Berat kebo  tersebut 500 N dan ditempatkan 1 meter dari ujung kiri papan. Agar papan tetap seimbang secara horizontal di atas satu titik tumpu (di tanah), titik tumpu harus diletakkan pada jarak…', NULL, '{\"a\": \"1 m dari ujung kiri\", \"b\": \"1,5 m dari ujung kiri\", \"c\": \"2 m dari ujung kiri\", \"d\": \"2,5 m dari ujung kiri\", \"e\": \"3 m dari ujung kiri\"}', 'c', '2025-05-25 03:09:26', '2025-05-25 03:09:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_settings`
--

CREATE TABLE `quiz_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reasons`
--

CREATE TABLE `reasons` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `alasan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi` json NOT NULL,
  `jawaban_benar` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reasons`
--

INSERT INTO `reasons` (`id`, `question_id`, `alasan`, `opsi`, `jawaban_benar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alasan anda memilih jawaban diatas…', '{\"a\": \"Hukum kekekalan momentum sudut diperoleh dari kecepatan sudut sebanding dengan momen inersia suatu benda\", \"b\": \"Hukum kekekalan momentum sudut diperoleh dari kecepatan sudut berbanding terbalik dengan momen inersia suatu benda\", \"c\": \"Hukum kekekalan momentum sudut diperoleh dari kecepatan sudut sebanding dengan jari-jari suatu benda\", \"d\": \"Hukum kekekalan momentum sudut diperoleh dari kecepatan sudut sebanding dengan jari-jari suatu benda\", \"e\": \"Hukum kekekalan momentum sudut, jika momen inersia benda bertambah maka kecepatan sudut benda akan berkurang, dan sebaliknya, berlaku momen inersia berkurang maka kecepatan sudut akan bertambah\"}', 'e', '2025-05-25 02:01:36', '2025-05-25 02:49:05'),
(2, 2, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Gangsing tetap berputar karena ada gaya luar yang terus bekerja\", \"b\": \"Gangsing mempertahankan geraknya akibat sifat inersia rotasi\", \"c\": \"Gangsing bisa diam dan berputar karena adanya perubahan massa\", \"d\": \"Gangsing mempertahankan gerak rotasinya karena gesekan dengan udara\", \"e\": \"Gangsing stabil berputar karena hukum kekekalan momentum linear\"}', 'b', '2025-05-25 02:19:29', '2025-05-25 02:19:29'),
(3, 3, 'Alasan anda memilih jawaban tersebut  …', '{\"a\": \"Titik berat yang lebih rendah membuat tubuh lebih stabil\", \"b\": \"Titik berat mengikuti posisi lengan yang bergerak\", \"c\": \"Titik berat harus tinggi untuk memperindah gerakan\", \"d\": \"Titik berat tidak mempengaruhi keseimbangan tubuh\", \"e\": \"Titik berat bergerak tergantung tekanan udara sekitar\"}', 'a', '2025-05-25 02:21:57', '2025-05-25 02:21:57'),
(4, 4, 'Alasan anda memilih jawaban tersebut …', '{\"a\": \"Titik berat limas segi empat berada di tengah alas dan sepertiga tinggi dari alas\", \"b\": \"Titik berat selalu berada di dasar bangunan karena simetri\", \"c\": \"Titik berat limas berada di setengah tinggi atap\", \"d\": \"Titik berat tergantung pada besar alas\", \"e\": \"Titik berat berada di sudut alas\"}', 'a', '2025-05-25 02:24:08', '2025-05-25 02:24:08'),
(5, 5, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Karena benda akan seimbang bila pusat tekanannya berada di bawah kepala pembawa\", \"b\": \"Karena titik pusat massa selalu berada di tempat benda dikendalikan dengan gaya normal\", \"c\": \"Karena titik berat menentukan keseimbangan benda terhadap gaya gravitasi secara keseluruhan\", \"d\": \"Karena titik tumpu dinamis berubah saat benda bergerak, menjaga stabilitas\", \"e\": \"Karena pusat gravitasi efektif merupakan hasil gaya-gaya dinamis saat bergerak\"}', 'c', '2025-05-25 02:26:54', '2025-05-25 02:26:54'),
(6, 6, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Karena arah gaya tidak memengaruhi torsi.\", \"b\": \"Karena torsi total harus nol, torsi searah jarum jam harus sama dengan torsi berlawanan arah jarum jam.\", \"c\": \"Karena momen gaya tergantung pada massa benda\", \"d\": \"Karena semakin jauh jarak dari titik tumpu, semakin kecil gaya yang diperlukan\", \"e\": \"Karena gaya total pada sistem harus nol\"}', 'b', '2025-05-25 02:51:33', '2025-05-25 02:51:33'),
(7, 7, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Karena tuas diputar searah jarum jam, maka torsinya ke kanan\", \"b\": \"Karena arah gaya selalu ke bawah\", \"c\": \"Karena momen gaya tidak berpengaruh dalam sistem pemintalan\", \"d\": \"Karena momen gaya bekerja tegak lurus terhadap tangan\", \"e\": \"Karena sistem statis tidak memiliki torsi\"}', 'a', '2025-05-25 02:53:30', '2025-05-25 02:53:30'),
(8, 8, 'Alasan  anda memilih jawaban tersebut …', '{\"a\": \"Karena jumlah bibit kanan lebih banyak, maka titik tumpu harus lebih dekat ke kiri\", \"b\": \"Karena torsi ditentukan oleh massa total\", \"c\": \"Karena massa di kiri dan kanan seimbang\", \"d\": \"Karena gaya gravitasi hanya bekerja di satu sisi\", \"e\": \"Karena tumpuan selalu di tengah\"}', 'b', '2025-05-25 02:55:09', '2025-05-25 02:55:09'),
(9, 9, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Karena gaya sentrifugal merupakan reaksi dari gaya sentripetal\", \"b\": \"Karena tidak ada gaya ke arah luar\", \"c\": \"Karena anak-anak berada pada kesetimbangan\", \"d\": \"Karena massa anak tidak berubah\", \"e\": \"Karena percepatan berkurang\"}', 'a', '2025-05-25 02:56:36', '2025-05-25 02:56:36'),
(10, 10, 'Alasan memilih jawaban diatas adalah…', '{\"a\": \"Karena pusat massa bergantung pada sebaran massa\", \"b\": \"Karena bentuk simetris menghasilkan pusat di tengah\", \"c\": \"Karena ketebalan tidak memengaruhi massa\", \"d\": \"Karena pusat massa selalu di bawah titik tumpu\", \"e\": \"Karena gong berbentuk bundar\"}', 'a', '2025-05-25 02:58:13', '2025-05-25 02:58:13'),
(11, 11, 'Alasan anda memilih jawaban tersebut adalah …', '{\"a\": \"Karena arah gaya sentripetal menuju pusat rotasi\", \"b\": \"Karena gaya berat memperkuat topeng\", \"c\": \"Karena normal bekerja ke atas\", \"d\": \"Karena gesek dominan pada rotasi\", \"e\": \"Karena gaya luar mendorong topeng keluar\"}', 'a', '2025-05-25 02:59:34', '2025-05-25 02:59:34'),
(12, 12, 'Alasan anda memilih jawaban tersebut adalah …', '{\"a\": \"Karena momen gaya sebanding dengan jarak dari titik tumpu\", \"b\": \"Karena berat dibagi dua\", \"c\": \"Karena jembatan simetris\", \"d\": \"Karena panjang jembatan tidak relevan\", \"e\": \"Karena titik tumpu berada di tengah\"}', 'a', '2025-05-25 03:03:48', '2025-05-25 05:17:46'),
(13, 13, 'Alasan anda memilih jawaban tersebut adalah…', '{\"a\": \"Karena percepatan sentripetal sebanding kuadrat kecepatan\", \"b\": \"Karena massa berkurang\", \"c\": \"Karena lintasan mengecil\", \"d\": \"Karena gaya sentrifugal bertambah\", \"e\": \"Karena arah putaran berubah\"}', 'a', '2025-05-25 03:05:38', '2025-05-25 03:05:38'),
(14, 14, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Karena semakin besar lengan gaya, semakin besar torsinya sehingga percepatan sudut meningkat\", \"b\": \"Karena percepatan sudut tidak bergantung pada gaya\", \"c\": \"Karena momen inersia bergantung pada massa, bukan gaya\", \"d\": \"Karena arah gaya pekerja B berlawanan\", \"e\": \"Karena gaya total pekerja A lebih besar\"}', 'a', '2025-05-25 03:06:55', '2025-05-25 03:06:55'),
(15, 15, 'Alasan anda memilih jawaban tersebut…', '{\"a\": \"Agar torsi dari gaya berat sapi dan sisa papan seimbang terhadap titik tumpu\", \"b\": \"Karena titik tumpu harus selalu berada di tengah papan\", \"c\": \"Karena gaya normal dari tanah harus lebih besar dari berat sapi\", \"d\": \"Karena distribusi massa papan tidak memengaruhi tumpuan\", \"e\": \"Karena percepatan gravitasi berubah di tiap titik\"}', 'a', '2025-05-25 03:09:26', '2025-05-25 03:09:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MN845zpXKgigbspY1nkIO9PPkoI5D6UOsSMLd577', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2ZuZW1TMDF4amNmWENXRHdvWXdYWThsWkxzTmxKOFFpTEVLQlJwcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1748175938);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skors`
--

CREATE TABLE `skors` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED DEFAULT NULL,
  `nilai` int NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skors`
--

INSERT INTO `skors` (`id`, `user_id`, `question_id`, `nilai`, `kategori`, `created_at`, `updated_at`) VALUES
(22, 3, 1, 0, 'Tidak Paham', '2025-05-25 05:19:57', '2025-05-25 05:19:57'),
(23, 3, 2, 0, 'Tidak Paham', '2025-05-25 05:20:01', '2025-05-25 05:20:01'),
(24, 3, 3, 2, 'Paham Konsep', '2025-05-25 05:20:06', '2025-05-25 05:20:06'),
(25, 3, 4, 2, 'Paham Konsep', '2025-05-25 05:20:12', '2025-05-25 05:20:12'),
(26, 3, 5, 2, 'Paham Konsep', '2025-05-25 05:20:17', '2025-05-25 05:20:17'),
(27, 3, 6, 2, 'Paham Konsep', '2025-05-25 05:20:22', '2025-05-25 05:20:22'),
(28, 3, 7, 0, 'Tidak Paham', '2025-05-25 05:20:30', '2025-05-25 05:20:30'),
(29, 3, 8, 1, 'Miskonsepsi', '2025-05-25 05:20:36', '2025-05-25 05:20:36'),
(30, 3, 9, 1, 'Miskonsepsi', '2025-05-25 05:20:43', '2025-05-25 05:20:43'),
(31, 3, 10, 0, 'Tidak Paham', '2025-05-25 05:20:48', '2025-05-25 05:20:48'),
(32, 3, 11, 2, 'Paham Konsep', '2025-05-25 05:20:54', '2025-05-25 05:20:54'),
(33, 3, 12, 0, 'Tidak Paham', '2025-05-25 05:21:00', '2025-05-25 05:21:00'),
(34, 3, 13, 0, 'Tidak Paham', '2025-05-25 05:21:06', '2025-05-25 05:21:06'),
(35, 3, 14, 0, 'Tidak Paham', '2025-05-25 05:21:12', '2025-05-25 05:21:12'),
(36, 3, 15, 0, 'Tidak Paham', '2025-05-25 05:21:25', '2025-05-25 05:21:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peserta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Intan', 'isnainiintanpratiwi18@gmail.com', NULL, '$2y$12$ovucBpfoVIEPGvfsrw7Y1eGGikGnI4CpD0diluTERQA0r66b4KiTC', NULL, '2025-05-25 03:23:30', '2025-05-25 03:23:30', 'peserta'),
(4, 'Admin', 'isnainiintanpratiwi24@gmail.com', NULL, '$2y$12$hDE2SPWQ/UyChod0i/RU2OlRE35c8wN4JnrKCA5y8Fyb0hiYs3aB.', NULL, '2025-05-25 03:24:08', '2025-05-25 03:24:08', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_settings`
--
ALTER TABLE `quiz_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quiz_settings_key_unique` (`key`);

--
-- Indeks untuk tabel `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reasons_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `skors`
--
ALTER TABLE `skors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skors_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `quiz_settings`
--
ALTER TABLE `quiz_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `skors`
--
ALTER TABLE `skors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reasons`
--
ALTER TABLE `reasons`
  ADD CONSTRAINT `reasons_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skors`
--
ALTER TABLE `skors`
  ADD CONSTRAINT `skors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
