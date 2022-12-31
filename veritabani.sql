-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Ara 2022, 15:01:49
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `veritabani`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminler`
--

CREATE TABLE `adminler` (
  `admin_id` int(11) NOT NULL,
  `admin_ad` varchar(20) NOT NULL,
  `admin_sifre` varchar(12) NOT NULL,
  `yetki` tinyint(4) NOT NULL,
  `admin_resim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `adminler`
--

INSERT INTO `adminler` (`admin_id`, `admin_ad`, `admin_sifre`, `yetki`, `admin_resim`) VALUES
(1, 'Emre', '1234', 1, 'emre.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adres_tanimlari`
--

CREATE TABLE `adres_tanimlari` (
  `adres_id` int(11) NOT NULL,
  `musteri_id` bigint(11) NOT NULL,
  `adres_tanimi` varchar(30) NOT NULL,
  `musteri_ad` varchar(45) NOT NULL,
  `musteri_soyad` varchar(30) NOT NULL,
  `musteri_adres` text NOT NULL,
  `musteri_tel` varchar(15) NOT NULL,
  `musteri_sehir` varchar(40) NOT NULL,
  `musteri_ilce` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `adres_tanimlari`
--

INSERT INTO `adres_tanimlari` (`adres_id`, `musteri_id`, `adres_tanimi`, `musteri_ad`, `musteri_soyad`, `musteri_adres`, `musteri_tel`, `musteri_sehir`, `musteri_ilce`) VALUES
(2, 6, 'Ev', 'Serkan', 'Balcı', 'sdafsadfsadfsadfsad xvbccccccccccccccccccsdafsadfasdfsadfasdffgdsfgsd', '05418775422', 'Ordu', 'Çaybaşı'),
(4, 8, 'Ev', 'arzu', 'yılmaz', 'sdafsadfsadfsadfsad xvbccccccccccccccccccsdafsadfasdfsadfasdffgdsfgsd', '5478568754', 'sdfsa', 'safasd'),
(6, 5, 'Ev', 'Emre', 'Aşcı', 'Karşıyaka mahallesi,vadi sokak no 15', '5469756732', 'gümüşhane', 'merkez'),
(7, 11, 'Yurt', 'Bahri', 'Akçan', 'Karşıyaka mahallesi,vadi sokak no 15', '5469753132', 'Gümüşhane', 'merkez'),
(8, 12, 'Ev', 'Mustafa', 'Bircan', 'Karşıyaka mahallesi,vadi sokak no 15', '5439728402', 'Gümüşhane', 'merkez'),
(9, 13, 'Ev', 'baturay', 'bak', 'asdfasdfsafs', '5469758501', 'trabzon', 'sürmene');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alisveris_sepeti`
--

CREATE TABLE `alisveris_sepeti` (
  `sepet_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `musteri_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `alisveris_sepeti`
--

INSERT INTO `alisveris_sepeti` (`sepet_id`, `urun_id`, `urun_adet`, `musteri_id`) VALUES
(412, 94, 1, 6),
(413, 91, 1, 6),
(414, 89, 1, 6),
(415, 87, 1, 6),
(417, 99, 6, 8),
(418, 86, 1, 10),
(419, 88, 1, 10),
(432, 86, 1, 11),
(433, 91, 1, 11),
(436, 94, 1, 12),
(446, 87, 1, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degerlendirme`
--

CREATE TABLE `degerlendirme` (
  `id` int(11) NOT NULL,
  `puan` tinyint(5) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `musteri_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `degerlendirme`
--

INSERT INTO `degerlendirme` (`id`, `puan`, `urun_id`, `musteri_id`) VALUES
(3, 3, 87, 5),
(4, 3, 88, 5),
(5, 5, 81, 13),
(6, 3, 87, 13),
(7, 4, 89, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fiyatlar`
--

CREATE TABLE `fiyatlar` (
  `fiyat_id` int(11) NOT NULL,
  `alis_fiyati` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `satis_fiyati` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `fiyatlar`
--

INSERT INTO `fiyatlar` (`fiyat_id`, `alis_fiyati`, `urun_id`, `satis_fiyati`) VALUES
(77, 1500, 81, 3300),
(80, 4000, 84, 6799),
(82, 19000, 86, 23000),
(83, 45000, 87, 55000),
(84, 25000, 88, 30000),
(85, 19000, 89, 23000),
(86, 1500, 90, 3300),
(87, 13000, 91, 16000),
(88, 19000, 92, 25000),
(89, 1000, 93, 1500),
(90, 2000, 94, 2800),
(91, 18000, 95, 22500),
(92, 4500, 96, 7000),
(93, 13000, 97, 16500),
(94, 13000, 98, 20000),
(95, 25000, 99, 60000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kargo`
--

CREATE TABLE `kargo` (
  `kargo_id` int(11) NOT NULL,
  `kargo_ad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kargo`
--

INSERT INTO `kargo` (`kargo_id`, `kargo_ad`) VALUES
(1, 'Yurtiçi'),
(2, 'MNG Kargo'),
(3, 'Aras Kargo'),
(4, 'UPS Kargo');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `anaKategori_id` int(11) NOT NULL,
  `anaKategori_ad` varchar(30) NOT NULL,
  `kategori_ad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `anaKategori_id`, `anaKategori_ad`, `kategori_ad`) VALUES
(1, 1, 'Tüm Laptoplar', 'Oyun Bilgisayarları'),
(2, 1, 'Tüm Laptoplar', 'Ofis Bilgisayarları'),
(3, 1, 'Tüm Laptoplar', 'İş İstasyonları'),
(4, 2, 'Aksesuarlar', 'Mouse'),
(5, 2, 'Aksesuarlar', 'Klavye'),
(6, 3, 'Monitorler', 'Monitor'),
(7, 2, 'Aksesuarlar', 'Kulaklık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit`
--

CREATE TABLE `kayit` (
  `musteri_ad` varchar(48) NOT NULL,
  `musteri_soyad` varchar(48) NOT NULL,
  `musteri_sifre` varchar(15) NOT NULL,
  `musteri_id` bigint(20) NOT NULL,
  `musteri_email` varchar(80) NOT NULL,
  `musteri_tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kayit`
--

INSERT INTO `kayit` (`musteri_ad`, `musteri_soyad`, `musteri_sifre`, `musteri_id`, `musteri_email`, `musteri_tel`) VALUES
('Emre', 'Aşçı', 'Emremre5234', 5, 'emreasci6@gmail.com', '5469756732'),
('serkan', 'balcı', '12312312', 6, 'serkanbalci52@gmaili.com', '5469758501'),
('arzu', 'yılmaz', 'arzuyilmaz', 8, 'arzuyilmaz@gmail.com', '5478568754'),
('Emre', 'Aşcı', 'Emremre5234', 9, 'emreasci7@gmail.com', '5469756732'),
('recep', 'balcı', 'recepbalci', 10, 'recepbalci52@gmail.com', '5446498599'),
('bahri', 'akçan', 'bahriakcan', 11, 'bahriakcan@gmail.com', '5467653132'),
('Mustafa', 'Bircan', 'mustafabircan', 12, 'mustafabircan01@gmail.com', '5447845754'),
('Baturay', 'Bak', 'baturaybak', 13, 'baturaybak@gmail.com', '5439728401');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_ad` varchar(20) NOT NULL,
  `model_seri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `model`
--

INSERT INTO `model` (`model_id`, `model_ad`, `model_seri`) VALUES
(1, 'Hydra', 'T500'),
(2, 'Hydra', 'T510'),
(3, 'Hydra', 'T520'),
(4, 'Hydra', 'T530'),
(5, 'Hydra', 'T540'),
(6, 'Hydra', 'T550'),
(7, 'Manta', 'G400'),
(8, 'Manta', 'G410'),
(9, 'Manta', 'G420'),
(10, 'Manta', 'G430'),
(11, 'Manta', 'G440'),
(12, 'Manta', 'G450'),
(13, 'Manta', 'G460'),
(14, 'Manta', 'G470'),
(15, 'Manta', 'G480'),
(16, 'Manta', 'G490'),
(17, 'Fire', 'F100'),
(18, 'Fire', 'F110'),
(19, 'Fire', 'F120'),
(20, 'Fire', 'F130'),
(21, 'Fire', 'F140'),
(22, 'Fire', 'F150'),
(25, 'Fire', 'F160'),
(26, 'Fire', 'F170'),
(27, 'Fire', 'F180'),
(28, 'Fire', 'F190'),
(29, 'Drake', 'A500'),
(30, 'Drake', 'A510'),
(31, 'Drake', 'A520'),
(32, 'Drake', 'A530'),
(33, 'Drake', 'A540'),
(34, 'Drake', 'A550'),
(35, 'Drake', 'A560'),
(36, 'Drake', 'A570'),
(37, 'Drake', 'A580'),
(38, 'Drake', 'A590'),
(39, 'Wrym', 'B700'),
(40, 'Wrym', 'B710'),
(41, 'Wrym', 'B720'),
(42, 'Wrym', 'B730'),
(43, 'Wrym', 'B740'),
(44, 'Wrym', 'B750'),
(45, 'Wrym', 'B760'),
(46, 'Wrym', 'B770'),
(47, 'Wrym', 'B780'),
(48, 'Wrym', 'B790'),
(49, 'Pusat', 'V3'),
(50, 'Pusat', 'V5-06'),
(51, 'Pusat', 'V14'),
(52, 'Pusat', 'Headset Lite'),
(53, 'Pusat', 'Headset'),
(54, 'Dragon Eye', 'A27'),
(55, 'Dragon Eye', 'A32'),
(56, 'Pusat', 'K3.114');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozellikdetay`
--

CREATE TABLE `ozellikdetay` (
  `ozellik_detay_id` int(11) NOT NULL,
  `ozellik_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `ozellik_detayi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ozellikdetay`
--

INSERT INTO `ozellikdetay` (`ozellik_detay_id`, `ozellik_id`, `urun_id`, `ozellik_detayi`) VALUES
(81, 7, 81, '7.1 Surround Ses'),
(82, 8, 81, '50mm Neodimyum Sürücüler'),
(83, 9, 81, 'RGB Aydınlatma'),
(84, 10, 81, 'Ayarlanabilir Kafa Bandı'),
(85, 11, 81, 'Güçlendirilmiş Bas'),
(96, 12, 84, 'Geniş Ekran 16:9'),
(97, 13, 84, '240 Hz Ekran yenileme hızı'),
(98, 14, 84, '1 Ms Tepki süresi'),
(99, 15, 84, 'Dahili hoparlör'),
(100, 16, 84, '1920x1080 FHD Çözünürlük'),
(107, 1, 86, 'Intel Lake Core i7-12500H'),
(108, 2, 86, '4GB RTX 3050Ti'),
(109, 3, 86, ' 15,6 FHD 1920X1080 144Hz'),
(110, 4, 86, '16GB (1x16GB) DDR4 1.2V'),
(111, 5, 86, '1TB PCIe M.2 2280 3.0 x4'),
(112, 6, 86, 'Windows 11 Pro'),
(113, 1, 87, 'Intel Rocket Core i9-11900K'),
(114, 2, 87, 'Nvidia RTX 3080 '),
(115, 3, 87, '17,3 QHD 2560x1440 165Hz'),
(116, 4, 87, '32GB (2x16GB) DDR4'),
(117, 5, 87, '1TB PCIe M.2 2280 3.0 x4'),
(118, 6, 87, 'Windows 11 Pro'),
(119, 1, 88, 'Intel Lake Core i7-12500H'),
(120, 2, 88, 'Nvidia RTX 3060 '),
(121, 3, 88, '17,3 QHD 2560x1440 165Hz'),
(122, 4, 88, '16GB (1x16GB) DDR4 1.2V'),
(123, 5, 88, '500GB PCIe M.2 2280 3.0 x4'),
(124, 6, 88, 'Windows 10 Pro'),
(125, 1, 89, 'Intel Lake Core i7-11500H'),
(126, 2, 89, 'Nvidia RTX 3050 '),
(127, 3, 89, ' 15,6 FHD 1920X1080 144Hz'),
(128, 4, 89, '16GB (2x8GB) DDR4 1.2V 3200MHz'),
(129, 5, 89, '500GB PCIe M.2 2280 3.0 x4'),
(130, 6, 89, 'Windows 10 Home'),
(131, 7, 90, 'Titreşimli bas özelliği'),
(132, 8, 90, '7.1 Surround ses'),
(133, 9, 90, 'Dayanıklı ve konforlu tasarım'),
(134, 10, 90, 'Çok yönlü mikrofon'),
(135, 11, 90, '50mm kulaklık sürücüleri'),
(136, 1, 91, 'Intel Lake Core i5-11700H'),
(137, 2, 91, '4GB GTX 1650'),
(138, 3, 91, ' 15,6 FHD 1920X1080 144Hz'),
(139, 4, 91, '8GB (1x8GB) DDR4'),
(140, 5, 91, '500GB PCIe M.2 2280 3.0 x4'),
(141, 6, 91, 'Windows 10 Home'),
(142, 1, 92, 'Intel Lake Core i7-12500H'),
(143, 2, 92, 'Nvidia RTX 3050 '),
(144, 3, 92, '17,3 QHD 2560x1440 165Hz'),
(145, 4, 92, '16GB (1x16GB) DDR4 1.2V'),
(146, 5, 92, '500GB PCIe M.2 2280 3.0 x4'),
(147, 6, 92, 'Windows 10 Pro'),
(148, 7, 93, 'Ayarlanabilir 16000 DPI'),
(149, 8, 93, 'Şarj edilebilir batarya'),
(150, 9, 93, 'USB Tip-C Şarj Desteği'),
(151, 10, 93, '5 Farklı profil desteği'),
(152, 11, 93, '8 adet programlanabilir tuş'),
(153, 7, 94, 'Kırmızı mekanik switch'),
(154, 8, 94, 'Tuşlar için Anti-ghosting özelliği'),
(155, 9, 94, 'RGB Aydınlatma'),
(156, 10, 94, 'Bilek desteği ve tam boyut tasarım'),
(157, 11, 94, 'Programlanabilir tuşlar'),
(158, 1, 95, 'Intel Lake Core i7-12500H'),
(159, 2, 95, '4GB GTX 1650'),
(160, 3, 95, ' 15,6 FHD 1920X1080 144Hz'),
(161, 4, 95, '16GB (2x8GB) DDR4 1.2V 3200MHz'),
(162, 5, 95, '1TB PCIe M.2 2280 3.0 x4'),
(163, 6, 95, 'Windows 10 Pro'),
(164, 12, 96, 'Geniş Ekran 16:9'),
(165, 13, 96, '240 Hz Ekran yenileme hızı'),
(166, 14, 96, '1 Ms Tepki süresi'),
(167, 15, 96, 'Dahili hoparlör'),
(168, 16, 96, '1920x1080 FHD Çözünürlük'),
(169, 1, 97, 'Intel Lake Core i7-12500H'),
(170, 2, 97, '4GB GTX 1650'),
(171, 3, 97, ' 15,6 FHD 1920X1080 144Hz'),
(172, 4, 97, '8GB (1x8GB) DDR4'),
(173, 5, 97, '500GB PCIe M.2 2280 3.0 x4'),
(174, 6, 97, 'Windows 10 Home'),
(175, 1, 98, 'Intel Lake Core i5-11700H'),
(176, 2, 98, 'Nvidia RTX 3050 '),
(177, 3, 98, ' 15,6 FHD 1920X1080 144Hz'),
(178, 4, 98, '16GB (1x16GB) DDR4 1.2V'),
(179, 5, 98, '500GB PCIe M.2 2280 3.0 x4'),
(180, 6, 98, 'Windows 10 Pro'),
(181, 1, 99, 'Intel Lake Core i7-12500H'),
(182, 2, 99, 'Nvidia RTX 3060 '),
(183, 3, 99, '17,3 QHD 2560x1440 165Hz'),
(184, 4, 99, '32GB (2x16GB) DDR4'),
(185, 5, 99, '1TB PCIe M.2 2280 3.0 x4'),
(186, 6, 99, 'Windows 11 Pro');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozellikler`
--

CREATE TABLE `ozellikler` (
  `ozellik_id` int(11) NOT NULL,
  `ozellik_ad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ozellikler`
--

INSERT INTO `ozellikler` (`ozellik_id`, `ozellik_ad`) VALUES
(1, 'İşlemci'),
(2, 'Ekran Kartı'),
(3, 'Ekran'),
(4, 'Ram Belleği'),
(5, 'SSD'),
(6, 'İşletim Sistemi'),
(7, 'mOzellik1'),
(8, 'mOzellik2'),
(9, 'mOzellik3'),
(10, 'mOzellik4'),
(11, 'mOzellik5'),
(12, 'monitorEkrani'),
(13, 'Hertz'),
(14, 'tepkiSuresi'),
(15, 'hoparlor'),
(16, 'cozunurluk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `durum_id` int(11) NOT NULL,
  `kargo_id` int(11) NOT NULL,
  `siparis_tarihi` date NOT NULL,
  `teslim_tarihi` date DEFAULT NULL,
  `musteri_id` bigint(20) NOT NULL,
  `urun_adet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`siparis_id`, `urun_id`, `durum_id`, `kargo_id`, `siparis_tarihi`, `teslim_tarihi`, `musteri_id`, `urun_adet`) VALUES
(98, 87, 4, 1, '2022-12-29', '2022-12-30', 5, 5),
(99, 88, 4, 1, '2022-12-29', '2022-12-29', 5, 5),
(101, 87, 4, 1, '2022-12-30', '2022-12-30', 5, 2),
(102, 81, 4, 3, '2022-12-30', '2022-12-30', 13, 2),
(103, 87, 4, 3, '2022-12-30', '2022-12-30', 13, 2),
(108, 87, 2, 1, '2022-12-30', NULL, 5, 5),
(109, 89, 4, 1, '2022-12-30', '2022-12-30', 5, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_durum`
--

CREATE TABLE `siparis_durum` (
  `durum_id` int(11) NOT NULL,
  `durum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparis_durum`
--

INSERT INTO `siparis_durum` (`durum_id`, `durum`) VALUES
(1, 'Sipariş onaylanmayı bekliyor.'),
(2, 'Siparişiniz onaylandı.'),
(3, 'Siparişiniz kargoya verilmiştir.'),
(4, 'Siparişiniz teslim edilmiştir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `kategori_id`, `model_id`, `stok`) VALUES
(81, 7, 53, 5),
(84, 6, 54, 5),
(86, 1, 7, 5),
(87, 1, 1, 5),
(88, 1, 17, 5),
(89, 1, 18, 5),
(90, 7, 52, 5),
(91, 2, 29, 5),
(92, 3, 39, 5),
(93, 4, 50, 5),
(94, 5, 56, 5),
(95, 3, 40, 5),
(96, 6, 55, 5),
(97, 2, 35, 5),
(98, 1, 8, 4),
(99, 1, 9, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunresimler`
--

CREATE TABLE `urunresimler` (
  `urun_resim_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `katalog_resmi` varchar(60) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urunresimler`
--

INSERT INTO `urunresimler` (`urun_resim_id`, `urun_id`, `katalog_resmi`, `kategori_id`) VALUES
(74, 81, 'pusat-kulaklik-resimler-2_small.png', 7),
(77, 84, 'DragonEye_A27.png', 6),
(79, 86, 'Manta.png', 1),
(80, 87, 'Hydra.png', 1),
(81, 88, 'Fire.png', 1),
(82, 89, 'Fire.png', 1),
(83, 90, 'pusat-headset-lite-resim-1_small.png', 7),
(84, 91, 'Drake.png', 2),
(85, 92, 'Wrym.png', 3),
(86, 93, 'v5-06.png', 4),
(87, 94, 'PusatK3.114.png', 5),
(88, 95, 'Wrym.png', 3),
(89, 96, 'DragonEye_A32.png', 6),
(90, 97, 'Drake.png', 2),
(91, 98, 'Manta.png', 1),
(92, 99, 'Manta.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum` text NOT NULL,
  `urun_id` int(11) NOT NULL,
  `musteri_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum`, `urun_id`, `musteri_id`) VALUES
(1, 'güzel ürün beğendim!', 87, 5),
(2, 'İdare eder,İşimi görüyor', 88, 5),
(3, 'Ürün çok güzel!', 81, 13),
(4, 'idare eder!, işimi görür.', 87, 13),
(5, 'ürün çok iyi!', 89, 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminler`
--
ALTER TABLE `adminler`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `adres_tanimlari`
--
ALTER TABLE `adres_tanimlari`
  ADD PRIMARY KEY (`adres_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `alisveris_sepeti`
--
ALTER TABLE `alisveris_sepeti`
  ADD PRIMARY KEY (`sepet_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `degerlendirme`
--
ALTER TABLE `degerlendirme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `urun_id` (`urun_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `fiyatlar`
--
ALTER TABLE `fiyatlar`
  ADD PRIMARY KEY (`fiyat_id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `kargo`
--
ALTER TABLE `kargo`
  ADD PRIMARY KEY (`kargo_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kayit`
--
ALTER TABLE `kayit`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Tablo için indeksler `ozellikdetay`
--
ALTER TABLE `ozellikdetay`
  ADD PRIMARY KEY (`ozellik_detay_id`),
  ADD KEY `ozellik_id` (`ozellik_id`,`urun_id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `ozellikler`
--
ALTER TABLE `ozellikler`
  ADD PRIMARY KEY (`ozellik_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`siparis_id`),
  ADD KEY `urun_id` (`urun_id`,`durum_id`,`kargo_id`),
  ADD KEY `durum_id` (`durum_id`),
  ADD KEY `kargo_id` (`kargo_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `siparis_durum`
--
ALTER TABLE `siparis_durum`
  ADD PRIMARY KEY (`durum_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Tablo için indeksler `urunresimler`
--
ALTER TABLE `urunresimler`
  ADD PRIMARY KEY (`urun_resim_id`),
  ADD KEY `urun_id` (`urun_id`,`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`),
  ADD KEY `urun_id` (`urun_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminler`
--
ALTER TABLE `adminler`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `adres_tanimlari`
--
ALTER TABLE `adres_tanimlari`
  MODIFY `adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `alisveris_sepeti`
--
ALTER TABLE `alisveris_sepeti`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- Tablo için AUTO_INCREMENT değeri `degerlendirme`
--
ALTER TABLE `degerlendirme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `fiyatlar`
--
ALTER TABLE `fiyatlar`
  MODIFY `fiyat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Tablo için AUTO_INCREMENT değeri `kargo`
--
ALTER TABLE `kargo`
  MODIFY `kargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `kayit`
--
ALTER TABLE `kayit`
  MODIFY `musteri_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Tablo için AUTO_INCREMENT değeri `ozellikdetay`
--
ALTER TABLE `ozellikdetay`
  MODIFY `ozellik_detay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Tablo için AUTO_INCREMENT değeri `ozellikler`
--
ALTER TABLE `ozellikler`
  MODIFY `ozellik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_durum`
--
ALTER TABLE `siparis_durum`
  MODIFY `durum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Tablo için AUTO_INCREMENT değeri `urunresimler`
--
ALTER TABLE `urunresimler`
  MODIFY `urun_resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `adres_tanimlari`
--
ALTER TABLE `adres_tanimlari`
  ADD CONSTRAINT `adres_tanimlari_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `kayit` (`musteri_id`);

--
-- Tablo kısıtlamaları `degerlendirme`
--
ALTER TABLE `degerlendirme`
  ADD CONSTRAINT `degerlendirme_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`),
  ADD CONSTRAINT `degerlendirme_ibfk_2` FOREIGN KEY (`musteri_id`) REFERENCES `kayit` (`musteri_id`);

--
-- Tablo kısıtlamaları `fiyatlar`
--
ALTER TABLE `fiyatlar`
  ADD CONSTRAINT `fiyatlar_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`);

--
-- Tablo kısıtlamaları `ozellikdetay`
--
ALTER TABLE `ozellikdetay`
  ADD CONSTRAINT `ozellikdetay_ibfk_1` FOREIGN KEY (`ozellik_id`) REFERENCES `ozellikler` (`ozellik_id`),
  ADD CONSTRAINT `ozellikdetay_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`);

--
-- Tablo kısıtlamaları `siparisler`
--
ALTER TABLE `siparisler`
  ADD CONSTRAINT `siparisler_ibfk_1` FOREIGN KEY (`durum_id`) REFERENCES `siparis_durum` (`durum_id`),
  ADD CONSTRAINT `siparisler_ibfk_2` FOREIGN KEY (`kargo_id`) REFERENCES `kargo` (`kargo_id`),
  ADD CONSTRAINT `siparisler_ibfk_4` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`),
  ADD CONSTRAINT `siparisler_ibfk_5` FOREIGN KEY (`musteri_id`) REFERENCES `kayit` (`musteri_id`);

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `urunler_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`);

--
-- Tablo kısıtlamaları `urunresimler`
--
ALTER TABLE `urunresimler`
  ADD CONSTRAINT `urunresimler_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`),
  ADD CONSTRAINT `urunresimler_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`),
  ADD CONSTRAINT `yorumlar_ibfk_2` FOREIGN KEY (`musteri_id`) REFERENCES `kayit` (`musteri_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
