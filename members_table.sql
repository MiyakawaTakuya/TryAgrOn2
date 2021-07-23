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
-- テーブルの構造 `members_table`
--

CREATE TABLE `members_table` (
  `id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `member_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(2) NOT NULL,
  `passion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `members_table`
--

INSERT INTO `members_table` (`id`, `event_id`, `member_name`, `email`, `age`, `passion`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, '橋口稔真', 'fox@test.co.jp', 26, '実家も稲作を行っており、主催者の方の課題に共感を覚えたため。是非力になりたい。', 0, '2021-07-23 11:34:16', '2021-07-23 11:34:16'),
(2, 3, '宮川卓也', 'miyakawa@test.co.jp', 32, 'プログラミングスクールを出たばかりだが、技術を磨きたいので、ぜひ参加させて欲しい。', 0, '2021-07-23 11:36:06', '2021-07-23 11:36:06'),
(3, 3, '難波佳代子', 'namba@test.co.jp', 38, 'メンタルに自信があり、最後まで諦めずに成し遂げられる自信があるので参加させてほし。', 0, '2021-07-23 11:36:57', '2021-07-23 11:36:57'),
(4, 4, '橋口稔真', 'fox@test.co.jp', 26, 'トマトが大好きなのでトマト農家と美味しいトマトのため、自分のスキルアップのために参加させて欲しい', 0, '2021-07-23 11:38:14', '2021-07-23 11:38:14'),
(5, 4, '宮川卓也', 'miyakawa@test.co.jp', 32, 'Pythonを活用して画像解析を行う技術を勉強中。トマトの画像を解析することで主催者の方の課題解決のサポートがしたい。', 0, '2021-07-23 11:39:50', '2021-07-23 11:39:50'),
(6, 4, '難波佳代子', 'broccoli@test.co.jp', 38, 'トマトを使用した化粧品会社でデータ分析を担当しており、その経験が活かせるのではないかと思う。ぜひ参加したい。', 0, '2021-07-23 11:41:11', '2021-07-23 11:41:11'),
(7, 5, '橋口稔真', 'fox@test.co.jp', 26, '日本酒が好きで、その中でも獺祭が好きなので、獺祭の原料となる山田錦のために力になりたい', 0, '2021-07-23 11:42:10', '2021-07-23 11:42:10'),
(8, 5, '宮川卓也', 'arch_miya@test.co.jp', 32, 'お米を食べることが好きなので、お米のために水田監視のプロダクトを作りたい', 0, '2021-07-23 11:43:31', '2021-07-23 11:43:31'),
(9, 5, '難波佳代子', 'broccoli@test.co.jp', 38, 'お米を使った化粧品のデータ分析を担当しており、その経験を生かしたい。', 0, '2021-07-23 11:44:46', '2021-07-23 11:44:46');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `members_table`
--
ALTER TABLE `members_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `members_table`
--
ALTER TABLE `members_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
