-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21 ديسمبر 2022 الساعة 12:23
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssd`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `AdminID` bigint(255) NOT NULL,
  `Ad_Name` varchar(255) NOT NULL,
  `Ad_Address` varchar(255) NOT NULL,
  `Ad_Email` varchar(255) NOT NULL,
  `Ad_phone` varchar(255) NOT NULL,
  `Ad_Qualification` varchar(255) NOT NULL,
  `Ad_Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`AdminID`, `Ad_Name`, `Ad_Address`, `Ad_Email`, `Ad_phone`, `Ad_Qualification`, `Ad_Picture`) VALUES
(1, 'حسان', 'رفح', 'HJKH@GMAIL.COM', '3454435', 'بكالوريس', '44-449899_pubg-hd-wallpapers-free-download-for-desktop-pc.jpg'),
(2, 'OL;', '777777', 'HJKH@GMAIL.COM', 'LK', 'بكالوريس', 'خلفيات-كمبيوتر-حجم-كبير-3.jpg'),
(3, 'OL;', 'LK;', 'HJKH@GMAIL.COM', '3454435', 'بكالوريس', 'تنزيل اجمل خلفيات كمبيوتر 4k hd wallpapers 1080p 💕 2021 (14).jpg'),
(4, 'HHHH', 'رفح', 'HJKH@GMAIL.COM', '0592049451', 'بكالوريس', '3553.jpg'),
(222, '', '', '', '', '', '3553.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `project`
--

CREATE TABLE `project` (
  `Pro_ID` bigint(255) NOT NULL,
  `Pro_Name` varchar(255) NOT NULL,
  `Pro_Sammary` text NOT NULL,
  `Pro_NameFile` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `project`
--

INSERT INTO `project` (`Pro_ID`, `Pro_Name`, `Pro_Sammary`, `Pro_NameFile`, `position`) VALUES
(1, '66', '66', 'الطوابير  سلاديات النظري .pptx', 'folderfile/الطوابير  سلاديات النظري .pptx'),
(2, 'hj', 'sfghfgh', 'مبادئ الاحصاء والاحصاء الحيوي.pdf', 'folderfile/مبادئ الاحصاء والاحصاء الحيوي.pdf'),
(3, 'ffffff', 'fgggggggggg', 'مبادئ الاحصاء والاحصاء الحيوي.pdf', 'folderfile/مبادئ الاحصاء والاحصاء الحيوي.pdf');

-- --------------------------------------------------------

--
-- بنية الجدول `student`
--

CREATE TABLE `student` (
  `StudentID` int(255) NOT NULL,
  `Stu_Name` varchar(255) NOT NULL,
  `Stu_Address` varchar(255) NOT NULL,
  `Stu_Major` varchar(255) NOT NULL,
  `Stu_Email` varchar(255) NOT NULL,
  `Stu_Pictuer` varchar(1000) NOT NULL,
  `AdminID` bigint(255) NOT NULL,
  `Pro_ID` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `student`
--

INSERT INTO `student` (`StudentID`, `Stu_Name`, `Stu_Address`, `Stu_Major`, `Stu_Email`, `Stu_Pictuer`, `AdminID`, `Pro_ID`) VALUES
(2, 'hassan  Abo  snema', 'غزةالت', 'برمجياتلات', 'hhfghghjfghfg@gmail.com', 'خلفيات-موبايل-2017-1-1.jpg', 3, 2),
(3, 'ghassan', 'غزةالت', 'برمجياتلات', 'hhfghghjfghfg@gmail.com', 'The-Mandalorian-2019-Star-Wars-TV-Series-3840x2400-1.jpg', 3, 3),
(4, 'حسان محي الدين ابوسنيمة', 'غزةالت', 'برمجياتd', 'hhfghghjfghfg@gmail.com', 'أفضل 120 خلفيات وصور بجودة عالية wallpaper hd 4k (27).jpg', 2, 2),
(12, 'hassan', 'رفح', 'برمجيات', 'hhfghfghfghfg@gmail.com', '80-desktop-wallpapers-hd-4k-صور-خلفيات-كمبيوتر-سطح-المكتب-1024x576.jpg', 4, 3);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `Username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Manger` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`Username`, `email`, `Password`, `Manger`) VALUES
('hassan2002', 'hassansnem8@gmail.com', '12345678', 0),
('hassan3333333', 'forgottencharacter93@gmail.com', '123456789', 1),
('hassan snema', '7san34snema@gmail.com', '123456789', 0),
('hassan snema', '7san55snema@gmail.com', '123456789', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pro_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `Pro_ID` (`Pro_ID`);

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Pro_ID`) REFERENCES `project` (`Pro_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
