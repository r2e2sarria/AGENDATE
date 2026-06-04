-- version ajustada junio 2026

CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consejero` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duracion` varchar(3) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'Duración de la cita',
  `tipo` varchar(1) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '1 pre / 2 virtual',
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `estado` varchar(1) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '0 libre / 1 cancelada / 2 cumplida / 3 ausente',
  `date_reserva` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `consejero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `last` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pass` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'correo gmail para meet',
  `meet` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'codigo meet',
  `addr` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dpto` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `memos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) DEFAULT NULL,
  `memo` text COLLATE utf8mb4_spanish_ci COMMENT 'Anotaciones de la cita',
  `tipo_nota` varchar(1) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '1 inicio - 2 envia - 3 recibe',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `citys` (
  `id` int(11) DEFAULT NULL,
  `IdDpto` int(11) DEFAULT NULL,
  `idDane` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cityName` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `dptos` (
  `id` int(11) DEFAULT NULL,
  `idDane` int(11) DEFAULT NULL,
  `nameDpto` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;