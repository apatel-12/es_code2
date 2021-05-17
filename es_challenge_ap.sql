/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost
 Source Database       : es_challenge

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : utf-8

*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `employees`
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `office_number` varchar(5) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `employee_category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `employees`
-- ----------------------------
BEGIN;
INSERT INTO `employees` VALUES ('1', 'JoeEdit', 'SmithEdit', '(215)245-2552', '1234', 'joe', 'joe', '1980-05-15', 'FullTime'), ('2', 'Admin', 'User2', '(212)-111-1111', '2345', 'admin', 'admin', '1999-05-16', 'FullTime'), ('4', 'New1', 'new1', '1231312', '1235', 'user1', 'user1', '1999-01-01', 'Intern'), ('8', 'Tes1', 'tes1', '234234242', '23242', 'user2', 'user2', '2000-01-01', 'FullTime'), ('9', 'test2', 'te2', '23423', '23423', 'user3', 'user3', '2000-01-01', 'FullTime'), ('10', 'New user', 'test', '1231312', '2343', 'user48', 'user48', '2000-01-01', 'FullTime'), ('11', 'test47', 'test', '234234', '34534', 'user47', 'user47', '2000-01-01', 'FullTime');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
