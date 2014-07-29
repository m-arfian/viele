/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : laundry

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-07-29 20:39:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `harga`
-- ----------------------------
DROP TABLE IF EXISTS `harga`;
CREATE TABLE `harga` (
  `KODE_HARGA` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_ITEM` int(11) DEFAULT NULL,
  `KODE_TIPE_LAUNDRY` int(11) DEFAULT NULL,
  `NOMINAL_HARGA` int(11) DEFAULT NULL,
  `STATUS_HARGA` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`KODE_HARGA`),
  KEY `KODE_ITEM` (`KODE_ITEM`),
  KEY `KODE_TIPE_LAUNDRY` (`KODE_TIPE_LAUNDRY`),
  CONSTRAINT `harga_ibfk_1` FOREIGN KEY (`KODE_ITEM`) REFERENCES `m_item` (`KODE_ITEM`) ON UPDATE CASCADE,
  CONSTRAINT `harga_ibfk_2` FOREIGN KEY (`KODE_TIPE_LAUNDRY`) REFERENCES `tipe_laundry` (`KODE_TIPE_LAUNDRY`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of harga
-- ----------------------------
INSERT INTO `harga` VALUES ('1', '1', '1', '9000', '0');
INSERT INTO `harga` VALUES ('2', '1', '2', '10000', '0');
INSERT INTO `harga` VALUES ('3', '1', '2', '10000', '0');
INSERT INTO `harga` VALUES ('4', '1', '3', '6000', '0');
INSERT INTO `harga` VALUES ('5', '1', '2', '10000', '0');
INSERT INTO `harga` VALUES ('6', '1', '2', '10000', '0');
INSERT INTO `harga` VALUES ('7', '1', '1', '9000', '0');
INSERT INTO `harga` VALUES ('8', '1', '1', '9000', '0');
INSERT INTO `harga` VALUES ('9', '1', '1', '9000', '0');
INSERT INTO `harga` VALUES ('10', '1', '1', '9000', '0');
INSERT INTO `harga` VALUES ('11', '1', '1', '9000', '0');
INSERT INTO `harga` VALUES ('12', '1', '2', '10000', '1');
INSERT INTO `harga` VALUES ('13', '1', '3', '6000', '1');
INSERT INTO `harga` VALUES ('14', '1', '3', '6000', '0');
INSERT INTO `harga` VALUES ('15', '2', '1', '11000', '1');
INSERT INTO `harga` VALUES ('16', '2', '2', '11000', '1');
INSERT INTO `harga` VALUES ('17', '2', '3', '7000', '1');
INSERT INTO `harga` VALUES ('18', '3', '1', '8000', '1');
INSERT INTO `harga` VALUES ('19', '3', '2', '9000', '1');
INSERT INTO `harga` VALUES ('20', '3', '3', '6000', '1');
INSERT INTO `harga` VALUES ('21', '4', '1', '4000', '0');
INSERT INTO `harga` VALUES ('22', '5', '1', '10000', '1');
INSERT INTO `harga` VALUES ('23', '5', '2', '11000', '1');
INSERT INTO `harga` VALUES ('24', '5', '2', '11000', '0');
INSERT INTO `harga` VALUES ('25', '5', '3', '6000', '1');
INSERT INTO `harga` VALUES ('26', '4', '2', '10000', '1');

-- ----------------------------
-- Table structure for `m_item`
-- ----------------------------
DROP TABLE IF EXISTS `m_item`;
CREATE TABLE `m_item` (
  `KODE_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_ITEM` varchar(255) DEFAULT NULL,
  `KODE_TIPE` int(11) DEFAULT NULL,
  `STATUS_ITEM` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`KODE_ITEM`),
  KEY `KODE_TIPE` (`KODE_TIPE`),
  CONSTRAINT `m_item_ibfk_1` FOREIGN KEY (`KODE_TIPE`) REFERENCES `m_tipe` (`KODE_TIPE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_item
-- ----------------------------
INSERT INTO `m_item` VALUES ('1', 'Kemeja', '1', '1');
INSERT INTO `m_item` VALUES ('2', 'Celana Panjang', '1', '1');
INSERT INTO `m_item` VALUES ('3', 'Blus', '2', '1');
INSERT INTO `m_item` VALUES ('4', 'Kaus Kaki', '3', '1');
INSERT INTO `m_item` VALUES ('5', 'Sweater', '3', '1');

-- ----------------------------
-- Table structure for `m_tipe`
-- ----------------------------
DROP TABLE IF EXISTS `m_tipe`;
CREATE TABLE `m_tipe` (
  `KODE_TIPE` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_TIPE` varchar(255) DEFAULT NULL,
  `STATUS_TIPE` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`KODE_TIPE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_tipe
-- ----------------------------
INSERT INTO `m_tipe` VALUES ('1', 'Pria', '1');
INSERT INTO `m_tipe` VALUES ('2', 'Wanita', '1');
INSERT INTO `m_tipe` VALUES ('3', 'Pria & Wanita', '1');

-- ----------------------------
-- Table structure for `notifikasi`
-- ----------------------------
DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE `notifikasi` (
  `KODE_NOTIFIKASI` int(11) NOT NULL AUTO_INCREMENT,
  `TIPE_NOTIFIKASI` varchar(255) DEFAULT NULL,
  `TEKS_NOTIFIKASI` text,
  `LINK_NOTIFIKASI` varchar(255) DEFAULT NULL,
  `TGL_NOTIFIKASI` datetime DEFAULT NULL,
  `STATUS_NOTIFIKASI` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`KODE_NOTIFIKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notifikasi
-- ----------------------------
INSERT INTO `notifikasi` VALUES ('1', 'NP', 'Pelanggan baru #Lalala', '/laundry/admin/pelanggan/view/5', '2014-07-24 13:36:31', '0');
INSERT INTO `notifikasi` VALUES ('2', 'NO', 'Order baru #4', '/laundry/admin/order/view/4', '2014-07-25 13:07:05', '0');
INSERT INTO `notifikasi` VALUES ('3', 'NO', 'Order baru #5', '/laundry/admin/order/view/5', '2014-07-26 14:04:23', '0');
INSERT INTO `notifikasi` VALUES ('4', 'NP', 'Pelanggan baru #umar', '/laundry/admin/pelanggan/view/6', '2014-07-26 14:24:22', '0');
INSERT INTO `notifikasi` VALUES ('5', 'NO', 'Order baru #6', '/laundry/admin/order/view/6', '2014-07-29 15:58:44', '1');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `KODE_ORDER` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `KODE_PELANGGAN` int(11) DEFAULT NULL,
  `ESTIMASI_SELESAI` tinyint(2) DEFAULT NULL,
  `PENGAMBILAN` int(11) DEFAULT '1',
  `BIAYA_ANTAR` int(11) DEFAULT '0',
  `DISKON` int(11) DEFAULT '0',
  `TGL_ORDER` datetime DEFAULT NULL,
  `TGL_SELESAI` datetime DEFAULT NULL,
  `TGL_DIAMBIL` datetime DEFAULT NULL,
  `KETERANGAN` text,
  `USERNAME` varchar(25) DEFAULT NULL,
  `STATUS_ORDER` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`KODE_ORDER`),
  KEY `KODE_PELANGGAN` (`KODE_PELANGGAN`),
  KEY `USERNAME` (`USERNAME`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`KODE_PELANGGAN`) REFERENCES `pelanggan` (`KODE_PELANGGAN`) ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('000001', '1', '3', '2', '5000', '0', '2014-07-20 09:43:06', null, null, 'tambah barang', null, '2');
INSERT INTO `order` VALUES ('000002', '2', '2', '2', '5000', '10', '2014-07-20 22:16:46', null, null, '', 'kasir', '2');
INSERT INTO `order` VALUES ('000003', '3', '2', '2', '0', '0', '2014-07-21 09:57:15', null, null, '', 'kasir', '2');
INSERT INTO `order` VALUES ('000004', '5', '1', '2', '5000', '0', '2014-07-25 13:07:05', null, null, '', 'admin', '0');
INSERT INTO `order` VALUES ('000005', '3', '2', '1', '0', '0', '2014-07-26 14:04:23', null, null, '', 'kasir', '2');
INSERT INTO `order` VALUES ('000006', '4', '2', '2', '10000', '1', '2014-07-29 15:58:43', null, null, 'tes', 'kasir', '0');

-- ----------------------------
-- Table structure for `order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `KODE_ORDER_DETAIL` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_ORDER` int(6) unsigned zerofill DEFAULT NULL,
  `KODE_HARGA` int(11) DEFAULT NULL,
  `REAL_HARGA` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `DISKON` int(11) DEFAULT '0',
  `STATUS_ORDER_DETAIL` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`KODE_ORDER_DETAIL`),
  KEY `KODE_ORDER` (`KODE_ORDER`),
  KEY `KODE_HARGA` (`KODE_HARGA`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`KODE_ORDER`) REFERENCES `order` (`KODE_ORDER`) ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`KODE_HARGA`) REFERENCES `harga` (`KODE_HARGA`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('39', '000003', '12', '10000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('40', '000003', '15', '11000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('41', '000003', '16', '11000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('42', '000003', '18', '8000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('43', '000003', '19', '9000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('44', '000003', '20', '6000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('45', '000003', '21', '4000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('46', '000003', '22', '10000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('47', '000002', '12', '10000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('48', '000002', '13', '6000', '3', '0', '1');
INSERT INTO `order_detail` VALUES ('49', '000002', '15', '11000', '4', '0', '1');
INSERT INTO `order_detail` VALUES ('50', '000002', '16', '11000', '5', '0', '1');
INSERT INTO `order_detail` VALUES ('51', '000002', '17', '7000', '6', '0', '1');
INSERT INTO `order_detail` VALUES ('52', '000002', '18', '8000', '7', '0', '1');
INSERT INTO `order_detail` VALUES ('53', '000002', '19', '9000', '8', '0', '1');
INSERT INTO `order_detail` VALUES ('54', '000002', '23', '11000', '9', '0', '1');
INSERT INTO `order_detail` VALUES ('58', '000004', '12', '10000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('59', '000004', '13', '6000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('60', '000004', '18', '8000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('61', '000004', '23', '11000', '3', '0', '1');
INSERT INTO `order_detail` VALUES ('62', '000005', '15', '11000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('63', '000005', '23', '11000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('64', '000001', '17', '7000', '3', '0', '1');
INSERT INTO `order_detail` VALUES ('65', '000006', '12', '10000', '1', '0', '1');
INSERT INTO `order_detail` VALUES ('66', '000006', '13', '6000', '2', '0', '1');
INSERT INTO `order_detail` VALUES ('67', '000006', '15', '11000', '3', '0', '1');
INSERT INTO `order_detail` VALUES ('68', '000006', '19', '9000', '4', '0', '1');
INSERT INTO `order_detail` VALUES ('69', '000006', '23', '11000', '5', '0', '1');

-- ----------------------------
-- Table structure for `pelanggan`
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `KODE_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT,
  `ALAMAT_PELANGGAN` text,
  `NAMA_PELANGGAN` varchar(255) DEFAULT NULL,
  `KELAMIN` varchar(1) DEFAULT NULL,
  `KONTAK` varchar(31) DEFAULT NULL,
  `EMAIL` varchar(127) DEFAULT NULL,
  `STATUS_PELANGGAN` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`KODE_PELANGGAN`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('1', '', 'Muchammad Arfian', 'L', '0987654321', '', '1');
INSERT INTO `pelanggan` VALUES ('2', 'Sepanjang', 'Ucen', 'L', '0876543210', 'ucen@ucen.com', '0');
INSERT INTO `pelanggan` VALUES ('3', 'Jl. Wonocolo sepanjang RT 8 RW 3 No. 52', 'Husein Muhamad', 'L', '087752639514', 'huseinmuhamad@gmail.com', '1');
INSERT INTO `pelanggan` VALUES ('4', '', 'Lalala', 'L', '', '', '1');
INSERT INTO `pelanggan` VALUES ('5', '', 'Lalala', 'L', '', '', '1');
INSERT INTO `pelanggan` VALUES ('6', 'sepanjang', 'umar', 'L', '087752639514', 'umar@gmail.com', '1');

-- ----------------------------
-- Table structure for `tipe_laundry`
-- ----------------------------
DROP TABLE IF EXISTS `tipe_laundry`;
CREATE TABLE `tipe_laundry` (
  `KODE_TIPE_LAUNDRY` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_TIPE_LAUNDRY` varchar(255) DEFAULT NULL,
  `STATUS_TIPE_LAUNDRY` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`KODE_TIPE_LAUNDRY`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipe_laundry
-- ----------------------------
INSERT INTO `tipe_laundry` VALUES ('1', 'Laundry', '1');
INSERT INTO `tipe_laundry` VALUES ('2', 'Dry Cleaning', '1');
INSERT INTO `tipe_laundry` VALUES ('3', 'Press Only', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `USERNAME` varchar(25) NOT NULL DEFAULT '',
  `PASSWORD` varchar(32) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `LAST_LOGIN` datetime DEFAULT NULL,
  `STATUS_USER` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('admin', '9aa6e5f2256c17d2d430b100032b997c', '1', null, '1');
INSERT INTO `user` VALUES ('kasir', 'c7911af3adbd12a035b289556d96470a', '2', null, '1');
