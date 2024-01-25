-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-01-25 18:04:35
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tray_product`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `profile_table`
--

CREATE TABLE `profile_table` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `post_number` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `tel` varchar(128) NOT NULL,
  `company` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `profile_table`
--

INSERT INTO `profile_table` (`id`, `name`, `post_number`, `address`, `tel`, `company`, `created_at`) VALUES
(1, 'testuser01', '810-0041', '福岡市', 'ジーズアカデミー', '092-761-5777', 2147483647);

-- --------------------------------------------------------

--
-- テーブルの構造 `sample_table`
--

CREATE TABLE `sample_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `sample_table`
--

INSERT INTO `sample_table` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(1, 1, 3, '2024-01-25 21:17:13'),
(2, 1, 3, '2024-01-25 22:30:42'),
(3, 1, 3, '2024-01-25 22:30:44'),
(4, 1, 3, '2024-01-25 22:30:45'),
(8, 1, 1, '2024-01-26 00:59:09'),
(9, 3, 3, '2024-01-26 01:00:44'),
(10, 3, 3, '2024-01-26 01:00:44'),
(12, 1, 3, '2024-01-26 01:59:57'),
(13, 1, 5, '2024-01-26 02:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `tray_table`
--

CREATE TABLE `tray_table` (
  `id` int(11) NOT NULL,
  `maker` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product` varchar(128) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `tray_table`
--

INSERT INTO `tray_table` (`id`, `maker`, `category`, `image`, `product`, `purpose`, `created_at`, `updated_at`) VALUES
(3, 'エフピコ', 'C', 'uploads/264038.jpg', '輝ステージ1-5', '寿司5貫　巻1本', 2147483647, 2147483647),
(4, '中央化学', 'F', 'uploads/0000000056622_0bex3ao.jpg', 'デリカッテ 15-12', '', 2147483647, 2147483647),
(5, 'エフピコ', 'A', 'uploads/Sステージ19-11.jpg', 'Sステージ19-11', '2点盛', 2147483647, 2147483647),
(6, 'シーピー化成', 'E', 'uploads/BF丸丼18.jpg', 'BF丸丼18', 'どんぶり', 2147483647, 2147483647),
(7, 'エフピコ', 'G', 'uploads/APフルーツ25.jpg', 'APフルーツ25', 'フルーツ', 2147483647, 2147483647),
(8, 'エフピコ', 'E', 'uploads/エリッシュ24-20-2.jpg', 'エリッシュ24-20-2', 'ごはん200g', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `mail_address` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `mail_address`, `password`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test01@test.com', '1111', 0, 2147483647, 2147483647, NULL),
(2, 'test02@test.com', '2222', 0, 2147483647, 2147483647, NULL),
(3, 'test03@test.com', '3333', 0, 2147483647, 2147483647, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `profile_table`
--
ALTER TABLE `profile_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sample_table`
--
ALTER TABLE `sample_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `tray_table`
--
ALTER TABLE `tray_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `profile_table`
--
ALTER TABLE `profile_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `sample_table`
--
ALTER TABLE `sample_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `tray_table`
--
ALTER TABLE `tray_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
