/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : videobox

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-01-18 09:07:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actor`
-- ----------------------------
DROP TABLE IF EXISTS `actor`;
CREATE TABLE `actor` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `apellido` varchar(45) default NULL,
  `nacionalidad` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actor
-- ----------------------------
INSERT INTO `actor` VALUES ('1', 'Stanley ', 'Tucci', null);
INSERT INTO `actor` VALUES ('2', 'Ben ', 'Affleck', null);
INSERT INTO `actor` VALUES ('3', 'Shailene ', 'Woodley', null);
INSERT INTO `actor` VALUES ('4', 'Mark L. ', 'Walberg', null);
INSERT INTO `actor` VALUES ('5', 'Nicola ', 'Peltz', null);
INSERT INTO `actor` VALUES ('6', 'Kelsey ', 'Grammer', null);
INSERT INTO `actor` VALUES ('7', 'Jack ', 'Reynor', null);
INSERT INTO `actor` VALUES ('8', 'Titus ', 'Welliver', null);
INSERT INTO `actor` VALUES ('9', 'Sophia ', 'Myles', null);
INSERT INTO `actor` VALUES ('10', 'Bingbing ', 'Li ', null);
INSERT INTO `actor` VALUES ('11', 'Justin ', 'Timberlake', null);
INSERT INTO `actor` VALUES ('12', 'Gemma ', 'Artenton', null);
INSERT INTO `actor` VALUES ('13', 'Anthony ', 'Mackie', null);
INSERT INTO `actor` VALUES ('14', 'Sam ', 'Palladio', null);
INSERT INTO `actor` VALUES ('15', 'Michael ', 'Esper', null);
INSERT INTO `actor` VALUES ('16', 'Oliver ', 'Cooper', null);
INSERT INTO `actor` VALUES ('17', 'Christian ', 'George ', null);
INSERT INTO `actor` VALUES ('18', 'Ansel ', 'Elgort', null);
INSERT INTO `actor` VALUES ('19', 'Laura ', 'Dern', null);
INSERT INTO `actor` VALUES ('20', 'Sam ', 'Trammell', null);
INSERT INTO `actor` VALUES ('21', 'Nat ', 'Wolff', null);
INSERT INTO `actor` VALUES ('22', 'Willem ', 'Dafoe', null);
INSERT INTO `actor` VALUES ('23', 'Lotte ', 'Verbeek', null);
INSERT INTO `actor` VALUES ('24', 'Randy ', 'Kovitz ', null);
INSERT INTO `actor` VALUES ('25', 'Cameron ', 'Diaz', null);
INSERT INTO `actor` VALUES ('26', 'Leslie ', 'Mann', null);
INSERT INTO `actor` VALUES ('27', 'Nikolaj ', 'Coster-Waldau', null);
INSERT INTO `actor` VALUES ('28', 'Don ', 'Johnson', null);
INSERT INTO `actor` VALUES ('29', 'Kate ', 'Upton', null);
INSERT INTO `actor` VALUES ('30', 'Taylor ', 'Kinney', null);
INSERT INTO `actor` VALUES ('31', 'Nicki ', 'Minaj', null);
INSERT INTO `actor` VALUES ('32', 'Kenneth ', 'Maharaj ', null);
INSERT INTO `actor` VALUES ('33', 'Jon ', 'Hamm', null);
INSERT INTO `actor` VALUES ('34', 'Aasif ', 'Mandvi', null);
INSERT INTO `actor` VALUES ('35', 'Alan ', 'Arkin', null);
INSERT INTO `actor` VALUES ('36', 'Pitobash', null, null);
INSERT INTO `actor` VALUES ('37', 'Suraj ', 'Sharma', null);
INSERT INTO `actor` VALUES ('38', 'Madhur ', 'Mittal', null);
INSERT INTO `actor` VALUES ('39', 'Darshan ', 'Jariwala', null);
INSERT INTO `actor` VALUES ('40', 'Lake Bell', 'Bell', null);
INSERT INTO `actor` VALUES ('41', 'Angelina ', 'Jolie', null);
INSERT INTO `actor` VALUES ('42', 'Sharito ', 'Copley', null);
INSERT INTO `actor` VALUES ('43', 'Elle ', 'Fanning', null);
INSERT INTO `actor` VALUES ('44', 'Lesley ', 'Manville', null);
INSERT INTO `actor` VALUES ('45', 'Imelda ', 'Staunton', null);
INSERT INTO `actor` VALUES ('46', 'Sam ', 'Riley', null);
INSERT INTO `actor` VALUES ('47', 'Juno ', 'Temple', null);
INSERT INTO `actor` VALUES ('48', 'Brenton ', 'Thwaites ', null);

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
  `id` int(11) NOT NULL,
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
INSERT INTO `cliente` VALUES ('1', '1', '70561214', 'Conjunto Hab. Justo Arias y Araguez Block G-1', '952992919', 'por trabajo de maestria - web');
INSERT INTO `cliente` VALUES ('3', '3', ' 4121650', 'urba tacna a3', '952411919', 'sin comentarios');

-- ----------------------------
-- Table structure for `detallepedido`
-- ----------------------------
DROP TABLE IF EXISTS `detallepedido`;
CREATE TABLE `detallepedido` (
  `id` int(11) NOT NULL,
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
-- Records of detallepedido
-- ----------------------------
INSERT INTO `detallepedido` VALUES ('1', '1', '3', '1', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('2', '1', '3', '2', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('3', '1', '2', '3', '0', '115.00');
INSERT INTO `detallepedido` VALUES ('4', '1', '1', '4', '0', '110.00');
INSERT INTO `detallepedido` VALUES ('5', '9', '1', '5', '0', '110.00');
INSERT INTO `detallepedido` VALUES ('6', '1', '3', '6', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('7', '1', '2', '7', '0', '115.00');
INSERT INTO `detallepedido` VALUES ('8', '1', '2', '8', '0', '115.00');
INSERT INTO `detallepedido` VALUES ('9', '1', '3', '9', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('10', '1', '3', '10', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('11', '1', '3', '11', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('12', '1', '1', '12', '0', '110.00');
INSERT INTO `detallepedido` VALUES ('13', '1', '3', '13', '0', '41.00');
INSERT INTO `detallepedido` VALUES ('14', '1', '1', '14', '0', '110.00');

-- ----------------------------
-- Table structure for `detallepelicula`
-- ----------------------------
DROP TABLE IF EXISTS `detallepelicula`;
CREATE TABLE `detallepelicula` (
  `id` int(11) NOT NULL auto_increment,
  `pelicula_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_detallepelicula_pelicula1_idx` (`pelicula_id`),
  KEY `fk_detallepelicula_actor1_idx` (`actor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detallepelicula
