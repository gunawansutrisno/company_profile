-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 08:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbiso`
--

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `home_setting` varchar(100) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tentang` varchar(500) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `yacht` text NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `judul_1` varchar(200) DEFAULT NULL,
  `pesan_1` varchar(200) DEFAULT NULL,
  `judul_2` varchar(200) DEFAULT NULL,
  `pesan_2` varchar(200) DEFAULT NULL,
  `judul_3` varchar(200) DEFAULT NULL,
  `pesan_3` varchar(200) DEFAULT NULL,
  `judul_4` varchar(200) DEFAULT NULL,
  `pesan_4` varchar(200) DEFAULT NULL,
  `judul_5` varchar(200) DEFAULT NULL,
  `pesan_5` varchar(200) NOT NULL,
  `judul_6` varchar(200) DEFAULT NULL,
  `pesan_6` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `home_setting`, `namaweb`, `tagline`, `tentang`, `gambar`, `video`, `yacht`, `website`, `email`, `alamat`, `telepon`, `hp`, `fax`, `logo`, `icon`, `keywords`, `metatext`, `facebook`, `twitter`, `instagram`, `google_map`, `judul_1`, `pesan_1`, `judul_2`, `pesan_2`, `judul_3`, `pesan_3`, `judul_4`, `pesan_4`, `judul_5`, `pesan_5`, `judul_6`, `pesan_6`, `id_user`, `tanggal`) VALUES
