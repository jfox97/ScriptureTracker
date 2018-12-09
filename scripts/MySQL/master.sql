-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 06:45 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` bigint(20) NOT NULL,
  `Created` datetime NOT NULL,
  `NameLast` varchar(255) NOT NULL,
  `NameFirst` varchar(255) NOT NULL,
  `NameFull` varchar(510) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Username` varchar(24) DEFAULT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookofmormon`
--

CREATE TABLE `bookofmormon` (
  `Book` varchar(15) DEFAULT NULL,
  `Chapters` bigint(20) DEFAULT NULL,
  `Verses` bigint(20) DEFAULT NULL,
  `Paragraphs` bigint(20) DEFAULT NULL,
  `Headings` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookofmormon`
--

INSERT INTO `bookofmormon` (`Book`, `Chapters`, `Verses`, `Paragraphs`, `Headings`) VALUES
('1 Nephi', 22, 618, 1, 22),
('2 Nephi', 33, 779, 1, 33),
('Jacob', 7, 203, 1, 7),
('Enos', 1, 27, 0, 1),
('Jarom', 1, 15, 0, 1),
('Omni', 1, 30, 0, 1),
('Words of Mormon', 1, 18, 0, 1),
('Mosiah', 29, 785, 2, 31),
('Alma', 63, 1975, 10, 72),
('Helaman', 16, 497, 3, 18),
('3 Nephi', 30, 785, 2, 31),
('4 Nephi', 1, 49, 1, 1),
('Mormon', 9, 227, 0, 9),
('Ether', 15, 433, 0, 16),
('Moroni', 10, 163, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `Collection` varchar(22) DEFAULT NULL,
  `Books` bigint(20) DEFAULT NULL,
  `Chapters` bigint(20) DEFAULT NULL,
  `Verses` bigint(20) DEFAULT NULL,
  `Paragraphs` bigint(20) DEFAULT NULL,
  `Headings` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`Collection`, `Books`, `Chapters`, `Verses`, `Paragraphs`, `Headings`) VALUES
('Old Testament', 39, 929, 23145, 138, 929),
('New Testament', 27, 260, 7957, 15, 260),
('Book of Mormon', 15, 239, 6604, 23, 255),
('Doctrine and Covenants', 2, 140, 3654, 38, 276),
('Pearl of Great Price', 6, 19, 635, 40, 33);

-- --------------------------------------------------------

--
-- Table structure for table `doctrineandcovenants`
--

