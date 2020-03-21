-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2020 pada 12.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasidosen`
--

CREATE TABLE `evaluasidosen` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `mk` text NOT NULL,
  `tahun` text NOT NULL,
  `nim` text NOT NULL,
  `a1` int(11) NOT NULL,
  `a2` int(11) NOT NULL,
  `a3` int(11) NOT NULL,
  `a4` int(11) NOT NULL,
  `a5` int(11) NOT NULL,
  `a6` int(11) NOT NULL,
  `a7` int(11) NOT NULL,
  `a8` int(11) NOT NULL,
  `a9` int(11) NOT NULL,
  `a10` int(11) NOT NULL,
  `a11` int(11) NOT NULL,
  `b1` int(11) NOT NULL,
  `b2` int(11) NOT NULL,
  `b3` int(11) NOT NULL,
  `b4` int(11) NOT NULL,
  `b5` int(11) NOT NULL,
  `b6` int(11) NOT NULL,
  `b7` int(11) NOT NULL,
  `b8` int(11) NOT NULL,
  `b9` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `d5` int(11) NOT NULL,
  `d6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logkondite`
--

CREATE TABLE `logkondite` (
  `id` int(11) NOT NULL,
  `nim` int(7) NOT NULL,
  `nama` text NOT NULL,
  `jenispoin` text NOT NULL,
  `poin` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `prodi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logkondite`
--

INSERT INTO `logkondite` (`id`, `nim`, `nama`, `jenispoin`, `poin`, `keterangan`, `tahun`, `prodi`, `tanggal`) VALUES
(1, 1702034, 'Malsi Nur Adwinda R', 'Minus Poin', -5, 'Outstanding', 2017, 'Teknik Elektronika', '2018-02-12'),
(2, 1702034, 'Malsi Nur Adwinda R', 'Minus Poin', -5, 'Outstanding', 2018, 'Teknik Elektronika', '2018-04-15'),
(3, 1702034, 'Malsi Nur Adwinda R', 'Plus Poin', 5, 'UKK Drumband', 2018, 'Teknik Elektronika', '2018-06-12'),
(4, 1702034, 'Malsi Nur Adwinda R', 'Plus Poin', 10, 'Panitia Wisuda', 2018, 'Teknik Elektronika', '2018-09-21'),
(5, 1702034, 'Malsi Nur Adwinda R', 'Plus Poin', 5, 'UKK Drumband', 2018, 'Teknik Elektronika', '2019-01-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jeniskelamin` text NOT NULL,
  `programstudi` text NOT NULL,
  `tempatlahir` text NOT NULL,
  `tanggallahir` date NOT NULL,
  `tahunmasuk` int(11) NOT NULL,
  `status` text NOT NULL,
  `kelas` text NOT NULL,
  `password` text NOT NULL,
  `pembimbing` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jeniskelamin`, `programstudi`, `tempatlahir`, `tanggallahir`, `tahunmasuk`, `status`, `kelas`, `password`, `pembimbing`) VALUES
(1702034, 'Malsi Nur Adwinda Robbani', 'Laki-Laki', 'Teknik Elektronika', 'Ngawi', '1999-09-23', 2017, '1', '3 Elektronika B', 'd3594761969ab93ad566c482d74ea90e60db4da5', 'Ihsan Auditia Akinov');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiakademik`
--

CREATE TABLE `nilaiakademik` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` text NOT NULL,
  `uts` text NOT NULL,
  `uas` text NOT NULL,
  `tugas` text NOT NULL,
  `kuis` text NOT NULL,
  `akhir` text NOT NULL,
  `huruf` text NOT NULL,
  `angka` double NOT NULL,
  `kodemk` text NOT NULL,
  `namamk` text NOT NULL,
  `sks` int(11) NOT NULL,
  `tahunakademik` int(11) NOT NULL,
  `prodi` text NOT NULL,
  `dosen` text NOT NULL,
  `kelas` text NOT NULL,
  `status` text NOT NULL,
  `statusmk` text NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilaiakademik`
--

