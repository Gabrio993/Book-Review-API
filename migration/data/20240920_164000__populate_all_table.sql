-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 20, 2024 alle 16:40
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

--
-- Dump dei dati per la tabella `autore`
--

INSERT INTO `autore` (`id_autore`, `nome`, `cognome`, `data_nascita`) VALUES
(1, 'Giorgio', 'Scerbanenco', '1911-09-28'),
(2, 'Umberto', 'Eco', '1932-01-05'),
(3, 'Italo', 'Calvino', '1923-10-15'),
(4, 'Alberto', 'Moravia', '1907-11-28'),
(5, 'Cesare', 'Pavese', '1908-09-09');



--
-- Dump dei dati per la tabella `casa_editrice`
--

INSERT INTO `casa_editrice` (`id_casa_editrice`, `nome`, `anno_fondazione`, `paese`) VALUES
(1, 'Mondadori', 1907, 'Italia'),
(2, 'Einaudi', 1933, 'Italia'),
(3, 'Feltrinelli', 1954, 'Italia'),
(4, 'Rizzoli', 1927, 'Italia'),
(5, 'Bompiani', 1929, 'Italia');

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

--
-- Dump dei dati per la tabella `autori_libri`
--

INSERT INTO `autori_libri` (`id_autore`, `id_libro`) VALUES
(1, 1),
(1, 6),
(2, 2),
(3, 3),
(4, 4),
(5, 5);



--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `username`, `email`, `password`) VALUES
(1, 'utente1', 'utente1@example.com', 'password1'),
(2, 'utente2', 'utente2@example.com', 'password2'),
(3, 'utente3', 'utente3@example.com', 'password3'),
(4, 'utente4', 'utente4@example.com', 'password4'),
(5, 'utente5', 'utente5@example.com', 'password5');

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id_recensione`, `id_libro`, `id_utente`, `recensione`, `data`) VALUES
(1, 1, 1, 'Un libro avvincente e ben scritto', '0000-00-00'),
(2, 2, 2, 'Un classico della letteratura italiana', '0000-00-00'),
(3, 3, 3, 'Un libro difficile ma interessante', '0000-00-00'),
(4, 4, 4, 'Un libro che mi ha deluso', '0000-00-00'),
(5, 5, 5, 'Un libro che mi ha fatto riflettere', '0000-00-00'),
(6, 6, 1, 'Un libro che mi ha fatto venire voglia di leggere di più', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
