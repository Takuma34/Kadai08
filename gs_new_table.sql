-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 06 日 14:28
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_new_table`
--

CREATE TABLE `gs_new_table` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `tell` varchar(64) NOT NULL,
  `address` varchar(124) NOT NULL,
  `hosp` varchar(64) NOT NULL,
  `item` varchar(64) NOT NULL,
  `sn` varchar(64) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_new_table`
--

INSERT INTO `gs_new_table` (`id`, `date`, `name`, `company`, `tell`, `address`, `hosp`, `item`, `sn`, `message`) VALUES
(1, '2023-06-28 20:12:34', '鈴木', '医療機械店', '090-0000-0000', '千葉県', '千葉病院', '電気メス', 'RS3333', '機器の故障'),
(2, '2023-07-04 20:11:44', '佐々木', 'メディカル', '090-0000-0000', '東京都', '東京病院', 'アタッチメント', '553453', '部品の欠落'),
(3, '2023-07-02 09:24:21', '鈴木', '医療機械店', '090-0000-0000', '千葉県', '埼玉病院', '電気メス', 'RS3333', '錆と固着'),
(12, '2023-07-02 08:03:46', '渡辺', '機械店', '090-0000-0000', '東京都', '東京病院', '電気メス', '553453', '部品の欠落'),
(20, '2023-07-02 09:24:00', '松本', '木村機械', '090-5555-6666', '東京都', '千葉病院', '電気メス', 'KTK33', '動かない'),
(21, '2023-07-04 20:11:48', '田中', 'メディカル', '070-6959-4444', '福島県', '福島医療', 'レントゲン関連', '445', '画像不鮮明'),
(22, '2023-07-06 21:24:35', '渡辺', 'メディカル', '03-5555-3233', '東京都品川区', '品川医療', 'ポンプ', 'TT44558', '破損'),
(50, '2023-07-02 20:07:38', '佐藤', 'サージカル', '070-3333-2222', '神奈川県', '大病院', 'ポンプ', '1115', '機能不全'),
(51, '2023-07-03 05:48:48', '木村', '田中機械', '03-7889-7777', '長野県', '長野病院', 'サージカル', 'TT5555', '動作不良');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_new_table`
--
ALTER TABLE `gs_new_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_new_table`
--
ALTER TABLE `gs_new_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
