-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 20, 2024 alle 16:38
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `autore`
--

CREATE TABLE `autore` (
  `id_autore` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `autori_libri`
--

CREATE TABLE `autori_libri` (
  `id_autore` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `casa_editrice`
--

CREATE TABLE `casa_editrice` (
  `id_casa_editrice` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `anno_fondazione` int(4) DEFAULT NULL,
  `paese` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `isbn` bigint(13) DEFAULT NULL,
  `titolo` varchar(255) DEFAULT NULL,
  `id_autore` int(11) DEFAULT NULL,
  `anno_pubblicazione` int(4) DEFAULT NULL,
  `genere` varchar(255) DEFAULT NULL,
  `id_casa_editrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id_recensione` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `recensione` text DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `autore`
--
ALTER TABLE `autore`
  ADD PRIMARY KEY (`id_autore`);

--
-- Indici per le tabelle `autori_libri`
--
ALTER TABLE `autori_libri`
  ADD PRIMARY KEY (`id_autore`,`id_libro`),
  ADD KEY `fk_id_libro` (`id_libro`);

--
-- Indici per le tabelle `casa_editrice`
--
ALTER TABLE `casa_editrice`
  ADD PRIMARY KEY (`id_casa_editrice`);

--
-- Indici per le tabelle `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autore` (`id_autore`),
  ADD KEY `id_casa_editrice` (`id_casa_editrice`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id_recensione`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `autore`
--
ALTER TABLE `autore`
  MODIFY `id_autore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `casa_editrice`
--
ALTER TABLE `casa_editrice`
  MODIFY `id_casa_editrice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id_recensione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `autori_libri`
--
ALTER TABLE `autori_libri`
  ADD CONSTRAINT `fk_id_autore` FOREIGN KEY (`id_autore`) REFERENCES `autore` (`id_autore`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE;

--
-- Limiti per la tabella `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libri_ibfk_1` FOREIGN KEY (`id_autore`) REFERENCES `autore` (`id_autore`) ON DELETE CASCADE,
  ADD CONSTRAINT `libri_ibfk_2` FOREIGN KEY (`id_casa_editrice`) REFERENCES `casa_editrice` (`id_casa_editrice`) ON DELETE SET NULL;

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `recensioni_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE,
  ADD CONSTRAINT `recensioni_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
