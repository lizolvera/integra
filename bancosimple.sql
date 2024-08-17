/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - bdbanco
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdbanco` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bdbanco`;

/*Table structure for table `tblanuncios` */

DROP TABLE IF EXISTS `tblanuncios`;

CREATE TABLE `tblanuncios` (
  `idAnuncios` int(11) NOT NULL AUTO_INCREMENT,
  `vchDescripcion` varchar(200) DEFAULT NULL,
  `vchImagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAnuncios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblanuncios` */

insert  into `tblanuncios`(`idAnuncios`,`vchDescripcion`,`vchImagen`) values 
(1,'El mejor Banco de la Región','Logo1.png'),
(2,'Crea tu cuenta Premium','Logo2.png'),
(3,'Aprovecha la oportunidad solicita tu Tarjeta digital','tarjeta.png');

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `vchNombre` varchar(100) DEFAULT NULL,
  `vchAp` varchar(100) DEFAULT NULL,
  `vchAm` varchar(10) DEFAULT NULL,
  `vchEmail` varchar(150) DEFAULT NULL,
  `vchUsuario` varchar(100) DEFAULT NULL,
  `vchNIP` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tblcliente` */

insert  into `tblcliente`(`idcliente`,`vchNombre`,`vchAp`,`vchAm`,`vchEmail`,`vchUsuario`,`vchNIP`) values 
(1,'Carlos Perez','Monterrey','8112123652','carlos.p@gmail.com','Carlos','5421'),
(3,'Juan Rivera','Huejutla','7898978958','juan.r@gmail.com','Juan','1234'),
(4,'Sofia Beltran A','Mexico DF','5512326523','sofy@gmail.com','Sofia','6582'),
(5,'Karla Robles Pardo\r\n','Col, Centro, Huejutla, Hgo','7745521242','karlarp@gmail.com\r\n','Karla','4785'),
(6,'Maria Robles','Col. la lomita','7714152145','mariar@gmail.com','Maria','9985');

/*Table structure for table `tblcuenta` */

DROP TABLE IF EXISTS `tblcuenta`;

CREATE TABLE `tblcuenta` (
  `vchnum_cuenta` varchar(16) NOT NULL,
  `fltsaldo` float DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`vchnum_cuenta`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `tblcuenta_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `tblcliente` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcuenta` */

insert  into `tblcuenta`(`vchnum_cuenta`,`fltsaldo`,`idcliente`) values 
('4585458545855421',8000,5),
('4585458545856512',15000,4),
('4585458545856978',5000,1),
('4585458545856998',18000,6),
('4585458545857845',27500,3);

/*Table structure for table `tblmovimientos` */

DROP TABLE IF EXISTS `tblmovimientos`;

CREATE TABLE `tblmovimientos` (
  `idMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `vchno_cuenta` varchar(16) DEFAULT NULL,
  `fltTotal` float DEFAULT NULL,
  `Movimiento` enum('RETIRO','DEPOSITO') DEFAULT NULL,
  PRIMARY KEY (`idMovimiento`),
  KEY `vchno_cuenta` (`vchno_cuenta`),
  CONSTRAINT `tblmovimientos_ibfk_2` FOREIGN KEY (`vchno_cuenta`) REFERENCES `tblcuenta` (`vchnum_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `tblmovimientos` */

insert  into `tblmovimientos`(`idMovimiento`,`vchno_cuenta`,`fltTotal`,`Movimiento`) values 
(52,'4585458545857845',1000,'DEPOSITO'),
(53,'4585458545857845',1000,'DEPOSITO'),
(54,'4585458545857845',1000,'RETIRO'),
(55,'4585458545857845',1000,'RETIRO'),
(56,'4585458545857845',1000,'DEPOSITO'),
(57,'4585458545857845',1000,'DEPOSITO'),
(58,'4585458545857845',500,'DEPOSITO'),
(59,'4585458545856998',1000,'RETIRO'),
(60,'4585458545856998',1000,'RETIRO'),
(61,'4585458545856998',10000,'DEPOSITO');

/* Procedure structure for procedure `SPinsertaCliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `SPinsertaCliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SPinsertaCliente`(in nom varchar(50),in dir varchar(50), in tel varchar(50),
				in email varchar(50),in usuario varchar(50),in nip varchar(200))
BEGIN
		Insert into tblcliente(vchnombre,vchdireccion, vchtelefono,vchEmail,vchUsuario,vchNIP)
		values(nom,dir, tel, email,usuario,md5(nip));
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SPInsertaCuenta` */

/*!50003 DROP PROCEDURE IF EXISTS  `SPInsertaCuenta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SPInsertaCuenta`(in noC varchar(20),in saldo float, in idC int )
BEGIN
		insert into tblcuenta(vchnum_cuenta,fltsaldo,idcliente) values(noC,saldo,idC);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spInsertaMovimientos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertaMovimientos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertaMovimientos`(IN noc VARCHAR(20),in total float, in movimiento varchar(20) )
BEGIN
		
	INSERT INTO tblmovimientos(vchno_cuenta,fltTotal,Movimiento) VALUES(noc,total,movimiento);
		
END */$$
DELIMITER ;

/* Procedure structure for procedure `spLogin` */

/*!50003 DROP PROCEDURE IF EXISTS  `spLogin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogin`(IN nip varchar(200), out respuesta bool)
BEGIN
		
		if exists  (SELECT idcliente,vchUsuario,vchNIP FROM tblcliente
			WHERE tblcliente.`vchNIP`=nip) then
			set respuesta=true;
		else
			set respuesta=false;
		end if;
		
	END */$$
DELIMITER ;

/* Procedure structure for procedure `spTraeCliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `spTraeCliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spTraeCliente`(IN nip varchar(200))
BEGIN
		
		SELECT idcliente,vchnombre FROM tblcliente
		WHERE tblcliente.`vchNIP`=nip;
		
	END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_consulta_Anuncios` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_consulta_Anuncios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_Anuncios`()
BEGIN
		select * from tblAnuncios;
	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
