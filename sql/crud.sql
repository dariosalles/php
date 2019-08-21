# Host: 127.0.0.1  (Version 5.5.5-10.1.40-MariaDB)
# Date: 2019-08-21 01:35:10
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tb_arquivos"
#

CREATE TABLE `tb_arquivos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "tb_arquivos"
#


#
# Structure for table "tb_login"
#

CREATE TABLE `tb_login` (
  `id_login` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "tb_login"
#

INSERT INTO `tb_login` VALUES (20,'Dario'),(21,'André'),(22,'Samuel'),(23,'Carlos');
