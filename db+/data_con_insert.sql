-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `alumno_asistencias`;
CREATE TABLE `alumno_asistencias` (
  `id_alumno_control` int(11) NOT NULL,
  `asistencia` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  KEY `fk_alumno_asistencias_alumno_control_1` (`id_alumno_control`),
  CONSTRAINT `fk_alumno_asistencias_alumno_control_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `alumno_control`;
CREATE TABLE `alumno_control` (
  `id_alumno_control` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_alumno` int(11) NOT NULL,
  `id_user_docente` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_alumno_control`),
  KEY `fk_alumno_notas_users_1` (`id_user_alumno`),
  KEY `fk_alumno_notas_users_2` (`id_user_docente`),
  KEY `fk_alumno_notas_cursos_1` (`id_curso`),
  KEY `fk_alumno_control_bloques_1` (`id_bloque`),
  CONSTRAINT `fk_alumno_control_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`),
  CONSTRAINT `fk_alumno_notas_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  CONSTRAINT `fk_alumno_notas_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`),
  CONSTRAINT `fk_alumno_notas_users_2` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `alumno_control` (`id_alumno_control`, `id_user_alumno`, `id_user_docente`, `id_curso`, `id_bloque`, `status`) VALUES
(1,	25,	19,	3,	4,	'ACTIVO'),
(2,	25,	19,	4,	4,	'ACTIVO'),
(3,	25,	33,	4,	4,	'ACTIVO'),
(4,	25,	35,	4,	4,	'ACTIVO'),
(5,	25,	36,	4,	4,	'ACTIVO'),
(6,	24,	33,	4,	1,	'ACTIVO'),
(7,	24,	34,	4,	1,	'ACTIVO'),
(8,	23,	19,	3,	4,	'ACTIVO'),
(9,	23,	19,	4,	4,	'ACTIVO'),
(10,	23,	33,	4,	4,	'ACTIVO'),
(11,	23,	35,	4,	4,	'ACTIVO'),
(12,	23,	36,	4,	4,	'ACTIVO'),
(13,	26,	19,	3,	4,	'ACTIVO'),
(14,	26,	19,	4,	4,	'ACTIVO'),
(15,	26,	33,	4,	4,	'ACTIVO'),
(16,	26,	35,	4,	4,	'ACTIVO'),
(17,	26,	36,	4,	4,	'ACTIVO'),
(18,	27,	19,	3,	4,	'ACTIVO'),
(19,	27,	19,	4,	4,	'ACTIVO'),
(20,	27,	33,	4,	4,	'ACTIVO'),
(21,	27,	35,	4,	4,	'ACTIVO'),
(22,	27,	36,	4,	4,	'ACTIVO'),
(23,	28,	19,	3,	4,	'ACTIVO'),
(24,	28,	19,	4,	4,	'ACTIVO'),
(25,	28,	33,	4,	4,	'ACTIVO'),
(26,	28,	35,	4,	4,	'ACTIVO'),
(27,	28,	36,	4,	4,	'ACTIVO'),
(28,	29,	19,	3,	4,	'ACTIVO'),
(29,	29,	19,	4,	4,	'ACTIVO'),
(30,	29,	33,	4,	4,	'ACTIVO'),
(31,	29,	35,	4,	4,	'ACTIVO'),
(32,	29,	36,	4,	4,	'ACTIVO'),
(33,	30,	19,	3,	4,	'ACTIVO'),
(34,	30,	19,	4,	4,	'ACTIVO'),
(35,	30,	33,	4,	4,	'ACTIVO'),
(36,	30,	35,	4,	4,	'ACTIVO'),
(37,	30,	36,	4,	4,	'ACTIVO'),
(38,	31,	19,	3,	4,	'ACTIVO'),
(39,	31,	19,	4,	4,	'ACTIVO'),
(40,	31,	33,	4,	4,	'ACTIVO'),
(41,	31,	35,	4,	4,	'ACTIVO'),
(42,	31,	36,	4,	4,	'ACTIVO'),
(43,	32,	33,	4,	1,	'ACTIVO'),
(44,	32,	34,	4,	1,	'ACTIVO');

DROP TABLE IF EXISTS `alumno_notas`;
CREATE TABLE `alumno_notas` (
  `id_alumno_control` int(11) NOT NULL,
  `n_nota` int(11) NOT NULL,
  `nota` decimal(2,2) NOT NULL,
  `temporada_clase` int(11) NOT NULL,
  KEY `fk_nota_detalle_alumno_notas_1` (`id_alumno_control`),
  CONSTRAINT `fk_nota_detalle_alumno_notas_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `bloques`;
CREATE TABLE `bloques` (
  `id_bloque` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `num_max_vacante` int(11) DEFAULT NULL,
  `num_actual_alu` int(11) DEFAULT 0,
  PRIMARY KEY (`id_bloque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bloques` (`id_bloque`, `code`, `seccion`, `grado`, `status`, `num_max_vacante`, `num_actual_alu`) VALUES
(1,	'1A',	'1',	'20',	'ACTIVO',	20,	5),
(4,	'1B',	'1',	'B',	'ACTIVO',	20,	7),
(5,	'1C',	'1',	'C',	'ACTIVO',	30,	30);

DROP TABLE IF EXISTS `bloque_alumnos`;
CREATE TABLE `bloque_alumnos` (
  `id_user_alumno` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  KEY `fk_bloque_alumnos_users_1` (`id_user_alumno`),
  KEY `fk_bloque_alumnos_bloque_id_bloque` (`id_bloque`),
  CONSTRAINT `fk_bloque_alumnos_bloque_id_bloque` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`),
  CONSTRAINT `fk_bloque_alumnos_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bloque_alumnos` (`id_user_alumno`, `id_bloque`) VALUES
