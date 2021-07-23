-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 23 日 04:48
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `barchx`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `events_table`
--

CREATE TABLE `events_table` (
  `id` int(12) NOT NULL,
  `hackathon_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_location` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_id` int(12) NOT NULL,
  `organizer_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expectation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upper_limit` int(2) NOT NULL,
  `reward` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_place` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `events_table`
--

INSERT INTO `events_table` (`id`, `hackathon_name`, `event_date`, `event_location`, `organizer_id`, `organizer_name`, `pain`, `expectation`, `requirements`, `upper_limit`, `reward`, `img`, `join_place`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, '棚田の草刈りプロダクト求む', '20210731', '山口県下関市', 1, '山口健太', '棚田の構造が複雑で草刈りに時間がかかっている', '草刈りの効率化', 'メンタルタフネス', 8, '山口県産棚田米10kg', NULL, 'オン・オフ両方', 1, '2021-07-22 18:01:25', '2021-07-22 18:01:25'),
(3, '棚田の草刈り効率化プロダクト開発', '20210731', '山口県下関市', 2, '山口健太', '棚田の草刈りをしたいが地形が入り組んでおり、刈り残しが発生。非効率になっている', '草刈りの効率化', 'メンタルタフネス', 9, '棚田米10kg', NULL, 'オン・オフ両方', 0, '2021-07-23 04:31:13', '2021-07-23 04:31:13'),
(4, 'トマトの収穫時期を把握するプロダクト開発', '20210821', '山口県岩国市', 3, '秋吉大地', 'トマトの収穫時期を逃し、熟した実の5割強を廃棄している', 'トマト収穫の効率化', 'トマトが大好きな方', 12, '自家製トマトケチャップ', NULL, 'オフライン', 0, '2021-07-23 11:21:52', '2021-07-23 11:21:52'),
(5, '水田の監視システム', '20210828', '山口県宇部市', 4, '宇部錦', '山田錦の栽培を始めたが経験がない。水田の推移や温度のデータを取りたいが現状仕組みがない。', '水田の推移、温度のデータ取得', '日本酒が好きな方', 20, '獺祭800ml', NULL, 'オン・オフ両方', 0, '2021-07-23 11:30:24', '2021-07-23 11:30:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `events_table`
--
ALTER TABLE `events_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `events_table`
--
ALTER TABLE `events_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
