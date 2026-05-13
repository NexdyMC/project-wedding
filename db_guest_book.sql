-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2026-05-13 11:39:30
-- サーバのバージョン： 8.0.30
-- PHP のバージョン: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `db_guest_book`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`) VALUES
(1, 'Nexdy Experiment', 'Nexdy', 'N{+*$&17}>\\<(p.l.t=block)'),
(2, 'admin', 'root', 'root');

-- --------------------------------------------------------

--
-- テーブルの構造 `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int NOT NULL,
  `nama_tamu` varchar(100) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `alamat` text,
  `ucapan` text,
  `keterangan` enum('hadir','tidak_hadi','belum_konfirmasi') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `waktu_datang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama_tamu`, `no_hp`, `alamat`, `ucapan`, `keterangan`, `email`, `waktu_datang`) VALUES
(1, 'asda', '1212', 'asda', 'aku sama siapa', 'hadir', 'nexdy@nexdy.xyz', '00:00:00'),
(2, 'adit', '082125689760', 'cipanday', 'selamat ya sayang', 'hadir', 'adityaanugrah@gmail.com', '10:00:00'),
(3, 'Febri Pratama', '082125689760', 'cipameungpeuk link lio', 'semoga kamu bisa ketemuan di malam hari ', 'hadir', 'febripratama1286@gmail.com', '15:15:12'),
(8, 'Nexdy Experimen', '082125689760', 'cipada', 'kudengar kalau kamu sudah menikah aku terlambat bilang suka kepadamu kudengar kamu pun sekarang punya anak tak samggup memanggilmu Farewell masa mudaku', 'hadir', 'febripratama1786@gmail.com', '16:02:06'),
(9, 'fahri', '976', 'fahri', 'fahri', 'hadir', 'fahri@nexdy.xyz', '00:49:58');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- テーブルのインデックス `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
