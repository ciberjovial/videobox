/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : videobox

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-01-17 01:50:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actor`
-- ----------------------------
DROP TABLE IF EXISTS `actor`;
CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `apellido` varchar(45) default NULL,
  `nacionalidad` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actor
-- ----------------------------
INSERT INTO `actor` VALUES ('1', 'Stanley ', 'Tucci', null);
INSERT INTO `actor` VALUES ('2', 'Ben ', 'Affleck', null);
INSERT INTO `actor` VALUES ('3', 'Shailene ', 'Woodley', null);

-- ----------------------------
-- Table structure for `amigos`
-- ----------------------------
DROP TABLE IF EXISTS `amigos`;
CREATE TABLE `amigos` (
  `id` varchar(45) NOT NULL,
  `cliente_id1` int(11) NOT NULL,
  `cliente_id2` int(11) NOT NULL,
  `fecha` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_amigos_cliente1_idx` (`cliente_id1`),
  KEY `fk_amigos_cliente2_idx` (`cliente_id2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of amigos
-- ----------------------------

-- ----------------------------
-- Table structure for `cliente`
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) NOT NULL,
  `dni` varchar(8) default NULL,
  `direccion` varchar(45) default NULL,
  `telefono` varchar(45) default NULL,
  `acercade` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_cliente_usuario1_idx` (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('1', '1', ' ', '', '', '');

-- ----------------------------
-- Table structure for `detalle`
-- ----------------------------
DROP TABLE IF EXISTS `detalle`;
CREATE TABLE `detalle` (
  `id` varchar(45) NOT NULL,
  `cantidad` int(11) default NULL,
  `pelicula_id` int(11) NOT NULL,
  `operacion_id` int(11) NOT NULL,
  `tipo` int(11) default NULL COMMENT '0=alquiler\\n1=venta',
  `preciounitario` float(10,2) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_pelicula_has_venta_venta1_idx` (`operacion_id`),
  KEY `fk_pelicula_has_venta_pelicula1_idx` (`pelicula_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle
-- ----------------------------

-- ----------------------------
-- Table structure for `director`
-- ----------------------------
DROP TABLE IF EXISTS `director`;
CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `apellido` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of director
-- ----------------------------
INSERT INTO `director` VALUES ('1', 'Michael ', 'Bay');
INSERT INTO `director` VALUES ('2', 'Brad', 'Furman');
INSERT INTO `director` VALUES ('3', 'Josh ', 'Boone');

-- ----------------------------
-- Table structure for `empleado`
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) NOT NULL,
  `cargo` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_empleado_usuario1_idx` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empleado
-- ----------------------------

-- ----------------------------
-- Table structure for `genero`
-- ----------------------------
DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `descripcion` longtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of genero
-- ----------------------------
INSERT INTO `genero` VALUES ('1', 'Blu-Rayaccion', 'na');
INSERT INTO `genero` VALUES ('2', 'Blu-Ray Suspenso', 'na');
INSERT INTO `genero` VALUES ('3', 'Drama', 'na');

-- ----------------------------
-- Table structure for `pedido`
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL auto_increment,
  `cliente_id` int(11) default NULL,
  `empleado_id` int(11) default NULL,
  `fecha` datetime default NULL,
  `uid` varchar(45) default NULL,
  `estado` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_venta_cliente1_idx` (`cliente_id`),
  KEY `fk_venta_empleado1_idx` (`empleado_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pedido
-- ----------------------------

-- ----------------------------
-- Table structure for `pelicula`
-- ----------------------------
DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(45) default NULL,
  `anio` int(11) default NULL,
  `duracion` varchar(45) default NULL,
  `pais` varchar(45) default NULL,
  `stock` varchar(45) default NULL,
  `precioven` float(10,2) default NULL,
  `precioalq` float(10,2) default NULL,
  `sinopsis` longtext,
  `caracteristica` longtext,
  `director_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `imagen` varchar(45) default NULL,
  `ranking` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_pelicula_directorpelicula1_idx` (`director_id`),
  KEY `fk_pelicula_generopelicula1_idx` (`genero_id`),
  KEY `fk_pelicula_actoresreparto1_idx` (`actor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelicula
-- ----------------------------
INSERT INTO `pelicula` VALUES ('1', 'TRANSFORMERS LA ERA DE LA EXTINCION (BLU RAY)', '2014', '165 mins ', 'USA', '40', '115.00', '110.00', 'Han pasado 4 años desde la tragedia de Chicago y la humanidad sigue reparando los destrozos, pero tanto los Autobots como los Decepticons han desaparecido de la faz de la Tierra. Ahora el Gobierno de los Estados Unidos está utilizando la tecnología rescatada en el asedio de Chicago para desarrollar sus propios Transformers.\r\n\r\nAl frente del proyecto está Joshua Joyce, un arrogante diseñador que piensa que los Autobots son \"basura tecnológica\" y se cree capaz de fabricar unos robots infinitamente más avanzados.\r\n\r\nMientras tanto, Cade Yeager, un mecánico inventor, encuentra un Marmon semi-trailer. Al intentar repararlo, descubre que el camión no solo era un Transformer, sino también el mismísimo Optimus Prime, líder de los Autobots. Lo que Cade ignora son las consecuencias que pueden derivarse de este hallazgo.', 'Presentacion widescreen', '1', '1', '1', null, null);
INSERT INTO `pelicula` VALUES ('2', 'APUESTA MAXIMA (BLU RAY)', '2014', '91 mins ', 'USA', '10', '120.00', '115.00', 'Richie Furst es un estudiente de la universidad de Princeton que pierde el dinero que necesitaba para su matrícula al apostarlo en un juego de poker online.\r\n\r\nCuando descubre que el sitio web está alojado en una isla remota, va a enfrentar a su dueño, el millonario Ivan Block, pero termina convirtiendose en su discipulo y mano derecha.\r\n\r\nLa relación entre ambos alcanza el punto de ebullición mientras un agente del FBI intenta utilizar a Furst para detener a Block.', 'Escenas eliminadas', '2', '2', '2', null, null);
INSERT INTO `pelicula` VALUES ('3', 'BAJO LA MISMA ESTRELLA', '2014', '126 mins ', 'USA', '23', '53.00', '41.00', 'A pesar de que un milagro médico ha conseguido reducir su tumor y darle unos años más de vida, Hazel siempre se ha considerado una enferma terminal.\r\n\r\nSin embargo, cuando Gus entra a formar parte del grupo de ayuda para enfermos de cáncer juvenil, la vida de Hazel se transforma por completo.', 'El elenco', '3', '3', '3', null, null);

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `tipo` int(11) default NULL COMMENT '1=Cliente\\n2=Empleado\\n3=Administrador',
  `nombre` varchar(45) default NULL,
  `apellido` varchar(45) default NULL,
  `user` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `estado` int(11) default NULL COMMENT '0=Inactivo\\n1=Activo\\n',
  `lastlogin` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', '1', 'Jimmy Cristian', 'Muñoz Miranda', 'jimmy', '010207', 'jimz_21@hotmail.com', '1', '0000-00-00 00:00:00');
