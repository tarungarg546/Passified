-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2015 at 02:26 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uidai`
--

-- --------------------------------------------------------

--
-- Table structure for table `busdb`
--

CREATE TABLE IF NOT EXISTS `busdb` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busdb`
--

INSERT INTO `busdb` (`name`, `password`) VALUES
('Faridabad', 'fbd'),
('Hodal', 'Hodal');

-- --------------------------------------------------------

--
-- Table structure for table `collegedb`
--

CREATE TABLE IF NOT EXISTS `collegedb` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collegedb`
--

INSERT INTO `collegedb` (`name`, `password`) VALUES
('YMCA,Faridabad', 'ymcaust'),
('DAV College,Faridabad', 'davcollege');

-- --------------------------------------------------------

--
-- Table structure for table `shareddb`
--

CREATE TABLE IF NOT EXISTS `shareddb` (
  `UIDAI` varchar(16) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` mediumtext NOT NULL,
  `College` varchar(1000) NOT NULL,
  `yoe` int(11) NOT NULL,
  `yop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shareddb`
--

INSERT INTO `shareddb` (`UIDAI`, `Name`, `Address`, `College`, `yoe`, `yop`) VALUES
('636684563336', 'Tarun', 'S/O:Puran Chand,House No. DD-48,ward no. 4,behind I.S. memorial school,kunj bihar colony,Hodal,Hodal,Palwal,Hodal,Haryana,121106', 'YMCAUST,Faridabad', 2012, 2016),
('731989743250', 'Sushma Rani Garg', 'W/O:Puran Chand,House No. DD-48,ward no. 4,behind I.S. memorial school,kunj bihar colony,Hodal,Hodal,Palwal,Hodal,Haryana,121106', 'YMCAUST,Faridabad', 2013, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `transportdb`
--

CREATE TABLE IF NOT EXISTS `transportdb` (
  `UIDAI` varchar(16) NOT NULL,
  `StartingDate` varchar(20) NOT NULL,
  `EndingDate` varchar(20) NOT NULL,
  `CurrentAddress` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportdb`
--

INSERT INTO `transportdb` (`UIDAI`, `StartingDate`, `EndingDate`, `CurrentAddress`) VALUES
('636684563336', '2014-06', '2015-10', 'S/O:Puran Chand,House No. DD-48,ward no. 4,behind I.S. memorial school,kunj bihar colony,Hodal,Hodal,Palwal,Hodal,Haryana,121106');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
