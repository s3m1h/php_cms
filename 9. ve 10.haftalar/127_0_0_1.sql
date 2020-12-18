-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 18 Ara 2020, 15:26:29
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `goksun_myo`
--
CREATE DATABASE IF NOT EXISTS `goksun_myo` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `goksun_myo`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(1000) NOT NULL,
  `site_baslik` varchar(100) NOT NULL,
  `site_aciklama` text NOT NULL,
  `site_anahtarkelimeler` varchar(1000) NOT NULL,
  `site_durum` varchar(1) NOT NULL,
  `site_tema` varchar(10) NOT NULL,
  `site_iletisimno` varchar(20) NOT NULL,
  `site_eposta` varchar(150) NOT NULL,
  `site_facebook` text NOT NULL,
  `site_twitter` text NOT NULL,
  `site_linkedin` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_url`, `site_baslik`, `site_aciklama`, `site_anahtarkelimeler`, `site_durum`, `site_tema`, `site_iletisimno`, `site_eposta`, `site_facebook`, `site_twitter`, `site_linkedin`) VALUES
(1, 'http://localhost', 'gÃ¶ksun meslek yÃ¼ksek olulu', 'Kahramanmaras', 'EÄŸitim, Meslek, Bilgisayar', '1', '2', '0545 677 00 00', 'semih_acar01@hotmail.com', 'https://www.facebook.com/semih_acar', 'https://twitter.com/semih001', 'htttp://linkedin.com/sem01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_kayit`
--

DROP TABLE IF EXISTS `ogrenci_kayit`;
CREATE TABLE IF NOT EXISTS `ogrenci_kayit` (
  `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_tc` int(11) NOT NULL,
  `ogrenci_adi` varchar(75) NOT NULL,
  `ogrenci_soyad` varchar(50) NOT NULL,
  `ogrenci_cinsiyet` varchar(5) NOT NULL,
  `ogrenci_dogum` varchar(10) NOT NULL,
  `ogrenci_adres` text NOT NULL,
  `ogrenci_telno` varchar(11) NOT NULL,
  `ogrenci_foto` text NOT NULL,
  PRIMARY KEY (`ogrenci_id`),
  UNIQUE KEY `ogrenci_tc` (`ogrenci_tc`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ogrenci_kayit`
--

INSERT INTO `ogrenci_kayit` (`ogrenci_id`, `ogrenci_tc`, `ogrenci_adi`, `ogrenci_soyad`, `ogrenci_cinsiyet`, `ogrenci_dogum`, `ogrenci_adres`, `ogrenci_telno`, `ogrenci_foto`) VALUES
(1, 16142, 'Büşra', 'Şahin', 'kadın', '1/1/2001', 'İstanbul', '5322268580', 'yok'),
(2, 456352, 'Barış', 'Kurt', 'Erkek', '30/01/2000', 'Alanya/Antalya', '5324973873', 'yakışıklı'),
(3, 78254, 'Meryem', 'Kocabaş', 'Kadın', '12/12/2005', 'Bursa', '54568792156', 'yok');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sistem_kayitlari`
--

DROP TABLE IF EXISTS `sistem_kayitlari`;
CREATE TABLE IF NOT EXISTS `sistem_kayitlari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(3000) NOT NULL,
  `yapilan_islem` varchar(1000) NOT NULL,
  `yapan_kisi` varchar(1000) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sistem_kayitlari`
--

INSERT INTO `sistem_kayitlari` (`id`, `aciklama`, `yapilan_islem`, `yapan_kisi`, `tarih`) VALUES
(1, 'shnbusraadında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'kurtbar07', '2020-11-13 01:34:31'),
(2, 'shnbusra adında yeni bir kayıt silindi', 'Kayıt Silindi', 'kurtbar07', '2020-11-13 01:37:12'),
(3, 'localhost2 adlı kullancının kaydı güncellendi', 'Kayıt Güncellendi', 'kurtbar07', '2020-11-13 01:42:39'),
(4, 'localhost2 adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'kurtbar07', '2020-11-13 16:48:55'),
(5, 'whoIam adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'kurtbar07', '2020-11-13 16:52:01'),
(6, 'admin adında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'kurtbar07', '2020-11-13 16:52:50'),
(7, 'admin adlı kullancının kaydı güncellendi', 'Kayıt Güncellendi', 'kurtbar07', '2020-11-13 16:52:59'),
(8, 'asd12 adında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'admin', '2020-11-13 16:55:11'),
(9, 'admin adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'admin', '2020-11-13 19:11:35'),
(10, 'shnbusra adında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'admin', '2020-11-13 19:12:36'),
(11, 'whoIam adında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'admin', '2020-11-13 19:12:52'),
(12, 'semih adında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'whoIam', '2020-11-13 19:16:22'),
(13, 'whoIam adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'whoIam', '2020-11-13 19:16:56'),
(14, 'semih adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'semih', '2020-11-13 19:25:07'),
(15, 'shnbusra adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'localhost', '2020-11-24 15:30:23'),
(16, 'Kurtbar adında yeni bir kayıt oluşturuldu', 'Kayıt Eklendi', 'kurtbar07', '2020-11-25 00:45:11'),
(17, 'Kurtbar adlı kullancının kaydı güncellendi', 'Kayıt Güncellendi', 'kurtbar07', '2020-11-25 00:45:21'),
(18, 'kurtbar07 adlı kullanıcının kaydı silindi', 'Kayıt Silindi', 'kurtbar07', '2020-12-13 19:09:52'),
(19, 'Site ayarları güncellendi', 'Kayıt Güncellendi', 'kurtbar07', '2020-12-13 21:14:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `kull_adi` varchar(300) NOT NULL,
  `kull_sifre` varchar(50) NOT NULL,
  `uye_mail` varchar(300) NOT NULL,
  `uye_durum` int(1) NOT NULL,
  `uye_yetki` int(1) NOT NULL,
  `kayit_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kull_adi`, `kull_sifre`, `uye_mail`, `uye_durum`, `uye_yetki`, `kayit_tarih`) VALUES
(1, 'admin', '123', 'asefsaef@admin.com', 1, 1, '2020-12-09 15:30:31'),
(31, 'admin2', '202cb962ac59075b964b07152d234b70', 'semih_acar01@hotmail.com', 0, 1, '2020-12-15 15:31:44'),
(32, 'sem', 'c4ca4238a0b923820dcc509a6f75849b', 'semih_acar021@hotmail.com', 1, 1, '2020-12-15 16:41:00'),
(33, 'dene', 'c4ca4238a0b923820dcc509a6f75849b', 'semih_acar1101@hotmail.com', 0, 4, '2020-12-15 17:44:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
