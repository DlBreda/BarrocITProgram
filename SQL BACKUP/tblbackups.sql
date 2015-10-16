-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Gegenereerd op: 12 okt 2015 om 09:48
-- Serverversie: 5.5.42
-- PHP-versie: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_appointments`
--

CREATE TABLE `tbl_appointments` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `projectID` int(11) DEFAULT NULL,
  `appointmentDate` datetime NOT NULL,
  `appointmentMadeAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `postalZip` varchar(10) NOT NULL,
  `adress2` varchar(50) NOT NULL,
  `postalZip2` varchar(50) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `insertion` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `faxNumber` varchar(20) DEFAULT NULL,
  `emailAdress` varchar(50) NOT NULL,
  `potentionalCustomer` tinyint(1) NOT NULL,
  `creditWorthy` tinyint(1) NOT NULL,
  `bankAccountNumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_invoices`
--

CREATE TABLE `tbl_invoices` (
  `id` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `paid` datetime DEFAULT NULL,
  `sent` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `projectFinish` datetime DEFAULT NULL,
  `projectPrice` decimal(20,0) NOT NULL,
  `operatingSystem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Admin', 'Admin', 'admin@barrocit.nl'),
(2, 'Sales', 'Sales', 'sales@barrocit.nl'),
(3, 'Finance', 'Finance', 'finance@barrocit.nl'),
(4, 'Development', 'Development', 'development@barrocit.nl');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customerID_UNIQUE` (`customerID`),
  ADD KEY `projectID_idx` (`projectID`);

--
-- Indexen voor tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectID_idx` (`projectID`);

--
-- Indexen voor tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customerID_UNIQUE` (`customerID`);

--
-- Indexen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `tbl_customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projectID` FOREIGN KEY (`projectID`) REFERENCES `tbl_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD CONSTRAINT `tbl_invoices_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `tbl_projects` (`id`);

--
-- Beperkingen voor tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD CONSTRAINT `projects_customers_relation` FOREIGN KEY (`customerID`) REFERENCES `tbl_customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;