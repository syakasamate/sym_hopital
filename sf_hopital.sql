-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2019 at 08:35 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sf_hopital`
--

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `matricule` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenais` date NOT NULL,
  `nb_med` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id`, `service_id`, `matricule`, `prenom`, `nom`, `datenais`, `nb_med`, `telephone`) VALUES
(1, 2, 'ca', 'samate', 'ka', '2019-12-19', '00001', '789451232');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `libelle`) VALUES
(1, 'pediatrie1'),
(2, 'cardiologie'),
(4, 'odonthologie');

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialite`
--

INSERT INTO `specialite` (`id`, `service_id`, `libelle`) VALUES
(1, 1, 'cardiologue'),
(2, 2, 'dentaire'),
(3, 2, 'ormologie');

-- --------------------------------------------------------

--
-- Table structure for table `specialite_medecin`
--

CREATE TABLE `specialite_medecin` (
  `specialite_id` int(11) NOT NULL,
  `medecin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialite_medecin`
--

INSERT INTO `specialite_medecin` (`specialite_id`, `medecin_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `username`) VALUES
(1, 'sssss', '$2y$13$Y6gWi9Ya9anuT2CGGT7J6.CpiELdCP1k2defFNhXM0JpyZ8cMC0aS', ''),
(2, 'mmmmm', '$2y$13$RuYDEWTVmPSnculpoPxYuOfCOwZNvCmk6rahAqvxItyLbHxtxziqO', 'mmm'),
(3, 'saliou@gmail.com', '$2y$13$LTabfE8rotqILBqzgfKdCuldUMuH705dwyVRsEnOpMk3P7.UQHAj2', 'mmm'),
(5, 'fatou@gmail.com', '$2y$13$K/9IUJakUDONorLHdNKDB.0xcpv.0S4oCA/.wEaH.G8vXbciY0L7m', 'fatou'),
(6, 'sidya@gmail.com', '$2y$13$20/PDmPhxW9XnvXwRRxoi.BDL6Qbu9Us2P1U.wW7cge4eHi3cq7Nm', 'sidya'),
(7, 'saliou1@gmail.com', '$2y$13$73NaJwqeWkE/aeH5B73a5OuGkPH9ELq0lsnP5cUEfP/8Ep/rjVvRa', 'amadou'),
(8, 'syaka@gmail.com', '$2y$13$CqKW1VVyCWRyuZ4oX9uou.PCj/hN8YKJ8d0j8Sngt.VDNR1jm0zdW', 'syaka'),
(9, 'amadou@gmail.com', '$2y$13$bsProwiWNMq48ctabtOzdu618GGVWVZ4GB3LIe6pj9AinmbIsKDKm', 'amadou');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `eamil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `eamil`, `username`, `password`) VALUES
(1, 'samate@gmail.com', 'syakasamate', 'samate199'),
(2, 'ba@gmail.com', 'fatou', 'fatou1997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1BDA53C6ED5CA9E6` (`service_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E7D6FCC1ED5CA9E6` (`service_id`);

--
-- Indexes for table `specialite_medecin`
--
ALTER TABLE `specialite_medecin`
  ADD PRIMARY KEY (`specialite_id`,`medecin_id`),
  ADD KEY `IDX_24D341422195E0F0` (`specialite_id`),
  ADD KEY `IDX_24D341424F31A84` (`medecin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `FK_1BDA53C6ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Constraints for table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `FK_E7D6FCC1ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Constraints for table `specialite_medecin`
--
ALTER TABLE `specialite_medecin`
  ADD CONSTRAINT `FK_24D341422195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_24D341424F31A84` FOREIGN KEY (`medecin_id`) REFERENCES `medecin` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