INSERT INTO `nilaiakademik` (`id`, `nim`, `nama`, `uts`, `uas`, `tugas`, `kuis`, `akhir`, `huruf`, `angka`, `kodemk`, `namamk`, `sks`, `tahunakademik`, `prodi`, `dosen`, `kelas`, `status`, `statusmk`, `semester`) VALUES
(1, 1702034, 'Malsi Nur Adwinda Robbani', '75', '75', '75', '75', '75', 'B', 3, 'MK01', 'FISIKA TERAPAN', 2, 20171, 'T. ELEKTRONIKA', 'IHSAN AUDITIA AKHINOV, S.T.,M.T.', '1EB', 'Diatas 2,75', 'Sudah Terisi', 1),
(2, 1702034, 'Malsi Nur Adwinda Robbani', '100', '100', '100', '100', '100', 'A', 4, 'MK02', 'MATEMATIKA TERAPAN', 2, 20171, 'T. ELEKTRONIKA', 'IHSAN AUDITA AKHINOV, S.T.,M.T.', '1EB', 'Diatas 2,75', 'Belum diisi', 1),
(3, 1702034, 'Malsi Nur Adwinda Robbani', '90', '90', '90', '90', '90', 'A', 4, 'MK03', 'PEMROGRAMAN JAVA', 2, 20182, 'T. ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T.', '1EB', 'Diatas 2,75', 'Belum diisi', 2),
(4, 1702034, 'Malsi Nur Adwinda Robbani', '75', '75', '75', '75', '75', 'B', 3, 'MK04', 'INSTRUMENTASI 1', 2, 20182, 'T. ELEKTRONIKA', 'DEVI HANDAYA,S.Pd.,M.T.', '1EB', 'Diatas 2,75', 'Belum diisi', 2),
(5, 1702034, 'Malsi Nur Adwinda Robbani', '100', '100', '100', '100', '100', 'A', 4, 'MK05', 'KIMIA', 2, 20183, 'T. ELEKTRONIKA', 'DEVI HANDAYA,S.Pd.,M.T.', '2EB', 'Diatas 2,75', 'Belum diisi', 3),
(6, 1702034, 'Malsi Nur Adwinda Robbani', '90', '90', '90', '90', '90', 'A', 4, 'MK06', 'ELEKTRONIKA DAYA', 2, 20183, 'T. ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T.', '2EB', 'Diatas 2,75', 'Belum diisi', 3),
(7, 1702034, 'Malsi Nur Adwinda Robbani', '75', '75', '75', '75', '75', 'B', 3, 'MK07', 'INSTRUMENTASI 2', 2, 20194, 'T. ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T', '2EB', 'Diatas 2,75', 'Belum diisi', 4),
(8, 1702034, 'Malsi Nur Adwinda Robbani', '75', '75', '75', '75', '75', 'B', 3, 'MK08', 'PRAKTEK ELEKTONIKA DAYA', 3, 20194, 'T. ELEKTRONIKA', 'SLAMET AFANDI ,S.T.', '2EB', 'Diatas 2,75', 'Belum diisi', 4),
(9, 1702034, 'Malsi Nur Adwinda Robbani', '90', '90', '90', '90', '90', 'A', 4, 'MK09', 'METODE PENELITIAN', 2, 20195, 'TEKNIK ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T', '3EB', 'Diatas 2.75', 'Belum diisi', 5),
(10, 1702034, 'Malsi Nur Adwinda Robbani', '90', '90', '90', '90', '90', 'A', 4, 'MK10', 'PRAKTIK PNEUMATIK & HIDROLIK', 2, 20195, 'TEKNIK ELEKTRONIKA', 'SLAMET AFANDI,S.T.', '3EB', 'Diatas 2.75', 'Belum diisi', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluasidosen`
--
ALTER TABLE `evaluasidosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logkondite`
--
ALTER TABLE `logkondite`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `nilaiakademik`
--
ALTER TABLE `nilaiakademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasidosen`
--
ALTER TABLE `evaluasidosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logkondite`
--
ALTER TABLE `logkondite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilaiakademik`
--
ALTER TABLE `nilaiakademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
