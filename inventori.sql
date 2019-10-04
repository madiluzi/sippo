-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 05:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nama_akun_bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detailpemesanan` int(11) NOT NULL,
  `id_pemesanan` int(10) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `berat` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detailpemesanan`, `id_pemesanan`, `id_produk`, `jumlah`, `harga`, `berat`) VALUES
(35, 1, 43, 76, 1200000, '6'),
(36, 2, 43, 61, 11900, '7'),
(37, 3, 43, 83, 1400000, '1'),
(38, 4, 43, 56, 800000, '3'),
(39, 5, 43, 41, 140000, '8'),
(40, 6, 43, 63, 900000, '10'),
(41, 7, 43, 62, 285000, '7'),
(42, 8, 43, 40, 735000, '7'),
(43, 9, 43, 59, 16800, '3'),
(44, 10, 43, 72, 468000, '8');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Minuman Coklat'),
(2, 'Makanan Coklat'),
(3, 'Makanan Roti Kering'),
(4, 'Minuman Kopi'),
(5, 'Minuman Kopi Luwak'),
(6, 'Kopi VISCO'),
(7, 'Sabun');

-- --------------------------------------------------------

--
-- Table structure for table `kemasan`
--

CREATE TABLE `kemasan` (
  `id_kemasan` int(11) NOT NULL,
  `jenis_kemasan` varchar(20) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(10) NOT NULL,
  `id_pemesanan` int(10) NOT NULL,
  `id_bank` int(10) NOT NULL,
  `nama_akun_bank` varchar(20) NOT NULL,
  `akun_bank` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `telepon` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_kemasan` int(11) NOT NULL,
  `ongkos_kirim` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `nama_penerima`, `alamat_penerima`, `kota`, `tgl_pesan`, `id_pengirim`, `id_kemasan`, `ongkos_kirim`) VALUES
(1, 60, 'Janet Greene', '30430 Lake View Place', 'As Samawah', '2017-05-12', 4, 9, 11100),
(2, 59, 'Cheryl Wells', '154 Emmet Hill', 'Bragança Paulista', '2017-05-13', 5, 12, 16621),
(3, 36, 'Sharon Chapman', '71415 Arkansas Court', 'Fengyan', '2017-05-14', 4, 10, 17007),
(4, 28, 'Deborah Mccoy', '380 Michigan Plaza', 'Usol’ye', '2017-05-15', 2, 1, 13366),
(5, 53, 'Timothy Ray', '1 Orin Parkway', 'Phnom Penh', '2017-05-16', 4, 1, 13973),
(6, 59, 'Doris Owens', '06869 Bluejay Hill', 'Springfield', '2017-05-17', 5, 5, 22978),
(7, 37, 'Larry Reynolds', '41 7th Junction', 'Karmai', '2017-05-18', 3, 4, 16735),
(8, 16, 'Cynthia Burke', '1088 Westerfield Lane', 'Ban Na Muang', '2017-05-19', 1, 1, 22164),
(9, 74, 'Lois Scott', '82016 Forest Court', 'La’ershan', '2017-05-20', 3, 5, 13883),
(10, 75, 'Adam Kim', '33 Union Center', 'Shuangjiang', '2017-05-21', 2, 3, 16064);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `id_pengirim` int(11) NOT NULL,
  `nama_perusahaan` varchar(20) NOT NULL,
  `telepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_satuan` double NOT NULL,
  `berat` int(10) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_satuan`, `berat`, `gambar`, `jumlah_stok`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cokelat krim 150 ml', 3000, 0, 'images/8c11fbd9df98e082d3bd09459a4c9d99.jpeg', 80, '', '2017-04-30 17:00:01', '2017-05-10 17:26:06'),
(2, 1, 'Vicco 3 in 1 milk sachet curah', 1700, 0, NULL, 40, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(3, 1, 'Vicco 3 in 1 milk 200 gr', 14000, 0, NULL, 15, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(4, 1, 'Vicco 3 in 1 milk \r\n10 sachet @ 28 gr\r\n', 20000, 0, NULL, 17, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(5, 1, 'Vicco 3 in 1 milk 500 gr curah', 22500, 0, NULL, 0, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(6, 1, 'Vicco 3 in 1 milk 1.000 gr curah', 45000, 0, NULL, 0, '', '2017-04-30 17:00:01', '2017-05-10 16:19:28'),
(7, 1, 'Vicco 3 in 1 dark 10 sachet', 25000, 0, NULL, 1, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(8, 1, 'Vicco 3 in 1  dark sachet curah\r\n', 2100, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(9, 1, 'Vicco 3 in 1 dark 500 gr curah', 25000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(10, 1, 'Vicco 3 in 1 dark 1.000 gr curah', 50000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-01 08:57:40'),
(11, 1, 'Bubuk murni 50 gr', 7500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(12, 1, 'Bubuk murni \r\nIsi : 500 gr curah', 42500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(13, 1, 'Bubuk murni \r\nIsi : 1.000 gr curah', 85000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(14, 2, 'Cokelat bar besar milk 70 gr', 14000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(15, 2, 'Cokelat bar besar milk mente 70gr', 14000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(16, 2, 'Cokelat bar besar milk premium 70 gr', 16000, 0, NULL, 29, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(17, 2, 'Cokelat bar besar milk + mente \r\npremium 70 gr', 16000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(18, 2, 'Cokelat trapesium milk 60 gr', 14000, 0, NULL, 54, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(19, 2, 'Cokelat segitiga milk 40 gr', 10500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(20, 2, 'Cokelat tabung mente 9 pcs', 22000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-02 08:57:40'),
(21, 2, 'Cokelat tabung milk 200 gr', 45000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(22, 2, 'Cokelat tabung milk + mente 200 gr', 45000, 0, NULL, 21, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(23, 2, 'Cokelat tabung kopi 9 pcs', 22000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(24, 2, 'Cokelat pralin milk toples 500 gr', 105000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(25, 2, 'Cokelat pralin milk 500 gr curah', 100000, 0, NULL, 15, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(26, 2, 'Cokelat pralin milk 1 kg curah', 200000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(27, 2, 'Cokelat pralin milk+mente toples 500 gr', 105000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(28, 2, 'Cokelat pralin milk+mente 500 gr curah', 100000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(29, 2, 'Cokelat pralin milk+mente 1 kg curah', 200000, 0, NULL, 2, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(30, 2, 'Cokelat pralin milk+kopi 500 gr curah', 100000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-03 08:57:40'),
(31, 2, 'Cokelat pralin milk+kopi toples 500 gr ', 105000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(32, 2, 'Cokelat pralin milk+kopi 1 kg curah', 200000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(33, 2, 'Cokelat tabung milk + kopi 200 gr', 45000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(34, 2, 'Cokelat tabung Campur 150 gr', 36000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(35, 2, 'Cokelat Blok milk 500 gr', 61000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(36, 2, 'Cokelat Blok milk 1 kg', 122000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(37, 2, 'Cokelat Blok white 500 gr', 61000, 0, NULL, 26, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(38, 2, 'Cokelat Blok white 1 kg ', 122000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(39, 2, 'Cokelat bar besar Dark 70 gr', 14000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(40, 2, 'Cokelat bar besar dark mente 70gr', 14000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-04 08:57:40'),
(41, 2, 'Cokelat bar besar dark premium 70 gr', 16000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(42, 2, 'Cokelat bar besar dark + mente \r\npremium 70 gr', 16000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(43, 2, 'Cokelat bar kecil dark 25 gr', 6000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(44, 2, 'Cokelat segitiga dark 40 gr	', 10500, 0, NULL, 41, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(45, 2, 'Cokelat Trapesium dark 60 gr', 14000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(46, 2, 'Cokelat tabung dark 200 gr', 45000, 0, NULL, 31, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(47, 2, 'Cokelat tabung dark + mente 200 gr', 45000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(48, 2, 'Cokelat pralin dark toples 500 gr', 105000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(49, 2, 'Cokelat  pralin dark 500 gr curah', 100000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(50, 2, 'Cokelat pralin dark 1 kg curah', 200000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-05 08:57:40'),
(51, 2, 'Cokelat pralin dark+mente toples 500 gr', 105000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(52, 2, 'Cokelat pralin dark+mente 500 gr curah', 100000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(53, 2, 'Cokelat pralin dark+mente 1 kg curah', 200000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(54, 2, 'Cokelat Premium 10 pcs ', 48000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(55, 2, 'Cokelat Blok dark 500 gr curah', 61000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(56, 2, 'Cokelat Blok dark 1 kg curah', 122000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(57, 2, 'Cokelat Bar nabati kecil 25 gr', 2500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(58, 2, 'Cokelat Bar nabati besar 70 gr', 5000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(59, 2, 'Cokelat Pralin nabati piramid 5 pcs', 8500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(60, 2, 'Cokelat Pralin nabati toples 500 gr', 75000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-06 08:57:40'),
(61, 2, 'Cokelat Pralin nabati 500 gr curah', 70000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(62, 2, 'Cokelat Pralin nabati 1 kg curah', 140000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(63, 2, 'Cokelat Blok Nabati 500 gr ', 37500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(64, 2, 'Cokelat Blok Nabati 1.000 gr ', 75000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(65, 2, 'Lemak kakao 500 gr', 75000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(66, 2, 'Lemak kakao 1.000 gr', 150000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(67, 2, 'Pasta kakao kasar 500 gr', 37500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(68, 2, 'Pasta kakao kasar 1.000 gr', 75000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(69, 2, 'Pasta kakao halus 500 gr', 42500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(70, 2, 'Pasta kakao halus 1.000 gr', 90000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-07 08:57:40'),
(71, 3, 'ROKER (Roti Kering) WIJEN\r\nIsi : 110 gram', 12000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(72, 3, 'ROKER (Roti Kering) WIJEN\r\nIsi : 500 gr curah', 30000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(73, 3, 'ROKER (Roti Kering) WIJEN\r\nIsi :1.000 gr curah', 60000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(74, 3, 'Roker Monde\r\nIsi : 170 gram', 12000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(75, 3, 'Roker Monde\r\nIsi : 500 gram curah\r\n', 25000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(76, 3, 'Roker Monde\r\nIsi : 1.000 gram\r\n', 50000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(77, 3, 'ROKER (Roti Kering) SALJU\r\nIsi : + 230 gram', 12000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(78, 3, 'ROKER (Roti Kering) SALJU\r\nIsi : + 500  gram\r\n', 25000, 0, NULL, 31, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(79, 3, 'ROKER (Roti Kering) SALJU\r\nIsi : 1.000 gram\r\n', 50000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(80, 3, 'SUWAR-SUWIR\r\nIsi : 300 gram\r\n', 19000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-08 08:57:40'),
(81, 3, 'SUWAR-SUWIR\r\nIsi : 75 gram\r\n', 5000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(82, 3, 'SUWAR-SUWIR\r\nIsi : 500 gram curah\r\n', 25000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(83, 3, 'SUWAR-SUWIR\r\nIsi : 1.000 gram curah\r\n', 50000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(84, 3, 'Es krim Susu segar', 5000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(85, 3, 'Es krim Soya', 3000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(86, 3, 'Nata de cacao', 3000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(87, 4, 'KOMIK\r\nKopi Instan Minim Kafein\r\n1 Kotak = 10 Sachet\r\n', 22000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(88, 4, 'KOMIK G\r\nKopi Instan Minim Kafein Ekstrak Gingseng\r\n1 Kotak = 10 Sachet\r\n', 22000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(89, 4, 'KOPI GINGSENG (Erexsa)\r\nKopi Instan Full Kafein Ekstrak Gingseng\r\n1 Kotak = 10 Sachet\r\n', 25000, 0, NULL, 2, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(90, 4, 'KOPI GINGSENG (Erexsa)\r\n1 Sacset curah	\r\n', 2100, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-09 08:57:40'),
(91, 4, 'KOPI JAHE\r\nKopi Instan Full Kafein Ekstrak Jahe\r\n1 Kotak = 10 Sachet\r\n', 25000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(92, 4, 'KOPI JAHE\r\n1 Sachet curah\r\n', 2100, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(93, 4, 'KOPI BLENDING \r\nKopi Blending Arabika & Robusta, Isi : 250 gram\r\n', 25000, 0, NULL, 21, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(94, 4, 'KOPI BLENDING \r\nKopi Blending Arabika & Robusta, Isi : 500 gram curah\r\n', 47500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(95, 4, 'KOPI BLENDING \r\nKopi Blending Arabika & Robusta, Isi : 1.000 gr curah\r\n', 95000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(96, 4, 'Kopi super 100 gr\r\nKopi Robusta\r\nIsi : 100 gr\r\n', 6500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(97, 4, 'KOPI EXCELENT\r\nKopi Robusta \r\nIsi : 250 gram\r\n', 18000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(98, 4, 'KOPI EXCELENT\r\nKopi Robusta \r\nIsi : 500 gram curah\r\n', 34000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(99, 4, 'KOPI EXCELENT\r\nKopi Robusta \r\nIsi : 1.000 gram curah\r\n', 68000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(100, 4, 'KOPI STANDART\r\nKopi Robusta\r\nIsi : 100 gram\r\n', 6000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-10 08:57:40'),
(101, 4, 'KOPI STANDART\r\nKopi Robusta\r\nIsi : 250 gram\r\n', 14000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(102, 4, 'KOPI STANDART\r\nKopi Robusta\r\nIsi : 500 gram curah\r\n', 26000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(103, 4, 'KOPI STANDART\r\nKopi Robusta\r\nIsi : 1.000 gram curah\r\n', 52000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(104, 4, 'Kopi Robusta Grade\r\nisi : 500 gr curah\r\n', 35000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(105, 4, 'Kopi Robusta Grade\r\nisi : 1.000 gr curah\r\n', 70000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(106, 4, 'Kopi Arabika\r\nIsi 100 gr', 13000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(107, 4, 'Kopi Arabika\r\nIsi 250 gr', 30000, 0, NULL, 13, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(108, 4, 'Kopi Arabika\r\nIsi 500 gr curah\r\n', 75000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(109, 4, 'Kopi Arabika\r\nIsi 1.000 gr curah\r\n', 150000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(110, 4, 'Kopi Arabika non Grade\r\nIsi 500 gr curah\r\n', 47500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-11 08:57:40'),
(111, 4, 'Kopi Arabika non Grade\r\nIsi 1.000 gr curah\r\n', 95000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(112, 4, 'Kopi Robusta Super 75 gr ', 5000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(113, 4, 'Kopi jahe 10\r\nIsi : 100 gr\r\n', 10000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(114, 4, 'Kopi krim \r\nIsi : 150 ml\r\n', 3000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(115, 5, 'Kopi luwak roast & ground\r\nIsi 100 gr\r\n', 100000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(116, 5, 'Kopi luwak roast & ground\r\nIsi 250 gr\r\n', 250000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(117, 5, 'Kopi luwak roast & ground\r\nIsi 500 gr\r\n', 500000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(118, 5, 'Kopi luwak roasted beans\r\nIsi 100 gr\r\n', 100000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(119, 5, 'Kopi luwak roasted beans\r\nIsi 250 gr\r\n', 250000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(120, 5, 'Kopi luwak roasted beans\r\nIsi 500 gr\r\n', 500000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-12 08:57:40'),
(121, 5, 'Kopi luwak green beans\r\nIsi 100 gr\r\n', 80000, 0, NULL, 510, '', '2017-04-30 17:00:01', '2019-10-04 14:59:55'),
(122, 5, 'Kopi luwak green beans\r\nIsi 250 gr\r\n', 200000, 0, NULL, 110, '', '2017-04-30 17:00:01', '2019-10-04 14:59:59'),
(123, 5, 'Kopi luwak green beans\r\nIsi 500 gr\r\n', 400000, 0, NULL, 210, '', '2017-04-30 17:00:01', '2019-10-04 15:00:04'),
(124, 6, 'Visco Natural Original 350ml', 20000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(125, 6, 'Visco Mix 350 ml', 20000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(126, 6, 'Visco Creamy 350 ml', 20000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(127, 6, 'Visco Herbal 350 ml', 20000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(128, 6, 'Visco Natural Original 250ml', 15000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(129, 6, 'Visco Mix 250 ml', 15000, 0, NULL, 210, '', '2017-04-30 17:00:01', '2019-10-04 14:59:44'),
(130, 6, 'Visco Creamy 250 ml', 15000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(131, 6, 'Visco Herbal 250 ml', 15000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(132, 7, 'SabunCair 710 gr', 9500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(133, 7, 'Sabun Cair 80 gr', 2500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(134, 7, 'Sabun transparan 120 gr', 7000, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(135, 7, 'Sabun transparan 80 gr', 4500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(136, 7, 'Sabun transparan 22 gr', 2500, 0, NULL, 10, '', '2017-04-30 17:00:01', '2017-05-13 08:57:40'),
(137, 7, 'Sabun padat 50 gr', 6000, 0, NULL, 18, '', '2017-04-30 17:00:01', '2017-05-10 16:23:45'),
(138, 7, 'Sabun padat 30 gr', 3500, 0, NULL, 160, '', '2017-04-30 17:00:01', '2019-10-04 14:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` mediumint(9) NOT NULL,
  `id_produk` mediumint(9) DEFAULT NULL,
  `jumlah_stok` mediumint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_produk`, `jumlah_stok`, `created_at`, `updated_at`) VALUES
(1, 8, 86, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(2, 126, 72, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(3, 56, 14, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(4, 114, 24, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(5, 120, 6, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(6, 135, 98, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(7, 41, 53, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(8, 128, 90, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(9, 7, 84, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(10, 105, 95, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(11, 13, 2, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(12, 62, 94, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(13, 102, 17, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(14, 23, 28, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(15, 51, 58, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(16, 106, 46, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(17, 83, 69, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(18, 24, 57, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(19, 68, 17, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(20, 101, 46, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(21, 64, 35, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(22, 101, 61, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(23, 88, 76, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(24, 57, 97, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(25, 32, 48, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(26, 117, 21, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(27, 63, 17, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(28, 67, 31, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(29, 123, 50, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(30, 4, 74, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(31, 73, 48, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(32, 75, 53, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(33, 73, 88, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(34, 137, 29, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(35, 40, 55, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(36, 110, 30, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(37, 78, 72, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(38, 75, 51, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(39, 118, 17, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(40, 112, 3, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(41, 55, 46, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(42, 127, 84, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(43, 6, 5, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(44, 127, 17, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(45, 62, 35, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(46, 26, 32, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(47, 7, 51, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(48, 36, 50, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(49, 74, 5, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(50, 93, 23, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(51, 55, 53, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(52, 35, 80, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(53, 15, 39, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(54, 51, 54, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(55, 93, 36, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(56, 83, 2, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(57, 101, 19, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(58, 35, 20, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(59, 62, 72, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(60, 132, 70, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(61, 30, 88, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(62, 35, 43, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(63, 96, 32, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(64, 69, 78, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(65, 132, 61, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(66, 43, 53, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(67, 36, 12, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(68, 55, 28, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(69, 126, 91, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(70, 111, 33, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(71, 68, 51, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(72, 113, 29, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(73, 32, 53, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(74, 60, 17, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(75, 74, 48, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(76, 128, 67, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(77, 15, 90, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(78, 69, 29, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(79, 127, 34, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(80, 55, 36, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(81, 86, 24, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(82, 13, 91, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(83, 81, 85, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(84, 134, 54, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(85, 15, 47, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(86, 52, 2, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(87, 42, 99, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(88, 120, 96, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(89, 16, 42, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(90, 33, 15, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(91, 96, 59, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(92, 116, 70, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(93, 63, 7, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(94, 18, 31, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(95, 66, 63, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(96, 35, 99, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(97, 44, 6, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(98, 47, 19, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(99, 36, 84, '2017-04-30 14:27:52', '2017-04-30 14:28:31'),
(100, 45, 88, '2017-04-30 14:27:52', '2017-04-30 14:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', '$2y$10$oiesgZ9PzOUbFSGUNXipMumnzhXpaWEgg14UfLeMcbzjHCAZYfjbi', 1, 'VFB1tTnWv6yzfBgXlMzCdh9JlcvTKcREbnZOa7WXSCgUsSSHBngRCtdALNED', '2017-03-14 22:39:26', '2017-05-24 10:10:57'),
(3, 'Kasir', 'kasir', 'kasir@mail.id', '$2y$10$9ghwHHlvuFhH5r.kVpHjyuorVjisFU4g6k9X64cFXxykxRMrYdvHi', 0, 'L0zedSvUlypHiF4Acu0rKAi4ILSqHG8D1Qon6qiXHWBdDBm8VvMQ0bcmrtUa', '2017-04-19 23:05:48', '2017-05-25 22:31:37'),
(4, 'admin2', 'admin2', 'admin2@admin.com', '$2y$10$xRtcZ.kIVaVETAzenbfGiuFETPIs3DTl/eFNMtHr11k/vB7ijnd5a', 1, 'DaJKINoO1HLZFz9jddBXyJ69QyLW3pXvSkJc7plRkM0Y5pR1du5J1jvYpkV7', '2019-10-04 14:55:58', '2019-10-04 14:56:21'),
(5, 'kasir2', 'kasir2', 'kasir2@admin.com', '$2y$10$SLFv8.Zua7pRFDBHR0iJ8OA5UqO8aFjQ3txIKq4EZ11eI3fNqUVtS', 0, NULL, '2019-10-04 14:59:17', '2019-10-04 14:59:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detailpemesanan`),
  ADD KEY `id_barang` (`id_produk`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kemasan`
--
ALTER TABLE `kemasan`
  ADD PRIMARY KEY (`id_kemasan`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jenis` (`id_kategori`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detailpemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kemasan`
--
ALTER TABLE `kemasan`
  MODIFY `id_kemasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `id_pengirim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
