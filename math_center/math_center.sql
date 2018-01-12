-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 15 Des 2017 pada 17.14
-- Versi Server: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_sakamoto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(4) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG1', 'SD (Kelas 1-6)'),
('KTG2', 'TK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` char(4) NOT NULL,
  `id_kategori` char(4) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `bahasa` set('Indonesia','Inggris') NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_kategori`, `nama_paket`, `bahasa`, `biaya`) VALUES
('PKT1', 'KTG1', 'Paket 1 Bulan', 'Inggris', 750000),
('PKT2', 'KTG1', 'Paket 3 Bulan', 'Inggris', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` char(7) NOT NULL,
  `id_paket` char(4) CHARACTER SET utf8mb4 NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `jenis_kelamin` set('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(50) NOT NULL,
  `alamat_peserta` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `nama_wali_1` varchar(50) NOT NULL,
  `no_telp_wali_1` varchar(50) NOT NULL,
  `nama_wali_2` varchar(50) NOT NULL,
  `no_telp_wali_2` varchar(50) NOT NULL,
  `create_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_paket`, `nama_peserta`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `umur`, `alamat_peserta`, `kota`, `provinsi`, `kode_pos`, `nomor_telepon`, `nama_wali_1`, `no_telp_wali_1`, `nama_wali_2`, `no_telp_wali_2`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('123456', 'PKT2', 'reref', 'Laki-laki', 'manado', '2017-12-14', '', 'satu', 'dua', 'tiga', '12345', '34567899', 'y', 'y', 'y', 'y', 'admin', '2017-12-14', '', '0000-00-00'),
('ABC123', 'PKT1', 'Refsi', '', '', '0000-00-00', '8', 'Manado', '', '', '', '', 'A', '0', 'B', '0', 'admin', '2017-12-07', '', '0000-00-00'),
('gh888', 'PKT1', '8hhuh', '', '', '0000-00-00', 'h', 'hh8h', '', '', '', '', 'h8', 'h8', 'h8', 'h', 'admin', '2017-12-07', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` set('user','admin') NOT NULL DEFAULT 'user',
  `nama` varchar(50) NOT NULL,
  `no_kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `password`, `role`, `nama`, `no_kontak`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', ''),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'User', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `create_by` (`create_by`),
  ADD KEY `update_by` (`update_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
