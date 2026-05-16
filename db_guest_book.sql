-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Bulan Mei 2026 pada 01.33
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_guest_book`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gabut`
--

CREATE TABLE `gabut` (
  `uid` varchar(15) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tugas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gabut`
--

INSERT INTO `gabut` (`uid`, `nama_petugas`, `tugas`) VALUES
('39R0YF686c5r', 'febri pratama', 'developer'),
('g4p76g983Er1', 'febri pratama', 'developer'),
('h57lq90K04wP', 'febri pratama', 'developer'),
('o042915cYf6G', 'febri pratama', 'developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`) VALUES
('41a67cu33u17', 'Febri Admin', 'febri', '123'),
('a12959ebfccd5027', 'Admin', 'root', 'root'),
('uH177Kv7907u', 'Ridwan Imut >w<', 'ridwanimut', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` varchar(20) NOT NULL,
  `nama_tamu` varchar(100) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `alamat` text,
  `ucapan` text,
  `keterangan` enum('hadir','tidak_hadir','belum_konfirmasi') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `waktu_datang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama_tamu`, `no_hp`, `alamat`, `ucapan`, `keterangan`, `email`, `waktu_datang`) VALUES
('05n49wZtM6H5', 'cahya', '0831241213123', 'Toga', 'nanti pasti kau mengerti. terasa hilang rasa jauh untuk pergi. kau akan tau bagaimana satra ku tapi terasa percuma. ko terus ungkit ungkit luka lama ya membuat sastra. ', 'hadir', 'cahyapermana@gmail.com', '2026-05-15 13:45:18'),
('367a4k8qL358', 'Febri', '081355990679', 'Cirangkong', 'nanti pasti kau mengerti. terasa hilang rasa jauh untuk pergi. kau akan tau bagaimana satra ku tapi terasa percuma. ko terus ungkit ungkit luka lama ya membuat sastra.\r\nmungkin nanti seperti koi akan mengerti. percuma saste tapi kau tak hargai. menyesal kenapa wanita tak punya hati. i&#039;m trind tapi sasu terluka. sujau satanam tapi hati tak pasti. cobala dewasa p...', 'tidak_hadir', 'febripratama1786@gmail.com', '2026-05-15 22:38:06'),
('3NbuRA7l7v62', 'Fahri', '128697600812', 'dekat dengan sekolah', 'semoga kamu bisa nikah dengan ku ', 'hadir', 'fahrinasruloh@gmail.com', '2026-05-14 13:12:13'),
('688WV5Q95pZ4', 'Agustina', '098126381', 'cisalak', 'semoga kamu nikah dengan ilham ya >w<', 'hadir', 'agustinasumyati@gmail.com', '2026-05-15 09:39:45'),
('6PG3t5l359r0', 'Wandi', '082125689760', 'Toga hill', 'sujau satanam tapi hati tak pasti. cobala dewasa pasti bukan hanya tapi. rasa cuba imbangi namun hati tak kuat. tersiksa makan hati dan itu sasuda.  ', 'hadir', 'wandipurnama@gmail.com', '2026-05-15 22:17:25'),
('94IW1H1VGHa7', 'Sri Sukma', '083159558723', 'paseh', 'semoga kamu tersenyum ya >w<', 'hadir', 'srisukmanurrohman@gmail.com', '2026-05-15 08:28:58'),
('C632qX8570Y8', 'Nexdy Experimen', '986608', 'dunia atlas', 'semoga kamu tersenyum', 'belum_konfirmasi', 'febripratama1786@gmail.com', '2026-05-14 21:16:47'),
('d9Y444f9N1u9', 'Febri', '082125689760', 'Regol wetan', 'nanti pasti kau mengerti. terasa hilang rasa jauh untuk pergi. kau akan tau bagaimana satra ku tapi terasa percuma. ko terus ungkit ungkit luka lama ya membuat sastra. mungkin nanti seperti koi akan mengerti. percuma saste tapi kau tak hargai. menyesal kenapa wanita tak punya hati. i m trind tapi sasu terluka. sujau satanam tapi hati tak pasti. cobala dewasa pasti bukan hanya tapi rasa coba ilangi namun hati tak kuat tersiksa makan hati dan itu sa sudah', 'hadir', 'febriexperiment@gmail.com', '2026-05-15 22:41:22'),
('FGb1Kon1I83h', 'Agustina', '098126381', 'cisalak', 'semoga kamu nikah dengan ilham ya >w<', 'belum_konfirmasi', 'agustinasumyati@gmail.com', '2026-05-15 09:39:49'),
('h1A030g4g9n6', 'Ridwan', '083955221786', 'toga', 'semoga rezekinya lancar', 'tidak_hadir', 'ridwansaepuloh@gmail.com', '2026-05-15 09:14:29'),
('vK2oVW88vtRJ', 'Febri', '082125689760', 'cipameungpeuk link lio', 'semoga kamu berbahagia', 'belum_konfirmasi', 'febripratama1768@gmail.com', '2026-05-14 12:50:50'),
('wpBYi7p8UUG0', 'Ilham ', '083955229776', 'tanjung kerja', 'mungkin nanti seperti koi akan mengerti. percuma saste tapi kau tak hargai. menyesal kenapa wanita tak punya hati. i&#039;m trind tapi sasu terluka.', 'tidak_hadir', 'ilhamsuparman@gmail.com', '2026-05-15 22:14:41'),
('XcDeb86J1va2', 'Aditya', '08986123984', 'talun', 'semoga kamu bisa berteman', 'tidak_hadir', 'adityaanugrah@gmail.com', '2026-05-14 13:19:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gabut`
--
ALTER TABLE `gabut`
  ADD PRIMARY KEY (`uid`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
