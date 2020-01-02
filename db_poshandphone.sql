-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2019 pada 10.40
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poshandphone`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `kode_barang` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `merk` int(11) DEFAULT NULL,
  `stok` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `kode_barang`, `type`, `nama_barang`, `harga`, `merk`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'BRGwewe0001', 'wewe', 'ilham firnanda', 2000000, 2, '7', '2019-07-19 22:20:08', '2019-07-19 17:32:00'),
(2, 'BRGyuyuy0002', 'yuyuy', 'ilham firnanda', 120000, 4, '0', '2019-07-19 22:20:49', '2019-07-19 17:32:19'),
(3, 'BRGERDD0003', 'erdd', 'dfserse', 455454, 2, '0', '2019-07-20 07:47:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `idmerk` int(11) NOT NULL,
  `kode_merk` varchar(11) NOT NULL,
  `nama_merk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`idmerk`, `kode_merk`, `nama_merk`) VALUES
(2, 'MRK20190001', 'SAMSUNG'),
(4, 'MRK20190002', 'NOKIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(191) NOT NULL,
  `nama_pelanggan` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `notelp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockin`
--

CREATE TABLE `stockin` (
  `idstokin` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `merk` int(11) NOT NULL,
  `barang` int(11) NOT NULL,
  `penjelasan` text,
  `total` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stockin`
--

INSERT INTO `stockin` (`idstokin`, `supplier`, `merk`, `barang`, `penjelasan`, `total`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 1, 'zxdfsserfse', 7, '2019-07-20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `nama_supplier` varchar(45) DEFAULT NULL,
  `alamat` text,
  `notelp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `nama_supplier`, `alamat`, `notelp`) VALUES
(1, 'PT SAMSUNG JAYA', 'jl raden sucipto', '0821554'),
(3, 'ilham firnanda', 'rfytftfhyftyfrtyt', '547567567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `alamat` text,
  `notelp` varchar(45) DEFAULT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `alamat`, `notelp`, `nama_lengkap`, `jenis_kelamin`, `password`, `level`) VALUES
(1, 'admin', 'jl balongsari taman', '0821121145', 'yasuke', 1, 'd033e22ae348aeb5660fc2140aec35850c4da997', '1'),
(3, 'zdfd', 'ereszfe', '23424', 'zxczdv', 2, '35a32d4b993035951cbad9fd989be56cf48b424d', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idmerk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`idstokin`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `idmerk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stockin`
--
ALTER TABLE `stockin`
  MODIFY `idstokin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
