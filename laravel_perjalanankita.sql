-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2026 at 08:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_perjalanankita`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `name`, `slug`, `desc`, `image`, `views`, `publish_date`, `created_at`, `updated_at`) VALUES
(3, 5, 3, 'Bermain Menikmati Alam', 'bermain-menikmati-alam', 'Bermain menikmati alam selalu terasa seperti pelarian yang menenangkan dari hiruk pikuk keseharian. Ada rasa lega ketika bisa menghirup udara segar, melihat hamparan hijau, dan mendengar suara alam yang sederhana namun menenangkan hati. Momen-momen kecil seperti itu sering kali membuat pikiran lebih ringan dan perasaan jadi lebih jujur.\r\n\r\nDi tengah kesibukan dan tekanan yang datang silih berganti, alam seakan memberi ruang untuk bernapas sejenak. Bermain di alam bukan hanya soal bersenang-senang, tetapi juga tentang menemukan kembali ketenangan, rasa syukur, dan kedamaian yang perlahan tumbuh tanpa disadari.', 'article1.jpg', 31, '2025-12-30', '2025-12-29 11:14:05', '2026-01-02 07:36:08'),
(4, 3, 1, 'Sunyi yang Berbicara di Antara Rak Buku', 'sunyi-yang-berbicara-di-antara-rak-buku', 'Di dalam perpustakaan, waktu seolah berjalan lebih pelan. Rak-rak buku berdiri rapi, menyimpan ribuan cerita yang menunggu untuk disentuh dan dipahami. Aroma kertas tua berpadu dengan keheningan, menciptakan suasana yang menenangkan dan aman. Setiap langkah terasa lebih hati-hati, seakan tidak ingin mengganggu ketenangan yang telah tercipta.\r\n\r\nDi sudut-sudut ruangan, cahaya lampu jatuh lembut di atas meja baca, menemani halaman demi halaman yang dibuka perlahan. Perpustakaan bukan hanya tempat mencari ilmu, tetapi juga ruang untuk menenangkan pikiran dan berdamai dengan diri sendiri. Dalam sunyi yang sederhana itu, kata-kata dalam buku terasa hidup, berbicara pelan, dan memberi makna tanpa perlu suara.', 'article2.jpg', 37, '2025-12-30', '2025-12-29 11:18:19', '2025-12-30 05:09:34'),
(5, 5, 2, 'Di Bawah Atap Stasiun', 'di-bawah-atap-stasiun', 'Di bawah atap stasiun, berbagai langkah bertemu lalu berpisah tanpa banyak kata. Suara roda kereta yang bergesekan dengan rel berpadu dengan pengumuman keberangkatan, menciptakan irama yang akrab bagi siapa pun yang singgah. Wajah-wajah asing berlalu, masing-masing membawa tujuan, harapan, dan cerita yang tak sempat saling dibagikan.\r\n\r\nStasiun menjadi ruang jeda di antara perjalanan yang panjang. Di sana, waktu terasa melambat sejenak, memberi kesempatan untuk merenung sebelum kembali melaju. Di bawah atap yang sama, ada perpisahan, penantian, dan awal baru yang terus berulang, menjadikan stasiun bukan sekadar tempat transit, tetapi saksi bisu perjalanan hidup.', 'article3.jpg', 60, '2025-12-29', '2025-12-29 11:20:20', '2025-12-29 11:20:20'),
(9, 3, 2, 'Di Antara Mekarnya Warna', 'di-antara-mekarnya-warna', 'Di taman bunga, waktu terasa berjalan lebih pelan seolah memberi ruang untuk menikmati setiap warna yang mekar. Kelopak-kelopak tersusun rapi, menari pelan tertiup angin, menghadirkan keindahan yang sederhana namun menenangkan. Langkah-langkah yang menyusuri jalan setapak terasa ringan, ditemani aroma bunga yang lembut dan menyejukkan pikiran.\r\n\r\nTaman bunga bukan hanya tempat memanjakan mata, tetapi juga ruang untuk menumbuhkan ketenangan di dalam diri. Di antara mekarnya warna dan hijau daun yang menyelimuti, terselip pelajaran tentang kesabaran dan keindahan yang hadir pada waktunya. Dalam suasana itu, hati perlahan menjadi lebih damai, seolah diajak berhenti sejenak dari riuhnya dunia.', 'article4.jpg', 36, '2025-12-29', '2025-12-29 12:41:03', '2026-01-02 07:02:17'),
(11, 5, 2, 'Langit yang Menyimpan Tawa', 'langit-yang-menyimpan-tawa', 'Di lapangan terbuka, layangan terbang tinggi mengikuti arah angin, menari bebas di bawah langit yang luas. Tawa dan sorak kecil terdengar samar, berpadu dengan langkah-langkah ringan yang berlari mengejar tarikan benang. Rumput hijau dan hembusan angin sore menciptakan suasana sederhana yang penuh kebahagiaan.\r\n\r\nBermain layangan di lapangan bukan sekadar permainan, melainkan cara menikmati kebebasan dan kebersamaan. Ada rasa lega ketika melihat layangan melayang tanpa beban, seolah mengingatkan bahwa kebahagiaan bisa hadir dari hal-hal kecil. Di tengah lapangan dan langit yang terbentang, momen itu tersimpan sebagai kenangan hangat yang sulit dilupakan.', 'article5.jpg', 25, '2025-12-29', '2025-12-29 03:36:48', '2025-12-29 15:11:26'),
(12, 3, 3, 'Suara yang Mencari Arah', 'suara-yang-mencari-arah', 'Di ruangan latihan debat, kata-kata bergantian meluncur, mencari tempatnya di antara argumen dan pendapat. Suasana serius terasa hangat karena semua fokus pada pertukaran ide, mendengar dengan seksama, dan mencoba memahami sudut pandang lain. Setiap suara yang terdengar menambah pengalaman, sekaligus membentuk keberanian untuk berbicara di depan orang lain.\r\n\r\nLatihan debat bukan hanya soal memenangkan argumen, tetapi juga tentang belajar mendengar, berpikir cepat, dan menyusun gagasan dengan jelas. Di tengah diskusi yang kadang sengit dan penuh semangat, ada pelajaran tentang kesabaran, kerja sama, dan percaya diri. Ruangan itu menjadi tempat di mana pemikiran diasah, dan suara perlahan menemukan kekuatannya.', 'article6.jpg', 98, '2025-12-29', '2025-12-29 05:35:31', '2025-12-31 17:07:02'),
(13, 3, 1, 'Halaman yang Berbisik di Ombak', 'halaman-yang-berbisik-di-ombak', 'Di tepi pantai, halaman buku terbuka pelan, sementara ombak berirama di kejauhan. Angin laut membawa aroma garam dan ketenangan, seolah ikut membalik halaman dan menenangkan pikiran. Setiap kata dalam buku terasa lebih hidup ketika ditemani suara alam yang lembut, menciptakan momen damai yang sulit ditemukan di tempat lain.\r\n\r\nMembaca di pantai bukan sekadar menyerap cerita, tetapi juga memberi kesempatan untuk berhenti sejenak dari kesibukan. Matahari yang hangat, pasir yang menempel di kaki, dan suara ombak menjadi teman setia, mengajarkan bahwa kadang ketenangan datang dari hal-hal sederhana. Di antara buku dan laut, waktu seakan melambat, meninggalkan kenangan yang menenangkan hati.', 'article7.jpg', 81, '2025-12-29', '2025-12-29 05:41:30', '2025-12-30 10:13:15'),
(27, 5, 3, 'Tidak Semua Pendakian Mudah', 'tidak-semua-pendakian-mudah', 'Tidak semua pendakian dimulai dengan keyakinan penuh. Ada kalanya langkah pertama diambil dengan ragu, napas masih belum beraturan, dan pikiran dipenuhi pertanyaan: apakah aku mampu sampai? Namun seperti hidup, pendakian tidak pernah menunggu kesiapan sempurna. Ia menuntut keberanian untuk melangkah, meski belum tahu seberapa panjang jalan di depan.\r\n\r\nDi awal perjalanan, semuanya terasa ringan. Langkah masih cepat, semangat masih utuh. Tetapi semakin tinggi kita melangkah, jalur mulai menanjak. Beban terasa bertambah, kaki mulai gemetar, dan napas semakin berat. Pada titik inilah banyak orang mulai berhenti, bukan karena jalannya terlalu sulit, tetapi karena mereka tidak siap menghadapi rasa lelah.\r\n\r\nPendakian mengajarkan bahwa lelah bukan musuh. Ia adalah tanda bahwa kita sedang bergerak, sedang berjuang. Sama seperti hidup, tidak semua hari dipenuhi pencapaian. Ada hari-hari di mana satu langkah saja terasa sangat berat. Namun justru langkah kecil itulah yang sering kali membawa kita lebih dekat pada tujuan.', 'tidak-semua-pendakian-mudah-1767339282.jpg', 100, '2026-01-02', '2026-01-02 07:34:44', '2026-01-02 07:36:33'),
(28, 3, 2, 'Aku Tidak Diam, Aku Mengalir', 'aku-tidak-diam-aku-mengalir', 'Aku belajar satu hal dari air: ia tidak pernah diam. Bahkan ketika jatuh dari ketinggian, ketika menghantam batu, ketika terpecah menjadi ribuan percikan, air tetap memilih untuk mengalir. Ia tidak melawan takdirnya dengan keras, tetapi juga tidak menyerah pada keadaan. Ia terus bergerak, dengan caranya sendiri.\r\n\r\nDalam hidup, ada masa di mana kita merasa seperti air yang jatuh dari tebing curam. Rencana runtuh, harapan patah, dan arah terasa kabur. Di titik itu, banyak orang mengira diam adalah satu-satunya pilihan. Padahal, seperti air, kita masih bisa bergerak—meski pelan, meski tidak terlihat oleh siapa pun.\r\n\r\nMengalir bukan berarti lemah. Air yang lembut mampu membentuk batu melalui waktu. Ia tidak tergesa-gesa, tetapi konsisten. Hidup pun demikian. Kita tidak harus selalu kuat di hadapan semua orang. Cukup terus melangkah, terus berproses, dan terus bertahan, meski dalam senyap.\r\n\r\nAda saatnya kita harus jatuh agar bisa menemukan jalur baru. Air tidak pernah memaksa jalannya lurus; ia menyesuaikan diri dengan lekuk bumi. Begitu pula manusia. Ketika satu jalan tertutup, bukan berarti perjalanan selesai. Bisa jadi kita hanya diminta untuk mengalir ke arah yang berbeda.', 'aku-tidak-diam-aku-mengalir-1767339820.jpg', 90, '2026-01-02', '2026-01-02 07:43:40', '2026-01-02 07:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_afifahgha@gmail.com|127.0.0.1', 'i:2;', 1766960610),
('laravel_cache_afifahgha@gmail.com|127.0.0.1:timer', 'i:1766960610;', 1766960610);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Belajar', 'ruang-belajar', '2025-12-22 10:24:20', '2025-12-22 10:24:20'),
(2, 'Di Antara Semua Itu', 'di-antara-semua-itu', '2025-12-22 10:25:18', '2025-12-22 10:25:18'),
(3, 'Jejak Perubahan', 'jejak-perubahan', '2025-12-22 10:25:32', '2025-12-22 10:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_19_160233_create_categories_table', 1),
(5, '2025_12_19_160234_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DxM8fCMeRIwF73dNhogB45iewkpPMLOFX9aMktXU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEhjdzQ1eVd1eVR2QWNkUkdMS2JSMkpUREk2bUd0c2FxTjF6Vk5jQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9fQ==', 1767339914),
('fo2v3fDlKijIUxmq3ZqoLhpMgGn4XSDuTiQ7V63d', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUjBLdm1SODhxUEI4UzRTY2JnMEZDdjhqZ1RncFBNenk4MEI2dWdMUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2NzMzNjI5MTt9fQ==', 1767336291);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(2) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'afifah', 'afifah@gmail.com', NULL, '$2y$12$Qt2oSMzAnOVQZLcArsZE8eP3EYWlj4yD5VklQ096PnyPKcVdhSRCe', '1', NULL, '2025-12-23 07:12:42', '2025-12-23 10:26:56'),
(3, 'Andi', 'andi@gmail.com', NULL, '$2y$12$EEzbPSNcu3ZQjmhX4xJeZuWMI4AcvhBtMgbTWp3PF66mKLuB5Om2O', '2', NULL, '2025-12-23 09:03:24', '2025-12-23 09:03:24'),
(5, 'aska', 'aska@gmail.com', NULL, '$2y$12$GLao947OPgBh874DtciHZeDPJ9GT.8406MkCLhJDb174ISpKm39JG', '2', NULL, '2025-12-31 07:01:06', '2025-12-31 07:01:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_index` (`category_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
