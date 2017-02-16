CREATE TABLE `alumno_asistencias` (
`id_alumno_control` int(11) NOT NULL,
`asistencia` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
`fecha` date NOT NULL,
INDEX `fk_alumno_asistencias_alumno_control_1` (`id_alumno_control` ASC) USING BTREE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `alumno_control` (
`id_alumno_control` int(11) NOT NULL AUTO_INCREMENT,
`id_user_alumno` int(11) NOT NULL,
`id_user_docente` int(11) NOT NULL,
`id_curso` int(11) NOT NULL,
`id_bloque` int(11) NOT NULL,
`status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
PRIMARY KEY (`id_alumno_control`) ,
INDEX `fk_alumno_notas_users_1` (`id_user_alumno` ASC) USING BTREE,
INDEX `fk_alumno_notas_users_2` (`id_user_docente` ASC) USING BTREE,
INDEX `fk_alumno_notas_cursos_1` (`id_curso` ASC) USING BTREE,
INDEX `fk_alumno_control_bloques_1` (`id_bloque` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `alumno_notas` (
`id_alumno_control` int(11) NOT NULL,
`n_nota` int(11) NOT NULL,
`nota` decimal(2,2) NOT NULL,
`temporada_clase` int(11) NOT NULL,
INDEX `fk_nota_detalle_alumno_notas_1` (`id_alumno_control` ASC) USING BTREE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `bloque_alumnos` (
`id_user_alumno` int(11) NOT NULL,
`id_bloque` int(11) NOT NULL,
INDEX `fk_bloque_alumnos_users_1` (`id_user_alumno` ASC) USING BTREE,
INDEX `fk_bloque_alumnos_bloque_id_bloque` (`id_bloque` ASC) USING BTREE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `bloque_curso_docente` (
`id_bloque` int(11) NOT NULL,
`id_curso` int(11) NOT NULL,
`id_user_docente` int(11) NOT NULL,
`dia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
INDEX `fk_bloque_curso_docente_cursos_1` (`id_curso` ASC) USING BTREE,
INDEX `fk_bloque_curso_docente_bloques_1` (`id_bloque` ASC) USING BTREE,
INDEX `fk_bloque_curso_docente_users_1` (`id_user_docente` ASC) USING BTREE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `bloques` (
`id_bloque` int(11) NOT NULL AUTO_INCREMENT,
`code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
`seccion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
`grado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
`status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
`num_max_vacante` int(11) NOT NULL,
`num_actual_alu` int(11) NOT NULL DEFAULT 0,
PRIMARY KEY (`id_bloque`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `cursos` (
`id_curso` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
`description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
PRIMARY KEY (`id_curso`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;

CREATE TABLE `users` (
`id_user` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(30) NOT NULL,
`last_name` varchar(30) NOT NULL,
`code` varchar(30) NOT NULL,
`status` varchar(10) NOT NULL DEFAULT ACTIVO,
`email` varchar(10) NULL,
`phone` varchar(10) NULL,
`password` varchar(30) NOT NULL,
`type_us` varchar(20) NOT NULL,
PRIMARY KEY (`id_user`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci
ROW_FORMAT = Dynamic;


ALTER TABLE `alumno_asistencias` ADD CONSTRAINT `fk_alumno_asistencias_alumno_control_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_control_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_notas_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_notas_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `alumno_control` ADD CONSTRAINT `fk_alumno_notas_users_2` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `alumno_notas` ADD CONSTRAINT `fk_nota_detalle_alumno_notas_1` FOREIGN KEY (`id_alumno_control`) REFERENCES `alumno_control` (`id_alumno_control`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `bloque_alumnos` ADD CONSTRAINT `fk_bloque_alumnos_bloque_id_bloque` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `bloque_alumnos` ADD CONSTRAINT `fk_bloque_alumnos_users_1` FOREIGN KEY (`id_user_alumno`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `bloque_curso_docente` ADD CONSTRAINT `fk_bloque_curso_docente_bloques_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `bloque_curso_docente` ADD CONSTRAINT `fk_bloque_curso_docente_cursos_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `bloque_curso_docente` ADD CONSTRAINT `fk_bloque_curso_docente_users_1` FOREIGN KEY (`id_user_docente`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

