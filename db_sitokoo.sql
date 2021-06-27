-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2021 pada 06.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sitokoo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`nama`, `kategori`, `harga`, `gambar`) VALUES
('Dump', 'dump', 12000000, '0i92.jpg172212.jpg'),
('Dump2', 'dump', 12222, '0i92.jpg172256.jpg'),
('m', 'dump', 98, '0i92.jpg173357.jpg'),
('op', 'dump', 987, '0i92.jpg173420.jpg'),
('12', 'dump', 12, 'UNTAG.jpg173456.jpg'),
('KAMPUS KEMERDEKAAN', 'dump', 0, 'UNTAG.png173538.jpg'),
('ljnl', 'dump', 9, 'btc.png173604.jpg'),
('1', 'dump', 12, '0.PNG175241.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_kategori`
--

CREATE TABLE `list_kategori` (
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_kategori`
--

INSERT INTO `list_kategori` (`kategori`) VALUES
('Processor'),
('Ram'),
('SSD'),
('Hardisk'),
('Vga'),
('dump\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `username`, `password`, `posisi`, `phone`) VALUES
(1, 'Admin', 'admin@sitokoo.com', 'admin', '$2y$10$HrKPA8211NLyC4mSRY6sseQXOVzEPsREq0tKKML4N7jCw./EQaRXO', 'admin', '08123'),
(8, 'Imru\'ul Qais', 'qais@gmail.com', 'qais', '$2y$10$JA7vpsun4x0kiaUmc9..Q.FSj7.CtChtYEAOfBsaPC4aRNDkldQnC', 'user', '123'),
(9, 'Bryan', 'bryan@gmail.com', 'bryan', '$2y$10$.e.e6ib6agILGFa5i/mcv.GMLcJbzQ9Q0OSiLkZTJzc6XGj3KdQMm', 'user', '123'),
(10, 'Linda Ariyani', 'linda@gmail.com', 'linda', '$2y$10$xfMm3EEyjcIAqxbHjzgE8OFWXMF2V6fBxZnoyfNVRf2F7LhbBA/Fu', 'user', '123'),
(11, 'Imru\'ul Qais', 'qais@gmail.com', 'qaiscjdw', '$2y$10$a1GhgmNMPiADWlPD52m/Zu57G5tqBb9isy3eGOl5cUYUcC0CkEFum', 'user', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
