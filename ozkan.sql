-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Ağu 2021, 14:50:08
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ozkan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abone`
--

CREATE TABLE `abone` (
  `abone_id` int(11) NOT NULL,
  `abone_email` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `abone`
--

INSERT INTO `abone` (`abone_id`, `abone_email`) VALUES
(1, 'ozknykp@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `anahtarkelime` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `youtube` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `baslik`, `aciklama`, `anahtarkelime`, `telefon`, `email`, `adres`, `facebook`, `instagram`, `youtube`, `twitter`, `logo`, `mesai`) VALUES
(1, 'Ozkan', 'Ozkan E-ticaret', 'Ozkan', '535 978 9123', 'ozknyuksektepe@gmail.com', 'Rize', 'https://tr-tr.facebook.com/', 'https://www.instagram.com/?hl=tr', 'https://www.youtube.com/', 'https://twitter.com/?lang=tr', '7204796859379988710.jpg', '7/24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cokluresim`
--

CREATE TABLE `cokluresim` (
  `id` int(11) NOT NULL,
  `resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cokluresim`
--

INSERT INTO `cokluresim` (`id`, `resim`, `urun_id`) VALUES
(11, '67442689103507546810.jpg', 8),
(12, '8870754350196426111.jpg', 8),
(13, '61182791113299564812.jpg', 8),
(14, '155896692996348369.jpg', 8),
(15, '497115202716708948.jpg', 8),
(16, '9567775843096649884.jpg', 7),
(17, '306564051123292931.jpg', 7),
(20, '20250612691182047111_org_zoom.jpeg', 9),
(21, '2200978449454733air-max-97-ayakkabısı-z3TlrlVN.jpg', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_detay`, `hakkimizda_resim`, `hakkimizda_misyon`, `hakkimizda_vizyon`) VALUES
(1, 'E-TİCARET SİTESİ', '<h3><em>Sizin i&ccedil;in 7/24 hizmet etmek ve sizleri mutlu etmek &ouml;ncelikli hedefimizdir.</em></h3>\r\n', '8214968737396134513.jpg', 'Her zaman en iyi şekilde hizmet etmek ve sizleri mutlu edebilmektir.', 'Türkiye ve Dünya\'da öncü olmak ve ismimizi herkese duyurabilmek için çok çalışıyoruz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sira` int(11) NOT NULL,
  `kategori_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`, `kategori_sira`, `kategori_durum`) VALUES
(1, 'Kadın Elbise', 1, 1),
(2, 'Ayakkabı', 2, 1),
(3, 'Şapka', 3, 0),
(4, 'Çorap', 4, 0),
(5, 'Pantolon', 5, 1),
(6, 'Boxer', 6, 0),
(8, 'Mont', 7, 1),
(9, 'Valiz', 8, 1),
(10, 'Nike', 18, 1),
(11, 'Adidas', 10, 1),
(12, 'Spor', 11, 1),
(13, 'Atlet', 12, 1),
(14, 'Outdoor', 20, 1),
(15, 'Aksesuar', 23, 1),
(16, 'Televizyon', 25, 1),
(17, 'Laptop', 24, 1),
(18, 'Oyun Bilgisayarı', 26, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kullanici_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` int(2) NOT NULL,
  `kullanici_adres` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tel` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_resim` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_email` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_adi`, `kullanici_sifre`, `kullanici_adsoyad`, `kullanici_yetki`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_tel`, `kullanici_resim`, `kullanici_email`) VALUES
(1, '2021-08-12 09:15:02', 'Özkan Yüksektepe', 'e10adc3949ba59abbe56e057f20f883e', 'Ozzy Ykp', 2, 'Türkiye', 'İstanbul', 'Maltepe', '535 978 91 23', '', ''),
(9, '2021-08-14 08:10:09', 'messi', 'e10adc3949ba59abbe56e057f20f883e', 'Özkan Ykp', 1, '', '', '', '', '97054760491493898', ''),
(15, '2021-08-20 07:53:11', 'Rüken', '25d55ad283aa400af464c76d713c07ad', 'Rüken Gökçe', 1, '', '', '', '', '', 'ozzy@gmail.com'),
(16, '2021-08-20 08:04:47', 'Ozkan', 'a78d729964075d652d6260eefc887c95', 'Özkan Yüksektepe', 1, 'İdealtepe', 'İstanbul', 'Maltepe', '(535) 978 91 23', '', 'ozkanykp@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `siparis_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `toplam_fiyat` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `odeme_turu` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_onay` int(11) NOT NULL,
  `siparis_not` text COLLATE utf8_turkish_ci NOT NULL,
  `siparis_yeniadet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`siparis_id`, `kullanici_id`, `urun_id`, `siparis_zaman`, `urun_adet`, `urun_fiyat`, `toplam_fiyat`, `odeme_turu`, `siparis_onay`, `siparis_not`, `siparis_yeniadet`) VALUES
(9, 9, 15, '2021-08-20 06:49:05', 1, '22000.00', '31789.2', '1', 0, '', 0),
(10, 9, 5, '2021-08-20 06:49:05', 1, '4500.00', '31789.2', '1', 0, '', 0),
(15, 9, 15, '2021-08-20 07:17:00', 1, '22000.00', '32438.2', '1', 0, '', 0),
(16, 9, 5, '2021-08-20 07:17:00', 1, '4500.00', '32438.2', '1', 0, '', 0),
(17, 9, 8, '2021-08-20 07:46:01', 3, '110.00', '32438.2', '1', 0, 'Merhaba adet sayısını düşürmek istiyorum.', 3),
(20, 16, 5, '2021-08-20 07:57:07', 1, '4500.00', '6934.86', '0', 0, '', 0),
(21, 16, 9, '2021-08-20 07:57:07', 3, '459.00', '6934.86', '0', 0, '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `slider_aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_button` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(11) NOT NULL,
  `slider_durum` int(11) NOT NULL,
  `slider_banner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_baslik`, `slider_aciklama`, `slider_link`, `slider_button`, `slider_resim`, `slider_sira`, `slider_durum`, `slider_banner`) VALUES
(10, 'Kulaklık', '1500 TL', 'https://www.youtube.com/', 'Git', '80287718895048346.jpg', 3, 1, 1),
(11, 'Drone', '10.000 TL', 'https://www.youtube.com/', 'Git', '158190768511581722_6.jpg', 4, 1, 0),
(12, 'Kamera', '10.000 TL', 'https://www.youtube.com/', 'Git', '8215275199215878474.jpg', 1, 1, 1),
(13, 'Şarj aLeti', 'LG', 'https://www.youtube.com/', 'Git', '299618465662258751_4.jpg', 2, 1, 0),
(14, 'Monitör', 'LG', 'https://www.youtube.com/', 'Git', '4884584201356992.jpg', 5, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `urun_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_sira` int(11) NOT NULL,
  `urun_model` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_renk` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` float(10,2) NOT NULL,
  `onecikan` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_durum` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_etiket` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `kategori_id`, `urun_resim`, `urun_baslik`, `urun_aciklama`, `urun_sira`, `urun_model`, `urun_renk`, `urun_adet`, `urun_fiyat`, `onecikan`, `urun_durum`, `urun_zaman`, `urun_etiket`) VALUES
(4, 16, '290395709594045551.jpg', 'televizyon', '<p>televizyon m&uuml;kemmel</p>\r\n', 10, '2021', 'Beyaz', 4, 8999.00, '1', '1', '2021-08-16 07:46:31', 'televizyon'),
(5, 16, '418994957056925054.jpg', 'Bilgisayar', '<p>Son model</p>\r\n', 2, '2020', 'Siyah', 7, 4500.00, '1', '1', '2021-08-16 07:46:37', 'bilgisayar'),
(8, 1, '121658981121387288kadin-siyah-slim-----elbise-b1fd.jpg', 'Elbise', '<p>Yeni Sezon</p>\r\n', 1, 'Yaz sezon', 'Siyah Desenli', 10, 110.00, '1', '1', '2021-08-16 07:46:10', 'elbise'),
(9, 2, '7727007459716430151_org_zoom.jpeg', 'Ayakkabı Güzel', '<p>Yeni Sezon</p>\r\n', 2, 'Yeni Sezon', 'Krem', 20, 459.00, '1', '1', '2021-08-16 08:01:09', 'ayakkabı'),
(10, 10, '6964063318182766air-max-97-ayakkabısı-z3TlrlVN.jpg', 'Nike Airmax', '<p>Nike Airmax Yeni Sezon&nbsp;</p>\r\n', 4, 'Yeni Sezon', 'Beyaz', 14, 1250.00, '1', '1', '2021-08-16 07:45:44', 'ayakkabı'),
(11, 1, '7339414393210384431_org_zoom.jpg', 'Siyah Elbise', '<p>Yeni Sezon Elbise</p>\r\n', 2, 'Yeni Sezon', 'Siyah', 25, 299.00, '1', '1', '2021-08-16 08:16:27', 'elbise siyah'),
(12, 1, '41803983461668066101a09106_mor.jpg', 'Mor Elbise', '<p>Yeni Sezon Desenli Elbise</p>\r\n', 3, 'Yeni Sezon', 'Mor', 34, 179.00, '1', '1', '2021-08-16 08:28:52', 'mor'),
(14, 16, '2268266518248491813.jpg', 'televizyon', '<p>televison</p>\r\n', 9, '2021', 'Beyaz', 10, 7899.00, '1', '1', '2021-08-18 08:13:53', 'televizyon'),
(15, 18, '296568722909877794.jpg', 'PC', '<p>PC</p>\r\n', 15, '2021', 'Siyah', 14, 22000.00, '1', '1', '2021-08-18 08:15:20', 'bilgisayar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_detay`, `yorum_zaman`, `urun_id`, `kullanici_id`, `yorum_onay`) VALUES
(1, 'çok iyi bir ürünnn', '2021-08-17 09:00:41', 8, 13, 1),
(4, 'mükemmelsss', '2021-08-17 09:00:43', 8, 13, 1),
(5, 'efsane bir ürünn', '2021-08-17 07:15:46', 8, 13, 0),
(6, 'çok güzel ve kumaşı çok iyi ', '2021-08-17 09:27:57', 9, 13, 1),
(7, 'Fiyat Performans Ürünü', '2021-08-17 09:32:04', 7, 9, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abone`
--
ALTER TABLE `abone`
  ADD PRIMARY KEY (`abone_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cokluresim`
--
ALTER TABLE `cokluresim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abone`
--
ALTER TABLE `abone`
  MODIFY `abone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `cokluresim`
--
ALTER TABLE `cokluresim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
