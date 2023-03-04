--a
SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE theloai.ten_tloai = 'Nhạc trữ tình';

--b
SELECT * FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE tacgia.ten_tgia = 'Nhacvietplus';

--c
 SELECT * FROM theloai WHERE theloai.ma_tloai NOT IN (SELECT baiviet.ma_tloai FROM baiviet);

--d
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

--e
SELECT theloai.ten_tloai, COUNT(*) AS so_bviet
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
GROUP BY baiviet.ma_tloai
ORDER BY so_bviet DESC
LIMIT 1;

--f
SELECT tacgia.ten_tgia, COUNT(*) AS so_bviet
FROM baiviet
JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY baiviet.ma_tgia
ORDER BY so_bviet DESC
LIMIT 2;

--g
SELECT * FROM baiviet WHERE baiviet.ten_bhat LIKE '%yêu%' OR baiviet.ten_bhat LIKE '%Thương%' OR baiviet.ten_bhat LIKE '%anh%' OR baiviet.ten_bhat LIKE '%em%';

--i
CREATE VIEW vw_music AS
SELECT baiviet.*, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet
INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia

--l 
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 05:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btth01_cse485`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ma_tkhoan` int(10) UNSIGNED NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ma_tkhoan`, `taikhoan`, `matkhau`) VALUES
(1, 'admin1', '12345678'),
(2, 'admin2', '12345678'),
(3, 'admin3', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ma_tkhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ma_tkhoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
