-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Sie 2020, 00:59
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `budzet`
--

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_expenses`
--

CREATE TABLE `users_expenses` (
  `id_user` int(11) NOT NULL,
  `id_expense` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
  MODIFY `id_expense` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `expenses_category`
--
ALTER TABLE `expenses_category`
  MODIFY `id_expense_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id_income` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `incomes_category`
--
ALTER TABLE `incomes_category`
  MODIFY `id_income_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
