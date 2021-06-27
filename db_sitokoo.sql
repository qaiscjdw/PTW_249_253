-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2021 pada 17.40
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
  `id_barang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `kategori`, `stok`, `harga`, `gambar`) VALUES
(1, 'Intel Core I9 10900K', 'Processor', 4, 8000000, '0i92.jpg135616.jpg'),
(2, 'MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN', 'Vga', 10, 42000000, 'ca17bbf5-4046-4ffe-af5d-3456f68b79b3.jpg024511.jpg'),
(3, 'Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB', 'SSD', 4, 9000000, 'ssd.jpg045322.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `nama_barang`, `id_barang`, `harga_barang`) VALUES
(53, 9, 'MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN', 2, 42000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_kategori`
--

CREATE TABLE `list_kategori` (
  `kategori` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_kategori`
--

INSERT INTO `list_kategori` (`kategori`, `id`) VALUES
('Processor', 1),
('Ram', 2),
('SSD', 3),
('Hardisk', 4),
('Vga', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `barang` varchar(300) NOT NULL,
  `biaya` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pembeli`, `id_pembeli`, `barang`, `biaya`, `alamat`, `tanggal`, `bukti_pembayaran`, `status`) VALUES
(12, 'Imru\'ul Qais', 8, 'Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,Intel Core I9 10900K,', 17000000, 'Lamongan', '2021-06-26', '1442588.jpg', 'Telah Dikirimkan'),
(13, 'Imru\'ul Qais', 8, 'Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,', 9000000, 'Lamongan', '2021-06-27', '1716008.jpg', 'Telah Dikirimkan'),
(14, 'Bryan', 9, 'Intel Core I9 10900K,Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN,', 59000000, 'Bali', '2021-06-26', '1719529.jpg', 'Telah Dikirimkan'),
(15, 'Bryan', 9, 'Intel Core I9 10900K,MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN,Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,', 59000000, 'Bali', '2021-06-28', '1926269.jpg', 'Telah Dikirimkan'),
(16, 'Bryan', 9, 'Intel Core I9 10900K,', 8000000, 'Bali', '2021-06-28', '1936379.jpg', 'Telah Dikirimkan'),
(17, 'Imru\'ul Qais', 8, 'Intel Core I9 10900K,Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,', 17000000, 'Lamongan', '2021-06-27', '1137538.jpg', 'Telah Dikirimkan'),
(18, 'Imru\'ul Qais', 8, 'MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN,', 42000000, 'Lamongan', '2021-06-27', '1410178.jpg', 'Telah Dikirimkan'),
(19, 'Imru\'ul Qais', 8, 'MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN,Intel Core I9 10900K,Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,', 59000000, 'Lamongan', '2021-06-27', '1422268.jpg', 'Belum dikirim'),
(20, 'Imru\'ul Qais', 8, 'Intel Core I9 10900K,MSI GEFORCE RTX 3090 GAMING X TRIO 24GB GDDR6X 384-Bits RGB Triple FAN,Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,', 59000000, 'Lamongan', '2021-06-27', '1439268.jpg', 'Belum dikirim'),
(21, 'Bryan', 9, 'Intel Core I9 10900K,Samsung SSD 970 EVO Plus SSD M.2 NVMe PCIe 3.0 - 1TB,', 17000000, 'Bali', '2021-06-27', '1518119.jpg', 'Belum dikirim');

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
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_kategori`
--
ALTER TABLE `list_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `list_kategori`
--
ALTER TABLE `list_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