-- ----------------------------
INSERT INTO `detallepelicula` VALUES ('1', '1', '1');
INSERT INTO `detallepelicula` VALUES ('2', '1', '4');
INSERT INTO `detallepelicula` VALUES ('3', '1', '5');
INSERT INTO `detallepelicula` VALUES ('4', '1', '6');
INSERT INTO `detallepelicula` VALUES ('5', '1', '7');
INSERT INTO `detallepelicula` VALUES ('6', '1', '8');
INSERT INTO `detallepelicula` VALUES ('7', '1', '9');
INSERT INTO `detallepelicula` VALUES ('8', '1', '10');
INSERT INTO `detallepelicula` VALUES ('9', '2', '2');
INSERT INTO `detallepelicula` VALUES ('10', '2', '11');
INSERT INTO `detallepelicula` VALUES ('11', '2', '12');
INSERT INTO `detallepelicula` VALUES ('12', '2', '13');
INSERT INTO `detallepelicula` VALUES ('13', '2', '14');
INSERT INTO `detallepelicula` VALUES ('14', '2', '15');
INSERT INTO `detallepelicula` VALUES ('15', '2', '16');
INSERT INTO `detallepelicula` VALUES ('16', '2', '17');
INSERT INTO `detallepelicula` VALUES ('17', '3', '3');
INSERT INTO `detallepelicula` VALUES ('18', '3', '18');
INSERT INTO `detallepelicula` VALUES ('19', '3', '19');
INSERT INTO `detallepelicula` VALUES ('20', '3', '20');
INSERT INTO `detallepelicula` VALUES ('21', '3', '21');
INSERT INTO `detallepelicula` VALUES ('22', '3', '22');
INSERT INTO `detallepelicula` VALUES ('23', '3', '23');
INSERT INTO `detallepelicula` VALUES ('24', '3', '24');
INSERT INTO `detallepelicula` VALUES ('25', '4', '25');
INSERT INTO `detallepelicula` VALUES ('26', '4', '26');
INSERT INTO `detallepelicula` VALUES ('27', '4', '27');
INSERT INTO `detallepelicula` VALUES ('28', '4', '28');
INSERT INTO `detallepelicula` VALUES ('29', '4', '29');
INSERT INTO `detallepelicula` VALUES ('30', '4', '30');
INSERT INTO `detallepelicula` VALUES ('31', '4', '31');
INSERT INTO `detallepelicula` VALUES ('32', '4', '32');
INSERT INTO `detallepelicula` VALUES ('33', '6', '33');
INSERT INTO `detallepelicula` VALUES ('34', '6', '34');
INSERT INTO `detallepelicula` VALUES ('35', '6', '35');
INSERT INTO `detallepelicula` VALUES ('36', '6', '36');
INSERT INTO `detallepelicula` VALUES ('37', '6', '37');
INSERT INTO `detallepelicula` VALUES ('38', '6', '38');
INSERT INTO `detallepelicula` VALUES ('39', '6', '39');
INSERT INTO `detallepelicula` VALUES ('40', '6', '40');
INSERT INTO `detallepelicula` VALUES ('41', '7', '41');
INSERT INTO `detallepelicula` VALUES ('42', '7', '42');
INSERT INTO `detallepelicula` VALUES ('43', '7', '43');
INSERT INTO `detallepelicula` VALUES ('44', '7', '44');
INSERT INTO `detallepelicula` VALUES ('45', '7', '45');
INSERT INTO `detallepelicula` VALUES ('46', '7', '46');
INSERT INTO `detallepelicula` VALUES ('47', '7', '47');
INSERT INTO `detallepelicula` VALUES ('48', '7', '48');

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
INSERT INTO `director` VALUES ('4', 'Nick ', 'Cassavetes');
INSERT INTO `director` VALUES ('5', 'Rob ', 'Minkoff');
INSERT INTO `director` VALUES ('6', 'Craig ', 'Gillespie');
INSERT INTO `director` VALUES ('7', 'Robert ', 'Stromberg ');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES ('1', '2', 'vendedor');

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
INSERT INTO `genero` VALUES ('4', 'comedia', 'na');
INSERT INTO `genero` VALUES ('5', 'Infantil', 'na');
INSERT INTO `genero` VALUES ('6', 'Aventura', 'na');

