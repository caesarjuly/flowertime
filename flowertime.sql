/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : flowertime

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-05-07 16:50:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity`
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `create_date` int(11) NOT NULL,
  `change_date` int(11) DEFAULT NULL,
  `top` tinyint(1) DEFAULT '0',
  `url` varchar(128) DEFAULT NULL,
  `thumbnail_url` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------

-- ----------------------------
-- Table structure for `add_message`
-- ----------------------------
DROP TABLE IF EXISTS `add_message`;
CREATE TABLE `add_message` (
  `add_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_customer_name` varchar(64) NOT NULL,
  `add_customer_message` varchar(128) NOT NULL,
  `add_message_content` varchar(128) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`add_message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of add_message
-- ----------------------------

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('5', '健健', '011c945f30ce2cbafc452f39840f025693339c42');

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `url` varchar(64) NOT NULL,
  `thumbs_url` varchar(64) NOT NULL,
  `in_use` tinyint(1) NOT NULL DEFAULT '1',
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `create_date` int(11) NOT NULL,
  `change_date` int(11) DEFAULT NULL,
  `top` tinyint(1) DEFAULT '0',
  `top_content` text,
  `top_url` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('24', '摄影师', '一个有经验的摄影师在拍摄时，只要观察一下环境就会知道\r\n						“什么是可以进入镜头的，什么是必须规避掉的”。\r\n						所以提高在拍摄过徎中对光线、环境、背景的判断及景物取\r\n						舍的能力，会对拍摄人像有很大的帮助。<br />', '1336362399', null, '1', '一个有经验的摄影师在拍摄时，只要观察一下环境就会知道 “什么是可以进入镜头的，什么是必须规避掉的”。 所以提高在拍摄过徎中对光线、环境、背景的判断及景物取 舍的能力，会对拍摄人像有很大的帮助。', 'top/20120507114710924.png');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------

-- ----------------------------
-- Table structure for `faq`
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `answer` text,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq
-- ----------------------------

-- ----------------------------
-- Table structure for `index_picture`
-- ----------------------------
DROP TABLE IF EXISTS `index_picture`;
CREATE TABLE `index_picture` (
  `index_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) NOT NULL,
  `thumbnail_url` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `file_type` varchar(128) NOT NULL,
  `file_size` varchar(128) NOT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`index_picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of index_picture
-- ----------------------------

-- ----------------------------
-- Table structure for `info`
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` text,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES ('6', '工作室简介', '', '1');
INSERT INTO `info` VALUES ('7', '拍摄流程介绍', '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	花·时间，是一家高端儿童摄影机构，是京城最具特色的儿童摄影品牌。\r\n</p>\r\n<p>\r\n	花·时间，风格清新、自然，摄影师用“爱”的视角扑捉孩子灵动的瞬间。\r\n</p>\r\n<p>\r\n	花·时间，坚持用镜头捕捉最真实的美丽，永远相信美丽的照片自己会说话。\r\n</p>\r\n<br />\r\n<p>\r\n	开车路线：东三环光华桥向西，经两个小路口，路南。 <br />\r\n地铁路线：1号线永安里站东北出口，向北，步行5分钟，10号线金台夕照站西南出口，向西步行10分钟。\r\n</p>\r\n<p>\r\n	<br />\r\n&nbsp;<img style=\"width:785px;height:424px;\" alt=\"\" src=\"/flowertime/picture/info/image/20111222/20111222144111_68620.jpg\" width=\"793\" height=\"179\" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	花·时间，是一家高端儿童摄影机构，是京城最具特色的儿童摄影品牌。\r\n</p>\r\n<p>\r\n	花·时间，风格清新、自然，摄影师用“爱”的视角扑捉孩子灵动的瞬间。\r\n</p>\r\n<p>\r\n	花·时间，坚持用镜头捕捉最真实的美丽，永远相信美丽的照片自己会说话。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"color:#E53333;\">-86 10 6561 9738 </span><br />\r\n<span style=\"color:#E53333;\"> -http://blog.sina.com.cn/u/1873496883 </span><br />\r\n<span style=\"color:#E53333;\"> -QQ 1611641496 </span><br />\r\n<span style=\"color:#E53333;\"> -【花·时间摄影俱乐部】 Q群 28720058</span> \r\n</p>\r\n<br />', '2');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(11) DEFAULT NULL,
  `reply` text,
  `reply_date` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`,`customer_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `message_activity`
-- ----------------------------
DROP TABLE IF EXISTS `message_activity`;
CREATE TABLE `message_activity` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(11) DEFAULT NULL,
  `reply` text,
  `reply_date` int(11) DEFAULT NULL,
  `activity_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`,`activity_id`,`customer_id`),
  KEY `activity_id` (`activity_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `message_activity_ibfk_3` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_activity_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_activity
-- ----------------------------

-- ----------------------------
-- Table structure for `message_course`
-- ----------------------------
DROP TABLE IF EXISTS `message_course`;
CREATE TABLE `message_course` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(11) DEFAULT NULL,
  `reply` text,
  `reply_date` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`,`course_id`,`customer_id`),
  KEY `course_id` (`course_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `message_course_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_course_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_course
-- ----------------------------

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `check` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`notice_id`,`customer_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `notice_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(64) NOT NULL,
  `kid_name` varchar(64) NOT NULL,
  `birthday` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telephone1` varchar(32) NOT NULL,
  `telephone2` varchar(32) NOT NULL,
  `series_name` varchar(128) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `charge` tinyint(1) NOT NULL DEFAULT '0',
  `check` tinyint(1) NOT NULL DEFAULT '0',
  `is_closed` tinyint(1) NOT NULL DEFAULT '0',
  `series_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`series_id`,`customer_id`),
  KEY `customer_id` (`customer_id`),
  KEY `series_id` (`series_id`),
  CONSTRAINT `order_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_4` FOREIGN KEY (`series_id`) REFERENCES `series` (`series_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for `series`
-- ----------------------------
DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `series_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `color` varchar(64) NOT NULL,
  `content` text,
  `english_content` text,
  PRIMARY KEY (`series_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of series
-- ----------------------------

-- ----------------------------
-- Table structure for `work`
-- ----------------------------
DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) NOT NULL,
  `thumbnail_url` varchar(128) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`work_id`,`album_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `work_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of work
-- ----------------------------
