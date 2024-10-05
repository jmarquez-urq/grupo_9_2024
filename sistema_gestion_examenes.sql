CREATE SCHEMA IF NOT EXISTS `alumno` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;


USE `alumno`;


CREATE TABLE `docentes` (
  `num_matricula` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `materia` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`num_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `examenes` (
  `materia_examen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nota_examen` int NOT NULL,
  `docente_mesa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_mesa` date NOT NULL,
  PRIMARY KEY (`materia_examen`, `fecha_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `materias` (
  `nombre_materia` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `docente_encargado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cant_alumnos` int NOT NULL,
  `horas_curriculares` int NOT NULL,
  PRIMARY KEY (`nombre_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `usuario` (
  `id_usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
  `clave` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;