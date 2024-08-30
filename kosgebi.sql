-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2024 pada 02.03
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosgebi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `idkamar` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tipe` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `fasilitas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `gambar`, `fasilitas`, `deskripsi`) VALUES
('01', 'Kamar 1', 1, 26000, 'kmar.jpg', 'Tempat Tidur, Kamar Mandi Dalam, WiFi, Air, Dapur Mini', 'Kamar kos minimalis dan nyaman, cocok untuk mahasiswa/i atau pekerja yang mencari tempat tinggal tenang. Lokasi sangat strategis, dekat dengan kampus dan akses transportasi umum mudah. Fasilitas sesuai deskripsi di atas per kamarnya dan juga tempat tidur nyaman, dan dapur bersama. Nikmati kenyamanan tinggal di kamar kos bapa dede dengan harga terjangkau. Kamar luas dan dilengkapi dengan perabot modern. Cocok untuk kamu yang menginginkan privasi dan kenyamanan maksimal.'),
('02', 'Kamar 2', 1, 22800, 'roomm.jpg', 'Tempat Tidur, Kamar Mandi Dalam, WiFi, Air', 'Kamar kos minimalis dan nyaman, cocok untuk mahasiswa/i atau pekerja yang mencari tempat tinggal tenang. Lokasi sangat strategis, dekat dengan kampus dan akses transportasi umum mudah. Fasilitas sesuai deskripsi di atas per kamarnya dan juga tempat tidur nyaman, dan dapur bersama. Nikmati kenyamanan tinggal di kamar kos bapa dede dengan harga terjangkau. Kamar luas dan dilengkapi dengan perabot modern. Cocok untuk kamu yang menginginkan privasi dan kenyamanan maksimal.'),
('03', 'Kamar 3', 1, 24200, 'kmar.jpg', 'Tempat Tidur, Kamar Mandi Dalam, Air, Dapur Mini', 'Kamar kos minimalis dan nyaman, cocok untuk mahasiswa/i atau pekerja yang mencari tempat tinggal tenang. Lokasi sangat strategis, dekat dengan kampus dan akses transportasi umum mudah. Fasilitas sesuai deskripsi di atas per kamarnya dan juga tempat tidur nyaman, dan dapur bersama. Nikmati kenyamanan tinggal di kamar kos bapa dede dengan harga terjangkau. Kamar luas dan dilengkapi dengan perabot modern. Cocok untuk kamu yang menginginkan privasi dan kenyamanan maksimal.'),
('04', 'Kamar 4', 1, 26000, 'kamar1.jpg', 'Tempat Tidur, Kamar Mandi Dalam, WiFi, Air, Dapur Mini', 'Kamar kos minimalis dan nyaman, cocok untuk mahasiswa/i atau pekerja yang mencari tempat tinggal tenang. Lokasi sangat strategis, dekat dengan kampus dan akses transportasi umum mudah. Fasilitas sesuai deskripsi di atas per kamarnya dan juga tempat tidur nyaman, dan dapur bersama. Nikmati kenyamanan tinggal di kamar kos bapa dede dengan harga terjangkau. Kamar luas dan dilengkapi dengan perabot modern. Cocok untuk kamu yang menginginkan privasi dan kenyamanan maksimal.'),
('05', 'Kamar 5', 1, 22800, 'roomm.jpg', 'Tempat Tidur, Kamar Mandi Dalam, WiFi, Air', 'Kamar kos minimalis dan nyaman, cocok untuk mahasiswa/i atau pekerja yang mencari tempat tinggal tenang. Lokasi sangat strategis, dekat dengan kampus dan akses transportasi umum mudah. Fasilitas sesuai deskripsi di atas per kamarnya dan juga tempat tidur nyaman, dan dapur bersama. Nikmati kenyamanan tinggal di kamar kos bapa dede dengan harga terjangkau. Kamar luas dan dilengkapi dengan perabot modern. Cocok untuk kamu yang menginginkan privasi dan kenyamanan maksimal.'),
('06', 'Kamar 6', 1, 24200, 'kamar1.jpg', 'Tempat Tidur, Kamar Mandi Dalam, Air, Dapur Mini', 'Kamar kos minimalis dan nyaman, cocok untuk mahasiswa/i atau pekerja yang mencari tempat tinggal tenang. Lokasi sangat strategis, dekat dengan kampus dan akses transportasi umum mudah. Fasilitas sesuai deskripsi di atas per kamarnya dan juga tempat tidur nyaman, dan dapur bersama. Nikmati kenyamanan tinggal di kamar kos bapa dede dengan harga terjangkau. Kamar luas dan dilengkapi dengan perabot modern. Cocok untuk kamu yang menginginkan privasi dan kenyamanan maksimal.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `idkontak` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pesanuser` text CHARACTER SET latin1 NOT NULL,
  `pesanadmin` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`idkontak`, `idtamu`, `username`, `pesanuser`, `pesanadmin`) VALUES
