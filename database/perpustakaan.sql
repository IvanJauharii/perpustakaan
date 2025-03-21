-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2025 at 10:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllBuku` ()   BEGIN
	SELECT * FROM buku;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `poto_buku` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `deleted_at`, `poto_buku`, `judul`, `id_kategori`, `penulis`, `penerbit`, `description`, `code`, `tahun_terbit`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'https://upload.wikimedia.org/wikipedia/id/f/ff/Filsafat-teras-5c6141eec112fe4c8123aeb2.jpg?20200316095421', 'Filosofi Teras', 3, 'Henry Manampiring', 'Kompas', 'Buku tentang filosofi stoikisme dan cara berpikir lebih tenang dalam hidup.', 'B001', '2018', 96, 'aktif', '2025-02-27 20:50:28', '2025-03-19 19:41:24'),
(2, NULL, 'https://bintangpusnas.perpusnas.go.id/api/getImage/978-979-168-333-3.jpg', 'Dari Penjara ke Penjara', 4, 'Tan Malaka', 'Narasi b', 'Memoar perjuangan politik Tan Malaka. abc', 'B003', '1948', 81, 'aktif', '2025-02-27 20:50:28', '2025-03-19 23:00:12'),
(3, NULL, 'https://cdn.gramedia.com/uploads/items/9786024246945_Laut-Bercerita.jpg', 'Laut Bercerita', 2, 'Leila S. Chudori', 'Gramedia', 'Novel berlatar sejarah tragedi 1998 di Indonesia.', 'B002', '2017', 121, 'aktif', '2025-02-27 20:50:28', '2025-03-19 23:01:57'),
(4, NULL, 'img/bookcovers/makanya-mikir.jpg', 'Makanya, Mikir!', 3, 'Abigail Limuria, Cania Citta', 'Simpul Aksara Grup', 'Buku berukuran 13,5 X 20 cm ini terdiri atas 8 bab yang membahas mulai cara menentukan tujuan hidup, menjelaskan pola pikir ilmiah, hingga panduan untuk menerapkan kecerdasan sosial. Penulis mengumpulkan berbagai kerangka berpikir beserta studi kasusnya yang secara personal telah mereka terapkan dalam hidup dan berguna bagi mereka untuk menentukan tujuan hidup, menyusun argumen, mengatur prioritas, mengambil keputusan dalam karier dan hubungan, menimbang risiko, memilah pertemanan, dan lain-lain', 'B004', '2025', 129, 'aktif', '2025-02-28 09:42:20', '2025-03-18 18:11:04'),
(6, NULL, 'img/bookcovers/1740799771.jpg', 'About You', 2, 'Tere Liye', 'Republika Penerbit', 'Thank you for the chance to know you, it was the biggest blessing that ever happened in my life.The old sayings were right; you don\'t need to seek for love, it will come to you.\r\nThank you.\r\nI won\'t cry because it\'s over, but I will smile because it happened.\r\nPast. Pain. Future. Dreams.\r\nAl ...', 'B006', '2016', 140, 'aktif', '2025-02-28 20:29:31', '2025-03-16 23:23:18'),
(8, NULL, 'img/bookcovers/1740800269.jpg', 'Life Is Wonderful', 3, 'Andrew Ho', 'Gramedia Pustaka Utama', 'Selama ini banyak hal sudah kita nikmati tanpa perlu bersusah payah, berpeluh, berurai air mata. Contohnya: kita masih bisa bernapas dengan gratis tanpa perlu bantuan tabung oksigen yang mahal, kita bisa melihat dan mendengar dengan baik, dan sebagainya.', 'B007', '2013', 122, 'aktif', '2025-02-28 20:37:49', '2025-03-18 18:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `buku_koleksi`
--

CREATE TABLE `buku_koleksi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_koleksi_buku` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku_koleksi`
--

