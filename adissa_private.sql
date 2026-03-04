-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Feb 2026 pada 05.58
-- Versi server: 8.4.3
-- Versi PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `adissa_private`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasis`
--

CREATE TABLE `evaluasis` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `pertemuan_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `catatan_guru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evaluasis`
--

INSERT INTO `evaluasis` (`id`, `siswa_id`, `pertemuan_id`, `tanggal`, `catatan_guru`, `created_at`, `updated_at`) VALUES
(39, 77, 36, '2026-02-13', 'Dikte 80\r\nAlhamdulillah sudah banyak kemajuan, semangat terus les nya', '2026-02-12 21:35:31', '2026-02-12 21:35:31'),
(40, 108, 37, '2026-02-16', 'Adzriel kamu bagus banget, terus dipertahankan ya biar mamah bangga', '2026-02-16 01:18:27', '2026-02-16 01:18:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Baca', '2025-12-09 00:58:47', '2025-12-09 00:58:47'),
(2, 'Tulis', '2025-12-09 00:58:47', '2025-12-09 00:58:47'),
(3, 'Hitung', '2025-12-09 00:58:48', '2025-12-09 00:58:48'),
(4, 'Mengaji', '2025-12-09 00:58:48', '2025-12-09 00:58:48'),
(5, 'Matematika', '2025-12-09 22:38:19', '2025-12-09 22:38:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_08_065308_create_siswas_table', 1),
(5, '2025_12_08_065317_create_mapels_table', 1),
(6, '2025_12_08_065322_create_nilais_table', 1),
(7, '2025_12_08_065329_create_feedback_table', 1),
(8, '2025_12_10_060753_create_mapel_siswa_table', 2),
(9, '2025_12_15_094847_add_foto_to_siswa_table', 3),
(10, '2025_12_19_054855_add_token_to_siswa_table', 4),
(11, '2025_12_30_060229_create_evaluasis_table', 5),
(12, '2025_12_31_093209_create_pertemuan_table', 6),
(13, '2026_01_01_042001_create_pertemuan_table', 7),
(17, '2026_01_01_042035_add_pertemuan_id_to_nilai_table', 8),
(18, '2026_01_01_061816_add_pertemuan_id_fix_to_nilais_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `pertemuan_id` bigint UNSIGNED DEFAULT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `siswa_id`, `mapel_id`, `pertemuan_id`, `nilai`, `created_at`, `updated_at`) VALUES
(153, 77, 1, 36, 80, '2026-02-12 21:35:31', '2026-02-12 21:35:31'),
(154, 77, 3, 36, 80, '2026-02-12 21:35:31', '2026-02-12 21:35:31'),
(155, 77, 2, 36, 80, '2026-02-12 21:35:31', '2026-02-12 21:35:31'),
(156, 108, 1, 37, 100, '2026-02-16 01:18:27', '2026-02-16 01:18:27'),
(157, 108, 3, 37, 100, '2026-02-16 01:18:27', '2026-02-16 01:18:27'),
(158, 108, 4, 37, 100, '2026-02-16 01:18:27', '2026-02-16 01:18:27'),
(159, 108, 2, 37, 100, '2026-02-16 01:18:27', '2026-02-16 01:18:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `pertemuan_ke` int UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `siswa_id`, `pertemuan_ke`, `tanggal`, `created_at`, `updated_at`) VALUES
(36, 77, 1, '2026-02-13', '2026-02-12 21:35:31', '2026-02-12 21:35:31'),
(37, 108, 1, '2026-02-16', '2026-02-16 01:18:27', '2026-02-16 01:18:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `nama_orangtua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak_orangtua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nama`, `kelas`, `alamat`, `nama_orangtua`, `kontak_orangtua`, `foto`, `created_at`, `updated_at`, `token`) VALUES
(19, 'MUHAMMAD RAY DECFIAN', '2', 'JL. CIKADUT RT 02/03', 'PEPIH', '08977099057', NULL, '2026-02-12 03:00:00', '2026-02-12 03:00:00', NULL),
(20, 'KEANU AFFAN MUZAKKI', '3', 'JL. JAMARAS 3 ATAS RT 03/17', 'DIAN LISNA', '081902723277', NULL, '2026-02-12 03:00:01', '2026-02-12 03:00:01', NULL),
(21, 'JANITRA MAULIDA RAMANIYA', '8', 'JL. CIKADUT NO38 RT 02/03', 'DESI PURBASARI', '085860609041', NULL, '2026-02-12 03:00:02', '2026-02-12 03:00:02', NULL),
(22, 'AL GIANDRA', 'PRA', 'BBK SEKEBIRU RT 05/01', 'ELIANA HERNI', '0895388333982', NULL, '2026-02-12 03:00:03', '2026-02-12 03:00:03', NULL),
(23, 'REVIA GEMALA', '1', 'JL GOLF BARAT 1 NO 26', 'FRIDA ANASTASIA', '085860288829', NULL, '2026-02-12 03:00:04', '2026-02-12 03:00:04', NULL),
(24, 'HAZIQ SHAADZIKRI', 'PRA', 'JL. JAMARAS 4 RT 02/01', 'AJAT SUDRAJAT', '089676278772', NULL, '2026-02-12 03:00:05', '2026-02-12 03:00:05', NULL),
(25, 'AZALEA QIMORA FIRDAUS', 'TK', 'JL. AH NASUTION GG JAMARAS 3', 'REGINA NOERFADILLA', '087719668158', NULL, '2026-02-12 03:00:06', '2026-02-12 03:00:06', NULL),
(26, 'CINTYA RISQI AZALIA', '1', 'JAMARAS RT 002/017', 'HELMI MA', '083177216720', NULL, '2026-02-12 03:00:07', '2026-02-12 03:00:07', NULL),
(27, 'ANDRE XAVIER F.A', '1', 'JAMARAS RT 002/017', 'HELMI MA', '083177216720', NULL, '2026-02-12 03:00:08', '2026-02-12 03:00:08', NULL),
(28, 'KHANZA FATIMAH AZZAHRA MULYANA', '2', 'CIKADUT', 'AYU SANTIKA', '081573244877', NULL, '2026-02-12 03:00:09', '2026-02-12 03:00:09', NULL),
(29, 'NANDIRA WINONA HUMAIRA', '6', 'KP MANDE NO 31', 'TONO', '085860611841', NULL, '2026-02-12 03:00:10', '2026-02-12 03:00:10', NULL),
(30, 'MOCHAMMAD FATHAN', '2', 'JL CIKADUT', 'IIS RATNASARI', '083117666552', NULL, '2026-02-12 03:00:11', '2026-02-12 03:00:11', NULL),
(31, 'KANZA WIJAYA SAPUTRA', '5', 'JL. JAMARAS 6', 'RIRIN RIANTI', '082211311820', NULL, '2026-02-12 03:00:12', '2026-02-12 03:00:12', NULL),
(32, 'FAYRA INARA AFRISHA', 'TK', 'KERTASARI', 'MILA', '089675596766', NULL, '2026-02-12 03:00:13', '2026-02-12 03:00:13', NULL),
(33, 'HANAN KHOIR ABDILLAH', '1', 'JL. JAMARAS 1', 'TATANG ROHMAT', '08572236323', NULL, '2026-02-12 03:00:14', '2026-02-12 03:00:14', NULL),
(34, 'IGE ALDIO ELFHAZARI', '6', 'JAMARAS RT 002/017', 'DION', '085280876464', NULL, '2026-02-12 03:00:15', '2026-02-12 03:00:15', NULL),
(35, 'BAGAS SAPUTRA', '5', 'BABAKAN SEKEBIRU ', 'DARMI', '088223457619', NULL, '2026-02-12 03:00:16', '2026-02-12 03:00:16', NULL),
(36, 'WAAFA HUMAYRA AZAHRA', '6', 'JL. AH NASUTION NO 160', 'SRI HANDAYANI', '083824458965', NULL, '2026-02-12 03:00:17', '2026-02-12 03:00:17', NULL),
(37, 'VANIA NUR FADHILAH', '4', 'JL.JAMARAS 4', 'RATNA SRI', '089510755647', NULL, '2026-02-12 03:00:18', '2026-02-12 03:00:18', NULL),
(38, 'TASYA RIZKYA RAMADHANI', '6', 'JAMARAS 4', 'NINA', '083128886391', NULL, '2026-02-12 03:00:19', '2026-02-12 03:00:19', NULL),
(39, 'DELYA RIZKYA RAMADHANI', '6', 'JALAN JAMARS 4', 'NINA', '0838128886931', NULL, '2026-02-12 03:00:20', '2026-02-12 03:00:20', NULL),
(40, 'DASTAN ARKA ALFATIH', '2', 'FRIMANDE CLUSTER', 'ENI ROHAENI', '082111321408', NULL, '2026-02-12 03:00:21', '2026-02-12 03:00:21', NULL),
(41, 'MIKHAIL MALIK HUSEIN', '2', 'KAMPUNG MANDE', 'DINA D', '08977864308', NULL, '2026-02-12 03:00:22', '2026-02-12 03:00:22', NULL),
(42, 'ZEA AZKAYRA', '1', 'JL. CIKADUT', 'INA CAHYA', '087840268787', NULL, '2026-02-12 03:00:23', '2026-02-12 03:00:23', NULL),
(43, 'RAMDAN SETIAWAN', '3', 'JL. JAMARAS 4 RT 02/01', 'EMPAT', '0881023326118', NULL, '2026-02-12 03:00:24', '2026-02-12 03:00:24', NULL),
(44, 'SOFIA NAZWA HORI SALSABILA', '5', 'JL. CIKADUT', 'IIN SURYATIN', '083195322224', NULL, '2026-02-12 03:00:25', '2026-02-12 03:00:25', NULL),
(45, 'MUHAMAD ZIKRIE ALFAKIH SETIAWAN', '1', 'JALAN JAMARAS 4', 'HAERANI', '08312200246', NULL, '2026-02-12 03:00:26', '2026-02-12 03:00:26', NULL),
(46, 'MUHAMAD ABDUL HAFIDZ', '6', 'JL CIKADUT', 'NYIMAS', '08989701011', NULL, '2026-02-12 03:00:27', '2026-02-12 03:00:27', NULL),
(47, 'ATAYA NURANDINI', '6', 'JL. CIKADUT', 'IKE', '089503375000', NULL, '2026-02-12 03:00:28', '2026-02-12 03:00:28', NULL),
(48, 'SYANIA ANANDA KITA', '2', 'JL JAMARAS 3', 'MIA', '085794556505', NULL, '2026-02-12 03:00:29', '2026-02-12 03:00:29', NULL),
(49, 'IKBAL RAMADAN', '2', 'BBKN SEKEBIRU', 'SAPRI', '083829546857', NULL, '2026-02-12 03:00:30', '2026-02-12 03:00:30', NULL),
(50, 'RISHA ADIA RAYA', '2', 'JAMARAS 3', 'HARIS RISMAN', '08562267333', NULL, '2026-02-12 03:00:31', '2026-02-12 03:00:31', NULL),
(51, 'KEANU AL GHANI RIZQULLAH PRAWIRA', '4', 'JL CIKADUT', 'EDE SUHERMAN', '082218542124', NULL, '2026-02-12 03:00:32', '2026-02-12 03:00:32', NULL),
(52, 'FAISAL PUTRA PRATAMA', '2', 'CIKADUT', 'NUR WAHYUNI', '088220958109', NULL, '2026-02-12 03:00:33', '2026-02-12 03:00:33', NULL),
(53, 'YUKIHIRA ZIDANE ALAMSYAH', '1', 'JL CIKADUT DALAM', 'LINA', '085794766585', NULL, '2026-02-12 03:00:34', '2026-02-12 03:00:34', NULL),
(54, 'KHAIRUNISA PUTRI ROHENDI', '1', 'JL. CIKADUT NO 171', 'ANITA NURHAYATI', '083871582718', NULL, '2026-02-12 03:00:35', '2026-02-12 03:00:35', NULL),
(55, 'NADINE SAVINA BIANTARI', '1', 'JLN BUNISARI NO 12', 'AYUNI NUR', '081214857029', NULL, '2026-02-12 03:00:36', '2026-02-12 03:00:36', NULL),
(56, 'M KHALIF AZFAR MUSTOFA', '1', 'JL JAMARAS 3 NO 106', 'AGEUNG LESTIASARI', '082120848300', NULL, '2026-02-12 03:00:37', '2026-02-12 03:00:37', NULL),
(57, 'GIAZ M ALFATIH', '1', 'JL JAMARAS RT 03/01', 'NURUL', '082548745878', NULL, '2026-02-12 03:00:38', '2026-02-12 03:00:38', NULL),
(58, 'NADIRA ATHARI PUTRI ', 'TK', 'GG JAMARAS 3', 'RINA', '085933732576', NULL, '2026-02-12 03:00:39', '2026-02-12 03:00:39', NULL),
(59, 'LOUIS XAVIER SANJAYA', '1', 'KOMPLEK GIRI MANDE', 'FRANSISKA', '08112008065', NULL, '2026-02-12 03:00:40', '2026-02-12 03:00:40', NULL),
(60, 'REVAN ADITYA NUGRAHA', '4', 'JL CIKADUT', 'DIDIN', '083100818921', NULL, '2026-02-12 03:00:41', '2026-02-12 03:00:41', NULL),
(61, 'KEINARRA AISHA SUDIANA', 'TK', 'KOMPLEK MYHOME', 'LANI SURYANI', '081462202280', NULL, '2026-02-12 03:00:42', '2026-02-12 03:00:42', NULL),
(62, 'YASMIN NUR MAKAILAH', '2', 'JL.CIKADUT NO 171', 'NOVI', '083871582718', NULL, '2026-02-12 03:00:43', '2026-02-12 03:00:43', NULL),
(63, 'ASHALINA YUMNA NALADIFA', '1', 'JL.JAMARAS 4', 'SRI HANDAYANI', '083821559658', NULL, '2026-02-12 03:00:44', '2026-02-12 03:00:44', NULL),
(64, 'CHAIRUNNISA SALSABILA PUTRI', '1', 'JL. CIKADUT', 'WINI HARTINI', '08571647544', NULL, '2026-02-12 03:00:45', '2026-02-12 03:00:45', NULL),
(65, 'NADHIRA FAIZA AIZENA', '5', 'JAMARAS 4', 'MERI NV', '089655039408', NULL, '2026-02-12 03:00:46', '2026-02-12 03:00:46', NULL),
(66, 'MUHAMAD NUR ADITIA', '1', 'JL CIKADUT', 'KAERUDIN SAHRUL', '083107110815', NULL, '2026-02-12 03:00:47', '2026-02-12 03:00:47', NULL),
(67, 'AFRIN RIFAYA', '1', 'GRACELAND RESIDENCE', 'EKA F', '082178082189', NULL, '2026-02-12 03:00:48', '2026-02-12 03:00:48', NULL),
(68, 'ALFAREZI PRATAMA', '1', 'JL CIKADUT DALAM', 'RIRIN RIANTI', '0895371909596', NULL, '2026-02-12 03:00:49', '2026-02-12 03:00:49', NULL),
(69, 'IMAM HAMDI NASUTION', '2', 'JAMARAS 3 ATAS', 'ILHAM', '082126424585', NULL, '2026-02-12 03:00:50', '2026-02-12 03:00:50', NULL),
(70, 'AHMDA AZZAM NAUFAL', '2', 'JAMARAS 1', 'WINA SUMARTINI', '088218784049', NULL, '2026-02-12 03:00:51', '2026-02-12 03:00:51', NULL),
(71, 'MIKAYLA PUTRI HOBIR', '1', 'JL JAMARAS TIMUR', 'SILVIA', '089670070036', NULL, '2026-02-12 03:00:52', '2026-02-12 03:00:52', NULL),
(72, 'OKI SURYATI', '4', 'GG JAMARAS 3', 'TITA ', '087725829637', NULL, '2026-02-12 03:00:53', '2026-02-12 03:00:53', NULL),
(73, 'NAURA RIFDATUNNISA ASHIAM', 'TK', 'JAMARAS 3 NO 48', 'SYAHRUL SIDDIQ ASHIAM', '088809449163', NULL, '2026-02-12 03:00:54', '2026-02-12 03:00:54', NULL),
(74, 'M REYNARD ALGHAISAN', 'TK', 'JL SIMPANG SARI', 'ERNI', '081313101052', NULL, '2026-02-12 03:00:55', '2026-02-12 03:00:55', NULL),
(75, 'ARVINO KHALIF PUTRA MAHENDRA', '1', 'JL JAMARAS 4', 'ROSMIATI', '0895333381573', NULL, '2026-02-12 03:00:56', '2026-02-12 03:00:56', NULL),
(76, 'ABDHY MUHAMMAD ', '1', 'KP MANDE ', 'TEDI SUPRIATNA', '082214992112', NULL, '2026-02-12 03:00:57', '2026-02-12 03:00:57', NULL),
(77, 'ZAFKHIL SADILLAH AFNAN', 'TK', 'JLN CIKADUT NO 110', 'VERA WIDIA', '088806312489', NULL, '2026-02-12 03:00:58', '2026-02-12 03:00:58', NULL),
(78, 'AZRIL RAFFASYA IDRIS', '1', 'JAMARAS 4', 'RISKA', '087828920986', NULL, '2026-02-12 03:00:59', '2026-02-12 03:00:59', NULL),
(79, 'DANESHA PUTRI AULIA', '2', 'JL CIKADUT KP CIJATI', 'PETI MARWATI', '087874551023', NULL, '2026-02-12 03:01:00', '2026-02-12 03:01:00', NULL),
(80, 'MUHAMMAD DYLAN REFIANDI', '2', 'JL JAMARAS', 'BELA', '083866149669', NULL, '2026-02-12 03:01:01', '2026-02-12 03:01:01', NULL),
(81, 'AKBAR RAYYAN ALFARIZQI', '2', 'JL CIKADUT ', 'NUNUNG NURIELA', '085861249201', NULL, '2026-02-12 03:01:02', '2026-02-12 03:01:02', NULL),
(82, 'RALINKA AZMYA NALADHIPA', '1', 'JL AH NASUTION NO 23', 'MERIANA BELINDA', '082318171016', NULL, '2026-02-12 03:01:03', '2026-02-12 03:01:03', NULL),
(83, 'MEIRO AZ ZAHRA PUTRI ARTANTI', 'TK', 'JL CIKADUT DLM', 'NISSA', '085156281124', NULL, '2026-02-12 03:01:04', '2026-02-12 03:01:04', NULL),
(84, 'SHAQUEENA ANDRA PUTRI', 'PRA', 'JL BABAKAN SEKEBIRU', 'PIPIT', '087737661777', NULL, '2026-02-12 03:01:05', '2026-02-12 03:01:05', NULL),
(85, 'SHAQIERA PUTRI FIRMANSYAH', '1', 'JL BABAKAN SEKEBIRU', 'PIPIT', '087737661777', NULL, '2026-02-12 03:01:06', '2026-02-12 03:01:06', NULL),
(86, 'ANNISA FAIHA ZAHRA', '2', 'KP MANDE ', 'KARNADI ', '08282218769432', NULL, '2026-02-12 03:01:07', '2026-02-12 03:01:07', NULL),
(87, 'FATHAN ALMAISAN ZHAFAK', '2', 'KP CITATAH', 'TINI ANGGRAENI', '085314023365', NULL, '2026-02-12 03:01:08', '2026-02-12 03:01:08', NULL),
(88, 'AQILLA YASMIN HUWAIDA', 'TK', 'KP MANDE', 'SOLIKHATUN', '085985647899', NULL, '2026-02-12 03:01:09', '2026-02-12 03:01:09', NULL),
(89, 'NAUFAL AFFAN NAJID', '1', 'JAMARAS', 'KURNIATI', '083822696985', NULL, '2026-02-12 03:01:10', '2026-02-12 03:01:10', NULL),
(90, 'ARSA SYAHIN RAHMADI', '2', 'JL CIKADUT NO 80', 'APRIZAL', '083153341209', NULL, '2026-02-12 03:01:11', '2026-02-12 03:01:11', NULL),
(91, 'TAKISHA ISLAMADINA FIRDAUS', 'PRA', 'JALAN JAMARAS 3', 'FINNA SEPHIA', '085294122912', NULL, '2026-02-12 03:01:12', '2026-02-12 03:01:12', NULL),
(92, 'M REVAN TRIRAMADHANI', '2', 'JL CIKADUT NO 59', 'NINA', '083167106875', NULL, '2026-02-12 03:01:13', '2026-02-12 03:01:13', NULL),
(93, 'AMANDA RISTY ANJANI', '1', 'JL SIMPANG SARI', 'SARYONO', '083829333208', NULL, '2026-02-12 03:01:14', '2026-02-12 03:01:14', NULL),
(94, 'NAFISHA KHUMAIRA', 'PRA', 'JAMARAS 2', 'HADIAT', '083144798458', NULL, '2026-02-12 03:01:15', '2026-02-12 03:01:15', NULL),
(95, 'AFKA DJALU RAFFASYA', 'TK', 'JL CIKADUT NO 252', 'PUNI APRIANI', '082120141918', NULL, '2026-02-12 03:01:16', '2026-02-12 03:01:16', NULL),
(96, 'FAUZIAH NURUL KAMILA', 'TK', 'JL CIKADUT', 'LIA KARMILA', '089516080921', NULL, '2026-02-12 03:01:17', '2026-02-12 03:01:17', NULL),
(97, 'SHANUM KHAIRUNNISA NUGRAHA', 'TK', 'KOMPLEK PEMDA CINGISED', 'KUSMA', '082227703363', NULL, '2026-02-12 03:01:18', '2026-02-12 03:01:18', NULL),
(98, 'RAMDAN LEYUS ANUGRAH', 'TK', 'JL JAMARAS 2', 'YUSUF KURNIAWAN', '08986425881', NULL, '2026-02-12 03:01:19', '2026-02-12 03:01:19', NULL),
(99, 'HISAM HAUZAN NUGRAHA', '1', 'KOMPLEK PEMDA CINGISED', 'KUSMA IMAMA', '082227703363', NULL, '2026-02-12 03:01:20', '2026-02-12 03:01:20', NULL),
(100, 'AZKA MAULANA SIDIQ', 'TK', 'JL CIKADUT DALAM GG BIDAN SUTIEM', 'ENCENG KOSTAWAN', '081572852707', NULL, '2026-02-12 03:01:21', '2026-02-12 03:01:21', NULL),
(101, 'AZKAYRA YASNA MALAIKA', 'TK', 'JL CIKADUT DALAM GG BIDAN SUTIEM', 'ENCENG KOSTAWAN', '081572852707', NULL, '2026-02-12 03:01:22', '2026-02-12 03:01:22', NULL),
(102, 'WIZY JEVANO WIRADI', '6', 'KOMPLEK GIRI MANDE', 'DWI BUDI', '088218750782', NULL, '2026-02-12 03:01:23', '2026-02-12 03:01:23', NULL),
(103, 'ADIKA HANIF ALZAIDAN', '2', 'JL JAMARAS 3 NO 132', 'SELI MELIANI', '087822704270', NULL, '2026-02-12 03:01:24', '2026-02-12 03:01:24', NULL),
(104, 'SKOLASTIKA S', 'PRA', 'GG ABDUL ROHMAN', 'SITECNA SIAHAAN', '08128077190', NULL, '2026-02-12 03:01:25', '2026-02-12 03:01:25', NULL),
(105, 'GIVITRA RAMADHANI FITRIA', '6', 'CIKADUT NO 66', 'NURLELA', '0895343203301', NULL, '2026-02-12 03:01:26', '2026-02-12 03:01:26', NULL),
(106, 'BILAL FAAIH RABBANI', 'PRA', 'JL JAMARAS 3 ', 'USEP SUNANDAR', '089516081641', NULL, '2026-02-12 03:01:27', '2026-02-12 03:01:27', NULL),
(107, 'ARSYA RISYANTA', '4', 'JL SIMPANG SARI', 'CITRA', '085794789480', NULL, '2026-02-12 03:01:28', '2026-02-12 03:01:28', NULL),
(108, 'M Adzriel Fauzan', '1', 'Jalan jamaras 3 no 178', 'Ade Suhendar', '083822595628', NULL, '2026-02-16 01:17:45', '2026-02-16 01:17:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guru') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guru',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'akuadit37@gmail.com', NULL, '$2y$12$7SAotKqM.c.Zad.tnkUNIOzo5XxbNtuRCv1OufDEJzYe1cJLxBakO', 'admin', NULL, '2025-12-09 00:58:47', '2025-12-14 23:53:57'),
(2, 'Guru', 'susiehera123@gmail.com', NULL, '$2y$12$MfgxT0Lxx0Kwf2vyqzFMDOgiaXb5lH3jTvzjgsxGGAPCAAHiwrUQy', 'guru', NULL, '2025-12-09 00:58:47', '2025-12-09 00:58:47');

--
-- Indeks untuk tabel yang dibuang
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
-- Indeks untuk tabel `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasis_siswa_id_foreign` (`siswa_id`),
  ADD KEY `evaluasis_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_siswa_id_foreign` (`siswa_id`);

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
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_siswa_mapel_id_foreign` (`mapel_id`),
  ADD KEY `mapel_siswa_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilais_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilais_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuans_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_token_unique` (`token`);

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
-- AUTO_INCREMENT untuk tabel `evaluasis`
--
ALTER TABLE `evaluasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD CONSTRAINT `evaluasis_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluasis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD CONSTRAINT `mapel_siswa_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD CONSTRAINT `pertemuans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
