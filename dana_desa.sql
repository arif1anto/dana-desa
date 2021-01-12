/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50516
 Source Host           : localhost:3306
 Source Schema         : dana_desa

 Target Server Type    : MySQL
 Target Server Version : 50516
 File Encoding         : 65001

 Date: 12/01/2021 11:32:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_petugas` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (2, 'admin', 'admin', 'sasasa');
INSERT INTO `admin` VALUES (3, 'admin', 'admin', 'sasasa');

-- ----------------------------
-- Table structure for data_warga
-- ----------------------------
DROP TABLE IF EXISTS `data_warga`;
CREATE TABLE `data_warga`  (
  `no_peserta` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_periode` int(2) NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `desa` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_kk` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_fisik_rumah` double NULL DEFAULT NULL,
  `nilai_kesehatan` double NULL DEFAULT NULL,
  `nilai_pendidikan` double NULL DEFAULT NULL,
  `nilai_penghasilan` double NULL DEFAULT NULL,
  `nilai_jumlah_kk` double NULL DEFAULT NULL,
  `nilai_kondisi_alam` double NULL DEFAULT NULL,
  PRIMARY KEY (`no_peserta`) USING BTREE,
  INDEX `FK_data_warga`(`id_periode`) USING BTREE,
  CONSTRAINT `FK_data_warga` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_warga
-- ----------------------------
INSERT INTO `data_warga` VALUES ('13001', 3, '', '', '', 3, 0.142857142857143, 0.4, 60, 2, 11);
INSERT INTO `data_warga` VALUES ('13002', 3, '', '', '', 3, 0.285714285714286, 0.4, 40, 1, 16);
INSERT INTO `data_warga` VALUES ('13003', 3, '', '', '', 5, 0.428571428571429, 0.266666666666667, 80, 1, 16.5);
INSERT INTO `data_warga` VALUES ('13004', 3, '', '', '', 1, 0.642857142857143, 0.333333333333333, 40, 1, 15);
INSERT INTO `data_warga` VALUES ('13005', 3, '', '', '', 3, 0.5, 0.133333333333333, 40, 1, 12);
INSERT INTO `data_warga` VALUES ('13006', 3, '', '', '', 5, 0.285714285714286, 0.2, 20, 2, 16);
INSERT INTO `data_warga` VALUES ('13007', 3, '', '', '', 5, 0.142857142857143, 0.0666666666666667, 60, 1, 16);
INSERT INTO `data_warga` VALUES ('13008', 3, '', '', '', 3, 0.5, 0.266666666666667, 80, 1, 14);
INSERT INTO `data_warga` VALUES ('13009', 3, '', '', '', 1, 0.285714285714286, 0.333333333333333, 60, 1, 16);
INSERT INTO `data_warga` VALUES ('13010', 3, '', '', '', 3, 0.214285714285714, 0.333333333333333, 60, 2, 13);
INSERT INTO `data_warga` VALUES ('13011', 3, '', '', '', 5, 0.142857142857143, 0.333333333333333, 40, 1, 16);
INSERT INTO `data_warga` VALUES ('13012', 3, '', '', '', 1, 0.428571428571429, 0.266666666666667, 40, 1, 19);
INSERT INTO `data_warga` VALUES ('13013', 3, '', '', '', 5, 0.285714285714286, 0.4, 20, 1, 17);
INSERT INTO `data_warga` VALUES ('13014', 3, '', '', '', 3, 0.785714285714286, 0.266666666666667, 40, 1, 18);
INSERT INTO `data_warga` VALUES ('13015', 3, '', '', '', 5, 0.142857142857143, 0.133333333333333, 40, 1, 16);
INSERT INTO `data_warga` VALUES ('13016', 3, '', '', '', 3, 0.214285714285714, 0.133333333333333, 80, 1, 12);
INSERT INTO `data_warga` VALUES ('13017', 3, '', '', '', 5, 0.285714285714286, 0.2, 60, 2, 18);
INSERT INTO `data_warga` VALUES ('13018', 3, '', '', '', 3, 0.571428571428571, 0.266666666666667, 80, 1, 18);
INSERT INTO `data_warga` VALUES ('13019', 3, '', '', '', 5, 0.142857142857143, 0.0666666666666667, 60, 1, 13);
INSERT INTO `data_warga` VALUES ('13020', 3, '', '', '', 1, 0.142857142857143, 0.333333333333333, 60, 1, 18);