INSERT INTO `buku_koleksi` (`id`, `id_koleksi_buku`, `id_buku`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 6, NULL, NULL),
(3, 2, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `nominal` bigint NOT NULL,
  `dibayar` tinyint(1) NOT NULL,
  `status` enum('lunas','belum') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dendas`
--

CREATE TABLE `dendas` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `nominal` int NOT NULL,
  `dibayar` int NOT NULL,
  `status` enum('lunas','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `deleted_at`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Teknologi', '2025-02-27 20:50:28', '2025-02-27 20:50:28'),
(2, NULL, 'Komunikasi', '2025-02-27 20:50:28', '2025-02-27 20:50:28'),
(3, NULL, 'Psikologi', '2025-02-27 20:50:28', '2025-03-13 07:58:49'),
(4, NULL, 'Religi', '2025-03-01 08:39:27', '2025-03-01 19:15:10'),
(5, NULL, 'Pemrograman', '2025-03-01 19:03:44', '2025-03-01 19:03:44'),
(6, NULL, 'Marketing', '2025-03-01 19:15:56', '2025-03-01 19:15:56'),
(7, NULL, 'Olahraga', '2025-03-14 23:58:46', '2025-03-14 23:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_buku`
--

CREATE TABLE `koleksi_buku` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `koleksi_buku`
--

INSERT INTO `koleksi_buku` (`id`, `deleted_at`, `id_peminjam`, `nama`, `created_at`, `updated_at`) VALUES
(2, NULL, 4, 'abc', '2025-03-19 20:53:27', '2025-03-19 20:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `list_kategori`
--

CREATE TABLE `list_kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `list_kategori`
--

INSERT INTO `list_kategori` (`id`, `deleted_at`, `id_kategori`, `id_buku`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 2, '2025-03-15 08:59:36', '2025-03-15 08:59:36'),
(2, NULL, 6, 3, '2025-03-15 08:59:36', '2025-03-15 08:59:36'),
(3, NULL, 2, 6, '2025-03-15 08:59:36', '2025-03-15 08:59:36'),
(4, NULL, 1, 1, '2025-03-15 08:59:36', '2025-03-15 08:59:36'),
(5, NULL, 7, 4, '2025-03-15 08:59:36', '2025-03-15 08:59:36'),
(6, NULL, 1, 8, '2025-03-15 08:59:36', '2025-03-15 08:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `list_pinjaman`
--

CREATE TABLE `list_pinjaman` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `id_peminjaman` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_10_055816_create_kategori_buku_table', 1),
(5, '2025_02_10_055916_create_buku_table', 1),
(6, '2025_02_10_153150_create_list_kategori_table', 1),
(7, '2025_02_13_030249_create_koleksi_buku_table', 1),
(8, '2025_02_13_030511_create_denda_table', 1),
(9, '2025_02_13_031457_create_ulasan_table', 1),
(10, '2025_02_13_032127_create_peminjam_table', 1),
(11, '2025_02_13_034501_create_petugas_table', 1),
(12, '2025_02_14_144437_create_peminjaman_table', 1),
(13, '2025_02_14_145154_create_list_pinjaman_table', 1),
(14, '2025_02_15_174604_create_permission_tables', 1),
(15, '2025_02_26_101333_create_dendas_table', 1),
(16, '2025_02_27_045300_create_bukus_table', 1),
(17, '2025_02_28_025609_add_id_kategori_to_buku_table', 1),
(18, '2025_03_03_024907_remove_rating_from_ulasan', 2),
(19, '2025_03_11_183030_add_nullable_peminjam', 3),
(20, '2025_03_15_150414_add_nullable_on_petugas', 4),
(21, '2025_03_16_002534_update_enum_status_peminjaman', 5),
(22, '2025_03_16_004944_create_new_peminjamans_table', 6),
(23, '2025_03_16_005330_create_notifikasi_table', 7),
(24, '2025_03_18_020126_add_tanggal_to_notifikasi_table', 8),
(25, '2025_03_19_154412_add_nama_petugas_to_notifikasi_table', 9),
(27, '2025_03_20_011758_add_nama_to_koleksi_table', 10),
(29, '2025_03_20_015205_buku_koleksi', 11),
(30, '2025_03_20_044251_add_status_to_buku_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_peminjamans`
--

CREATE TABLE `new_peminjamans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `id_petugas` bigint UNSIGNED DEFAULT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL DEFAULT 'dipinjam',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `new_peminjamans`
--

INSERT INTO `new_peminjamans` (`id`, `id_peminjam`, `id_petugas`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `tanggal_dikembalikan`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 9, 1, '2025-03-20', '2025-03-21', '2025-03-19', 'dikembalikan', NULL, '2025-03-18 19:31:59', '2025-03-18 19:36:13'),
(2, 4, 9, 1, '2025-03-20', '2025-03-21', '2025-03-19', 'dikembalikan', NULL, '2025-03-18 19:39:38', '2025-03-18 19:39:46'),
(3, 4, 9, 2, '2025-03-20', '2025-03-21', '2025-03-20', 'dikembalikan', NULL, '2025-03-19 19:41:12', '2025-03-19 19:41:24'),
(4, 4, 9, 2, '2025-03-20', '2025-03-21', '2025-03-20', 'dikembalikan', NULL, '2025-03-19 23:00:12', '2025-03-19 23:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `pesan` text,
  `nama_petugas` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_peminjam`, `id_buku`, `status`, `pesan`, `nama_petugas`, `deleted_at`, `created_at`, `updated_at`, `tanggal_peminjaman`, `tanggal_pengembalian`, `jumlah`) VALUES
(1, 4, 1, 'done', 'Peminjaman buku \"Filosofi Teras\" telah dikonfirmasi dan diselesaikan oleh petugas petugas2.', NULL, NULL, '2025-03-18 19:31:10', '2025-03-18 19:31:59', '2025-03-20', '2025-03-21', 1),
(2, 4, 1, 'done', 'Peminjaman buku \"Filosofi Teras\" telah dikonfirmasi dan diselesaikan oleh petugas petugas2.', NULL, NULL, '2025-03-18 19:39:16', '2025-03-18 19:39:38', '2025-03-20', '2025-03-21', 1),
(3, 4, 1, 'done', 'Buku \"Filosofi Teras\" telah dikembalikan pada 19-03-2025.', NULL, NULL, '2025-03-18 19:39:46', '2025-03-18 19:39:46', '2025-03-20', '2025-03-19', 1),
(4, 2, 3, 'confirmed', 'Petugas petugas2 telah mengonfirmasi permintaan peminjaman buku \"Laut Bercerita\". \n            <a href=\'http://marbabu.id/notifikasi/4/download-bukti\' class=\'text-blue-500 underline\'>Download Bukti Peminjaman</a>', NULL, NULL, '2025-03-18 23:53:39', '2025-03-18 23:53:55', '2025-03-20', '2025-03-21', 1),
(5, 1, 3, 'confirmed', 'Petugas petugas2 telah mengonfirmasi permintaan peminjaman buku \"Laut Bercerita\". \n            <a href=\'http://marbabu.id/notifikasi/5/download-bukti\' class=\'text-blue-500 underline\'>Download Bukti Peminjaman</a>', NULL, NULL, '2025-03-19 07:12:07', '2025-03-19 07:13:17', '2025-03-20', '2025-03-21', 1),
(6, 1, 6, 'confirmed', 'Petugas petugas2 telah mengonfirmasi permintaan peminjaman buku \"About You\". \n            <a href=\'http://marbabu.id/notifikasi/6/download-bukti\' class=\'text-blue-500 underline\' target=\'_blank\'>Download Bukti Peminjaman</a>', NULL, NULL, '2025-03-19 07:54:57', '2025-03-19 07:55:16', '2025-03-19', '2025-03-20', 1),
(7, 1, 8, 'confirmed', 'Petugas petugas2 telah mengonfirmasi permintaan peminjaman buku \"Life Is Wonderful\". \n            <a href=\'http://marbabu.id/notifikasi/7/download-bukti\' class=\'text-blue-500 underline\' target=\'_blank\'>Download Bukti Peminjaman</a>', NULL, NULL, '2025-03-19 08:47:29', '2025-03-19 08:47:50', '2025-03-20', '2025-03-21', 1),
(8, 1, 1, 'confirmed', 'Petugas petugas2 telah mengonfirmasi permintaan peminjaman buku \"Filosofi Teras\". \n            <a href=\'http://marbabu.id/notifikasi/8/download-bukti\' class=\'text-blue-500 underline\' target=\'_blank\'>Download Bukti Peminjaman</a>', 'petugas2', NULL, '2025-03-19 09:22:25', '2025-03-19 09:22:33', '2025-03-20', '2025-03-25', 1),
(9, 4, 2, 'done', 'Peminjaman buku \"Dari Penjara ke Penjara\" telah dikonfirmasi dan diselesaikan oleh petugas petugas2.', 'petugas2', NULL, '2025-03-19 19:38:04', '2025-03-19 19:41:12', '2025-03-20', '2025-03-21', 1),
(10, 4, 2, 'done', 'Buku \"Dari Penjara ke Penjara\" telah dikembalikan pada 20-03-2025.', NULL, NULL, '2025-03-19 19:41:24', '2025-03-19 19:41:24', '2025-03-20', '2025-03-20', 1),
(11, 4, 2, 'done', 'Peminjaman buku \"Dari Penjara ke Penjara\" telah dikonfirmasi dan diselesaikan oleh petugas petugas2.', 'petugas2', NULL, '2025-03-19 22:59:10', '2025-03-19 23:00:12', '2025-03-20', '2025-03-21', 1),
(12, 4, 2, 'done', 'Buku \"Dari Penjara ke Penjara\" telah dikembalikan pada 20-03-2025.', NULL, NULL, '2025-03-19 23:01:57', '2025-03-19 23:01:57', '2025-03-20', '2025-03-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `poto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `deleted_at`, `email`, `id_user`, `nama_lengkap`, `location`, `alamat`, `phone`, `poto`, `created_at`, `updated_at`) VALUES
(1, NULL, 'peterparker@gmail.com', 8, 'peter', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-15 15:05:16', '2025-03-15 15:05:16'),
(2, NULL, 'peminjam@gmail.com', 3, 'peminjam', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-15 15:05:16', '2025-03-15 15:05:16'),
(3, NULL, 'vpando@example.com', 4, 'vialpando', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-15 15:05:16', '2025-03-15 15:05:16'),
(4, NULL, 'carljohnson@gmail.com', 6, 'cj', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-15 15:05:16', '2025-03-15 15:05:16'),
(5, NULL, 'haha@gmail.com', 11, 'haha', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-17 22:58:09', '2025-03-17 22:58:09'),
(6, NULL, 'irsyad@gmail.com', 12, 'Irsyad Arsyaduta', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-18 21:45:28', '2025-03-18 21:45:28'),
(7, NULL, 'irfan@gmail.com', 13, 'irfan', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-19 19:47:16', '2025-03-19 19:47:16'),
(8, NULL, 'diah@gmail.com', 14, 'diah', NULL, NULL, NULL, 'https://api.dicebear.com/9.x/lorelei/svg', '2025-03-19 19:48:18', '2025-03-19 19:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_petugas` bigint UNSIGNED NOT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `poto` varchar(255) DEFAULT NULL,
  `role` enum('petugas','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `deleted_at`, `id_user`, `email`, `nama_lengkap`, `phone`, `alamat`, `poto`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 'petugas@gmail.com', 'adminbaik', '089122223333', 'Wijirejo, Pandak, Bantul, Yogyakarta', 'https://api.dicebear.com/9.x/lorelei/svg', 'admin', '2025-02-27 20:50:29', '2025-02-27 20:50:29'),
(2, NULL, 1, 'admin@gmail.com', 'admin2', NULL, NULL, NULL, 'admin', '2025-03-15 08:19:36', '2025-03-15 08:19:36'),
(3, NULL, 9, 'petugas2@gmail.com', 'petugas2', NULL, NULL, NULL, 'petugas', '2025-03-15 08:19:36', '2025-03-15 08:19:36'),
(4, NULL, 10, 'adminperpus@gmail.com', 'adminperpus', NULL, NULL, NULL, 'admin', '2025-03-15 08:19:36', '2025-03-15 08:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nJ1TYlOxmeQASHmZJxDldSo5iEEgbnoX8SJRpT1D', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFM2aWZ2bzJCRGxOd01WYWZ3S1NpM0x6M3k0YVh2SnhMMHN3cEpmcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9tYXJiYWJ1LmlkL2RldGFpbGJ1a3UvMiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1742452469),
('WXSb8Q2vALO4K1SaRLQBs6Ei7kzEUQw5ew8N5yYB', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUhIQTRUVmNWZFlscjVuM29IcDZKZFpjdWdFTlFhOEVRN3FPcnNQMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9tYXJiYWJ1LmlkL3BldHVnYXMvcGVtaW5qYW1hbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1742453387);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_peminjam` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `ulasan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `deleted_at`, `id_peminjam`, `id_buku`, `ulasan`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 1, 'bagus', '2025-03-18 20:16:37', '2025-03-18 20:16:37'),
(2, NULL, 2, 1, 'langsung jadi filsuff gweh jir', '2025-03-18 20:24:43', '2025-03-18 20:24:43'),
(3, NULL, 1, 3, 'doa untuk semua yang menjadi korban', '2025-03-19 07:28:33', '2025-03-19 07:28:33'),
(4, NULL, 4, 1, 'bagus', '2025-03-19 21:28:47', '2025-03-19 21:28:47'),
(5, NULL, 4, 1, 'tess', '2025-03-19 22:53:34', '2025-03-19 22:53:34'),
(6, NULL, 4, 1, 'tes lagi', '2025-03-19 22:55:17', '2025-03-19 22:55:17'),
(7, NULL, 4, 2, 'bagus', '2025-03-19 23:02:22', '2025-03-19 23:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('peminjam','petugas','admin') NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `deleted_at`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin2', 'admin', 'admin@gmail.com', NULL, '$2y$12$wRVffDUCnkp3Lcy3Uy81weTP7aF0qfdsSpgjdbvvKgq.chprc60fy', NULL, '2025-02-27 20:50:28', '2025-03-15 08:19:36'),
(2, NULL, 'petugas', 'petugas', 'petugas@gmail.com', NULL, '$2y$12$vO0Nand38.5lzt8quGgSCux3BCr5TSFLgxx6lRYbuBHWlJpsdfTY.', NULL, '2025-02-27 20:50:29', '2025-02-27 20:50:29'),
(3, NULL, 'peminjam', 'peminjam', 'peminjam@gmail.com', NULL, '$2y$12$sQA22WfJ79twgN16dPtg0.iU7CMIGnv49uUO35gYYoLH4SjTZH.Gu', NULL, '2025-02-27 20:50:29', '2025-03-15 08:19:36'),
(4, NULL, 'vialpando', 'peminjam', 'vpando@example.com', NULL, '$2y$12$OjuheKwDF0mVYReLHtpytO7e/mKHI4XiTMQ9MJx3K96VmzUczQAzu', NULL, '2025-03-11 08:05:52', '2025-03-11 08:05:52'),
(6, NULL, 'cj', 'peminjam', 'carljohnson@gmail.com', NULL, '$2y$12$nPUSsJZsbKPImW8t9LzsMOkSWbQY5LG6Zque5cKZds0TYdJNUm6AC', NULL, '2025-03-11 11:28:39', '2025-03-11 11:28:39'),
(8, NULL, 'peter', 'peminjam', 'peterparker@gmail.com', NULL, '$2y$12$71WvfeF8LXF3ETiRlxJnvuONU93RVylSzmIjEGiM.3UCtMlrqw5Wu', NULL, '2025-03-11 11:39:50', '2025-03-11 11:39:50'),
(9, NULL, 'petugas2', 'petugas', 'petugas2@gmail.com', NULL, '$2y$12$4KUhxV0cKdUaNF/MjxZw/O1sGCkptKHujVsRPlkT3heXP.RNgYZMC', NULL, NULL, '2025-03-15 08:19:36'),
(10, NULL, 'adminperpus', 'admin', 'adminperpus@gmail.com', NULL, '$2y$12$3rIBQKCw9SwDPRJVfS5KWe6bp7qjziI4Z6VIZtoLCFtGD2jb8PtKO', NULL, NULL, '2025-03-15 08:19:36'),
(11, NULL, 'haha', 'peminjam', 'haha@gmail.com', NULL, '$2y$12$DGJ3Heeuj3PUI1awrNfWoezqOxw4mMHiVcY7ESUSrWBgzCDv/eC4.', NULL, '2025-03-17 22:58:09', '2025-03-17 22:58:09'),
(12, NULL, 'Irsyad Arsyaduta', 'peminjam', 'irsyad@gmail.com', NULL, '$2y$12$M0e7cdD60aDYn5i3u35tm.5AiE9Fb3gBD8gQ7aXxWdwNYG3MeyD7y', NULL, '2025-03-18 21:45:28', '2025-03-18 21:45:28'),
(13, NULL, 'irfan', 'peminjam', 'irfan@gmail.com', NULL, '$2y$12$2ajT1f0cmDZmtCJqyl5lm..oXFDmHM5r84STRamyDQiyukeihzIVa', NULL, '2025-03-19 19:47:16', '2025-03-19 19:47:16'),
(14, NULL, 'diah', 'peminjam', 'diah@gmail.com', NULL, '$2y$12$lKmKudZV/ZEFDF/g/eYioORLiZqb7A/ZfgzsCVLpehe1MwIfFL9a.', NULL, '2025-03-19 19:48:18', '2025-03-19 19:48:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `buku_koleksi`
--
ALTER TABLE `buku_koleksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_koleksi_id_koleksi_buku_foreign` (`id_koleksi_buku`),
  ADD KEY `buku_koleksi_id_buku_foreign` (`id_buku`);

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
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dendas_id_peminjam_foreign` (`id_peminjam`);

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
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koleksi_buku`
--
ALTER TABLE `koleksi_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_kategori`
--
ALTER TABLE `list_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_kategori_id_kategori_foreign` (`id_kategori`),
  ADD KEY `list_kategori_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `list_pinjaman`
--
ALTER TABLE `list_pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_pinjaman_id_buku_foreign` (`id_buku`),
  ADD KEY `list_pinjaman_id_peminjaman_foreign` (`id_peminjaman`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `new_peminjamans`
--
ALTER TABLE `new_peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_peminjamans_id_peminjam_foreign` (`id_peminjam`),
  ADD KEY `new_peminjamans_id_petugas_foreign` (`id_petugas`),
  ADD KEY `new_peminjamans_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjam_id_user_foreign` (`id_user`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id_petugas_foreign` (`id_petugas`),
  ADD KEY `peminjaman_id_peminjam_foreign` (`id_peminjam`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_id_user_foreign` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_id_buku_foreign` (`id_buku`);

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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buku_koleksi`
--
ALTER TABLE `buku_koleksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `koleksi_buku`
--
ALTER TABLE `koleksi_buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_kategori`
--
ALTER TABLE `list_kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list_pinjaman`
--
ALTER TABLE `list_pinjaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `new_peminjamans`
--
ALTER TABLE `new_peminjamans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buku_koleksi`
--
ALTER TABLE `buku_koleksi`
  ADD CONSTRAINT `buku_koleksi_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buku_koleksi_id_koleksi_buku_foreign` FOREIGN KEY (`id_koleksi_buku`) REFERENCES `koleksi_buku` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dendas`
--
ALTER TABLE `dendas`
  ADD CONSTRAINT `dendas_id_peminjam_foreign` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `list_kategori`
--
ALTER TABLE `list_kategori`
  ADD CONSTRAINT `list_kategori_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `list_kategori_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `list_pinjaman`
--
ALTER TABLE `list_pinjaman`
  ADD CONSTRAINT `list_pinjaman_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `list_pinjaman_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_peminjamans`
--
ALTER TABLE `new_peminjamans`
  ADD CONSTRAINT `new_peminjamans_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_peminjamans_id_peminjam_foreign` FOREIGN KEY (`id_peminjam`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_peminjamans_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_id_peminjam_foreign` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
