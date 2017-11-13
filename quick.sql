/*
Navicat MySQL Data Transfer

Source Server         : Ernest
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : quick

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2013-10-02 15:38:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `car`
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `reg` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'in',
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('R138023G', 'jjjj', 'internal', '10/02/2013', 'in', '1');
INSERT INTO `car` VALUES ('we', '', 'external', 'out', '09/21/2013', '2');
INSERT INTO `car` VALUES ('sd', '', 'external', '09/21/2013', 'in', '3');
INSERT INTO `car` VALUES ('r137825y', 'jjjj', 'internal', '09/22/2013', '0', '4');

-- ----------------------------
-- Table structure for `dept`
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `dept` varchar(255) NOT NULL,
  `price` double(255,0) NOT NULL,
  `deptid` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`deptid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES ('beans', '6', '8');
INSERT INTO `dept` VALUES ('rice', '6', '9');
INSERT INTO `dept` VALUES ('chesse', '12', '6');
INSERT INTO `dept` VALUES ('tea', '122', '7');

-- ----------------------------
-- Table structure for `fuel`
-- ----------------------------
DROP TABLE IF EXISTS `fuel`;
CREATE TABLE `fuel` (
  `level` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `idfuel` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idfuel`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fuel
-- ----------------------------
INSERT INTO `fuel` VALUES ('5555', 'rice', '8');
INSERT INTO `fuel` VALUES ('1111777', 'chesse', '5');
INSERT INTO `fuel` VALUES ('12', 'tea', '6');
INSERT INTO `fuel` VALUES ('4', 'beans', '7');

-- ----------------------------
-- Table structure for `levelhq`
-- ----------------------------
DROP TABLE IF EXISTS `levelhq`;
CREATE TABLE `levelhq` (
  `reorder` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id` int(32) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of levelhq
-- ----------------------------
INSERT INTO `levelhq` VALUES ('111', '', 'chesse', '1');
INSERT INTO `levelhq` VALUES ('5', '', 'beans', '3');
INSERT INTO `levelhq` VALUES ('122', '', 'tea', '2');
INSERT INTO `levelhq` VALUES ('5555', '', 'rice', '4');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `product` varchar(200) DEFAULT NULL,
  `quantity` int(77) DEFAULT NULL,
  `ordernumber` varchar(99) DEFAULT NULL,
  `date` varchar(88) DEFAULT NULL,
  `status` varchar(99) DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('', '0', '12055cacd4', '09/21/2013', '0', '1');
INSERT INTO `orders` VALUES ('', '0', '12055cacd4', '09/21/2013', '0', '2');
INSERT INTO `orders` VALUES ('', '0', 'e0c0515b00', '09/21/2013', '0', '3');
INSERT INTO `orders` VALUES ('', '0', 'e0c0515b00', '09/21/2013', '0', '4');
INSERT INTO `orders` VALUES ('', '0', 'e0c0515b00', '09/21/2013', '0', '5');
INSERT INTO `orders` VALUES ('', '1', 'bd01b54c13', '09/21/2013', '0', '6');
INSERT INTO `orders` VALUES ('', '1', 'bd01b54c13', '09/21/2013', '0', '7');
INSERT INTO `orders` VALUES ('', '1', 'bd01b54c13', '09/21/2013', '0', '8');
INSERT INTO `orders` VALUES ('', '1', 'de32aad112', '09/21/2013', '0', '9');
INSERT INTO `orders` VALUES ('', '1', 'de32aad112', '09/21/2013', '0', '10');
INSERT INTO `orders` VALUES ('', '1', 'de32aad112', '09/21/2013', '0', '11');
INSERT INTO `orders` VALUES ('', '5', '1c5cee51e3', '09/21/2013', '0', '12');
INSERT INTO `orders` VALUES ('', '5', '1c5cee51e3', '09/21/2013', '0', '13');
INSERT INTO `orders` VALUES ('', '5', '1c5cee51e3', '09/21/2013', '0', '14');
INSERT INTO `orders` VALUES ('', '0', '2a1dd1d503', '09/21/2013', '0', '15');
INSERT INTO `orders` VALUES ('', '0', 'd3deec2450', '09/21/2013', '0', '16');
INSERT INTO `orders` VALUES ('', '0', '4c50de44a2', '09/21/2013', '0', '17');
INSERT INTO `orders` VALUES ('', '0', 'c25d0e3dc2', '09/21/2013', '0', '18');
INSERT INTO `orders` VALUES ('1', '0', 'beans', '09/22/2013', '0', '19');
INSERT INTO `orders` VALUES ('sadza', '12', '142dc5a5a4', '09/22/2013', '1', '20');
INSERT INTO `orders` VALUES ('chesse', '11', '04adaad51d', '09/22/2013', '1', '21');
INSERT INTO `orders` VALUES ('tea', '1', '40ca4bceb1', '09/22/2013', '0', '22');
INSERT INTO `orders` VALUES ('tea', '12222', '1553dbc4d4', '09/22/2013', '0', '23');
INSERT INTO `orders` VALUES ('tea', '12', 'b53cba505c', '09/22/2013', '0', '24');
INSERT INTO `orders` VALUES ('beans', '4', 'e215eab4d1', '10/02/2013', '1', '25');

-- ----------------------------
-- Table structure for `payment`
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders` varchar(111) DEFAULT NULL,
  `datep` varchar(111) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('1', 'sadza', '09/22/2013');
INSERT INTO `payment` VALUES ('2', '20', '09/22/2013');
INSERT INTO `payment` VALUES ('3', '21', '09/22/2013');
INSERT INTO `payment` VALUES ('4', '25', '10/02/2013');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `sex` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `account` varchar(40) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `idnumber` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `access` varchar(30) DEFAULT NULL,
  `suspend` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', null, null, null, null, null, null, null, 'admin', 'admin', null, '1', null, '1', '1');
INSERT INTO `users` VALUES ('2', 'new', 'fhdfh', 'male', '1dgd@fsf.df', null, 'zs', '', 'officer', 'password', '11-11111112-A-22', '1', '09/21/2013', '2', '1');
INSERT INTO `users` VALUES ('3', 'new', 'fhdfh', 'female', '1dgd@fsf.df', null, 'jldf', '', 'manager', 'password', '11-11111111-X-11', '1', '09/22/2013', '3', '1');
