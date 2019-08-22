/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : accessoslo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-08-22 10:38:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `aircrafts_cars`
-- ----------------------------
DROP TABLE IF EXISTS `aircrafts_cars`;
CREATE TABLE `aircrafts_cars` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(30) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `max_range` varchar(255) DEFAULT NULL,
  `wifi` varchar(255) DEFAULT NULL,
  `manufacture` varchar(255) DEFAULT NULL,
  `flight_attendant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aircrafts_cars
-- ----------------------------
INSERT INTO `aircrafts_cars` VALUES ('74', 'Helios', 'Air707', '1223', '2018-11-14 10:10:37', '2018-12-16 20:17:52', '/assets/uploads/aircrafts/cRYvJfPy0QkRwcnpt88s8LX1nO0MW4gd0aBi4PKm.png', null, null, null, null);
INSERT INTO `aircrafts_cars` VALUES ('75', 'Norway Charter', 'Airb291', '50', '2019-03-02 16:43:34', '2019-03-02 16:46:48', '/assets/uploads/aircrafts/GOJOCmvMWxda7PloKNAdtZgQlcz7lBQThRjPJEkX.jpeg', null, null, null, null);
INSERT INTO `aircrafts_cars` VALUES ('76', 'NorwayAirForce', 'Boeing707', '450', '2019-03-08 06:42:39', '2019-03-31 20:14:07', '/assets/uploads/aircrafts/XM6k42oCWylUjgZsWgBDFTXKt7NeQuUcllJYEuai.jpeg', '35000', 'true', '2018', 'true');
INSERT INTO `aircrafts_cars` VALUES ('77', 'SwissAirline', 'Boeing777', '451', '2019-03-08 09:16:24', '2019-03-08 09:21:35', '/assets/uploads/aircrafts/h1Bm90pRwIwcAdIbHS46NVUuGJkd6dJ5MqLIBcad.jpeg', null, null, null, null);
INSERT INTO `aircrafts_cars` VALUES ('78', 'American Airlines', 'Santa Monica', '255', '2019-03-22 16:10:07', '2019-03-22 16:11:23', '/assets/uploads/aircrafts/tE8ipI0ikHob9WKrgMCifo3uZmYmJBYjZCSd7Shl.jpeg', null, null, null, null);
INSERT INTO `aircrafts_cars` VALUES ('79', 'NorwayAirForce', 'Airbus A321', '255', '2019-03-23 01:10:08', '2019-03-23 01:11:46', '/assets/uploads/aircrafts/cyrOV6NPAsgyct1TOjYqQMqc8jheMCgw74hIsgct.jpeg', null, null, null, null);

-- ----------------------------
-- Table structure for `aircrafts_images`
-- ----------------------------
DROP TABLE IF EXISTS `aircrafts_images`;
CREATE TABLE `aircrafts_images` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aircrafts_images
-- ----------------------------
INSERT INTO `aircrafts_images` VALUES ('57', '/assets/uploads/aircrafts/cRYvJfPy0QkRwcnpt88s8LX1nO0MW4gd0aBi4PKm.png', '2018-11-14 10:10:42', '2018-11-14 10:10:42', '74');
INSERT INTO `aircrafts_images` VALUES ('59', '/assets/uploads/aircrafts/LWep3SJegt0m1jmJakb3HDaWkAaHyrcEa2XS6EIL.jpeg', '2018-11-14 10:10:50', '2018-11-14 10:10:50', '74');
INSERT INTO `aircrafts_images` VALUES ('60', '/assets/uploads/aircrafts/3nyf7SWTg5LxyMbUf7laDjLfiGyng7l677n3Xogb.jpeg', '2018-11-14 10:10:54', '2018-11-14 10:10:54', '74');
INSERT INTO `aircrafts_images` VALUES ('61', '/assets/uploads/aircrafts/su44NMZyLgOuvL0bH1euDRsIa1y0SC94KPBInUVe.jpeg', '2018-11-14 10:10:58', '2018-11-14 10:10:58', '74');
INSERT INTO `aircrafts_images` VALUES ('62', '/assets/uploads/aircrafts/7WqhteZYLrTxPOxz6v8HR33NCWwCnlifGLb6FwwP.jpeg', '2019-03-02 16:46:10', '2019-03-02 16:46:10', '75');
INSERT INTO `aircrafts_images` VALUES ('63', '/assets/uploads/aircrafts/Ly5tFVZ26jH0RRGTpWhs8tfPLF1c74R3syjvxGTb.jpeg', '2019-03-02 16:46:18', '2019-03-02 16:46:18', '75');
INSERT INTO `aircrafts_images` VALUES ('64', '/assets/uploads/aircrafts/hTlPikmsZVNibC8PfKYWnqwCoL5wAqAuyua9NSug.jpeg', '2019-03-02 16:46:24', '2019-03-02 16:46:24', '75');
INSERT INTO `aircrafts_images` VALUES ('65', '/assets/uploads/aircrafts/n4Rr2Sylop7cwPkNu5ypKNw9T45r5FCOn1ML8qMH.jpeg', '2019-03-02 16:46:38', '2019-03-02 16:46:38', '75');
INSERT INTO `aircrafts_images` VALUES ('66', '/assets/uploads/aircrafts/GOJOCmvMWxda7PloKNAdtZgQlcz7lBQThRjPJEkX.jpeg', '2019-03-02 16:46:48', '2019-03-02 16:46:48', '75');
INSERT INTO `aircrafts_images` VALUES ('67', '/assets/uploads/aircrafts/WWa2yN6M74ilD1A3dbCuVzajjr65D6qGewxNgPKB.jpeg', '2019-03-08 06:42:54', '2019-03-08 06:42:54', '76');
INSERT INTO `aircrafts_images` VALUES ('68', '/assets/uploads/aircrafts/fc5UmwD9QbnPaQTiqyNjdCIovwVfdOJuUl1rejgu.jpeg', '2019-03-08 06:43:02', '2019-03-08 06:43:02', '76');
INSERT INTO `aircrafts_images` VALUES ('69', '/assets/uploads/aircrafts/McAQVRL2tN0rbiE7PPv7FVK9K5goP9UoBAdwHioT.jpeg', '2019-03-08 06:43:08', '2019-03-08 06:43:08', '76');
INSERT INTO `aircrafts_images` VALUES ('70', '/assets/uploads/aircrafts/anKQptoVOjDWOPhr3xRJUeiuVguqONsDSqhmt12G.jpeg', '2019-03-08 06:43:18', '2019-03-08 06:43:18', '76');
INSERT INTO `aircrafts_images` VALUES ('71', '/assets/uploads/aircrafts/XM6k42oCWylUjgZsWgBDFTXKt7NeQuUcllJYEuai.jpeg', '2019-03-08 06:43:28', '2019-03-08 06:43:28', '76');
INSERT INTO `aircrafts_images` VALUES ('72', '/assets/uploads/aircrafts/UrXbqQ3YuRJKDvn21dJ9mt0aud4uipfC4NL8PGHn.jpeg', '2019-03-08 09:16:56', '2019-03-08 09:16:56', '77');
INSERT INTO `aircrafts_images` VALUES ('73', '/assets/uploads/aircrafts/qAnsB95NTafTXsa4kNSVQBLdfLkeX5lYQVr6qKdr.jpeg', '2019-03-08 09:17:02', '2019-03-08 09:17:02', '77');
INSERT INTO `aircrafts_images` VALUES ('74', '/assets/uploads/aircrafts/4OJmZwNDhjojntRqupFdijfecYIJhQChl1nIbP8x.png', '2019-03-08 09:17:09', '2019-03-08 09:17:09', '77');
INSERT INTO `aircrafts_images` VALUES ('75', '/assets/uploads/aircrafts/Gn5IEeLSz7D9lhWZWGYSIBU6WhZ7ZqXP2Q41qjGk.jpeg', '2019-03-08 09:17:17', '2019-03-08 09:17:17', '77');
INSERT INTO `aircrafts_images` VALUES ('77', '/assets/uploads/aircrafts/h1Bm90pRwIwcAdIbHS46NVUuGJkd6dJ5MqLIBcad.jpeg', '2019-03-08 09:21:35', '2019-03-08 09:21:35', '77');
INSERT INTO `aircrafts_images` VALUES ('78', '/assets/uploads/aircrafts/6QdD43aAk9OWIsE0PocM0Z42hWzmYwfOAOMt91r3.jpeg', '2019-03-22 16:10:18', '2019-03-22 16:10:18', '78');
INSERT INTO `aircrafts_images` VALUES ('79', '/assets/uploads/aircrafts/jCEBwmFVOPo9nQkQ4tpYsNPP4iDuzpQILDFUKwh8.jpeg', '2019-03-22 16:10:37', '2019-03-22 16:10:37', '78');
INSERT INTO `aircrafts_images` VALUES ('80', '/assets/uploads/aircrafts/WJwseb3ASQ8wL2ZVJozgdGMc5S4LHiH5Xtrp35y5.jpeg', '2019-03-22 16:10:58', '2019-03-22 16:10:58', '78');
INSERT INTO `aircrafts_images` VALUES ('81', '/assets/uploads/aircrafts/zQ9whaycUL53Ejxepew29BmsfbujeqG7JKJAnT7M.jpeg', '2019-03-22 16:11:07', '2019-03-22 16:11:07', '78');
INSERT INTO `aircrafts_images` VALUES ('82', '/assets/uploads/aircrafts/tE8ipI0ikHob9WKrgMCifo3uZmYmJBYjZCSd7Shl.jpeg', '2019-03-22 16:11:23', '2019-03-22 16:11:23', '78');
INSERT INTO `aircrafts_images` VALUES ('83', '/assets/uploads/aircrafts/CD2t5NWtBOmq0AxWscXfNrf880DtQY1uU9CRnyD6.jpeg', '2019-03-23 01:11:16', '2019-03-23 01:11:16', '79');
INSERT INTO `aircrafts_images` VALUES ('84', '/assets/uploads/aircrafts/G0aPfykDa9vnbxjCe2Jkgy46zsWPk5eChQSidVXw.jpeg', '2019-03-23 01:11:21', '2019-03-23 01:11:21', '79');
INSERT INTO `aircrafts_images` VALUES ('85', '/assets/uploads/aircrafts/npEbrabgt10MF4Luv205wLvLGEcyWEtHNmibo5Ar.jpeg', '2019-03-23 01:11:26', '2019-03-23 01:11:26', '79');
INSERT INTO `aircrafts_images` VALUES ('86', '/assets/uploads/aircrafts/3ymDvXVHDVSLhRmXNWvLdnHGOInJopVJ0gxg8qDY.jpeg', '2019-03-23 01:11:39', '2019-03-23 01:11:39', '79');
INSERT INTO `aircrafts_images` VALUES ('87', '/assets/uploads/aircrafts/cyrOV6NPAsgyct1TOjYqQMqc8jheMCgw74hIsgct.jpeg', '2019-03-23 01:11:46', '2019-03-23 01:11:46', '79');

-- ----------------------------
-- Table structure for `airpassenger_tax`
-- ----------------------------
DROP TABLE IF EXISTS `airpassenger_tax`;
CREATE TABLE `airpassenger_tax` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `company` varchar(30) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `approx_no` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of airpassenger_tax
-- ----------------------------
INSERT INTO `airpassenger_tax` VALUES ('1', 'Olive', 'Norway', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', '32', '2019-02-26 20:14:06', '2019-03-17 20:09:01', '0', '1');
INSERT INTO `airpassenger_tax` VALUES ('2', 'Evoke', 'Serbia', 'Nikola Vukovic', '+4740612345', 'lifeisyoureality@hotmail.com', '32', '2019-07-08 03:44:08', '2019-07-08 09:05:11', '0', '1');

-- ----------------------------
-- Table structure for `booking_cargo`
-- ----------------------------
DROP TABLE IF EXISTS `booking_cargo`;
CREATE TABLE `booking_cargo` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `company` varchar(30) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `is_danger` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `depth` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `payment_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_cargo
-- ----------------------------
INSERT INTO `booking_cargo` VALUES ('4', 'Fantasylab', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'Oslo, Norway', 'Paris, France', '12/25/2018', 'no', '25', '25', '25', '50', '2018-12-19 02:28:42', '2018-12-19 02:42:47', 'sent', '0', '300', 'Helios', '74', '1', null);
INSERT INTO `booking_cargo` VALUES ('5', '', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'London St Pancras (STP)', 'Gardermoen (OSL)', '02/23/2019', 'no', '23', '23', '23', '23', '2019-02-20 19:35:23', '2019-03-07 16:43:03', 'awaiting', '0', null, null, null, '1', null);
INSERT INTO `booking_cargo` VALUES ('6', 'Olive', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'London St Pancras (STP)', 'Gardermoen (OSL)', '03/02/2019', 'no', '23', '23', '23', '60', '2019-02-26 20:05:31', '2019-03-07 16:43:03', 'awaiting', '0', null, null, null, '1', null);
INSERT INTO `booking_cargo` VALUES ('7', 'Olive', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'London St Pancras (STP)', 'Gardermoen (OSL)', '02/01/2019', 'no', '23', '22', '22', '55', '2019-02-26 20:10:26', '2019-03-07 16:43:03', 'awaiting', '0', null, null, null, '1', null);
INSERT INTO `booking_cargo` VALUES ('8', 'Fantasylab', 'Dmitrii Katserikov', '+4745494649', 'WorldHero2018@hotmail.com', 'London St Pancras (STP)', 'Gardermoen (OSL)', '03/30/2019', 'yes', '20', '20', '20', '20', '2019-03-25 05:29:25', '2019-04-12 00:22:13', 'awaiting', '0', null, null, null, '1', null);

