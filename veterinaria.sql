# Host: localhost  (Version 5.5.5-10.4.10-MariaDB)
# Date: 2020-04-22 21:10:20
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "administradores"
#

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `cedula` int(11) NOT NULL,
  `primer_nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `seg_nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `primer_ape` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `segundo_ape` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `agregado_por` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

#
# Data for table "administradores"
#

/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (0,'Administrador','Administrador','Administrador','Administrador','admin@admin.com','12345678','POR DEFECTO');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;

#
# Structure for table "mascotas"
#

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_usu` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `raza` varchar(30) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mascota`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

#
# Data for table "mascotas"
#


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `nombre_com` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

#
# Data for table "usuarios"
#

