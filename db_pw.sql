-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2017 at 09:16 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pw`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_to` int(5) NOT NULL,
  `send_by` int(3) NOT NULL,
  `message` tinytext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`),
  KEY `sent_to` (`send_to`),
  KEY `send_by` (`send_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE IF NOT EXISTS `tbbarang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BARANG` varchar(50) NOT NULL,
  `SERIAL_NUMBER` varchar(50) NOT NULL,
  `STATUS` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`ID`, `BARANG`, `SERIAL_NUMBER`, `STATUS`) VALUES
(1, 'Proyektor Samsung', '8889124924712', 2),
(6, 'LCD Monitor Samsung', '8888127749124', 1),
(7, 'Speaker Sambada', '8888127742144', 1),
(8, 'Speaker Sambada', '2328931828391', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblevel`
--

CREATE TABLE IF NOT EXISTS `tblevel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblevel`
--

INSERT INTO `tblevel` (`ID`, `LEVEL`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Sarpra');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeminjaman`
--

CREATE TABLE IF NOT EXISTS `tbpeminjaman` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER` varchar(100) NOT NULL,
  `TGL_PEMINJAMAN` date NOT NULL,
  `TGL_PENGEMBALIAN` date NOT NULL,
  `VALIDASI` int(10) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `BARANG` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbpeminjaman`
--

INSERT INTO `tbpeminjaman` (`ID`, `USER`, `TGL_PEMINJAMAN`, `TGL_PENGEMBALIAN`, `VALIDASI`, `STATUS`, `BARANG`) VALUES
(1, 'xiirpl2', '2017-03-01', '0000-00-00', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpesan`
--

CREATE TABLE IF NOT EXISTS `tbpesan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SEND_TO` int(20) NOT NULL,
  `SEND_BY` int(20) NOT NULL,
  `MESSAGE` text NOT NULL,
  `SEND_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbstatus`
--

CREATE TABLE IF NOT EXISTS `tbstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbstatus`
--

INSERT INTO `tbstatus` (`ID`, `STATUS`) VALUES
(1, 'Tersedia'),
(2, 'Telah Dipinjam'),
(3, 'Belum Dikembalikan'),
(4, 'Telah Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `NOHP` varchar(50) NOT NULL,
  `NAMA_USER` varchar(50) NOT NULL,
  `LEVEL` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `NOHP`, `NAMA_USER`, `LEVEL`) VALUES
(1, 'admin', 'admin', 'admin@smktelkom-mlg.schid', '0341712500', 'Administrator', 1),
(2, 'xiirpl2', 'xiirpl2', 'bagasramadhani007@gmail.com', '081289612800', 'XII RPL 2', 2),
(3, 'sarpra', 'smktelkom', 'sarpra@smktelkom-mlg.sch.id', '081231212412', 'Bu Ifa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbvalidasi`
--

CREATE TABLE IF NOT EXISTS `tbvalidasi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VALIDASI` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbvalidasi`
--

INSERT INTO `tbvalidasi` (`ID`, `VALIDASI`) VALUES
(1, 'Menunggu Dikonfirmasi'),
(2, 'Permintaan Diterima'),
(3, 'Permintaan Ditolak'),
(4, 'DIkonfirmasi');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
--
CREATE TABLE IF NOT EXISTS `view_barang` (
`ID` int(11)
,`BARANG` varchar(50)
,`SERIAL_NUMBER` varchar(50)
,`STATUS` int(2)
,`NAMA_STATUS` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_peminjaman`
--
CREATE TABLE IF NOT EXISTS `view_peminjaman` (
`ID` int(11)
,`USER` varchar(100)
,`TGL_PEMINJAMAN` date
,`TGL_PENGEMBALIAN` date
,`VALIDASI` int(10)
,`STATUS` int(2)
,`BARANG` int(2)
,`NAMA_VALIDASI` varchar(50)
,`NAMA_STATUS` varchar(50)
,`NAMA_BARANG` varchar(50)
,`SERIAL_NUMBER` varchar(50)
,`USERNAME` varchar(50)
,`NAMA_USER` varchar(50)
,`ID_BARANG` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengajuan`
--
CREATE TABLE IF NOT EXISTS `view_pengajuan` (
`ID` int(11)
,`USER` varchar(100)
,`TGL_PEMINJAMAN` date
,`TGL_PENGEMBALIAN` date
,`VALIDASI` int(10)
,`STATUS` int(2)
,`BARANG` int(2)
,`NAMA_VALIDASI` varchar(50)
,`NAMA_STATUS` varchar(50)
,`NAMA_BARANG` varchar(50)
,`SERIAL_NUMBER` varchar(50)
,`USERNAME` varchar(50)
,`NAMA_USER` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
--
CREATE TABLE IF NOT EXISTS `view_user` (
`NAMA_LEVEL` varchar(50)
,`USERNAME` varchar(50)
,`PASSWORD` varchar(50)
,`EMAIL` varchar(50)
,`NOHP` varchar(50)
,`NAMA_USER` varchar(50)
,`LEVEL` int(2)
,`ID` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang` AS select `tbbarang`.`ID` AS `ID`,`tbbarang`.`BARANG` AS `BARANG`,`tbbarang`.`SERIAL_NUMBER` AS `SERIAL_NUMBER`,`tbbarang`.`STATUS` AS `STATUS`,`tbstatus`.`STATUS` AS `NAMA_STATUS` from (`tbbarang` join `tbstatus` on((`tbstatus`.`ID` = `tbbarang`.`STATUS`)));

-- --------------------------------------------------------

--
-- Structure for view `view_peminjaman`
--
DROP TABLE IF EXISTS `view_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_peminjaman` AS select `tbpeminjaman`.`ID` AS `ID`,`tbpeminjaman`.`USER` AS `USER`,`tbpeminjaman`.`TGL_PEMINJAMAN` AS `TGL_PEMINJAMAN`,`tbpeminjaman`.`TGL_PENGEMBALIAN` AS `TGL_PENGEMBALIAN`,`tbpeminjaman`.`VALIDASI` AS `VALIDASI`,`tbpeminjaman`.`STATUS` AS `STATUS`,`tbpeminjaman`.`BARANG` AS `BARANG`,`tbvalidasi`.`VALIDASI` AS `NAMA_VALIDASI`,`tbstatus`.`STATUS` AS `NAMA_STATUS`,`tbbarang`.`BARANG` AS `NAMA_BARANG`,`tbbarang`.`SERIAL_NUMBER` AS `SERIAL_NUMBER`,`tbuser`.`USERNAME` AS `USERNAME`,`tbuser`.`NAMA_USER` AS `NAMA_USER`,`tbbarang`.`ID` AS `ID_BARANG` from ((((`tbpeminjaman` join `tbvalidasi` on((`tbvalidasi`.`ID` = `tbpeminjaman`.`VALIDASI`))) join `tbstatus` on((`tbstatus`.`ID` = `tbpeminjaman`.`STATUS`))) join `tbbarang` on((`tbbarang`.`ID` = `tbpeminjaman`.`BARANG`))) join `tbuser` on((`tbuser`.`USERNAME` = `tbpeminjaman`.`USER`)));

-- --------------------------------------------------------

--
-- Structure for view `view_pengajuan`
--
DROP TABLE IF EXISTS `view_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengajuan` AS select `tbpeminjaman`.`ID` AS `ID`,`tbpeminjaman`.`USER` AS `USER`,`tbpeminjaman`.`TGL_PEMINJAMAN` AS `TGL_PEMINJAMAN`,`tbpeminjaman`.`TGL_PENGEMBALIAN` AS `TGL_PENGEMBALIAN`,`tbpeminjaman`.`VALIDASI` AS `VALIDASI`,`tbpeminjaman`.`STATUS` AS `STATUS`,`tbpeminjaman`.`BARANG` AS `BARANG`,`tbvalidasi`.`VALIDASI` AS `NAMA_VALIDASI`,`tbstatus`.`STATUS` AS `NAMA_STATUS`,`tbbarang`.`BARANG` AS `NAMA_BARANG`,`tbbarang`.`SERIAL_NUMBER` AS `SERIAL_NUMBER`,`tbuser`.`USERNAME` AS `USERNAME`,`tbuser`.`NAMA_USER` AS `NAMA_USER` from ((((`tbpeminjaman` join `tbvalidasi` on((`tbvalidasi`.`ID` = `tbpeminjaman`.`VALIDASI`))) join `tbstatus` on((`tbstatus`.`ID` = `tbpeminjaman`.`STATUS`))) join `tbbarang` on((`tbbarang`.`ID` = `tbpeminjaman`.`BARANG`))) join `tbuser` on((`tbuser`.`USERNAME` = `tbpeminjaman`.`USER`)));

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `tblevel`.`LEVEL` AS `NAMA_LEVEL`,`tbuser`.`USERNAME` AS `USERNAME`,`tbuser`.`PASSWORD` AS `PASSWORD`,`tbuser`.`EMAIL` AS `EMAIL`,`tbuser`.`NOHP` AS `NOHP`,`tbuser`.`NAMA_USER` AS `NAMA_USER`,`tbuser`.`LEVEL` AS `LEVEL`,`tbuser`.`ID` AS `ID` from (`tbuser` join `tblevel` on((`tblevel`.`ID` = `tbuser`.`LEVEL`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`send_by`) REFERENCES `tbuser` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