CREATE TABLE `doctrineandcovenants` (
  `Book` varchar(22) DEFAULT NULL,
  `Chapters` bigint(20) DEFAULT NULL,
  `Verses` bigint(20) DEFAULT NULL,
  `Paragraphs` bigint(20) DEFAULT NULL,
  `Headings` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctrineandcovenants`
--

INSERT INTO `doctrineandcovenants` (`Book`, `Chapters`, `Verses`, `Paragraphs`, `Headings`) VALUES
('Doctrine and Covenants', 138, 3654, 3, 274),
('Official Declarations', 2, 0, 35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `newtestament`
--

CREATE TABLE `newtestament` (
  `Book` varchar(15) DEFAULT NULL,
  `Chapters` bigint(20) DEFAULT NULL,
  `Verses` bigint(20) DEFAULT NULL,
  `Paragraphs` bigint(20) DEFAULT NULL,
  `Headings` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newtestament`
--

INSERT INTO `newtestament` (`Book`, `Chapters`, `Verses`, `Paragraphs`, `Headings`) VALUES
('Matthew', 28, 1071, 0, 28),
('Mark', 16, 678, 0, 16),
('Luke', 24, 1151, 0, 24),
('John', 21, 879, 0, 21),
('Acts', 28, 1007, 0, 28),
('Romans', 16, 433, 1, 16),
('1 Corinthians', 16, 437, 1, 16),
('2 Corinthians', 13, 257, 1, 13),
('Galatians', 6, 149, 1, 6),
('Ephesians', 6, 155, 1, 6),
('Philippians', 4, 104, 1, 4),
('Colossians', 4, 95, 1, 4),
('1 Thessalonians', 5, 89, 1, 5),
('2 Thessalonians', 3, 47, 1, 3),
('1 Timothy', 6, 113, 1, 6),
('2 Timothy', 4, 83, 1, 4),
('Titus', 3, 46, 1, 3),
('Philemon', 1, 25, 1, 1),
('Hebrews', 13, 303, 1, 13),
('James', 5, 108, 0, 5),
('1 Peter', 5, 105, 0, 5),
('2 Peter', 3, 61, 0, 3),
('1 John', 5, 105, 0, 5),
('2 John', 1, 13, 0, 1),
('3 John', 1, 14, 0, 1),
('Jude', 1, 25, 0, 1),
('Revelation', 22, 404, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `oldtestament`
--

CREATE TABLE `oldtestament` (
  `Book` varchar(15) DEFAULT NULL,
  `Chapters` bigint(20) DEFAULT NULL,
  `Verses` bigint(20) DEFAULT NULL,
  `Paragraphs` bigint(20) DEFAULT NULL,
  `Headings` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oldtestament`
--

INSERT INTO `oldtestament` (`Book`, `Chapters`, `Verses`, `Paragraphs`, `Headings`) VALUES
('Genesis', 50, 1533, 0, 50),
('Exodus', 40, 1213, 0, 40),
('Leviticus', 27, 859, 0, 27),
('Numbers', 36, 1288, 0, 36),
('Deuteronomy', 34, 959, 0, 34),
('Joshua', 24, 658, 0, 24),
('Judges', 21, 618, 0, 21),
('Ruth', 4, 85, 0, 4),
('1 Samuel', 31, 810, 0, 31),
('2 Samuel', 24, 695, 0, 24),
('1 Kings', 22, 816, 0, 22),
('2 Kings', 25, 719, 0, 25),
('1 Chronicles', 29, 942, 0, 29),
('2 Chronicles', 36, 822, 0, 36),
('Ezra', 10, 280, 0, 10),
('Nehemiah', 13, 406, 0, 13),
('Esther', 10, 167, 0, 10),
('Job', 42, 1070, 0, 42),
('Psalms', 150, 2461, 137, 150),
('Proverbs', 31, 915, 0, 31),
('Ecclesiastes', 12, 222, 0, 12),
('Song of Solomon', 8, 117, 0, 8),
('Isaiah', 66, 1292, 0, 66),
('Jeremiah', 52, 1364, 0, 52),
('Lamentations', 5, 154, 0, 5),
('Ezekiel', 48, 1273, 0, 48),
('Daniel', 12, 357, 0, 12),
('Hosea', 14, 197, 0, 14),
('Joel', 3, 73, 0, 3),
('Amos', 9, 146, 0, 9),
('Obadiah', 1, 21, 0, 1),
('Jonah', 4, 48, 0, 4),
('Micah', 7, 105, 0, 7),
('Nahum', 3, 47, 0, 3),
('Habakkuk', 3, 56, 0, 3),
('Zephaniah', 3, 53, 0, 3),
('Haggai', 2, 38, 0, 2),
('Zechariah', 14, 211, 0, 14),
('Malachi', 4, 55, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pearlofgreatprice`
--

CREATE TABLE `pearlofgreatprice` (
  `Book` varchar(20) DEFAULT NULL,
  `Chapters` bigint(20) DEFAULT NULL,
  `Verses` bigint(20) DEFAULT NULL,
  `Paragraphs` bigint(20) DEFAULT NULL,
  `Headings` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pearlofgreatprice`
--

INSERT INTO `pearlofgreatprice` (`Book`, `Chapters`, `Verses`, `Paragraphs`, `Headings`) VALUES
('Moses', 8, 356, 0, 17),
('Abraham', 5, 136, 0, 6),
('Abraham, Facsimiles', 3, 0, 32, 3),
('Joseph Smith—Matthew', 1, 55, 0, 2),
('Joseph Smith—History', 1, 75, 7, 5),
('Articles of Faith', 1, 13, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
