-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 02:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sans`
--

-- --------------------------------------------------------

--
-- Table structure for table `average_ipd`
--

CREATE TABLE `average_ipd` (
  `id_avg` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `average_ipd`
--

INSERT INTO `average_ipd` (`id_avg`, `id_dosen`, `id_user`, `nilai`) VALUES
(36, 17, 2, '3.80'),
(37, 23, 5, '3.60');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `nidn` int(20) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mk` varchar(200) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nidn`, `deskripsi`, `kelas`, `mk`, `gambar`) VALUES
(17, 'Ajeng Sin', 123123123, 'Ajeng Sin adalah seorang dosen bahasa Inggris di Fakultas Vokasi, Universitas Brawijaya, yang menggabungkan keahlian akademis dan praktis dalam pembelajaran bahasa. Dengan gelar sarjana dan pengalaman mengajar yang luas, Ajeng membimbing mahasiswa dalam memperoleh pemahaman yang mendalam tentang bahasa Inggris dan budaya bahasa. Dia aktif dalam mengembangkan kurikulum yang relevan dan mengadakan kegiatan ekstrakurikuler untuk meningkatkan kemampuan berbahasa mahasiswa. Visinya adalah mempersiapkan mahasiswa dengan keterampilan bahasa yang diperlukan untuk sukses dalam lingkungan global yang terus berkembang. Dengan moto hidup \"Keterampilan, Komunikasi, Kesuksesan: Melangkah Maju dengan Bahasa Inggris,\" Ajeng membimbing mahasiswa menuju pencapaian potensi tertinggi mereka dalam mempelajari dan menggunakan bahasa Inggris dengan percaya diri dan efektif.', 'S4A', 'English', '1716688110_d9001d89742d73ff2ecd.png'),
(18, 'Aurora Putri', 231232, 'Aurora Putri adalah seorang dosen konten kreatif digital di Fakultas Vokasi, Universitas Brawijaya, yang membawa pengalaman praktis dan akademis ke dunia akademis. Dengan latar belakang pendidikan yang kuat dan pengalaman praktis yang luas, Aurora mengajar dan memimpin pengembangan kurikulum yang relevan. Selain itu, dia sering mengadakan workshop dan seminar untuk berbagi pengetahuannya kepada mahasiswa dan komunitas industri. Visinya adalah mempersiapkan mahasiswa dengan keterampilan yang relevan untuk sukses dalam industri konten kreatif digital yang berkembang pesat. Dengan dedikasi yang kuat dan moto hidup \"Kreativitas, Kolaborasi, Kesuksesan: Membentuk Masa Depan Digital,\" Aurora menjadi panutan dan berkomitmen untuk menginspirasi serta membimbing mahasiswa menuju kesuksesan di bidang konten kreatif digital.', 'S4B', 'Konten Kreatif Digital', '1716688293_63f12a24ccbf638960bf.png'),
(19, 'Dodi Cahyadi', 1233213, 'Dodi Cahyadi, seorang dosen jaringan komputer di Fakultas Vokasi, Universitas Brawijaya, membawa pengalaman industri yang luas dan latar belakang pendidikan yang solid ke dunia akademis. Selain mengajar dan memimpin pengembangan kurikulum, Dodi aktif dalam mengadakan seminar dan workshop untuk meningkatkan pemahaman mahasiswa tentang teknologi jaringan komputer. Visinya adalah mempersiapkan mahasiswa dengan pemahaman yang mendalam tentang jaringan komputer untuk menghadapi tantangan dunia kerja yang cepat berubah. Dengan moto hidup \"Inovasi, Kolaborasi, Kesuksesan: Menghadapi Masa Depan dengan Jaringan yang Kuat,\" Dodi memimpin dengan teladan dan berkomitmen untuk menginspirasi serta membimbing mahasiswa menuju kesuksesan di bidang jaringan komputer.\r\n', 'S4B', 'Jaringan Komputer\r\n', '1716710727_d422ebf16440936c1546.png'),
(22, 'Arman Said', 153512, 'Arman Said, seorang dosen agama Islam di Fakultas Vokasi, Universitas Brawijaya, membawa pengetahuan mendalam tentang Islam dan pengalaman mengajar yang beragam. Dengan tujuan membimbing mahasiswa memahami nilai-nilai serta praktik Islam, ia menggunakan metode kuliah, diskusi, dan kegiatan ekstrakurikuler. Arman berkomitmen untuk mempersiapkan mahasiswa menjadi individu yang penuh toleransi, pengertian, dan integritas moral dalam konteks agama Islam. Visinya adalah menginspirasi mahasiswa untuk memahami dan menerapkan nilai-nilai Islam dalam kehidupan sehari-hari, sementara misinya adalah memberikan pendidikan agama Islam yang berkualitas, memfasilitasi diskusi yang mendalam, dan mendukung pengembangan pribadi yang holistik bagi mahasiswa. Dengan moto hidup \"Toleransi, Pendidikan, Kebaikan: Membimbing dengan Cinta dan Pengertian,\" Arman berupaya menjadi teladan yang membimbing mahasiswa dengan kasih sayang dan pengertian.', 'S4A', 'Agama Islam', '1716710840_aff3d55db6dd78acb804.png'),
(23, 'Hilord', 987987, 'akhsdubkahkuhadjgafabj ab  aggdiag ga gdiah id abwdk whdl aghdkhajhdajdbjb uqee ogqwy efga slda kshfk afiyegf abh abia agf fbasbnm bfoegf aeb kabskgbeifg ag bab ai hfif abcn bakcbefg jahbfc vf nefhusb svbuagsdvabfoa bsvi bouvb sbv siobvsi ns \r\n\r\njangan lupa bernafas\r\n\r\n\r\n', 'S4A', 'Pemrograman Web', '1717226796_f86a12ca75a5aaa3fd2d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_fb` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_fb`, `id_dosen`, `subject`, `feedback`) VALUES
(2, 17, 'ibunya baik', 'ah masa sih?'),
(3, 23, 'guru baru yang cringe', 'gajelas akjsdhkahsdhjbejhbada'),
(4, 23, 'jkashdkjh', 'Dosen selalu menjawab pertanyaan yang ditanyakan oleh mahasiswa.Dosen selalu menjawab pertanyaan yang ditanyakan oleh mahasiswa.Dosen selalu menjawab pertanyaan yang ditanyakan oleh mahasiswa.Dosen selalu menjawab pertanyaan yang ditanyakan oleh mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_dosen`, `id_user`, `id_pertanyaan`, `jawaban`) VALUES
(491, 17, 2, 3, 5),
(492, 17, 2, 4, 5),
(493, 17, 2, 5, 5),
(494, 17, 2, 6, 5),
(495, 17, 2, 7, 5),
(496, 17, 5, 3, 5),
(497, 17, 5, 4, 5),
(498, 17, 5, 5, 5),
(499, 17, 5, 6, 3),
(500, 17, 5, 7, 5),
(501, 23, 5, 3, 5),
(502, 23, 5, 4, 5),
(503, 23, 5, 5, 5),
(504, 23, 5, 6, 5),
(505, 23, 5, 7, 1),
(506, 23, 2, 3, 5),
(507, 23, 2, 4, 5),
(508, 23, 2, 5, 5),
(509, 23, 2, 6, 5),
(510, 23, 2, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`) VALUES
(3, 'Dosen selalu datang tepat waktu'),
(4, 'Dosen menjawab pertanyaan mahasiswa dengan penuh dekasi'),
(5, 'Dosen selalu menghargai pendapat mahasiswa'),
(6, 'Dosen sangat terampil dalam menjelaskan materi'),
(7, 'Dosen selalu menjawab pertanyaan yang ditanyakan oleh mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ipd` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id`, `id_dosen`, `id_user`, `ipd`) VALUES
(96, 17, 2, '4.00'),
(97, 17, 5, '3.60'),
(98, 23, 5, '3.20'),
(99, 23, 2, '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`, `kelas`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', ''),
(2, 'user', 'user@gmail.com', 'user', 'user', 'S4A'),
(5, 'coba', 'coba@gmail.com', 'coba', 'user', 'S4A'),
(14, 'dodi', 'dods@gmail.com', 'dodi', 'user', 'S4B'),
(15, 'ade', 'ade@gmail.com', 'ade', 'user', 'S4B'),
(16, 'asep', 'asep@gmail.com', 'asep', 'user', 'S4A'),
(17, 'sar', 'sar@gmail.com', 'sar', 'user', 'S4B'),
(18, 'san', 'san@gmail.com', 'san', 'user', 'S4A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `average_ipd`
--
ALTER TABLE `average_ipd`
  ADD PRIMARY KEY (`id_avg`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_fb`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_dosen` (`id_dosen`,`id_user`,`id_pertanyaan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `average_ipd`
--
ALTER TABLE `average_ipd`
  MODIFY `id_avg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_fb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `average_ipd`
--
ALTER TABLE `average_ipd`
  ADD CONSTRAINT `average_ipd_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `jawaban_ibfk_3` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id`);

--
-- Constraints for table `survei`
--
ALTER TABLE `survei`
  ADD CONSTRAINT `survei_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `survei_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
