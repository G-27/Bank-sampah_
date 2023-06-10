-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 16.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_tipe_a`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_sampah`
--

CREATE TABLE `jns_sampah` (
  `id_sampah` int(11) NOT NULL,
  `jenis_sampah` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jns_sampah`
--

INSERT INTO `jns_sampah` (`id_sampah`, `jenis_sampah`, `harga`) VALUES
(2, 'plastik', 1000),
(3, 'kertas', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `isAdmin`) VALUES
(1, 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_sampah` int(11) NOT NULL,
  `berat` int(5) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pegawai`, `id_sampah`, `berat`, `total`) VALUES
(2, 2, 1, 3, 2, 2000),
(4, 2, 1, 2, 10, 10000),
(16, 2, 1, 2, 10, 10000),
(17, 3, 1, 3, 6, 12000),
(18, 2, 1, 2, 7, 7000),
(19, 2, 1, 2, 10, 10000),
(20, 2, 1, 2, 10, 10000);

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_saldo` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
    DECLARE jumlah DECIMAL(10,2);
    
    -- Mengambil jumlah transaksi baru
    SELECT NEW.total INTO jumlah;

    -- Memperbarui nilai saldo pada tabel user hanya untuk pengguna yang menjual barang
    IF EXISTS (SELECT 1 FROM user WHERE id_user = NEW.id_user) THEN
        UPDATE user SET saldo = saldo + jumlah WHERE id_user = NEW.id_user;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saldo` bigint(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `alamat`, `username`, `password`, `saldo`, `isAdmin`) VALUES
(2, 'qwe', '', 'qwe', 'qwe', 'qwe', 49000, 0),
(3, 'ikhsan', '0895323969934', 'geso', 'ikhsan', '123456', 39000, 0),
(4, 'qwe2', 'qwe2', 'qwe2', 'qwe2', 'qwe2', 39000, 0);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaksi` (
`id_transaksi` int(11)
,`nama_pegawai` varchar(100)
,`nama` varchar(50)
,`jenis_sampah` varchar(100)
,`berat` int(5)
,`total` int(10)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS SELECT `transaksi`.`id_transaksi` AS `id_transaksi`, `pegawai`.`nama_pegawai` AS `nama_pegawai`, `user`.`nama` AS `nama`, `jns_sampah`.`jenis_sampah` AS `jenis_sampah`, `transaksi`.`berat` AS `berat`, `transaksi`.`total` AS `total` FROM (((`transaksi` left join `pegawai` on(`transaksi`.`id_pegawai` = `pegawai`.`id_pegawai`)) left join `user` on(`transaksi`.`id_user` = `user`.`id_user`)) left join `jns_sampah` on(`transaksi`.`id_sampah` = `jns_sampah`.`id_sampah`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jns_sampah`
--
ALTER TABLE `jns_sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`,`id_pegawai`,`id_sampah`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_sampah`) REFERENCES `jns_sampah` (`id_sampah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