-- ----------------------------
-- Table structure for `booking_charters`
-- ----------------------------
DROP TABLE IF EXISTS `booking_charters`;
CREATE TABLE `booking_charters` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `booking_type` varchar(30) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `flight_type` varchar(255) DEFAULT NULL,
  `travellers` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` varchar(255) NOT NULL,
  `aircraft` varchar(255) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `member_notice` int(11) DEFAULT '0',
  `bonus` float DEFAULT '0',
  `currency` varchar(255) DEFAULT 'EUR',
  `payment_id` varchar(255) DEFAULT NULL,
  `return_time` varchar(255) DEFAULT NULL,
  `total_estimations` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `is_review` varchar(255) DEFAULT NULL,
  `additional_service` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_charters
-- ----------------------------

-- ----------------------------
-- Table structure for `booking_emptyleg`
-- ----------------------------
DROP TABLE IF EXISTS `booking_emptyleg`;
CREATE TABLE `booking_emptyleg` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(30) NOT NULL,
  `flight_no` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `aircraft` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_emptyleg
-- ----------------------------
INSERT INTO `booking_emptyleg` VALUES ('5', 'NorwayAirForce', '33', '03/28/2019', '04 : 11', 'Airbus A321', '255', '2019-03-24 15:40:26', '2019-04-11 02:11:27', 'Charles De Gaulle (CDG)', 'Flesland (BGO)', '28', '2019', 'March', '3000', 'EUR');
INSERT INTO `booking_emptyleg` VALUES ('8', 'NorwayAirForce', '523', '03/28/2019', '07 : 07', 'Airbus A321', '255', '2019-04-11 01:32:53', '2019-04-11 02:11:19', 'Charles De Gaulle (CDG)', 'Flesland (BGO)', '28', '2019', 'March', '3000', 'EUR');

-- ----------------------------
-- Table structure for `booking_limousine`
-- ----------------------------
DROP TABLE IF EXISTS `booking_limousine`;
CREATE TABLE `booking_limousine` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `contact_person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `type_car` varchar(255) NOT NULL,
  `type_flight` varchar(255) NOT NULL,
  `travelers` varchar(10) DEFAULT NULL,
  `from_address` varchar(255) NOT NULL,
  `to_address` varchar(255) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `payment_id` varchar(255) DEFAULT NULL,
  `return_from_address` varchar(255) DEFAULT NULL,
  `return_to_address` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_time` varchar(255) DEFAULT NULL,
  `is_review` varchar(255) DEFAULT NULL,
  `luggage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_limousine