(1, 1, 'user', 'tes min', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('Nimadkos', '$2y$10$r74QoB5BTmpmj6681pKjIuf4FcuCnqTkoqfpKnPwC/Jk9bF9Nev.6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpesan` varchar(11) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bank` varchar(10) CHARACTER SET latin1 NOT NULL,
  `norek` varchar(15) CHARACTER SET latin1 NOT NULL,
  `namarek` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpesan`, `nama`, `jumlah`, `bank`, `norek`, `namarek`, `gambar`) VALUES
('2', 'user', 1525000, 'BRI', '1111111111', 'qwerty', '1700704226834.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpesan` int(11) NOT NULL,
  `tglpesan` datetime NOT NULL,
  `batasbayar` datetime NOT NULL,
  `idkamar` varchar(15) CHARACTER SET latin1 NOT NULL,
  `tipe` varchar(20) CHARACTER SET latin1 NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(500) CHARACTER SET latin1 NOT NULL,
  `telepon` varchar(15) CHARACTER SET latin1 NOT NULL,
  `tglmasuk` date NOT NULL,
  `tglkeluar` date NOT NULL,
  `lamahari` int(11) NOT NULL DEFAULT 0,
  `totalbayar` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpesan`, `tglpesan`, `batasbayar`, `idkamar`, `tipe`, `harga`, `jumlah`, `idtamu`, `nama`, `alamat`, `telepon`, `tglmasuk`, `tglkeluar`, `lamahari`, `totalbayar`, `status`) VALUES
(1, '2024-08-12 14:33:26', '2024-08-12 19:33:26', '01', 'Kamar 1', 22000, 1, 1, 'user', 'ambon', '081340907978', '2024-08-12', '2024-09-12', 31, 682000, 'Dibatalkan'),
(2, '2024-08-18 16:56:33', '2024-08-18 21:56:33', '05', 'Kamar 5', 25000, 1, 1, 'user', 'ambon', '081340907978', '2024-08-18', '2024-10-18', 61, 1525000, 'Berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokkamar`
--

CREATE TABLE `stokkamar` (
  `idkamar` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tipe` varchar(50) CHARACTER SET latin1 NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stokkamar`
--

INSERT INTO `stokkamar` (`idkamar`, `tipe`, `stok`) VALUES
('01', 'Kamar 1', 1),
('02', 'Kamar 2', 1),
('03', 'Kamar 3', 1),
('04', 'Kamar 4', 1),
('05', 'Kamar 5', 0),
('06', 'Kamar 6', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(150) CHARACTER SET latin1 NOT NULL,
  `telepon` varchar(15) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(1000) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `username`, `email`, `nama`, `alamat`, `telepon`, `password`, `foto`) VALUES
(1, 'user', 'user@gmail.com', 'user', 'ambon', '081340907978', '$2y$10$cMmr2CkH1p6Em.H1cfpLDOIjrUXZ5D1UGJgXxQjkL6qvnkjDX7Mxq', '1692612258102.jpg'),
(2, 'user1', 'user1@gmail.com', 'nAMA', 'AMBON', '081343009779', '$2y$10$IqUoK9YoD5uQcwKbZgEFbu9rBUEVgrHZl738KtYXy6B8do4URvftm', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`idkontak`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indeks untuk tabel `stokkamar`
--
ALTER TABLE `stokkamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `idkontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
