-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Sie 2020, 00:38
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `budzet`
--
CREATE DATABASE IF NOT EXISTS `budzet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `budzet`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses`
--

CREATE TABLE `expenses` (
  `id_expense` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `id_expense_category` int(11) NOT NULL,
  `amount_of_money` float(8,2) NOT NULL,
  `description` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expenses`
--

INSERT INTO `expenses` (`id_expense`, `expense_date`, `id_expense_category`, `amount_of_money`, `description`) VALUES
(1, '2020-01-15', 1, 100.00, 'Kolacja z żoną'),
(2, '2020-01-25', 2, 170.31, 'Czynsz'),
(3, '2020-01-18', 3, 120.00, 'Bilet miesięczny'),
(4, '2020-01-31', 4, 30.00, 'Internet'),
(5, '2020-01-26', 5, 500.00, 'Garnitur ślubny'),
(6, '2020-01-27', 5, 600.00, 'Garnitur czarny'),
(7, '2020-01-01', 1, 100.18, 'Muzyka'),
(8, '2000-12-12', 1, 100.41, 'Frytki'),
(9, '2020-01-19', 3, 50.00, 'Paliwo'),
(10, '2020-08-27', 2, 500.00, 'Coś za mało'),
(11, '2020-08-27', 1, 1000.99, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses_category`
--

CREATE TABLE `expenses_category` (
  `id_expense_category` int(11) NOT NULL,
  `expense_category` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expenses_category`
--

INSERT INTO `expenses_category` (`id_expense_category`, `expense_category`) VALUES
(1, 'Jedzenie'),
(2, 'Mieszkanie'),
(3, 'Transport'),
(4, 'Telekomunikacja'),
(5, 'Ubranie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes`
--

CREATE TABLE `incomes` (
  `id_income` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `id_income_category` int(11) NOT NULL,
  `amount_of_money` float(8,2) NOT NULL,
  `description` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `incomes`
--

INSERT INTO `incomes` (`id_income`, `income_date`, `id_income_category`, `amount_of_money`, `description`) VALUES
(1, '2020-01-25', 1, 1000.00, 'Perfecta'),
(2, '2020-01-18', 1, 4000.00, 'Roba Metals'),
(3, '2020-01-31', 2, 30.00, 'Milenium Bank');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes_category`
--

CREATE TABLE `incomes_category` (
  `id_income_category` int(11) NOT NULL,
  `income_category` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `incomes_category`
--

INSERT INTO `incomes_category` (`id_income_category`, `income_category`) VALUES
(1, 'Wynagrodzenie'),
(2, 'Odsetki bankowe'),
(3, 'Sprzedaż na allegro');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_polish_ci DEFAULT NULL,
  `surname` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `name`, `surname`, `password`) VALUES
(1, 'jas_kowalski@gmail.com', 'Jan', 'Kowalski', '$2y$10$HQkWP9fnH3U7R7S7nXGkI.HK9K4JEpZzBh1h7HaoAvyBjbO71x2OO'),
(2, 'ala_nowak@interia.pl', 'Alicja', 'Nowak', '$2y$10$pXzADC7fblMRU6JGD5oxduxB4NMNyPYmY7zvsnXh2HRNqq3bwlnMi'),
(10, 'takwinata@rcc.pl', 'Tomasz', 'zAkwinu', '$2y$10$LuEqissCQIlO9Kw6M0tswuWGTjxSvQAbl1hnwZE6yth.Vu5HCVLZy'),
(14, 'das@asa.pl', 'vxc', 'fas', '$2y$10$f.fY6IdRysQLXgEBwqoosepjSPOMFv.g1uQ2CRDmaowTQmIG0NDka'),
(15, 'mati.nowak321@gmail.com', 'vxc', 'fas', '$2y$10$k80RGNqYk84M8pDupqYh/uwrDz5KT0upE0wvL3VnNX4yBAVoYlP7.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_expenses`
--

CREATE TABLE `users_expenses` (
  `id_user` int(11) NOT NULL,
  `id_expense` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users_expenses`
--

INSERT INTO `users_expenses` (`id_user`, `id_expense`, `quantity`) VALUES
(1, 1, 1),
(1, 3, 1),
(1, 5, 1),
(1, 6, 4),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(2, 2, 4),
(2, 3, 2),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_incomes`
--

CREATE TABLE `users_incomes` (
  `id_user` int(11) NOT NULL,
  `id_income` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users_incomes`
--

INSERT INTO `users_incomes` (`id_user`, `id_income`, `quantity`) VALUES
(1, 2, 3),
(1, 3, 2),
(2, 1, 4);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id_expense`),
  ADD KEY `FK_expenses_category` (`id_expense_category`);

--
-- Indeksy dla tabeli `expenses_category`
--
ALTER TABLE `expenses_category`
  ADD PRIMARY KEY (`id_expense_category`);

--
-- Indeksy dla tabeli `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id_income`),
  ADD KEY `FK_incomes_category` (`id_income_category`);

--
-- Indeksy dla tabeli `incomes_category`
--
ALTER TABLE `incomes_category`
  ADD PRIMARY KEY (`id_income_category`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeksy dla tabeli `users_expenses`
--
ALTER TABLE `users_expenses`
  ADD PRIMARY KEY (`id_user`,`id_expense`),
  ADD KEY `FK_expenses` (`id_expense`);

--
-- Indeksy dla tabeli `users_incomes`
--
ALTER TABLE `users_incomes`
  ADD PRIMARY KEY (`id_user`,`id_income`),
  ADD KEY `FK_incomes` (`id_income`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id_expense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `expenses_category`
--
ALTER TABLE `expenses_category`
  MODIFY `id_expense_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id_income` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `incomes_category`
--
ALTER TABLE `incomes_category`
  MODIFY `id_income_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `FK_expenses_category` FOREIGN KEY (`id_expense_category`) REFERENCES `expenses_category` (`id_expense_category`);

--
-- Ograniczenia dla tabeli `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `FK_incomes_category` FOREIGN KEY (`id_income_category`) REFERENCES `incomes_category` (`id_income_category`);

--
-- Ograniczenia dla tabeli `users_expenses`
--
ALTER TABLE `users_expenses`
  ADD CONSTRAINT `FK_expenses` FOREIGN KEY (`id_expense`) REFERENCES `expenses` (`id_expense`),
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ograniczenia dla tabeli `users_incomes`
--
ALTER TABLE `users_incomes`
  ADD CONSTRAINT `FK_incomes` FOREIGN KEY (`id_income`) REFERENCES `incomes` (`id_income`),
  ADD CONSTRAINT `FK_users_incomes` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
