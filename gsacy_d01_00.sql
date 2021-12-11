-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 12 月 11 日 09:25
-- サーバのバージョン： 10.4.20-MariaDB
-- PHP のバージョン: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacy_d01_00`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `comment_table`
--

INSERT INTO `comment_table` (`id`, `thread_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, '🍺', '2021-12-11 16:40:51', '2021-12-11 16:40:51'),
(2, 1, '🍺', '2021-12-11 16:45:03', '2021-12-11 16:45:03'),
(3, 2, 'PHP', '2021-12-11 16:46:54', '2021-12-11 16:46:54'),
(4, 3, 'INSERT', '2021-12-11 16:48:22', '2021-12-11 16:48:22'),
(5, 3, 'SELECT', '2021-12-11 16:48:24', '2021-12-11 16:48:24'),
(6, 1, 'JS', '2021-12-11 16:49:22', '2021-12-11 16:49:22'),
(7, 1, 'JS', '2021-12-11 16:49:36', '2021-12-11 16:49:36'),
(8, 3, 'UPDATE', '2021-12-11 16:49:44', '2021-12-11 16:49:44'),
(9, 4, 'test', '2021-12-11 16:54:26', '2021-12-11 16:54:26'),
(10, 4, 'hoge', '2021-12-11 16:54:30', '2021-12-11 16:54:30'),
(11, 4, 'fuga', '2021-12-11 16:54:33', '2021-12-11 16:54:33'),
(12, 3, 'DELETE', '2021-12-11 16:54:59', '2021-12-11 16:54:59'),
(13, 2, '🍺', '2021-12-11 16:55:19', '2021-12-11 16:55:19'),
(14, 2, 'AGE', '2021-12-11 16:55:23', '2021-12-11 16:55:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `thread_table`
--

CREATE TABLE `thread_table` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `thread_table`
--

INSERT INTO `thread_table` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'JavaScript', '2021-12-11 16:27:42', '2021-12-11 16:49:36'),
(2, 'PHP', '2021-12-11 16:27:50', '2021-12-11 16:55:23'),
(3, 'SQL', '2021-12-11 16:48:17', '2021-12-11 16:54:59'),
(4, 'yamaguchi_dev01', '2021-12-11 16:54:13', '2021-12-11 16:54:33');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(11) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'SQL練習', '2021-12-31', '2021-12-11 14:17:45', '2021-12-11 14:17:45'),
(2, 'PHP練習', '2021-12-11', '2021-12-11 14:30:29', '2021-12-11 14:30:29'),
(3, 'JavaScript練習', '2021-12-01', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(4, '課題提出', '2021-12-15', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(5, '卒制提出', '2022-03-22', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(6, 'お酒を買う', '2021-12-11', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(7, 'つまみを買う', '2021-12-13', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(8, '炭酸水を買う', '2021-12-12', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(9, '肉を買う', '2021-12-13', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(10, '魚を買う', '2021-12-13', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(11, 'ピザを焼く', '2021-12-14', '2021-12-11 14:30:47', '2021-12-11 14:30:47'),
(12, 'test01', '2021-12-11', '2021-12-11 14:43:34', '2021-12-11 14:43:34'),
(13, 'test02', '2021-12-12', '2021-12-11 14:43:34', '2021-12-11 14:43:34'),
(14, 'test03', '2021-12-13', '2021-12-11 14:43:34', '2021-12-11 14:43:34'),
(15, 'PHPとSQL連携', '2021-12-11', '2021-12-11 15:01:50', '2021-12-11 15:01:50'),
(16, 'test', '2021-12-11', '2021-12-11 15:03:14', '2021-12-11 15:03:14'),
(17, '課題発表', '2021-12-18', '2021-12-11 15:43:57', '2021-12-11 15:43:57');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `thread_table`
--
ALTER TABLE `thread_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `thread_table`
--
ALTER TABLE `thread_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