(25,	4),
(24,	1),
(23,	4),
(26,	4),
(27,	4),
(28,	4),
(29,	4),
(30,	4),
(31,	4),
(32,	1);

DROP TABLE IF EXISTS `bloque_curso_docente`;
CREATE TABLE `bloque_curso_docente` (
  `id_bloque` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_user_docente` int(11) NOT NULL,
  `dia` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `fk_bloque_curso_docente_cursos_1` (`id_curso`),
  KEY `fk_bloque_curso_docente_bloques_1` (`id_bloque`),
  KEY `fk_bloque_curso_docente_users_1` (`id_user_docente`),
  CONSTRAINT `fk_bloque_curso_docente_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`),
  CONSTRAINT `fk_bloque_curso_docente_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  CONSTRAINT `fk_bloque_curso_docente_users_1` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bloque_curso_docente` (`id_bloque`, `id_curso`, `id_user_docente`, `dia`) VALUES
(4,	3,	19,	'null'),
(4,	4,	19,	'null'),
(5,	3,	19,	'null'),
(5,	4,	19,	'null'),
(1,	4,	33,	'null'),
(4,	4,	33,	'null'),
(5,	4,	33,	'null'),
(1,	4,	34,	'null'),
(4,	4,	35,	'null'),
(4,	4,	36,	'null');

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cursos` (`id_curso`, `name`, `description`) VALUES
(3,	'matematica',	'MatemÃ¡tica'),
(4,	'comunicacion',	'ComunicaciÃ³n');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `code_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_us` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu` (`id_menu`, `code_menu`, `type_us`, `name`) VALUES
(6,	'add-user',	'ROOT',	'Anadir usuario'),
(7,	'detail',	'ROOT',	'Detalle'),
(8,	'detail',	'ALUMNO',	'Detalle'),
(9,	'detail',	'DOCENTE',	'Detalle'),
(12,	'bloques',	'ADMIN',	'Bloques'),
(13,	'cursos',	'ADMIN',	'Cursos'),
(14,	'alumnos',	'ADMIN',	'Alumnos'),
(15,	'docentes',	'ADMIN',	'Docentes'),
(16,	'detail',	'ADMIN',	'Inicio'),
(17,	'list-bloques',	'DOCENTE',	'Bloques');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_us` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id_user`, `name`, `last_name`, `code`, `status`, `email`, `phone`, `password`, `type_us`) VALUES
(1,	'root',	'root',	'root',	'ACTIVO',	'root@root',	'12234534',	'123',	'ROOT'),
(19,	'Docente',	'Docente Docente',	'1234567',	'ACTIVO',	'Docente@root.com',	'123456',	'1234567',	'DOCENTE'),
(20,	'test',	'test',	'123',	'ACTIVO',	'bryan_lizana_delao@hotmail.com',	'123',	'123',	'ADMIN'),
(21,	'del',	'del',	'1234',	'INACTIVO',	'admin@admin.com',	'123',	'123',	'ADMIN'),
(23,	'Bryan',	'Lizana',	'123456',	'ACTIVO',	'bryan_lizana_dela05@hotmail.com',	'123456789',	'123456',	'ALUMNO'),
(24,	'Bryan',	'Lizana',	'12345678',	'ACTIVO',	'bryan@hot.com',	'123',	'12345678',	'ALUMNO'),
(25,	'Bryan',	'Lizana De La O',	'1238',	'ACTIVO',	'b@d.com',	'123',	'1238',	'ALUMNO'),
(26,	'Update',	'Mas',	'09877',	'ACTIVO',	'mas@mas.com',	'123',	'09877',	'ALUMNO'),
(27,	'testmore',	'more',	'123123',	'ACTIVO',	'momre@more.com',	'123123',	'123123',	'ALUMNO'),
(28,	'test',	'test',	'878243',	'ACTIVO',	'test2@test2.com',	'123123',	'878243',	'ALUMNO'),
(29,	'test',	'test',	'5324',	'INACTIVO',	'test@tesq.com',	'123',	'5324',	'ALUMNO'),
(30,	'testlast',	'testlast',	'6543232',	'ACTIVO',	'testlast@a.com',	'23123',	'6543232',	'ALUMNO'),
(31,	'laakhdam',	'ksndmc ',	'1872946',	'ACTIVO',	'lfskm@sdf.sdfo',	'124',	'1872946',	'ALUMNO'),
(32,	'skdfn',	'olfkd',	'0528348',	'ACTIVO',	'sdf@sfds.sd',	'12312',	'0528348',	'ALUMNO'),
(33,	'TestDocente',	'Test',	'0987654',	'ACTIVO',	'TestDocente@test.om',	'756534',	'0987654',	'DOCENTE'),
(34,	'hdghgd',	'fghgjhghf',	'4765',	'ACTIVO',	'sdf@dfdgf.sdf',	'1253',	'4765',	'DOCENTE'),
(35,	'gf',	'sdf',	'234',	'INACTIVO',	'sdf@sdf.vsd',	'65',	'234',	'DOCENTE'),
(36,	'TestDocente',	'TestDocente',	'1234567890',	'ACTIVO',	'testdocente@hotmail.com',	'123456798',	'1234567890',	'DOCENTE');

-- 2017-02-20 03:46:33s