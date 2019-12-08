-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 02:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biolike_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `autorID` int(1) NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`autorID`, `ime`, `prezime`, `opis`, `slika`) VALUES
(1, 'Milan', 'Zlatanović', 'Sa zadovoljstvom vam predstavljam svoj poslednji sajt, rađen za zdravu hranu u kojoj sam zaposlen.', 'assets/img/autor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorijaID` int(2) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorijaID`, `naziv`) VALUES
(1, 'Semenke'),
(2, 'Kafa'),
(3, 'Kaše');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnikID` int(10) NOT NULL,
  `korIme` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ulogaID` int(10) NOT NULL,
  `ulogovan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnikID`, `korIme`, `email`, `lozinka`, `ulogaID`, `ulogovan`) VALUES
(4, 'admin123         ', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 1),
(10, 'laza123', 'laza123@gmail.com', '3b314730d716bfb436821e067e8be24b', 2, 0),
(11, 'pera123', 'pera123@gmail.com', '121ddb8c34bbdae223bfc474c86ea90c', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `linkovi`
--

CREATE TABLE `linkovi` (
  `linkID` int(3) NOT NULL,
  `link_naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `link_putanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkovi`
--

INSERT INTO `linkovi` (`linkID`, `link_naziv`, `link_putanja`) VALUES
(1, 'Početna', 'index.php?stranica=index'),
(2, 'Proizvodi', 'index.php?stranica=proizvodi&&strana=1'),
(4, 'Kontakt', 'index.php?stranica=kontakt'),
(5, 'Autor', 'index.php?stranica=autor');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE `porudzbine` (
  `porudzbinaID` int(100) NOT NULL,
  `korisnikID` int(10) NOT NULL,
  `ukupno` int(15) NOT NULL,
  `datum` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porudzbine`
--

INSERT INTO `porudzbine` (`porudzbinaID`, `korisnikID`, `ukupno`, `datum`) VALUES
(2, 4, 474, ''),
(3, 4, 474, ''),
(4, 4, 360, '14.06.2019 13:48:30'),
(5, 10, 1140, '14.06.2019 14:34:09'),
(6, 10, 114, '14.06.2019 14:35:09'),
(7, 10, 3880, '14.06.2019 15:21:38'),
(8, 4, 999, '14.06.2019 17:31:10'),
(9, 4, 417, '14.06.2019 19:21:17'),
(10, 4, 651, '15.06.2019 11:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvodID` int(10) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `kolicina` int(10) NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kategorijaID` int(2) NOT NULL,
  `merna_jedinica` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvodID`, `naziv`, `opis`, `cena`, `kolicina`, `slika`, `kategorijaID`, `merna_jedinica`) VALUES
(34, 'Ovsena kasa', '45g.', 57, 200, 'assets/img/proizvodi/1560091513ovsenaKasa.jpg', 3, 'kom.'),
(35, 'Kafa Grand 100g.', 'Grand kafa, Zemlja porekla Srbija', 120, 100, 'assets/img/proizvodi/1560376255grandKafa100g.jpg', 2, 'kom.'),
(36, 'Semenke bundeve', 'Bele semenke. Zemlja porekla: Ukrajina.', 479, 250, 'assets/img/proizvodi/1560508623beleSemenke.jpg', 1, 'kg.'),
(37, 'Suncokret \"Jaguar\"', 'Sareni suncokret, Zemlja porekla: Grcka.', 340, 120, 'assets/img/proizvodi/1560552898suncokret.png', 1, 'kg.');

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `slajderID` int(2) NOT NULL,
  `slajder_naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slajder_opis` text COLLATE utf8_unicode_ci NOT NULL,
  `kategorijaID` int(2) NOT NULL,
  `slajder_slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`slajderID`, `slajder_naziv`, `slajder_opis`, `kategorijaID`, `slajder_slika`) VALUES
(3, 'Semenke', 'Veliki izbor raznih semenki po veoma pristupacnim cenama.', 1, 'assets/img/proizvodi/semenkeSlajder.jpg'),
(4, 'Kafe', 'Veliki izbor kvalitetninh kafa po znatno nizim cenama.', 2, 'assets/img/proizvodi/kafaSlajder.jpg'),
(5, 'Kaše', 'Odaberite kašu po vašem ukusu i doprinesite svakodnevici zdrave i ukusne obroke.', 3, 'assets/img/proizvodi/ovsenaSlajder.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `ulogaID` int(10) NOT NULL,
  `ulogaNaziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`ulogaID`, `ulogaNaziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autorID`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`kategorijaID`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnikID`),
  ADD KEY `ulogaID` (`ulogaID`);

--
-- Indexes for table `linkovi`
--
ALTER TABLE `linkovi`
  ADD PRIMARY KEY (`linkID`);

--
-- Indexes for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD PRIMARY KEY (`porudzbinaID`),
  ADD KEY `korisnikID` (`korisnikID`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvodID`),
  ADD KEY `kategorijaID` (`kategorijaID`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
  ADD PRIMARY KEY (`slajderID`),
  ADD KEY `kategorijaID` (`kategorijaID`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`ulogaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `autorID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `kategorijaID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `korisnikID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `linkovi`
--
ALTER TABLE `linkovi`
  MODIFY `linkID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `porudzbine`
--
ALTER TABLE `porudzbine`
  MODIFY `porudzbinaID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvodID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `slajderID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `ulogaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`ulogaID`) REFERENCES `uloge` (`ulogaID`);

--
-- Constraints for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD CONSTRAINT `porudzbine_ibfk_1` FOREIGN KEY (`korisnikID`) REFERENCES `korisnici` (`korisnikID`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`kategorijaID`) REFERENCES `kategorije` (`kategorijaID`);

--
-- Constraints for table `slajder`
--
ALTER TABLE `slajder`
  ADD CONSTRAINT `slajder_ibfk_2` FOREIGN KEY (`kategorijaID`) REFERENCES `kategorije` (`kategorijaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
