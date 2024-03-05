-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2024 pada 20.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `image_id`, `admin_id`, `isikomentar`, `tanggalkomentar`) VALUES
(17, 46, 7, '1', '2024-03-05'),
(18, 46, 7, '2', '2024-03-05'),
(19, 46, 7, '3', '2024-03-05'),
(20, 46, 7, '4', '2024-03-05'),
(21, 46, 7, '5', '2024-03-05'),
(22, 46, 7, '6', '2024-03-05'),
(23, 46, 7, 'p', '2024-03-05'),
(24, 47, 5, 'tes', '2024-03-05'),
(25, 46, 9, 'i', '2024-03-05'),
(26, 46, 9, 'asdasd', '2024-03-05'),
(27, 47, 5, 'sada', '2024-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `image_id`, `admin_id`, `tanggallike`) VALUES
(120, 46, 5, '2024-03-05'),
(126, 47, 5, '2024-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `foto_profil`) VALUES
(2, 'Irawan', 'irawan', 'adminirawan', '085774137284', 'irawan@gmail.com', 'Jl. Raya Kadu Seungit', ''),
(3, 'Diana', 'diana', '1234', '085788992919', 'Diana@gmail.com', 'Suka Seneng Cikeusik', ''),
(4, 'Hazwan', 'hazwan', '123', '085787778811', 'hazwan@gmail.com', 'Cikeusik Pandeglang', ''),
(5, 'Alokkk', 'alok', 'alok', '098', 'dsa@gmail.com', 'Sadas', 'profilpic/images.jpg'),
(6, 'Godz', 'gg', 'gg', '99', 'gg', 'Gg', ''),
(7, 'Adminsugab', 'sugab', 'sugab', '0896', 'sugab@gmail.com', 'Disana', 'profilpic/Shaka.(ONE.PIECE).full.3880803.jpg'),
(8, 'Aku', 'aku', 'aku', '1223', 'aku@gmail.com', 'Aku', ''),
(9, 'Aku2', '123', '123', '123', 'aku@gmail.com', '123', 'profilpic/images.jpg'),
(10, 'Akuw', 'aqw', 'aqw', '123', 'aku@gmail.com', 'Asd', 'profilpic/'),
(11, 'Po', 'po', 'op', '09', 'aku@gmail.com', 'Po', ''),
(12, '2', '2', '2', '2', 'aku@gmail.com', '2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `deskripsi`, `tanggaldibuat`, `admin_id`) VALUES
(14, 'Together', 'kebersamaan masa lampau', '2024-03-05', 7),
(15, 'Solo', 'dikala seseorang sendirian', '2024-03-05', 7),
(16, 'Duo', 'berdua tidak selalu berpasangan', '2024-03-05', 7),
(17, 'Trio', 'SIRKELLLLLL', '2024-03-05', 7),
(18, 'Quadro', 'Berempat kita mabar frifayer', '2024-03-05', 7),
(19, 'Exams', 'tidak semua ujian itu susah dan sedih ', '2024-03-05', 7),
(20, 'Random', 'biasanya gambar yang berada disini adalah aib ', '2024-03-05', 7),
(21, 'Female', 'hmp WOMAN', '2024-03-05', 7),
(22, 'Male', 'SIGMA MALE', '2024-03-05', 7),
(23, 'Couple', 'beberapa couple yang ada ', '2024-03-05', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(46, 17, 'Trio', 7, 'Adminsugab', 'shelby corp', '<p>....s</p>\r\n', 'foto1709655166.jpg', 1, '2024-03-05 16:12:55'),
(47, 16, 'Duo', 5, 'Alok', 'tesqw', '<p>teswqe</p>\r\n', 'foto1709663492.jpg', 1, '2024-03-05 18:31:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`);

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tb_image` (`image_id`),
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`);

--
-- Ketidakleluasaan untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