-- ----------------------------
-- Table structure for `pedido`
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) default NULL,
  `empleado_id` int(11) default NULL,
  `fecha` datetime default NULL,
  `uid` varchar(45) default NULL,
  `estado` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `fk_venta_cliente1_idx` (`cliente_id`),
  KEY `fk_venta_empleado1_idx` (`empleado_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pedido
-- ----------------------------
INSERT INTO `pedido` VALUES ('1', '1', '0', '2015-01-18 05:09:01', '', '0');
INSERT INTO `pedido` VALUES ('2', '1', '0', '2015-01-18 05:10:11', '', '0');
INSERT INTO `pedido` VALUES ('3', '1', '0', '2015-01-18 05:13:15', '', '0');
INSERT INTO `pedido` VALUES ('4', '1', '7', '2015-01-18 05:13:30', '', '1');
INSERT INTO `pedido` VALUES ('5', '1', '2', '2015-01-18 05:13:54', '', '2');
INSERT INTO `pedido` VALUES ('6', '1', '0', '2015-01-18 05:15:36', '', '0');
INSERT INTO `pedido` VALUES ('7', '1', '0', '2015-01-18 05:15:49', '', '0');
INSERT INTO `pedido` VALUES ('8', '1', '8', '2015-01-18 05:16:16', '', '1');
INSERT INTO `pedido` VALUES ('9', '1', '0', '2015-01-18 05:16:33', '', '0');
INSERT INTO `pedido` VALUES ('10', '1', '0', '2015-01-18 05:17:22', '', '0');
INSERT INTO `pedido` VALUES ('11', '1', '0', '2015-01-18 05:17:55', '', '0');
INSERT INTO `pedido` VALUES ('12', '1', '0', '2015-01-18 05:18:41', '', '0');
INSERT INTO `pedido` VALUES ('13', '1', '0', '2015-01-18 05:20:38', '', '0');
INSERT INTO `pedido` VALUES ('14', '1', '0', '2015-01-18 05:27:07', '', '0');

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
  `imagen` varchar(45) default NULL,
  `ranking` int(11) default NULL,
  `nivel` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_pelicula_directorpelicula1_idx` (`director_id`),
  KEY `fk_pelicula_generopelicula1_idx` (`genero_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelicula
-- ----------------------------
INSERT INTO `pelicula` VALUES ('1', 'TRANSFORMERS LA ERA DE LA EXTINCION (BLU RAY)', '2014', '165 mins ', 'USA', '40', '115.00', '110.00', 'Han pasado 4 años desde la tragedia de Chicago y la humanidad sigue reparando los destrozos, pero tanto los Autobots como los Decepticons han desaparecido de la faz de la Tierra. Ahora el Gobierno de los Estados Unidos está utilizando la tecnología rescatada en el asedio de Chicago para desarrollar sus propios Transformers.\r\n\r\nAl frente del proyecto está Joshua Joyce, un arrogante diseñador que piensa que los Autobots son \"basura tecnológica\" y se cree capaz de fabricar unos robots infinitamente más avanzados.\r\n\r\nMientras tanto, Cade Yeager, un mecánico inventor, encuentra un Marmon semi-trailer. Al intentar repararlo, descubre que el camión no solo era un Transformer, sino también el mismísimo Optimus Prime, líder de los Autobots. Lo que Cade ignora son las consecuencias que pueden derivarse de este hallazgo.', 'Presentacion widescreen', '1', '1', '1.jpg', '4', 'R13');
INSERT INTO `pelicula` VALUES ('2', 'APUESTA MAXIMA (BLU RAY)', '2014', '91 mins ', 'USA', '10', '120.00', '115.00', 'Richie Furst es un estudiente de la universidad de Princeton que pierde el dinero que necesitaba para su matrícula al apostarlo en un juego de poker online.\r\n\r\nCuando descubre que el sitio web está alojado en una isla remota, va a enfrentar a su dueño, el millonario Ivan Block, pero termina convirtiendose en su discipulo y mano derecha.\r\n\r\nLa relación entre ambos alcanza el punto de ebullición mientras un agente del FBI intenta utilizar a Furst para detener a Block.', 'Escenas eliminadas', '2', '2', '2.jpg', '4', 'R13');
INSERT INTO `pelicula` VALUES ('3', 'BAJO LA MISMA ESTRELLA', '2014', '126 mins ', 'USA', '23', '53.00', '41.00', 'A pesar de que un milagro médico ha conseguido reducir su tumor y darle unos años más de vida, Hazel siempre se ha considerado una enferma terminal.\r\n\r\nSin embargo, cuando Gus entra a formar parte del grupo de ayuda para enfermos de cáncer juvenil, la vida de Hazel se transforma por completo.', 'El elenco', '3', '3', '3.jpg', '4', 'R13');
INSERT INTO `pelicula` VALUES ('4', ' MUJERES AL ATAQUE ', '2014', '109 mins ', 'USA', '33', '53.00', '41.00', 'Carly descubre que su nuevo novio Mark es un fraude y peor cuando conoce accidentalmente a su esposa Kate.\r\n\r\nCarly se encuentra de repente consolando a Kate y su improbable amistad se solidifica cuando se dan cuenta de que Mark las está engañando a las dos con otra mujer, Amber.\r\n\r\nLas tres mujeres unen fuerzas, trazando un plan indignante para vengarse.', 'Subtítulos:  Inglés, Castellano y Portugués', '4', '4', '4.jpg', '4', 'R13');
INSERT INTO `pelicula` VALUES ('5', 'LAS AVENTURAS DE PEABODY Y SHERMAN ', '2014', '93 mins ', 'USA', '52', '52.00', '48.00', 'El Sr. Peabody, el perro más exitoso del mundo, y su travieso hijo Sherman, van a utilizar su máquina del tiempo –el Vueltatrás– para embarcarse en la aventura más escandalosa que se haya visto jamás.\r\n\r\nSin embargo, en un desafortunado accidente, Sherman le muestra la máquina a su amiga Penny para impresionarla y acaban creando un agujero en el universo, provocando el caos en los acontecimientos más importantes de la historia.\r\n\r\nAntes de que el pasado, el presente y el futuro queden alterados, el Sr. Peabody acude al rescate mientras tiene que hacer frente al mayor desafío de siempre: ser padre. Juntos dejarán su huella en la historia. ', 'Zona:  4 ', '5', '5', '5.jpg', '4', 'R13');
INSERT INTO `pelicula` VALUES ('6', 'UN GOLPE DE TALENTO ', '2014', '124 mins ', 'USA', '52', '52.00', '48.00', 'Un Golpe de Talento está basada en una historia real de autodescubrimiento, segundas oportunidades y triunfo personal frente a las adversidades.\r\n\r\nEn un último intento por salvar su carrera el representante de deportatistas JB Bernstein planea encontrar al próximo gran lanzador de beisbol de las ligas mayores, entre los jugadores de criquet de la India.  Pronto descubre a dos jugadores que pueden lanzar rápido pero no saben nada sobre beisbol ni Estados Unidos.\r\n\r\nEste será un increible y emocionante viaje que los pondrá a todos a prueba, especialmente a JB, quien aprenderá valiosas lecciones de vida acerca del trabajo en equipo, el compromiso, y lo que significa ser una familia.', 'Audio:  Inglés', '6', '3', '6.jpg', '4', 'R13');
INSERT INTO `pelicula` VALUES ('7', 'MALEFICA', '2014', '96 mins ', 'USA', '42', '52.00', '48.00', 'Es la historia jamás contada de Maléfica, la villana más querida de Disney, la mala de la Bella Durmiente.\r\n\r\nLa película relata los acontecimientos que endurecieron su corazón y la llevaron a lanzar una maldición sobre la pequeña Aurora.', 'Audio:  Inglés y Castellano', '7', '6', '7.jpg', '4', 'R13');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', '1', 'Jimmy Cristian', 'Muñoz Miranda', 'jimmy', '010207', 'jimz_21@hotmail.com', '1', '2015-01-18 06:35:54');
INSERT INTO `usuario` VALUES ('2', '2', 'Juan', 'Orosco', 'juan', '1234', 'juan@h.com', '1', '2015-01-18 06:40:03');
INSERT INTO `usuario` VALUES ('3', '1', 'j', 'm', 'wavejim', '130814', 'jm@hotmail.com', '1', '0000-00-00 00:00:00');
INSERT INTO `usuario` VALUES ('4', '3', 'administrador', 'sistema', 'admin', '123456789', 'admin@h.com', '1', '2015-01-18 06:50:01');
INSERT INTO `usuario` VALUES ('5', '2', 'jose antonio', 'manrique lopez', 'jose', '159', 'jose@h.com', '1', null);
INSERT INTO `usuario` VALUES ('6', '2', 'raul', 'jimenez', 'raul', '987', 'raul@h.com', '1', null);
INSERT INTO `usuario` VALUES ('7', '2', 'silvia', 'moreno', 'silvia', '123', 'silvia@h.com', '1', '2015-01-18 05:24:10');
INSERT INTO `usuario` VALUES ('8', '2', 'claudia', 'pachas', 'claudia', '123', 'claudia@h.com', '1', '2015-01-18 05:24:49');
