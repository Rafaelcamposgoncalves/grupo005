SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_professor`;
CREATE TABLE `tb_professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_professor` (`id`, `name`, `user`, `password`) VALUES
(1,	'Administrador',	'admin',	'admin');

DROP TABLE IF EXISTS `tb_sugestoes`;
CREATE TABLE `tb_sugestoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `nome` varchar(60) COLLATE utf8_bin NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `sugestao` text COLLATE utf8_bin NOT NULL,
  `analise` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `tb_sugestoes` (`id`, `data`, `nome`, `telefone`, `email`, `sugestao`, `analise`) VALUES
(1,	'2021-09-06',	'Rafael Campos Gonçalves',	2147483647,	'mozudos@gmail.com',	'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	0),
(2,	'2021-09-07',	'Crocodilo do Croco Crocal',	1133859612,	'crocal@gmail.com',	'Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	0),
(8,	'2021-09-07',	'Cristiane Silva Gonçalves',	1333831031,	'cris_tiane.pe@hotmail.com',	'Tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatu',	1),
(21,	'2021-09-07',	'Daniel Silva Gonçalves',	0,	'daniel@gmail.com',	'teste do teste',	0);