-- ----------------------------
INSERT INTO `booking_limousine` VALUES ('128', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'Fantasylab', '07/20/2019', 'Viano', 'One Way', '3', 'Bernt Ankers gate, Oslo, Norway', 'Bergensveien, Oslo, Norway', '', '2019-07-07 16:34:55', '2019-07-08 09:04:31', 'paid', '0', '269', '0', '1103768008', null, null, null, null, null, '3');
INSERT INTO `booking_limousine` VALUES ('139', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'Fantasylab', '07/13/2019', 'Viano', 'One Way', '3', 'Oslo, Norway', 'Bergen, Norway', null, '2019-07-09 22:57:31', '2019-07-09 23:50:37', 'paid', '1', '268', '0', '1277738384', null, null, null, null, null, '3');
INSERT INTO `booking_limousine` VALUES ('156', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'Fantasylab', '07/19/2019', 'Viano', 'One Way', '5', 'Edvard Munchs veg, 2061 Gardermoen, Norway', 'Bergen Airport (BGO), Flyplassvegen 555, 5258 Bergen, Norway', null, '2019-07-10 14:22:43', '2019-07-10 14:25:57', 'paid', '1', '269', '0', '1407354293', null, null, null, null, null, '4');
INSERT INTO `booking_limousine` VALUES ('157', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', 'Fantasylab', '07/19/2019', 'Viano', 'One Way', '5', 'Edvard Munchs veg, 2061 Gardermoen, Norway', 'Bergen Airport (BGO), Flyplassvegen 555, 5258 Bergen, Norway', null, '2019-07-10 14:40:26', '2019-07-10 14:42:12', 'paid', '1', '269', '0', '1035924011', null, null, null, null, null, '3');
INSERT INTO `booking_limousine` VALUES ('158', 'Dmitrii Katserikov', '+4745494649', 'WorldHero2018@hotmail.com', 'FantasyLab', '07/27/2019', 'S-klasse', 'One Way', '2', 'Oslo, Norway', 'Bergen, Norway', '33', '2019-07-27 01:41:59', '2019-07-27 01:41:59', 'awaiting', '0', '205', '1', null, null, null, null, null, null, '2');

-- ----------------------------
-- Table structure for `booking_meet`
-- ----------------------------
DROP TABLE IF EXISTS `booking_meet`;
CREATE TABLE `booking_meet` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `contact_person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `travelers` varchar(10) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `in_flight_number` varchar(255) DEFAULT NULL,
  `out_flight_number` varchar(255) DEFAULT NULL,
  `in_airline` varchar(255) DEFAULT NULL,
  `out_airline` varchar(255) DEFAULT NULL,
  `in_date` varchar(255) DEFAULT NULL,
  `out_date` varchar(255) DEFAULT NULL,
  `in_time` varchar(255) DEFAULT NULL,
  `out_time` varchar(255) DEFAULT NULL,
  `in_luggage` varchar(255) DEFAULT NULL,
  `out_luggage` varchar(255) DEFAULT NULL,
  `in_booking_reference` varchar(255) DEFAULT NULL,
  `out_booking_reference` varchar(255) DEFAULT NULL,
  `in_departure_time` varchar(255) DEFAULT NULL,
  `out_departure_time` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `in_connect_flight_number` varchar(255) NOT NULL,
  `out_connect_flight_number` varchar(255) DEFAULT NULL,
  `is_added` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `total_cost` float DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `payment_id` varchar(255) DEFAULT NULL,
  `is_arrival` varchar(25) DEFAULT NULL,
  `is_departure` varchar(25) DEFAULT NULL,
  `is_review` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_meet
-- ----------------------------
INSERT INTO `booking_meet` VALUES ('38', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', '15', 'Fantasylab', '#NO3932', null, 'SerbiaAirline', null, '07/13/2019', null, '21 : 07', null, '5', null, '22', null, '21 : 07', null, null, '2019-07-10 19:08:01', '2019-07-10 19:12:10', '21', null, '1', 'paid', '395', '0', '1281655404', 'true', 'false', null);

-- ----------------------------
-- Table structure for `booking_travels`
-- ----------------------------
DROP TABLE IF EXISTS `booking_travels`;
CREATE TABLE `booking_travels` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `travel_type` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `total_cost` float DEFAULT '0',
  `status` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_travels
-- ----------------------------
INSERT INTO `booking_travels` VALUES ('38', 'private', 'Tom', 'Cruise', '+4740612345', 'user@mail.com', 'dw2d2', '2018-09-23 15:43:04', '2018-11-14 05:18:28', 'Mr', '0', '1', '0', 'awaiting', null, null, null);
INSERT INTO `booking_travels` VALUES ('39', 'private', 'Tom', 'Cruise', '+4740612345', 'dmitrii@fantasylab.io', '3333', '2018-09-24 01:50:36', '2018-11-14 05:18:28', 'Mr', '0', '1', '0', 'awaiting', null, null, null);
INSERT INTO `booking_travels` VALUES ('40', 'private', 'Tom', 'Cruise', '+4740612345', 'dmitrii@fantasylab.io', '3333', '2018-09-24 01:50:40', '2018-11-14 05:18:28', 'Mr', '0', '1', '0', 'awaiting', null, null, null);
INSERT INTO `booking_travels` VALUES ('41', 'private', 'Tom', 'Cruise', '+4740612345', 'dmitrii@fantasylab.io', '3333', '2018-09-24 01:50:40', '2018-11-14 05:18:29', 'Mr', '0', '1', '0', 'awaiting', null, null, null);
INSERT INTO `booking_travels` VALUES ('42', 'private', 'Tom', 'Cruise', '+4740612345', 'dmitrii@fantasylab.io', '3333', '2018-09-24 01:50:40', '2018-11-14 05:18:29', 'Mr', '0', '1', '0', 'awaiting', null, null, null);
INSERT INTO `booking_travels` VALUES ('43', 'private', 'Tom', 'Cruise', '+4740612345', 'dmitrii@fantasylab.io', '3333', '2018-09-24 01:50:40', '2018-11-14 05:18:29', 'Mr', '0', '1', '0', 'awaiting', null, null, null);
INSERT INTO `booking_travels` VALUES ('44', 'private', 'Tom', 'Cruise', '+4740612345', 'dmitrii@fantasylab.io', '3333', '2018-09-24 01:50:53', '2018-11-14 05:18:29', 'Mr', '0', '1', '0', 'awaiting', null, null, null);

-- ----------------------------
-- Table structure for `charters`
-- ----------------------------
DROP TABLE IF EXISTS `charters`;
CREATE TABLE `charters` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(30) DEFAULT NULL,
  `estimate_cost` varchar(255) DEFAULT NULL,
  `additional_fee` varchar(255) DEFAULT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `charter_type` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `charter_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `additional_reply` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of charters
-- ----------------------------
INSERT INTO `charters` VALUES ('135', 'SwissAirline', '5230', '240', '5858', 'executive charter', '2019-03-09 16:57:57', '2019-03-09 16:57:57', 'Boeing777', '135', 'paid', '451', null);
INSERT INTO `charters` VALUES ('137', 'SwissAirline', '3222', '240', '3968', 'executive charter', '2019-03-09 16:58:52', '2019-03-14 05:34:31', 'Boeing777', '134', 'sent', '451', null);
INSERT INTO `charters` VALUES ('139', 'NorwayAirForce', '3212', '330', '3957', 'executive charter', '2019-03-09 17:13:50', '2019-03-14 02:40:23', 'Boeing707', '134', 'sent', '450', null);
INSERT INTO `charters` VALUES ('140', 'SwissAirline', '2350', '540', '3227', 'executive charter', '2019-03-13 18:28:25', '2019-03-14 05:35:51', 'Boeing777', '133', 'paid', '451', null);
INSERT INTO `charters` VALUES ('142', 'NorwayAirForce', '2212', '330', '2837', 'executive charter', '2019-03-13 22:11:16', '2019-03-14 06:08:09', 'Boeing707', '127', 'sent', '450', null);
INSERT INTO `charters` VALUES ('143', 'SwissAirline', '5555', '0', '6222', 'executive charter', '2019-03-14 01:23:45', '2019-03-14 06:08:26', 'Boeing777', '129', 'sent', '451', null);
INSERT INTO `charters` VALUES ('145', 'NorwayAirForce', '2222', '330', '2848', 'executive charter', '2019-03-14 02:30:53', '2019-03-14 02:30:53', 'Boeing707', '129', 'awaiting', '450', null);
INSERT INTO `charters` VALUES ('146', 'NorwayAirForce', '1111', '330', '1604', 'executive charter', '2019-03-14 02:31:27', '2019-03-14 06:08:43', 'Boeing707', '130', 'paid', '450', null);
INSERT INTO `charters` VALUES ('147', 'SwissAirline', '6666', '540', '8061', 'executive charter', '2019-03-14 05:01:06', '2019-03-14 05:35:26', 'Boeing777', '132', 'sent', '451', null);
INSERT INTO `charters` VALUES ('149', 'NorwayAirForce', '5230', '330', '6217', 'executive charter', '2019-03-14 05:09:37', '2019-03-14 05:09:37', 'Boeing707', '128', 'sent', '450', null);
INSERT INTO `charters` VALUES ('151', 'NorwayAirForce', '3217', '330', '3973', 'executive charter', '2019-03-14 05:21:18', '2019-03-14 05:21:18', 'Boeing707', '131', 'sent', '450', null);
INSERT INTO `charters` VALUES ('154', 'SwissAirline', '2160', '240', '2678', 'executive charter', '2019-03-14 06:11:04', '2019-03-14 06:11:04', 'Boeing777', '136', 'paid', '451', null);
INSERT INTO `charters` VALUES ('160', 'NorwayAirForce', '4150', '530', '5232', 'executive charter', '2019-03-22 14:20:29', '2019-03-22 14:35:58', 'Boeing707', '163', 'paid', '450', null);
INSERT INTO `charters` VALUES ('161', 'SwissAirline', '3217', '240', '4197', 'executive charter', '2019-03-23 04:35:05', '2019-03-24 20:34:56', 'Boeing777', '166', 'sent', null, null);
INSERT INTO `charters` VALUES ('162', 'NorwayAirForce', '5555', '330', '6591', 'executive charter', '2019-03-23 04:39:35', '2019-03-23 04:45:00', 'Airbus A321', '166', 'sent', '255', null);
INSERT INTO `charters` VALUES ('163', 'SwissAirline', '2222', '240', '2757', 'executive charter', '2019-03-24 20:33:17', '2019-03-24 20:33:17', 'Boeing777', '167', 'sent', '451', null);
INSERT INTO `charters` VALUES ('164', 'NorwayAirForce', '4150', '330', '5018', 'executive charter', '2019-03-24 20:47:21', '2019-03-24 20:47:21', 'Airbus A321', '165', 'sent', '255', null);
INSERT INTO `charters` VALUES ('165', 'NorwayAirForce', '2222', '330', '2858', 'executive charter', '2019-03-24 21:22:40', '2019-03-24 21:22:40', 'Boeing707', '167', 'sent', '450', null);
INSERT INTO `charters` VALUES ('166', 'SwissAirline', '5513', '240', '6443', 'executive charter', '2019-03-25 11:24:00', '2019-03-25 11:24:00', 'Boeing777', '165', 'sent', '451', null);
INSERT INTO `charters` VALUES ('168', 'NorwayAirForce', '3000', '3.3', '3461', 'executive charter', '2019-03-31 16:28:25', '2019-04-06 01:27:36', 'Boeing707', '171', 'paid', '450', null);
INSERT INTO `charters` VALUES ('170', 'NorwayAirForce', '5555', '3.3', '6409', 'executive charter', '2019-04-10 20:21:23', '2019-04-10 20:21:23', 'Airbus A321', '172', 'sent', '255', null);
INSERT INTO `charters` VALUES ('177', 'NorwayAirForce', '5000', '3.3', '5768', 'executive charter', '2019-04-12 05:20:42', '2019-04-12 05:20:57', 'Boeing707', '174', 'awaiting', '450', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ante elit, scelerisque id volutpat efficitur, elementum vitae sapien. Nullam dictum accumsan vestibulum. Ut ultrices imperdiet ex quis convallis. Suspendisse porta est risus. Vestibulum dictum urna neque, ac interdum lorem placerat eu.');
INSERT INTO `charters` VALUES ('180', 'SwissAirline', '5555', '24', '7715', 'executive charter', '2019-04-12 10:58:05', '2019-04-12 10:58:12', 'Boeing777', '174', 'awaiting', '451', 'Cras gravida semper metus sit amet rhoncus. Integer ac diam nisi. Curabitur varius tellus venenatis est accumsan mattis. Etiam tellus velit, blandit at venenatis ac, accumsan in quam.');
INSERT INTO `charters` VALUES ('181', 'SwissAirline', '3000', '24', '4166', 'executive charter', '2019-07-04 20:16:18', '2019-07-04 20:17:53', 'Boeing777', '177', 'awaiting', '451', 'The price for catering is 300USD');
INSERT INTO `charters` VALUES ('182', 'NorwayAirForce', '5000', '3.3', '5768', 'executive charter', '2019-07-04 20:27:54', '2019-07-04 20:28:04', 'Boeing707', '177', 'awaiting', '450', 'The price for the catering is 500USD');

-- ----------------------------
-- Table structure for `handling_request`
-- ----------------------------
DROP TABLE IF EXISTS `handling_request`;
CREATE TABLE `handling_request` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `airport` varchar(30) NOT NULL,
  `company` varchar(255) NOT NULL,
  `aircraft_type` varchar(255) NOT NULL,
  `crew_config1` varchar(255) NOT NULL,
  `crew_config2` varchar(255) NOT NULL,
  `flight_type` varchar(255) NOT NULL,
  `hotac` varchar(255) NOT NULL,
  `catering` varchar(255) NOT NULL,
  `person` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inbound_flight` varchar(255) NOT NULL,
  `inbound_date` varchar(255) NOT NULL,
  `inbound_orig` varchar(255) NOT NULL,
  `inbound_utc` varchar(255) NOT NULL,
  `outbound_flight` varchar(255) NOT NULL,
  `outbound_date` varchar(255) NOT NULL,
  `outbound_orig` varchar(255) NOT NULL,
  `outbound_utc` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_added` int(11) DEFAULT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `member_notice` int(11) DEFAULT '0',
  `payment_id` varchar(255) DEFAULT NULL,
  `attach_doc` varchar(255) DEFAULT NULL,
  `aircraft_reg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of handling_request
-- ----------------------------
INSERT INTO `handling_request` VALUES ('2', 'ENAL (AES) Ålesund, Vigra', 'company', 'aircraft type', 'pax', 'crew', 'private', 'yes', 'no', 'Nohman Janjua', '+4745494649', 'nohman@fantasylab.io', 'fligght no', '07/11/2019', 'origin', 'variable', 'lightno', '07/16/2019', 'destination', 'variable', 'test', '2019-07-04 18:26:28', '2019-07-04 18:27:14', 'awaiting', '0', null, null, '1', null, '/assets/uploads/documents/1X5GrJkQlMqPLCbyNfzP091yQ9kcAPrYSyTa7FFr.docx', 'reg');
INSERT INTO `handling_request` VALUES ('3', 'ENTO (TRF) Sandefjord, Torp', 'test', 'test', '12', '12', 'private', 'yes', 'no', 'Aleksander Aaland', '+4740612345', 'nohman@fantasylab.io', '123', '123', '123', '123', '123', '07/24/2019', '123', '123', '', '2019-07-16 01:32:30', '2019-07-16 05:07:50', 'awaiting', '0', null, null, '1', null, '/assets/uploads/documents/vhIM0eEB9JbfRtGszRUQy7N7sTcASOA8RRGyVQKV.docx', 'test');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'Liang Mi', 'Desinger', 'liang.mi98@gmail.com', 'Top talented gorgeous designer', '/assets/uploads/users/-nu-caster-dota-2-khoc-tren-kenh-stream-khi-duoc-dai-gia-tang-han-14-ty-dong--18.jpg', '2019-04-06 22:13:28', '2019-04-07 14:23:22');
INSERT INTO `member` VALUES ('2', 'Dmitrii Katserikov', 'CEO', 'WorldHero2018@hotmail.com', 'Super elite talented full stack developer and manager', '/assets/uploads/users/large_Photo-Profil-Pro.jpg', '2019-04-06 22:15:47', '2019-04-07 14:29:34');
INSERT INTO `member` VALUES ('6', 'Erle Bråten', 'Manager', 'amathisen@jansen.net', 'Education Level: \nMaster\'s Degree\nUniversity: \nChris Beauty College', '/assets/uploads/users/en-prive-avec-eva-green0jpg_0.jpg', '2019-04-07 13:37:45', '2019-04-07 14:29:53');
INSERT INTO `member` VALUES ('7', 'Angunn Monsen', 'Database Analytics', 'moritz48@jensen.biz', 'Angunn is one of Access Oslo\'s founders and has over 10 years of experience ffrom the business aviati-on industry. Serving as an executive pilot on the Cessna Citation and wor-king with air charter borkerage, safty management and handling coordination to mention. Angunn holds a commercial pilot license and files the b737-800 on a regula.', '/assets/uploads/users/8F4b6lMk_400x400.jpg', '2019-04-07 14:31:11', '2019-04-07 14:31:11');
INSERT INTO `member` VALUES ('8', 'Almira Haaland', 'Cryptographer', 'xjakobsen@hovland.com', 'Education\nEducation Level: \nSome College\nUniversity: \nFerris State University', '/assets/uploads/users/emma-watson-960102.jpeg', '2019-04-07 14:32:55', '2019-04-07 14:32:55');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `en_page_title` varchar(255) DEFAULT NULL,
  `en_page_content` text,
  `author` varchar(255) NOT NULL,
  `published_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `en_meta_title` varchar(255) DEFAULT NULL,
  `en_meta_description` varchar(255) DEFAULT NULL,
  `banner_img` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `page_title_plain` varchar(255) NOT NULL,
  `extra_content` text,
  `nb_page_title` varchar(255) DEFAULT NULL,
  `nb_page_content` text,
  `nb_meta_title` varchar(255) DEFAULT NULL,
  `nb_meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">PASSENGER AIRCRAFT CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTIONN THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><h1><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/air-charter/passenger-charter\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p></h1>', 'Nohman Janjua', '2018.04.20 04:05:02pm', 'published', 'Passenger Aircraft Charter - Access Oslo', '', '/assets/uploads/pages/CXwJFSZlCTEdQA1jaxLTlJ692Euas00bMFYmiMdC.jpeg', '2018-04-20 13:23:25', '2019-07-16 04:24:56', 'PASSENGER AIRCRAFT CHARTER', null, '', '', '', '');
INSERT INTO `pages` VALUES ('2', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">EXECUTIVE CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; \">Bringing Back Luxury Flying</h3><h4 style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost-effective aircraft charter service that matches your needs.</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Our aviation partners have the highest standard quality, technology and maintenance programs that ensure you a safe, economical, and on time operation.</p>', 'Nohman Janjua', '2019.07.29 07:31:12pm', 'published', 'Executive Charter - Access Oslo', '', '/assets/uploads/pages/VoLXI9X0qdvn4ByC95aRaya2vpenq0qmF45QF308.jpeg', '2018-04-11 18:01:44', '2019-07-29 19:31:12', 'EXECUTIVE CHARTER', '<p></p><h4>Bringing Back Luxury Flying</h4>\n<p>Once again you can enjoy a leisurely, private aviation experience from Oslo and Sandefjord.</p>\n<p>Access Oslo’s exclusive service delivers VIP treatment, bypassing the queues, hassle and rush of the main terminal.</p>\n<p>Our charter team will arrange private flights to anywhere in the world for you.  Stockholm, London, New York, Dubai; it’s the same for us. </p>\n<p>Our team will recommend and source the suitable aircraft for your journey.  We can source small Cessnas to Gulfstreams.</p>\n<p>In addition to your flight, we are happy to arrange ground transport and luxury accommodation.  We can facilitate your entire journey – so you don’t have to.</p>\n<p>Our aircraft are spotlessly clean, custom designed for comfort, and stocked with the food, beverages and amenities you specify.  Your wish is our command!</p><h4>Get your free quote with a few simple steps</h4>\n<p><b>1.</b> Fill out your flight details and send request. The quote is now beeing processed with our partners and you will receive your quote within one hour. </p>\n<p><b>2.</b> Check your email, or log into to check your quote. </p>\n<p><b>3.</b> Choose your aircraft and operator from the list and add extra services if you like. Book, add passengers and pay online. You can also use your Access Loyalty bonus points to pay. </p>\n<p>You will normally receive your qoute within one hour, however some delays might be expected during night, high peak periods and holidays. If you have not received your quote within 2 hours, please contact us (hyperlink). If there is noe available aircraft, or just a few ones that does not match your criteria, please do contact us and we will find you the right aircraft. \nTake a look at our partners aircraft and operator details <a href=\"/about/our-partners\">here</a>. \n</p>\n<a style=\"color: #c29834;\" href=\"/loyalty-program/login-redirect\">About Access Loyalty and bonus points</a><p></p><p><br></p>', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">utøvende CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px;\">Bvi bringer luksus flyvning tilbake</h3><h4 style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost-effective aircraft charter service that matches your needs.</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Our aviation partners have the highest standard quality, technology and maintenance programs that ensure you a safe, economical, and on time operation.</p>', '', '');
INSERT INTO `pages` VALUES ('3', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">GROUP CHARTER</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">EXPERIENCE THE LUXURY AND EFFECTIVENESS OF PRIVATE AIR TRAVEL</h3><h4 style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.</h4><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Our aviation partners have the highest standard quality, technology and maintenance programs that ensure you a safe, economical, and on time operation.</p>', 'Nohman Janjua', '2019.02.18 10:54:48pm', 'published', 'Group Charter&nbsp;- Access Oslo', '', '/assets/uploads/pages/oPgMzegmImUNiPgKlwSKFyDuKN6k9CcrDA590hXz.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:56', 'GROUP CHARTER', '<h3>Traveling in a large group has never been easier.</h3>\n<p>Product launch in Italy, study tour in Seville or global sales force conference in Berlin?  Whatever your event, we can service it.</p>\n<p>We can handle groups of up to 200 at our own facilities, or more at the main terminal.  We will source the appropriate aircraft and arrange everything.  All we need from you is a passenger list.  </p>\n<p>Many organizations do not allow entire departments to travel on a single aircraft, for continuity of business reasons.  In such cases we can provide two smaller aircraft simultaneously, so it feels like you are traveling together – this is also logistically much simpler than booking people on various commercial flights.  </p>\n<p>Whatever your needs, contact us here for a proposal.</p>\n<h3>Get your free quote with a few simple steps:  </h3>\n<p><b>1.</b> Fill out your flight details and send request. </p>\n<p><b>2.</b> One of our team members will revert to you shortly</p>', '', '', '', '');
INSERT INTO `pages` VALUES ('4', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">CARGO &amp; SPECIAL CHARTER</h1>', '<h3>When time is essence</h3>\n<p>When time is of the essence and only the quickest response time is acceptable Cargo Charter is the solution for you.  We are available 24 hours a day, all year round, to provide a comprehensive and immediate solution for your cargo.  For example if you have a plane grounded with a mechanical fault in Svalbard, we can arrange a charter with spare parts and engineers aboard to fix the problem. </p>\n<p>Contact us at ops@accessoslo.no or call +47 91 222 999 for an immediate response.</p>', 'Nohman Janjua', '2019.02.18 10:55:05pm', 'published', 'Cargo &amp; Special Charter&nbsp;- Access Oslo', '', '/assets/uploads/pages/2TqeH6GpcDZVuyC3QkuLh7DMrExX3ZEEaHrwxbJ3.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:56', 'CARGO & SPECIAL CHARTER', null, '', '', '', '');
INSERT INTO `pages` VALUES ('5', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">HELICOPTER CHARTER</h1>', '<h3>When time is essence</h3>\n<p>When time is of the essence, or you simply want to experience Norway’s natural beauty from the air, helicopter charter is for you.  </p>\n<p>We can arrange point-to-point transport or sightseeing trips as requested.  Helicopters are ideal for avoiding long drives and traffic for those on a tight schedule.   </p>\n<p>Our aircraft can accommodate up to five passengers in premium comfort, and can fly at night.  </p>\n<p>Click here to send a request and receive a quote.</p>', 'Nohman Janjua', '2019.02.18 10:55:45pm', 'published', 'Helicopter Charter - Access Oslo', '', '/assets/uploads/pages/4twFFAjLInE4668AZqUVPu90sDxPE8sabF5hxR7T.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:56', 'HELICOPTER CHARTER', null, '', '', '', '');
INSERT INTO `pages` VALUES ('6', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">MEET &amp; GREET</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 20px;\">Let our team greet you with a warm welcome. Let us take care of everything, all you have to do is follow us.</span>', 'Nohman Janjua', '2019.02.22 11:03:54pm', 'published', 'Meet &amp; Greet&nbsp;- Access Oslo', '', '/assets/uploads/pages/wEc7J0JccOJs2jQeOJMBQsJrGXmmat1TiIy0vaEV.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:56', 'MEET & GREET', '<h3>Meet &amp; Greet - Just follow us!</h3>\n<p>With increased traffic and security, airports have become increasingly stressful to navigate.  Once you arrive at the main airport entrance, or step-off the aircraft, our coordinator will greet you with a warm welcome. Then we take care of everything, all you have to do is follow us.</p>\n<h3>Departure</h3>\n<p>Our coordinator will greet you at the airport, take your bags and check you into your flight. We will escort you through security and follow to your gate, or to a lounge if time allows. Just before departure we will pick you up at the lounge and take you to the gate. Depending on availability and your preference, we always try to get you the seat you want and priority boarding.</p>\n<p>If you drive yourself to the airport, please let us know if you would like us to arrange parking, car wash or any other requests you might have.</p>\n<h3>Arrival</h3>\n<p>Upon arrival at OSL our coordinator will meet you at the gate and escort you through passport control, baggage claim and customs as applicable, and then see you to your means of transportation. </p>\n<p>For group travel – simply just click on the booking and fill in the required information.</p>', '', '', '', '');
INSERT INTO `pages` VALUES ('7', '<h1 style=\"text-align: center; font-size: 45px; font-family: Gotham-Book; text-transform: uppercase;\"><span style=\"color: rgb(255, 255, 255);\">AIRPORT LIMO</span></h1>', '<h3>New cars and handpicked drivers with a top level of service. </h3>\n<p>Enjoy a smooth ride to and from the airport with brand new cars and service minded drivers. Transportation between the airport and your home, hotel, or office has never been more convenient. Our affordable, prompt service eliminates the hassles and headaches of other ground transportation services.</p>\n<p>Simply fill out the form on the right and choose your driving zone wich gives you a fixed price. Then book and pay. It´s simple, fast and relaiable. </p>\n<p>Our new fleet gives you comfort and luxury to a price not far away from the expensive taxies in Norway. </p>\n<p>For VIP coach, contact us and we will revert with an offer</p>\n<p>You can also choose to email us at contact@accessoslo.no or phone us +47 91 222 999 to book your transportation. </p>\n<p>Please see our terms and conditions for booking.</p>', 'Nohman Janjua', '2019.02.18 10:56:36pm', 'published', 'Limousine Transport&nbsp;- Access Oslo', '', '/assets/uploads/pages/KVyp5nxEAYzJbDVIu5uMfcvEoBn8BCRB7uCNF7SK.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:56', 'AIRPORT LIMO', null, '', '', '', '');
INSERT INTO `pages` VALUES ('8', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">HandLING REQUEST</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 18px;\">Let Access Oslo take care of aircraft handling.&nbsp;</span>', 'Nohman Janjua', '2019.02.23 12:32:22am', 'published', 'Handling Request&nbsp;- Access Oslo', '', '/assets/uploads/pages/Sgv0LnIvxztsY9Gp5PTY1fkR8M7qznXBv5TzbPbq.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:56', 'HandLING REQUEST', '<h3>Operations Contact</h3>\n<p>For more information about aircraft handling contact us. If you would like to book aircraft handling, fill out the form on the right side, and we will get back to you as soon as possible.</p>\n\n<h4 style=\"color: #c29834;\">Headquarters:</h4>\n<p>Access Oslo AS<br>\nHans Gaarders Veg, 2060<br>\nGardermoen, Norway</p>\n\n<h4 style=\"color: #c29834;\">Post address:</h4>\n<p>PO Box 34<br>\nSnarøya, Norway </p>\n\n<h4 style=\"color: #c29834;\">General Inquiries:</h4>\n<p>contact@accessoslo.com</p>\n\n<h4 style=\"color: #c29834;\">Operations:</h4>\n<p>ops@accessoslo.com</p>', '', '', '', '');
INSERT INTO `pages` VALUES ('9', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">OSLO FBO (OSL/ENGM)</h1>', '<h3 style=\"color: #c29834; font-size: 26px; margin-bottom: 30px;\">Our full service IS-BAH certified FBO is located convenient at the GA-terminal in Oslo Airport. </h3>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">Just 35 minutes from the city centre Access Oslo Executive Handling offers VIP handling with competetive prices and high level service.  </p>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">The terminal and airport is open H24 every day and our team is ready to assist you whenever you need. </p>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">Access Oslo Executive Handling has well trained staff with over 50 years of experience from the aviation industry such as ground handlers, pilots and dispatchers. Our philosophy in Access Oslo is to create a personal unique experience for passengers, crew and operators and to exceed their expectations.</p>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">Our lounges are inspired by Nordic design and creates a calm and relaxing atmosphere. From our self-service café, passengers can enjoy complimentary beverages, fresh coffee and snacks. </p>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">The crew lounge is a quiet area, specially designed for crew with daybeds, soft carpet and excellent air conditioning. TV, free internet access, briefing equipment and refreshments are of course all included. We believe it’s the very best crew lounge in Scandinavia.</p>', 'Nohman Janjua', '2019.02.23 12:49:37am', 'published', 'Oslo FBO (OSL/ENGM)&nbsp;- Access Oslo', '', '/assets/uploads/pages/tAFioCmkAKk2ALk3HAp2NlBngidMXBiHxkgrAwEz.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'OSLO FBO (OSL/ENGM)', null, '', '', '', '');
INSERT INTO `pages` VALUES ('10', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">SANDEFJORD FBO (TRF/ENTO)</h1>', '<h3 style=\"color: #c29834; font-size: 26px; margin-bottom: 30px;\">Welcome to our FBO at Sandefjord Torp Airport (ENTO).</h3>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\"> In addition to serving Oslo Airport, Access Oslo Executive Handling has a full service FBO with a hangar connected. </p>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">From the parking outside via our terminal its only 10 meters. We have all facilities such as VIP lounge, crew lounge, hangar and car parking inside just to mention. \nWe welcome new and existing customers to Torp, ENTO. </p>\n<p style=\"font-family: Gotham-Book; line-height: 24px; margin-bottom: 30px;\">Located conveniently at Sandefjord Torp Airport just above one hour drive from Oslo. Torp it´s a very good option if you are going to visit Oslo south with regards to the traffic. It´s also a 20 min shorter flight if you approach from the south. </p>', 'Nohman Janjua', '2019.02.23 12:50:33am', 'published', 'Sandefjord FBO (TRF/ENTO)&nbsp;- Access Oslo', '', '/assets/uploads/pages/JA1NRD6FMCkEMi9PpkcQHLnktCS3SkWHPwUXs1Ad.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'SANDEFJORD FBO (TRF/ENTO)', null, '', '', '', '');
INSERT INTO `pages` VALUES ('11', '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 40px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">FBO</span>SERVICES</h1>', 'FBO SERVICES', 'Nohman Janjua', '2018.06.11 08:57:05pm', 'published', 'Access Oslo | FBO Services', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'FBOSERVICES', null, '', '', '', '');
INSERT INTO `pages` VALUES ('12', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">SUPERVISION</h1>', 'SUPERVISION', 'Nohman Janjua', '2018.06.11 08:57:05pm', 'published', 'Access Oslo | Supervision', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'SUPERVISION', null, '', '', '', '');
INSERT INTO `pages` VALUES ('13', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">VIP CARTERING</h1>', '<h3>We offer in-house catering</h3>\n<p>After a long day’s worth of travel and meetings, we know our passengers need to be able to count on a good meal on their flight home.  Our philosophy is that the passenger is king, and we will bend over backwards to satisfy them.  </p>\n<p>We offer in-house catering with a Scandinavian twist.  We prioritize local ingredients to give you a last taste of Norway on your way home.  Where possible our food is adapted to be more pleasing at aircraft cabin atmosphere with additional salt and seasoning as needed.</p>\n<p>We are proud to say that our catering service is headed by Christer Rødseth, Head Chef at Vaaghals, and Captain of Norway’s team of chefs that compete in international culinary competitions (Kokkelandslaget).  </p>\n<p>Christer can provide personalized menus on demand, or proposes the attached menu here.  All dishes have been tested by our team to ensure that they appeal to the widest possible customer group.</p>\n<p>If nothing seems appealing, just ask.  If we can’t provide it, we will find a restaurant in Oslo that can.  In addition, we can of course source beverages, newspapers, flowers, etc. </p>\n    <a class=\"btn btn-border-gold\">Our Catering Menu</a>', 'Nohman Janjua', '2019.02.18 11:00:14pm', 'published', 'VIP Catering&nbsp;- Access Oslo', '', '/assets/uploads/pages/UGDoN1hDWKq0jGUbiw59uhqhjr9UHzWXoCvXLYUV.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'VIP CARTERING', null, '', '', '', '');
INSERT INTO `pages` VALUES ('14', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">AIR PASSENGER TAX</h1>', '<p>Access Oslo is registered as a representative by the Norwegian Tax Administration (Skatteetaten) and can handle tax reporting on your behalf.</p>', 'Nohman Janjua', '2019.02.23 12:52:00am', 'published', 'Air Passenger Tax&nbsp;- Access Oslo', '', '/assets/uploads/pages/hlAq6wfc6StjacYK7hoCYXZpdmdiSxRaWhKyLZP5.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'AIR PASSENGER TAX', '<h3>Mandatory Air Passenger Tax</h3>\n<p>From the 1st of June 2016, the Norwegian government implemented a mandatory Air Passenger Tax for all flights leaving Norwegian airports with passengers.</p>\n<p>As only Norwegian companies can report these taxes, all foreign companies are required to establish a Norwegian representative.</p>\n<p>Access Oslo is registered as a representative by the Norwegian Tax Administration (Skatteetaten) and can handle tax reporting on your behalf.</p>\n<p>The tax is NOK 80 per passenger for departures from Norwegian airports.</p>\n<p>For more information or to register for the Air Passenger Tax please contact us at accounting@accessoslo.no, or fill out the online form to the right.</p>\n<p>To read background information provided by Tax Administration Norway in detail, please click here.</p>', '', '', '', '');
INSERT INTO `pages` VALUES ('15', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">DESTINATION OSLO</h1>', '<h2>Europe´s new metropolitan capital</h2>\n<p>Our country’s largest city hosts a hub of world-class architecture, restaurants, museums and shopping experiences. </p>\n<p>As one of Europe’s fastest growing cities, Oslo has a vibrant scene of culture, art and fashion, night-clubs and high-end restaurants </p>\n<p>Breath-taking architecture like the Opera House, Astrup Fearnley Museum and the financial street “Oslo Barcode” has changed the city looks and taken a gaint leap into the next era of exploration and city development. </p>\n<p>Also, to mention is that Oslo was named the European Green Capital of 2019 for its dedication to preserving the nature in and around Oslo and by reducing pollution dramatically. </p>\n<p>Innovative kitchens put´s Oslo on the World Culinary map. With its constant evolving they are combining traditional food traditions with new approaches.  </p>\n<p>Experience First-rate opera, ballet and theatre performances presented throughout the year. For art and museums lovers see famous works at the National Museum (closed until 2020) and the Munch Museum to mention a few ones by the many galleries and museums Oslo has to offer. </p>\n<p>Contact us to see how we can tailor your trip to Oslo</p>\n<p>Find more inspiration on <a href=\"http://www.visitoslo.com/en/\" target=\"_blank\">Oslo’s official website.</a></p>', 'Nohman Janjua', '2019.02.21 08:14:45pm', 'published', 'Destination Oslo&nbsp;- Access Oslo', '', '/assets/uploads/pages/l9kQg6A2z4oO6e7tq0xINefYW6tqKlFzoiyJacZy.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'DESTINATION OSLO', '<h2><br></h2>', '', '', '', '');
INSERT INTO `pages` VALUES ('16', '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 34px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\">DMC/MICE</h1>', '<span style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 18px;\">Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</span>', 'Nohman Janjua', '2019.02.18 11:00:58pm', 'published', 'DMC/MICE - Access Oslo', '', '/assets/uploads/pages/QyOBOFEiox4ig6JbVRnE69uWvkI4LFJ9G2fiEL7J.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'DMC/MICE', '<h3>DMC/MICE</h3>\n<p>Information coming soon...</p>', '', '', '', '');
INSERT INTO `pages` VALUES ('17', '<h1 style=\"font-size: 30px; font-family: Gotham-book; color: rgb(97, 72, 14); text-transform: uppercase; border-bottom: 2px solid rgb(255, 255, 255); padding: 20px;\">ACCESS LOYALTY PROGRAM</h1>', 'LOG IN', 'Nohman Janjua', '2019.02.18 11:01:22pm', 'published', 'Login to Access Loyalty Program - Access Oslo', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'ACCESS LOYALTY PROGRAM', null, '', '', '', '');
INSERT INTO `pages` VALUES ('18', '<h1 style=\"margin-top: 0px; font-size: 35px; font-family: Gotham-Book; color: rgb(97, 72, 14); text-transform: uppercase; text-align: center;\">BECOME A MEMBER</h1>', 'SIGN UP', 'Nohman Janjua', '2019.02.18 11:01:57pm', 'published', 'Sign Up - Access Oslo', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'BECOME A MEMBER', null, '', '', '', '');
INSERT INTO `pages` VALUES ('19', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">CONTACT INFORMATION</h1>', '<p>ytsssdfsd</p>', 'Nohman Janjua', '2019.02.23 12:38:21am', 'published', 'Contact us - Access Oslo', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'CONTACT INFORMATION', null, '', '', '', '');
INSERT INTO `pages` VALUES ('20', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">WHY ACCESS OSLO</h1>', '<h3>In short, we go the extra mile.  Easy to say, but hard to do.</h3>\n<p>Access Oslo Executive Handling is focused on satisfying passenger and crew needs.  We always aim to exceed their expectations and to create a unique experience for each visit.  Our priority is the safe operation and handling of multimillion dollar aircraft, passengers and crew.</p>\n<p>Access Oslo’s team has over 50 years of experience in various positions from professional ground handlers to commercial pilots, with an eye for safety.  For every turnaround we perform a risk analysis, ensuring your valuable passengers and aircraft are handled according to international branch standards.  We are the first and only FBO to be IS-BAH certified in the Nordics.</p>\n<p>We have ground operations at Oslo Airport and Sandefjord Torp Airport with separate crew and passenger lounges.  In addition we supervise flights across Scandinavia. </p>\n<p>As proof of our commitment to excellence we have invested considerable time and effort in becoming the first FBO in the Nordics to be IS-BAH accredited.  This is our proof of service to you.</p>\n<p>Try us and experience the difference!</p>\n<p>As we like to say, \"Handle with care!”</p>', 'Nohman Janjua', '2019.02.18 11:02:39pm', 'published', 'Why Access Oslo - Access Oslo', '', '/assets/uploads/pages/zFawboERFFrBQTpuHIIIpJpt4qz1TvrLRgVk92ld.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'WHY ACCESS OSLO', null, '', '', '', '');
INSERT INTO `pages` VALUES ('21', '<h1 style=\"margin-top: 0px; margin-bottom: 20px; font-size: 35px; font-family: Gotham-book; color: rgb(72, 83, 155); text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">MEET&nbsp;</span>THE DEDICATED TEAM</h1>', '<h2 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-top: 0px; margin-bottom: 20px; font-size: 24px; text-transform: uppercase;\">THIS IS A H2 TITLE</h2><h4 style=\"font-family: Gotham; color: rgb(95, 96, 98); margin-top: 0px; margin-bottom: 20px;\">Lorem ipsum is simply a dummy text of the printing and typeseting industry.</h4><h3 style=\"font-family: Gotham; color: rgb(95, 96, 98); margin-top: 30px; margin-bottom: 20px; font-size: 20px;\">Lorem ipsum dolor H3</h3><p class=\"text-justify\" style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h3 style=\"font-family: Gotham; color: rgb(95, 96, 98); margin-top: 30px; margin-bottom: 20px; font-size: 20px;\">Lorem ipsum dolor H3</h3><p class=\"text-justify\" style=\"color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>', 'Nohman Janjua', '2018.06.11 09:30:47pm', 'published', 'Access Oslo | Our Team', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'MEET THE DEDICATED TEAM', null, '', '', '', '');
INSERT INTO `pages` VALUES ('22', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">SAFETY</h1>', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;\">A SOLUTION THAT SUITS YOU</h3><h4 class=\"text-justify\" style=\"font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;\">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4><p class=\"text-justify\" style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style=\"margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;\"><span style=\"font-weight: 700;\"><a href=\"http://localhost/about/safety\" style=\"color: rgb(194, 152, 52);\">Ask us for a free quote for your next event.</a></span></p>', 'Nohman Janjua', '2018.06.11 09:31:45pm', 'published', 'Access Oslo | Safety', '', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'SAFETY', null, '', '', '', '');
INSERT INTO `pages` VALUES ('23', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">PARTNERS</h1>', '<p>By working with partners globally we are able to offer professional services for your needs. Let us take care of everything. Enjoy and relax. Experience the difference!</p>', 'Nohman Janjua', '2019.02.23 12:39:33am', 'published', 'Our Partners&nbsp;- Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '/assets/uploads/pages/bzHGRTML2w4TRBTpLaODTHemBwonPzbynKZgl9NU.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'PARTNERS', null, '', '', '', '');
INSERT INTO `pages` VALUES ('24', '<h3 style=\"font-family: Gotham; color: rgb(194, 152, 52); font-size: 22px; margin-left: 200px;\">Access Oslo News</h3>', 'LASTEST NEWS', 'Nohman Janjua', '2019.02.18 11:03:53pm', 'published', 'Latest News - Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'Access Oslo News', null, '', '', '', '');
INSERT INTO `pages` VALUES ('25', '<span style=\"color: rgb(66, 66, 66);\">Dashboard</span>', '<span style=\"color: rgb(156, 156, 148);\">Dashboard</span>', 'Nohman Janjua', '2019.02.18 11:04:24pm', 'published', 'My Dashboard&nbsp;- Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'Dashboard', null, '', '', '', '');
INSERT INTO `pages` VALUES ('26', '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">UPCOMING REQUESTS</h1>', 'UPCOMING REQUEST', 'Nohman Janjua', '2019.02.18 11:04:40pm', 'published', 'Upcoming Request&nbsp;- Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'UPCOMING REQUESTS', null, '', '', '', '');
INSERT INTO `pages` VALUES ('27', '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">REQUEST HISTORY</h1>', 'REQUEST HISTORY', 'Nohman Janjua', '2019.02.18 11:04:57pm', 'published', 'Request History&nbsp;- Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'REQUEST HISTORY', null, '', '', '', '');
INSERT INTO `pages` VALUES ('29', '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">EMPTY LEG CHARTER FLIGHTS</h1>', 'EMPTY LEG CHARTER FLIGHTS', 'Nohman Janjua', '2019.02.18 11:09:15pm', 'published', 'Empty Leg Charter Flights&nbsp;- Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'EMPTY LEG CHARTER FLIGHTS', null, '', '', '', '');
INSERT INTO `pages` VALUES ('30', '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">COMPLETE YOUR PROFILE</h1>', 'COMPLETE YOUR PROFILE', 'Nohman Janjua', '2019.02.18 11:09:43pm', 'published', 'Profil Settings&nbsp;- Access Oslo', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'COMPLETE YOUR PROFILE', null, '', '', '', '');
INSERT INTO `pages` VALUES ('31', '<h1 style=\"margin-left: 80px; font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">ADD NEW PASSENGERS</h1>', 'ADD PASSENGERS', 'Nohman Janjua', 'saved', 'saved', 'Access Oslo | User Passengers', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'ADD NEW PASSENGERS', null, '', '', '', '');
INSERT INTO `pages` VALUES ('32', '<h1 style=\"margin-left: 80px; font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">MANAGE YOUR ACCOUNT</h1>', 'MANAGE YOUR ACCOUNT', 'Nohman Janjua', 'saved', 'saved', 'Access Oslo | User Manage Account', 'Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.', '', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'MANAGE YOUR ACCOUNT', null, '', '', '', '');
INSERT INTO `pages` VALUES ('36', '<p>Login&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'Login', 'Nohman Janjua', '2019.02.18 11:13:01pm', 'published', 'Login to Access Loyalty - Access Oslo', 'new page description', '/assets/uploads/pages/K2U4pqkGNEubAfSX3fTCvEDVDmJJFQh7w1FAtTwm.png', '2018-05-17 20:11:45', '2019-07-16 04:24:57', 'Login    ', null, '', '', '', '');
INSERT INTO `pages` VALUES ('37', '<p>Sign up&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'Sign up&nbsp; &nbsp;&nbsp;', 'Nohman Janjua', '2019.02.18 11:13:32pm', 'published', 'Sign Up&nbsp;- Access Oslo', 'new page meta description', '/assets/uploads/pages/Vckp6li0ysJftun7UxBzToyE1wMzxm1qEoMVYjkf.png', '2018-05-17 20:13:04', '2019-07-16 04:24:57', 'Sign up    ', null, '', '', '', '');
INSERT INTO `pages` VALUES ('38', '<p>Latest News</p>', '<p>Latest News<br></p>', 'Nohman Janjua', '2019.02.18 11:14:24pm', 'published', 'Latest News&nbsp;- Access Oslo', '<p>Latest News</p>', '', '2018-06-18 09:41:40', '2019-07-16 04:24:57', 'Latest News', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('40', '<h1 style=\"font-size: 23px; font-family: gotham-book; font-weight: 600; color: rgb(72, 83, 155); text-transform: uppercase;\">MAKE A NEW REQUEST</h1>', '<p><span style=\"color: rgb(95, 96, 98); font-family: gotham-book; font-size: 14px; font-weight: 600;\">WE LOOK FORWARD TO HAVE YOU ON BOARD.</span><br></p>', 'Nohman Janjua', '2019.02.18 11:15:06pm', 'published', 'New Request&nbsp;- Access Oslo', 'new', '', '2018-06-18 12:34:03', '2019-07-16 04:24:57', 'MAKE A NEW REQUEST', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('41', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">Ground Transport</h1>', '<h2>One-stop-shop for ground transfers</h2>\n<p>From single transfers up to large scale groups we offer sedans, minivan, minibus and VIP-coaches to suit your needs. We are often the preferred choice for bookings of large scale like conference, meetings and cruise transfers.  </p>\n<p>Our team is on the ball 24/7 and GPS track all transfers to make sure everything runs as smooth and safe as possible. The safety of our passengers is always our No. 1 top priority. We are always one step ahead, so we manage our fleet and drivers efficiently reducing the risks of delays and hiccups.  </p>\n<p>Our fleet consists of new cars and handpicked, well-spoken and well-dressed drivers with a top level of service and excellent knowledge of the city. In addition to the driver we often tailor single trips with a certified guide to get the most out of the journey.  </p>\n<p>If you prefer rental cars, we arrange most brands available ranging from normal sedans to luxury cars like Porsche, BMW, Audi, Tesla and more…</p>\n<p>PS! We also assist in booking of train, boat and airline tickets!</p>\n<p>We are happy to give you a quote for your transfers in Norway and Oslo</p>', 'Nohman Janjua', '2019.02.19 12:39:56am', 'published', 'Ground Transport&nbsp;- Access Oslo', '', '/assets/uploads/pages/PQlYT0SjdSBE9Mq4R52FsPiAcMQTPskPBLxxogqf.jpeg', '2018-04-11 18:01:44', '2019-07-16 04:24:57', 'Ground Transport', null, '', '', '', '');
INSERT INTO `pages` VALUES ('42', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">Destination Bergen</h1>', '<h2 style=\"font-family: Gotham; line-height: 1.2; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 26px;\">The city between the Fjords</h2>\n<p>The 900-year-old city of Bergen is Norway\'s second largest city. With its small-town charm Bergen has roots back to the Viking age. It rests between mountain sides with the fjord as its base and is a must-see for visitors planning to explore Norway.</p>\n<p>Just a short trip from Bergen you will experience the majestic and dramatic Fjords of Norway</p>\n<p>Like Oslo, Bergen is a vibrant city mixing traditions with new youthful moods brining a warm atmosphere to the city character. </p>\n<p>Bergen offers countless attractions ranging from RIB-tours between in the mighty fjords, hiking in the mountains, city tours, cableway tours and much more. </p>\n<p>In addition, the city is full of museums, art galleries, culinary delights and nights clubs to suit any taste in mind.   </p>\n<p>Let´s talk Bergen and prepare your journey into Norway´s fjord capital!</p>\n<p>More inspiration to be found on <a href=\"https://www.visitbergen.com/\" target=\"_blank\">Bergen´s official website.</a></p>', 'Alexander Aaland', '2019.02.19 08:44:14am', 'published', 'Destination Bergen&nbsp;- Access Oslo', '<p><br></p>', '/assets/uploads/pages/LErLfJSKYIZtd7GzMnPYY0TEMBxENxGrnYsjr2C7.jpeg', '2019-02-08 17:23:40', '2019-02-19 08:44:14', 'Destination Bergen', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('43', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">Destination Tromsø</h1>', '<h2>Two words: Northern light and the midnight sun </h2>\n<p>It just has to be on your bucket list; the truly amazing northern light. \n350 kilometres above the Arctic circle lies the largest city in northern Norway; Tromsø. \nNature and culture go hand in hand in this modern arctic city and from September to March people comes from all over the word to see the northern lights. From 20th May to 20th of July the sun never sets. This phenomena is called the midnight sun. \n</p>\n<p>Despite its northerly location Tromsø has a relatively mild climate thanks to the warming effect of the Gulf stream. </p>\n<p>Tromsø is definitively an arena for outdoor experiences with the wilderness just around the corner. Activities to mention is hiking, fishing, RIB-tours, whale safaris, dog sledding and camping underneath the northern lights in a glass dome cottage just to mention. </p>\n<p>Tromsø has a lively night scene and it´s widely known for their night clubs and restaurants. </p>\n<p>Access Oslo is your gateway to Tromsø and the arctic region. </p>\n<p>Find more inspiration on <a href=\"https://www.visittromso.no/en\" target=\"_blank\">Tromsø’s official website</a>.</p>', 'Nohman Janjua', '2019.02.19 01:16:25pm', 'published', 'Destination Tromsø&nbsp;- Access Oslo', '<p><br></p>', '/assets/uploads/pages/iAEGlYI9GrrECyJv9EroLCiGbudl7QdRvnuWwDdf.jpeg', '2019-02-08 19:06:02', '2019-07-16 04:24:57', 'Destination Tromsø', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('44', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">Meetings</h1>', '<h2>Add the X-factor to your next meeting</h2>\n<p>Add the X-factor to your next meeting</p>\n<p>We arrange meetings tailored to your requests or we can assist in proposing a theme or setup for your meeting both in Norway and abroad. </p>\n<p>Getting the right location and scene for the activities is essential. Like you perhaps already know, we organize everything from travel, to location, lunch and dinner and events to be included. Simply your one-stop-shop. </p>\n<p>If you have planned a meeting let´s get in touch so we can inspire you. </p>', 'Nohman Janjua', '2019.02.19 01:46:54am', 'published', 'Meetings&nbsp;- Access Oslo', '<p><br></p>', '/assets/uploads/pages/cYD1KPmzW54kP3tozVipf69Krw2XKBUf8oOGxKwg.jpeg', '2019-02-08 19:17:18', '2019-07-16 04:24:57', 'Meetings', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('45', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">Incentives</h1>', '<h2>Bring your customers close but your employees closer</h2>\n<p>Access Oslo arrange a wide range of incentives and team buildings for your customers or employees. </p>\n<p>This can be a tailored trip, an unforgettable team-building field excursion or a special treat according to your wishes. If you have absolutely no idea – we have plenty and we know for sure what´s working or not!</p>\n<p>Get in touch with our creative staff so we can bring ideas to life</p>', 'Nohman Janjua', '2019.02.19 01:25:26am', 'published', 'Incentives&nbsp;- Access Oslo', '<p><br></p>', '/assets/uploads/pages/gKr8NUy3R0eJAYvlBhd9DgvtsHsDSubAQxnTR76E.jpeg', '2019-02-08 19:21:54', '2019-07-16 04:24:57', 'Incentives', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('46', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">conference</h1>', '<h2>Rock ‘n’ Roll – Full Control </h2>\n<p>It´s all about super control, even of the smallest details. </p>\n<p>Setting up a conference is similar to building a domino track – when one brick fall, the outcome may lead to a disaster. Our mission and target is of course to arrange fail safe events. This is supported by good project management and a steady Captain aka the Project Manager. </p>\n<p>Our team has experience and education from project management and will guide you through the details of a successful Conference. </p>\n<ul>\n<li>Location</li>\n<li>Infrastructure and architecture </li>\n<li>Crowd / visitor control </li>\n<li>Project Management</li>\n<li>Event planning </li>\n<li>Travel assistance and HOTAC</li>\n<li>Speaker coordination </li>\n</ul>\n<p>Let´s talk about how we can proceed to get things moving</p>', 'Nohman Janjua', '2019.02.19 01:25:39am', 'published', 'Conference&nbsp;- Access Oslo', '<p><br></p>', '/assets/uploads/pages/cve4g96fTAjFZuaRB5emfy2Ara2JCGLkPniY8lko.jpeg', '2019-02-08 19:29:17', '2019-07-16 04:24:57', 'conference', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('47', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">Events</h1>', '<h2>It’s all about the attention to details. </h2>\n<p>Give your clients something to remember. Access Oslo´s creative planning team work closely with you to create a unique experience based upon your company profile, or a theme of your choice. </p>\n<p>For every successful event – good planning is of the essence. We are with you the whole time, from planning – to execution – and doing the aftermath. </p>\n<p>We specialise in tailored high-end event and no case is too small or too big. </p>\n<p>Let´s have a chat and be inspired</p>', 'Alexander Aaland', '2019.02.19 01:46:37am', 'published', 'Events&nbsp;- Access Oslo', '<p><br></p>', '/assets/uploads/pages/E7OfKPaSeyUjhDbWMQ5I42RNUgQWNKLgYRFIXSWU.jpeg', '2019-02-08 19:34:13', '2019-02-19 01:46:37', 'Events', '<p><br></p>', '', '', '', '');
INSERT INTO `pages` VALUES ('48', '<h1 style=\"font-size: 45px; font-family: Gotham-Book; color: rgb(255, 255, 255); text-transform: uppercase; text-align: center;\">WeddingS</h1>', '<h2>First time or third time – we only care about giving you the time of your life. </h2>\n<p>We have an excellent cooperation with the very best weddings planners in Norway and we coordinate every step of your journey to the alter and the last steps to your door threshold</p>\n<p>Worldwide weeding coordination, private jets, helicopter, sea, fjords or mountains. Everything is possible. </p>\n<p>So, how can we get started? </p>', 'Alexander Aaland', '2019.02.19 01:35:47am', 'published', 'Weddings - Access Oslo', '<p><br></p>', '/assets/uploads/pages/yYcc3gzS22jyqF6mnG2htxgSOvT7uEDLV5XI9r1f.jpeg', '2019-02-08 19:39:10', '2019-02-19 01:35:47', 'WeddingS', '<p><br></p>', '', '', '', '');

-- ----------------------------
-- Table structure for `page_slide_images`
-- ----------------------------
DROP TABLE IF EXISTS `page_slide_images`;
CREATE TABLE `page_slide_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `is_sub_banner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of page_slide_images
-- ----------------------------
INSERT INTO `page_slide_images` VALUES ('5', '42', '/assets/uploads/pages/5twQgntDBadlFFOIP1oL6KvcZDaX31GARaSlw8Uq.jpeg', '2019-02-13 08:15:43', '2019-02-18 07:38:01', 'true');
INSERT INTO `page_slide_images` VALUES ('6', '43', '/assets/uploads/pages/eP6w5eetwnAKGxPANh1FjxNUM5VB3lWD6zDLY24v.jpeg', '2019-02-18 07:39:13', '2019-02-18 07:39:13', 'true');
INSERT INTO `page_slide_images` VALUES ('7', '44', '/assets/uploads/pages/99l693wAk9j3GL1uwqKXSj7WNZcttah7zK5c67lD.jpeg', '2019-02-18 07:55:36', '2019-02-18 07:55:36', 'true');
INSERT INTO `page_slide_images` VALUES ('8', '45', '/assets/uploads/pages/xwW70kbfwsqy1oEBv1JhrkOKvcMAhkNoh24Myyit.jpeg', '2019-02-18 07:56:22', '2019-02-18 07:56:22', 'true');
INSERT INTO `page_slide_images` VALUES ('9', '46', '/assets/uploads/pages/ryIl0S0RtXtaXGZZYZiwoa55IEFxCTAclDzBrn1R.jpeg', '2019-02-18 07:57:28', '2019-02-18 07:57:28', 'true');
INSERT INTO `page_slide_images` VALUES ('10', '47', '/assets/uploads/pages/NWIms4GJGgzgzQgrOHdEcB86dfO6unUt2lPEynAe.jpeg', '2019-02-18 07:58:01', '2019-02-18 07:58:01', 'true');
INSERT INTO `page_slide_images` VALUES ('11', '48', '/assets/uploads/pages/PwXwGcfRjwQLotBgeaoW6NygpzN0aDD4nteMEvhu.jpeg', '2019-02-18 07:58:32', '2019-02-18 07:58:32', 'true');
INSERT INTO `page_slide_images` VALUES ('12', '41', '/assets/uploads/pages/wrgswkWA5IS68CDVpCcNoz7eXdR5PlMnjReDvzpE.jpeg', '2019-02-18 08:01:42', '2019-02-18 08:01:42', 'true');
INSERT INTO `page_slide_images` VALUES ('138', '42', '/assets/uploads/pages/404291371550565162.png', '2019-02-19 08:32:42', '2019-02-19 08:32:42', null);
INSERT INTO `page_slide_images` VALUES ('139', '42', '/assets/uploads/pages/146202891550565162.png', '2019-02-19 08:32:42', '2019-02-19 08:32:42', null);
INSERT INTO `page_slide_images` VALUES ('140', '42', '/assets/uploads/pages/732618551550565162.png', '2019-02-19 08:32:42', '2019-02-19 08:32:42', null);
INSERT INTO `page_slide_images` VALUES ('141', '42', '/assets/uploads/pages/826060621550565162.png', '2019-02-19 08:32:42', '2019-02-19 08:32:42', null);
INSERT INTO `page_slide_images` VALUES ('142', '42', '/assets/uploads/pages/198267951550565162.png', '2019-02-19 08:32:42', '2019-02-19 08:32:42', null);
INSERT INTO `page_slide_images` VALUES ('143', '15', '/assets/uploads/pages/679761751550567765.png', '2019-02-19 09:16:05', '2019-02-19 09:16:05', null);
INSERT INTO `page_slide_images` VALUES ('144', '15', '/assets/uploads/pages/445406831550567765.png', '2019-02-19 09:16:05', '2019-02-19 09:16:05', null);
INSERT INTO `page_slide_images` VALUES ('145', '15', '/assets/uploads/pages/727670261550567765.png', '2019-02-19 09:16:05', '2019-02-19 09:16:05', null);
INSERT INTO `page_slide_images` VALUES ('146', '15', '/assets/uploads/pages/759061141550567765.png', '2019-02-19 09:16:05', '2019-02-19 09:16:05', null);
INSERT INTO `page_slide_images` VALUES ('147', '15', '/assets/uploads/pages/846294071550567765.png', '2019-02-19 09:16:05', '2019-02-19 09:16:05', null);

-- ----------------------------
-- Table structure for `partners`
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `last_audit` varchar(30) NOT NULL,
  `coverage` varchar(255) NOT NULL,
  `average_flight` varchar(255) NOT NULL,
  `operate_since` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `valid` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `main_img` varchar(255) DEFAULT NULL,
  `description` text,
  `additional_fee` varchar(255) NOT NULL,
  `sub_img` varchar(255) DEFAULT NULL,
  `norway_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES ('8', '258', 'Norway Charter', 'Adan', '+4745494649', 'accessoslo@support.no', '01/17/2019', 'sadsa', '33', '22', 'false', 'true', '2019-02-15 23:35:24', '2019-04-06 13:24:53', 'norway', null, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software including versions of Lorem Ipsum.', '', null, '<p class=\"MsoNormal\"><span lang=\"EN-GB\"></span></p><h2 style=\"font-family: Gotham-book; color: rgb(72, 83, 155); margin: 0px 0px 20px; font-size: 36px; text-transform: uppercase;\"><span style=\"color: rgb(194, 152, 52);\">This is a dummy title</span></h2><p class=\"MsoNormal\"><span lang=\"EN-GB\">As you can see in the screenshot above. If\nyou tick the tickbox next to INBOUND and/or OUTBOUND then you will be able to\nfill out the forms. If you don’t tick the tickbox then you will not be able to\nfill out the form.<o:p></o:p></span></p>');
INSERT INTO `partners` VALUES ('9', '239', 'ABC', 'Dmitrii Katserikov', '+4740612345', 'WorldHero2018@hotmail.com', '02/22/2019', '23', '11', '22', 'true', 'true', '2019-02-18 23:31:51', '2019-02-19 01:38:02', 'aircharter', null, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from de Finibus Bonorum et Malorum by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '', null, null);
INSERT INTO `partners` VALUES ('10', '261', 'NorwayAirForce', 'Mae Taylor', '+4740612345', 'mae.taylor93@gmail.com', '03/14/2019', '5', '221', '2010', 'true', 'true', '2019-03-08 04:59:16', '2019-03-31 15:54:47', 'aircharter', null, 'Test', '3.3', null, null);
INSERT INTO `partners` VALUES ('11', '262', 'SwissAirline', 'Claudia Pierce', '+4740612322', 'claudia.pierce42@gmail.com', '03/22/2019', '2', '5555', '2002', 'true', 'true', '2019-03-08 09:15:37', '2019-03-31 15:55:24', 'aircharter', null, 'Swiss Airline Force', '24', null, null);
INSERT INTO `partners` VALUES ('12', '265', 'SpecialCharter', 'Cassandra Hill', '+4740612345', 'cassandra.hill60@gmail.com', '03/14/2019', '5', '221', '2009', 'true', 'true', '2019-03-19 05:11:54', '2019-03-31 15:54:31', 'aircharter', null, 'Cassandra Hill\'s charter', '20', null, null);
INSERT INTO `partners` VALUES ('13', '266', 'American Airlines', 'Elmer Harris', '+4740612345', 'elmer.harris78@gmail.com', '03/23/2019', '5', '111', '2000', 'true', 'true', '2019-03-22 16:07:18', '2019-03-31 15:54:17', 'aircharter', null, 'American Airlines\'s Luxury Services', '15', null, null);

-- ----------------------------
-- Table structure for `partner_rate`
-- ----------------------------
DROP TABLE IF EXISTS `partner_rate`;
CREATE TABLE `partner_rate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(255) NOT NULL,
  `total_rate` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `highlight` varchar(255) DEFAULT NULL,
  `atmosphere` varchar(255) DEFAULT NULL,
  `testimonial` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `data_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partner_rate
-- ----------------------------

-- ----------------------------
-- Table structure for `passengers`
-- ----------------------------
DROP TABLE IF EXISTS `passengers`;
CREATE TABLE `passengers` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `passport_expiry` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of passengers
-- ----------------------------
INSERT INTO `passengers` VALUES ('1', '239', 'male', 'Dmitrii', 'Katserikov', '04/06/1996', 'Russian Federation', 'RU61745428021635368701649948', '04/18/2021', '2019-04-04 21:23:41', '2019-04-04 21:23:41');
INSERT INTO `passengers` VALUES ('2', '239', 'female', 'Oksana', 'Ivanovna', '11/06/1994', 'Russian Federation', 'RU84487515108210724770414847', '08/01/2020', '2019-04-04 21:25:48', '2019-04-04 21:25:48');
INSERT INTO `passengers` VALUES ('3', '239', 'female', 'Yulee', 'Shin', '04/09/1997', 'South Korea', 'KR73642899838859173929101465', '04/09/2021', '2019-04-04 21:33:18', '2019-04-04 21:33:18');
INSERT INTO `passengers` VALUES ('15', '239', 'male', 'Ernst', 'Sæther', '04/11/1981', 'Norway', 'NO5914262380786', '05/20/2021', '2019-04-11 17:01:48', '2019-04-11 17:01:48');
INSERT INTO `passengers` VALUES ('16', '239', 'male', 'Brage', 'Hanssen', '16/09/1935', 'Norway', 'NO3093663568779', '04/18/2021', '2019-04-11 18:47:53', '2019-04-11 18:47:53');
INSERT INTO `passengers` VALUES ('17', '239', 'male', 'Erik', 'Madsen', '07/01/2019', 'Norway', 'aa', '07/18/2019', '2019-07-01 13:54:35', '2019-07-01 13:54:35');
INSERT INTO `passengers` VALUES ('18', '239', 'male', 'Erik', 'Vukovic', '07/06/2019', 'Norway', '1', '1', '2019-07-04 19:42:03', '2019-07-04 19:42:03');
INSERT INTO `passengers` VALUES ('19', '239', 'male', 'Petar', 'Jesic', '07/13/2019', 'Norway', '11', '22', '2019-07-04 19:49:33', '2019-07-04 19:49:33');
INSERT INTO `passengers` VALUES ('20', '239', 'male', 'Nikola', 'Vukovic', '07/27/1996', 'Serbia', '8061808652SE7909227F2709215', '08/03/2021', '2019-07-08 03:38:22', '2019-07-08 03:38:22');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `en_post_title` varchar(255) DEFAULT NULL,
  `en_post_description` text,
  `en_meta_title` varchar(255) DEFAULT NULL,
  `en_meta_description` varchar(255) DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `single_img` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `published_date` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `post_title_plain` varchar(255) NOT NULL,
  `nb_post_title` varchar(255) DEFAULT NULL,
  `nb_post_description` text,
  `nb_meta_title` varchar(255) DEFAULT NULL,
  `nb_meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'access sies', 'www1213', 'sdwdwdwdwdww', 'dwwdwwdwd', '/assets/uploads/posts/trsGbtPx8qZbJpWbdNgJg4FBlH8XbK7eD9s3r3tB.jpeg', '/assets/uploads/posts/gvN55frUybrsd6a4iNlXqGsdbhzl9GaV2JVdExsq.jpeg', 'published', 'Nohman Janjua', '2019.07.30', '2018-11-11 23:18:57', '2019-07-30 01:55:20', 'access sies', 'asss', 'asss', 'asss', 'asss');

-- ----------------------------
-- Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `date_birth` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `home_phone` varchar(30) NOT NULL,
  `addInfo_address1` varchar(255) DEFAULT NULL,
  `addInfo_address2` varchar(255) DEFAULT NULL,
  `addInfo_city` varchar(255) DEFAULT NULL,
  `addInfo_region` varchar(255) DEFAULT NULL,
  `addInfo_code` varchar(255) DEFAULT NULL,
  `addInfo_country` varchar(255) DEFAULT NULL,
  `billInfo_address1` varchar(255) DEFAULT NULL,
  `billInfo_address2` varchar(255) DEFAULT NULL,
  `billInfo_city` varchar(255) DEFAULT NULL,
  `billInfo_region` varchar(255) DEFAULT NULL,
  `billInfo_code` varchar(255) DEFAULT NULL,
  `billInfo_country` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `billInfo_company` varchar(255) DEFAULT NULL,
  `sms_notification` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('2', '239', '04/13/1992', 'Fantasylab', '+4740612345', 'Traverveien 11', '', 'Oslo City', 'Oslo', '0588', 'Norway', null, null, null, null, null, 'Norway', '2019-03-31 15:02:33', '2019-04-06 02:13:53', 'male', 'Dmitrii', 'Katserikov', 'WorldHero2018@hotmail.com', '', 'true');

-- ----------------------------
-- Table structure for `security_questions`
-- ----------------------------
DROP TABLE IF EXISTS `security_questions`;
CREATE TABLE `security_questions` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `pwd_que1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `pwd_que2` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of security_questions
-- ----------------------------

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `configuration` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', '{\"free_shipping\":true,\"notification_bar\":{\"on\":false,\"message\":\"Great app\"}}', '2018-04-01 00:00:00', '2018-04-01 00:00:00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `profile_complete` varchar(20) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `bonus` varchar(255) DEFAULT '0',
  `verification_code` varchar(255) DEFAULT NULL,
  `partner_permission` varchar(25) DEFAULT NULL,
  `emptyleg_flight_notice` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('34', 'Nohman', 'Janjua', 'Russia', 'Khavarobsk', 'admin@mail.com', '+4740612345', '$2y$10$wR80dbwbA5lHV034d3/.tOh2n9fbGB8Wkz/hDzg82T4rq6VB.Fgta', '2018-04-11 12:01:09', '2019-07-16 04:24:57', '0', 'zjR2MLpcKH5rvPwfXivoM7COp3cuIgMopxxPFeGT8KkU6wBdG5FBTqBwTq4G', 'male', 'false', '/assets/uploads/users/YJQfmd9hyqUUEV5nvfyi5sQKZndrD8HUrBUAQnqm.jpeg', '0', null, null, '0', 'Fantasylab');
INSERT INTO `users` VALUES ('35', 'Dmitrii', 'Katserikov', 'Norway', 'Oslo', 'user@mail.com', '+4740612345', '$2y$10$JGeueJwgHYpSCE4MN0uoIuUZbpWcd1tkptf2mFRWKINrUTyQLXZua', '2018-04-11 12:02:15', '2019-02-19 01:44:28', '1', '7sjRr1Cs69di0kCM6V34rQ395b0NTiiuxuAgbVG6SQkuSvEnDzAACcvhgJy7', 'male', 'false', '', '0', null, 'true', '0', 'Fantasylab');
INSERT INTO `users` VALUES ('235', 'Nohman', 'Janjua', 'Norway', 'Oslo', 'hotjar@fantasylab.no', '+4745494649', '$2y$10$zca6gVw677cmjJHx//ALP.WRt.4RGVCrwhfJoUdia1afEWbJWA0V.', '2018-08-28 09:04:19', '2019-04-11 20:29:07', '2', 'Qm8KqN7FkNZFFPoch5g9gntd8u0blkFmedK1i4KvTWVAcInLIvYupnhA8drI', 'male', 'false', '', '0', '729576', null, '8', 'Fantasylab');
INSERT INTO `users` VALUES ('237', 'Tom', 'Cruise', '', '', 'dmitrii@fantasylab.io', '+4740612345', '$2y$10$ibks.WMNVZvWmLu0HX0KhuKeF5KvY2F9fkswvOFG0wXwGbe3ETevS', '2018-09-23 15:21:05', '2019-04-11 20:29:07', '2', '', 'male', 'false', '', '0', null, null, '8', 'Fantasylab');
INSERT INTO `users` VALUES ('238', 'Tom', 'Cruise', '', '', 'dmitrii@fantasy.io', '+4740612345', '$2y$10$Hq9hpGp8w2HIn6jzornEXeIPnfrNbndthJTF3naWdNfM6CwMTparC', '2018-09-23 15:44:34', '2019-04-11 20:29:07', '2', '', 'male', 'false', '', '0', null, null, '8', 'Fantasylab');
INSERT INTO `users` VALUES ('239', 'Dmitrii', 'Katserikov', 'China', 'Shenyang', 'WorldHero2018@hotmail.com', '+4740612345', '$2y$10$wR80dbwbA5lHV034d3/.tOh2n9fbGB8Wkz/hDzg82T4rq6VB.Fgta', '2018-09-23 15:53:17', '2019-04-11 20:29:07', '2', 'KIWW5eo0ukmzBtBHAvYcH9mLaBe1Z0V9hkGgyolG2zGwThPU5V7OGYrSaman', 'male', 'true', '', '200', null, 'true', '8', 'Fantasylab');
INSERT INTO `users` VALUES ('240', 'Tom', 'Cruise', '', '', 'sheelo@mail.com', '+4740612345', '$2y$10$d2qjf9M8c316Y74GsdD3d.RIM2GVW.3sw.88wSvIb72oiFo3E07te', '2018-09-24 16:20:21', '2019-04-11 20:29:07', '2', '', 'male', 'false', '', '0', null, null, '8', 'Fantasylab');
INSERT INTO `users` VALUES ('241', 'Tom', 'Cruise', 'Norway', 'asd', 'TomCruise22@protonmail.com', '+4740612345', '$2y$10$wR80dbwbA5lHV034d3/.tOh2n9fbGB8Wkz/hDzg82T4rq6VB.Fgta', '2018-09-24 16:30:27', '2019-04-11 20:29:07', '2', 'aqOnJATM6Pcskr8IZIMKcDj0U8XKvJqmzvVvaL4r42k3VgJkPfBb2CttApLr', 'male', 'true', '', '56', null, null, '8', 'Olive');
INSERT INTO `users` VALUES ('247', 'James', 'Rodrigues', '', '', 'James@football.com', '+4740612345', '$2y$10$2JzFnytzAQVQWlM03vKZO.zVcoXx4mWIfEpI02uowWdYxL6Hb1I62', '2018-11-14 06:42:44', '2019-04-11 20:29:07', '2', '', 'male', 'false', '', '0', null, null, '8', 'Olive');
INSERT INTO `users` VALUES ('248', '111', null, '', '', 'ss@ss.com', '+4740612345', '$2y$10$wR80dbwbA5lHV034d3/.tOh2n9fbGB8Wkz/hDzg82T4rq6VB.Fgta', '2018-11-14 07:00:33', '2019-01-15 09:24:17', '1', 'vNCQzyTqAvj8oQSVEKSwIDY0yv8RDjX5AZJdochXuMZcDelkESXiZAsTOKdx', 'male', null, '', '0', null, 'false', '0', 'Olive');
INSERT INTO `users` VALUES ('257', 'Chris', 'zz', 'zx', 'zx', 'WorldHero707505@gmail.com', '+4740611222', '$2y$10$HcOaWjfKHDXoNQ8xkUNZkeSWaTtgclY8GQ/qOYNnYpkf.mdiHdan6', '2018-11-16 03:14:24', '2019-04-11 20:29:07', '2', 'DEBWMHaygr4AAs3nyJg4uhtXBK9gZGXn03wbL0IR5s7rhlgEB34a59s8uIkX', 'male', 'false', '', '0', '538224', null, '8', 'Olive');
INSERT INTO `users` VALUES ('258', 'Adan', null, '', '', 'accessoslo@support.no', '+4745494649', '$2y$10$zI/9COeW0w/xBYdHLOMoX.UUMu.mx7/6rtQHJWDqx76kYjuWayx8e', '2019-02-15 23:35:24', '2019-04-06 13:24:53', '1', '', null, null, '', '0', null, 'false', '0', 'Olive');
INSERT INTO `users` VALUES ('259', 'wdw', null, '', '', 'administrator@proguiden.no', '+4740612345', '$2y$10$e8s3VfEg/g8dGygWaZ3fFurX8ihQ2s8lXcY4Q.iwqGlO.EJTWRt0W', '2019-02-19 02:08:57', '2019-02-19 02:08:57', '1', '', null, null, '', '0', null, null, '0', 'Olive');
INSERT INTO `users` VALUES ('260', 'James', 'Bond', '', '', 'jamescollin1992@gmail.com', '+4740612345', '$2y$10$0jmX.u67xaLgGEG4yG34oO4eEaRpcsRh8cgtp9oGx71vljuofTn0a', '2019-02-20 05:11:06', '2019-04-11 20:29:07', '2', '6YLdotmRCZ38Wn1YKqSOh2e1LM4ju059YAz3xVM0rbzH3gutuq17B2rPBvHS', 'male', 'false', '', '0', null, null, '8', 'Olive');
INSERT INTO `users` VALUES ('261', 'Mae', 'Taylor', '', '', 'mae.taylor93@gmail.com', '+4740612345', '$2y$10$RUP.L1eYpD8mJsCxR8v6oODc/LoVxfryCpM.8YHLJtZIYiUix8.06', '2019-03-08 04:59:16', '2019-03-31 15:54:47', '1', 'xpVS6azpdGDPIha3HzHuraEUmnXLLH2xifdnPXO9pExeZ8aLDgqRc88E907x', null, null, '', '0', null, 'true', '0', 'Olive');
INSERT INTO `users` VALUES ('262', 'Claudia', 'Pierce', '', '', 'claudia.pierce42@gmail.com', '+4740612322', '$2y$10$BKmoBw43lSWw5jvW6DeOTeFlmCw6CwXa5xutZ1449ekmCv5JXHp3q', '2019-03-08 09:15:36', '2019-07-08 17:02:53', '1', 'FtRGqvkcqgHBPOssRKw0WEt2Y8dQRjDXJkf5WnpjM5RELdDTw4EQhhsVmIW9', null, null, '', '0', null, 'true', '0', 'Olive');
INSERT INTO `users` VALUES ('263', 'Sophia', 'Lewis', '', '', 'sophia.lewis97@gmail.com', '+4740612345', '$2y$10$U6wgV3FRYPVGO3e/yb5A1eWXOgbZJQbK.C0uTSCos8xb/D6y1aqBC', '2019-03-18 22:30:04', '2019-04-11 20:29:07', '2', 'VqOnz21s3Ts8TyBbkaZjMD5LD3H9DAkLr5UxX5I9uvvNqwzBCMorL5GQRRRX', 'female', 'false', '', '0', null, null, '7', 'Olive');
INSERT INTO `users` VALUES ('264', 'Jerome', 'Armstrong', '', '', 'jerome.armstrong55@gmail.com', '+4740612345', '$2y$10$fIXJjADvlp/5ZmqXgH5jY.qlAt7EOTXNGlwkfTOyOS7I8A6.uANN6', '2019-03-18 23:25:12', '2019-04-11 20:29:07', '2', '5jGiKPMVOZw3YXRWOIsSgnuLKR5a5Ma4B0JkWqUg0d6LZq78scP0sjyqWaZ1', 'male', 'false', '', '0', null, null, '7', 'Olive');
INSERT INTO `users` VALUES ('265', 'Cassandra', 'Hill', '', '', 'cassandra.hill60@gmail.com', '+4740612345', '$2y$10$zH3Z.DL.YW/RNBh9Ego8u.6X47jz1l4ihQcFZM3OPbgbaIEtQchKm', '2019-03-19 05:06:43', '2019-03-31 15:54:31', '1', '', null, null, '', '0', null, 'true', '0', null);
INSERT INTO `users` VALUES ('266', 'Elmer', 'Harris', '', '', 'elmer.harris78@gmail.com', '+4740612345', '$2y$10$0AF6jweyNmrQAY8S7U42V.LRvF./18vIvUupneoF49vjoSQZSOFQe', '2019-03-22 16:07:18', '2019-03-31 15:54:16', '1', '', null, null, '', '0', null, 'true', '0', null);
INSERT INTO `users` VALUES ('272', 'Gordon', 'Graham', '', '', 'gordon.graham46@gmail.com', '+4740612345', '$2y$10$g9znMRlU09YfF1Rd8Ki/1.2IytlIUwasTPNlC4ikSBxKNEG50qd0.', '2019-03-22 19:36:34', '2019-04-11 20:29:07', '2', 'fa0my8pNkSVjkXQyw9OYEH7faiCL5BPRJtHCqCVksMrPYeYv8ORybg5uFuzy', 'male', 'false', '', '0', null, null, '7', 'Cherry St');
INSERT INTO `users` VALUES ('273', 'Elmer', 'Reynolds', '', '', 'elmer.reynolds54@gmail.com', '+4740612345', '$2y$10$lToG63oKR4jBrr5K6JINWejYk3YyFvEQRjzaUsxnfuKYOIm3jWBD.', '2019-03-22 19:37:47', '2019-04-11 20:29:07', '2', 'UDtpJFZCumydLB1N9IhlCmgJ66nWwxDHOVnxZpQk6k0P3Mvl6pAKvENMyNNu', 'male', 'false', '', '0', null, null, '7', 'Shelley St');
INSERT INTO `users` VALUES ('277', 'Phyllis', 'Terry', '', '', 'phyllis.terry85@gmail.com', '+4740612345', '$2y$10$wR80dbwbA5lHV034d3/.tOh2n9fbGB8Wkz/hDzg82T4rq6VB.Fgta', '2019-03-23 00:29:55', '2019-04-11 20:29:07', '2', 'qIta108ReNJjZ3q9vBGNpKkJzIWCuIwo4lqKn2KjOOrku8i80N9oVi25uD0Y', 'female', 'false', '', '0', null, null, '7', 'Wayne Rd');
INSERT INTO `users` VALUES ('278', 'Brian', 'Rice', '', '', 'brian.rice30@gmail.com', '+4740612345', '$2y$10$ovVDO614BKP6Ctef.zH72eOXXuZjquwIZo5Id4kCJY5ni.X5PQzfm', '2019-03-23 19:02:02', '2019-04-11 20:29:07', '2', 'a3ZBdmiXrgGeO4sl3kRXHpaRDnxBlFsugqU3AJwaF4g2PP3vT32zgScObgEk', null, 'false', '', '0', null, null, '7', null);
INSERT INTO `users` VALUES ('281', 'Nikola', 'Vukovic', '', '', 'lifeisyoureality@gmail.com', '+4740612345', '$2y$10$BWmaY7DHy.uKr0p8OesqW.H.ELkWwIVtnU.0y9WgFCwmWAiEuBRaC', '2019-07-07 14:44:02', '2019-07-07 14:44:02', '2', '', null, 'false', '', '0', null, null, '0', null);
INSERT INTO `users` VALUES ('283', 'Dmitrii', 'Katserikov', '', '', 'lifeisyoureality@hotmail.com', '+4740612345', '$2y$10$0ngz5pUu5CL2smSs3hPNW.xkP4wCA3DTTaJmtc02qzGMYNMauBXMm', '2019-07-09 21:07:43', '2019-07-09 21:07:43', '2', '', null, 'false', '', '0', null, null, '0', null);

-- ----------------------------
-- Table structure for `user_emptyleg`
-- ----------------------------
DROP TABLE IF EXISTS `user_emptyleg`;
CREATE TABLE `user_emptyleg` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `gender` varchar(30) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'awaiting',
  `is_added` varchar(255) DEFAULT '1',
  `departure` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `member_notice` varchar(255) DEFAULT '0',
  `payment_id` varchar(255) DEFAULT NULL,
  `charter_id` varchar(255) DEFAULT NULL,
  `passengers` varchar(255) DEFAULT NULL,
  `is_review` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_emptyleg
-- ----------------------------
INSERT INTO `user_emptyleg` VALUES ('13', 'male', 'Dmitrii Katserikov', 'Fantasylab', '+4740612345', 'WorldHero2018@hotmail.com', '2019-03-24 06:30:47', '2019-03-24 06:32:21', 'paid', '1', 'Gardermoen (OSL)', 'Flesland (BGO)', '03/25/2019', '10 : 51 PM', 'NorwayAirForce', 'Air707', 'EUR', '320', '0', '1013411291', '2', '332', null);
INSERT INTO `user_emptyleg` VALUES ('14', 'male', 'Dmitrii Katserikov', 'Fantasylab', '+4740612345', 'WorldHero2018@hotmail.com', '2019-03-24 07:30:10', '2019-03-24 07:31:36', 'paid', '1', 'Gardermoen (OSL)', 'Flesland (BGO)', '03/25/2019', '7 : 07 AM', 'SwissAirline', 'Boeing777', 'EUR', '3222', '0', '1318895943', '4', '32', null);
INSERT INTO `user_emptyleg` VALUES ('50', 'male', 'Dmitrii Katserikov', 'Fantasylab', '+4740612345', 'WorldHero2018@hotmail.com', '2019-04-11 20:17:29', '2019-04-11 20:19:05', 'paid', '1', 'Gardermoen (OSL)', 'Flesland (BGO)', '04/11/2019', '22 : 47', 'NorwayAirForce', 'Boeing777', 'EUR', '3500', '0', '1048474278', '7', '451', null);
INSERT INTO `user_emptyleg` VALUES ('52', 'male', 'Dmitrii Katserikov', 'Fantasylab', '+4740612345', 'WorldHero2018@hotmail.com', '2019-04-11 21:05:06', '2019-04-11 21:06:41', 'paid', '1', 'Gardermoen (OSL)', 'Capital Intl (PEK)', '04/20/2019', '02 : 30', 'NorwayAirForce', 'Boeing707', 'EUR', '3000', '0', '1391509115', '9', '15', null);
