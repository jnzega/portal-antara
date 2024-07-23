-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2024 at 10:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_antara`
--

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `date`, `text`, `image`, `link`) VALUES
(1, 'PEWARTA ANTARA BIRO NTT RAIH JUARA I LOMBA JURNALISTIK BI-OJK', '2024-07-23', 'Pewarta Perum LKBN ANTARA Biro NTT Kornelis Kaha berhasil meraih juara I untuk lomba karya tulis jurnalistik dengan Tema \"UMKM NTT Hebat\" yang digelar oleh Bank Indonesia dan OJK NTT.', 'assets/img/card-thumbnail/pewarta-antara-biro-ntt-raih-juara-i-lomba-jurnalistik-bi-ojk.jpeg', 'https://korporat.antaranews.com/baca/2024/07/23/2319-pewarta-antara-biro-ntt-raih-juara-i-lomba-jurnalistik-biojk'),
(2, 'PEWARTA CILIK AMBIL ALIH ANTARA TERKAIT HARI ANAK NASIONAL', '2024-07-22', 'Pewarta cilik mengambil alih Kantor Berita ANTARA di Pasar Baru, Jakarta Pusat, untuk sementara pada Jumat (19/7) dalam acara \"Kids take over ANTARA\" untuk menyambut Hari Anak Nasional (HAN) yang akan jatuh pada 23 Juli 2024 mendatang.', 'assets/img/card-thumbnail/pewarta-cilik-ambil-alih-antara-terkait-hari-anak-nasional.jpg', 'https://korporat.antaranews.com/baca/2024/07/22/2318-pewarta-cilik-ambil-alih-antara-terkait-hari-anak-nasional'),
(3, 'ANTARA - DPLK BRI SINERGIKAN PENGELOLAAN DANA PENSIUN ANTARA', '2024-07-22', 'Manajemen Perum LKBN ANTARA dan DPLK BRI menandatangani perjanjian kerja sama pengelolaan dana pensiun ANTARA pada Kamis (18/7) di Antara Heritage Center, Jakarta.', 'assets/img/card-thumbnail/antara-dplk-bri-sinergikan-pengelolaan-dana-pensiun-antara.jpg', 'https://korporat.antaranews.com/baca/2024/07/22/2317-antara-dplk-bri-sinergikan-pengelolaan-dana-pensiun-antara'),
(4, 'DUBES BELANDA MENGAKU TERKESAN DENGAN ANTARA HERITAGE CENTER', '2024-07-22', 'Duta Besar Belanda untuk Indonesia Lambert Grijns mengaku terkesan dengan kompleks ANTARA Heritage Center (AHC) milik Perum Lembaga Kantor Berita Nasional (LKBN) ANTARA yang hasil revitalisasinya diresmikan pada Mei lalu.', 'assets/img/card-thumbnail/dubes-belanda-mengaku-terkesan-dengan-antara-heritage-center.jpg', 'https://korporat.antaranews.com/baca/2024/07/22/2316-dubes-belanda-mengaku-terkesan-dengan-antara-heritage-center'),
(5, 'ANTARA BIRO NTT DAN IMIGRASI ATAMBUA KOLABORASI PEMBERITAAN POSITIF', '2024-07-19', 'Lembaga Kantor Berita Nasional (LKBN) Biro Nusa Tenggara Timur (NTT) dan Kantor Imigrasi Atambua berkolaborasi untuk pemberitaan positif di wilayah perbatasan Indonesia dengan Timor Leste.', 'assets/img/card-thumbnail/antara-biro-ntt-dan-imigrasi-atambua-kolaborasi-pemberitaan-positif.jpeg', 'https://korporat.antaranews.com/baca/2024/07/19/2315-antara-biro-ntt-dan-imigrasi-atambua-kolaborasi-pemberitaan-positif'),
(6, 'DIRKEUMR ANTARA TINJAU KANTOR ANTARA BIRO BANTEN', '2024-07-15', 'Direktur Keuangan dan Manajemen Risiko Perum Lembaga Kantor Berita Negara (LKBN) ANTARA Nina Kurnia Dewi mengunjungi ANTARA Biro Banten di Kota Serang pada Jumat (12/7).', 'assets/img/card-thumbnail/dirkeumr-antara-tinjau-kantor-antara-biro-banten.jpeg', 'https://korporat.antaranews.com/baca/2024/07/15/2314-dirkeumr-antara-tinjau-kantor-berita-antara-biro-banten'),
(7, 'ANTARA SELENGGARAKAN PELATIHAN PENGELOLAAN DAN EVALUASI KETERBUKAAN INFORMASI PUBLIK', '2024-07-11', 'Perum LKBN ANTARA menYelenggarakan Pelatihan Pengelolaan dan Evaluasi Keterbukaan Informasi Publik yang diikuti oleh jajaran Pejabat Pengelola Informasi dan Dokumentasi (PPID) perusahaan pada Senin (8/7) di Wisma Antara B, Jakarta.', 'assets/img/card-thumbnail/antara-selenggarakan-pelatihan-pengelolaan-dan-evaluasi-keterbukaan-informasi-publik.jpeg', 'https://korporat.antaranews.com/baca/2024/07/11/2313-antara-selenggarakan-pelatihan-pengelolaan-dan-evaluasi-keterbukaan-informasi-publik'),
(8, 'PEWARTA ANTARA WAKILI KODIM HSU-BLG SABET JUARA 3 LKJ TMMD KE-120', '2024-07-11', 'Banjarmasin (ANTARA) - Pewarta Perum Lembaga Kantor Berita Nasional (LKBN) ANTARA Biro Kalimantan Selatan (Kalsel) Tumpal Andani Aritonang mewakili Kodim 1001/Hulu Sungai Utara-Balangan (HSU-BLG) meraih juara tiga kategori media online pada Lomba Karya Jurnalistik (LKJ) TNI Manunggal Membangun Desa (TMMD) ke-120.', 'assets/img/card-thumbnail/pewarta-antara-wakili-kodim-hsu-blg-sabet-juara-3-lkj-tmmd-ke-120.jpg', 'https://korporat.antaranews.com/baca/2024/07/11/2312-pewarta-antara-wakili-kodim-hsublg-sabet-juara-3-lkj-tmmd-ke120'),
(9, 'ANTARA KAWAL TRANSFORMASI YAYASAN BUMN MERESPONS ISU MASA DEPAN', '2024-07-10', 'Perusahaan Umum Lembaga Kantor Berita Nasional (Perum LKBN) ANTARA berkomitmen mengawal transformasi Yayasan BUMN dalam merespons tantangan isu masa depan di bidang kesehatan dan lingkungan hijau.', 'assets/img/card-thumbnail/antara-kawal-transformasi-yayasan-bumn-merespons-isu-masa-depan.jpg', 'https://korporat.antaranews.com/baca/2024/07/10/2311-antara-kawal-transformasi-yayasan-bumn-merespons-isu-masa-depan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
