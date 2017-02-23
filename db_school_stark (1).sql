-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2017 at 06:31 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school_stark`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno_asistencias`
--

CREATE TABLE `alumno_asistencias` (
  `id_alumno_control` int(11) NOT NULL,
  `asistencia` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumno_asistencias`
--

INSERT INTO `alumno_asistencias` (`id_alumno_control`, `asistencia`, `fecha`) VALUES
(1, '1', '2017-02-22'),
(7, '0', '2017-02-22'),
(8, '1', '2017-02-22'),
(9, '0', '2017-02-22'),
(10, '1', '2017-02-22'),
(17, '1', '2017-02-22'),
(5, '1', '2017-02-22'),
(11, '1', '2017-02-22'),
(19, '1', '2017-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `alumno_control`
--

CREATE TABLE `alumno_control` (
  `id_alumno_control` int(11) NOT NULL,
  `id_user_alumno` int(11) NOT NULL,
  `id_user_docente` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumno_control`
--

INSERT INTO `alumno_control` (`id_alumno_control`, `id_user_alumno`, `id_user_docente`, `id_curso`, `id_bloque`, `status`) VALUES
(1, 6, 3, 1, 1, 'ACTIVO'),
(2, 7, 5, 5, 9, 'ACTIVO'),
(3, 8, 5, 5, 9, 'ACTIVO'),
(4, 9, 5, 5, 9, 'ACTIVO'),
(5, 12, 3, 1, 4, 'ACTIVO'),
(6, 12, 4, 4, 4, 'ACTIVO'),
(7, 13, 3, 1, 1, 'ACTIVO'),
(8, 14, 3, 1, 1, 'ACTIVO'),
(9, 15, 3, 1, 1, 'ACTIVO'),
(10, 16, 3, 1, 1, 'ACTIVO'),
(11, 17, 3, 1, 4, 'ACTIVO'),
(12, 17, 4, 4, 4, 'ACTIVO'),
(13, 18, 4, 4, 5, 'ACTIVO'),
(14, 10, 24, 5, 2, 'ACTIVO'),
(15, 11, 24, 5, 2, 'ACTIVO'),
(16, 19, 4, 4, 5, 'ACTIVO'),
(17, 22, 3, 1, 1, 'ACTIVO'),
(18, 22, 24, 5, 1, 'ACTIVO'),
(19, 25, 3, 1, 4, 'ACTIVO'),
(20, 25, 4, 4, 4, 'ACTIVO'),
(21, 26, 23, 8, 8, 'ACTIVO'),
(22, 27, 4, 4, 5, 'ACTIVO'),
(23, 28, 23, 8, 8, 'ACTIVO');

-- --------------------------------------------------------

--
-- Table structure for table `alumno_notas`
--

CREATE TABLE `alumno_notas` (
  `id_alumno_control` int(11) NOT NULL,
  `n_nota` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `temporada_clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumno_notas`
--

INSERT INTO `alumno_notas` (`id_alumno_control`, `n_nota`, `nota`, `temporada_clase`) VALUES
(1, 0, 13, 1),
(1, 0, 12, 1),
(1, 0, 14, 1),
(1, 0, 12, 1),
(7, 0, 15, 1),
(7, 0, 13, 1),
(7, 0, 14, 1),
(7, 0, 17, 1),
(8, 0, 16, 1),
(8, 0, 12, 1),
(8, 0, 14, 1),
(8, 0, 12, 1),
(9, 0, 14, 1),
(9, 0, 12, 1),
(9, 0, 13, 1),
(9, 0, 12, 1),
(17, 0, 12, 1),
(17, 0, 13, 1),
(17, 0, 14, 1),
(17, 0, 17, 1),
(5, 0, 14, 1),
(5, 0, 12, 1),
(5, 0, 12, 1),
(5, 0, 14, 1),
(19, 0, 14, 1),
(19, 0, 14, 1),
(19, 0, 14, 1),
(19, 0, 14, 1),
(11, 0, 12, 1),
(11, 0, 12, 1),
(11, 0, 12, 1),
(11, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloques`
--

CREATE TABLE `bloques` (
  `id_bloque` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `num_max_vacante` int(11) DEFAULT NULL,
  `num_actual_alu` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloques`
--

INSERT INTO `bloques` (`id_bloque`, `code`, `seccion`, `grado`, `status`, `num_max_vacante`, `num_actual_alu`) VALUES
(1, '1A', '1', 'A', 'ACTIVO', 10, 6),
(2, '1B', '1', 'B', 'ACTIVO', 9, 2),
(3, '1C', '1', 'C', 'ACTIVO', 5, 0),
(4, '2A', '2', 'A', 'ACTIVO', 10, 3),
(5, '2B', '2', 'B', 'ACTIVO', 12, 3),
(6, '2C', '2', 'C', 'ACTIVO', 20, 0),
(7, '3A', '3', 'A', 'ACTIVO', 10, 2),
(8, '3B', '3', 'B', 'ACTIVO', 5, 2),
(9, '3C', '3', 'C', 'ACTIVO', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bloque_alumnos`
--

CREATE TABLE `bloque_alumnos` (
  `id_user_alumno` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloque_alumnos`
--

INSERT INTO `bloque_alumnos` (`id_user_alumno`, `id_bloque`) VALUES
(6, 1),
(7, 9),
(8, 9),
(9, 9),
(10, 2),
(11, 2),
(12, 4),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 4),
(18, 5),
(19, 5),
(20, 7),
(21, 7),
(22, 1),
(25, 4),
(26, 8),
(27, 5),
(28, 8);

-- --------------------------------------------------------

--
-- Table structure for table `bloque_curso_docente`
--

CREATE TABLE `bloque_curso_docente` (
  `id_bloquecursodocente` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_user_docente` int(11) NOT NULL,
  `dia` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloque_curso_docente`
--

INSERT INTO `bloque_curso_docente` (`id_bloquecursodocente`, `id_bloque`, `id_curso`, `id_user_docente`, `dia`) VALUES
(5, 1, 1, 3, 'null'),
(6, 4, 1, 3, 'null'),
(7, 4, 4, 4, 'null'),
(8, 5, 4, 4, 'null'),
(9, 9, 5, 5, 'null'),
(10, 8, 8, 23, 'null'),
(11, 9, 8, 23, 'null'),
(16, 1, 5, 24, 'null'),
(17, 2, 5, 24, 'null'),
(18, 3, 5, 24, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id_curso`, `name`, `description`) VALUES
(1, 'matematica', 'MatemÃ¡tica'),
(2, 'comunicacion', 'ComunicaciÃ³n'),
(3, 'ciencias', 'Ciencias'),
(4, 'historia', 'Historia'),
(5, 'ingles', 'English'),
(6, 'fisica', 'FÃ­sica'),
(7, 'educacion-fisica', 'EducaciÃ³n FÃ­sica'),
(8, 'religion', 'ReligiÃ³n');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `code_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_us` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `code_menu`, `type_us`, `name`) VALUES
(1, 'list-user', 'ROOT', 'List Users'),
(2, 'add-user', 'ROOT', 'Add User'),
(3, 'detail', 'ADMIN', 'Detalles'),
(4, 'docentes', 'ADMIN', 'Docentes'),
(5, 'alumnos', 'ADMIN', 'Alumnos'),
(6, 'bloques', 'ADMIN', 'Bloques'),
(7, 'cursos', 'ADMIN', 'Cursos'),
(8, 'generate', 'ADMIN', 'Generar Control'),
(9, 'detail', 'DOCENTE', 'Detalle'),
(10, 'list-bloques', 'DOCENTE', 'List Bloques');
(11, 'detail', 'ALUMNO', 'Detalle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_us` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `last_name`, `code`, `status`, `email`, `phone`, `password`, `type_us`) VALUES
(1, 'ROOT', 'ROOT', 'ROOT', 'ACTIVO', 'bryanlizanadelao@hotmail.com', '955848228', 'admin123', 'ROOT'),
(2, 'Admin Admin', 'Admin Admin', '987654321', 'ACTIVO', 'admin@admin.com', '123123123', '123', 'ADMIN'),
(3, 'Docente One', 'Docente One', '1231231231', 'ACTIVO', 'docente@school.com', '1231231234', '123', 'DOCENTE'),
(4, 'Docente Two', 'Docente Two', '1231231232', 'ACTIVO', 'docentedos@school.com', '1231234123', '123', 'DOCENTE'),
(5, 'Docente Three', 'Docente Three', '1231231233', 'ACTIVO', 'docentetres@school.com', '1231231235', '132', 'DOCENTE'),
(6, 'Bryan', 'Lizana', '123098987', 'ACTIVO', 'bryanlizana@hotmail.com', '1231231237', '123', 'ALUMNO'),
(7, 'Alumno Test One', 'Test', '9034589734', 'ACTIVO', 'testone@hotmail.com', '1237809234', '123', 'ALUMNO'),
(8, 'Alumno Test Dos', 'Test', '908345034', 'ACTIVO', 'testdos@hotmail.com', '5234', '123', 'ALUMNO'),
(9, 'Test Tres', 'Test', '0834598304', 'ACTIVO', 'testtres@hotmail.com', '5234643', '123', 'ALUMNO'),
(10, 'Luis Cases', 'Cases', '984530495', 'ACTIVO', 'testtres@hotmai.com', '63245734', '123', 'ALUMNO'),
(11, 'Jose Banites', 'Pablo', '983745548', 'ACTIVO', 'jbpablo@hotmail.com', '63457452', '123', 'ALUMNO'),
(12, 'Tina Tine', 'Time', '8964578394', 'ACTIVO', 'time@hotmail.com', '84563452', '123', 'ALUMNO'),
(13, 'Bryan', 'De La O', '863456345', 'ACTIVO', 'delao@xn--hotmai-1wa.com', '8653445', '123', 'ALUMNO'),
(14, 'Pancho', 'Lizana', '908435394', 'ACTIVO', 'plizana@hotmaiul.com', '734523', '123', 'ALUMNO'),
(15, 'Time', 'Time', '76234573', 'ACTIVO', 'timedos@hotmail.com', '734534', '123', 'ALUMNO'),
(16, 'Test', 'Test', '9083450334', 'ACTIVO', 'testdostest@hotmail.com', '7345234', '123', 'ALUMNO'),
(17, 'Test', 'Test', '892374234', 'ACTIVO', 'tst@hotmail.com', '34534534', '123', 'ALUMNO'),
(18, 'Test Dos', 'Test Dos', '09234834', 'ACTIVO', 'Testg@hotmailc.om', '892374', '123', 'ALUMNO'),
(19, 'Test Tres', 'Tres', '908340384', 'ACTIVO', 'tres@hotmail.com', '6345324', '123', 'ALUMNO'),
(20, 'test cuatro', 'Cueatro', '856756456', 'ACTIVO', 'cuatro@hotmail.com', '734534', '123', 'ALUMNO'),
(21, 'Test CInco', 'Cinco', '95674563', 'ACTIVO', 'cinco@test.com', '873456345', '123', 'ALUMNO'),
(22, 'Test Six', 'Sicx', '09753485', 'ACTIVO', 'six@hotmail.com', '872340897', '123', 'ALUMNO'),
(23, 'Luis Docente', 'Docente', '90340283', 'ACTIVO', 'docluis@gamail.com', '541223', '123', 'DOCENTE'),
(24, 'Jose Docente', 'Docente', '76345238', 'ACTIVO', 'docjso@hotmail.com', '765234423', '234', 'DOCENTE'),
(25, 'Lucho Alumno', 'Alumno', '9038456034', 'ACTIVO', 'aluch@hotmail.com', '62343235', '123', 'ALUMNO'),
(26, 'Test Alu', 'Alumno', '897523498', 'ACTIVO', '423Alu@hotmail.com', '5234235343', '897523498', 'ALUMNO'),
(27, 'Tres cuatro', 'Tres', '0983458345', 'ACTIVO', 'tresDos@hotmail.com', '763452342', '123', 'ALUMNO'),
(28, 'Bryan lizana', 'Hermano', '903485384', 'ACTIVO', 'lizana@hotmail.com', '623453433', '123', 'ALUMNO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno_asistencias`
--
ALTER TABLE `alumno_asistencias`
  ADD KEY `fk_alumno_asistencias_alumno_control_1` (`id_alumno_control`);

--
-- Indexes for table `alumno_control`
--
ALTER TABLE `alumno_control`
  ADD PRIMARY KEY (`id_alumno_control`),
  ADD KEY `fk_alumno_notas_users_1` (`id_user_alumno`),
  ADD KEY `fk_alumno_notas_users_2` (`id_user_docente`),
  ADD KEY `fk_alumno_notas_cursos_1` (`id_curso`),
  ADD KEY `fk_alumno_control_bloques_1` (`id_bloque`);

--
-- Indexes for table `alumno_notas`
--
ALTER TABLE `alumno_notas`
  ADD KEY `fk_nota_detalle_alumno_notas_1` (`id_alumno_control`);

--
-- Indexes for table `bloques`
--
ALTER TABLE `bloques`
  ADD PRIMARY KEY (`id_bloque`);

--
-- Indexes for table `bloque_alumnos`
--
ALTER TABLE `bloque_alumnos`
  ADD KEY `fk_bloque_alumnos_users_1` (`id_user_alumno`),
  ADD KEY `fk_bloque_alumnos_bloque_id_bloque` (`id_bloque`);

--
-- Indexes for table `bloque_curso_docente`
--
ALTER TABLE `bloque_curso_docente`
  ADD PRIMARY KEY (`id_bloquecursodocente`),
  ADD KEY `fk_bloque_curso_docente_cursos_1` (`id_curso`),
  ADD KEY `fk_bloque_curso_docente_bloques_1` (`id_bloque`),
  ADD KEY `fk_bloque_curso_docente_users_1` (`id_user_docente`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumno_control`
--
ALTER TABLE `alumno_control`
  MODIFY `id_alumno_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `bloques`
--
ALTER TABLE `bloques`
  MODIFY `id_bloque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bloque_curso_docente`
--
ALTER TABLE `bloque_curso_docente`
  MODIFY `id_bloquecursodocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno_asistencias`
--
ALTER TABLE `alumno_asistencias`
  ADD CONSTRAINT `fk_alumno_asistencias_alumno_control_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`);

--
-- Constraints for table `alumno_control`
--
ALTER TABLE `alumno_control`
  ADD CONSTRAINT `fk_alumno_control_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`),
  ADD CONSTRAINT `fk_alumno_notas_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `fk_alumno_notas_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk_alumno_notas_users_2` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `alumno_notas`
--
ALTER TABLE `alumno_notas`
  ADD CONSTRAINT `fk_nota_detalle_alumno_notas_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`);

--
-- Constraints for table `bloque_alumnos`
--
ALTER TABLE `bloque_alumnos`
  ADD CONSTRAINT `fk_bloque_alumnos_bloque_id_bloque` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`),
  ADD CONSTRAINT `fk_bloque_alumnos_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `bloque_curso_docente`
--
ALTER TABLE `bloque_curso_docente`
  ADD CONSTRAINT `fk_bloque_curso_docente_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`),
  ADD CONSTRAINT `fk_bloque_curso_docente_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `fk_bloque_curso_docente_users_1` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
