-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 22 日 08:31
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
-- データベース: `gsacf_d08_10`
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

INSERT INTO `events_table` (`id`, `hackathon_name`, `event_date`, `event_location`, `organizer_name`, `pain`, `expectation`, `requirements`, `upper_limit`, `reward`, `img`, `join_place`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '棚田の草刈り効率化プロダクト開発', '20210731', '山口県下関市', '山口健太', '棚田の草刈りをしたいが地形が入り組んでおり、刈り残しが発生。非効率になっている', '草刈りの効率化', 'メンタルタフネス', 9, '棚田米10kg', NULL, 'オン・オフ両方', 0, '2021-07-22 15:28:08', '2021-07-22 15:28:08');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