-- ----------------------------
-- Table structure for hasil_spk
-- ----------------------------
DROP TABLE IF EXISTS `hasil_spk`;
CREATE TABLE `hasil_spk`  (
  `no_peserta` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_periode` int(2) NOT NULL,
  `nilai_hasil` double NULL DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no_peserta`, `id_periode`) USING BTREE,
  INDEX `FK_hasil_pkh`(`id_periode`) USING BTREE,
  INDEX `FK_hasil_pkh1`(`no_peserta`) USING BTREE,
  CONSTRAINT `FK_hasil_pkh1` FOREIGN KEY (`no_peserta`) REFERENCES `data_warga` (`no_peserta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hasil_spk
-- ----------------------------
INSERT INTO `hasil_spk` VALUES ('13001', 3, 0.0499134567944267, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13002', 3, 0.05121239963108392, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13003', 3, 0.06842018930439414, 'Prioritas');
INSERT INTO `hasil_spk` VALUES ('13004', 3, 0.04424368141879769, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13005', 3, 0.04719768241745271, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13006', 3, 0.04893051809900871, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13007', 3, 0.0419881633719535, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13008', 3, 0.061090805451172306, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13009', 3, 0.04106160085236725, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13010', 3, 0.053556696381111914, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13011', 3, 0.04928946760247485, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13012', 3, 0.04039826715928085, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13013', 3, 0.05096408225143545, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13014', 3, 0.05969572457675068, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13015', 3, 0.04295988655773293, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13016', 3, 0.04576477333835347, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13017', 3, 0.06167644276192549, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13018', 3, 0.0643411305140245, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13019', 3, 0.041125312901687604, 'Bukan Prioritas');
INSERT INTO `hasil_spk` VALUES ('13020', 3, 0.03616971861456527, 'Bukan Prioritas');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id_kriteria` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kriteria` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kriteria` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bobot_kriteria` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`) USING BTREE,
  INDEX `id_kriteria`(`id_kriteria`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES ('C1', 'Fisik Rumah', 'K', 5);
INSERT INTO `kriteria` VALUES ('C2', 'Kesehatan', 'K', 4);
INSERT INTO `kriteria` VALUES ('C3', 'Pendidikan', 'K', 3);
INSERT INTO `kriteria` VALUES ('C4', 'Penghasilan Perbulan', 'K', 4);
INSERT INTO `kriteria` VALUES ('C5', 'Jumlah KK', 'K', 2);
INSERT INTO `kriteria` VALUES ('C6', 'Kondisi Alam (Jarak ke Kecamatan dalam KM)', 'K', 2);

-- ----------------------------
-- Table structure for nilai_subkriteria
-- ----------------------------
DROP TABLE IF EXISTS `nilai_subkriteria`;
CREATE TABLE `nilai_subkriteria`  (
  `no_peserta` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_periode` int(11) NULL DEFAULT NULL,
  `c21` double NULL DEFAULT NULL,
  `c22` double NULL DEFAULT NULL,
  `c23` double NULL DEFAULT NULL,
  `c24` double NULL DEFAULT NULL,
  `c31` double NULL DEFAULT NULL,
  `c32` double NULL DEFAULT NULL,
  `c33` double NULL DEFAULT NULL,
  `c34` double NULL DEFAULT NULL,
  `c35` double NULL DEFAULT NULL,
  PRIMARY KEY (`no_peserta`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of nilai_subkriteria
-- ----------------------------
INSERT INTO `nilai_subkriteria` VALUES ('13001', 3, 1, 0, 0, 0, 0, 1, 0, 1, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13002', 3, 0, 0, 0, 1, 1, 0, 0, 0, 1);
INSERT INTO `nilai_subkriteria` VALUES ('13003', 3, 1, 0, 0, 1, 0, 1, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13004', 3, 2, 0, 1, 0, 1, 0, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13005', 3, 0, 1, 0, 1, 0, 0, 0, 1, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13006', 3, 2, 0, 0, 0, 0, 0, 1, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13007', 3, 1, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `nilai_subkriteria` VALUES ('13008', 3, 1, 0, 1, 0, 0, 1, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13009', 3, 0, 0, 0, 1, 1, 0, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13010', 3, 0, 1, 0, 0, 0, 0, 1, 1, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13011', 3, 1, 0, 0, 0, 1, 0, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13012', 3, 1, 0, 0, 1, 0, 1, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13013', 3, 2, 0, 0, 0, 1, 0, 0, 0, 1);
INSERT INTO `nilai_subkriteria` VALUES ('13014', 3, 1, 0, 1, 1, 0, 1, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13015', 3, 1, 0, 0, 0, 0, 0, 0, 1, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13016', 3, 0, 1, 0, 0, 0, 0, 0, 1, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13017', 3, 0, 0, 0, 1, 0, 0, 1, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13018', 3, 0, 1, 1, 0, 0, 1, 0, 0, 0);
INSERT INTO `nilai_subkriteria` VALUES ('13019', 3, 1, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `nilai_subkriteria` VALUES ('13020', 3, 1, 0, 0, 0, 0, 0, 1, 1, 0);

-- ----------------------------
-- Table structure for periode
-- ----------------------------
DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode`  (
  `id_periode` int(2) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_periode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of periode
-- ----------------------------
INSERT INTO `periode` VALUES (1, 2016);
INSERT INTO `periode` VALUES (2, 2017);
INSERT INTO `periode` VALUES (3, 2018);
INSERT INTO `periode` VALUES (4, 2015);

-- ----------------------------
-- Table structure for sub_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria`  (
  `id_sub_kriteria` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kriteria` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sub_kriteria` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bobot_sub_kriteria` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sub_kriteria`) USING BTREE,
  INDEX `FK_sub_kriteria`(`id_kriteria`) USING BTREE,
  CONSTRAINT `FK_SUB_Kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sub_kriteria
-- ----------------------------
INSERT INTO `sub_kriteria` VALUES ('C21', 'C2', 'Anak Balita', 2);
INSERT INTO `sub_kriteria` VALUES ('C22', 'C2', 'Ibu Hamil/Menyusui', 3);
INSERT INTO `sub_kriteria` VALUES ('C23', 'C2', 'Disabilitas', 5);
INSERT INTO `sub_kriteria` VALUES ('C24', 'C2', 'Lansia', 4);
INSERT INTO `sub_kriteria` VALUES ('C31', 'C3', 'Pra Sekolah', 5);
INSERT INTO `sub_kriteria` VALUES ('C32', 'C3', 'SD Sederajat', 4);
INSERT INTO `sub_kriteria` VALUES ('C33', 'C3', 'SMP Sederajat', 3);
INSERT INTO `sub_kriteria` VALUES ('C34', 'C3', 'SMA Sederajat', 2);
INSERT INTO `sub_kriteria` VALUES ('C35', 'C3', 'Perguruan Tinggi', 1);

-- ----------------------------
-- View structure for nor_kriteria
-- ----------------------------
DROP VIEW IF EXISTS `nor_kriteria`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `nor_kriteria` AS select `kriteria`.`id_kriteria` AS `id_kriteria`,(`kriteria`.`bobot_kriteria` / (select sum(`kriteria`.`bobot_kriteria`) from `kriteria`)) AS `bobot` from `kriteria` ;

-- ----------------------------
-- View structure for p1_datawarga
-- ----------------------------
DROP VIEW IF EXISTS `p1_datawarga`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `p1_datawarga` AS select `data_warga`.`no_peserta` AS `no_peserta`,`data_warga`.`id_periode` AS `id_periode`,`data_warga`.`nilai_fisik_rumah` AS `c1`,`data_warga`.`nilai_kesehatan` AS `c2`,`data_warga`.`nilai_pendidikan` AS `c3`,`data_warga`.`nilai_penghasilan` AS `c4`,`data_warga`.`nilai_jumlah_kk` AS `c5`,`data_warga`.`nilai_kondisi_alam` AS `c6` from `data_warga` ;

-- ----------------------------
-- View structure for p2_datawarga
-- ----------------------------
DROP VIEW IF EXISTS `p2_datawarga`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `p2_datawarga` AS select `p1_datawarga`.`no_peserta` AS `no_peserta`,`p1_datawarga`.`id_periode` AS `id_periode`,pow(`p1_datawarga`.`c1`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C1') limit 1)) AS `c1`,pow(`p1_datawarga`.`c2`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C2') limit 1)) AS `c2`,pow(`p1_datawarga`.`c3`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C3') limit 1)) AS `c3`,pow(`p1_datawarga`.`c4`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C4') limit 1)) AS `c4`,pow(`p1_datawarga`.`c5`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C5') limit 1)) AS `c5`,pow(`p1_datawarga`.`c6`,(select `nor_kriteria`.`bobot` from `nor_kriteria` where (`nor_kriteria`.`id_kriteria` = 'C6') limit 1)) AS `c6` from `p1_datawarga` ;

-- ----------------------------
-- View structure for p3_datawarga
-- ----------------------------
DROP VIEW IF EXISTS `p3_datawarga`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `p3_datawarga` AS select `p2_datawarga`.`no_peserta` AS `no_peserta`,`p2_datawarga`.`id_periode` AS `id_periode`,(((((`p2_datawarga`.`c1` * `p2_datawarga`.`c2`) * `p2_datawarga`.`c3`) * `p2_datawarga`.`c4`) * `p2_datawarga`.`c5`) * `p2_datawarga`.`c6`) AS `vector_s` from `p2_datawarga` ;

-- ----------------------------
-- View structure for p4_datawarga
-- ----------------------------
DROP VIEW IF EXISTS `p4_datawarga`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `p4_datawarga` AS select `p3_datawarga`.`no_peserta` AS `no_peserta`,`p3_datawarga`.`id_periode` AS `id_periode`,`p3_datawarga`.`vector_s` AS `vector_s`,(`p3_datawarga`.`vector_s` / (select sum(`p3_datawarga`.`vector_s`) from `p3_datawarga`)) AS `vector_v` from `p3_datawarga` ;

SET FOREIGN_KEY_CHECKS = 1;
