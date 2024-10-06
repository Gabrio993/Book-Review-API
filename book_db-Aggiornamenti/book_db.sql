-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 27, 2024 alle 12:35
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

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

--
-- Dump dei dati per la tabella `autore`
--

INSERT INTO `autore` (`id_autore`, `nome`, `cognome`, `data_nascita`) VALUES
(1, 'Giorgio', 'Scerbanenco', '1911-09-28'),
(2, 'Umberto', 'Eco', '1932-01-05'),
(3, 'Italo', 'Calvino', '1923-10-15'),
(4, 'Alberto', 'Moravia', '1907-11-28'),
(5, 'Cesare', 'Pavese', '1908-09-09');

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

--
-- Dump dei dati per la tabella `casa_editrice`
--

INSERT INTO `casa_editrice` (`id_casa_editrice`, `nome`, `anno_fondazione`, `paese`) VALUES
(1, 'Mondadori', 1907, 'Italia'),
(2, 'Einaudi', 1933, 'Italia'),
(3, 'Feltrinelli', 1954, 'Italia'),
(4, 'Rizzoli', 1927, 'Italia'),
(5, 'Bompiani', 1929, 'Italia');

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

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`id_libro`, `isbn`, `titolo`, `id_autore`, `anno_pubblicazione`, `genere`, `id_casa_editrice`) VALUES
(1, NULL, 'Il gioco dei potenti', 1, NULL, NULL, 1),
(2, NULL, 'Il nome della rosa', 2, NULL, NULL, 2),
(3, NULL, 'Il barone rampante', 3, NULL, NULL, 3),
(4, NULL, 'Gli indifferenti', 4, NULL, NULL, 4),
(5, NULL, 'La luna e i falò', 5, NULL, NULL, 4),
(6, NULL, 'Il sentiero dei nidi di ragno', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id_recensione` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `recensione` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `commento` text DEFAULT NULL,
  `valutazione` tinyint(4) DEFAULT NULL,
  `nome_utente` varchar(255) DEFAULT NULL,
  `data_creazione` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id_recensione`, `id_libro`, `id_utente`, `recensione`, `data`, `commento`, `valutazione`, `nome_utente`, `data_creazione`) VALUES
(1, 1, 1, 'Un libro avvincente e ben scritto', '0000-00-00', 'Nuovo commento', 4, 'NomeUtente', '2024-09-27 12:31:06'),
(3, 3, 3, 'Un libro difficile ma interessante', '0000-00-00', 'Recensione modificata 3', 4, 'Nome Utente 3', '2023-02-20 00:00:00'),
(4, 4, 4, 'Un libro che mi ha deluso', '0000-00-00', NULL, NULL, NULL, NULL),
(5, 5, 5, 'Un libro che mi ha fatto riflettere', '0000-00-00', NULL, NULL, NULL, NULL),
(6, 6, 1, 'Un libro che mi ha fatto venire voglia di leggere di più', '0000-00-00', NULL, NULL, NULL, NULL);

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
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `username`, `email`, `password`) VALUES
(1, 'utente1', 'utente1@example.com', 'password1'),
(3, 'utente3', 'utente3@example.com', 'password3'),
(4, 'utente4', 'utente4@example.com', 'password4'),
(5, 'utente5', 'utente5@example.com', 'password5');

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
  MODIFY `id_autore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `casa_editrice`
--
ALTER TABLE `casa_editrice`
  MODIFY `id_casa_editrice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id_recensione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
