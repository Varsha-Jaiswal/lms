-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 05:17 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `ad_id` int(11) NOT NULL,
  `ad_fname` varchar(200) NOT NULL,
  `ad_lname` varchar(200) NOT NULL,
  `ad_email` varchar(200) NOT NULL,
  `ad_password` varchar(150) NOT NULL,
  `ad_avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_password`, `ad_avatar`) VALUES
(152, 'Vrijraj', 'Singh', 'vrijraj2396@gmail.com', '6f6e9eb4612166099090c8747cc8aaaa', 'http://bootdey.com/img/Content/avatar/avatar2.png');

-- --------------------------------------------------------

--
-- Table structure for table `author_data`
--

CREATE TABLE `author_data` (
  `AUTHOR_ID` int(11) NOT NULL,
  `AUTHOR_NAME` varchar(200) NOT NULL,
  `AUTHOR_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_data`
--

INSERT INTO `author_data` (`AUTHOR_ID`, `AUTHOR_NAME`, `AUTHOR_TIME`) VALUES
(80000, 'Yashavant Kanetkar', '2016-06-25 15:36:44'),
(80001, 'HC Varma', '2016-06-25 15:36:44'),
(80006, 'RK Jain', '2016-06-26 09:09:24'),
(80007, 'Ajay Gatak', '2016-06-26 09:10:26'),
(80008, 'Thomas H. Cormen ', '2016-06-26 09:14:39'),
(80009, ' John E. Hopcroft ', '2016-06-26 09:20:09'),
(80010, 'Shawn Hedman ', '2016-06-26 09:21:20'),
(80011, 'Tom DeMarco ', '2016-06-26 09:22:46'),
(80012, 'Michael J. Folk ', '2016-06-26 09:23:49'),
(80013, 'Martin D. Davis ', '2016-06-26 09:26:07'),
(80014, 'S. Barry Cooper ', '2016-06-26 09:27:13'),
(80015, 'Harry R. Lewis ', '2016-06-26 09:28:12'),
(80016, 'Scott Chacon ', '2016-06-26 09:29:15'),
(80017, 'Gerard J. Holzmann ', '2016-06-26 09:30:28'),
(80018, 'Ian Stewart ', '2016-06-26 09:31:29'),
(80019, 'Steven H. Strogatz ', '2016-06-26 09:32:13'),
(80020, 'Jon Kleinberg ', '2016-06-26 09:56:05'),
(80021, 'Brian W. Kernighan ', '2016-06-26 10:06:44'),
(80022, 'Bernd Heinrich ', '2016-06-26 10:08:45'),
(80023, 'Roger Penrose ', '2016-06-26 10:11:31'),
(80024, 'Michael Kaplan ', '2016-06-26 10:15:31'),
(80025, 'David S. Richeson', '2016-06-26 10:17:11'),
(80027, 'BP SINGH', '2016-07-13 12:43:21'),
(80028, 'Stephen Hawking', '2016-07-13 15:02:30'),
(80029, 'Michio Kaku', '2016-07-13 15:05:44'),
(80030, 'Brian Cox ', '2016-07-13 15:07:35'),
(80031, 'David Halliday ', '2016-07-13 15:09:25'),
(80032, 'Carl B. Boyer', '2016-07-13 15:11:08'),
(80033, 'Stanislas Dehaene', '2016-07-13 15:12:30'),
(80034, 'Paul Hoffman', '2016-07-13 15:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `book_cat`
--

CREATE TABLE `book_cat` (
  `BC_ID` int(11) NOT NULL,
  `BC_NAME` varchar(200) NOT NULL,
  `BC_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_cat`
--

INSERT INTO `book_cat` (`BC_ID`, `BC_NAME`, `BC_TIME`) VALUES
(5001, 'Physics', '2016-06-25 15:32:43'),
(5002, 'Maths', '2016-06-25 15:32:43'),
(5004, 'Engineering', '2016-06-25 15:32:43'),
(5005, 'History', '2016-06-28 06:09:34'),
(5008, 'Art', '2016-07-13 09:48:44'),
(5011, 'Games', '2016-07-13 09:52:38'),
(5014, 'Musics', '2016-07-13 14:59:35'),
(5015, 'Biography ', '2016-07-13 15:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `book_data`
--

CREATE TABLE `book_data` (
  `B_ID` int(11) NOT NULL,
  `B_NAME` varchar(250) NOT NULL,
  `BC_ID` int(11) NOT NULL,
  `B_ISBN` int(10) NOT NULL,
  `B_EDITION` int(2) NOT NULL,
  `AUTHOR_ID` int(11) NOT NULL,
  `B_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `B_STAUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_data`
--

INSERT INTO `book_data` (`B_ID`, `B_NAME`, `BC_ID`, `B_ISBN`, `B_EDITION`, `AUTHOR_ID`, `B_TIME`, `B_STAUS`) VALUES
(120001, 'Engineering Physics', 5004, 8245165, 1, 80000, '2016-06-25 15:41:32', 0),
(120016, 'Introduction to Algorithms ', 5004, 545545, 1, 80008, '2016-06-26 09:15:09', 1),
(120017, 'Engineering Mathametics', 5004, 5465415, 1, 80006, '2016-06-26 09:16:30', 0),
(120018, 'Let Us C', 5004, 5645, 1, 80000, '2016-06-26 09:18:15', 1),
(120019, 'Let Us C++', 5004, 2565, 1, 80000, '2016-06-26 09:18:47', 0),
(120020, 'Introduction to Automata Theory, Languages, and Computation ', 5004, 52, 3, 80009, '2016-06-26 09:20:38', 1),
(120021, 'An Introduction to Model Theory, Proof Theory, Computability, and Complexity ', 5004, 65265, 2, 80010, '2016-06-26 09:22:10', 0),
(120022, 'Waltzing with Bears: Managing Risk on Software Projects ', 5004, 541, 1, 80011, '2016-06-26 09:23:12', 1),
(120023, 'File Structures: An Object-Oriented Approach with C++ ', 5004, 8562, 2, 80012, '2016-06-26 09:24:09', 0),
(120024, 'Computability and Unsolvability ', 5004, 965, 1, 80013, '2016-06-26 09:26:35', 1),
(120025, 'Computability Theory ', 5004, 521, 3, 80014, '2016-06-26 09:27:37', 0),
(120026, 'Elements of the Theory of Computation ', 5004, 52, 3, 80015, '2016-06-26 09:28:46', 1),
(120028, 'Design and Validation of Computer Protocols ', 5004, 5241, 1, 80017, '2016-06-26 09:30:49', 0),
(120029, 'Does God Play Dice?: The New Mathematics of Chaos ', 5004, 1525, 1, 80018, '2016-06-26 09:31:50', 1),
(120030, 'Optics', 5001, 1234, 1, 80007, '2016-07-12 06:36:26', 1),
(120031, 'Dynamic Optics', 5001, 15, 324, 80007, '2016-07-12 06:37:00', 0),
(120035, 'HISTORY INDIA', 5005, 123, 1, 80027, '2016-07-13 12:43:53', 1),
(120036, 'A Brief History of Time', 5015, 1242, 1, 80028, '2016-07-13 15:03:39', 1),
(120037, 'The Grand Design', 5015, 12521, 1, 80028, '2016-07-13 15:04:14', 1),
(120038, 'The Universe in a Nutshell', 5001, 12462, 1, 80028, '2016-07-13 15:05:15', 1),
(120039, 'Hyperspace', 5001, 4522, 1, 80029, '2016-07-13 15:06:25', 1),
(120040, 'Why Does E=mcÂ²? ', 5001, 12514, 1, 80030, '2016-07-13 15:08:06', 1),
(120041, 'Fundamentals of Physics', 5001, 53214, 1, 80031, '2016-07-13 15:09:53', 1),
(120042, 'A History of Mathematics,', 5002, 8532, 1, 80032, '2016-07-13 15:11:28', 1),
(120043, 'The Number Sense', 5002, 1252, 1, 80033, '2016-07-13 15:13:06', 1),
(120044, 'The Man Who Loved Only Numbers', 5002, 1253, 1, 80034, '2016-07-13 15:15:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue_data`
--

CREATE TABLE `issue_data` (
  `ISSUE_ID` int(11) NOT NULL,
  `BOOK_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ISSUE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_data`
--

INSERT INTO `issue_data` (`ISSUE_ID`, `BOOK_ID`, `USER_ID`, `ISSUE_TIME`) VALUES
(12365, 120023, 11413036, '2016-07-10 11:23:32'),
(12374, 120019, 11413038, '2016-07-13 12:51:27'),
(12375, 120017, 11413048, '2016-07-13 14:19:16'),
(12376, 120001, 11413096, '2016-07-13 14:20:12'),
(12377, 120028, 11413078, '2016-07-13 14:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `author_data`
--
ALTER TABLE `author_data`
  ADD PRIMARY KEY (`AUTHOR_ID`);

--
-- Indexes for table `book_cat`
--
ALTER TABLE `book_cat`
  ADD PRIMARY KEY (`BC_ID`),
  ADD UNIQUE KEY `BC_NAME` (`BC_NAME`);

--
-- Indexes for table `book_data`
--
ALTER TABLE `book_data`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `BC_ID` (`BC_ID`),
  ADD KEY `AUTHOR_ID` (`AUTHOR_ID`);

--
-- Indexes for table `issue_data`
--
ALTER TABLE `issue_data`
  ADD PRIMARY KEY (`ISSUE_ID`),
  ADD KEY `BOOK_ID` (`BOOK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `author_data`
--
ALTER TABLE `author_data`
  MODIFY `AUTHOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80035;
--
-- AUTO_INCREMENT for table `book_cat`
--
ALTER TABLE `book_cat`
  MODIFY `BC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5016;
--
-- AUTO_INCREMENT for table `book_data`
--
ALTER TABLE `book_data`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120045;
--
-- AUTO_INCREMENT for table `issue_data`
--
ALTER TABLE `issue_data`
  MODIFY `ISSUE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12378;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_data`
--
ALTER TABLE `book_data`
  ADD CONSTRAINT `book_data_ibfk_1` FOREIGN KEY (`BC_ID`) REFERENCES `book_cat` (`BC_ID`),
  ADD CONSTRAINT `book_data_ibfk_2` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `author_data` (`AUTHOR_ID`);

--
-- Constraints for table `issue_data`
--
ALTER TABLE `issue_data`
  ADD CONSTRAINT `issue_data_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `book_data` (`B_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
