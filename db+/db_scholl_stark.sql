CREATE TABLE `users` (
`id_user` int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id_user`) 
);

CREATE TABLE `bloques` (
`id_bloque` int NOT NULL AUTO_INCREMENT,
`code` varchar(30) NOT NULL,
`seccion` varchar(30) NOT NULL,
`grado` varchar(10) NOT NULL,
`status` varchar(10) NOT NULL,
`num_max_vacante` int NOT NULL,
`num_actual_alu` int NOT NULL DEFAULT 0,
PRIMARY KEY (`id_bloque`) 
);

CREATE TABLE `cursos` (
`id_curso` int NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`description` longtext NULL,
PRIMARY KEY (`id_curso`) 
);

CREATE TABLE `bloque_curso_docente` (
`id_bloque` int NOT NULL,
`id_curso` int NOT NULL,
`id_user_docente` int NOT NULL,
`dia` varchar(20) NOT NULL
);

CREATE TABLE `alumno_control` (
`id_alumno_control` int NOT NULL AUTO_INCREMENT,
`id_user_alumno` int NOT NULL,
`id_user_docente` int NOT NULL,
`id_curso` int NOT NULL,
`id_bloque` int NOT NULL,
`status` varchar(20) NOT NULL,
PRIMARY KEY (`id_alumno_control`) 
);

CREATE TABLE `bloque_alumnos` (
`id_user_alumno` int NOT NULL,
`id_bloque` int NOT NULL
);

CREATE TABLE `alumno_notas` (
`id_alumno_control` int NOT NULL,
`n_nota` int NOT NULL,
`nota` decimal(2,2) NOT NULL,
`temporada_clase` int NOT NULL
);

CREATE TABLE `alumno_asistencias` (
`id_alumno_control` int NOT NULL,
`asistencia` varchar(10) NOT NULL,
`fecha` date NOT NULL
);


ALTER TABLE `bloque_alumnos` ADD CONSTRAINT `fk_bloque_alumnos_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`);
ALTER TABLE `bloque_alumnos` ADD CONSTRAINT `fk_bloque_alumnos_bloque_id_bloque` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`);
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_notas_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`);
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_notas_users_2` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`);
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_notas_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);
ALTER TABLE `alumno_notas` ADD CONSTRAINT `fk_nota_detalle_alumno_notas_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`);
ALTER TABLE `alumno_asistencias` ADD CONSTRAINT `fk_alumno_asistencias_alumno_control_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`);
ALTER TABLE `bloque_curso_docente` ADD CONSTRAINT `fk_bloque_curso_docente_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);
ALTER TABLE `bloque_curso_docente` ADD CONSTRAINT `fk_bloque_curso_docente_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`);
ALTER TABLE `bloque_curso_docente` ADD CONSTRAINT `fk_bloque_curso_docente_users_1` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`);
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_control_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`);

