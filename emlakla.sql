-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Ara 2023, 21:25:33
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emlakla`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `emlaklar`
--

CREATE TABLE `emlaklar` (
  `id` int(11) NOT NULL,
  `sahip_id` int(11) NOT NULL,
  `ilan_no` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `kategori` text NOT NULL,
  `tur` text NOT NULL,
  `guncel_tarih` date NOT NULL,
  `kategorisi` text NOT NULL,
  `tipi` text NOT NULL,
  `aciklama` text NOT NULL,
  `fiyat` float NOT NULL,
  `oda` text NOT NULL,
  `il` text NOT NULL,
  `ilce` text NOT NULL,
  `mahalle` text NOT NULL,
  `mkare` int(11) NOT NULL,
  `kat` int(11) NOT NULL,
  `r1` text NOT NULL,
  `r2` text NOT NULL,
  `r3` text NOT NULL,
  `r4` text NOT NULL,
  `r5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `emlaklar`
--

INSERT INTO `emlaklar` (`id`, `sahip_id`, `ilan_no`, `baslik`, `kategori`, `tur`, `guncel_tarih`, `kategorisi`, `tipi`, `aciklama`, `fiyat`, `oda`, `il`, `ilce`, `mahalle`, `mkare`, `kat`, `r1`, `r2`, `r3`, `r4`, `r5`) VALUES
(1, 1, 1541234130, 'SAHİBİNDEN SATILIK LÜKS VİLLA', 'Satılık', 'Konut', '2023-12-01', 'Satılık', 'Daire', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum sit illum, perferendis dolores exercitationem ratione error numquam necessitatibus vitae debitis aspernatur quos dolor fuga nam iste sed sequi? Placeat, asperiores. Minus, sunt. Harum adipisci repellat atque quod veritatis, debitis sequi architecto numquam ratione consectetur dolor omnis dolores voluptates, odit et, laboriosam accusantium labore ad delectus unde dolore? Deleniti, voluptatem ab. Incidunt accusamus totam eaque dolore unde eos vero dolores, facilis sint adipisci sunt esse consequatur labore ut eius asperiores corporis ducimus numquam officia maxime enim distinctio dignissimos omnis? Itaque, praesentium. Eligendi dignissimos iusto ipsum dolorum optio amet magni fugit doloremque odio repellendus ullam maxime blanditiis voluptatibus, similique commodi! Exercitationem quasi eos excepturi maxime. Velit quaerat tenetur minima vitae neque illum!', 512356, '3+1', 'İstanbul', 'Gaziosmanpaşa', 'Merkez', 120, 3, 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `last_name` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `mail`, `password`) VALUES
(1, 'Afkan', 'Ozdemir', 'afkanozdemir@gmail.com', '12345678');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `emlaklar`
--
ALTER TABLE `emlaklar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `emlaklar`
--
ALTER TABLE `emlaklar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
