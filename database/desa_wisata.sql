-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 03:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `gambar`, `link`, `tanggal`) VALUES
(1, 'Pantai Sedari, Surga Tersembunyi di Karawang', 'artikel_1754557535.jpg', 'https://travelspromo.com/htm-wisata/pantai-sedari-karawang/', '2024-01-19'),
(2, 'Ekowisata Mangrove Cikiong: Alternatif Wisata Edukatif di Karawang', 'artikel_1754557554.jpg', 'https://www.serikatnasional.id/2022/07/wisata-hutan-mangrove-cikiong-sedari.html', '2022-07-20'),
(3, 'Melihat Aktivitas Nelayan di Desa Sedari, Karawang', 'artikel_1754557577.webp', 'https://kumparan.com/jendela-dunia/wisata-pantai-sedari-karawang-destinasi-menarik-di-akhir-pekan-24ToC4yCKJe', '2025-02-11'),
(4, 'Potensi Ekonomi Mangrove Desa Sedari: Pendapatan Lebih dari 100 Juta', 'artikel_1754557604.jpeg', 'https://www.researchgate.net/publication/377492615_Mangrove_Ecotourism_Development_to_Improve_Coastal_Community%27s_Welfare_in_Sedari_Village_Karawang_Regency_West_Java', '2024-01-15'),
(5, 'Taman Edukasi Mangrove Sedari, Pilihan Liburan Ramah Anak dan Alam', 'artikel_1754557626.jpg', 'https://megapolitan.antaranews.com/berita/27411/wisata-mangrove-sedari-karawang-akan-dikembangkan', '2017-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `background_home`
--

CREATE TABLE `background_home` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `background_home`
--

INSERT INTO `background_home` (`id`, `gambar`, `created_at`) VALUES
(1, 'bghome_1754562983.png', '2025-08-07 10:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `harga_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `harga_fasilitas`) VALUES
(1, 'Toilet Umum', 2000),
(2, 'Tempat Parkir', 5000),
(3, 'Gazebo Istirahat', 15000),
(4, 'Perahu Wisata', 30000),
(5, 'Trekking Mangrove', 10000),
(6, 'Warung Makan', 0),
(7, 'Sepeda Air', 25000),
(8, 'Spot Foto Alam', 0),
(9, 'Camping Ground', 20000),
(10, 'Pusat Informasi Wisata', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_wisata` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `id_jenis`, `nama_wisata`, `keterangan`, `gambar`) VALUES
(1, 1, 'Pantai Sedari', 'Pemandangan pantai dari udara', '1754554174_11Untitled.jpeg'),
(2, 1, 'Pantai Sedari', 'Suasana pantai saat sore hari', '1754554222_Untitled.jpeg'),
(3, 1, 'Pantai Sedari', 'Pengunjung bermain air di pantai', '1754554267_Untitled.jpeg'),
(4, 2, 'Hutan Mangrove Cikiong', 'Jembatan kayu jalur tracking', '1754554348_Untitled.jpeg'),
(5, 2, 'Hutan Mangrove Cikiong', 'Tanaman mangrove sehat', '1754554399_Untitled.jpeg'),
(6, 2, 'Hutan Mangrove Cikiong', 'Pengunjung naik perahu', '1754554478_Untitled.jpeg'),
(7, 3, 'Wisata Nelayan Sedari', 'Aktivitas nelayan pagi hari', '1754554534_4Untitled.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_wisata`
--

CREATE TABLE `jenis_wisata` (
  `id_jenis` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga_tiket` decimal(10,2) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_wisata`
--

INSERT INTO `jenis_wisata` (`id_jenis`, `nama_wisata`, `deskripsi`, `harga_tiket`, `gambar`) VALUES
(1, 'Pantai Sedari', 'Pantai dengan panorama sunset, ombak tenang, dan pasir kecoklatan khas Karawang.', '10000.00', 'Wahana-perahu-karet-warna-warni-di-Pantai-Sedari-Karawang-768x576.jpg'),
(2, 'Hutan Mangrove Cikiong', 'Kawasan edukatif dan konservasi mangrove dengan jalur trekking dan perahu wisata.', '10000.00', 'IMG-20220719-WA0060.jpg'),
(3, 'Wisata Nelayan Sedari', 'Melihat langsung aktivitas nelayan dan kapal tradisional khas desa pesisir.', '5000.00', 'Untitle22d.jpeg'),
(4, 'Sunset View Deck', 'Area gardu pandang untuk menikmati matahari terbenam di tepi laut.', '0.00', 'Untitled.jpeg'),
(5, 'Taman Edu Mangrove', 'Tempat edukasi pelestarian hutan bakau, cocok untuk pelajar dan wisata keluarga.', '7000.00', 'Untitle1d1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `tiktok` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `email`, `telepon`, `instagram`, `tiktok`) VALUES
(1, 'Desa Sedari, Kecamatan Cibuaya, Kabupaten Karawang, Indonesia 41356', 'info.sedari@gmail.com', '6281295101633', '@desawisatasedari', 'desawisatasedari');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `user_id`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `latitude`, `longitude`, `date`) VALUES
(1, 1, 'Bali', 'Gianyar', 'Tegallalang', 'Petulu', -8.491532, 115.274563, '2020-10-15 11:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `fasilitas` varchar(266) NOT NULL,
  `id_fasilitas` varchar(11) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `fasilitas`, `id_fasilitas`, `harga`, `keterangan`, `gambar`) VALUES
(1, 'Paket Jelajah Pantai', 'Toilet, Parkir, Gazebo, Spot Foto', '1,2,3,8', 35000, 'Nikmati indahnya Pantai Sedari dengan fasilitas lengkap dan spot foto menarik.', 'img_1754553270.jpeg'),
(2, 'Paket Edu Mangrove', 'Trekking, Sepeda Air, Perahu, Edukasi', '4,5,7,10', 50000, 'Belajar dan berpetualang di hutan mangrove dengan pengalaman seru dan mendidik.', 'img_1754553289.jpeg'),
(3, 'Paket Sunset Romantis', 'Sunset Deck, Gazebo, Foto, Minuman', '3,4,6,8', 40000, 'Cocok untuk pasangan dan keluarga menikmati matahari terbenam.', 'img_1754553308.jpeg'),
(4, 'Paket Nelayan Sehari', 'Parkir, Perahu, Warung, Info Wisata', '2,4,6,10', 30000, 'Pengalaman hidup sehari sebagai nelayan, mulai dari laut hingga hasil tangkapannya.', 'img_1754553327.jpeg'),
(5, 'Paket Camping Sedari', 'Camping Ground, Toilet, Warung, Info', '1,6,9,10', 60000, 'Nikmati malam tenang dengan tenda di pantai dan fasilitas lengkap.', 'img_1754553346.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `halaman` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip_address`, `user_agent`, `halaman`, `tanggal`, `waktu`) VALUES
(20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'http://localhost/desawisata/home', '2025-08-07', '2025-08-07 09:05:18'),
(21, '172.20.10.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/138.0.7204.119 Mobile/15E148 Safari/604.1', 'http://172.20.10.2/desawisata/', '2025-08-07', '2025-08-07 13:02:23'),
(22, '10.26.10.114', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'http://10.26.10.130/desawisata/', '2025-08-07', '2025-08-07 14:57:35'),
(23, '10.26.10.119', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'http://10.26.10.130/desawisata/', '2025-08-07', '2025-08-07 14:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'super admin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `keterangan`) VALUES
(1, 'Desa Sedari merupakan wilayah pesisir yang dulunya hanya dikenal sebagai kampung nelayan biasa. Seiring waktu, potensi alam seperti pantai dan hutan mangrove menarik perhatian masyarakat dan pemerintah untuk dikembangkan menjadi desa wisata. Mulai tahun 2018, pengembangan infrastruktur dan pelatihan masyarakat mulai digalakkan, menjadikan Sedari sebagai salah satu destinasi wisata alam unggulan di Karawang.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(9, 'WISATA SEDARI', 'desawisatasedari@gmail.com', '1754545436_1753654219_IMG_0961.PNG', '$2y$10$yPlFKmhiQHFkYpup.KT9sOB4e2juSLhez1K31qnZDFtdGrk2qUWfi', 1, 1, 1754491237);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `link_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `id_jenis`, `nama_wisata`, `keterangan`, `link_video`) VALUES
(1, 1, 'Pantai Sedari', 'Keindahan pantai dan aktivitas nelayan', 'https://www.youtube.com/embed/eBto9NgAz2A'),
(5, 2, 'Hutan Mangrove Cikiong', 'Mangrove Sedari Karawang', 'https://www.youtube.com/embed/JilviHbUkfo');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `visi`, `misi`) VALUES
(1, 'Mewujudkan Desa Sedari sebagai destinasi wisata pesisir berkelanjutan berbasis pelestarian alam dan pemberdayaan masyarakat.', '- Melestarikan ekosistem pantai dan hutan mangrove\n- Mengembangkan potensi wisata edukatif dan budaya\n- Memberikan pelatihan dan peluang usaha kepada warga lokal\n- Menjadikan Sedari sebagai contoh desa wisata berbasis lingkungan di Karawang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `background_home`
--
ALTER TABLE `background_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `background_home`
--
ALTER TABLE `background_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_wisata` (`id_jenis`) ON DELETE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_wisata` (`id_jenis`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