(1, 'SISTEM MANAJEMEN TERPADU ISO', 'Molindo Iso', 'Selamat datang di Web ISO Molindo', 'Incorporated', 'Seven_Seas_Upper_Deck1.jpg', 'fsH_KhUWfho', '<p>Through the adoption of a proactive stance, the astute manager can adopt a position at the vanguard. In order to build a shared view of what can be improved, to experience a profound paradigm shift, that will indubitably lay the firm foundations for any leading company. Exploitation of core competencies as an essential enabler, exploiting the productive lifecycle by moving executive focus from lag financial indicators to more actionable lead indicators.</p>\r\n<p>An investment program where cash flows exactly match shareholders\' preferred time patterns of consumption defensive reasoning, the doom loop and doom zoom highly motivated participants contributing to a valued-added outcome. In order to build a shared view of what can be improved, in a collaborative, forward-thinking venture brought together through the merging of like minds. Combined with optimal use of human resources, from binary cause and effect to complex patterns, working through a top-down, bottom-up approach. Maximization of shareholder wealth through separation of ownership from management measure the process, not the people. While those at the coal face don\'t have sufficient view of the overall goals.</p>\r\n<p>Whenever single-loop learning strategies go wrong, to focus on improvement, not cost, in order to build a shared view of what can be improved. An important ingredient of business process reengineering that will indubitably lay the firm foundations for any leading company the new golden rule gives enormous power to those individuals and units. Whenever single-loop learning strategies go wrong, building a dynamic relationship between the main players. Organizations capable of double-loop learning, through the adoption of a proactive stance, the astute manager can adopt a position at the vanguard.</p>\r\n<p>To ensure that non-operating cash outflows are assessed. An important ingredient of business process reengineering big is no longer impregnable to experience a profound paradigm shift. The new golden rule gives enormous power to those individuals and units, while those at the coal face don\'t have sufficient view of the overall goals. Taking full cognizance of organizational learning parameters and principles, working through a top-down, bottom-up approach, an investment program where cash flows exactly match shareholders\' preferred time patterns of consumption. Big is no longer impregnable in a collaborative, forward-thinking venture brought together through the merging of like minds.</p>\r\n<p>Through the adoption of a proactive stance, the astute manager can adopt a position at the vanguard. The three cs - customers, competition and change - have created a new world for business motivating participants and capturing their expectations, organizations capable of double-loop learning. To focus on improvement, not cost, exploiting the productive lifecycle taking full cognizance of organizational learning parameters and principles. Presentation of the process flow should culminate in idea generation, the balanced scorecard, like the executive dashboard, is an essential tool quantitative analysis of all the key ratios has a vital role to play in this.</p>\r\n<p> </p>', 'http://molindo.co.id', 'info@molindo.co.id', 'Cimanggis, Depok Indonesia', '+62 341 426681', '08xxxxxxxxx', '021-xxxxxxx', 'lgo_heads_molindo.svg', '', 'PT Molindo Raya Industrial', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.4654375178407!2d112.70271801477865!3d-7.8462571943466175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629d2b01482e3%3A0x84056f3268042c7a!2sPT.%20Molindo%20Raya%20Industrial!5e0!3m2!1sid!2sid!4v1578622767864!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'MEMBANGUN BUDAYA PERUSAHAAN', 'BUDAYA', 'MEMBANGUN BUDAYA PELAYANAN', 'TEPAT WAKTU', 'MENINGKATKAN PELAYANAN CALL CENTER', 'HEMAT', 'PROGRAM PENDIDIKAN KHUSUS', 'MURAH', 'PROGRAM SEMITAINMENT TRAINING', 'DIJAMIN BISA', 'JUNGGLE SURVIVAL TRAINING', 'YA SUDAHLAH', 0, '2020-01-13 03:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `mst_document`
--

CREATE TABLE `mst_document` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `revisi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `kategori` int(11) NOT NULL,
  `subkategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_document`
--

INSERT INTO `mst_document` (`id`, `judul`, `jenis`, `revisi`, `status`, `createddate`, `createdby`, `updateddate`, `updatedby`, `file`, `kategori`, `subkategori`, `deskripsi`) VALUES
(10, 'SLS/P-01 Penanganan Order', '45', 1, 1, '2020-01-27 02:37:45', 1, '2021-06-02 03:18:18', 1, 'ISO-SLS-P-01_REV08_Penanganan_Order.pdf', 3, 10, ''),
(11, 'SLS/P-02 Penanganan Komplain', '46', 1, 1, '2020-01-27 02:38:44', 1, '2021-06-02 03:19:10', 1, 'ISO-SLS-P-02_REV08_Penanganan_Komplain.pdf', 3, 10, ''),
(12, 'SLS/P-03 Survey Kepuasan Pelanggan', '47', 2, 1, '2020-01-27 02:39:34', 1, '2022-08-24 11:00:35', 1, 'ISO-SLS-P-03_ED02-REV00_SURVEY_KEPUASAN.pdf', 3, 10, ''),
(13, 'PPC/P-01 Perencanaan dan Pengendalian Produksi', '48', 4, 1, '2020-01-27 02:44:40', 1, '2022-03-30 11:52:56', 1, 'ISO-PPC-P-01_REV09..pdf', 3, 12, ''),
(14, 'PRO/P-01 Pengendalian Proses Fermentasi', '49', 1, 1, '2020-01-27 02:45:42', 1, '2021-06-02 03:25:09', 1, 'ISO-PRO-P-01_ED01-10_PENGENDALIAN_PROSES_FERMENTASI.pdf', 3, 13, ''),
(15, 'PRO/P-02 Pengendalian Proses Distilasi', '50', 1, 1, '2020-01-27 02:46:23', 1, '2021-06-02 03:30:23', 1, 'ISO-PRO-P-02_ED01-09_PENGENDALIAN_PROSES_DISTILASI.pdf', 3, 13, ''),
(16, 'FIN/P-01 Penerimaan dan Pengeluaran Produk Jadi', '35', 1, 1, '2020-01-27 02:47:34', 1, '2021-06-03 01:34:51', 1, 'ISO-FIN-P-01_REV08_Pen_Peng_Produk_jadi.pdf', 3, 14, ''),
(17, 'FIN/P-02 Distribusi', '36', 4, 1, '2020-01-27 02:48:02', 1, '2022-01-12 08:07:44', 1, 'ISO-FIN-P-02_ED02-01_Distribusi.pdf', 3, 14, ''),
(18, 'PUR/P-01 Pembelian Bahan Baku', '29', 1, 1, '2020-01-27 02:59:18', 1, '2022-03-29 03:01:04', 1, 'ISO-PUR-P-01_ED01-07_PEMBELIAN_BAHAN_BAKU.pdf', 3, 18, ''),
(19, 'PUR/P-02 Pembelian Barang dan Jasa', '30', 2, 1, '2020-01-27 02:59:55', 1, '2022-03-29 03:01:51', 1, 'ISO-PUR-P-02_Ed02-05_PEMBELIAN_BARANG_JASA.pdf', 3, 18, ''),
(20, 'PUR/P-03 Seleksi dan Evaluasi Supplier', '31', 2, 1, '2020-01-27 03:00:36', 1, '2022-08-24 10:55:56', 1, 'ISO-PUR-P-03_ED02-02_SELEKSI_EVALUASI_SUPPLIER.pdf', 3, 18, ''),
(21, 'MAH/P-01 Penerimaan dan Pengeluaran Bahan Baku dan Bahan Penolong', '32', 1, 1, '2020-01-27 03:01:44', 1, '2021-06-03 01:37:58', 1, 'ISO-MAH-P-01_Ed.02-06_Pen._Bhn_BakuPenolong.pdf', 3, 19, ''),
(22, 'MAH/P-02 Penerimaan dan Penyimpanan Barang', '33', 1, 1, '2020-01-27 03:02:26', 1, '2021-06-03 01:39:49', 1, 'ISO-MAH-P-02_REV08.PENERIMAANPENYIMPANAN_BRG.pdf', 3, 19, ''),
(23, 'MAH/P-03 Permintaan dan Pengeluaran Barang', '34', 1, 1, '2020-01-27 03:03:41', 1, '2021-06-03 01:40:18', 1, 'ISO-MAH-P-03_ED02REV04.PERMINTAANPENGELUARAN_BRG.pdf', 3, 19, ''),
(24, 'MTC/P-01 Perawatan dan Perbaikan mesin Produksi', '37', 1, 1, '2020-01-27 03:21:38', 1, '2021-06-03 01:41:29', 1, 'ISO-MTC-P-01_ED02-05_PERAWATAN_PERBAIKAN_MESIN.pdf', 3, 15, ''),
(25, 'UTL/P-01 Utilitas', '38', 1, 1, '2020-01-27 03:23:16', 1, '2021-06-03 01:42:04', 1, 'ISO-UTL-P-01_ED02_Rev04_UTILITAS.pdf', 3, 16, ''),
(26, 'QCT/P-01 Inspeksi Bahan Baku', '39', 2, 1, '2020-01-27 03:24:46', 1, '2023-01-21 08:32:32', 1, 'ISO-QCT_P-01_Ed02-05_P._INSPEKSI_BAHAN_BAKU..pdf', 3, 17, ''),
(27, 'QCT/P-02 Inspeksi Proses Produksi', '40', 1, 1, '2020-01-27 03:25:32', 1, '2021-06-03 01:43:03', 1, 'ISO-QCT_P-02_ED01-10_P._INSPEKSI_PROSES_PRODUKSI.pdf', 3, 17, ''),
(28, 'QCT/P-03 Inspeksi Produk Jadi', '41', 1, 1, '2020-01-27 03:27:14', 1, '2021-06-03 01:44:01', 1, 'ISO-QCT_P-03_ED02-10_P._INSPEKSI_PRODUK_JADI.pdf', 3, 17, ''),
(29, 'QCT/P-04 Penanganan Produk Tidak Sesuai', '42', 1, 1, '2020-01-27 03:28:40', 1, '2021-06-03 01:44:37', 1, 'ISO-QCT_P-04_ED01-06_P._PEN._PRODUK_TIDAK_SESUAI.pdf', 3, 17, ''),
(30, 'QCT/P-05 Kalibrasi Alat Uji dan Alat Ukur', '43', 1, 1, '2020-01-27 03:29:42', 1, '2021-06-03 01:45:04', 1, 'ISO-QCT_P-05_ED02-03_P._KALIBRASI_ALAT_UJI.pdf', 3, 17, ''),
(31, 'QCT.P-06 Verifikasi Cleaning Mesin Produksi', '44', 1, 1, '2020-01-27 03:30:22', 1, '2021-06-03 01:45:39', 1, 'ISO-QCT-P-06_ED01-03_Verifikasi_Cleaning_Mesin_Produksi.pdf', 3, 17, ''),
(32, 'HRD/P-01 Perencanaan Sumber Daya Manusia', '54', 1, 1, '2020-01-27 03:37:28', 1, '2021-06-03 01:46:16', 1, 'ISO-HRD_P-01_REV09_Perencanaan_SDM.pdf', 3, 20, ''),
(33, 'HRD/P-02 Rekrutasi dan Seleksi', '55', 1, 1, '2020-01-27 03:38:08', 1, '2021-06-03 01:46:49', 1, 'ISO-HRD_P-02_ED02-02_Rekrutasi_Seleksi.pdf', 3, 20, ''),
(34, 'HRD/P-03 Manajemen Karir', '56', 1, 1, '2020-01-27 03:38:48', 1, '2021-06-03 01:47:20', 1, 'ISO-HRD-P-03_ED02-01_Man._Karir.pdf', 3, 20, ''),
(35, 'HRD/P-04 Pelatihan dan Pengembangan SDM', '57', 1, 1, '2020-01-27 03:39:21', 1, '2021-06-03 01:47:52', 1, 'ISO-HRD-P-04_ED02-01_Pelatihan.pdf', 3, 20, ''),
(36, 'ITS/P-01 Perawatan HW/SW', '51', 5, 1, '2020-01-27 03:40:16', 1, '2023-03-06 02:44:55', 1, 'ISO-ITS_P-01_REV08_P._Perawatan_HW-SW.pdf', 3, 21, ''),
(37, 'ITS/P-02 Instalasi Program dan Perbaikan', '52', 1, 1, '2020-01-27 03:41:32', 1, '2021-06-03 01:49:18', 1, 'ISO-ITS_P-02_REV06_P._Instalasi_Program_Perbaikan.pdf', 3, 21, ''),
(38, 'ITS/P-03 Backup', '53', 1, 1, '2020-01-27 03:43:29', 1, '2021-06-03 01:49:45', 1, 'ISO-ITS_P-03_REV08_P._BACKUP.pdf', 3, 21, ''),
(39, 'INF/P-01 Perawatan dan Perbaikan Fasum', '58', 1, 1, '2020-01-27 03:55:47', 1, '2021-06-03 01:50:24', 1, 'ISO-INF-P-01_ED02-00_PERAWATANPERBAIKAN_FASUM.pdf', 3, 22, ''),
(40, 'INF/P-02 Pengendalian Keluar-Masuk Barang dan Angkutan', '59', 1, 1, '2020-01-27 03:56:36', 1, '2021-06-03 01:51:12', 1, 'ISO-INF-P-02_ED01-03_Keluar-msk_Barang.pdf', 3, 22, ''),
(41, 'INF/P-03 Penerimaan Tamu dan Pengamanan Perusahaan', '60', 1, 1, '2020-01-27 03:57:55', 1, '2021-06-03 01:51:49', 1, 'ISO-INF-P-03_ED01-05_P._TAMUPENGAMANAN_PERUSAHAAN.pdf', 3, 22, ''),
(42, 'RNI/P-01 Pengendalian Dokumen', '9', 3, 1, '2020-01-28 07:47:57', 1, '2021-06-03 02:26:21', 1, 'ISO-RNI-P-01_Ed02_REV01_PENGENDALIAN_DOKUMEN.pdf', 3, 24, ''),
(43, 'RNI/P-02 Pengendalian Catatan', '10', 2, 1, '2020-01-28 07:49:37', 1, '2022-08-24 11:01:38', 1, 'ISO-RNI-P-02_Ed02Rev04.PENG._CATATAN.pdf', 3, 24, ''),
(44, 'RNI/P-03 Audit Internal', '11', 3, 1, '2020-01-28 07:50:12', 1, '2022-04-08 02:17:19', 1, 'ISO-RNI-P-03_ED02REV03_AUDIT_INTERNAL..pdf', 3, 24, ''),
(45, 'RNI/P-04 Tindakan Perbaikan', '12', 2, 1, '2020-01-28 07:50:40', 1, '2022-08-24 11:02:17', 1, 'ISO-RNI-P-04_REV10_Tindakan_Perbaikan.pdf', 3, 24, ''),
(46, 'RNI/P-05 Tinjauan Manajemen', '13', 1, 1, '2020-01-28 07:52:14', 1, '2021-06-03 02:29:09', 1, 'ISO-RNI-P-05_ED02_REV03_TINJAUAN_MANAJEMEN.pdf', 3, 24, ''),
(47, 'RNI/P-06 Identifikasi dan Kemamputelusuran', '14', 1, 1, '2020-01-28 07:53:07', 1, '2021-06-03 02:29:33', 1, 'ISO-RNI-P-06_Rev06_IdentifikasiKemamputelusuran.pdf', 3, 24, ''),
(48, 'RNI/P-07 Penarikan Produk', '15', 3, 1, '2020-01-28 07:53:57', 1, '2023-01-05 03:01:03', 1, 'ISO-RNI-P-07_ED02-REV02_Penarikan_Produk.pdf', 3, 24, ''),
(49, 'RNI/P-08 Identifikasi HACCP', '16', 1, 1, '2020-01-28 07:54:37', 1, '2023-01-05 03:02:04', 1, 'ISO-RNI-P-08_ED03rev00_HACCP.pdf', 3, 24, ''),
(50, 'RNI/-09 Manajemen Perubahan', '17', 1, 1, '2020-01-28 07:56:16', 1, '2021-06-03 02:34:10', 1, 'ISO-RNI-P-09_REV03_Manajemen_Perubahan.pdf', 3, 24, ''),
(51, 'RNI/P-10 Verifikasi CCP', '18', 1, 1, '2020-01-28 07:59:30', 1, '2021-06-03 02:36:41', 1, 'ISO-RNI-P-10_Rev03_Verifikasi_CCP.pdf', 3, 24, ''),
(52, 'RNI/P-11 Analisa Resiko dan Peluang', '19', 1, 1, '2020-01-28 08:00:42', 1, '2021-06-03 02:34:59', 1, 'ISO-RNI-P-11_Rev02_Analisa_Resiko.pdf', 3, 24, ''),
(53, 'RNI/P-12 Identifikasi TACCP dan VACCP', '20', 1, 1, '2020-01-28 08:01:25', 1, '2023-01-05 03:02:58', 1, 'ISO-RNI-P-12_ED02Rev00_TACCPVACCP.pdf', 3, 24, ''),
(54, 'SHE/P-01 Keselamatan Kerja Umum', '21', 2, 1, '2020-01-28 08:07:27', 1, '2021-09-06 11:56:39', 1, 'ISO-SHE-P-01-ED02-02-KESELAMATAN_KERJA_UMUM.pdf', 3, 23, ''),
(55, 'SHE/P-02 Pekerjaan Berbahaya', '22', 2, 1, '2020-01-28 08:08:17', 1, '2021-05-24 07:35:51', 1, 'ISO-SHE-P-02-Ed02-02-Pekerjaan_Berbahaya.pdf', 3, 0, ''),
(56, 'SHE/P-03 Keadaan Darurat dan Investigasi Kecelakaan', '23', 2, 1, '2020-01-28 08:09:10', 1, '2021-05-24 08:27:36', 1, 'ISO-SHE-P-03-ED02-02_Keadaan_Darurat.pdf', 3, 23, ''),
(57, 'SHE/P-04 Identifikasi Resiko, Penilaian dan Kontrol (HIRAC)', '24', 1, 1, '2020-01-28 08:10:15', 1, '2021-05-24 07:40:56', 1, 'ISO-SHE-P-04-ED03-01-HIRA.pdf', 3, 0, ''),
(58, 'SHE/P-05 Identifikasi dan Evaluasi Pemenuhan Peraturan Per-UU', '25', 1, 1, '2020-01-28 08:11:06', 1, '2021-05-24 07:41:20', 1, 'ISO-SHE-P-05-ED03-01_Pemenuhan_UU.pdf', 3, 0, ''),
(59, 'SHE/P-06 Pengendalian Proteksi Kebakaran', '26', 6, 1, '2020-01-28 08:11:43', 1, '2021-05-24 07:59:41', 1, 'ISO-SHE-P-06-ED03-01-Proteksi_Kebakaran.pdf', 3, 23, '<p>-</p>'),
(60, 'SHE/P-07 Pengendalian Kontraktor', '27', 7, 1, '2020-01-28 08:12:22', 1, '2021-05-24 08:07:36', 1, 'ISO-SHE-P-07-ED03-01_Pengendalian_Kontraktor.pdf', 3, 23, ''),
(61, 'SHE/P-08 Pengendalian Hama', '28', 1, 1, '2020-01-28 08:12:57', 1, '2023-01-21 08:31:42', 1, 'ISO-SHE-P-08-Ed03_Rev02Pengendalian_Hama.pdf', 3, 23, ''),
(62, 'Sertifikat ISO 9001 :  2015', '0', 7, 1, '2020-01-28 08:16:12', 1, '2023-01-25 11:07:23', 1, 'CERTIFICATE_ISO_9001-0044799_2021-2024.pdf', 6, 26, ''),
(63, 'Sertifikat FSSC 22000', '0', 2, 1, '2020-01-28 08:23:52', 1, '2022-08-24 11:10:52', 1, 'CERTIFICATE_FSSC-0048730-V5.1_2022-2023.pdf', 6, 27, ''),
(64, 'Sertifikat OHSAS 18001 : 2007', '0', 0, 1, '2020-01-28 08:24:33', 1, '0000-00-00 00:00:00', 0, 'Sertifkat_OHSAS_2019-2021.pdf', 6, 28, ''),
(65, 'Sertifikat Kosher', '0', 2, 1, '2020-01-28 08:25:47', 1, '2022-08-24 11:09:21', 1, 'Kosher_Certificate_2022-2023.pdf', 6, 29, ''),
(66, 'CR MEI 2018 ISO 9001', '87', 0, 1, '2020-01-28 08:45:43', 1, '0000-00-00 00:00:00', 0, 'JKT6004111_INT_ISO_CR_NST_Mei_2018.pdf', 7, 30, ''),
(67, 'SV 1 NOV 2018 ISO 9001', '88', 0, 1, '2020-01-28 08:47:28', 1, '0000-00-00 00:00:00', 0, 'JKT6004111_AR_ISO_SV1-Nov2018.pdf', 7, 30, ''),
(68, 'SV 4 & SV 5 AGS 2018 OHSAS', '93', 0, 1, '2020-01-28 08:50:00', 1, '0000-00-00 00:00:00', 0, 'JKT6015008_OHSAS_SV_45_Agustus_2018.pdf', 7, 32, ''),
(69, 'CR JAN 2019 OHSAS', '94', 0, 1, '2020-01-28 08:51:12', 1, '0000-00-00 00:00:00', 0, 'JKT6015008_OHSAS_CR_Jan_2019.pdf', 7, 32, ''),
(70, 'SV 1 NOV 2019 OHSAS', '95', 0, 1, '2020-01-28 08:51:56', 1, '0000-00-00 00:00:00', 0, 'JKT6015008_OHSAS_SV_1_Nov_2019.pdf', 7, 32, ''),
(71, 'SV 2 JUN 2018 FSSC', '90', 0, 1, '2020-01-28 08:54:18', 1, '0000-00-00 00:00:00', 0, 'JKT6018099_AR_SV_2_Jun_2018.pdf', 7, 31, ''),
(72, 'SV 3 NOV 2018 FSSC', '91', 0, 1, '2020-01-28 08:54:47', 1, '0000-00-00 00:00:00', 0, 'JKT6018099_AR_SV_3-_Nov2018.pdf', 7, 31, ''),
(73, 'SV 4 & SV 5 JUL 2019 FSSC', '92', 0, 1, '2020-01-28 08:55:41', 1, '0000-00-00 00:00:00', 0, 'JKT6018099_AR_3065142_SV_45-JUL2019.pdf', 7, 31, ''),
(74, 'SHE/IK-01/01 Peraturan K3LH', '61', 2, 1, '2020-01-28 10:09:24', 1, '2021-09-06 01:19:29', 1, 'IK-SHE-P-01-01_ED03-01_Peraturan_K3.pdf', 2, 25, ''),
(75, 'SHE/IK-01/02 Pengendalian APD', '62', 2, 1, '2020-01-28 10:10:32', 1, '2021-09-06 01:20:59', 1, 'IK-SHE-P-01-02-ED03-01_PENG._APD1.pdf', 2, 25, ''),
(76, 'SHE/IK-01/03 Peraturan Kerja dan Hygiene Karyawan', '63', 2, 1, '2020-01-28 10:12:09', 1, '2021-09-06 01:21:47', 1, 'IK-SHE-P-01-03_Rev.01_Peraturan_kerja_Higienis_Rev(1).pdf', 2, 25, ''),
(77, 'SHE/IK-02/01 Pengajuan Ijin Kerja Panas', '64', 2, 1, '2020-01-28 10:13:18', 1, '2021-09-06 01:39:23', 1, 'IK-SHE-P-02-01_Ed03-01_Ijin_Kerja_Panas.pdf', 2, 25, ''),
(78, 'SHE/IK-02/02 Pengajuan Ijin Kerja Ketinggian', '65', 1, 1, '2020-01-28 10:14:43', 1, '2021-06-05 10:41:26', 1, 'IK-SHE-P-02-02-ED03-01_IJIN_KRJ_KETINGGIAN.pdf', 2, 25, ''),
(79, 'SHE/IK-02/03 Pengajuan Ijin Kerja Ruang Terbatas', '66', 1, 1, '2020-01-28 10:15:36', 1, '2021-06-05 10:42:11', 1, 'IK-SHE-P-02-03_Ed03.01_Ijin_Kerja_Ruang_Terbatas.pdf', 2, 25, ''),
(80, 'SHE/IK-03/01 Penanggulanagn Kebakaran', '67', 1, 1, '2020-01-28 10:18:47', 1, '2021-06-05 10:43:39', 1, 'IK-SHE-P-03-01-ED03-01_PEN.KEBAKARAN.pdf', 2, 25, ''),
(81, 'SHE/IK-03/02 Evakuasi Keadaan Darurat', '68', 1, 1, '2020-01-28 10:20:01', 1, '2021-06-05 10:44:28', 1, 'IK-SHE-P-03-02-ED03-01_EV.KEADAAN_DARURAT.pdf', 2, 25, ''),
(82, 'SHE/IK-03/03 Penanganan Kecelakaan Kerja', '69', 1, 1, '2020-01-28 10:21:08', 1, '2021-06-05 10:45:15', 1, 'IK-SHE-P-03-03-ED03-01_PEN.KECELAKAAN_KRJ.pdf', 2, 25, ''),
(83, 'SHE/IK-03/04 Investigasi Kecelakaan Kerja dan Near Miss', '70', 1, 1, '2020-01-28 10:22:38', 1, '2021-06-05 10:46:07', 1, 'IK-SHE-P-03-04_Ed03-01_INVESTIGASI_KECELAKAAN.pdf', 2, 25, ''),
(84, 'SHE/IK-03/05 Penanganan Penyakit Akibat Kerja', '71', 1, 1, '2020-01-28 10:23:48', 1, '2021-06-05 10:48:12', 1, 'IK-SHE-P-03-05-ED03-01_PEN._PAK.pdf', 2, 25, ''),
(85, 'SHE/IK-03/06 Penanganan Ancaman Bom', '72', 1, 1, '2020-01-28 10:24:44', 1, '2021-06-05 11:36:55', 0, 'IK-SHE-P-03-06-ED03-01_ANCAMAN_BOM.pdf', 2, 25, ''),
(86, 'SHE/IK-03/07 Pengendalian Bencana Tanah Longsor dan Gempa Bumi', '73', 1, 1, '2020-01-28 10:29:25', 1, '2021-06-05 11:48:01', 1, 'IK-SHE-P-03-07-ED03-01_PENG._BENCANA.pdf', 2, 25, ''),
(87, 'SHE/IK-03/09 Penanggulangan Kebocoran Bahan Kimia', '75', 1, 1, '2020-01-28 10:30:32', 1, '2021-06-05 11:48:42', 1, 'IK-SHE-P-03-09-ED03-01_PENG.KEBOCORAN_BHN_KIMIA.pdf', 2, 25, ''),
(88, 'SHE/IK-03/10 Pertolongan Pertama', '76', 1, 1, '2020-01-28 10:31:17', 1, '2021-06-05 11:49:52', 1, 'IK-SHE-P-03-10-ED03-01_PERTOLONGAN_PERTAMA.pdf', 2, 25, ''),
(89, 'SHE/IK-03/11 Tugas dan Tanggung Jawab Team Tanggap Darurat', '77', 1, 1, '2020-01-28 10:32:28', 1, '2021-06-05 11:50:29', 1, 'IK-SHE-P-03-11-ED03-01_TUGAS_TEAM_TGP_DARURAT.pdf', 2, 25, ''),
(90, 'SHE/IK-03/12 P2K3L', '78', 1, 1, '2020-01-28 10:33:46', 1, '2021-06-05 11:50:57', 1, 'IK-SHE-P-03-12-ED03-01_P2K3L.pdf', 2, 25, ''),
(91, 'SHE/IK-03/13 Pertolongan Kecelakaan Sumber Tegangan (Tersetrum)', '79', 1, 1, '2020-01-28 10:35:48', 1, '2021-06-05 11:51:27', 1, 'IK-SHE-P-03-13_Ed03-01_Tersetrum.pdf', 2, 25, ''),
(92, 'SHE/IK-03/14 Bahaya Ancaman Terorisme', '80', 1, 1, '2020-01-28 10:37:22', 1, '2021-06-05 11:51:57', 1, 'IK-SHE-P-03-14_Ed03-01_Terorisme.pdf', 2, 25, ''),
(93, 'SHE/IK-03/15 Pertolongan Korban Keracunan Makanan', '81', 1, 1, '2020-01-28 10:38:43', 1, '2021-06-05 11:52:30', 1, 'IK-SHE-P-03-15_ED.02.01_Keracunan_Makanan.pdf', 2, 25, ''),
(94, 'SHE/IK-04/01 Identifikasi Bahaya, Penilaian & Pengendalian Resiko (HIRAC)', '82', 6, 1, '2020-01-28 11:04:43', 1, '2022-07-22 01:10:38', 1, 'IK-SHE-P-04-01_Ed.03-02_HIRA.pdf', 2, 25, ''),
(95, 'SHE/IK-04/02 Objective, Target dan Program (OTP)', '83', 1, 1, '2020-01-28 11:05:45', 1, '2021-06-05 11:54:16', 1, 'IK-SHE-P-04-02-ED03-01_OTP.pdf', 2, 25, ''),
(96, 'SHE/IK-06/01 Pengendalian APAR', '84', 1, 1, '2020-01-28 11:06:34', 1, '2021-06-05 11:54:48', 1, 'IK-SHE-P-06-01-ED03-01_Peng_APAR.pdf', 2, 25, ''),
(97, 'SHE/IK-06/02 Pengendalian Hydrant System', '85', 1, 1, '2020-01-28 11:07:21', 1, '2021-06-05 11:55:32', 1, 'IK-SHE-P-06-02-ED03-01_Peng.Hydrant.pdf', 2, 25, ''),
(98, 'SHE/IK-06/03 Pengendalian Alarm', '86', 1, 1, '2020-01-28 11:08:32', 1, '2021-06-05 11:56:05', 1, 'IK-SHE-P-06-03-ED03-01_Peng.ALARM.pdf', 2, 25, ''),
(99, 'SHE/IK-03/08 Pengendalian Huru Hara', '74', 1, 1, '2020-01-29 04:01:40', 1, '2021-06-05 11:56:48', 1, 'IK-SHE-P-03-08_ED03-01_Pengendalian_Huru-Hara.pdf', 2, 25, ''),
(100, 'SHE/P-09 Pengendalian Covid-19/Corona di Area Perusahaan', '96', 10, 1, '2020-10-05 10:47:40', 1, '2021-01-21 08:25:32', 1, 'SHE-P-09_ED.01-01_Pengendalian_Corona.pdf', 3, 23, ''),
(101, 'SHE/IK-09/01 Pengendalian Karyawan Saat Pandemi Corona', '97', 0, 1, '2020-10-05 11:54:17', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-01_Peng._Karyawan_saat_Corona.pdf', 2, 25, ''),
(102, 'SHE/IK-09/02 Pengendalian Kontraktor Saat Pandemi Corona', '98', 0, 1, '2020-10-05 01:28:08', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-02_Peng._Kontraktor_saat_Corona_.pdf', 2, 25, ''),
(103, 'SHE/IK-09/03 Pengendalian Tamu/Rekanan Saat Pandemi Corona', '99', 0, 1, '2020-10-05 01:30:04', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-03_Peng._Tamu_saat_Corona.pdf', 2, 25, ''),
(104, 'SHE/IK-09/04 Pengendalian Transportir, Supplier & Ekspedisi Saat Pandemi Corona', '100', 0, 1, '2020-10-05 01:33:39', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-04_Peng._Trans_Ekspedisi.pdf', 2, 25, ''),
(105, 'SHE/IK-09/05 Pengendalian Kontraktor/Rekanan dari Luar Daerah', '101', 0, 1, '2020-10-05 01:37:08', 1, '0000-00-00 00:00:00', 0, 'SHE-Ik-09-05_Peng._Kontraktor_Luar_Daerah.pdf', 2, 25, ''),
(106, 'SHE/IK-09/06 Pengadaan Fasilitas Penanggulangan Corona', '102', 0, 1, '2020-10-05 01:40:53', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-06_Pengadaan_Fasilitas.pdf', 2, 25, ''),
(107, 'SHE/IK-09/07 Pengendalian Thermo Gun Scanner', '103', 0, 1, '2020-10-05 01:43:00', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-07_Peng._Thermo_Gun.pdf', 2, 25, ''),
(108, 'SHE/IK-09/08 Pemberian Masker, Vitamin & Monitoring Kesehatan', '104', 0, 1, '2020-10-05 01:47:02', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-08_ED.01-01-Masker,_Vit_Monitoring_Kes.pdf', 2, 25, ''),
(109, 'SHE/IK-09/09 Penyemprotan, Bilik Desinfektan, Hand Sanitiser, Cuci Tangan&Locker', '105', 0, 1, '2020-10-06 03:42:30', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-09_Penyemprotan,_Bilik,_Sanitiser.pdf', 2, 25, ''),
(110, 'SHE/IK-09/10 Physical Distancing', '106', 0, 1, '2020-10-06 03:45:31', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-10_Physical_Distancing.pdf', 2, 25, ''),
(111, 'SHE/IK-09/11 Pengendalian Kondisi Emergency Corona', '107', 0, 1, '2020-10-06 03:49:38', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-11_Pengendalian_Kondisi_Emergency_Corona.pdf', 2, 25, ''),
(112, 'SHE/IK-09/12 Rapid Test', '108', 0, 1, '2020-10-06 03:50:38', 1, '0000-00-00 00:00:00', 0, 'SHE-IK-09-12_ED01-01_Rapid_Test.pdf', 2, 25, ''),
(113, 'Corporate Manual', '', 2, 1, '2021-01-21 09:22:10', 1, '2023-01-25 08:32:48', 1, 'Corporate_Manual_Ed_02-00_1_AGS_2022.pdf', 1, 0, ''),
(115, 'MOL-FMA-010-010 Memorial Journal-FNL', '0', 0, 1, '2021-01-27 08:19:50', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-010-010_Memorial_Journal-FNL.pdf', 8, 33, ''),
(116, 'MOL-FMA-010-030 Reversal Transaction-FNL', '0', 0, 1, '2021-01-27 08:42:09', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-010-030_Reversal_Transaction-FNL.pdf', 8, 33, ''),
(117, 'MOL-FMA-010-040 Exchange Rate-FNL', '0', 0, 1, '2021-01-27 08:43:15', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-010-040_Exchange_Rate-FNL.pdf', 8, 33, ''),
(118, 'MOL-FMA-010-050 Taxation-FNL', '0', 0, 1, '2021-01-27 08:44:07', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-010-050_Taxation-FNL.pdf', 8, 33, ''),
(119, 'MOL-FMA-020-010 Invoice penjualan non SO-FNL', '0', 0, 1, '2021-01-27 08:44:58', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-020-010_Invoice_penjualan_non_SO-FNL.pdf', 8, 33, ''),
(120, 'MOL-FMA-020-030 Customer Credit Memo Non SO-FNL', '0', 0, 1, '2021-01-27 08:46:03', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-020-030_Customer_Credit_Memo_Non_SO-FNL.pdf', 8, 33, ''),
(121, 'MOL-FMA-020-040 Customer Account Clearing -FNL', '0', 0, 1, '2021-01-27 08:47:04', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-020-040_Customer_Account_Clearing_-FNL.pdf', 8, 33, ''),
(122, 'MOL-FMA-020-060 Customer Down Payment-FNL', '0', 0, 1, '2021-01-27 08:48:50', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-020-060_Customer_Down_Payment-FNL.pdf', 8, 33, ''),
(123, 'MOL-FMA-030-010 Invoice pembelian non MM-FNL', '0', 0, 1, '2021-01-27 09:00:27', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-030-010_Invoice_pembelian_non_MM-FNL.pdf', 8, 33, ''),
(124, 'MOL-FMA-030-030 Debit Memo Non PO-FNL', '0', 0, 1, '2021-01-27 09:02:41', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-030-030_Debit_Memo_Non_PO-FNL.pdf', 8, 33, ''),
(125, 'MOL-FMA-030-040 Vendor Account Clearing-FNL', '0', 0, 1, '2021-01-27 09:03:21', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-030-040_Vendor_Account_Clearing-FNL.pdf', 8, 33, ''),
(126, 'MOL-FMA-030-060 Vendor Down Payment-FNL', '0', 0, 1, '2021-01-27 09:04:00', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-030-060_Vendor_Down_Payment-FNL.pdf', 8, 33, ''),
(127, 'MOL-FMA-030-070 Invoice with PO-FNL', '0', 0, 1, '2021-01-27 09:04:53', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-030-070_Invoice_with_PO-FNL.pdf', 8, 33, ''),
(128, 'MOL-FMA-040-010 Bank & Cash Management-FNL', '0', 0, 1, '2021-01-27 09:05:22', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-040-010_Bank_Cash_Management-FNL.pdf', 8, 33, ''),
(129, 'MOL-FMA-040-020 Liquidity Forecast-FNL', '0', 0, 1, '2021-01-27 09:05:46', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-040-020_Liquidity_Forecast-FNL.pdf', 8, 33, ''),
(130, 'MOL-FMA-050-010 Asset Acquisition Non PO-FNL', '0', 0, 1, '2021-01-27 09:06:19', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-050-010_Asset_Acquisition_Non_PO-FNL.pdf', 8, 33, ''),
(131, 'MOL-FMA-050-020 Asset Transfer Intra Company-FNL', '0', 0, 1, '2021-01-27 09:06:51', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-050-020_Asset_Transfer_Intra_Company-FNL.pdf', 8, 33, ''),
(132, 'MOL-FMA-050-030 Asset Under Construction-FNL', '0', 0, 1, '2021-01-27 09:07:17', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-050-030_Asset_Under_Construction-FNL.pdf', 8, 33, ''),
(133, 'MOL-FMA-050-050 Asset Retirement-FNL', '0', 0, 1, '2021-01-27 09:07:43', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-050-050_Asset_Retirement-FNL.pdf', 8, 33, ''),
(134, 'MOL-FMA-110-010 Month End Closing-FNL', '0', 0, 1, '2021-01-27 09:08:11', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-110-010_Month_End_Closing-FNL.pdf', 8, 33, ''),
(135, 'MOL-FMA-110-020 Process Year End Closing-FNL', '0', 0, 1, '2021-01-27 09:15:51', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-110-020_Process_Year_End_Closing-FNL.pdf', 8, 33, ''),
(136, 'MOL-FMA-130-010 Consolidation-FNL', '0', 0, 1, '2021-01-27 09:16:19', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-130-010_Consolidation-FNL.pdf', 8, 33, ''),
(137, 'MOL-MD-010-010 GL Master data - FNL', '0', 0, 1, '2021-01-27 09:17:06', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-010-010_GL_Master_data_-_FNL.pdf', 8, 33, ''),
(138, 'MOL-MD-010-020 Asset-FNL', '0', 0, 1, '2021-01-27 09:17:28', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-010-020_Asset-FNL.pdf', 8, 33, ''),
(139, 'MOL-MD-010-030 House Bank-FNL', '0', 0, 1, '2021-01-27 09:17:51', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-010-030_House_Bank-FNL.pdf', 8, 33, ''),
(140, 'MOL-MD-010-090 Business Partner Finance-FNL', '0', 0, 1, '2021-01-27 09:18:12', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-010-090_Business_Partner_Finance-FNL.pdf', 8, 33, ''),
(141, 'MOL-OS-010-030 Chart of Depreciation-FNL', '0', 0, 1, '2021-01-27 09:18:34', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-010-030_Chart_of_Depreciation-FNL.pdf', 8, 33, ''),
(142, 'MOL-OS-010-040 Company Code-FNL', '0', 0, 1, '2021-01-27 09:18:56', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-010-040_Company_Code-FNL.pdf', 8, 33, ''),
(143, 'MOL-OS-010-050 Chart of Account-FNL', '0', 0, 1, '2021-01-27 09:19:18', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-010-050_Chart_of_Account-FNL.pdf', 8, 33, ''),
(144, 'MOL-OTC-050-010 Incoming Payment-FNL', '0', 0, 1, '2021-01-27 09:19:39', 1, '0000-00-00 00:00:00', 0, 'MOL-OTC-050-010_Incoming_Payment-FNL.pdf', 8, 33, ''),
(145, 'MOL-PTP-060-010 Outgoing Payment-FNL', '0', 0, 1, '2021-01-27 09:20:05', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-060-010_Outgoing_Payment-FNL.pdf', 8, 33, ''),
(146, 'MOL-FMA-060-010 Sales Planning Fnl', '0', 0, 1, '2021-01-27 09:35:26', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-060-010_Sales_Planning_Fnl.pdf', 8, 34, ''),
(147, 'MOL-FMA-060-020 Cost Center Planning Fnl', '0', 0, 1, '2021-01-27 09:36:19', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-060-020_Cost_Center_Planning_Fnl.pdf', 8, 34, ''),
(148, 'MOL-FMA-060-030 Activity Type Planning Fnl', '0', 0, 1, '2021-01-27 09:37:16', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-060-030_Activity_Type_Planning_Fnl.pdf', 8, 34, ''),
(149, 'MOL-FMA-060-040 Internal Order Planning Fnl', '0', 0, 1, '2021-01-27 09:37:39', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-060-040_Internal_Order_Planning_Fnl.pdf', 8, 34, ''),
(150, 'MOL-FMA-070-010 Standard Cost Estimate Fnl', '0', 0, 1, '2021-01-27 09:38:08', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-070-010_Standard_Cost_Estimate_Fnl.pdf', 8, 34, ''),
(151, 'MOL-FMA-070-020 Cost Object Controlling Fnl', '0', 0, 1, '2021-01-27 09:38:30', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-070-020_Cost_Object_Controlling_Fnl.pdf', 8, 34, ''),
(152, 'MOL-FMA-080-010 Profitability Analysis Fnl', '0', 0, 1, '2021-01-27 09:38:53', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-080-010_Profitability_Analysis_Fnl.pdf', 8, 34, ''),
(153, 'MOL-FMA-100-010 Reposting Fnl', '0', 0, 1, '2021-01-27 09:39:17', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-100-010_Reposting_Fnl.pdf', 8, 34, ''),
(154, 'MOL-FMA-110-010 Month End Closing Fnl', '0', 0, 1, '2021-01-27 09:39:46', 1, '0000-00-00 00:00:00', 0, 'MOL-FMA-110-010_Month_End_Closing_Fnl.pdf', 8, 34, ''),
(155, 'MOL-MD-020-010 Vendor Master - FNL.', '', 1, 1, '2021-01-27 02:23:50', 1, '2021-01-28 09:47:01', 1, 'MOL-MD-020-010_Vendor_Master_-_FNL..pdf', 8, 0, '<p>MD-Master Data</p>'),
(156, 'MOL-MD-020-020-Material Master - FNL.', '0', 0, 1, '2021-01-27 02:24:12', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-020-020-Material_Master_-_FNL..pdf', 8, 35, ''),
(157, 'MOL-MD-020-030-Purchasing Info Records & Source List - FNL', '0', 2, 1, '2021-01-27 02:24:36', 1, '2021-01-28 10:32:40', 1, 'MOL-MD-020-030-Purchasing_Info_Records_Source_List_-_FNL..pdf', 8, 38, '<p>MD-Master Data</p>'),
(158, 'MOL-MD-020-040 Batch Management - FNL', '0', 0, 1, '2021-01-27 02:24:58', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-020-040_Batch_Management_-_FNL..pdf', 8, 35, ''),
(159, 'MOL-OS-020-010 Plant - FNL', '0', 0, 1, '2021-01-27 02:31:06', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-020-010_Plant_-_FNL..pdf', 8, 35, ''),
(160, 'MOL-OS-020-020 Storage Location - FNL', '0', 0, 1, '2021-01-27 02:31:37', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-020-020_Storage_Location_-_FNL..pdf', 8, 35, ''),
(161, 'MOL-OS-020-030 Purchasing Organization - FNL', '0', 0, 1, '2021-01-27 02:34:29', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-020-030_Purchasing_Organization_-_FNL..pdf', 8, 35, ''),
(162, 'MOL-OS-020-040 Purchasing Group - FNL', '0', 0, 1, '2021-01-27 02:34:59', 1, '0000-00-00 00:00:00', 0, 'MOL-OS-020-040_Purchasing_Group_-_FNL..pdf', 8, 35, ''),
(163, 'MOL-PTP-010-010 PR _ Approval - FNL', '0', 0, 1, '2021-01-27 02:53:03', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-010_PR___Approval_-_FNL..pdf', 8, 35, ''),
(164, 'MOL-PTP-010-020 Purchase Order - FNL', '0', 0, 1, '2021-01-27 02:53:38', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-020_Purchase_Order_-_FNL..pdf', 8, 35, ''),
(165, 'MOL-PTP-010-030 Reservation - FNL', '0', 0, 1, '2021-01-27 02:56:45', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-030_Reservation_-_FNL..pdf', 8, 35, ''),
(166, 'MOL-PTP-010-040 Purchase Order Stock Transport Order - FNL', '0', 0, 1, '2021-01-27 02:57:14', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-040_Purchase_Order_Stock_Transport_Order_-_FNL..pdf', 8, 35, ''),
(167, 'MOL-PTP-010-050 Purchase Order Return - FNL', '0', 0, 1, '2021-01-27 02:57:40', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-050_Purchase_Order_Return_-_FNL..pdf', 8, 35, ''),
(168, 'MOL-PTP-010-060 Close Purchase Order - FNL', '0', 0, 1, '2021-01-27 02:58:03', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-060_Close_Purchase_Order_-_FNL..pdf', 8, 35, ''),
(169, 'MOL-PTP-010-070 RFQ - FNL', '0', 0, 1, '2021-01-27 02:58:24', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-070_RFQ_-_FNL..pdf', 8, 35, ''),
(170, 'MOL-PTP-010-080 Jual Beli Raw Gas- FNL', '0', 0, 1, '2021-01-27 02:58:46', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-080_Jual_Beli_Raw_Gas-_FNL..pdf', 8, 35, ''),
(171, 'MOL-PTP-010-090 Vendor Consignment - FNL', '0', 0, 1, '2021-01-27 02:59:06', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-010-090_Vendor_Consignment_-_FNL..pdf', 8, 35, ''),
(172, 'MOL-PTP-020-010 Goods Receipt Material - FNL', '0', 0, 1, '2021-01-27 03:05:34', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-010_Goods_Receipt_Material_-_FNL..pdf', 8, 35, ''),
(173, 'MOL-PTP-030-010 Physical Inventory - FNL', '0', 0, 1, '2021-01-28 08:30:41', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-030-010_Physical_Inventory_-_FNL..pdf', 8, 35, ''),
(174, 'MOL-PTP-020-120 Proses Mixing Ethanol - FNL', '0', 0, 1, '2021-01-28 08:31:08', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-120_Proses_Mixing_Ethanol_-_FNL..pdf', 8, 35, ''),
(175, 'MOL-PTP-020-110 Stock Transfer Posting - FNL', '0', 0, 1, '2021-01-28 08:31:33', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-110_Stock_Transfer_Posting_-_FNL..pdf', 8, 35, ''),
(176, 'MOL-PTP-020-100 Goods Issue PO STO - FNL', '0', 0, 1, '2021-01-28 08:31:57', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-100_Goods_Issue_PO_STO_-_FNL..pdf', 8, 35, ''),
(177, 'MOL-PTP-020-090 Stock Transfer between Storage Location (One Plant) - FNL', '0', 0, 1, '2021-01-28 08:32:22', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-090_Stock_Transfer_between_Storage_Location_(One_Plant)_-_FNL..pdf', 8, 35, ''),
(178, 'MOL-PTP-020-080 Goods Issue for Scrap - FNL', '0', 0, 1, '2021-01-28 08:32:49', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-100_Goods_Issue_PO_STO_-_FNL..pdf', 8, 35, ''),
(179, 'MOL-PTP-020-070 Goods Issue for Reservation & Expense - FNL', '0', 0, 1, '2021-01-28 08:33:25', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-070_Goods_Issue_for_Reservation_Expense_-_FNL..pdf', 8, 35, ''),
(180, 'MOL-PTP-020-060 Material Document Cancellation - FNL', '0', 0, 1, '2021-01-28 08:34:31', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-060_Material_Document_Cancellation_-_FNL..pdf', 8, 35, ''),
(181, 'MOL-PTP-020-050 Goods Issue from Purchase Return - FNL', '0', 0, 1, '2021-01-28 08:35:02', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-050_Goods_Issue_from_Purchase_Return_-_FNL..pdf', 8, 35, ''),
(182, 'MOL-PTP-020-030 Service Entry Sheet (GRPO Service) - FNL', '0', 0, 1, '2021-01-28 08:35:33', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-030_Service_Entry_Sheet_(GRPO_Service)_-_FNL..pdf', 8, 35, ''),
(183, 'MOL-PTP-020-020 Goods Receipt from Purchase Order STO - FNL', '0', 0, 1, '2021-01-28 08:35:59', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-020-020_Goods_Receipt_from_Purchase_Order_STO_-_FNL..pdf', 8, 35, ''),
(184, 'MOL-FTS-020-020 Production Completion v Final', '0', 0, 1, '2021-01-28 08:48:59', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-020-020_Production_Completion_v_Final.pdf', 8, 36, ''),
(185, 'MOL-FTS-020-010 Production Processing v Final', '0', 0, 1, '2021-01-28 08:49:24', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-020-010_Production_Processing_v_Final.pdf', 8, 36, ''),
(186, 'MOL-FTS-010-040 Capacity Requirement Planning v Final', '0', 0, 1, '2021-01-28 08:49:49', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-010-040_Capacity_Requirement_Planning_v_Final.pdf', 8, 36, ''),
(187, 'MOL-FTS-010-030 Production Planning and Scheduling v Final', '0', 0, 1, '2021-01-28 08:50:14', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-010-030_Production_Planning_and_Scheduling_v_Final.pdf', 8, 36, ''),
(188, 'MOL-FTS-010-020 Material Requirement Planning v Final', '0', 0, 1, '2021-01-28 08:50:48', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-010-020_Material_Requirement_Planning_v_Final.pdf', 8, 36, ''),
(189, 'MOL-FTS-010-010 Demand Management v Final', '0', 0, 1, '2021-01-28 08:51:12', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-010-010_Demand_Management_v_Final.pdf', 8, 36, ''),
(190, '1. MOL-OS-040-010 Sales Organization v FNL', '0', 0, 1, '2021-01-28 09:03:25', 1, '0000-00-00 00:00:00', 0, '1._MOL-OS-040-010_Sales_Organization_v_FNL.pdf', 8, 37, ''),
(191, '2. MOL-OS-040-020 Distribution Channel v FNL', '0', 0, 1, '2021-01-28 09:20:19', 1, '0000-00-00 00:00:00', 0, '2._MOL-OS-040-020_Distribution_Channel_v_FNL.pdf', 8, 37, ''),
(192, '3. MOL-OS-040-030 Division v FNL', '0', 0, 1, '2021-01-28 09:20:52', 1, '0000-00-00 00:00:00', 0, '3._MOL-OS-040-030_Division_v_FNL.pdf', 8, 37, ''),
(193, '4. MOL-OS-040-040 Sales Office v FNL', '0', 0, 1, '2021-01-28 09:21:15', 1, '0000-00-00 00:00:00', 0, '4._MOL-OS-040-040_Sales_Office_v_FNL.pdf', 8, 37, ''),
(194, '5. MOL-OS-040-050 Shipping Point v FNL', '0', 0, 1, '2021-01-28 09:21:38', 1, '0000-00-00 00:00:00', 0, '5._MOL-OS-040-050_Shipping_Point_v_FNL.pdf', 8, 37, ''),
(195, '6. MOL-OS-040-060 Transportation Planning Point v FNL', '0', 0, 1, '2021-01-28 09:28:44', 1, '0000-00-00 00:00:00', 0, '6._MOL-OS-040-060_Transportation_Planning_Point_v_FNL.pdf', 8, 37, ''),
(196, '7. MOL-OS-040-070 Credit Control Area v FNL', '0', 0, 1, '2021-01-28 09:29:05', 1, '0000-00-00 00:00:00', 0, '7._MOL-OS-040-070_Credit_Control_Area_v_FNL.pdf', 8, 37, ''),
(197, '8. MOL-MD-070-010 Customer v FNL', '0', 0, 1, '2021-01-28 09:29:27', 1, '0000-00-00 00:00:00', 0, '8._MOL-MD-070-010_Customer_v_FNL.pdf', 8, 37, ''),
(198, '9. MOL-MD-070-020 Route v FNL', '0', 0, 1, '2021-01-28 09:29:48', 1, '0000-00-00 00:00:00', 0, '9._MOL-MD-070-020_Route_v_FNL.pdf', 8, 37, ''),
(199, '10. MOL-MD-070-030 Shipment Cost Transportation v FNL', '0', 0, 1, '2021-01-28 09:30:12', 1, '0000-00-00 00:00:00', 0, '10._MOL-MD-070-030_Shipment_Cost_Transportation_v_FNL.pdf', 8, 37, ''),
(200, '11. MOL-MD-070-040 Credit Limit v FNL', '0', 0, 1, '2021-01-28 09:30:33', 1, '0000-00-00 00:00:00', 0, '11._MOL-MD-070-040_Credit_Limit_v_FNL.pdf', 8, 37, ''),
(201, '12. MOL-MD-070-050 Pricing v FNL', '0', 0, 1, '2021-01-28 09:30:54', 1, '0000-00-00 00:00:00', 0, '12._MOL-MD-070-050_Pricing_v_FNL.pdf', 8, 37, ''),
(202, '13. MOL-MD-070-060 Customer Material Info Record v FNL', '0', 0, 1, '2021-01-28 09:31:15', 1, '0000-00-00 00:00:00', 0, '13._MOL-MD-070-060_Customer_Material_Info_Record_v_FNL.pdf', 8, 37, ''),
(203, '14. MOL-OTC-010-010 Contract v FNL', '0', 0, 1, '2021-01-28 09:33:59', 1, '0000-00-00 00:00:00', 0, '14._MOL-OTC-010-010_Contract_v_FNL.pdf', 8, 37, ''),
(204, '15. MOL-OTC-010-020 Sales Order Local Ethanol v FNL', '0', 0, 1, '2021-01-28 09:34:22', 1, '0000-00-00 00:00:00', 0, '15._MOL-OTC-010-020_Sales_Order_Local_Ethanol_v_FNL.pdf', 8, 37, ''),
(205, '16. MOL-OTC-010-030 Sales Order Local non Ethanol v FNL', '0', 0, 1, '2021-01-28 09:34:43', 1, '0000-00-00 00:00:00', 0, '16._MOL-OTC-010-030_Sales_Order_Local_non_Ethanol_v_FNL.pdf', 8, 37, ''),
(206, '17. MOL-OTC-010-040 Sales Order Export v FNL', '0', 0, 1, '2021-01-28 09:35:04', 1, '0000-00-00 00:00:00', 0, '17._MOL-OTC-010-040_Sales_Order_Export_v_FNL.pdf', 8, 37, ''),
(207, '18. MOL-OTC-010-050 Sales Order Return v FNL', '0', 0, 1, '2021-01-28 09:35:24', 1, '0000-00-00 00:00:00', 0, '18._MOL-OTC-010-050_Sales_Order_Return_v_FNL.pdf', 8, 37, ''),
(208, '19. MOL-OTC-010-060 General Memo Request v FNL', '0', 0, 1, '2021-01-28 09:35:44', 1, '0000-00-00 00:00:00', 0, '19._MOL-OTC-010-060_General_Memo_Request_v_FNL.pdf', 8, 37, ''),
(209, '20. MOL-OTC-020-010 Delivery Planning Local Ethanol v FNL', '0', 0, 1, '2021-01-28 09:36:04', 1, '0000-00-00 00:00:00', 0, '20._MOL-OTC-020-010_Delivery_Planning_Local_Ethanol_v_FNL.pdf', 8, 37, ''),
(210, '21. MOL-OTC-020-020 Delivery Planning Local non Ethanol v FNL', '0', 0, 1, '2021-01-28 09:36:24', 1, '0000-00-00 00:00:00', 0, '21._MOL-OTC-020-020_Delivery_Planning_Local_non_Ethanol_v_FNL.pdf', 8, 37, ''),
(211, '22. MOL-OTC-020-030 Delivery Planning Export v FNL', '0', 0, 1, '2021-01-28 09:36:45', 1, '0000-00-00 00:00:00', 0, '22._MOL-OTC-020-030_Delivery_Planning_Export_v_FNL.pdf', 8, 37, ''),
(212, '23. MOL-OTC-020-040 Delivery Execution Ethanol v FNL', '0', 0, 1, '2021-01-28 09:37:05', 1, '0000-00-00 00:00:00', 0, '23._MOL-OTC-020-040_Delivery_Execution_Ethanol_v_FNL.pdf', 8, 37, ''),
(213, '24. MOL-OTC-020-050 Delivery Execution non Ethanol v FNL', '0', 0, 1, '2021-01-28 09:37:25', 1, '0000-00-00 00:00:00', 0, '24._MOL-OTC-020-050_Delivery_Execution_non_Ethanol_v_FNL.pdf', 8, 37, ''),
(214, '25. MOL-OTC-020-060 Customer Return Delivery v FNL', '0', 0, 1, '2021-01-28 09:37:45', 1, '0000-00-00 00:00:00', 0, '25._MOL-OTC-020-060_Customer_Return_Delivery_v_FNL.pdf', 8, 37, ''),
(215, '26. MOL-OTC-020-070 Returnable Packaging v FNL', '0', 0, 1, '2021-01-28 09:38:06', 1, '0000-00-00 00:00:00', 0, '26._MOL-OTC-020-070_Returnable_Packaging_v_FNL.pdf', 8, 37, ''),
(216, '27. MOL-OTC-030-010 Transportation Planning Local & Export v FNL', '0', 0, 1, '2021-01-28 09:38:36', 1, '0000-00-00 00:00:00', 0, '27._MOL-OTC-030-010_Transportation_Planning_Local_Export_v_FNL.pdf', 8, 37, ''),
(217, '28. MOL-OTC-030-020 Transportation Execution v FNL', '0', 0, 1, '2021-01-28 09:38:57', 1, '0000-00-00 00:00:00', 0, '28._MOL-OTC-030-020_Transportation_Execution_v_FNL.pdf', 8, 37, ''),
(218, '29. MOL-OTC-030-030 Shipment Cost v FNL', '0', 0, 1, '2021-01-28 09:39:19', 1, '0000-00-00 00:00:00', 0, '29._MOL-OTC-030-030_Shipment_Cost_v_FNL.pdf', 8, 37, ''),
(219, '30. MOL-OTC-040-010 Billing Processing v FNL', '0', 0, 1, '2021-01-28 09:39:39', 1, '0000-00-00 00:00:00', 0, '30._MOL-OTC-040-010_Billing_Processing_v_FNL.pdf', 8, 37, ''),
(220, '31. MOL-OTC-040-020 General Memo Processing v FNL', '0', 0, 1, '2021-01-28 09:40:02', 1, '0000-00-00 00:00:00', 0, '31._MOL-OTC-040-020_General_Memo_Processing_v_FNL.pdf', 8, 37, ''),
(221, '1. MOL-ALM-010-010 Breakdown Maintenance Processing v FNL', '0', 0, 1, '2021-01-28 10:17:50', 1, '0000-00-00 00:00:00', 0, '1._MOL-ALM-010-010_Breakdown_Maintenance_Processing_v_FNL.pdf', 8, 38, '<p>Business Proses</p>'),
(222, '2. MOL-ALM-020-010 Corrective Maintenance Processing v FNL', '0', 0, 1, '2021-01-28 10:18:39', 1, '0000-00-00 00:00:00', 0, '2._MOL-ALM-020-010_Corrective_Maintenance_Processing_v_FNL.pdf', 8, 38, '<p>Business Proses</p>'),
(223, '3. MOL-ALM-030-010 Preventive Maintenance Processing v FNL', '0', 0, 1, '2021-01-28 10:20:20', 1, '0000-00-00 00:00:00', 0, '3._MOL-ALM-030-010_Preventive_Maintenance_Processing_v_FNL.pdf', 8, 38, '<p>Business Proses</p>'),
(224, '4. MOL-ALM-040-010 Calibration Processing v FNL', '0', 0, 1, '2021-01-28 10:20:51', 1, '0000-00-00 00:00:00', 0, '4._MOL-ALM-040-010_Calibration_Processing_v_FNL.pdf', 8, 38, '<p>Business Proses</p>'),
(225, '5. MOL-ALM-050-010 Workshop Processing v FNL', '0', 0, 1, '2021-01-28 10:21:14', 1, '0000-00-00 00:00:00', 0, '5._MOL-ALM-050-010_Workshop_Processing_v_FNL.pdf', 8, 38, ''),
(226, '6. MOL-ALM-060-010 Project modification engineering processing v FNL', '0', 0, 1, '2021-01-28 10:21:43', 1, '0000-00-00 00:00:00', 0, '6._MOL-ALM-060-010_Project_modification_engineering_processing_v_FNL.pdf', 8, 38, ''),
(227, '7. MOL-ALM-070-010 Equipment Measuring Document v FNL', '0', 0, 1, '2021-01-28 10:22:15', 1, '0000-00-00 00:00:00', 0, '7._MOL-ALM-070-010_Equipment_Measuring_Document_v_FNL.pdf', 8, 38, ''),
(228, '8. MOL-ALM-080-010 Refurbish Processing v FNL', '0', 0, 1, '2021-01-28 10:22:37', 1, '0000-00-00 00:00:00', 0, '8._MOL-ALM-080-010_Refurbish_Processing_v_FNL.pdf', 8, 38, ''),
(229, '9. MOL-MD-030-020 Equipment v FNL', '0', 0, 1, '2021-01-28 10:23:35', 1, '0000-00-00 00:00:00', 0, '9._MOL-MD-030-020_Equipment_v_FNL.pdf', 8, 38, '<p>Master Data</p>'),
(230, '10. MOL-MD-030-030 Equipment Classification v FNL', '0', 0, 1, '2021-01-28 10:23:59', 1, '0000-00-00 00:00:00', 0, '10._MOL-MD-030-030_Equipment_Classification_v_FNL.pdf', 8, 38, ''),
(231, '11. MOL-MD-030-040 Measuring Point v FNL', '0', 0, 1, '2021-01-28 10:24:24', 1, '0000-00-00 00:00:00', 0, '11._MOL-MD-030-040_Measuring_Point_v_FNL.pdf', 8, 38, ''),
(232, '12. MOL-MD-030-050 Catalog v FNL', '0', 0, 1, '2021-01-28 10:24:46', 1, '0000-00-00 00:00:00', 0, '12._MOL-MD-030-050_Catalog_v_FNL.pdf', 8, 38, ''),
(233, '13. MOL-MD-030-060 Spare Part BOM v FNL', '0', 0, 1, '2021-01-28 10:25:08', 1, '0000-00-00 00:00:00', 0, '13._MOL-MD-030-060_Spare_Part_BOM_v_FNL.pdf', 8, 38, ''),
(234, '14. MOL-MD-030-070 Maintenance Work Center v FNL', '0', 0, 1, '2021-01-28 10:25:29', 1, '0000-00-00 00:00:00', 0, '14._MOL-MD-030-070_Maintenance_Work_Center_v_FNL.pdf', 8, 38, ''),
(235, '15. MOL-MD-030-080 Task List v FNL', '0', 0, 1, '2021-01-28 10:25:49', 1, '0000-00-00 00:00:00', 0, '15._MOL-MD-030-080_Task_List_v_FNL.pdf', 8, 38, ''),
(236, '16. MOL-MD-030-090 Maintenance Plan v FNL', '0', 0, 1, '2021-01-28 10:26:11', 1, '0000-00-00 00:00:00', 0, '16._MOL-MD-030-090_Maintenance_Plan_v_FNL.pdf', 8, 38, ''),
(237, '17. MOL-OS-030-010 Maintenance Plant v FNL', '0', 1, 1, '2021-01-28 10:26:39', 1, '2021-01-28 10:27:06', 1, '17._MOL-OS-030-010_Maintenance_Plant_v_FNL.pdf', 8, 8, '<p>Organisasi Structure</p>'),
(238, '18. MOL-OS-030-020 Planning Plant & Planner Group v FNL', '0', 0, 1, '2021-01-28 10:27:29', 1, '0000-00-00 00:00:00', 0, '18._MOL-OS-030-020_Planning_Plant_Planner_Group_v_FNL.pdf', 8, 38, ''),
(239, '17. MOL-OS-030-010 Maintenance Plant v FNL', '0', 0, 1, '2021-01-28 10:29:16', 1, '0000-00-00 00:00:00', 0, '17._MOL-OS-030-010_Maintenance_Plant_v_FNL.pdf', 8, 38, ''),
(240, 'MOL-PBO-040-010 Project Closing', '0', 0, 1, '2021-01-28 12:53:42', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-040-010_Project_Closing.pdf', 8, 39, ''),
(241, 'MOL-PBO-030-020 Project Confirmation', '0', 0, 1, '2021-01-28 12:54:05', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-030-020_Project_Confirmation.pdf', 8, 39, ''),
(242, 'MOL-PBO-030-010 Release Project', '0', 0, 1, '2021-01-28 12:54:28', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-030-010_Release_Project.pdf', 8, 39, ''),
(243, 'MOL-PBO-020-050 Budget Carry Forward', '0', 0, 1, '2021-01-28 12:54:52', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-020-050_Budget_Carry_Forward.pdf', 8, 39, ''),
(244, 'MOL-PBO-020-040 Budget Supplement', '0', 0, 1, '2021-01-28 12:55:14', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-020-040_Budget_Supplement.pdf', 8, 39, ''),
(245, 'MOL-PBO-020-030 Budget Transfer', '0', 0, 1, '2021-01-28 12:55:42', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-020-030_Budget_Transfer.pdf', 8, 39, ''),
(246, 'MOL-PBO-020-020 Release Budget', '0', 0, 1, '2021-01-28 12:56:12', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-020-020_Release_Budget.pdf', 8, 39, ''),
(247, 'MOL-PBO-020-010 Original Budget', '0', 0, 1, '2021-01-28 12:56:33', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-020-010_Original_Budget.pdf', 8, 39, ''),
(248, 'MOL-PBO-010-020 Project Planning & Maintenance', '0', 0, 1, '2021-01-28 12:56:58', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-010-020_Project_Planning_Maintenance.pdf', 8, 39, ''),
(249, 'MOL-PBO-010-010 Department Budgeting', '0', 0, 1, '2021-01-28 12:57:26', 1, '0000-00-00 00:00:00', 0, 'MOL-PBO-010-010_Department_Budgeting.pdf', 8, 39, ''),
(250, 'MOL-MD-050-030 Project Definition & WBS Element Department Budget', '0', 0, 1, '2021-01-28 12:57:50', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-050-030_Project_Definition_WBS_Element_Department_Budget_.pdf', 8, 39, ''),
(251, 'MOL-MD-050-020 Network & Activity', '0', 0, 1, '2021-01-28 12:58:11', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-050-020_Network_Activity.pdf', 8, 39, ''),
(252, 'MOL-MD-050-010 Project Definition & WBS Element for Project', '0', 0, 1, '2021-01-28 12:58:35', 1, '0000-00-00 00:00:00', 0, 'MOL-MD-050-010_Project_Definition_WBS_Element_for_Project.pdf', 8, 39, ''),
(254, 'MOL-CKI-010-010 Cukai Processing v 1.4', '0', 0, 1, '2021-01-28 01:03:01', 1, '0000-00-00 00:00:00', 0, 'MOL-CKI-010-010_Cukai_Processing_v_1.4.pdf', 8, 40, ''),
(255, 'MOLINDO-BP-CUKAI V.1.3', '0', 0, 1, '2021-01-28 01:05:04', 1, '0000-00-00 00:00:00', 0, 'MOLINDO-BP-CUKAI_V.1.3.pdf', 8, 40, ''),
(256, 'MOL-ALM-040-020- Calibration Inspection- FNL', '0', 0, 1, '2021-01-28 01:14:29', 1, '0000-00-00 00:00:00', 0, 'MOL-ALM-040-020-_Calibration_Inspection-_FNL.pdf', 8, 41, ''),
(257, 'MOL-FTS-030-010-In-Process Production Inspection- FNL', '0', 0, 1, '2021-01-28 01:16:29', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-030-010-In-Process_Production_Inspection-_FNL.pdf', 8, 41, ''),
(258, 'MOL-FTS-030-020 Goods Receipt Production Inspection -FNL', '0', 0, 1, '2021-01-28 01:16:54', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-030-020_Goods_Receipt_Production_Inspection_-FNL.pdf', 8, 41, ''),
(259, 'MOL-FTS-030-030 Stok Transfer Inspection -FNL', '0', 0, 1, '2021-01-28 01:17:23', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-030-030_Stok_Transfer_Inspection_-FNL.pdf', 8, 41, ''),
(260, 'MOL-FTS-030-040 Notification Processing- FNL', '0', 0, 1, '2021-01-28 01:17:49', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-030-040_Notification_Processing-_FNL.pdf', 8, 41, ''),
(261, 'MOL-FTS-030-050-Research inspection -FNL', '0', 0, 1, '2021-01-28 01:18:11', 1, '0000-00-00 00:00:00', 0, 'MOL-FTS-030-050-Research_inspection_-FNL.pdf', 8, 41, ''),
(262, 'MOL-OTC-060-010 Inspection for Delivery -FNL', '0', 0, 1, '2021-01-28 01:18:34', 1, '0000-00-00 00:00:00', 0, 'MOL-OTC-060-010_Inspection_for_Delivery_-FNL.pdf', 8, 41, ''),
(263, 'MOL-OTC-060-020 Inspection for Customer Return Delivery -FNL', '0', 0, 1, '2021-01-28 01:19:01', 1, '0000-00-00 00:00:00', 0, 'MOL-OTC-060-020_Inspection_for_Customer_Return_Delivery_-FNL.pdf', 8, 41, ''),
(264, 'MOL-PTP-040-010-Source Inspection -FNL', '0', 0, 1, '2021-01-28 01:19:28', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-040-010-Source_Inspection_-FNL.pdf', 8, 41, ''),
(265, 'MOL-PTP-040-020-Incoming Inspection Before Goods Receipt -FNL', '0', 0, 1, '2021-01-28 01:19:55', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-040-020-Incoming_Inspection_Before_Goods_Receipt_-FNL.pdf', 8, 41, ''),
(266, 'MOL-PTP-040-030-Incoming Inspection After Goods Receipt -FNL', '0', 0, 1, '2021-01-28 01:20:18', 1, '0000-00-00 00:00:00', 0, 'MOL-PTP-040-030-Incoming_Inspection_After_Goods_Receipt_-FNL.pdf', 8, 41, ''),
(267, 'RNI/IK-01/01 Pembuatan Dokumen', '110', 1, 1, '2021-06-05 12:07:57', 1, '2021-09-06 01:22:39', 1, 'ISO-IK-01-01_ED02REV03_Pembuatan_Dokumen.pdf', 2, 43, ''),
(268, 'Sertifikat ISO 45001:2018', '0', 1, 1, '2021-06-24 01:57:40', 1, '2022-08-24 11:11:55', 1, 'Certificate_ISO_45001-0044674-2022-2025.pdf', 6, 44, ''),
(269, 'SV 4 & SV 5 NOV 2020 ISO 9001', '111', 0, 1, '2021-06-24 02:24:50', 1, '0000-00-00 00:00:00', 0, 'AR_ISO_SV4Focus_Visit_2-3NOV2020.pdf', 7, 30, ''),
(270, 'CR APR 2021 ISO 9001', '112', 0, 1, '2021-06-24 02:25:30', 1, '0000-00-00 00:00:00', 0, 'AR-ISO_9001-_CR-APR_2021.pdf', 7, 30, ''),
(271, 'SV 2 MEI 2020 OHSAS', '115', 0, 1, '2021-06-24 02:26:42', 1, '0000-00-00 00:00:00', 0, 'JKT6015008_OHSAS_SV_2_May_2020.pdf', 7, 32, ''),
(272, 'SV 3 NOV 2020 OHSAS', '116', 0, 1, '2021-06-24 02:40:51', 1, '0000-00-00 00:00:00', 0, 'AR_OHS_Molindo_Nov_2020_SV.pdf', 7, 32, ''),
(273, 'SV 4 TRANSISI MEI 2021 ISO 45001', '117', 0, 1, '2021-06-24 02:42:10', 1, '0000-00-00 00:00:00', 0, 'JKT6015008_AR_3643680_MAY_2021.pdf', 7, 45, ''),
(274, 'CR FEB 2020 FSSC', '113', 0, 1, '2021-06-24 02:43:20', 1, '0000-00-00 00:00:00', 0, 'JKT6018099_AR_CR_Feb_2020.pdf', 7, 31, ''),
(275, 'SV 1 MAR 2021 FSSC', '114', 0, 1, '2021-06-24 02:44:18', 1, '0000-00-00 00:00:00', 0, 'JKT_AR_AUDIT_REPORT_MAR_2021.pdf', 7, 31, ''),
(276, 'SV 5 OKT 2021', '118', 0, 1, '2022-01-10 07:17:11', 1, '0000-00-00 00:00:00', 0, 'AR_ISO_45001_3898768_OCT_2021.pdf', 7, 45, ''),
(277, 'MTC/P-02 Kalibrasi', '119', 0, 1, '2022-08-24 11:07:35', 1, '0000-00-00 00:00:00', 0, 'ISO-MTC-P-02_ED02-04_P._KALIBRASI_ALAT_UJIALAT_UKUR.pdf', 3, 15, ''),
(278, 'Unannounced Visit FEB 2022', '122', 0, 1, '2022-08-24 11:53:20', 1, '0000-00-00 00:00:00', 0, 'AR_FSSC_AUDIT_REPORT_FEB_2022.pdf', 7, 31, ''),
(279, 'CR JAN 2022', '120', 0, 1, '2022-08-24 11:54:23', 1, '0000-00-00 00:00:00', 0, 'AR_ISO_45001_10303958_Jan_2022.pdf', 7, 45, ''),
(280, 'SV 1 JUL 2022', '121', 0, 1, '2022-08-24 11:55:01', 1, '0000-00-00 00:00:00', 0, 'AR_ISO_45001_10894258_Juli_2022.pdf', 7, 45, ''),
(281, 'SV 1 Apr 2022', '123', 0, 1, '2022-08-24 11:55:46', 1, '0000-00-00 00:00:00', 0, 'AR_ISO_9001-4101462_APRIL_2022.pdf.pdf', 7, 30, ''),
(282, 'SV 2 JAN 2023', '124', 3, 1, '2023-01-25 10:56:58', 1, '2023-01-25 11:04:31', 1, 'AR_ISO_45001_JAN_2023.pdf', 7, 45, ''),
(283, 'Laporan Audit CR FSSC Feb 2023', '0', 0, 1, '2023-03-06 03:00:00', 1, '0000-00-00 00:00:00', 0, 'AR_FSSC_22000_11166205_CR_FEB_2023.pdf', 7, 46, '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_edocument_fssc`
--

CREATE TABLE `mst_edocument_fssc` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `revisi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime NOT NULL,
  `updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_edocument_iso`
--

CREATE TABLE `mst_edocument_iso` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `revisi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_edocument_iso`
--

INSERT INTO `mst_edocument_iso` (`id`, `code`, `judul`, `jenis`, `revisi`, `status`, `createddate`, `createdby`, `updateddate`, `updatedby`, `file`) VALUES
(1, 'MMIM', 'document', 'documenet 1', 2, 1, '2019-12-13 09:10:39', 1, '2019-12-13 09:23:16', 1, 'ABD_RAUF_MANTA.pdf'),
(2, 'MMIM', 'document fgf', 'edit document tes', 0, 0, '2019-12-13 09:27:07', 1, '0000-00-00 00:00:00', 0, 'Dzikir_7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mst_edocument_ohsas`
--

CREATE TABLE `mst_edocument_ohsas` (
  `id` int(11) NOT NULL,
  `code` varchar(35) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `revisi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `updateddate` datetime NOT NULL,
  `updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE `mst_jabatan` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_level`
--

CREATE TABLE `mst_level` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_level`
--

INSERT INTO `mst_level` (`id`, `nama`) VALUES
(1, 'Super Admin'),
(2, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `mst_level_menu`
--

CREATE TABLE `mst_level_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(5) NOT NULL,
  `is_insert` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `is_delete` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_level_menu`
--

INSERT INTO `mst_level_menu` (`id`, `menu`, `is_insert`, `is_update`, `id_level`, `is_delete`) VALUES
(22, 'DK', 1, 1, 1, 1),
(23, 'OB', 1, 1, 1, 1),
(24, 'JP', 1, 1, 1, 1),
(25, 'LP', 1, 1, 1, 1),
(26, 'PS', 1, 1, 1, 1),
(27, 'LVL', 1, 1, 1, 1),
(28, 'LGN', 1, 1, 1, 1),
(29, 'PRF', 1, 1, 1, 1),
(30, 'DHB', 1, 1, 1, 1),
(31, 'DK', 1, 1, 5, 1),
(32, 'PS', 1, 1, 5, 1),
(33, 'LGN', 1, 1, 5, 1),
(34, 'PRF', 1, 1, 5, 1),
(35, 'DHB', 1, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`id`, `name`, `url`, `status`) VALUES
(1, 'CORPORATE MANUAL', 'CORPORATE-MANUAL', 1),
(2, 'INSTRUKSI KERJA', 'INSTRUKSI-KERJA', 1),
(3, 'PROSEDUR', 'PROSEDUR', 1),
(6, 'SERTIFIKAT', 'SERTIFIKAT', 1),
(7, 'LAPORAN AUDIT (LLOYD\'S)', 'LAPORAN-AUDIT-LLOYDS', 1),
(8, 'SAP Business Blueprint Document', 'SAP-Business-Blueprint-Document', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE `mst_users` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `reset_password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id`, `nip`, `nama`, `alamat`, `telp`, `jk`, `id_pelajaran`, `jabatan`, `tgl`, `tempat_lahir`, `createddate`, `createdby`, `username`, `password`, `email`, `images`, `status`, `id_level`, `agama`, `reset_password`) VALUES
(1, '', 'Administrator', '', '', '', 0, '1', '0000-00-00', '', '0000-00-00 00:00:00', 0, 'admin', '8451ba8a14d79753d34cb33b51ba46b4b025eb81', '', 'EP70.jpg', 1, 1, '', 0),
(2, '', 'gunawan', 'malang', '', '', 0, '', '0000-00-00', '', '0000-00-00 00:00:00', 0, 'gunawan', '8758ef7d6048afdf8d423ed01a59deb499a6ff1a', '', '', 1, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_menu`
--

CREATE TABLE `tr_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu` varchar(100) NOT NULL,
  `submenu_url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_menu`
--

INSERT INTO `tr_menu` (`id`, `menu_id`, `submenu`, `submenu_url`, `status`) VALUES
(10, 3, 'Penjualan', 'Penjualan', 1),
(12, 3, 'Perencanaan Produksi & Material', 'Perencanaan-Produksi-Material', 1),
(13, 3, 'Produksi', 'Produksi', 1),
(14, 3, 'Penanganan Produk Jadi', 'Penanganan-Produk-Jadi', 1),
(15, 3, 'Pendukung Produksi (Maintenance)', 'Pendukung-Produksi-Maintenance', 1),
(16, 3, 'Pendukung Produksi (Utility)', 'Pendukung-Produksi-Utility', 1),
(17, 3, 'Pengendalian Kualitas (QC)', 'Pengendalian-Kualitas-QC', 1),
(18, 3, 'Pembelian', 'Pembelian', 1),
(19, 3, 'Penanganan Material (Logistik)', 'Penanganan-Material-Logistik', 1),
(20, 3, 'Sumber Daya Manusia (HRD)', 'Sumber-Daya-Manusia-HRD', 1),
(21, 3, 'Sistem Teknologi Informasi', 'Sistem-Teknologi-Informasi', 1),
(22, 3, 'Umum & Security', 'Umum-Security', 1),
(23, 3, 'K3LH', 'K3LH', 1),
(24, 3, 'Evaluasi & Perbaikan (RNI)', 'Evaluasi-Perbaikan-RNI', 1),
(25, 2, 'K3LH', 'K3LH', 1),
(26, 6, 'ISO 9001:2015', 'ISO-90012015', 1),
(27, 6, 'FSSC 22000', 'FSSC-22000', 1),
(28, 6, 'OHSAS 18001:2007', 'OHSAS-180012007', 0),
(29, 6, 'KOSHER', 'KOSHER', 1),
(30, 7, 'ISO 9001 : 2015', 'ISO-9001-2015', 1),
(31, 7, 'FSSC 22000', 'FSSC-22000', 1),
(32, 7, 'OHSAS 18001 : 2007', 'OHSAS-18001-2007', 0),
(33, 8, '1. FI - Financial Accounting', '1-FI-Financial-Accounting', 1),
(34, 8, '2. CO - Cost Center Accounting', '2-CO-Cost-Center-Accounting', 1),
(35, 8, '3. MM - Material Management', '3-MM-Material-Management', 1),
(36, 8, '4. PP - Production Planning', '4-PP-Production-Planning', 1),
(37, 8, '6. SD - Sales and Distribution', '6-SD-Sales-and-Distribution', 1),
(38, 8, '7. PM - Plant Maintenance', '7-PM-Plant-Maintenance', 1),
(39, 8, '8. PS - Project System', '8-PS-Project-System', 1),
(40, 8, '9. Cukai', '9-Cukai', 1),
(41, 8, '5. QM - Quality Management', '5-QM-Quality-Management', 1),
(43, 2, 'Evaluasi & Perbaikan (RNI)', 'Evaluasi-Perbaikan-RNI', 0),
(44, 6, 'ISO 45001:2018', 'ISO-450012018', 1),
(45, 7, 'ISO 45001 : 2018', 'ISO-45001-2018', 1),
(46, 7, 'CR FSSC 22000 FEB 2023', 'CR-FSSC-22000-FEB-2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_submenu`
--

CREATE TABLE `tr_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `mainmenu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_submenu`
--

INSERT INTO `tr_submenu` (`id`, `menu_id`, `submenu_id`, `mainmenu`, `url`, `status`) VALUES
(9, 3, 24, 'RNI/P-01 Pengendalian Dokumen', 'RNIP-01-Pengendalian-Dokumen', 1),
(10, 3, 24, 'RNI/P-02 Pengendalian Catatan', 'RNIP-02-Pengendalian-Catatan', 1),
(11, 3, 24, 'RNI/P-03 Audit Internal', 'RNIP-03-Audit-Internal', 1),
(12, 3, 24, 'RNI/P-04 Tindakan Perbaikan', 'RNIP-04-Tindakan-Perbaikan', 1),
(13, 3, 24, 'RNI/P-05 Tinjauan Manajemen', 'RNIP-05-Tinjauan-Manajemen', 1),
(14, 3, 24, 'RNI/P-06 Identifikasi dan Kemamputelusuran', 'RNIP-06-Identifikasi-dan-Kemamputelusuran', 1),
(15, 3, 24, 'RNI/P-07 Penarikan Produk', 'RNIP-07-Penarikan-Produk', 1),
(16, 3, 24, 'RNI/P-08 Identifikasi HACCP', 'RNIP-08-Identifikasi-HACCP', 1),
(17, 3, 24, 'RNI/P-09 Manajemen Perubahan', 'RNIP-09-Manajemen-Perubahan', 1),
(18, 3, 24, 'RNI/P-10 Verifikasi CCP', 'RNIP-10-Verifikasi-CCP', 1),
(19, 3, 24, 'RNI/P-11 Analisa Resiko dan Peluang', 'RNIP-11-Analisa-Resiko-dan-Peluang', 1),
(20, 3, 24, 'RNI/P-12 Identifikasi TACCP dan VACCP', 'RNIP-12-Identifikasi-TACCP-dan-VACCP', 1),
(21, 3, 23, 'SHE/P-01 Keselamatan Kerja Umum', 'SHEP-01-Keselamatan-Kerja-Umum', 1),
(22, 3, 23, 'SHE/P-02 Pekerjaan Berbahaya', 'SHEP-02-Pekerjaan-Berbahaya', 1),
(23, 3, 23, 'SHE/P-03 Keadaan Darurat dan Investigasi Kecelakaan', 'SHEP-03-Keadaan-Darurat-dan-Investigasi-Kecelakaan', 1),
(24, 3, 23, 'SHE/P-04 Identifikasi Resiko, Penilaian dan Kontrol (HIRAC)', 'SHEP-04-Identifikasi-Resiko-Penilaian-dan-Kontrol-HIRAC', 1),
(25, 3, 23, 'SHE/P-05 Identifikasi dan Pemenuhan Peraturan Per-UU', 'SHEP-05-Identifikasi-dan-Pemenuhan-Peraturan-Per-UU', 1),
(26, 3, 23, 'SHE/P-06 Pengendalian Proteksi Kebakaran', 'SHEP-06-Pengendalian-Proteksi-Kebakaran', 1),
(27, 3, 23, 'SHE/P-07 Pengendalian Kontraktor', 'SHEP-07-Pengendalian-Kontraktor', 1),
(28, 3, 23, 'SHE/P-08 Pengendalian Hama', 'SHEP-08-Pengendalian-Hama', 1),
(29, 3, 18, 'PUR/P-01 Pembelian Bahan Baku', 'PURP-01-Pembelian-Bahan-Baku', 1),
(30, 3, 18, 'PUR/P-02 Pembelian Barang dan Jasa', 'PURP-02-Pembelian-Barang-dan-Jasa', 1),
(31, 3, 18, 'PUR/P-03 Seleksi dan Evaluasi Supplier', 'PURP-03-Seleksi-dan-Evaluasi-Supplier', 1),
(32, 3, 19, 'MAH/P-01 Penerimaan dan Pengeluaran Bahan Baku dan Bahan Penolong', 'MAHP-01-Penerimaan-dan-Pengeluaran-Bahan-Baku-dan-Bahan-Penolong', 1),
(33, 3, 19, 'MAH/P-02 Penerimaan dan Penyimpanan Barang', 'MAHP-02-Penerimaan-dan-Penyimpanan-Barang', 1),
(34, 3, 19, 'MAH/P-03 Permintaan dan Pengeluaran Barang', 'MAHP-03-Permintaan-dan-Pengeluaran-Barang', 1),
(35, 3, 14, 'FIN/P-01 Penerimaan dan Pengeluaran Produk Jadi', 'FINP-01-Penerimaan-dan-Pengeluaran-Produk-Jadi', 1),
(36, 3, 14, 'FIN/P-02 Distribusi', 'FINP-02-Distribusi', 1),
(37, 3, 15, 'MTC/P-01 Perawatan dan Perbaikan Mesin Produksi', 'MTCP-01-Perawatan-dan-Perbaikan-Mesin-Produksi', 1),
(38, 3, 16, 'UTL/P-01 Utilitas', 'UTLP-01-Utilitas', 1),
(39, 3, 17, 'QCT/P-01 Inspeksi Bahan Baku dan Bahan Penolong', 'QCTP-01-Inspeksi-Bahan-Baku-dan-Bahan-Penolong', 1),
(40, 3, 17, 'QCT/P-02 Inspeksi Proses Produksi', 'QCTP-02-Inspeksi-Proses-Produksi', 1),
(41, 3, 17, 'QCT/P-03 Inspeksi Produk Jadi', 'QCTP-03-Inspeksi-Produk-Jadi', 1),
(42, 3, 17, 'QCT/P-04 Penanganan Produk Tidak Sesuai', 'QCTP-04-Penanganan-Produk-Tidak-Sesuai', 1),
(43, 3, 17, 'QCT/P-05 Kalibrasi Alat Uji dan Alat Ukur', 'QCTP-05-Kalibrasi-Alat-Uji-dan-Alat-Ukur', 0),
(44, 3, 17, 'QCT/P-06 Verifikasi Cleaning Mesin Produksi', 'QCTP-06-Verifikasi-Cleaning-Mesin-Produksi', 1),
(45, 3, 10, 'SLS/P-01 Penanganan Order', 'SLSP-01-Penanganan-Order', 1),
(46, 3, 10, 'SLS/P-02 Penanganan Komplain', 'SLSP-02-Penanganan-Komplain', 1),
(47, 3, 10, 'SLS/P-03 Survey Kepuasan Pelanggan', 'SLSP-03-Survey-Kepuasan-Pelanggan', 1),
(48, 3, 12, 'PPC/P-01 Perencanaan dan Pengendalian Produksi', 'PPCP-01-Perencanaan-dan-Pengendalian-Produksi', 1),
(49, 3, 13, 'PRO/P-01 Pengendalian Proses Fermentasi', 'PROP-01-Pengendalian-Proses-Fermentasi', 1),
(50, 3, 13, 'PRO/P-02 Pengendalian Proses Distilasi', 'PROP-02-Pengendalian-Proses-Distilasi', 1),
(51, 3, 21, 'ITS/P-01 Perawatan HW/SW', 'ITSP-01-Perawatan-HWSW', 1),
(52, 3, 21, 'ITS/P-02 Instalasi Program dan Perbaikan', 'ITSP-02-Instalasi-Program-dan-Perbaikan', 1),
(53, 3, 21, 'ITS/P-03 Backup', 'ITSP-03-Backup', 1),
(54, 3, 20, 'HRD/P-01 Perencanaan Sumber Daya Manusia', 'HRDP-01-Perencanaan-Sumber-Daya-Manusia', 1),
(55, 3, 20, 'HRD/P-02 Rekrutasi dan Seleksi', 'HRDP-02-Rekrutasi-dan-Seleksi', 1),
(56, 3, 20, 'HRD/P-03 Manajemen Karir', 'HRDP-03-Manajemen-Karir', 1),
(57, 3, 20, 'HRD/P-04 Pelatihan dan Pengembangan SDM', 'HRDP-04-Pelatihan-dan-Pengembangan-SDM', 1),
(58, 3, 22, 'INF/P-01 Perawatan dan Perbaikan Fasilitas Umum', 'INFP-01-Perawatan-dan-Perbaikan-Fasilitas-Umum', 1),
(59, 3, 22, 'INF/P-02 Pengendalian keluar-Masuk Barang dan Angkutan', 'INFP-02-Pengendalian-keluar-Masuk-Barang-dan-Angkutan', 1),
(60, 3, 22, 'INF/P-03 Penerimaan Tamu dan Pengamanan Perusahaan', 'INFP-03-Penerimaan-Tamu-dan-Pengamanan-Perusahaan', 1),
(61, 2, 25, 'SHE/IK-01/01 Peraturan K3LH', 'SHEIK-0101-Peraturan-K3LH', 1),
(62, 2, 25, 'SHE/IK-01/02 Pengendalian APD', 'SHEIK-0102-Pengendalian-APD', 1),
(63, 2, 25, 'SHE/IK-01/03 Peraturan Kerja dan Hygiene Karyawan', 'SHEIK-0103-Peraturan-Kerja-dan-Hygiene-Karyawan', 1),
(64, 2, 25, 'SHE/IK-02/01 Pengajuan Ijin Kerja Panas', 'SHEIK-0201-Pengajuan-Ijin-Kerja-Panas', 1),
(65, 2, 25, 'SHE/IK-02/02 Pengajuan Ijin Kerja Ketinggian', 'SHEIK-0202-Pengajuan-Ijin-Kerja-Ketinggian', 1),
(66, 2, 25, 'SHE/IK-02/03 Pengajuan Ijin Kerja Ruang Terbatas / Confinedspace', 'SHEIK-0203-Pengajuan-Ijin-Kerja-Ruang-Terbatas-Confinedspace', 1),
(67, 2, 25, 'SHE/IK-03/01 Penanggulangan Kebakaran', 'SHEIK-0301-Penanggulangan-Kebakaran', 1),
(68, 2, 25, 'SHE/IK-03/02 Evakuasi Keadaan Darurat', 'SHEIK-0302-Evakuasi-Keadaan-Darurat', 1),
(69, 2, 25, 'SHE/IK-03/03 Penanganan Kecelakaan Kerja', 'SHEIK-0303-Penanganan-Kecelakaan-Kerja', 1),
(70, 2, 25, 'SHE/IK-03/04 Investigasi Kecelakaan Kerja dan Near Miss', 'SHEIK-0304-Investigasi-Kecelakaan-Kerja-dan-Near-Miss', 1),
(71, 2, 25, 'SHE/IK-03/05 Penanganan Penyakit Akibat Kerja', 'SHEIK-0305-Penanganan-Penyakit-Akibat-Kerja', 1),
(72, 2, 25, 'SHE/IK-03/06 Penanganan Ancaman Bom', 'SHEIK-0306-Penanganan-Ancaman-Bom', 1),
(73, 2, 25, 'SHE/IK-03/07 Pengendalian Bencana Tanah Longsor dan Gempa Bumi', 'SHEIK-0307-Pengendalian-Bencana-Tanah-Longsor-dan-Gempa-Bumi', 1),
(74, 2, 25, 'SHE/IK-03/08 Pengendalian Huru Hara', 'SHEIK-0308-Pengendalian-Huru-Hara', 1),
(75, 2, 25, 'SHE/IK-03/09 Penanggulangan Kebocoran Kimia', 'SHEIK-0309-Penanggulangan-Kebocoran-Kimia', 1),
(76, 2, 25, 'SHE/IK-03/10 Pertolongan Pertama', 'SHEIK-0310-Pertolongan-Pertama', 1),
(77, 2, 25, 'SHE/IK-03/11 Tugas dan Tanggung Jawab Team Tanggap Darurat', 'SHEIK-0311-Tugas-dan-Tanggung-Jawab-Team-Tanggap-Darurat', 1),
(78, 2, 25, 'SHE/IK-03/12 P2K3L', 'SHEIK-0312-P2K3L', 1),
(79, 2, 25, 'SHE/IK-03/13 Pertolongan Kecelakaan Sumber Tegangan (Tersetrum)', 'SHEIK-0313-Pertolongan-Kecelakaan-Sumber-Tegangan-Tersetrum', 1),
(80, 2, 25, 'SHE/IK-03/14 Bahaya Ancaman Terorisme', 'SHEIK-0314-Bahaya-Ancaman-Terorisme', 1),
(81, 2, 25, 'SHE/IK-03/15 Pertolongan Korban Keracunan Makanan', 'SHEIK-0315-Pertolongan-Korban-Keracunan-Makanan', 1),
(82, 2, 25, 'SHE/IK-04/01 Identifikasi Bahaya, Penilaian & Pengendalian Resiko (HIRAC)', 'SHEIK-0401-Identifikasi-Bahaya-Penilaian-Pengendalian-Resiko-HIRAC', 1),
(83, 2, 25, 'SHE/IK-04/02 Objective, Target dan Program (OTP)', 'SHEIK-0402-Objective-Target-dan-Program-OTP', 1),
(84, 2, 25, 'SHE/IK-06/01 Pengendalian APAR', 'SHEIK-0601-Pengendalian-APAR', 1),
(85, 2, 25, 'SHE/IK-06/02 Pengendalian Hydrant System', 'SHEIK-0602-Pengendalian-Hydrant-System', 1),
(86, 2, 25, 'SHE/IK-06/03 Pengendalian Alarm', 'SHEIK-0603-Pengendalian-Alarm', 1),
(87, 7, 30, 'CR MEI 2018', 'CR-MEI-2018', 1),
(88, 7, 30, 'SV 1 NOV 2018', 'SV-1-NOV-2018', 1),
(89, 7, 30, 'SV 2 & SV 3 NOV 2019', 'SV-2-SV-3-NOV-2019', 1),
(90, 7, 31, 'SV 2 JUN 2018', 'SV-2-JUN-2018', 1),
(91, 7, 31, 'SV 3 NOV 2018', 'SV-3-NOV-2018', 1),
(92, 7, 31, 'SV 4 & SV 5 JUL 2019', 'SV-4-SV-5-JUL-2019', 1),
(93, 7, 32, 'SV 4 & SV 5 AGS 2018', 'SV-4-SV-5-AGS-2018', 1),
(94, 7, 32, 'CR JAN 2019', 'CR-JAN-2019', 1),
(95, 7, 32, 'SV 1 NOV 2019', 'SV-1-NOV-2019', 1),
(96, 3, 23, 'SHE/P-09 Pengendalian Covid-19/Corona di Area Perusahaan', 'SHEP-09-Pengendalian-Covid-19Corona-di-Area-Perusahaan', 1),
(97, 2, 25, 'SHE/IK-09/01 Pengendalian Karyawan Saat Pandemi Corona', 'SHEIK-0901-Pengendalian-Karyawan-Saat-Pandemi-Corona', 1),
(98, 2, 25, 'SHE/IK-09/02 Pengendalian Kontraktor Saat Pandemi Corona', 'SHEIK-0902-Pengendalian-Kontraktor-Saat-Pandemi-Corona', 1),
(99, 2, 25, 'SHE/IK-09/03 Pengendalian Tamu/Rekanan Saat Pandemi Corona', 'SHEIK-0903-Pengendalian-TamuRekanan-Saat-Pandemi-Corona', 1),
(100, 2, 25, 'SHE/IK-09/04 Pengendalian Transportir, Supplier & Ekspedisi Saat Pandemi Corona', 'SHEIK-0904-Pengendalian-Transportir-Supplier-Ekspedisi-Saat-Pandemi-Corona', 1),
(101, 2, 25, 'SHE/IK-09/05 Pengendalian Kontraktor/Rekanan dari Luar Daerah Saat Pandemi Corona', 'SHEIK-0905-Pengendalian-KontraktorRekanan-dari-Luar-Daerah-Saat-Pandemi-Corona', 1),
(102, 2, 25, 'SHE/IK-09/06 Pengadaan Fasilitas Penanggulangan Corona', 'SHEIK-0906-Pengadaan-Fasilitas-Penanggulangan-Corona', 1),
(103, 2, 25, 'SHE/IK-09/07 Pengendalian Thermo Gun Scanner', 'SHEIK-0907-Pengendalian-Thermo-Gun-Scanner', 1),
(104, 2, 25, 'SHE/IK-09/08 Pemberian Masker, Vitamin & Monitoring Kesehatan', 'SHEIK-0908-Pemberian-Masker-Vitamin-Monitoring-Kesehatan', 1),
(105, 2, 25, 'SHE/IK-09/09 Penyemprotan, Bilik Desinfektan, Hand Sanitiser, Cuci Tangan & Locker', 'SHEIK-0909-Penyemprotan-Bilik-Desinfektan-Hand-Sanitiser-Cuci-Tangan-Locker', 1),
(106, 2, 25, 'SHE/IK-09/10 Physical Distancing', 'SHEIK-0910-Physical-Distancing', 1),
(107, 2, 25, 'SHE/IK-09/11 Pengendalian Kondisi Emergency Corona', 'SHEIK-0911-Pengendalian-Kondisi-Emergency-Corona', 1),
(108, 2, 25, 'SHE/IK-09/12 Rapid Test', 'SHEIK-0912-Rapid-Test', 1),
(109, 3, 14, 'distribusi', 'distribusi', 1),
(110, 2, 43, 'RNI/IK-01/01 Pembuatan Dokumen', 'RNIIK-0101-Pembuatan-Dokumen', 1),
(111, 7, 30, 'SV 4 & SV 5 NOV 2020', 'SV-4-SV-5-NOV-2020', 1),
(112, 7, 30, 'CR APR 2021', 'CR-APR-2021', 1),
(113, 7, 31, 'CR FEB 2020', 'CR-FEB-2020', 1),
(114, 7, 31, 'SV 1 MAR 2021', 'SV-1-MAR-2021', 1),
(115, 7, 32, 'SV 2 MEI 2020', 'SV-2-MEI-2020', 1),
(116, 7, 32, 'SV 3 NOV 2020', 'SV-3-NOV-2020', 1),
(117, 7, 45, 'SV 4 TRANSISI MEI 2021', 'SV-4-TRANSISI-MEI-2021', 1),
(118, 7, 45, 'SV 5 OKT 2021', 'SV-5-OKT-2021', 1),
(119, 3, 15, 'MTC/P-02 Kalibrasi', 'MTCP-02-Kalibrasi', 1),
(120, 7, 45, 'CR JAN 2022', 'CR-JAN-2022', 1),
(121, 7, 45, 'SV 1 JUL 2022', 'SV-1-JUL-2022', 1),
(122, 7, 31, 'Unannounced Visit FEB 2022', 'Unannounced-Visit-FEB-2022', 1),
(123, 7, 30, 'SV 1 Apr 2022', 'SV-1-Apr-2022', 1),
(124, 7, 45, 'SV 2 JAN 2023', 'SV-2-JAN-2023', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `mst_document`
--
ALTER TABLE `mst_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_edocument_fssc`
--
ALTER TABLE `mst_edocument_fssc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_edocument_iso`
--
ALTER TABLE `mst_edocument_iso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_edocument_ohsas`
--
ALTER TABLE `mst_edocument_ohsas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_menu`
--
ALTER TABLE `tr_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_submenu`
--
ALTER TABLE `tr_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_document`
--
ALTER TABLE `mst_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `mst_edocument_fssc`
--
ALTER TABLE `mst_edocument_fssc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_edocument_iso`
--
ALTER TABLE `mst_edocument_iso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_edocument_ohsas`
--
ALTER TABLE `mst_edocument_ohsas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tr_menu`
--
ALTER TABLE `tr_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tr_submenu`
--
ALTER TABLE `tr_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
