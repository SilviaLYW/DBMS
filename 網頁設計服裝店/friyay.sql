-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021-11-11 16:54:41
-- 伺服器版本： 8.0.27
-- PHP 版本： 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `friyay`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `cID` int NOT NULL,
  `account` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cPhone` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cAddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cID` int NOT NULL,
  `pID` int NOT NULL,
  `pName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pPrice` int NOT NULL,
  `pNum` int NOT NULL,
  `cTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `mID` int NOT NULL,
  `cID` int NOT NULL,
  `cName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pID` int NOT NULL,
  `pName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pPrice` int NOT NULL,
  `pImage` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`pID`, `pName`, `pPrice`, `pImage`) VALUES
(1, '花卉刺繡上衣', 330, 'images\\p1.jpg'),
(2, '燈心絨吊帶裙', 410, 'images\\p2.jpg'),
(3, '不對稱毛邊牛仔裙', 390, 'images\\p3.jpg'),
(4, '粉藍條紋洋裝', 290, 'images\\p4.jpg'),
(5, '黑灰套裝紡紗裙', 490, 'images\\p5.jpg'),
(6, '直條紋襯衫裙', 350, 'images\\p6.jpg'),
(7, '黑點點套裝裙', 290, 'images\\p7.jpg'),
(8, '紅藍條紋套裝裙', 290, 'images\\p8.jpg'),
(9, '白色牛仔吊帶褲', 410, 'images\\p9.jpg'),
(10, '超值套裝福袋', 410, 'images\\p10.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`cID`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD KEY `cID` (`cID`),
  ADD KEY `test3` (`pID`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mID`),
  ADD KEY `test4` (`cID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `cID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `mID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `pID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cID`) REFERENCES `account` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test3` FOREIGN KEY (`pID`) REFERENCES `product` (`pID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `test4` FOREIGN KEY (`cID`) REFERENCES `account` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
