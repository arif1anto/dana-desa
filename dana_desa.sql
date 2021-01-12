/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.16 : Database - dana_desa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dana_desa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dana_desa`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nama_petugas` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`nama_petugas`) values (2,'admin','admin','sasasa'),(3,'admin','admin','sasasa');

/*Table structure for table `data_warga` */

DROP TABLE IF EXISTS `data_warga`;

CREATE TABLE `data_warga` (
  `no_peserta` varchar(10) NOT NULL,
  `id_periode` int(2) DEFAULT NULL,
  `alamat` text,
  `desa` varchar(30) DEFAULT NULL,
  `nama_kk` varchar(30) DEFAULT NULL,
  `nilai_fisik_rumah` double DEFAULT NULL,
  `nilai_kesehatan` double DEFAULT NULL,
  `nilai_pendidikan` double DEFAULT NULL,
  `nilai_penghasilan` double DEFAULT NULL,
  `nilai_jumlah_kk` double DEFAULT NULL,
  `nilai_kondisi_alam` double DEFAULT NULL,
  PRIMARY KEY (`no_peserta`),
  KEY `FK_data_warga` (`id_periode`),
  CONSTRAINT `FK_data_warga` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_warga` */

insert  into `data_warga`(`no_peserta`,`id_periode`,`alamat`,`desa`,`nama_kk`,`nilai_fisik_rumah`,`nilai_kesehatan`,`nilai_pendidikan`,`nilai_penghasilan`,`nilai_jumlah_kk`,`nilai_kondisi_alam`) values ('13001',3,'','','',3,0.142857142857143,0.4,60,2,11),('13002',3,'','','',3,0.285714285714286,0.4,40,1,16),('13003',3,'','','',5,0.428571428571429,0.266666666666667,80,1,16.5),('13004',3,'','','',1,0.642857142857143,0.333333333333333,40,1,15),('13005',3,'','','',3,0.5,0.133333333333333,40,1,12),('13006',3,'','','',5,0.285714285714286,0.2,20,2,16),('13007',3,'','','',5,0.142857142857143,0.0666666666666667,60,1,16),('13008',3,'','','',3,0.5,0.266666666666667,80,1,14),('13009',3,'','','',1,0.285714285714286,0.333333333333333,60,1,16),('13010',3,'','','',3,0.214285714285714,0.333333333333333,60,2,13),('13011',3,'','','',5,0.142857142857143,0.333333333333333,40,1,16),('13012',3,'','','',1,0.428571428571429,0.266666666666667,40,1,19),('13013',3,'','','',5,0.285714285714286,0.4,20,1,17),('13014',3,'','','',3,0.785714285714286,0.266666666666667,40,1,18),('13015',3,'','','',5,0.142857142857143,0.133333333333333,40,1,16),('13016',3,'','','',3,0.214285714285714,0.133333333333333,80,1,12),('13017',3,'','','',5,0.285714285714286,0.2,60,2,18),('13018',3,'','','',3,0.571428571428571,0.266666666666667,80,1,18),('13019',3,'','','',5,0.142857142857143,0.0666666666666667,60,1,13),('13020',3,'','','',1,0.142857142857143,0.333333333333333,60,1,18);

/*Table structure for table `hasil_spk` */

DROP TABLE IF EXISTS `hasil_spk`;

CREATE TABLE `hasil_spk` (
  `no_peserta` varchar(10) NOT NULL,
  `id_periode` int(2) NOT NULL,
  `nilai_hasil` double DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no_peserta`,`id_periode`),
  KEY `FK_hasil_pkh` (`id_periode`),
  KEY `FK_hasil_pkh1` (`no_peserta`),
  CONSTRAINT `FK_hasil_pkh1` FOREIGN KEY (`no_peserta`) REFERENCES `data_warga` (`no_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hasil_spk` */

insert  into `hasil_spk`(`no_peserta`,`id_periode`,`nilai_hasil`,`ket`) values ('13001',3,0.0499134567944267,'Bukan Prioritas'),('13002',3,0.05121239963108392,'Bukan Prioritas'),('13003',3,0.06842018930439414,'Prioritas'),('13004',3,0.04424368141879769,'Bukan Prioritas'),('13005',3,0.04719768241745271,'Bukan Prioritas'),('13006',3,0.04893051809900871,'Bukan Prioritas'),('13007',3,0.0419881633719535,'Bukan Prioritas'),('13008',3,0.061090805451172306,'Bukan Prioritas'),('13009',3,0.04106160085236725,'Bukan Prioritas'),('13010',3,0.053556696381111914,'Bukan Prioritas'),('13011',3,0.04928946760247485,'Bukan Prioritas'),('13012',3,0.04039826715928085,'Bukan Prioritas'),('13013',3,0.05096408225143545,'Bukan Prioritas'),('13014',3,0.05969572457675068,'Bukan Prioritas'),('13015',3,0.04295988655773293,'Bukan Prioritas'),('13016',3,0.04576477333835347,'Bukan Prioritas'),('13017',3,0.06167644276192549,'Bukan Prioritas'),('13018',3,0.0643411305140245,'Bukan Prioritas'),('13019',3,0.041125312901687604,'Bukan Prioritas'),('13020',3,0.03616971861456527,'Bukan Prioritas');

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(3) NOT NULL,
  `nama_kriteria` varchar(200) DEFAULT NULL,
  `jenis_kriteria` varchar(15) DEFAULT NULL,
  `bobot_kriteria` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kriteria` */

insert  into `kriteria`(`id_kriteria`,`nama_kriteria`,`jenis_kriteria`,`bobot_kriteria`) values ('C1','Fisik Rumah','K',5),('C2','Kesehatan','K',4),('C3','Pendidikan','K',3),('C4','Penghasilan Perbulan','K',4),('C5','Jumlah KK','K',2),('C6','Kondisi Alam (Jarak ke Kecamatan dalam KM)','K',2);

/*Table structure for table `nilai_subkriteria` */

DROP TABLE IF EXISTS `nilai_subkriteria`;

CREATE TABLE `nilai_subkriteria` (
  `no_peserta` varchar(10) NOT NULL,
  `id_periode` int(11) DEFAULT NULL,
  `c21` double DEFAULT NULL,
  `c22` double DEFAULT NULL,
  `c23` double DEFAULT NULL,
  `c24` double DEFAULT NULL,
  `c31` double DEFAULT NULL,
  `c32` double DEFAULT NULL,
  `c33` double DEFAULT NULL,
  `c34` double DEFAULT NULL,
  `c35` double DEFAULT NULL,
  PRIMARY KEY (`no_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai_subkriteria` */

insert  into `nilai_subkriteria`(`no_peserta`,`id_periode`,`c21`,`c22`,`c23`,`c24`,`c31`,`c32`,`c33`,`c34`,`c35`) values ('13001',3,1,0,0,0,0,1,0,1,0),('13002',3,0,0,0,1,1,0,0,0,1),('13003',3,1,0,0,1,0,1,0,0,0),('13004',3,2,0,1,0,1,0,0,0,0),('13005',3,0,1,0,1,0,0,0,1,0),('13006',3,2,0,0,0,0,0,1,0,0),('13007',3,1,0,0,0,0,0,0,0,1),('13008',3,1,0,1,0,0,1,0,0,0),('13009',3,0,0,0,1,1,0,0,0,0),('13010',3,0,1,0,0,0,0,1,1,0),('13011',3,1,0,0,0,1,0,0,0,0),('13012',3,1,0,0,1,0,1,0,0,0),('13013',3,2,0,0,0,1,0,0,0,1),('13014',3,1,0,1,1,0,1,0,0,0),('13015',3,1,0,0,0,0,0,0,1,0),('13016',3,0,1,0,0,0,0,0,1,0),('13017',3,0,0,0,1,0,0,1,0,0),('13018',3,0,1,1,0,0,1,0,0,0),('13019',3,1,0,0,0,0,0,0,0,1),('13020',3,1,0,0,0,0,0,1,1,0);

/*Table structure for table `periode` */

DROP TABLE IF EXISTS `periode`;

CREATE TABLE `periode` (
  `id_periode` int(2) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `periode` */

insert  into `periode`(`id_periode`,`tahun`) values (1,2016),(2,2017),(3,2018),(4,2015);

/*Table structure for table `sub_kriteria` */

DROP TABLE IF EXISTS `sub_kriteria`;

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` varchar(4) NOT NULL,
  `id_kriteria` varchar(3) DEFAULT NULL,
  `nama_sub_kriteria` varchar(30) DEFAULT NULL,
  `bobot_sub_kriteria` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_sub_kriteria`),
  KEY `FK_sub_kriteria` (`id_kriteria`),
  CONSTRAINT `FK_SUB_Kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sub_kriteria` */

insert  into `sub_kriteria`(`id_sub_kriteria`,`id_kriteria`,`nama_sub_kriteria`,`bobot_sub_kriteria`) values ('C21','C2','Anak Balita',2),('C22','C2','Ibu Hamil/Menyusui',3),('C23','C2','Disabilitas',5),('C24','C2','Lansia',4),('C31','C3','Pra Sekolah',5),('C32','C3','SD Sederajat',4),('C33','C3','SMP Sederajat',3),('C34','C3','SMA Sederajat',2),('C35','C3','Perguruan Tinggi',1);

/*Table structure for table `nor_kriteria` */

DROP TABLE IF EXISTS `nor_kriteria`;

/*!50001 DROP VIEW IF EXISTS `nor_kriteria` */;
/*!50001 DROP TABLE IF EXISTS `nor_kriteria` */;

/*!50001 CREATE TABLE  `nor_kriteria`(
 `id_kriteria` varchar(3) ,
 `bobot` decimal(14,4) 
)*/;

/*Table structure for table `p1_datawarga` */

DROP TABLE IF EXISTS `p1_datawarga`;

/*!50001 DROP VIEW IF EXISTS `p1_datawarga` */;
/*!50001 DROP TABLE IF EXISTS `p1_datawarga` */;

/*!50001 CREATE TABLE  `p1_datawarga`(
 `no_peserta` varchar(10) ,
 `id_periode` int(2) ,
 `c1` double ,
 `c2` double ,
 `c3` double ,
 `c4` double ,
 `c5` double ,
 `c6` double 
)*/;

/*Table structure for table `p2_datawarga` */

DROP TABLE IF EXISTS `p2_datawarga`;

/*!50001 DROP VIEW IF EXISTS `p2_datawarga` */;
/*!50001 DROP TABLE IF EXISTS `p2_datawarga` */;

/*!50001 CREATE TABLE  `p2_datawarga`(
 `no_peserta` varchar(10) ,
 `id_periode` int(2) ,
 `c1` double ,
 `c2` double ,
 `c3` double ,
 `c4` double ,
 `c5` double ,
 `c6` double 
)*/;

/*Table structure for table `p3_datawarga` */

DROP TABLE IF EXISTS `p3_datawarga`;

/*!50001 DROP VIEW IF EXISTS `p3_datawarga` */;
/*!50001 DROP TABLE IF EXISTS `p3_datawarga` */;

/*!50001 CREATE TABLE  `p3_datawarga`(
 `no_peserta` varchar(10) ,
 `id_periode` int(2) ,
 `vector_s` double 
)*/;

/*Table structure for table `p4_datawarga` */

DROP TABLE IF EXISTS `p4_datawarga`;

/*!50001 DROP VIEW IF EXISTS `p4_datawarga` */;
/*!50001 DROP TABLE IF EXISTS `p4_datawarga` */;

/*!50001 CREATE TABLE  `p4_datawarga`(
 `no_peserta` varchar(10) ,
 `id_periode` int(2) ,
 `vector_s` double ,
 `vector_v` double 
)*/;

/*View structure for view nor_kriteria */

/*!50001 DROP TABLE IF EXISTS `nor_kriteria` */;
/*!50001 DROP VIEW IF EXISTS `nor_kriteria` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nor_kriteria` AS select `kriteria`.`id_kriteria` AS `id_kriteria`,(`kriteria`.`bobot_kriteria` / (select sum(`kriteria`.`bobot_kriteria`) from `kriteria`)) AS `bobot` from `kriteria` */;

/*View structure for view p1_datawarga */

/*!50001 DROP TABLE IF EXISTS `p1_datawarga` */;
/*!50001 DROP VIEW IF EXISTS `p1_datawarga` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `p1_datawarga` AS select `data_warga`.`no_peserta` AS `no_peserta`,`data_warga`.`id_periode` AS `id_periode`,`data_warga`.`nilai_fisik_rumah` AS `c1`,`data_warga`.`nilai_kesehatan` AS `c2`,`data_warga`.`nilai_pendidikan` AS `c3`,`data_warga`.`nilai_penghasilan` AS `c4`,`data_warga`.`nilai_jumlah_kk` AS `c5`,`data_warga`.`nilai_kondisi_alam` AS `c6` from `data_warga` */;

/*View structure for view p2_datawarga */

/*!50001 DROP TABLE IF EXISTS `p2_datawarga` */;
/*!50001 DROP VIEW IF EXISTS `p2_datawarga` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `p2_datawarga` AS select `p1_datawarga`.`no_peserta` AS `no_peserta`,`p1_datawarga`.`id_periode` AS `id_periode`,pow(`p1_datawarga`.`c1`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C1') limit 1)) AS `c1`,pow(`p1_datawarga`.`c2`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C2') limit 1)) AS `c2`,pow(`p1_datawarga`.`c3`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C3') limit 1)) AS `c3`,pow(`p1_datawarga`.`c4`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C4') limit 1)) AS `c4`,pow(`p1_datawarga`.`c5`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C5') limit 1)) AS `c5`,pow(`p1_datawarga`.`c6`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C6') limit 1)) AS `c6` from `p1_datawarga` */;

/*View structure for view p3_datawarga */

/*!50001 DROP TABLE IF EXISTS `p3_datawarga` */;
/*!50001 DROP VIEW IF EXISTS `p3_datawarga` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `p3_datawarga` AS select `p2_datawarga`.`no_peserta` AS `no_peserta`,`p2_datawarga`.`id_periode` AS `id_periode`,(((((`p2_datawarga`.`c1` * `p2_datawarga`.`c2`) * `p2_datawarga`.`c3`) * `p2_datawarga`.`c4`) * `p2_datawarga`.`c5`) * `p2_datawarga`.`c6`) AS `vector_s` from `p2_datawarga` */;

/*View structure for view p4_datawarga */

/*!50001 DROP TABLE IF EXISTS `p4_datawarga` */;
/*!50001 DROP VIEW IF EXISTS `p4_datawarga` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `p4_datawarga` AS select `p3_datawarga`.`no_peserta` AS `no_peserta`,`p3_datawarga`.`id_periode` AS `id_periode`,`p3_datawarga`.`vector_s` AS `vector_s`,(`p3_datawarga`.`vector_s` / (select sum(`p3_datawarga`.`vector_s`) from `p3_datawarga`)) AS `vector_v` from `p3_datawarga` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
