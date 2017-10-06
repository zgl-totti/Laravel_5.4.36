/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : laravel_5.4

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-06 17:22:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yhyg_account`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_account`;
CREATE TABLE `yhyg_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` float(8,0) unsigned DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  `action` int(5) DEFAULT '1' COMMENT '1为消费，2为充值,3积分兑换',
  `mid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_account
-- ----------------------------
INSERT INTO `yhyg_account` VALUES ('1', '1000', '1478424134', '2', '22');
INSERT INTO `yhyg_account` VALUES ('2', '748', '1478426263', '1', '7');
INSERT INTO `yhyg_account` VALUES ('3', '699', '1478480155', '1', '7');
INSERT INTO `yhyg_account` VALUES ('4', '1298', '1478480262', '1', '7');
INSERT INTO `yhyg_account` VALUES ('5', '2928', '1478480273', '1', '7');
INSERT INTO `yhyg_account` VALUES ('6', '3399', '1478480419', '1', '7');
INSERT INTO `yhyg_account` VALUES ('7', '699', '1478481198', '1', '7');
INSERT INTO `yhyg_account` VALUES ('8', '3699', '1478481210', '1', '7');
INSERT INTO `yhyg_account` VALUES ('9', '6188', '1478481534', '1', '7');
INSERT INTO `yhyg_account` VALUES ('10', '1000', '1478485566', '2', '22');
INSERT INTO `yhyg_account` VALUES ('11', '50', '1478505278', '3', '22');
INSERT INTO `yhyg_account` VALUES ('12', '50', '1478505319', '3', '22');
INSERT INTO `yhyg_account` VALUES ('13', '10980', '1478517158', '1', '26');
INSERT INTO `yhyg_account` VALUES ('14', '1098', '1478517257', '1', '26');
INSERT INTO `yhyg_account` VALUES ('15', '7998', '1478517769', '1', '22');
INSERT INTO `yhyg_account` VALUES ('16', '4299', '1478517826', '1', '22');
INSERT INTO `yhyg_account` VALUES ('17', '2180', '1478518279', '1', '26');
INSERT INTO `yhyg_account` VALUES ('18', '1000', '1478518692', '2', '26');
INSERT INTO `yhyg_account` VALUES ('19', '100000', '1478522823', '2', '26');
INSERT INTO `yhyg_account` VALUES ('20', '3399', '1478599262', '1', '22');
INSERT INTO `yhyg_account` VALUES ('21', '50', '1478656389', '3', '22');
INSERT INTO `yhyg_account` VALUES ('22', '50', '1478661907', '3', '7');
INSERT INTO `yhyg_account` VALUES ('23', '7699', '1478665754', '1', '26');
INSERT INTO `yhyg_account` VALUES ('24', '7699', '1478679515', '1', '5');
INSERT INTO `yhyg_account` VALUES ('25', '50', '1478684909', '3', '22');
INSERT INTO `yhyg_account` VALUES ('26', '50', '1478684971', '3', '22');
INSERT INTO `yhyg_account` VALUES ('27', '20000', '1478685643', '2', '9');
INSERT INTO `yhyg_account` VALUES ('28', '10197', '1478685657', '1', '9');
INSERT INTO `yhyg_account` VALUES ('29', '6008', '1478692711', '1', '26');
INSERT INTO `yhyg_account` VALUES ('30', '50', '1478693070', '3', '7');
INSERT INTO `yhyg_account` VALUES ('31', '10000', '1478694955', '2', '22');
INSERT INTO `yhyg_account` VALUES ('32', '100000', '1478740380', '2', '7');
INSERT INTO `yhyg_account` VALUES ('33', '6188', '1478740397', '1', '7');
INSERT INTO `yhyg_account` VALUES ('34', '7699', '1478773762', '1', '26');
INSERT INTO `yhyg_account` VALUES ('35', '19980', '1478776534', '1', '26');
INSERT INTO `yhyg_account` VALUES ('36', '2996', '1478828069', '1', '26');
INSERT INTO `yhyg_account` VALUES ('37', '3269', '1478828216', '1', '26');
INSERT INTO `yhyg_account` VALUES ('38', '8899', '1478830604', '1', '7');
INSERT INTO `yhyg_account` VALUES ('39', '100', '1478837290', '2', '22');
INSERT INTO `yhyg_account` VALUES ('40', '8198', '1478842382', '1', '26');
INSERT INTO `yhyg_account` VALUES ('41', '10999', '1478842648', '1', '26');
INSERT INTO `yhyg_account` VALUES ('42', '4699', '1478843615', '1', '13');
INSERT INTO `yhyg_account` VALUES ('43', '1898', '1478844225', '1', '22');
INSERT INTO `yhyg_account` VALUES ('44', '6469', '1478844480', '1', '7');
INSERT INTO `yhyg_account` VALUES ('45', '349', '1478844756', '1', '22');
INSERT INTO `yhyg_account` VALUES ('46', '1199', '1478845376', '1', '26');
INSERT INTO `yhyg_account` VALUES ('47', '948', '1478846145', '1', '26');
INSERT INTO `yhyg_account` VALUES ('48', '3699', '1478848371', '1', '5');
INSERT INTO `yhyg_account` VALUES ('49', '8198', '1478854141', '1', '22');
INSERT INTO `yhyg_account` VALUES ('50', '50', '1478854346', '3', '22');
INSERT INTO `yhyg_account` VALUES ('51', '6969', '1478932318', '1', '26');
INSERT INTO `yhyg_account` VALUES ('52', '4300', '1478944291', '1', '26');
INSERT INTO `yhyg_account` VALUES ('53', '4300', '1478944325', '1', '26');
INSERT INTO `yhyg_account` VALUES ('54', '11967', '1479026442', '1', '7');
INSERT INTO `yhyg_account` VALUES ('55', '2400', '1479029211', '1', '26');
INSERT INTO `yhyg_account` VALUES ('56', '6469', '1479029584', '1', '26');
INSERT INTO `yhyg_account` VALUES ('57', '2800', '1479030151', '1', '7');
INSERT INTO `yhyg_account` VALUES ('58', '10999', '1479276008', '1', '7');
INSERT INTO `yhyg_account` VALUES ('59', '699', '1479276058', '1', '7');
INSERT INTO `yhyg_account` VALUES ('60', '50', '1479285735', '3', '22');
INSERT INTO `yhyg_account` VALUES ('61', '50', '1479285747', '3', '22');
INSERT INTO `yhyg_account` VALUES ('62', '10999', '1479288147', '1', '7');
INSERT INTO `yhyg_account` VALUES ('63', '6969', '1479288333', '1', '7');
INSERT INTO `yhyg_account` VALUES ('64', '1149', '1479290249', '1', '7');
INSERT INTO `yhyg_account` VALUES ('65', '50', '1479295160', '3', '22');
INSERT INTO `yhyg_account` VALUES ('66', '50', '1479295347', '3', '22');
INSERT INTO `yhyg_account` VALUES ('67', '400', '1479295425', '3', '26');
INSERT INTO `yhyg_account` VALUES ('68', '50', '1479344621', '3', '22');
INSERT INTO `yhyg_account` VALUES ('69', '100', '1479344624', '3', '22');
INSERT INTO `yhyg_account` VALUES ('70', '50', '1479350366', '3', '22');
INSERT INTO `yhyg_account` VALUES ('71', '50', '1479369740', '3', '22');
INSERT INTO `yhyg_account` VALUES ('72', '50', '1479370026', '3', '22');
INSERT INTO `yhyg_account` VALUES ('73', '3269', '1479370153', '1', '7');
INSERT INTO `yhyg_account` VALUES ('74', '4360', '1479371160', '1', '7');
INSERT INTO `yhyg_account` VALUES ('75', '4699', '1479373902', '1', '26');
INSERT INTO `yhyg_account` VALUES ('76', '2180', '1479379952', '1', '26');
INSERT INTO `yhyg_account` VALUES ('77', '50', '1479380845', '3', '7');
INSERT INTO `yhyg_account` VALUES ('78', '50', '1479380846', '3', '7');
INSERT INTO `yhyg_account` VALUES ('79', '50', '1479380847', '3', '7');
INSERT INTO `yhyg_account` VALUES ('80', '50', '1479380847', '3', '7');
INSERT INTO `yhyg_account` VALUES ('81', '50', '1479380847', '3', '7');
INSERT INTO `yhyg_account` VALUES ('82', '50', '1479380848', '3', '7');
INSERT INTO `yhyg_account` VALUES ('83', '50', '1479380848', '3', '7');
INSERT INTO `yhyg_account` VALUES ('84', '50', '1479380848', '3', '7');
INSERT INTO `yhyg_account` VALUES ('85', '50', '1479380848', '3', '7');
INSERT INTO `yhyg_account` VALUES ('86', '50', '1479380848', '3', '7');
INSERT INTO `yhyg_account` VALUES ('87', '3269', '1479381505', '1', '26');
INSERT INTO `yhyg_account` VALUES ('88', '2399', '1479382617', '1', '22');
INSERT INTO `yhyg_account` VALUES ('89', '3269', '1479384388', '1', '22');
INSERT INTO `yhyg_account` VALUES ('90', '6969', '1479385312', '1', '26');
INSERT INTO `yhyg_account` VALUES ('91', '699', '1479385594', '1', '26');
INSERT INTO `yhyg_account` VALUES ('92', '2699', '1479386191', '1', '26');
INSERT INTO `yhyg_account` VALUES ('93', '8198', '1479386311', '1', '26');
INSERT INTO `yhyg_account` VALUES ('94', '748', '1479386340', '1', '26');
INSERT INTO `yhyg_account` VALUES ('95', '5499', '1479386432', '1', '26');
INSERT INTO `yhyg_account` VALUES ('96', '33093', '1479434100', '1', '26');
INSERT INTO `yhyg_account` VALUES ('97', '17968', '1479434374', '1', '26');
INSERT INTO `yhyg_account` VALUES ('98', '3269', '1479434827', '1', '26');
INSERT INTO `yhyg_account` VALUES ('99', '3699', '1479435738', '1', '26');
INSERT INTO `yhyg_account` VALUES ('100', '349', '1479435915', '1', '26');
INSERT INTO `yhyg_account` VALUES ('101', '349', '1479439545', '1', '9');
INSERT INTO `yhyg_account` VALUES ('102', '10999', '1479440151', '1', '26');
INSERT INTO `yhyg_account` VALUES ('103', '2699', '1479440214', '1', '26');
INSERT INTO `yhyg_account` VALUES ('104', '50', '1479440876', '3', '22');
INSERT INTO `yhyg_account` VALUES ('105', '100', '1479441783', '3', '22');
INSERT INTO `yhyg_account` VALUES ('106', '3269', '1479450876', '1', '26');
INSERT INTO `yhyg_account` VALUES ('107', '699', '1479451024', '1', '26');
INSERT INTO `yhyg_account` VALUES ('108', '2180', '1479452685', '1', '26');
INSERT INTO `yhyg_account` VALUES ('109', '3699', '1479453356', '1', '26');
INSERT INTO `yhyg_account` VALUES ('110', '3699', '1479454354', '1', '26');
INSERT INTO `yhyg_account` VALUES ('111', '1098', '1479454457', '1', '26');
INSERT INTO `yhyg_account` VALUES ('112', '8198', '1479455296', '1', '26');
INSERT INTO `yhyg_account` VALUES ('113', '3999', '1479469716', '1', '11');
INSERT INTO `yhyg_account` VALUES ('114', '2699', '1479470293', '1', '11');
INSERT INTO `yhyg_account` VALUES ('115', '8915', '1479725678', '1', '26');
INSERT INTO `yhyg_account` VALUES ('116', '3269', '1479725778', '1', '11');
INSERT INTO `yhyg_account` VALUES ('117', '50', '1479782538', '3', '22');
INSERT INTO `yhyg_account` VALUES ('118', '50', '1479782538', '3', '22');
INSERT INTO `yhyg_account` VALUES ('119', '50', '1479789503', '3', '22');
INSERT INTO `yhyg_account` VALUES ('120', '50', '1479789503', '3', '22');
INSERT INTO `yhyg_account` VALUES ('121', '50', '1479789503', '3', '22');
INSERT INTO `yhyg_account` VALUES ('122', '50', '1479789504', '3', '22');
INSERT INTO `yhyg_account` VALUES ('123', '50', '1479789504', '3', '22');
INSERT INTO `yhyg_account` VALUES ('124', '50', '1479789506', '3', '22');
INSERT INTO `yhyg_account` VALUES ('125', '50', '1479789506', '3', '22');
INSERT INTO `yhyg_account` VALUES ('126', '50', '1479789506', '3', '22');
INSERT INTO `yhyg_account` VALUES ('127', '50', '1479789507', '3', '22');
INSERT INTO `yhyg_account` VALUES ('128', '50', '1479789549', '3', '22');
INSERT INTO `yhyg_account` VALUES ('129', '50', '1479789550', '3', '22');
INSERT INTO `yhyg_account` VALUES ('130', '50', '1479789550', '3', '22');
INSERT INTO `yhyg_account` VALUES ('131', '50', '1479789552', '3', '22');
INSERT INTO `yhyg_account` VALUES ('132', '50', '1479789552', '3', '22');
INSERT INTO `yhyg_account` VALUES ('133', '50', '1479789553', '3', '22');
INSERT INTO `yhyg_account` VALUES ('134', '6969', '1479790091', '1', '26');
INSERT INTO `yhyg_account` VALUES ('135', '349', '1479790115', '1', '26');
INSERT INTO `yhyg_account` VALUES ('136', '949', '1479790570', '1', '26');
INSERT INTO `yhyg_account` VALUES ('137', '2699', '1479790758', '1', '26');
INSERT INTO `yhyg_account` VALUES ('138', '6399', '1479790826', '1', '26');
INSERT INTO `yhyg_account` VALUES ('139', '3699', '1479793455', '1', '26');
INSERT INTO `yhyg_account` VALUES ('140', '50', '1479793939', '3', '22');
INSERT INTO `yhyg_account` VALUES ('141', '50', '1479794084', '3', '22');
INSERT INTO `yhyg_account` VALUES ('142', '100', '1479794133', '3', '22');
INSERT INTO `yhyg_account` VALUES ('143', '50', '1479794218', '3', '22');
INSERT INTO `yhyg_account` VALUES ('144', '50', '1479794466', '3', '22');
INSERT INTO `yhyg_account` VALUES ('145', '50', '1479884505', '3', '22');
INSERT INTO `yhyg_account` VALUES ('146', '50', '1479886494', '3', '22');
INSERT INTO `yhyg_account` VALUES ('147', '50', '1479890856', '3', '22');
INSERT INTO `yhyg_account` VALUES ('148', '50', '1479890857', '3', '22');
INSERT INTO `yhyg_account` VALUES ('149', '50', '1479890858', '3', '22');
INSERT INTO `yhyg_account` VALUES ('150', '50', '1479890860', '3', '22');
INSERT INTO `yhyg_account` VALUES ('151', '50', '1479890861', '3', '22');
INSERT INTO `yhyg_account` VALUES ('152', '50', '1479890865', '3', '22');
INSERT INTO `yhyg_account` VALUES ('153', '50', '1479890867', '3', '22');
INSERT INTO `yhyg_account` VALUES ('154', '24906', '1479948579', '1', '7');
INSERT INTO `yhyg_account` VALUES ('155', '2199', '1479957977', '1', '13');
INSERT INTO `yhyg_account` VALUES ('156', '1149', '1479958006', '1', '13');
INSERT INTO `yhyg_account` VALUES ('157', '160000', '1479958669', '2', '13');
INSERT INTO `yhyg_account` VALUES ('158', '7398', '1479958680', '1', '13');
INSERT INTO `yhyg_account` VALUES ('159', '1798', '1479959907', '1', '26');
INSERT INTO `yhyg_account` VALUES ('160', '11097', '1479959949', '1', '26');
INSERT INTO `yhyg_account` VALUES ('161', '21998', '1479959981', '1', '26');
INSERT INTO `yhyg_account` VALUES ('162', '3399', '1479960009', '1', '26');
INSERT INTO `yhyg_account` VALUES ('163', '2596', '1479960086', '1', '26');
INSERT INTO `yhyg_account` VALUES ('164', '6399', '1479969314', '1', '26');
INSERT INTO `yhyg_account` VALUES ('165', '2798', '1480047991', '1', '22');
INSERT INTO `yhyg_account` VALUES ('166', '1798', '1480048272', '1', '22');
INSERT INTO `yhyg_account` VALUES ('167', '1000', '1480062583', '2', '22');
INSERT INTO `yhyg_account` VALUES ('168', '50', '1480062612', '3', '22');
INSERT INTO `yhyg_account` VALUES ('169', '10000000', '1480064192', '2', '7');
INSERT INTO `yhyg_account` VALUES ('170', '6969', '1480064201', '1', '7');
INSERT INTO `yhyg_account` VALUES ('171', '123455', '1480126340', '2', '31');
INSERT INTO `yhyg_account` VALUES ('172', '3269', '1480126357', '1', '31');
INSERT INTO `yhyg_account` VALUES ('173', '6594', '1480316165', '1', '13');
INSERT INTO `yhyg_account` VALUES ('174', '12938', '1480316360', '1', '13');
INSERT INTO `yhyg_account` VALUES ('175', '14999', '1480316825', '1', '26');
INSERT INTO `yhyg_account` VALUES ('176', '10999', '1480502863', '1', '7');
INSERT INTO `yhyg_account` VALUES ('177', '600', '1480576868', '3', '22');
INSERT INTO `yhyg_account` VALUES ('178', '5499', '1480578338', '1', '26');
INSERT INTO `yhyg_account` VALUES ('179', '2798', '1480578411', '1', '26');
INSERT INTO `yhyg_account` VALUES ('180', '2398', '1480578519', '1', '26');
INSERT INTO `yhyg_account` VALUES ('181', '5398', '1480579064', '1', '26');
INSERT INTO `yhyg_account` VALUES ('182', '19407', '1480580027', '1', '26');
INSERT INTO `yhyg_account` VALUES ('183', '698', '1480582317', '1', '26');
INSERT INTO `yhyg_account` VALUES ('184', '10', '1480589909', '2', '22');
INSERT INTO `yhyg_account` VALUES ('185', '13938', '1480595704', '1', '7');
INSERT INTO `yhyg_account` VALUES ('186', '2399', '1480640760', '1', '7');
INSERT INTO `yhyg_account` VALUES ('187', '50', '1480659076', '3', '22');
INSERT INTO `yhyg_account` VALUES ('188', '1000', '1480659209', '2', '22');
INSERT INTO `yhyg_account` VALUES ('189', '349', '1480660788', '1', '7');
INSERT INTO `yhyg_account` VALUES ('190', '2180', '1480660888', '1', '7');
INSERT INTO `yhyg_account` VALUES ('191', '6969', '1480661101', '1', '7');

-- ----------------------------
-- Table structure for `yhyg_activity`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_activity`;
CREATE TABLE `yhyg_activity` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `activityname` varchar(60) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `stoptime` int(10) unsigned NOT NULL,
  `content` varchar(300) NOT NULL,
  `img` varchar(100) NOT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_activity
-- ----------------------------
INSERT INTO `yhyg_activity` VALUES ('1', '秒杀1', '乐视', '1478016000', '1481212800', '长虹精品限时秒杀1', '2016-11-02/581950e2dcb00.jpg', '1478016000');
INSERT INTO `yhyg_activity` VALUES ('2', '特惠', '海尔', '1478016000', '1480435200', '海尔精品特惠推荐', '2016-11-02/581951347e1fc.jpg', '1478026000');
INSERT INTO `yhyg_activity` VALUES ('3', '回馈', '格力', '1478016000', '1480348800', '格力精品感恩回馈', '2016-11-02/5819517fa5fdf.PNG', '1478036000');
INSERT INTO `yhyg_activity` VALUES ('4', '新品', '乐视', '1478016000', '1480435200', '乐视新品亲情推荐', '2016-11-02/581951da75b30.PNG', '1478046000');

-- ----------------------------
-- Table structure for `yhyg_activity_pic`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_activity_pic`;
CREATE TABLE `yhyg_activity_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_activity_pic
-- ----------------------------
INSERT INTO `yhyg_activity_pic` VALUES ('1', '1', '/Public/Uploads/2016-11-02/581950e326ce6.png');
INSERT INTO `yhyg_activity_pic` VALUES ('2', '1', '/Public/Uploads/2016-11-02/581950e3464d6.jpg');
INSERT INTO `yhyg_activity_pic` VALUES ('3', '2', '/Public/Uploads/2016-11-02/58195134b9742.jpg');
INSERT INTO `yhyg_activity_pic` VALUES ('4', '2', '/Public/Uploads/2016-11-02/58195134dfc93.jpg');
INSERT INTO `yhyg_activity_pic` VALUES ('5', '3', '/Public/Uploads/2016-11-02/5819517fe866e.jpg');
INSERT INTO `yhyg_activity_pic` VALUES ('6', '3', '/Public/Uploads/2016-11-02/581951800da74.png');
INSERT INTO `yhyg_activity_pic` VALUES ('7', '4', '/Public/Uploads/2016-11-02/581951daa4d23.png');
INSERT INTO `yhyg_activity_pic` VALUES ('8', '4', '/Public/Uploads/2016-11-02/581951dabe369.png');
INSERT INTO `yhyg_activity_pic` VALUES ('18', '5', '/Public/Uploads/2016-11-17/582d899f58b28.png');
INSERT INTO `yhyg_activity_pic` VALUES ('19', '5', '/Public/Uploads/2016-11-05/581d880f6347c.png');

-- ----------------------------
-- Table structure for `yhyg_ad`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_ad`;
CREATE TABLE `yhyg_ad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `addtime` int(10) NOT NULL,
  `overtime` int(10) NOT NULL,
  `status` varchar(20) DEFAULT '1' COMMENT '0关闭1开启',
  `images` varchar(100) DEFAULT NULL,
  `content` varchar(200) NOT NULL DEFAULT '',
  `location` varchar(20) NOT NULL DEFAULT '0轮播图' COMMENT '0轮播图1活动图2商城头条图3轮播内容图',
  `title` varchar(100) DEFAULT NULL COMMENT '商城头条标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_ad
-- ----------------------------
INSERT INTO `yhyg_ad` VALUES ('1', '1479225600', '1481731200', '1', '2016-11-04/581bfc83a6467.jpg', '格力壁挂式空调', '0', '');
INSERT INTO `yhyg_ad` VALUES ('2', '1478188800', '1481558400', '1', '2016-11-04/581bfcf07e0c0.jpg', '海尔滚筒洗衣机', '0', '');
INSERT INTO `yhyg_ad` VALUES ('3', '1478188800', '1480435200', '1', '2016-11-27/583a9f0a509a7.jpg', '小米电视', '0', '');
INSERT INTO `yhyg_ad` VALUES ('5', '1477929600', '1479139200', '1', '2016-11-30/583ecf53d5087.jpg', '长虹电视', '1', '');
INSERT INTO `yhyg_ad` VALUES ('6', '1478188800', '1478620800', '1', '2016-11-06/581eea6dd923a.jpg', '美的柜式空调', '1', '');
INSERT INTO `yhyg_ad` VALUES ('7', '1478188800', '1479398400', '1', '2016-11-04/581bfdf032c29.jpg', '海尔滚筒洗衣机', '1', null);
INSERT INTO `yhyg_ad` VALUES ('11', '1477929600', '1478016000', '1', '2016-11-24/58367d55be92c.jpg', '格力壁挂式空调', '3', '格力壁挂式空调爆款');
INSERT INTO `yhyg_ad` VALUES ('12', '1477929600', '1478102400', '1', '2016-11-13/5827f5fa8d83c.png', '海尔滚筒洗衣机', '3', '海尔滚筒洗衣机爆款');
INSERT INTO `yhyg_ad` VALUES ('13', '1477929600', '1478102400', '1', '2016-11-12/5826b3a678c16.png', '乐视电视', '3', '乐视电视爆款');
INSERT INTO `yhyg_ad` VALUES ('14', '1477929600', '1480176000', '0', '2016-11-27/583a734b67f83.jpg', '长虹电视', '2', '长虹电视爆款');
INSERT INTO `yhyg_ad` VALUES ('15', '1477929600', '1480176000', '1', '2016-11-27/583a739dc423f.jpg', '美的柜式空调', '2', '美的柜式空调爆款');
INSERT INTO `yhyg_ad` VALUES ('16', '1477929600', '1480435200', '1', '2016-11-27/583a73e17fa2d.jpg', '海尔滚筒洗衣机', '2', '海尔滚筒洗衣机爆款');
INSERT INTO `yhyg_ad` VALUES ('17', '1480521600', '1481644800', '1', '2016-12-02/58411a42a15f6.png', 'ffxfg', '0', '');

-- ----------------------------
-- Table structure for `yhyg_admin`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_admin`;
CREATE TABLE `yhyg_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `addtime` int(100) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1' COMMENT ' 0冻结1 正常',
  `lasttime` int(10) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_admin
-- ----------------------------
INSERT INTO `yhyg_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2016', '127.0.0.1', '1', '1506758700', '2016-11-09/582300701c209.jpg', '0');
INSERT INTO `yhyg_admin` VALUES ('14', 'yaokun', 'e10adc3949ba59abbe56e057f20f883e', '1478087484', '127.0.0.1', '1', '1479870549', '2016-11-16/582c5e78c7348.png', '1@ggg');
INSERT INTO `yhyg_admin` VALUES ('15', 'wbw', 'e10adc3949ba59abbe56e057f20f883e', '1478087497', '192.168.4.55', '1', '1480660947', '2016-11-09/58230094a49fd.png', '0');
INSERT INTO `yhyg_admin` VALUES ('16', 'liuqi', 'e10adc3949ba59abbe56e057f20f883e', '1478087509', '172.16.17.162', '1', '1480589661', '2016-11-09/582300a7bc929.png', '0');
INSERT INTO `yhyg_admin` VALUES ('18', 'gsg', 'e10adc3949ba59abbe56e057f20f883e', '1478087536', '192.168.4.55', '1', '1480656492', '2016-11-09/5823002f26736.png', '1');
INSERT INTO `yhyg_admin` VALUES ('147', 'wzy', 'e10adc3949ba59abbe56e057f20f883e', '1480489597', '192.168.4.55', '1', '1480659351', '2016-11-30/583e7a7d7c99c.jpg', '2');
INSERT INTO `yhyg_admin` VALUES ('152', 'cpp', 'e10adc3949ba59abbe56e057f20f883e', '1480593424', '192.168.4.55', '1', '1480662076', '2016-12-02/5840c7240d38a.jpg', '1');
INSERT INTO `yhyg_admin` VALUES ('153', 'totti', 'b644d4a60aceb4d8f5483476cc305669', '1505445530', null, '1', null, null, '576768947ddddddd@qq.com');

-- ----------------------------
-- Table structure for `yhyg_admin_nav`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_admin_nav`;
CREATE TABLE `yhyg_admin_nav` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `navname` varchar(30) NOT NULL,
  `navurl` varchar(120) DEFAULT NULL,
  `pid` tinyint(3) unsigned DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  `priority` smallint(5) unsigned NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_admin_nav
-- ----------------------------
INSERT INTO `yhyg_admin_nav` VALUES ('1', '系统管理', 'Admin/Nav/system', '0', '1', '100');
INSERT INTO `yhyg_admin_nav` VALUES ('2', '权限管理', 'Admin/Nav/Auth', '0', '2', '200');
INSERT INTO `yhyg_admin_nav` VALUES ('3', '品牌管理', 'Admin/Nav/Brand', '0', '3', '300');
INSERT INTO `yhyg_admin_nav` VALUES ('4', '分类管理', 'Admin/Nav/Category', '0', '4', '400');
INSERT INTO `yhyg_admin_nav` VALUES ('5', '商品管理', 'Admin/Nav/Goods', '0', '5', '500');
INSERT INTO `yhyg_admin_nav` VALUES ('6', '会员管理', 'Admin/Nav/Member', '0', '6', '600');
INSERT INTO `yhyg_admin_nav` VALUES ('7', '订单管理', 'Admin/Nav/Order', '0', '7', '700');
INSERT INTO `yhyg_admin_nav` VALUES ('8', '评价管理', 'Admin/Nav/Comment', '0', '8', '800');
INSERT INTO `yhyg_admin_nav` VALUES ('9', '首单专享', 'Admin/Nav/NewOrder', '0', '9', '900');
INSERT INTO `yhyg_admin_nav` VALUES ('10', '活动管理', 'Admin/Nav/Activity', '0', '10', '1000');
INSERT INTO `yhyg_admin_nav` VALUES ('11', '广告管理', 'Admin/Nav/Ad', '0', '11', '1100');
INSERT INTO `yhyg_admin_nav` VALUES ('12', '积分商城', 'Admin/Nav/Jshop', '0', '12', '1200');
INSERT INTO `yhyg_admin_nav` VALUES ('13', '清除缓存', 'Admin/Nav/Clear', '0', '13', '1400');
INSERT INTO `yhyg_admin_nav` VALUES ('14', '后台首页', 'Admin/Index/main', '1', '1,14', '110');
INSERT INTO `yhyg_admin_nav` VALUES ('15', '菜单列表', 'Admin/AdminNav/index', '1', '1,15', '120');
INSERT INTO `yhyg_admin_nav` VALUES ('16', '添加菜单', 'Admin/AdminNav/add', '1', '1,16', '130');
INSERT INTO `yhyg_admin_nav` VALUES ('20', '管理组列表', 'Admin/AuthGroup/index', '2', '2,20', '210');
INSERT INTO `yhyg_admin_nav` VALUES ('21', '添加管理组', 'Admin/AuthGroup/add', '2', '2,21', '220');
INSERT INTO `yhyg_admin_nav` VALUES ('22', '管理员列表', 'Admin/Admin/AdminList', '2', '2,22', '230');
INSERT INTO `yhyg_admin_nav` VALUES ('23', '添加管理员', 'Admin/Admin/add', '2', '2,23', '240');
INSERT INTO `yhyg_admin_nav` VALUES ('24', '权限列表', 'Admin/AuthRule/index', '2', '2,24', '250');
INSERT INTO `yhyg_admin_nav` VALUES ('25', '添加权限', 'Admin/AuthRule/add', '2', '2,25', '260');
INSERT INTO `yhyg_admin_nav` VALUES ('26', '品牌列表', 'Admin/Brand/index', '3', '3,26', '310');
INSERT INTO `yhyg_admin_nav` VALUES ('27', '添加品牌', 'Admin/Brand/add', '3', '3,27', '320');
INSERT INTO `yhyg_admin_nav` VALUES ('28', '分类列表', 'Admin/Category/index', '4', '4,28', '410');
INSERT INTO `yhyg_admin_nav` VALUES ('29', '添加分类', 'Admin/Category/add', '4', '4,29', '420');
INSERT INTO `yhyg_admin_nav` VALUES ('30', '商品列表', 'Admin/Goods/index', '5', '5,30', '510');
INSERT INTO `yhyg_admin_nav` VALUES ('31', '添加商品', 'Admin/Goods/add', '5', '5,31', '520');
INSERT INTO `yhyg_admin_nav` VALUES ('32', '会员列表', 'Admin/Member/memberList', '6', '6,32', '610');
INSERT INTO `yhyg_admin_nav` VALUES ('33', '全部订单列表', 'Admin/Order/index', '7', '7,33', '710');
INSERT INTO `yhyg_admin_nav` VALUES ('34', '售后管理', 'Admin/Change/index', '7', '7,34', '770');
INSERT INTO `yhyg_admin_nav` VALUES ('35', '评价列表', 'Admin/Comment/index', '8', '8,35', '810');
INSERT INTO `yhyg_admin_nav` VALUES ('36', '活动列表', 'Admin/Active/ActiveList', '10', '10,36', '1010');
INSERT INTO `yhyg_admin_nav` VALUES ('37', '添加活动', 'Admin/Active/add', '10', '10,37', '1020');
INSERT INTO `yhyg_admin_nav` VALUES ('38', '广告列表', 'Admin/Ad/AdminList', '11', '11,38', '1110');
INSERT INTO `yhyg_admin_nav` VALUES ('39', '添加广告', 'Admin/Ad/add', '11', '11,39', '1120');
INSERT INTO `yhyg_admin_nav` VALUES ('40', '礼品列表', 'Admin/Jshop/gifList', '12', '12,40', '1210');
INSERT INTO `yhyg_admin_nav` VALUES ('41', '添加礼品', 'Admin/Jshop/add', '12', '12,41', '1220');
INSERT INTO `yhyg_admin_nav` VALUES ('42', '奖品设置', 'Admin/Jshop/cj', '12', '12,42', '1230');
INSERT INTO `yhyg_admin_nav` VALUES ('43', '清除缓存', 'Admin/Cache/clearCache', '13', '13,43', '1410');
INSERT INTO `yhyg_admin_nav` VALUES ('48', '设置专享', 'Admin/Newperson/index', '9', '9,48', '910');
INSERT INTO `yhyg_admin_nav` VALUES ('49', '专享列表', 'Admin/Newperson/barlist', '9', '9,49', '920');
INSERT INTO `yhyg_admin_nav` VALUES ('50', '待付款订单列表', 'Admin/Order/index/orderstatus/1', '7', '7,50', '720');
INSERT INTO `yhyg_admin_nav` VALUES ('51', '待发货订单列表', 'Admin/Order/index/orderstatus/2', '7', '7,51', '730');
INSERT INTO `yhyg_admin_nav` VALUES ('52', '已发货订单列表', 'Admin/Order/index/orderstatus/3', '7', '7,52', '740');
INSERT INTO `yhyg_admin_nav` VALUES ('53', '订单完成列表', 'Admin/Order/index/orderstatus/4', '7', '7,53', '750');
INSERT INTO `yhyg_admin_nav` VALUES ('54', '积分订单列表', 'Admin/Order/jfdd', '7', '7,54', '760');
INSERT INTO `yhyg_admin_nav` VALUES ('55', '微信管理', 'Admin/Nav/WeiXin', '0', '55', '1300');
INSERT INTO `yhyg_admin_nav` VALUES ('56', '创建菜单', 'Admin/WeiXin/createMenu', '55', '55,56', '1310');
INSERT INTO `yhyg_admin_nav` VALUES ('57', '删除菜单', 'Admin/WeiXin/delMenu', '55', '55,57', '1320');
INSERT INTO `yhyg_admin_nav` VALUES ('58', '发站内信', 'Admin/Index/letter', '1', '1,58', '140');

-- ----------------------------
-- Table structure for `yhyg_after`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_after`;
CREATE TABLE `yhyg_after` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `oid` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `orderprice` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `mess` varchar(255) DEFAULT NULL,
  `afterstatus` tinyint(4) DEFAULT NULL,
  `scid` int(11) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  `aftersyn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_after
-- ----------------------------
INSERT INTO `yhyg_after` VALUES ('1', '7', '48', '201611257209861543', 'hfgdhg', '6969', 'ghf', 'hgdgfdfh', '2', '27', '1480579809', '0917508489');
INSERT INTO `yhyg_after` VALUES ('2', '7', '13', '201611237358194602', '退款/退货', '3999', '不想要了', '不要了', '1', '16', '1480594491', '8104445919');
INSERT INTO `yhyg_after` VALUES ('3', '7', '48', '201611257496531802', '不要了', '13938', '买错了', '不想要了', '2', '10', '1480595781', '7089845151');
INSERT INTO `yhyg_after` VALUES ('4', '7', '41', '201612024078136259', '仅退款', '2399', '不想要了', '让他加有一天点点头', '3', '26', '1480660923', '6493180026');

-- ----------------------------
-- Table structure for `yhyg_after_pic`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_after_pic`;
CREATE TABLE `yhyg_after_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afid` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_after_pic
-- ----------------------------
INSERT INTO `yhyg_after_pic` VALUES ('1', '1', '2016-12-01/thumb60_583fdae104a2a.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('2', '1', '2016-12-01/thumb60_583fdae105db3.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('3', '1', '2016-12-01/thumb60_583fdae10790b.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('4', '2', '2016-12-01/thumb60_5840143b4a4e4.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('5', '2', '2016-12-01/thumb60_5840143b4b09c.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('6', '2', '2016-12-01/thumb60_5840143b4bc54.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('7', '3', '2016-12-01/thumb60_58401945b82dd.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('8', '3', '2016-12-01/thumb60_58401945ba9ed.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('9', '4', '2016-12-02/thumb60_584117bb4c2ba.jpg');
INSERT INTO `yhyg_after_pic` VALUES ('10', '4', '2016-12-02/thumb60_584117bb54f5c.jpg');

-- ----------------------------
-- Table structure for `yhyg_after_status`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_after_status`;
CREATE TABLE `yhyg_after_status` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `statusname` varchar(11) DEFAULT NULL,
  `memberopt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_after_status
-- ----------------------------
INSERT INTO `yhyg_after_status` VALUES ('1', '申请', '待处理');
INSERT INTO `yhyg_after_status` VALUES ('2', '同意', '处理中');
INSERT INTO `yhyg_after_status` VALUES ('3', '不同意', '申请失败');

-- ----------------------------
-- Table structure for `yhyg_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_auth_group`;
CREATE TABLE `yhyg_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rules` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of yhyg_auth_group
-- ----------------------------
INSERT INTO `yhyg_auth_group` VALUES ('2', '商品管理', '1', '1,14,15,16,17,18,91,5,44,46,92,104,105,106,45,101,103,80,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('3', '品牌管理', '1', '1,14,15,16,17,18,91,3,34,36,94,95,35,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('4', '分类管理', '1', '1,14,15,16,17,18,91,4,37,39,98,99,100,38,96,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('5', '会员管理', '1', '1,14,15,16,17,18,91,6,47,107,108,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('6', '订单管理', '1', '1,14,15,16,17,18,91,7,48,81,49,84,85,82,83,89,109,110,111,113,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('7', '评价管理', '1', '1,14,15,16,17,18,91,7,48,81,49,84,85,82,83,89,109,110,111,113,8,50,87,88,9,72,76,77,74,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('8', '活动管理', '1', '1,14,15,16,17,18,91,119,10,19,21,66,20,12,24,51,67,68,25,69,26,52,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('9', '广告管理', '1', '1,14,15,16,17,18,91,2,30,53,64,65,31,124,11,22,122,23,70,73,79,93,121,13,27');
INSERT INTO `yhyg_auth_group` VALUES ('11', '超级管理员', '1', '1,14,15,16,17,18,91,54,56,62,112,55,119,2,28,40,41,42,59,29,125,30,53,64,65,31,124,32,57,60,33,3,34,36,94,95,35,4,37,39,98,99,100,38,96,5,44,46,92,104,105,106,45,101,103,80,6,47,107,108,7,48,81,49,84,85,82,83,89,109,110,111,113,8,50,87,88,9,72,76,77,74,10,19,21,66,20,11,22,122,23,70,73,79,93,121,12,24,51,67,68,25,69,26,52,13,27,114,115,117');
INSERT INTO `yhyg_auth_group` VALUES ('13', '权限管理', '1', '14,15,16,17,18,91,30,53,64,65,31,11,22,23,70,73,79,86');
INSERT INTO `yhyg_auth_group` VALUES ('16', '微信管理', '1', '1,14,15,16,17,18,91,13,27,114,115,117');

-- ----------------------------
-- Table structure for `yhyg_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_auth_group_access`;
CREATE TABLE `yhyg_auth_group_access` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of yhyg_auth_group_access
-- ----------------------------
INSERT INTO `yhyg_auth_group_access` VALUES ('1', '1', '1');
INSERT INTO `yhyg_auth_group_access` VALUES ('22', '14', '4');
INSERT INTO `yhyg_auth_group_access` VALUES ('21', '14', '3');
INSERT INTO `yhyg_auth_group_access` VALUES ('20', '14', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('5', '16', '5');
INSERT INTO `yhyg_auth_group_access` VALUES ('6', '15', '6');
INSERT INTO `yhyg_auth_group_access` VALUES ('27', '18', '7');
INSERT INTO `yhyg_auth_group_access` VALUES ('8', '17', '8');
INSERT INTO `yhyg_auth_group_access` VALUES ('9', '19', '9');
INSERT INTO `yhyg_auth_group_access` VALUES ('32', '117', '16');
INSERT INTO `yhyg_auth_group_access` VALUES ('19', '1', '11');
INSERT INTO `yhyg_auth_group_access` VALUES ('30', '117', '9');
INSERT INTO `yhyg_auth_group_access` VALUES ('26', '118', '13');
INSERT INTO `yhyg_auth_group_access` VALUES ('31', '117', '13');
INSERT INTO `yhyg_auth_group_access` VALUES ('33', '118', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('34', '133', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('38', '142', '9');
INSERT INTO `yhyg_auth_group_access` VALUES ('40', '143', '3');
INSERT INTO `yhyg_auth_group_access` VALUES ('39', '143', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('41', '144', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('42', '144', '3');
INSERT INTO `yhyg_auth_group_access` VALUES ('44', '145', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('45', '146', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('48', '147', '8');
INSERT INTO `yhyg_auth_group_access` VALUES ('47', '148', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('60', '152', '13');
INSERT INTO `yhyg_auth_group_access` VALUES ('54', '150', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('51', '151', '9');
INSERT INTO `yhyg_auth_group_access` VALUES ('52', '151', '13');
INSERT INTO `yhyg_auth_group_access` VALUES ('53', '151', '16');
INSERT INTO `yhyg_auth_group_access` VALUES ('59', '152', '9');
INSERT INTO `yhyg_auth_group_access` VALUES ('57', '153', '2');
INSERT INTO `yhyg_auth_group_access` VALUES ('58', '153', '13');
INSERT INTO `yhyg_auth_group_access` VALUES ('61', '18', '2');

-- ----------------------------
-- Table structure for `yhyg_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_auth_rule`;
CREATE TABLE `yhyg_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of yhyg_auth_rule
-- ----------------------------
INSERT INTO `yhyg_auth_rule` VALUES ('1', 'Admin/Nav/system', '系统管理', '1', '1', '', '0', '1');
INSERT INTO `yhyg_auth_rule` VALUES ('2', 'Admin/Nav/Auth', '权限管理', '1', '1', '', '0', '2');
INSERT INTO `yhyg_auth_rule` VALUES ('3', 'Admin/Nav/Brand', '品牌管理', '1', '1', '', '0', '3');
INSERT INTO `yhyg_auth_rule` VALUES ('4', 'Admin/Nav/Category', '分类管理', '1', '1', '', '0', '4');
INSERT INTO `yhyg_auth_rule` VALUES ('5', 'Admin/Nav/Goods', '商品管理', '1', '1', '', '0', '5');
INSERT INTO `yhyg_auth_rule` VALUES ('6', 'Admin/Nav/Member', '会员管理', '1', '1', '', '0', '6');
INSERT INTO `yhyg_auth_rule` VALUES ('7', 'Admin/Nav/Order', '订单管理', '1', '1', '', '0', '7');
INSERT INTO `yhyg_auth_rule` VALUES ('8', 'Admin/Nav/Comment', '评价管理', '1', '1', '', '0', '8');
INSERT INTO `yhyg_auth_rule` VALUES ('9', 'Admin/Nav/NewOrder', '首单专享', '1', '1', '', '0', '9');
INSERT INTO `yhyg_auth_rule` VALUES ('10', 'Admin/Nav/Activity', '活动管理', '1', '1', '', '0', '10');
INSERT INTO `yhyg_auth_rule` VALUES ('11', 'Admin/Nav/Ad', '广告管理', '1', '1', '', '0', '11');
INSERT INTO `yhyg_auth_rule` VALUES ('12', 'Admin/Nav/Jshop', '积分商城', '1', '1', '', '0', '12');
INSERT INTO `yhyg_auth_rule` VALUES ('13', 'Admin/Nav/Clear', '清除缓存', '1', '1', '', '0', '13');
INSERT INTO `yhyg_auth_rule` VALUES ('14', 'Admin/Index/index', '后台首页', '1', '1', '', '1', '1,14');
INSERT INTO `yhyg_auth_rule` VALUES ('15', 'Admin/Index/main', '欢迎页面', '1', '1', '', '14', '1,14,15');
INSERT INTO `yhyg_auth_rule` VALUES ('16', 'Admin/Index/top', '头部页面', '1', '1', '', '14', '1,14,16');
INSERT INTO `yhyg_auth_rule` VALUES ('17', 'Admin/Index/left', '左部页面', '1', '1', '', '14', '1,14,17');
INSERT INTO `yhyg_auth_rule` VALUES ('18', 'Admin/Index/footer', '底部页面', '1', '1', '', '14', '1,14,18');
INSERT INTO `yhyg_auth_rule` VALUES ('19', 'Admin/Active/ActiveList', '活动列表', '1', '1', '', '10', '10,19');
INSERT INTO `yhyg_auth_rule` VALUES ('20', 'Admin/Active/add', '添加活动', '1', '1', '', '10', '10,20');
INSERT INTO `yhyg_auth_rule` VALUES ('21', 'Admin/Active/edit', '编辑', '1', '1', '', '19', '10,19,21');
INSERT INTO `yhyg_auth_rule` VALUES ('22', 'Admin/Ad/add', '添加广告', '1', '1', '', '11', '11,22');
INSERT INTO `yhyg_auth_rule` VALUES ('23', 'Admin/Ad/AdminList', '广告列表', '1', '1', '', '11', '11,23');
INSERT INTO `yhyg_auth_rule` VALUES ('24', 'Admin/Jshop/gifList', '礼品列表', '1', '1', '', '12', '12,24');
INSERT INTO `yhyg_auth_rule` VALUES ('25', 'Admin/Jshop/add', '添加礼品', '1', '1', '', '12', '12,25');
INSERT INTO `yhyg_auth_rule` VALUES ('26', 'Admin/Jshop/cj', '奖品设置', '1', '1', '', '12', '12,26');
INSERT INTO `yhyg_auth_rule` VALUES ('27', 'Admin/Cache/clearCache', '清除缓存', '1', '1', '', '13', '13,27');
INSERT INTO `yhyg_auth_rule` VALUES ('28', 'Admin/AuthGroup/index', '管理组列表', '1', '1', '', '2', '2,28');
INSERT INTO `yhyg_auth_rule` VALUES ('29', 'Admin/AuthGroup/add', '添加管理组', '1', '1', '', '2', '2,29');
INSERT INTO `yhyg_auth_rule` VALUES ('30', 'Admin/Admin/AdminList', '管理员列表', '1', '1', '', '2', '2,30');
INSERT INTO `yhyg_auth_rule` VALUES ('31', 'Admin/Admin/add', '添加管理员', '1', '1', '', '2', '2,31');
INSERT INTO `yhyg_auth_rule` VALUES ('32', 'Admin/AuthRule/index', '权限列表', '1', '1', '', '2', '2,32');
INSERT INTO `yhyg_auth_rule` VALUES ('33', 'Admin/AuthRule/add', '添加权限', '1', '1', '', '2', '2,33');
INSERT INTO `yhyg_auth_rule` VALUES ('34', 'Admin/Brand/index', '品牌列表', '1', '1', '', '3', '3,34');
INSERT INTO `yhyg_auth_rule` VALUES ('35', 'Admin/Brand/add', '添加品牌', '1', '1', '', '3', '3,35');
INSERT INTO `yhyg_auth_rule` VALUES ('36', 'Admin/Brand/edit', '编辑', '1', '1', '', '34', '3,34,36');
INSERT INTO `yhyg_auth_rule` VALUES ('37', 'Admin/Category/index', '分类列表', '1', '1', '', '4', '4,37');
INSERT INTO `yhyg_auth_rule` VALUES ('38', 'Admin/Category/add', '添加分类', '1', '1', '', '4', '4,38');
INSERT INTO `yhyg_auth_rule` VALUES ('39', 'Admin/Category/edit', '编辑', '1', '1', '', '37', '4,37,39');
INSERT INTO `yhyg_auth_rule` VALUES ('40', 'Admin/AuthGroup/addMember', '添加组员', '1', '1', '', '28', '2,28,40');
INSERT INTO `yhyg_auth_rule` VALUES ('41', 'Admin/AuthGroup/allocateRule', '分配权限', '1', '1', '', '28', '2,28,41');
INSERT INTO `yhyg_auth_rule` VALUES ('42', 'Admin/AuthGroup/edit', '编辑', '1', '1', '', '28', '2,28,42');
INSERT INTO `yhyg_auth_rule` VALUES ('59', 'Admin/AuthGroup/del', '删除', '1', '1', '', '28', '2,28,59');
INSERT INTO `yhyg_auth_rule` VALUES ('44', 'Admin/Goods/index', '商品列表', '1', '1', '', '5', '5,44');
INSERT INTO `yhyg_auth_rule` VALUES ('45', 'Admin/Goods/add', '添加商品', '1', '1', '', '5', '5,45');
INSERT INTO `yhyg_auth_rule` VALUES ('46', 'Admin/Goods/edit', '编辑', '1', '1', '', '44', '5,44,46');
INSERT INTO `yhyg_auth_rule` VALUES ('47', 'Admin/Member/memberList', '会员列表', '1', '1', '', '6', '6,47');
INSERT INTO `yhyg_auth_rule` VALUES ('48', 'Admin/Order/index', '订单列表', '1', '1', '', '7', '7,48');
INSERT INTO `yhyg_auth_rule` VALUES ('49', 'Admin/Change/index', '售后管理', '1', '1', '', '7', '7,49');
INSERT INTO `yhyg_auth_rule` VALUES ('50', 'Admin/Comment/index', '评论列表', '1', '1', '', '8', '8,50');
INSERT INTO `yhyg_auth_rule` VALUES ('51', 'Admin/Jshop/edit', '编辑', '1', '1', '', '24', '12,24,51');
INSERT INTO `yhyg_auth_rule` VALUES ('52', 'Admin/Jshop/editJ', '编辑', '1', '1', '', '26', '12,26,52');
INSERT INTO `yhyg_auth_rule` VALUES ('53', 'Admin/Admin/change', '修改', '1', '1', '', '30', '2,30,53');
INSERT INTO `yhyg_auth_rule` VALUES ('54', 'Admin/AdminNav/index', '菜单列表', '1', '1', '', '1', '1,54');
INSERT INTO `yhyg_auth_rule` VALUES ('55', 'Admin/AdminNav/add', '添加菜单', '1', '1', '', '1', '1,55');
INSERT INTO `yhyg_auth_rule` VALUES ('56', 'Admin/AdminNav/edit', '编辑', '1', '1', '', '54', '1,54,56');
INSERT INTO `yhyg_auth_rule` VALUES ('57', 'Admin/AuthRule/edit', '编辑', '1', '1', '', '32', '2,32,57');
INSERT INTO `yhyg_auth_rule` VALUES ('62', 'Admin/Adminnav/delete', '删除', '1', '1', '', '54', '1,54,62');
INSERT INTO `yhyg_auth_rule` VALUES ('60', 'Admin/AuthRule/del', '删除', '1', '1', '', '32', '2,32,60');
INSERT INTO `yhyg_auth_rule` VALUES ('64', 'Admin/Admin/edit', '冻结', '1', '1', '', '30', '2,30,64');
INSERT INTO `yhyg_auth_rule` VALUES ('65', 'Admin/Admin/del', '删除', '1', '1', '', '30', '2,30,65');
INSERT INTO `yhyg_auth_rule` VALUES ('66', 'Admin/Active/del', '删除', '1', '1', '', '19', '10,19,66');
INSERT INTO `yhyg_auth_rule` VALUES ('67', 'Admin/Jshop/del', '删除', '1', '1', '', '24', '12,24,67');
INSERT INTO `yhyg_auth_rule` VALUES ('68', 'Admin/Jshop/zd', '置顶', '1', '1', '', '24', '12,24,68');
INSERT INTO `yhyg_auth_rule` VALUES ('69', 'Admin/Jshop/getGoodsInfo', '获取商品信息', '1', '1', '', '25', '12,25,69');
INSERT INTO `yhyg_auth_rule` VALUES ('70', 'Admin/Ad/edit', '编辑', '1', '1', '', '23', '11,23,70');
INSERT INTO `yhyg_auth_rule` VALUES ('73', 'Admin/Ad/del', '删除', '1', '1', '', '23', '11,23,73');
INSERT INTO `yhyg_auth_rule` VALUES ('72', 'Admin/Newperson/index', '设置专享', '1', '1', '', '9', '9,72');
INSERT INTO `yhyg_auth_rule` VALUES ('74', 'Admin/Newperson/barlist', '专享列表', '1', '1', '', '9', '9,74');
INSERT INTO `yhyg_auth_rule` VALUES ('76', 'Admin/Newperson/kanjia', '砍价', '1', '1', '', '72', '9,72,76');
INSERT INTO `yhyg_auth_rule` VALUES ('77', 'Admin/Newperson/add', '添加商品', '1', '1', '', '72', '9,72,77');
INSERT INTO `yhyg_auth_rule` VALUES ('79', 'Admin/Ad/uploadAdPic', '图片', '1', '1', '', '23', '11,23,79');
INSERT INTO `yhyg_auth_rule` VALUES ('80', 'Admin/Echarts/index', '销量分析', '1', '1', '', '5', '5,80');
INSERT INTO `yhyg_auth_rule` VALUES ('81', 'Admin/Order/plfh', '订单发货', '1', '1', '', '48', '7,48,81');
INSERT INTO `yhyg_auth_rule` VALUES ('82', 'Admin/Order/jfdd', '积分订单', '1', '1', '', '7', '7,82');
INSERT INTO `yhyg_auth_rule` VALUES ('83', 'Admin/Order/jffh', '积分订单发货', '1', '1', '', '82', '7,82,83');
INSERT INTO `yhyg_auth_rule` VALUES ('84', 'Admin/Change/agree', '同意', '1', '1', '', '49', '7,49,84');
INSERT INTO `yhyg_auth_rule` VALUES ('85', 'Admin/Change/disagree', '不同意', '1', '1', '', '49', '7,49,85');
INSERT INTO `yhyg_auth_rule` VALUES ('93', 'Admin/Ad/show', '展示', '1', '1', '', '23', '11,23,93');
INSERT INTO `yhyg_auth_rule` VALUES ('87', 'Admin/Comment/LookOver', '回复', '1', '1', '', '50', '8,50,87');
INSERT INTO `yhyg_auth_rule` VALUES ('88', 'Admin/Comment/comlist', '查看', '1', '1', '', '50', '8,50,88');
INSERT INTO `yhyg_auth_rule` VALUES ('89', 'Admin/Order/out', '订单导出', '1', '1', '', '7', '7,89');
INSERT INTO `yhyg_auth_rule` VALUES ('91', 'Admin/Index/paiHang', '排行', '1', '1', '', '14', '1,14,91');
INSERT INTO `yhyg_auth_rule` VALUES ('92', 'Admin/Goods/goodsOut', '商品导出', '1', '1', '', '44', '5,44,92');
INSERT INTO `yhyg_auth_rule` VALUES ('94', 'Admin/Brand/hidden', '下架', '1', '1', '', '34', '3,34,94');
INSERT INTO `yhyg_auth_rule` VALUES ('95', 'Admin/Brand/del', '删除', '1', '1', '', '34', '3,34,95');
INSERT INTO `yhyg_auth_rule` VALUES ('96', 'Admin/Category/addcategory', '处理添加分类', '1', '1', '', '38', '4,38,96');
INSERT INTO `yhyg_auth_rule` VALUES ('98', 'Admin/Category/editCategory', '处理编辑', '1', '1', '', '37', '4,37,98');
INSERT INTO `yhyg_auth_rule` VALUES ('99', 'Admin/Category/statuss', '下架', '1', '1', '', '37', '4,37,99');
INSERT INTO `yhyg_auth_rule` VALUES ('100', 'Admin/Category/del', '删除', '1', '1', '', '37', '4,37,100');
INSERT INTO `yhyg_auth_rule` VALUES ('101', 'Admin/Goods/addgoods', '处理添加商品', '1', '1', '', '45', '5,45,101');
INSERT INTO `yhyg_auth_rule` VALUES ('103', 'Admin/Goods/getCateByPid', '获取分类', '1', '1', '', '45', '5,45,103');
INSERT INTO `yhyg_auth_rule` VALUES ('104', 'Admin/Goods/editGoods', '处理编辑', '1', '1', '', '44', '5,44,104');
INSERT INTO `yhyg_auth_rule` VALUES ('105', 'Admin/Goods/delGoods', '删除', '1', '1', '', '44', '5,44,105');
INSERT INTO `yhyg_auth_rule` VALUES ('106', 'Admin/Goods/active', '下架', '1', '1', '', '44', '5,44,106');
INSERT INTO `yhyg_auth_rule` VALUES ('107', 'Admin/Member/edit', '禁用', '1', '1', '', '47', '6,47,107');
INSERT INTO `yhyg_auth_rule` VALUES ('108', 'Admin/Member/del', '删除', '1', '1', '', '47', '6,47,108');
INSERT INTO `yhyg_auth_rule` VALUES ('109', 'Admin/Order/index/orderstatus/1', '代付款', '1', '1', '', '7', '7,109');
INSERT INTO `yhyg_auth_rule` VALUES ('110', 'Admin/Order/index/orderstatus/3', '已发货', '1', '1', '', '7', '7,110');
INSERT INTO `yhyg_auth_rule` VALUES ('111', 'Admin/Order/index/orderstatus/4', '已完成', '1', '1', '', '7', '7,111');
INSERT INTO `yhyg_auth_rule` VALUES ('112', 'Admin/AdminNav/setPriority', '更新优先级', '1', '1', '', '54', '1,54,112');
INSERT INTO `yhyg_auth_rule` VALUES ('113', 'Admin/Order/index/orderstatus/2', '待发货', '1', '1', '', '7', '7,113');
INSERT INTO `yhyg_auth_rule` VALUES ('114', 'Admin/Nav/WX', '微信管理', '1', '1', '', '0', '114');
INSERT INTO `yhyg_auth_rule` VALUES ('122', 'Admin/Ad/uploadPic', '上传图片', '1', '1', '', '22', '11,22,122');
INSERT INTO `yhyg_auth_rule` VALUES ('115', 'Admin/WX/createMenu', '创建菜单', '1', '1', '', '114', '114,115');
INSERT INTO `yhyg_auth_rule` VALUES ('117', 'Admin/WX/delMenu', '删除菜单', '1', '1', '', '114', '114,117');
INSERT INTO `yhyg_auth_rule` VALUES ('119', 'Admin/Index/letter', '发站内信', '1', '1', '', '1', '1,119');
INSERT INTO `yhyg_auth_rule` VALUES ('121', 'Admin/Ad/adOut', '导出列表', '1', '1', '', '23', '11,23,121');
INSERT INTO `yhyg_auth_rule` VALUES ('124', 'Admin/Admin/checkUsername', '验证用户名', '1', '1', '', '31', '2,31,124');

-- ----------------------------
-- Table structure for `yhyg_bargain`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_bargain`;
CREATE TABLE `yhyg_bargain` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gid` int(10) DEFAULT NULL,
  `cutprice` int(10) DEFAULT '0' COMMENT '优惠价',
  `cut` int(11) DEFAULT '0' COMMENT '砍价',
  `status` tinyint(2) DEFAULT '0' COMMENT '1：已砍 0:未砍',
  `price` float(8,2) DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL COMMENT '分类名',
  `bname` varchar(60) DEFAULT NULL COMMENT '品牌名',
  `addtime` varchar(11) DEFAULT NULL,
  `edittime` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_bargain
-- ----------------------------
INSERT INTO `yhyg_bargain` VALUES ('1', '10', '0', '0', '0', '20880.00', '海尔中央空调', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('2', '7', '2400', '799', '1', '3199.00', '格力壁挂式空调', '格力', null, null);
INSERT INTO `yhyg_bargain` VALUES ('3', '19', '2900', '799', '1', '3699.00', '小米电视', '小米', null, null);
INSERT INTO `yhyg_bargain` VALUES ('4', '3', '1499', '299', '1', '1798.00', '飞利浦电视', '飞利浦', null, null);
INSERT INTO `yhyg_bargain` VALUES ('5', '2', '4900', '599', '1', '5499.00', '三星电视', '三星', null, null);
INSERT INTO `yhyg_bargain` VALUES ('6', '5', '5409', '599', '1', '6008.00', '创维电视', '创维', null, null);
INSERT INTO `yhyg_bargain` VALUES ('7', '20', '0', '0', '0', '7699.00', '奥克斯空调', '奥克斯', null, null);
INSERT INTO `yhyg_bargain` VALUES ('8', '4', '2600', '799', '1', '3399.00', '海信电视', '海信', null, null);
INSERT INTO `yhyg_bargain` VALUES ('9', '1', '0', '0', '0', '4699.00', '索尼电视', '索尼', null, null);
INSERT INTO `yhyg_bargain` VALUES ('10', '43', '2100', '799', '1', '2899.00', '格力壁挂式空调', '格力', null, null);
INSERT INTO `yhyg_bargain` VALUES ('11', '23', '0', '0', '0', '699.00', 'TCL洗衣机', 'TCL', null, null);
INSERT INTO `yhyg_bargain` VALUES ('12', '49', '0', '0', '0', '8198.00', '乐视电视', '乐视', null, null);
INSERT INTO `yhyg_bargain` VALUES ('13', '45', '2900', '799', '1', '3699.00', '格力壁挂式空调', '格力', null, null);
INSERT INTO `yhyg_bargain` VALUES ('14', '18', '1725', '455', '1', '2180.00', '海尔酒柜冰箱', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('15', '9', '4200', '799', '1', '4999.00', '美的柜式空调', '美的', null, null);
INSERT INTO `yhyg_bargain` VALUES ('16', '16', '494', '455', '1', '949.00', '海尔双门冰箱', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('17', '41', '1944', '455', '1', '2399.00', '海尔壁挂式空调', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('18', '12', '2244', '455', '1', '2699.00', '海尔滚筒洗衣机', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('19', '40', '3244', '455', '1', '3699.00', '海尔壁挂式空调', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('20', '13', '3544', '455', '1', '3999.00', '海尔多门冰箱', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('23', '32', '1900', '799', '1', '2699.00', '长虹电视', '长虹', null, null);
INSERT INTO `yhyg_bargain` VALUES ('24', '15', '999', '299', '1', '1298.00', '美的三门冰箱', '美的', null, null);
INSERT INTO `yhyg_bargain` VALUES ('25', '25', '0', '0', '0', '349.00', '奥克斯洗衣机', '奥克斯', null, null);
INSERT INTO `yhyg_bargain` VALUES ('26', '24', '0', '0', '0', '748.00', '小天鹅洗衣机', '小天鹅', null, null);
INSERT INTO `yhyg_bargain` VALUES ('27', '44', '1399', '799', '1', '2198.00', '格力壁挂式空调', '格力', null, null);
INSERT INTO `yhyg_bargain` VALUES ('28', '42', '1345', '455', '1', '1800.00', '海尔壁挂式空调', '海尔', null, null);
INSERT INTO `yhyg_bargain` VALUES ('29', '33', '2701', '799', '1', '3500.00', '长虹电视', '长虹', null, null);

-- ----------------------------
-- Table structure for `yhyg_brand`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_brand`;
CREATE TABLE `yhyg_brand` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `brandname` varchar(60) NOT NULL,
  `hidden` smallint(1) NOT NULL DEFAULT '1' COMMENT '1代表上架，0代表下架',
  `logo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_brand
-- ----------------------------
INSERT INTO `yhyg_brand` VALUES ('1', '海尔', '1', '2016-11-02/5819bac0b19d7.png');
INSERT INTO `yhyg_brand` VALUES ('2', '格力', '1', '2016-10-27/581168daebc3a.png');
INSERT INTO `yhyg_brand` VALUES ('3', '苹果', '1', '2016-10-27/581168eb9553a.png');
INSERT INTO `yhyg_brand` VALUES ('4', '小米', '1', '2016-10-27/581168f781f64.png');
INSERT INTO `yhyg_brand` VALUES ('5', '飞利浦', '1', '2016-10-27/5811690460f04.png');
INSERT INTO `yhyg_brand` VALUES ('6', '三星', '1', '2016-10-27/58116921a8a30.png');
INSERT INTO `yhyg_brand` VALUES ('7', '创维', '1', '2016-10-27/58116931774bf.png');
INSERT INTO `yhyg_brand` VALUES ('8', 'TCL', '1', '2016-10-27/58116939f2766.png');
INSERT INTO `yhyg_brand` VALUES ('9', '乐视', '1', '2016-10-27/58116940dbda9.png');
INSERT INTO `yhyg_brand` VALUES ('10', '美的', '1', '2016-10-27/5811694d33149.png');
INSERT INTO `yhyg_brand` VALUES ('11', '索尼', '1', '2016-10-27/58117492abf0a.png');
INSERT INTO `yhyg_brand` VALUES ('12', '海信', '1', '2016-10-27/58119cc4ed053.png');
INSERT INTO `yhyg_brand` VALUES ('13', '小天鹅', '1', '2016-10-31/5816a250d8f57.png');
INSERT INTO `yhyg_brand` VALUES ('14', '新飞', '1', '2016-10-31/5817022a8b3d4.png');
INSERT INTO `yhyg_brand` VALUES ('15', '格兰仕', '1', '2016-10-31/58170239338d9.png');
INSERT INTO `yhyg_brand` VALUES ('16', '康佳', '1', '2016-10-31/58170245097b6.png');
INSERT INTO `yhyg_brand` VALUES ('17', '苏泊尔', '1', '2016-10-31/5817025057855.png');
INSERT INTO `yhyg_brand` VALUES ('18', '九阳', '1', '2016-10-31/5817025e5a287.png');
INSERT INTO `yhyg_brand` VALUES ('19', '长虹', '1', '2016-10-31/5817027ddd36b.png');
INSERT INTO `yhyg_brand` VALUES ('20', '西门子', '1', '2016-10-31/5817029d4742e.png');
INSERT INTO `yhyg_brand` VALUES ('21', '美菱', '1', '2016-11-02/5819dd2862369.png');
INSERT INTO `yhyg_brand` VALUES ('22', '奥克斯', '1', '2016-11-02/5819dd8fde761.png');
INSERT INTO `yhyg_brand` VALUES ('23', '酷开', '1', '2016-11-02/5819ddc416432.png');
INSERT INTO `yhyg_brand` VALUES ('24', '三洋', '1', '2016-11-02/5819ddf6b81a3.png');

-- ----------------------------
-- Table structure for `yhyg_cart`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_cart`;
CREATE TABLE `yhyg_cart` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL COMMENT '用户ID',
  `gid` mediumint(7) unsigned NOT NULL COMMENT '商品ID',
  `buynum` tinyint(3) unsigned NOT NULL COMMENT '购买数量',
  `addtime` int(10) unsigned NOT NULL COMMENT '加入购物车时间',
  `color` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_cart
-- ----------------------------
INSERT INTO `yhyg_cart` VALUES ('2', '2', '6', '2', '1479201885', '白色', 'XL003');
INSERT INTO `yhyg_cart` VALUES ('5', '2', '12', '1', '1479211115', '白色', 'XL002');
INSERT INTO `yhyg_cart` VALUES ('65', '9', '43', '1', '1479437164', '黑色', 'XL001');
INSERT INTO `yhyg_cart` VALUES ('68', '22', '48', '2', '1479470449', '灰色', 'XL03');
INSERT INTO `yhyg_cart` VALUES ('92', '11', '8', '1', '1479469035', '灰色', 'XL03');
INSERT INTO `yhyg_cart` VALUES ('95', '11', '13', '1', '1479469876', '灰色', 'XL03');
INSERT INTO `yhyg_cart` VALUES ('96', '11', '49', '1', '1479470554', '灰色', 'XL03');
INSERT INTO `yhyg_cart` VALUES ('104', '22', '5', '1', '1479802446', '黑色', 'XL001');
INSERT INTO `yhyg_cart` VALUES ('105', '22', '52', '1', '1479802683', '灰色', 'XL03');
INSERT INTO `yhyg_cart` VALUES ('111', '29', '3', '1', '1479963397', '白色', 'XL002');
INSERT INTO `yhyg_cart` VALUES ('121', '22', '29', '1', '1480062529', '', '');
INSERT INTO `yhyg_cart` VALUES ('122', '26', '4', '1', '1480063258', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('123', '29', '4', '1', '1480063364', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('124', '31', '48', '2', '1480126162', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('125', '31', '49', '1', '1480126168', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('127', '26', '48', '8', '1480315713', '白色', 'XL002');
INSERT INTO `yhyg_cart` VALUES ('130', '13', '32', '1', '1480572911', '黑色', 'XL001');
INSERT INTO `yhyg_cart` VALUES ('131', '22', '50', '0', '1480577414', '', '');
INSERT INTO `yhyg_cart` VALUES ('132', '26', '1', '1', '1480591415', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('135', '29', '5', '1', '1480591737', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('136', '34', '3', '1', '1480594889', '红色', 'XL02');
INSERT INTO `yhyg_cart` VALUES ('137', '34', '4', '2', '1480594990', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('138', '34', '2', '1', '1480595016', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('139', '35', '4', '1', '1480595095', '白色', 'XL01');
INSERT INTO `yhyg_cart` VALUES ('140', '22', '49', '1', '1480658841', '', '');
INSERT INTO `yhyg_cart` VALUES ('141', '29', '2', '1', '1480659953', '白色', 'XL01');

-- ----------------------------
-- Table structure for `yhyg_category`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_category`;
CREATE TABLE `yhyg_category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  `pid` tinyint(3) unsigned NOT NULL,
  `path` varchar(20) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0代表下线，1代表上线',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_category
-- ----------------------------
INSERT INTO `yhyg_category` VALUES ('1', '电视', '0', '1,', '1');
INSERT INTO `yhyg_category` VALUES ('2', '空调', '0', '2,', '1');
INSERT INTO `yhyg_category` VALUES ('3', '洗衣机', '0', '3,', '1');
INSERT INTO `yhyg_category` VALUES ('4', '冰箱', '0', '4,', '1');
INSERT INTO `yhyg_category` VALUES ('5', '合资品牌', '1', '1,5,', '1');
INSERT INTO `yhyg_category` VALUES ('6', '国产品牌', '1', '1,6,', '1');
INSERT INTO `yhyg_category` VALUES ('7', '互联网品牌', '1', '1,7,', '1');
INSERT INTO `yhyg_category` VALUES ('8', '壁挂式空调', '2', '2,8,', '1');
INSERT INTO `yhyg_category` VALUES ('9', '柜式空调', '2', '2,9,', '1');
INSERT INTO `yhyg_category` VALUES ('10', '中央空调', '2', '2,10,', '1');
INSERT INTO `yhyg_category` VALUES ('11', '空调配件', '2', '2,11,', '1');
INSERT INTO `yhyg_category` VALUES ('12', '滚筒洗衣机', '3', '3,12,', '1');
INSERT INTO `yhyg_category` VALUES ('13', '洗烘一体机', '3', '3,13,', '1');
INSERT INTO `yhyg_category` VALUES ('14', '波轮洗衣机', '3', '3,14,', '1');
INSERT INTO `yhyg_category` VALUES ('15', '迷你洗衣机', '3', '3,15,', '1');
INSERT INTO `yhyg_category` VALUES ('16', '洗衣机配件', '3', '3,16,', '1');
INSERT INTO `yhyg_category` VALUES ('17', '多门', '4', '4,17,', '1');
INSERT INTO `yhyg_category` VALUES ('18', '对开门', '4', '4,18,', '1');
INSERT INTO `yhyg_category` VALUES ('19', '三门', '4', '4,19,', '1');
INSERT INTO `yhyg_category` VALUES ('20', '双门', '4', '4,20,', '1');
INSERT INTO `yhyg_category` VALUES ('21', '酒柜', '4', '4,21,', '1');
INSERT INTO `yhyg_category` VALUES ('22', '冰箱配件', '4', '4,22,', '1');
INSERT INTO `yhyg_category` VALUES ('28', '厨卫大电', '0', '28,', '1');
INSERT INTO `yhyg_category` VALUES ('29', '油烟机', '28', '28,29,', '1');
INSERT INTO `yhyg_category` VALUES ('30', '消毒柜', '28', '28,30,', '1');
INSERT INTO `yhyg_category` VALUES ('31', '生活电器', '0', '31,', '1');
INSERT INTO `yhyg_category` VALUES ('32', '取暖电器', '31', '31,32,', '1');
INSERT INTO `yhyg_category` VALUES ('33', '吸尘器', '31', '31,33,', '1');
INSERT INTO `yhyg_category` VALUES ('34', '净化器', '31', '31,34,', '1');
INSERT INTO `yhyg_category` VALUES ('35', '家庭影音', '0', '35,', '1');
INSERT INTO `yhyg_category` VALUES ('36', '家庭影院', '35', '35,36,', '1');
INSERT INTO `yhyg_category` VALUES ('37', '迷你音响', '35', '35,37,', '1');
INSERT INTO `yhyg_category` VALUES ('38', 'DVD', '35', '35,38,', '1');
INSERT INTO `yhyg_category` VALUES ('39', '电视影音配件', '35', '35,39,', '1');
INSERT INTO `yhyg_category` VALUES ('40', '饮水机', '31', '31,40,', '1');
INSERT INTO `yhyg_category` VALUES ('41', '电热水器', '28', '28,41,', '1');
INSERT INTO `yhyg_category` VALUES ('42', '燃气灶', '28', '28,42,', '1');
INSERT INTO `yhyg_category` VALUES ('43', '海信电视', '6', '1,6,43,', '1');
INSERT INTO `yhyg_category` VALUES ('44', '康佳电视', '6', '1,6,44,', '1');
INSERT INTO `yhyg_category` VALUES ('45', '创维电视', '6', '1,6,45,', '1');
INSERT INTO `yhyg_category` VALUES ('46', '长虹电视', '6', '1,6,46,', '1');
INSERT INTO `yhyg_category` VALUES ('47', '海尔壁挂式空调', '8', '2,8,47,', '1');
INSERT INTO `yhyg_category` VALUES ('48', '个护健康', '0', '48,', '1');
INSERT INTO `yhyg_category` VALUES ('49', '厨房小电', '0', '49,', '1');
INSERT INTO `yhyg_category` VALUES ('50', '进口电器', '0', '50,', '1');
INSERT INTO `yhyg_category` VALUES ('51', '剃须刀', '48', '48,51,', '1');
INSERT INTO `yhyg_category` VALUES ('52', '电饭煲', '49', '49,52,', '1');
INSERT INTO `yhyg_category` VALUES ('53', '微波炉', '49', '49,53,', '1');
INSERT INTO `yhyg_category` VALUES ('54', '电风扇', '31', '31,54,', '1');
INSERT INTO `yhyg_category` VALUES ('55', '烟灶套装', '28', '28,55,', '1');
INSERT INTO `yhyg_category` VALUES ('56', '洗碗机', '28', '28,56,', '1');
INSERT INTO `yhyg_category` VALUES ('57', '燃气热水器', '28', '28,57,', '1');
INSERT INTO `yhyg_category` VALUES ('58', '嵌入式厨电', '28', '28,58,', '1');
INSERT INTO `yhyg_category` VALUES ('59', '扫地机器人', '31', '31,59,', '1');
INSERT INTO `yhyg_category` VALUES ('60', '加湿器', '31', '31,60,', '1');
INSERT INTO `yhyg_category` VALUES ('61', '熨斗', '31', '31,61,', '1');
INSERT INTO `yhyg_category` VALUES ('62', '冷风扇', '31', '31,62,', '1');
INSERT INTO `yhyg_category` VALUES ('63', '插座', '31', '31,63,', '1');
INSERT INTO `yhyg_category` VALUES ('64', '电话机', '31', '31,64,', '1');
INSERT INTO `yhyg_category` VALUES ('65', '净水器', '31', '31,65,', '1');
INSERT INTO `yhyg_category` VALUES ('66', '生活电器配件', '31', '31,66,', '1');
INSERT INTO `yhyg_category` VALUES ('67', '电吹风', '48', '48,67,', '1');
INSERT INTO `yhyg_category` VALUES ('68', '美容器', '48', '48,68,', '1');
INSERT INTO `yhyg_category` VALUES ('69', '理发器', '48', '48,69,', '1');
INSERT INTO `yhyg_category` VALUES ('70', '按摩椅', '48', '48,70,', '1');
INSERT INTO `yhyg_category` VALUES ('71', '电烤箱', '49', '49,71,', '1');
INSERT INTO `yhyg_category` VALUES ('74', '电磁炉', '49', '49,74,', '1');
INSERT INTO `yhyg_category` VALUES ('75', '电压力锅', '49', '49,75,', '1');
INSERT INTO `yhyg_category` VALUES ('76', '豆浆机', '49', '49,76,', '1');
INSERT INTO `yhyg_category` VALUES ('77', '面包机', '49', '49,77,', '1');
INSERT INTO `yhyg_category` VALUES ('78', '榨汁机', '49', '49,78,', '1');
INSERT INTO `yhyg_category` VALUES ('79', '料理机', '49', '49,79,', '1');
INSERT INTO `yhyg_category` VALUES ('80', '索尼电视', '5', '1,5,80,', '1');
INSERT INTO `yhyg_category` VALUES ('81', '三星电视', '5', '1,5,81,', '1');
INSERT INTO `yhyg_category` VALUES ('82', '飞利浦电视', '5', '1,5,82,', '1');
INSERT INTO `yhyg_category` VALUES ('83', '乐视电视', '7', '1,7,83,', '1');
INSERT INTO `yhyg_category` VALUES ('84', '格力壁挂式空调', '8', '2,8,84,', '1');
INSERT INTO `yhyg_category` VALUES ('85', '美的壁挂式空调', '8', '2,8,85,', '1');
INSERT INTO `yhyg_category` VALUES ('86', '美的柜式空调', '9', '2,9,86,', '1');
INSERT INTO `yhyg_category` VALUES ('87', '海尔中央空调', '10', '2,10,87,', '1');
INSERT INTO `yhyg_category` VALUES ('88', '小天鹅滚筒洗衣机', '12', '3,12,88,', '1');
INSERT INTO `yhyg_category` VALUES ('89', '海尔滚筒洗衣机', '12', '3,12,89,', '1');
INSERT INTO `yhyg_category` VALUES ('90', '海尔多门冰箱', '17', '4,17,90,', '1');
INSERT INTO `yhyg_category` VALUES ('91', '西门子对开门冰箱', '18', '4,18,91,', '1');
INSERT INTO `yhyg_category` VALUES ('92', '美的三门冰箱', '19', '4,19,92,', '1');
INSERT INTO `yhyg_category` VALUES ('93', '海尔双门冰箱', '20', '4,20,93,', '1');
INSERT INTO `yhyg_category` VALUES ('94', '美的酒柜冰箱', '21', '4,21,94,', '1');
INSERT INTO `yhyg_category` VALUES ('95', '海尔酒柜冰箱', '21', '4,21,95,', '1');
INSERT INTO `yhyg_category` VALUES ('96', '小米电视', '7', '1,7,96,', '1');
INSERT INTO `yhyg_category` VALUES ('97', '奥克斯空调', '10', '2,10,97,', '1');
INSERT INTO `yhyg_category` VALUES ('98', 'TCL空调', '10', '2,10,98,', '1');
INSERT INTO `yhyg_category` VALUES ('99', '西门子洗衣机', '13', '3,13,99,', '1');
INSERT INTO `yhyg_category` VALUES ('100', 'TCL洗衣机', '14', '3,14,100,', '1');
INSERT INTO `yhyg_category` VALUES ('101', '小天鹅洗衣机', '14', '3,14,101,', '1');
INSERT INTO `yhyg_category` VALUES ('102', '奥克斯洗衣机', '15', '3,15,102,', '1');
INSERT INTO `yhyg_category` VALUES ('103', '小天鹅迷你洗衣机', '15', '3,15,103,', '1');
INSERT INTO `yhyg_category` VALUES ('104', 'aaa', '0', '104,', '1');
INSERT INTO `yhyg_category` VALUES ('105', 'bbb', '104', '104,105,', '1');

-- ----------------------------
-- Table structure for `yhyg_cj`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_cj`;
CREATE TABLE `yhyg_cj` (
  `id` int(11) NOT NULL,
  `prize` varchar(100) NOT NULL COMMENT '奖项名称',
  `v` int(11) NOT NULL COMMENT '设置中奖几率',
  `num` int(11) DEFAULT NULL,
  `lx` tinyint(5) DEFAULT NULL COMMENT '1为积分，2为U币,3为谢谢参与',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_cj
-- ----------------------------
INSERT INTO `yhyg_cj` VALUES ('1', '一等奖', '1', '100', '2');
INSERT INTO `yhyg_cj` VALUES ('2', '二等奖', '2', '50', '2');
INSERT INTO `yhyg_cj` VALUES ('3', '三等奖', '4', '30', '2');
INSERT INTO `yhyg_cj` VALUES ('4', '四等奖', '6', '20', '2');
INSERT INTO `yhyg_cj` VALUES ('5', '五等奖', '7', '10', '2');
INSERT INTO `yhyg_cj` VALUES ('6', '六等奖', '8', '5', '2');
INSERT INTO `yhyg_cj` VALUES ('7', '七等奖', '9', '40', '1');
INSERT INTO `yhyg_cj` VALUES ('8', '八等奖', '10', '30', '1');
INSERT INTO `yhyg_cj` VALUES ('9', '九等奖', '11', '20', '1');
INSERT INTO `yhyg_cj` VALUES ('10', '十等奖', '12', '10', '1');
INSERT INTO `yhyg_cj` VALUES ('11', '十一等奖', '13', '5', '1');
INSERT INTO `yhyg_cj` VALUES ('12', '谢谢参与', '14', null, '3');

-- ----------------------------
-- Table structure for `yhyg_cjlog`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_cjlog`;
CREATE TABLE `yhyg_cjlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `prize` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_cjlog
-- ----------------------------
INSERT INTO `yhyg_cjlog` VALUES ('1', '22', '1478696702', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('2', '22', '1478739724', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('3', '22', '1478739741', '10U币');
INSERT INTO `yhyg_cjlog` VALUES ('4', '22', '1478739749', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('5', '22', '1478739756', '30U币');
INSERT INTO `yhyg_cjlog` VALUES ('6', '22', '1478739776', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('7', '22', '1478739785', '5U币');
INSERT INTO `yhyg_cjlog` VALUES ('8', '22', '1478739800', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('9', '7', '1478740014', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('10', '7', '1478740038', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('11', '22', '1478740794', '30U币');
INSERT INTO `yhyg_cjlog` VALUES ('12', '22', '1478740892', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('13', '22', '1478740950', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('14', '22', '1478741123', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('15', '22', '1478741147', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('16', '22', '1478745263', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('17', '7', '1478745309', '20U币');
INSERT INTO `yhyg_cjlog` VALUES ('18', '5', '1478762498', '50U币');
INSERT INTO `yhyg_cjlog` VALUES ('19', '5', '1478762543', '10U币');
INSERT INTO `yhyg_cjlog` VALUES ('20', '5', '1478767655', '100U币');
INSERT INTO `yhyg_cjlog` VALUES ('21', '5', '1478767655', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('22', '22', '1478837251', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('23', '22', '1478843761', '5U币');
INSERT INTO `yhyg_cjlog` VALUES ('24', '22', '1478843768', '10U币');
INSERT INTO `yhyg_cjlog` VALUES ('25', '22', '1478843778', '50U币');
INSERT INTO `yhyg_cjlog` VALUES ('26', '22', '1478854368', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('27', '26', '1479285178', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('28', '26', '1479285178', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('29', '22', '1479344631', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('30', '22', '1479353512', '50U币');
INSERT INTO `yhyg_cjlog` VALUES ('31', '22', '1479353516', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('32', '22', '1479353696', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('33', '22', '1479363136', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('34', '22', '1479363281', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('35', '22', '1479363530', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('36', '22', '1479363575', '30U币');
INSERT INTO `yhyg_cjlog` VALUES ('37', '22', '1479363643', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('38', '22', '1479363729', '10U币');
INSERT INTO `yhyg_cjlog` VALUES ('39', '22', '1479363750', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('40', '22', '1479363789', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('41', '22', '1479364120', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('42', '22', '1479365416', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('43', '22', '1479365507', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('44', '22', '1479370309', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('45', '7', '1479380857', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('46', '7', '1479382187', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('47', '5', '1479456295', '30U币');
INSERT INTO `yhyg_cjlog` VALUES ('48', '5', '1479456305', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('49', '5', '1479456334', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('50', '5', '1479456346', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('51', '5', '1479456361', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('52', '5', '1479456492', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('53', '22', '1479791474', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('54', '22', '1479886583', '10U币');
INSERT INTO `yhyg_cjlog` VALUES ('55', '22', '1479889990', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('56', '22', '1479890176', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('57', '22', '1480049606', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('58', '22', '1480062648', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('59', '22', '1480315708', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('60', '7', '1480322263', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('61', '22', '1480576914', '30积分');
INSERT INTO `yhyg_cjlog` VALUES ('62', '22', '1480577147', '10U币');
INSERT INTO `yhyg_cjlog` VALUES ('63', '5', '1480589926', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('64', '5', '1480589940', '5积分');
INSERT INTO `yhyg_cjlog` VALUES ('65', '22', '1480589948', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('66', '22', '1480589998', '10积分');
INSERT INTO `yhyg_cjlog` VALUES ('67', '7', '1480640491', '40积分');
INSERT INTO `yhyg_cjlog` VALUES ('68', '22', '1480659085', '20积分');
INSERT INTO `yhyg_cjlog` VALUES ('69', '22', '1480659506', '20积分');

-- ----------------------------
-- Table structure for `yhyg_collect`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_collect`;
CREATE TABLE `yhyg_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_collect
-- ----------------------------
INSERT INTO `yhyg_collect` VALUES ('30', '15', '6', '1477641527');
INSERT INTO `yhyg_collect` VALUES ('31', '7', '7', '1477643635');
INSERT INTO `yhyg_collect` VALUES ('32', '3', '3', '1477888231');
INSERT INTO `yhyg_collect` VALUES ('33', '5', '3', '1477967725');
INSERT INTO `yhyg_collect` VALUES ('34', '5', '9', '1477967769');
INSERT INTO `yhyg_collect` VALUES ('35', '7', '3', '1477970341');
INSERT INTO `yhyg_collect` VALUES ('36', '7', '18', '1478080475');
INSERT INTO `yhyg_collect` VALUES ('38', '22', '19', '1478258496');
INSERT INTO `yhyg_collect` VALUES ('41', '22', '10', '1478258528');
INSERT INTO `yhyg_collect` VALUES ('43', '22', '9', '1478258546');
INSERT INTO `yhyg_collect` VALUES ('47', '26', '27', '1478326300');
INSERT INTO `yhyg_collect` VALUES ('51', '22', '52', '1478856728');
INSERT INTO `yhyg_collect` VALUES ('54', '22', '48', '1479208945');
INSERT INTO `yhyg_collect` VALUES ('55', '22', '34', '1479208951');
INSERT INTO `yhyg_collect` VALUES ('56', '22', '27', '1479209717');
INSERT INTO `yhyg_collect` VALUES ('57', '22', '7', '1479259879');
INSERT INTO `yhyg_collect` VALUES ('58', '26', '48', '1479262599');
INSERT INTO `yhyg_collect` VALUES ('61', '26', '52', '1479364206');
INSERT INTO `yhyg_collect` VALUES ('62', '7', '19', '1479382141');
INSERT INTO `yhyg_collect` VALUES ('63', '22', '44', '1479382294');
INSERT INTO `yhyg_collect` VALUES ('64', '22', '29', '1479382393');
INSERT INTO `yhyg_collect` VALUES ('65', '26', '29', '1479382500');
INSERT INTO `yhyg_collect` VALUES ('66', '7', '29', '1479390000');
INSERT INTO `yhyg_collect` VALUES ('67', '5', '2', '1479437445');
INSERT INTO `yhyg_collect` VALUES ('68', '7', '52', '1479536181');
INSERT INTO `yhyg_collect` VALUES ('69', '7', '27', '1479536743');
INSERT INTO `yhyg_collect` VALUES ('70', '7', '43', '1479536852');
INSERT INTO `yhyg_collect` VALUES ('71', '7', '44', '1479536855');
INSERT INTO `yhyg_collect` VALUES ('72', '7', '45', '1479537211');
INSERT INTO `yhyg_collect` VALUES ('73', '22', '51', '1480048114');
INSERT INTO `yhyg_collect` VALUES ('74', '22', '3', '1480048342');
INSERT INTO `yhyg_collect` VALUES ('76', '31', '22', '1480126577');
INSERT INTO `yhyg_collect` VALUES ('77', '31', '51', '1480126595');
INSERT INTO `yhyg_collect` VALUES ('78', '31', '52', '1480126596');
INSERT INTO `yhyg_collect` VALUES ('80', '18', '50', '1480589824');

-- ----------------------------
-- Table structure for `yhyg_coment_status`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_coment_status`;
CREATE TABLE `yhyg_coment_status` (
  `id` smallint(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_coment_status
-- ----------------------------
INSERT INTO `yhyg_coment_status` VALUES ('0', '未评价');
INSERT INTO `yhyg_coment_status` VALUES ('1', '好评');
INSERT INTO `yhyg_coment_status` VALUES ('2', '中评');
INSERT INTO `yhyg_coment_status` VALUES ('3', '差评');

-- ----------------------------
-- Table structure for `yhyg_comment`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_comment`;
CREATE TABLE `yhyg_comment` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) DEFAULT NULL COMMENT 'member ID ',
  `content` varchar(300) DEFAULT NULL COMMENT '评论内容（100字以内）',
  `edittime` int(10) unsigned NOT NULL COMMENT '评论时间',
  `gid` smallint(5) NOT NULL COMMENT '商品id',
  `sid` tinyint(1) DEFAULT NULL COMMENT '1:好评；2：中评;3:差评;4:未评价',
  `oid` smallint(5) DEFAULT NULL,
  `response` varchar(300) DEFAULT NULL COMMENT '回复 的内容',
  `restime` int(10) DEFAULT NULL COMMENT '回复时间',
  `photo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_comment
-- ----------------------------
INSERT INTO `yhyg_comment` VALUES ('24', '11', 'ggggggggggggggggggggggggggggg', '1479725854', '51', '1', '68', null, null, '');
INSERT INTO `yhyg_comment` VALUES ('25', '11', 'efgdfggfdgdfgdfuyyyyyyyyyyyyyyyyyyyyyyy', '1479726550', '13', '2', '65', '亲，下次继续光顾本店！', '1479890408', null);
INSERT INTO `yhyg_comment` VALUES ('26', '26', '规范的规定发给的鬼地方发的发生地方', '1479790013', '17', '1', '67', null, null, '');
INSERT INTO `yhyg_comment` VALUES ('32', '26', 'dsfsdfsfsdfsfsdfsdf', '1479793510', '45', '2', '74', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('33', '13', '通过法国的鬼地方个任务二佛挡杀佛', '1479958831', '45', '1', '81', 'dsfdsfdsfsd', '1480063199', '');
INSERT INTO `yhyg_comment` VALUES ('34', '13', '就很快会尽快发计划黄金国际', '1479958888', '12', '3', '79', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('35', '13', '看见了开发规划符合法规和体验法国和', '1479958932', '17', '2', '80', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('36', '26', '突然一个符合规范和规范让他热', '1479969363', '40', '3', '83', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('37', '22', '规范的规范的隔热认为上的发生', '1479990515', '49', '2', '3', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('38', '26', '规范地方而噩噩去萨斯fdfs', '1480047878', '3', '1', '82', '这件商品很棒！', '1480315013', null);
INSERT INTO `yhyg_comment` VALUES ('39', '22', '684542542235', '1480048319', '3', '2', '89', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('40', '26', 'wewqeqwdfsfsdfdsfsdfsd', '1480063142', '47', '1', '84', '商品质量太棒啦', '1480315062', '');
INSERT INTO `yhyg_comment` VALUES ('41', '26', '此件商品很棒，我很喜欢', '1480315877', '4', '1', '85', null, null, null);
INSERT INTO `yhyg_comment` VALUES ('42', '13', '很棒，我很喜欢，降温很快！很舒服', '1480316299', '44', '2', '94', '看到你的好评，我很欣慰！', '1480316408', '');
INSERT INTO `yhyg_comment` VALUES ('43', '26', '的说法和发挥区位重新注册', '1480501498', '15', '1', '86', '非常感谢您的好评，么么哒！', '1480501538', '');
INSERT INTO `yhyg_comment` VALUES ('44', '26', '发的规范的紧迫感就而减肥都是风景', '1480578947', '14', '1', '87', '的规范和认同依然特让我！', '1480578993', '/Uploads/suntu/2016-12-01/583fd7835385b.jpg');
INSERT INTO `yhyg_comment` VALUES ('45', '26', '好地方的时间可发生地偶尔发动机都是', '1480591465', '25', '2', '103', '的房间看电视了减肥而额外加地方的时刻就！', '1480591486', null);
INSERT INTO `yhyg_comment` VALUES ('46', '26', 'gsduaugfjhdsgferfewsfsa', '1480659767', '50', '3', '96', 'dsgsfdgdfgfdgsfdgdf', '1480659818', '/Uploads/suntu/2016-12-02/5841133821da9.png');

-- ----------------------------
-- Table structure for `yhyg_dhlog`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_dhlog`;
CREATE TABLE `yhyg_dhlog` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Jid` tinyint(4) NOT NULL,
  `addtime` int(11) NOT NULL,
  `mid` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_dhlog
-- ----------------------------
INSERT INTO `yhyg_dhlog` VALUES ('1', '1', '1479285735', '22');
INSERT INTO `yhyg_dhlog` VALUES ('2', '1', '1479285747', '22');
INSERT INTO `yhyg_dhlog` VALUES ('3', '1', '1479295160', '22');
INSERT INTO `yhyg_dhlog` VALUES ('4', '1', '1479295347', '22');
INSERT INTO `yhyg_dhlog` VALUES ('5', '6', '1479295425', '22');
INSERT INTO `yhyg_dhlog` VALUES ('6', '1', '1479344621', '22');
INSERT INTO `yhyg_dhlog` VALUES ('7', '2', '1479344625', '22');
INSERT INTO `yhyg_dhlog` VALUES ('8', '9', '1479350366', '22');
INSERT INTO `yhyg_dhlog` VALUES ('9', '1', '1479369740', '22');
INSERT INTO `yhyg_dhlog` VALUES ('10', '1', '1479370026', '22');
INSERT INTO `yhyg_dhlog` VALUES ('11', '8', '1479440299', '22');
INSERT INTO `yhyg_dhlog` VALUES ('12', '1', '1479440876', '22');
INSERT INTO `yhyg_dhlog` VALUES ('13', '2', '1479441783', '22');
INSERT INTO `yhyg_dhlog` VALUES ('14', '1', '1479782538', '22');
INSERT INTO `yhyg_dhlog` VALUES ('15', '1', '1479782538', '22');
INSERT INTO `yhyg_dhlog` VALUES ('16', '1', '1479789503', '22');
INSERT INTO `yhyg_dhlog` VALUES ('17', '1', '1479789503', '22');
INSERT INTO `yhyg_dhlog` VALUES ('18', '1', '1479789503', '22');
INSERT INTO `yhyg_dhlog` VALUES ('19', '1', '1479789504', '22');
INSERT INTO `yhyg_dhlog` VALUES ('20', '1', '1479789504', '22');
INSERT INTO `yhyg_dhlog` VALUES ('21', '1', '1479789506', '22');
INSERT INTO `yhyg_dhlog` VALUES ('22', '1', '1479789506', '22');
INSERT INTO `yhyg_dhlog` VALUES ('23', '1', '1479789506', '22');
INSERT INTO `yhyg_dhlog` VALUES ('24', '1', '1479789507', '22');
INSERT INTO `yhyg_dhlog` VALUES ('25', '1', '1479789549', '22');
INSERT INTO `yhyg_dhlog` VALUES ('26', '1', '1479789550', '22');
INSERT INTO `yhyg_dhlog` VALUES ('27', '1', '1479789550', '22');
INSERT INTO `yhyg_dhlog` VALUES ('28', '1', '1479789552', '22');
INSERT INTO `yhyg_dhlog` VALUES ('29', '1', '1479789552', '22');
INSERT INTO `yhyg_dhlog` VALUES ('30', '1', '1479789553', '22');
INSERT INTO `yhyg_dhlog` VALUES ('31', '1', '1479793939', '22');
INSERT INTO `yhyg_dhlog` VALUES ('32', '1', '1479794084', '22');
INSERT INTO `yhyg_dhlog` VALUES ('33', '2', '1479794133', '22');
INSERT INTO `yhyg_dhlog` VALUES ('34', '1', '1479794218', '22');
INSERT INTO `yhyg_dhlog` VALUES ('35', '1', '1479794466', '22');
INSERT INTO `yhyg_dhlog` VALUES ('36', '1', '1479884505', '22');
INSERT INTO `yhyg_dhlog` VALUES ('37', '1', '1479886494', '22');
INSERT INTO `yhyg_dhlog` VALUES ('38', '13', '1479886896', '22');
INSERT INTO `yhyg_dhlog` VALUES ('39', '12', '1479887559', '22');
INSERT INTO `yhyg_dhlog` VALUES ('40', '1', '1479890857', '22');
INSERT INTO `yhyg_dhlog` VALUES ('41', '1', '1479890858', '22');
INSERT INTO `yhyg_dhlog` VALUES ('42', '1', '1480659076', '22');

-- ----------------------------
-- Table structure for `yhyg_goods`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_goods`;
CREATE TABLE `yhyg_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(300) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cid` tinyint(3) unsigned NOT NULL,
  `markeprice` float(8,2) unsigned DEFAULT NULL,
  `price` float(8,2) unsigned DEFAULT NULL,
  `num` int(10) unsigned NOT NULL,
  `detail` varchar(2000) DEFAULT NULL,
  `pic` varchar(60) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0代表下线，1代表上线',
  `addtime` int(10) unsigned DEFAULT NULL,
  `salenum` int(10) unsigned NOT NULL DEFAULT '0',
  `bid` tinyint(5) unsigned DEFAULT NULL,
  `hot` varchar(20) DEFAULT '' COMMENT '选购热点',
  `credit` int(10) DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_goods
-- ----------------------------
INSERT INTO `yhyg_goods` VALUES ('1', '索尼（SONY）U9+ 55英寸高清4K HDR 安卓6.0系统 智能液晶电视（KD-55X7066D 金色）', '索尼电视', '80', '5000.00', '4699.00', '77', '第一次添加', '2016-10-27/5811751f0532b.jpg', '1', '1477539102', '23', '11', '高端智能', '1000');
INSERT INTO `yhyg_goods` VALUES ('2', '三星（SAMSUNG）UA55JU6800J 55英寸 曲面超高清4K智能液晶电视 黑色', '三星电视', '81', '5500.00', '5499.00', '4', '第二', '2016-10-27/581197cfe31ca.jpg', '1', '1477547983', '6', '6', '经济实惠', '1002');
INSERT INTO `yhyg_goods` VALUES ('3', '飞利浦（PHILIPS) 32英寸 智能八核安卓高清液晶电视+飞利浦（PHILIPS）HMP7020/93 电视网络机顶盒套装', '飞利浦电视', '82', '1800.00', '1798.00', '40', '3', '2016-10-28/5812c9afc29c4.jpg', '1', '1477626287', '10', '5', '新品上市', '1001');
INSERT INTO `yhyg_goods` VALUES ('4', '海信（Hisense）LED55EC520UA 55英寸 VIDAA3 14核 炫彩4K智能电视(黑色)', '海信电视', '43', '3500.00', '3399.00', '85', '四', '2016-10-27/58119d0c994de.jpg', '1', '1477549324', '15', '12', '经济实惠', '1003');
INSERT INTO `yhyg_goods` VALUES ('5', '创维（Skyworth）55英寸 4K超高清智能酷开网络液晶电视 +飞利浦（PHILIPS）HTL4110B/93 音响 回音壁套装', '创维电视', '45', '6008.00', '6008.00', '98', '五', '2016-10-27/58119f5b634c4.jpg', '1', '1477549915', '2', '7', '经济实惠', '999');
INSERT INTO `yhyg_goods` VALUES ('6', '乐视超级电视 X65 65英寸4K高清智能LED液晶电视(标配挂架）', '乐视电视', '83', '4900.00', '4900.00', '5', '六', '2016-10-27/5811a0b26c7b9.jpg', '1', '1477550258', '6', '9', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('7', '格力（GREE）正1.5匹 变频 品圆 冷暖 壁挂式空调 KFR-35GW/(35592)FNhDa-A3', '格力壁挂式空调', '84', '3200.00', '3199.00', '4', '七', '2016-10-27/5811a255423c5.jpg', '1', '1477550677', '16', '2', '新品上市', '999');
INSERT INTO `yhyg_goods` VALUES ('8', '美的（Midea）1.5匹 京东英雄 壁挂式冷暖变频空调KFR-35GW/WPAA3', '美的壁挂式空调', '85', '3000.00', '2899.00', '45', '8', '2016-10-27/5811a3b875951.jpg', '1', '1477551032', '5', '10', '绿色节能', '998');
INSERT INTO `yhyg_goods` VALUES ('9', '美的（Midea）大3匹 京东英雄 远距离送风冷暖柜机KFR-72LW/WPAD3', '美的柜式空调', '86', '4999.00', '4999.00', '35', '9', '2016-10-27/5811a493a93a4.jpg', '1', '1477551251', '15', '10', '新品上市', '1000');
INSERT INTO `yhyg_goods` VALUES ('10', '海尔（Haier）4匹 一拖三 适用60-80㎡ 全包价 家用中央空调 WIFI智控 RFC100MXSAVA(G) 乳白色', '海尔中央空调', '87', '20880.00', '20880.00', '3', '10', '2016-10-27/5811a562a21ba.jpg', '1', '1477551458', '7', '1', '绿色节能', '1004');
INSERT INTO `yhyg_goods` VALUES ('11', '小天鹅（Little Swan）全自动8公斤变频大容量滚筒洗衣机 TG80-1229EDS', '小天鹅滚筒洗衣机', '88', '2200.00', '2198.00', '98', '小天鹅', '2016-10-31/5816a2a9df92b.jpg', '1', '1477878441', '2', '13', '绿色节能', '1001');
INSERT INTO `yhyg_goods` VALUES ('12', '海尔（Haier) EG8012B39SU1 8公斤变频滚筒洗衣机 京东微联智能APP控制', '海尔滚筒洗衣机', '89', '2700.00', '2699.00', '39', '海尔', '2016-10-31/5816a3698bd2d.jpg', '1', '1477878633', '11', '1', '绿色节能', '998');
INSERT INTO `yhyg_goods` VALUES ('13', '海尔（Haier）BCD-325WDSD 325升 风冷无霜多门冰箱 304不锈钢 无霜杀菌 （冰锋骑士）', '海尔多门冰箱', '90', '4000.00', '3999.00', '31', '海尔', '2016-10-31/5816a49889b4f.jpg', '1', '1477878936', '19', '1', '绿色节能', '999');
INSERT INTO `yhyg_goods` VALUES ('14', '西门子（SIEMENS） BCD-610W(KA92NV02TI) 610升 变频风冷无霜 对开门冰箱 LED显示 速冷速冻（白色）', '西门子对开门冰箱', '91', '6400.00', '6399.00', '36', '14', '2016-11-01/58185847dcaaf.jpg', '1', '1477990471', '14', '20', '绿色节能', '1005');
INSERT INTO `yhyg_goods` VALUES ('15', '美的(Midea) BCD-206TM(E) 206升 三门冰箱 节能保鲜 闪白银', '美的三门冰箱', '92', '1230.00', '1298.00', '94', '15', '2016-11-01/58185946b30f6.jpg', '1', '1477990726', '6', '10', '绿色节能', '1002');
INSERT INTO `yhyg_goods` VALUES ('16', '海尔（Haier）BCD-160TMPQ 160升 两门冰箱 冷冻速度快 经济实用两门冰箱', '海尔双门冰箱', '93', '1000.00', '949.00', '997', '16', '2016-11-01/58185a5210c71.jpg', '1', '1477990993', '3', '1', '绿色节能', '1002');
INSERT INTO `yhyg_goods` VALUES ('17', '美的(Midea) BCD-220VM(E) 220升 商用家用卧式冰箱 双箱双温冷柜 (妙趣金', '美的酒柜冰箱', '94', '1200.00', '1149.00', '991', '17', '2016-11-01/58185b5887ad6.jpg', '1', '1477991256', '9', '10', '绿色节能', '1004');
INSERT INTO `yhyg_goods` VALUES ('18', '海尔（Haier）WS052 52瓶装 酒窖级恒温恒湿系统酒柜', '海尔酒柜冰箱', '95', '2180.00', '2180.00', '85', '18', '2016-11-01/58185c643dc76.jpg', '1', '1477991524', '15', '1', '新品上市', '1012');
INSERT INTO `yhyg_goods` VALUES ('19', '小米（MI）L55M5-AA 55英寸 小米电视3S 智能4K（浅灰色）', '小米电视', '96', '3700.00', '3699.00', '11', '', '2016-11-03/581adaf0b5dfc.jpg', '1', '1478154992', '9', '4', '新品上市', '1003');
INSERT INTO `yhyg_goods` VALUES ('20', '奥克斯（AUX）QRD-120N/EB-N3 5匹(适用45-68㎡) 超薄设计节省空间 吸顶式天花机 家用中央空调 6年保修', '奥克斯空调', '97', '7700.00', '7699.00', '9', '', '2016-11-03/581adda8cb8ea.jpg', '1', '1478155688', '11', '22', '外形精美', '1002');
INSERT INTO `yhyg_goods` VALUES ('21', 'TCL 吸顶嵌入式天花机3匹冷暖天井机办公商用中央空调220V,KFRD-72Q8W', 'TCL空调', '98', '6200.00', '6188.00', '46', '', '2016-11-03/581adf1a0a787.jpg', '1', '1478156057', '4', '8', '绿色节能', '999');
INSERT INTO `yhyg_goods` VALUES ('22', '西门子(SIEMENS) XQG80-WD12G4C01W 8公斤 洗烘一体变频 滚筒洗衣机 LED显示屏 静音 热风除菌（白色）', '西门子洗衣机', '99', '5500.00', '5499.00', '23', '', '2016-11-03/581ae0623cb54.jpg', '1', '1478156386', '7', '20', '新品上市', '999');
INSERT INTO `yhyg_goods` VALUES ('23', 'TCL XQB55-36SP 5.5公斤 全自动波轮洗衣机 一键脱水（亮灰色）', 'TCL洗衣机', '100', '700.00', '699.00', '89', '', '2016-11-03/581ae175b34d0.jpg', '1', '1478156661', '11', '8', '新品上市', '1004');
INSERT INTO `yhyg_goods` VALUES ('24', '小天鹅（Little Swan） TB55-V1068 5.5公斤 全自动波轮洗衣机（灰色）', '小天鹅洗衣机', '101', '750.00', '748.00', '90', '', '2016-11-03/581ae2f67be20.jpg', '1', '1478157046', '10', '13', '绿色节能', '1001');
INSERT INTO `yhyg_goods` VALUES ('25', 'AUX/奥克斯XPB32-A6迷你洗衣机小型儿童宝宝脱水双缸双桶半自动甩干桶', '奥克斯洗衣机', '102', '350.00', '349.00', '86', '', '2016-11-03/581ae3ff768cc.jpg', '1', '1478174177', '14', '22', '绿色节能', '998');
INSERT INTO `yhyg_goods` VALUES ('27', '长虹（CHANGHONG）55G6 55英寸 曲面4K HDR 超清智能液晶平板电视（黑色）', '长虹电视', '46', '5000.00', '4299.00', '989', '精美请问', '2016-11-04/581be26a0e860.jpg', '1', '1478222442', '11', '19', '高端智能', '999');
INSERT INTO `yhyg_goods` VALUES ('28', '小天鹅（Little Swan）TB30-Q8 3公斤波轮洗衣机全自动小型儿童迷你 灰白色', '小天鹅迷你洗衣机', '103', '1100.00', '1098.00', '111', 'xxx', '2016-11-05/581d50e7e1a37.jpg', '1', '1478334227', '19', '13', '绿色节能', '999');
INSERT INTO `yhyg_goods` VALUES ('29', '长虹（CHANGHONG）55U3C 55英寸双64位4K安卓智能LED液晶电视(黑色)', '长虹电视', '46', '3298.00', '2798.00', '998', '131', '2016-11-10/5824410280e45.jpg', '1', '1478770946', '2', '19', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('30', '长虹（CHANGHONG）55D3S 55英寸 HDR 人工智能语音 25核 轻薄 4K超清智能平板液晶电视', '长虹电视', '46', '3999.00', '3600.00', '1000', '3112', '2016-11-10/5824422077751.jpg', '1', '1478771232', '0', '19', '高端智能', '1000');
INSERT INTO `yhyg_goods` VALUES ('31', '长虹（CHANGHONG）43N1 43英寸窄边网络互动LED液晶电视(黑色）', '长虹电视', '46', '5000.00', '4600.00', '1000', '阿瑟额', '2016-11-10/58244403a63e6.jpg', '1', '1478771715', '0', '19', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('32', '长虹（CHANGHONG）55S1 55英寸内置wifi 12核 安卓智能液晶电视', '长虹电视', '46', '2999.00', '2699.00', '1000', '啊啊', '2016-11-10/582444eed8a5b.jpg', '1', '1478771950', '0', '19', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('33', '长虹（CHANGHONG）65U3 65英寸18核超高清双64位4K HDR智能平板液晶电视', '长虹电视', '46', '3900.00', '3500.00', '1000', '1312', '2016-11-10/5824469a74f27.jpg', '1', '1478772378', '0', '19', '新品上市', '1000');
INSERT INTO `yhyg_goods` VALUES ('34', '长虹（CHANGHONG）60G3 60英寸双模式64位轻薄4K HDR超高清智能语音平板儿童电视', '长虹电视', '46', '5500.00', '5300.00', '1000', '21432154', '2016-11-10/5824476181375.jpg', '1', '1478772577', '0', '19', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('35', '长虹（CHANGHONG）65S1 65英寸十二核智能U-MAX平板液晶电视', '长虹电视', '46', '4499.00', '4299.00', '1000', '313', '2016-11-10/582448470e941.jpg', '1', '1478772807', '0', '19', '高端智能', '1000');
INSERT INTO `yhyg_goods` VALUES ('36', '长虹（CHANGHONG）LED32B2080n 32英寸窄边网络LED液晶电视', '长虹电视', '46', '1500.00', '1199.00', '996', '41412', '2016-11-10/582449131a36c.jpg', '1', '1478773011', '4', '19', '经济实惠', '999');
INSERT INTO `yhyg_goods` VALUES ('37', '长虹（CHANGHONG)49Q2FU 49英寸CHiQ 安卓智能LED平板4K液晶电视', '长虹电视', '46', '2999.00', '2699.00', '996', '214312', '2016-11-10/58244f050c913.jpg', '1', '1478774533', '4', '19', '高端智能', '998');
INSERT INTO `yhyg_goods` VALUES ('38', '长虹（CHANGHONG）49U1 49英寸 双64位超高清4K 安卓智能 LED平板液晶电视', '长虹电视', '46', '2999.00', '2599.00', '1000', '123123', '2016-11-10/58244fe0581b9.jpg', '1', '1478774752', '0', '19', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('39', '长虹（CHANGHONG）55J3000 55英寸高清数字一体智能商用液晶电视', '长虹电视', '46', '3698.00', '3398.00', '1000', '1341241', '2016-11-10/582450b934bd9.jpg', '1', '1478774969', '0', '19', '经济实惠', '1000');
INSERT INTO `yhyg_goods` VALUES ('40', '海尔（Haier）1.5匹 变频冷暖 二级能效 除甲醛 空调挂机 KFR-35GW/01QMY22A(水晶白)-DS', '海尔壁挂式空调', '47', '4099.00', '3699.00', '994', '214141', '2016-11-10/582453a2bf23c.jpg', '1', '1478775714', '6', '1', '绿色节能', '999');
INSERT INTO `yhyg_goods` VALUES ('41', '海尔（Haier）小1.5匹 定频 冷暖 智能 空调挂机 KFR-33W/10EBA13U1套机', '海尔壁挂式空调', '47', '2800.00', '2399.00', '995', '1312', '2016-11-10/582455e26c4c3.jpg', '1', '1478776290', '5', '1', '绿色节能', '1001');
INSERT INTO `yhyg_goods` VALUES ('42', '海尔（Haier）大1匹 定频 冷暖 智能 空调挂机 KFR-26GW/10EBA13U1套机', '海尔壁挂式空调', '47', '2000.00', '1800.00', '999', '14124', '2016-11-10/5824580c1800d.jpg', '1', '1478776844', '1', '1', '绿色节能', '1000');
INSERT INTO `yhyg_goods` VALUES ('43', '格力（GREE）大1匹 变频冷暖 智享 微联智能 壁挂式空调 KFR-26GW/(26559)FNAd-A3', '格力壁挂式空调', '84', '3199.00', '2899.00', '1000', '13123', '2016-11-10/58245a4099562.jpg', '1', '1478777408', '0', '2', '经济实惠', '1000');
INSERT INTO `yhyg_goods` VALUES ('44', '格力（GREE）小1.5匹 定速 品圆 冷暖 壁挂式空调 KFR-32GW/(32592)NhDa-3', '格力壁挂式空调', '84', '2298.00', '2198.00', '994', '12414', '2016-11-10/58245b2283046.jpg', '1', '1478777634', '6', '2', '新品上市', '999');
INSERT INTO `yhyg_goods` VALUES ('45', '格力（GREE）大1匹 变频 凉之静Ⅱ 二级能效 微联智能 壁挂式冷暖空调', '格力壁挂式空调', '84', '4000.00', '3699.00', '994', '54235', '2016-11-10/58245c3126120.jpg', '1', '1478777905', '6', '2', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('46', '乐视超级电视 超4 X55 Curved 55吋曲面4k高清智能LED网络电视', '乐视电视', '83', '5498.00', '5198.00', '999', '134124', '2016-11-10/5824622269e9d.jpg', '1', '1478779426', '1', '9', '外形精美', '1000');
INSERT INTO `yhyg_goods` VALUES ('47', '乐视超级电视 超4 70-2D 70英寸4K高清智能分体电视', '乐视电视', '83', '12099.00', '10999.00', '990', '1414', '2016-11-10/582464f340656.jpg', '1', '1478780147', '10', '9', '外形精美', '1003');
INSERT INTO `yhyg_goods` VALUES ('48', '乐视超级电视 X60S 敢死队硬汉版 60英寸3D智能LED液晶(Letv X60S)', '乐视电视', '83', '7969.00', '6969.00', '980', '14145', '2016-11-10/5824659b0f025.jpg', '1', '1478780315', '20', '9', '外形精美', '1001');
INSERT INTO `yhyg_goods` VALUES ('49', '乐视超级电视 超4 X65 Curved 65英寸 曲面4k高清智能LED网络电视', '乐视电视', '83', '9000.00', '8198.00', '993', '5242', '2016-11-10/5824665def954.jpg', '1', '1478780509', '7', '9', '高端智能', '1001');
INSERT INTO `yhyg_goods` VALUES ('50', '乐视超级电视 超4 70-3D 70英寸4k高清3D智能液晶分体电视', '乐视电视', '83', '16000.00', '14999.00', '997', '6345', '2016-11-10/5824671b8303f.jpg', '1', '1478780699', '3', '9', '高端智能', '999');
INSERT INTO `yhyg_goods` VALUES ('51', '乐视超级电视 S50 Air FN2009全配版 50英寸2D智能LED液晶', '乐视电视', '83', '3500.00', '3269.00', '989', '63363', '2016-11-10/582468720ea13.jpg', '1', '1478781042', '11', '9', '经济实惠', '1004');
INSERT INTO `yhyg_goods` VALUES ('52', '乐视超级电视 X60S 全配版 60英寸3D智能LED液晶(Letv X60S)', '乐视电视', '83', '7000.00', '6469.00', '993', '423515', '2016-11-10/582469bf33bc2.jpg', '1', '1478781375', '7', '9', '外形精美', '999');

-- ----------------------------
-- Table structure for `yhyg_goods_pic`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_goods_pic`;
CREATE TABLE `yhyg_goods_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL,
  `picname` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_goods_pic
-- ----------------------------
INSERT INTO `yhyg_goods_pic` VALUES ('1', '1', '2016-10-27/5811751f0532b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('2', '1', '2016-10-27/5811751f06e84.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('3', '1', '2016-10-28/5811751f085f4.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('4', '1', '2016-10-27/5811751f183e0.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('5', '2', '2016-10-27/581197cfe31ca.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('6', '2', '2016-10-27/581197cfe7c03.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('7', '2', '2016-10-27/581197cfe8f8c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('8', '2', '2016-10-27/581197cff04bd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('13', '4', '2016-10-27/58119d0c994de.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('14', '4', '2016-10-27/58119d0ca92c9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('15', '4', '2016-10-27/58119d0cae4d3.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('16', '4', '2016-10-27/58119d0cafc43.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('17', '5', '2016-10-27/58119f5b634c4.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('18', '5', '2016-10-27/58119f5b64c35.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('19', '5', '2016-10-27/58119f5b65fbd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('20', '5', '2016-10-27/58119f5b6dcbf.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('21', '6', '2016-10-27/5811a0b26c7b9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('22', '6', '2016-10-27/5811a0b26e311.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('23', '6', '2016-10-27/5811a0b26eeca.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('24', '6', '2016-10-27/5811a0b26fa82.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('25', '7', '2016-10-27/5811a255423c5.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('26', '7', '2016-10-27/5811a25543b35.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('27', '7', '2016-10-27/5811a25544ebd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('28', '7', '2016-10-27/5811a2554662d.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('29', '8', '2016-10-27/5811a3b875951.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('30', '8', '2016-10-27/5811a3b87650a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('31', '8', '2016-10-27/5811a3b8770c2.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('32', '8', '2016-10-27/5811a3b877c7a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('33', '9', '2016-10-27/5811a493a93a4.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('34', '9', '2016-10-27/5811a493aa72c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('35', '9', '2016-10-27/5811a493ab6cc.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('36', '10', '2016-10-27/5811a562a21ba.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('37', '10', '2016-10-27/5811a562a2d72.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('38', '10', '2016-10-27/5811a562a3d12.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('39', '10', '2016-10-27/5811a562a48ca.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('48', '3', '2016-10-28/5812c9afc29c4.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('49', '3', '2016-10-28/5812c9afc357c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('50', '3', '2016-10-28/5812c9afc4134.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('51', '3', '2016-10-28/5812c9afc4904.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('52', '11', '2016-10-31/5816a2a9df92b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('53', '11', '2016-10-31/5816a2a9e668c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('54', '11', '2016-10-31/5816a2a9e89b5.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('55', '11', '2016-10-31/5816a2a9ea50d.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('56', '12', '2016-10-31/5816a3698bd2d.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('57', '12', '2016-10-31/5816a3698e055.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('58', '12', '2016-10-31/5816a3698f7c6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('59', '12', '2016-10-31/5816a3699131e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('60', '13', '2016-10-31/5816a49889b4f.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('61', '13', '2016-10-31/5816a4988ba8f.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('62', '13', '2016-10-31/5816a4988d200.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('63', '14', '2016-11-01/58185847dcaaf.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('64', '14', '2016-11-01/58185847e6ec1.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('65', '14', '2016-11-01/58185847e8a1a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('66', '14', '2016-11-01/58185847eb12a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('67', '15', '2016-11-01/58185946b30f6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('68', '15', '2016-11-01/58185946be4a9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('69', '15', '2016-11-01/58185946c0001.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('70', '15', '2016-11-01/58185946c1772.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('71', '16', '2016-11-01/58185a5210c71.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('72', '16', '2016-11-01/58185a521376a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('73', '16', '2016-11-01/58185a5214af2.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('74', '16', '2016-11-01/58185a521664a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('75', '17', '2016-11-01/58185b5887ad6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('76', '17', '2016-11-01/58185b588a5cf.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('77', '17', '2016-11-01/58185b588c127.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('78', '17', '2016-11-01/58185b588e068.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('79', '18', '2016-11-01/58185c643dc76.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('80', '18', '2016-11-01/58185c643fbb6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('81', '18', '2016-11-01/58185c6441327.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('82', '18', '2016-11-01/58185c644da62.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('83', '19', '2016-11-03/581adaf0b5dfc.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('84', '19', '2016-11-03/581adaf0b8cdc.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('85', '19', '2016-11-03/581adaf0bdafe.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('86', '19', '2016-11-03/581adaf0bf26e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('87', '20', '2016-11-03/581adda8cb8ea.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('88', '20', '2016-11-03/581adda8cdc12.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('89', '20', '2016-11-03/581adda8d070b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('90', '20', '2016-11-03/581adda8d16ab.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('91', '21', '2016-11-03/581adf1a0a787.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('92', '21', '2016-11-03/581adf1a0c2e0.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('93', '21', '2016-11-03/581adf1a0d668.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('94', '21', '2016-11-03/581adf1a0e608.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('95', '22', '2016-11-03/581ae0623cb54.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('96', '22', '2016-11-03/581ae062434cd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('97', '22', '2016-11-03/581ae0624540e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('98', '22', '2016-11-03/581ae06246f66.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('99', '23', '2016-11-03/581ae175b34d0.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('100', '23', '2016-11-03/581ae175b5029.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('101', '23', '2016-11-03/581ae175b7f0a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('102', '23', '2016-11-03/581ae175b8ac2.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('103', '24', '2016-11-03/581ae2f67be20.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('104', '24', '2016-11-03/581ae2f67d591.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('105', '24', '2016-11-03/581ae2f683f0a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('106', '24', '2016-11-03/581ae2f684ac2.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('107', '25', '2016-11-03/581ae3ff768cc.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('108', '25', '2016-11-03/581ae3ff78425.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('109', '25', '2016-11-03/581ae3ff7f186.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('110', '25', '2016-11-03/581ae3ff808f6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('113', '27', '2016-11-04/581be26a0e860.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('114', '27', '2016-11-04/581be26a0f800.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('115', '27', '2016-11-04/581be26a103b8.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('116', '27', '2016-11-04/581be26a10f70.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('117', '28', '2016-11-05/581d50e7e1a37.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('118', '28', '2016-11-05/581d50e7e77f9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('119', '28', '2016-11-05/581d50e7e9351.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('120', '28', '2016-11-05/581d50e7edd8a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('121', '29', '2016-11-10/5824410280e45.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('122', '29', '2016-11-10/5824410286fee.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('123', '29', '2016-11-10/5824410287f8e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('124', '29', '2016-11-10/5824410288f2f.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('125', '30', '2016-11-10/5824422077751.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('126', '30', '2016-11-10/5824422082333.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('127', '30', '2016-11-10/5824422082eec.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('128', '30', '2016-11-10/5824422084e2c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('129', '31', '2016-11-10/58244403a63e6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('130', '31', '2016-11-10/58244403b1f69.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('131', '31', '2016-11-10/58244403b2739.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('132', '31', '2016-11-10/58244403b36d9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('133', '32', '2016-11-10/582444eed8a5b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('134', '32', '2016-11-10/582444eedc8dc.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('135', '32', '2016-11-10/582444eedd494.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('136', '32', '2016-11-10/582444eede04c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('137', '33', '2016-11-10/5824469a74f27.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('138', '33', '2016-11-10/5824469a7b8a1.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('139', '33', '2016-11-10/5824469a7c071.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('140', '33', '2016-11-10/5824469a7cc29.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('141', '34', '2016-11-10/5824476181375.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('142', '34', '2016-11-10/5824476184e0e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('143', '34', '2016-11-10/58244761859c6.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('144', '34', '2016-11-10/5824476186196.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('145', '35', '2016-11-10/582448470e941.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('146', '35', '2016-11-10/58244847127c2.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('147', '35', '2016-11-10/5824484712f93.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('148', '35', '2016-11-10/5824484713b4b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('149', '36', '2016-11-10/582449131a36c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('150', '36', '2016-11-10/58244913226ad.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('151', '36', '2016-11-10/5824491323265.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('152', '36', '2016-11-10/5824491323e1d.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('153', '37', '2016-11-10/58244f050c913.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('154', '37', '2016-11-10/58244f050d4cb.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('155', '37', '2016-11-10/58244f050dc9b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('156', '37', '2016-11-10/58244f0510f64.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('157', '38', '2016-11-10/58244fe0581b9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('158', '38', '2016-11-10/58244fe05898a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('159', '38', '2016-11-10/58244fe059542.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('160', '38', '2016-11-10/58244fe05ef1b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('161', '39', '2016-11-10/582450b934bd9.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('162', '39', '2016-11-10/582450b93634a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('163', '39', '2016-11-10/582450b936b1a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('164', '40', '2016-11-10/582453a2bf23c.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('165', '40', '2016-11-10/582453a2bfdf5.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('166', '40', '2016-11-10/582453a2c09ad.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('167', '40', '2016-11-10/582453a2c482e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('168', '41', '2016-11-10/582455e26c4c3.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('169', '41', '2016-11-10/582455e26c8ab.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('170', '42', '2016-11-10/5824580c1800d.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('171', '42', '2016-11-10/5824580c187dd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('172', '42', '2016-11-10/5824580c19395.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('173', '42', '2016-11-10/5824580c1e59f.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('174', '43', '2016-11-10/58245a4099562.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('175', '43', '2016-11-10/58245a4099d32.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('176', '43', '2016-11-10/58245a409a8eb.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('177', '43', '2016-11-10/58245a409b4a3.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('178', '44', '2016-11-10/58245b2283046.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('179', '44', '2016-11-10/58245b2283bfe.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('180', '44', '2016-11-10/58245b22843ce.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('181', '44', '2016-11-10/58245b2284b9e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('182', '45', '2016-11-10/58245c3126120.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('183', '45', '2016-11-10/58245c31268f0.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('184', '45', '2016-11-10/58245c31270c0.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('185', '45', '2016-11-10/58245c3127c78.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('186', '46', '2016-11-10/5824622269e9d.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('187', '46', '2016-11-10/582462226aa55.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('188', '46', '2016-11-10/582462226b225.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('189', '46', '2016-11-10/582462226bddd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('190', '47', '2016-11-10/582464f340656.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('191', '47', '2016-11-10/582464f34472e.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('192', '47', '2016-11-10/582464f344efe.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('193', '47', '2016-11-10/582464f345ab7.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('194', '48', '2016-11-10/5824659b0f025.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('195', '48', '2016-11-10/5824659b0fbdd.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('196', '48', '2016-11-10/5824659b10795.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('197', '48', '2016-11-10/5824659b10f65.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('198', '49', '2016-11-10/5824665def954.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('199', '50', '2016-11-10/5824671b8303f.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('200', '50', '2016-11-10/5824671b847af.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('201', '50', '2016-11-10/5824671b86308.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('202', '50', '2016-11-10/5824671b872a8.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('203', '51', '2016-11-10/582468720ea13.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('204', '51', '2016-11-10/582468720f5cb.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('205', '51', '2016-11-10/582468720fd9b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('206', '51', '2016-11-10/582468721056b.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('207', '52', '2016-11-10/582469bf33bc2.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('208', '52', '2016-11-10/582469bf3477a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('209', '52', '2016-11-10/582469bf34f4a.jpg');
INSERT INTO `yhyg_goods_pic` VALUES ('210', '52', '2016-11-10/582469bf35b02.jpg');

-- ----------------------------
-- Table structure for `yhyg_jorder`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_jorder`;
CREATE TABLE `yhyg_jorder` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(40) NOT NULL COMMENT '订单号',
  `mid` int(11) unsigned DEFAULT NULL,
  `scid` int(11) DEFAULT NULL,
  `orderprice` float unsigned DEFAULT NULL COMMENT '总价',
  `orderstatus` int(11) DEFAULT NULL,
  `addtime` int(11) unsigned DEFAULT NULL COMMENT '提交时间',
  `msg` varchar(255) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_jorder
-- ----------------------------
INSERT INTO `yhyg_jorder` VALUES ('2', '201611135620349817', '7', '2', '109800', '4', '1479024766', '', '28');
INSERT INTO `yhyg_jorder` VALUES ('3', '201611133976824150', '7', '2', '549900', '1', '1479027329', '', '2');
INSERT INTO `yhyg_jorder` VALUES ('4', '201611186048715923', '22', '7', '109800', '3', '1479439982', '', '28');
INSERT INTO `yhyg_jorder` VALUES ('5', '201611189384670152', '22', '7', '109800', '2', '1479440206', '', '28');
INSERT INTO `yhyg_jorder` VALUES ('6', '201611184652187903', '22', '7', '369900', '2', '1479440294', '', '19');
INSERT INTO `yhyg_jorder` VALUES ('7', '201611236304128579', '22', '7', '369900', '1', '1479886498', '', '19');
INSERT INTO `yhyg_jorder` VALUES ('8', '201611233082169475', '22', '7', '549900', '3', '1479886889', '', '2');
INSERT INTO `yhyg_jorder` VALUES ('9', '201611231084672935', '22', '7', '94900', '3', '1479887554', '', '16');
INSERT INTO `yhyg_jorder` VALUES ('10', '201611259327516804', '7', '10', '369900', '1', '1480054036', '', '19');

-- ----------------------------
-- Table structure for `yhyg_jshop`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_jshop`;
CREATE TABLE `yhyg_jshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `needJF` int(11) NOT NULL,
  `getUB` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0为虚拟礼品，1为实物礼品',
  `gid` int(11) DEFAULT NULL,
  `zd` int(5) DEFAULT '0' COMMENT '0为普通，1为置顶',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_jshop
-- ----------------------------
INSERT INTO `yhyg_jshop` VALUES ('1', '5001', '50', '0', null, '1', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('2', '10000', '100', '0', null, '1', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('3', '20000', '200', '0', null, '0', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('5', '30000', '300', '0', null, '0', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('6', '40000', '400', '0', null, '0', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('7', '50000', '500', '0', null, '0', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('8', '369900', null, '1', '19', '0', '1478769491');
INSERT INTO `yhyg_jshop` VALUES ('11', '179800', null, '1', '3', '0', '1478769515');
INSERT INTO `yhyg_jshop` VALUES ('12', '94900', null, '1', '16', '0', '1478769536');
INSERT INTO `yhyg_jshop` VALUES ('13', '549900', null, '1', '2', '0', '1478769561');
INSERT INTO `yhyg_jshop` VALUES ('15', '339900', null, '1', '4', '1', '1479379207');
INSERT INTO `yhyg_jshop` VALUES ('16', '60000', '600', '0', null, '0', '1480576797');

-- ----------------------------
-- Table structure for `yhyg_letter`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_letter`;
CREATE TABLE `yhyg_letter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '积分兑换',
  `content` varchar(300) NOT NULL,
  `addtime` int(11) NOT NULL,
  `mid` int(10) NOT NULL COMMENT '0代表所有用户',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0代表未读，1代表已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_letter
-- ----------------------------
INSERT INTO `yhyg_letter` VALUES ('2', '积分抽奖', '在积分抽奖活动抽中了五等奖获得10U币', '1479886583', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('4', '积分抽奖', '在积分抽奖活动抽中了八等奖获得30积分', '1479889990', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('5', '积分抽奖', '在积分抽奖活动抽中了十等奖获得10积分', '1479890176', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('6', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890857', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('7', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890858', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('8', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890859', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('9', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890860', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('10', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890862', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('11', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890865', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('12', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1479890867', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('14', '活动通知', 'hello', '1479891816', '0', '1');
INSERT INTO `yhyg_letter` VALUES ('15', '积分兑换', '充值160000U币', '1479958669', '13', '0');
INSERT INTO `yhyg_letter` VALUES ('21', '充值U币', '充值10000000U币', '1480064192', '7', '0');
INSERT INTO `yhyg_letter` VALUES ('22', '充值U币', '充值123455U币', '1480126340', '31', '0');
INSERT INTO `yhyg_letter` VALUES ('23', '积分抽奖', '在积分抽奖活动抽中了十一等奖获得5积分', '1480315708', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('24', '积分抽奖', '在积分抽奖活动抽中了八等奖获得30积分', '1480322263', '7', '0');
INSERT INTO `yhyg_letter` VALUES ('25', '积分兑换', '在积分商城中使用60000积分兑换了600U币', '1480576868', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('26', '积分抽奖', '在积分抽奖活动抽中了八等奖获得30积分', '1480576914', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('27', '积分兑换', '在积分抽奖活动抽中了五等奖获得10U币', '1480577147', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('28', '充值U币', '充值10U币', '1480589909', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('29', '积分兑换', '在积分抽奖活动抽中了九等奖获得20积分', '1480589926', '5', '0');
INSERT INTO `yhyg_letter` VALUES ('30', '积分兑换', '在积分抽奖活动抽中了十一等奖获得5积分', '1480589940', '5', '0');
INSERT INTO `yhyg_letter` VALUES ('31', '积分兑换', '在积分抽奖活动抽中了九等奖获得20积分', '1480589948', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('32', '积分抽奖', '在积分抽奖活动抽中了十等奖获得10积分', '1480589998', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('33', '积分抽奖', '在积分抽奖活动抽中了七等奖获得40积分', '1480640491', '7', '0');
INSERT INTO `yhyg_letter` VALUES ('34', '积分兑换', '在积分商城中使用5000积分兑换了50U币', '1480659076', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('36', '充值U币', '充值1000U币', '1480659209', '22', '1');
INSERT INTO `yhyg_letter` VALUES ('37', '23421312', '31231232', '1480659368', '0', '1');
INSERT INTO `yhyg_letter` VALUES ('38', '积分兑换', '在积分抽奖活动抽中了九等奖获得20积分', '1480659506', '22', '0');

-- ----------------------------
-- Table structure for `yhyg_member`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_member`;
CREATE TABLE `yhyg_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `addtime` varchar(11) DEFAULT NULL COMMENT '添加时间',
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL COMMENT '1为男，2为女',
  `birthday` varchar(255) DEFAULT NULL COMMENT '生日',
  `mobile` varchar(255) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `expense` float(9,0) unsigned NOT NULL DEFAULT '0' COMMENT '用户消费',
  `lid` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '用户等级ID',
  `active` varchar(4) NOT NULL DEFAULT '1' COMMENT '会员管理，0为禁用，1为正常',
  `integral` int(11) unsigned DEFAULT '0' COMMENT '用户积分',
  `balance` int(11) DEFAULT '0' COMMENT '账户余额',
  `touxiang` varchar(500) DEFAULT NULL,
  `paypwd` varchar(32) DEFAULT NULL COMMENT '支付密码',
  `isnew` tinyint(2) DEFAULT '0' COMMENT '0为新用户，1为老用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_member
-- ----------------------------
INSERT INTO `yhyg_member` VALUES ('5', '123456', 'e10adc3949ba59abbe56e057f20f883e', '1477903067', '415', '男', '2016-11-10', '13283871582', '25784524', '0', '1', '0', '1665', '8792', '/Uploads/2016-11-24/5836770b0edfa.png', 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `yhyg_member` VALUES ('6', '67misshow', 'e10adc3949ba59abbe56e057f20f883e', '1477903104', null, '', null, '', null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('7', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1477903160', '大帅哥', '男', '2016-11-4', '15738776352', '5645441@qq.com', '80893', '1', '1', '19958030', '9958309', '/Uploads/2016-11-25/5837d7b9b0a3b.jpg', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `yhyg_member` VALUES ('10', 'data', 'e10adc3949ba59abbe56e057f20f883e', '1477903246', null, '', null, null, null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('12', 'miss', 'e10adc3949ba59abbe56e057f20f883e', '1477903307', null, '', null, null, null, '0', '1', '1', '40', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('13', 'show', 'e10adc3949ba59abbe56e057f20f883e', '1477903336', '', '男', '', '', '', '17340', '1', '1', '32340', '140023', '/Uploads/2016-11-24/58366148bb723.png', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `yhyg_member` VALUES ('18', 'she', '4607e782c4d86fd5364d7e4508bb10d9', '1477981267', null, '', null, null, null, '0', '1', '1', '40', '0', null, 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `yhyg_member` VALUES ('19', 'he', 'e10adc3949ba59abbe56e057f20f883e', '1477981296', null, '', null, null, null, '0', '1', '1', '40', '0', null, 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `yhyg_member` VALUES ('20', 'Apache', 'e10adc3949ba59abbe56e057f20f883e', '1477981323', null, '', null, null, null, '0', '1', '1', '80', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('21', '147258', 'e10adc3949ba59abbe56e057f20f883e', '1477981354', null, '', null, null, null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('22', 'wzywzy', 'e10adc3949ba59abbe56e057f20f883e', '1477981300', '王振亚', '男', '1993-11-9', '13783038090', '2696257717@qq.com', '18462', '1', '1', '24820', '1114595', '/Uploads/2016-11-18/582e61c251726.PNG', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `yhyg_member` VALUES ('24', '13592627655', 'e10adc3949ba59abbe56e057f20f883e', '1478069152', null, '', null, null, null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('26', 'gsg', 'e10adc3949ba59abbe56e057f20f883e', '1478222262', '', '男', '', '18736242375', '', '301695', '1', '1', '261900', '8457538', '/Uploads/2016-11-28/583b9cb9d3947.png', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `yhyg_member` VALUES ('29', 'angle', 'e10adc3949ba59abbe56e057f20f883e', '1478758342', '', '男', '', '', '', '100000', '1', '1', '150000', '1600000', '/Uploads/2016-11-24/583661e92cb46.png', 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `yhyg_member` VALUES ('31', '1111', 'e10adc3949ba59abbe56e057f20f883e', '1480126141', null, null, null, null, null, '0', '1', '1', '0', '120186', null, 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `yhyg_member` VALUES ('32', 'username', 'e10adc3949ba59abbe56e057f20f883e', '1480577799', null, null, null, null, null, '0', '1', '1', '20', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('33', 'liuqi', 'e10adc3949ba59abbe56e057f20f883e', '1480578669', null, null, null, null, null, '0', '1', '1', '0', '0', null, 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `yhyg_member` VALUES ('34', 'shugang', 'e10adc3949ba59abbe56e057f20f883e', '1480594809', null, null, null, null, null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('35', 'dnfq', 'e10adc3949ba59abbe56e057f20f883e', '1480595087', null, null, null, null, null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('36', 's和', '827ccb0eea8a706c4c34a16891f84e7b', '1480660460', null, null, null, null, null, '0', '1', '1', '0', '0', null, null, '0');
INSERT INTO `yhyg_member` VALUES ('37', '13283871582', 'e10adc3949ba59abbe56e057f20f883e', '1480660506', null, null, null, null, null, '0', '1', '1', '0', '0', null, null, '0');

-- ----------------------------
-- Table structure for `yhyg_order`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_order`;
CREATE TABLE `yhyg_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(40) NOT NULL COMMENT '订单号',
  `mid` int(11) unsigned DEFAULT NULL,
  `scid` int(11) DEFAULT NULL,
  `orderprice` float unsigned DEFAULT NULL COMMENT '总价',
  `orderstatus` int(11) DEFAULT NULL,
  `addtime` int(11) unsigned DEFAULT NULL COMMENT '提交时间',
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_order
-- ----------------------------
INSERT INTO `yhyg_order` VALUES ('2', '201611117308546291', '5', '1', '3699', '3', '1478848350', '');
INSERT INTO `yhyg_order` VALUES ('3', '201611114035782196', '22', '7', '8198', '5', '1478854131', '');
INSERT INTO `yhyg_order` VALUES ('6', '201611132761903845', '7', '2', '2800', '4', '1479017544', '');
INSERT INTO `yhyg_order` VALUES ('7', '201611133108725964', '7', '2', '11967', '4', '1479026433', '');
INSERT INTO `yhyg_order` VALUES ('11', '201611167019853426', '7', '2', '10999', '3', '1479276003', '');
INSERT INTO `yhyg_order` VALUES ('12', '201611165236170948', '7', '10', '699', '4', '1479276052', '');
INSERT INTO `yhyg_order` VALUES ('14', '201611165198367042', '7', '2', '6399', '3', '1479276144', '');
INSERT INTO `yhyg_order` VALUES ('15', '201611161298603547', '7', '16', '10999', '2', '1479283867', '');
INSERT INTO `yhyg_order` VALUES ('16', '201611161598236470', '7', '10', '10999', '4', '1479283883', '');
INSERT INTO `yhyg_order` VALUES ('18', '201611160152864937', '7', '2', '1149', '3', '1479283948', '');
INSERT INTO `yhyg_order` VALUES ('33', '201611166325980714', '7', '2', '6969', '4', '1479285370', '');
INSERT INTO `yhyg_order` VALUES ('35', '201611173602857941', '7', '10', '3269', '3', '1479370149', '');
INSERT INTO `yhyg_order` VALUES ('36', '201611177910253468', '7', '16', '4360', '3', '1479371155', '');
INSERT INTO `yhyg_order` VALUES ('40', '201611177819065324', '22', '7', '2399', '5', '1479382610', '');
INSERT INTO `yhyg_order` VALUES ('41', '201611176251438079', '22', '7', '3269', '5', '1479384378', '');
INSERT INTO `yhyg_order` VALUES ('53', '201611182956038471', '5', '1', '16497', '2', '1479437464', '');
INSERT INTO `yhyg_order` VALUES ('54', '201611184027398156', '9', '20', '349', '3', '1479439539', '');
INSERT INTO `yhyg_order` VALUES ('64', '201611187489106532', '11', '21', '3999', '1', '1479469643', '');
INSERT INTO `yhyg_order` VALUES ('65', '201611185678914032', '11', '21', '3999', '5', '1479469711', '');
INSERT INTO `yhyg_order` VALUES ('66', '201611183428795106', '11', '21', '2699', '4', '1479470288', '');
INSERT INTO `yhyg_order` VALUES ('68', '201611210428315976', '11', '21', '3269', '5', '1479725771', '');
INSERT INTO `yhyg_order` VALUES ('74', '201611222930547861', '26', '4', '3699', '5', '1479793448', '');
INSERT INTO `yhyg_order` VALUES ('75', '201611230243695781', '7', '16', '2180', '3', '1479884775', '');
INSERT INTO `yhyg_order` VALUES ('77', '201611237358194602', '7', '16', '24906', '3', '1479884803', '');
INSERT INTO `yhyg_order` VALUES ('78', '201611238960437152', '7', '16', '748', '1', '1479886368', '');
INSERT INTO `yhyg_order` VALUES ('79', '201611242167904835', '13', '24', '2199', '5', '1479957971', '');
INSERT INTO `yhyg_order` VALUES ('80', '201611248049625173', '13', '24', '1149', '5', '1479958000', '');
INSERT INTO `yhyg_order` VALUES ('81', '201611246047928513', '13', '24', '7398', '5', '1479958616', '');
INSERT INTO `yhyg_order` VALUES ('82', '201611246729810453', '26', '4', '1798', '5', '1479959901', '');
INSERT INTO `yhyg_order` VALUES ('83', '201611247159630284', '26', '4', '11097', '5', '1479959944', '');
INSERT INTO `yhyg_order` VALUES ('84', '201611241263089754', '26', '4', '21998', '5', '1479959974', '');
INSERT INTO `yhyg_order` VALUES ('85', '201611243975204681', '26', '4', '3399', '5', '1479960002', '');
INSERT INTO `yhyg_order` VALUES ('86', '201611242786491305', '26', '4', '2596', '5', '1479960078', '');
INSERT INTO `yhyg_order` VALUES ('87', '201611241824390576', '26', '4', '6399', '5', '1479969308', '');
INSERT INTO `yhyg_order` VALUES ('88', '201611257965043128', '22', '7', '2798', '4', '1480047983', '');
INSERT INTO `yhyg_order` VALUES ('89', '201611251065389427', '22', '7', '1798', '5', '1480048266', '');
INSERT INTO `yhyg_order` VALUES ('90', '201611257496531802', '7', '10', '13938', '3', '1480054434', '');
INSERT INTO `yhyg_order` VALUES ('91', '201611257209861543', '7', '27', '6969', '4', '1480064170', '');
INSERT INTO `yhyg_order` VALUES ('93', '201611261948032576', '31', '29', '3269', '3', '1480126211', '');
INSERT INTO `yhyg_order` VALUES ('94', '201611287042581396', '13', '24', '6594', '5', '1480316154', '');
INSERT INTO `yhyg_order` VALUES ('95', '201611286103259487', '13', '24', '12938', '3', '1480316354', '');
INSERT INTO `yhyg_order` VALUES ('96', '201611289467532081', '26', '4', '14999', '5', '1480316816', '');
INSERT INTO `yhyg_order` VALUES ('97', '201612012197630458', '26', '4', '5499', '4', '1480578330', '');
INSERT INTO `yhyg_order` VALUES ('98', '201612016572081439', '26', '4', '2798', '4', '1480578405', '');
INSERT INTO `yhyg_order` VALUES ('99', '201612018736512409', '26', '4', '1199', '1', '1480578507', '');
INSERT INTO `yhyg_order` VALUES ('100', '201612016971483250', '26', '4', '2398', '4', '1480578514', '');
INSERT INTO `yhyg_order` VALUES ('101', '201612019435610278', '26', '4', '5398', '4', '1480579058', '');
INSERT INTO `yhyg_order` VALUES ('102', '201612011792348560', '26', '4', '19407', '4', '1480580021', '');
INSERT INTO `yhyg_order` VALUES ('103', '201612010361845792', '26', '4', '698', '5', '1480582311', '');
INSERT INTO `yhyg_order` VALUES ('104', '201612024078136259', '7', '26', '2399', '3', '1480640755', '');
INSERT INTO `yhyg_order` VALUES ('105', '201612024708629531', '7', '31', '349', '3', '1480660782', '');
INSERT INTO `yhyg_order` VALUES ('106', '201612029680412357', '7', '26', '6969', '3', '1480661097', '');

-- ----------------------------
-- Table structure for `yhyg_order_copy`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_order_copy`;
CREATE TABLE `yhyg_order_copy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ordersyn` varchar(40) NOT NULL COMMENT '订单号',
  `mid` int(11) unsigned DEFAULT NULL,
  `scid` int(11) DEFAULT NULL,
  `orderprice` float unsigned DEFAULT NULL COMMENT '总价',
  `orderstatus` int(11) DEFAULT NULL,
  `addtime` int(11) unsigned DEFAULT NULL COMMENT '提交时间',
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_order_copy
-- ----------------------------
INSERT INTO `yhyg_order_copy` VALUES ('2', '201611117308546291', '5', '1', '3699', '3', '1478848350', '');
INSERT INTO `yhyg_order_copy` VALUES ('3', '201611114035782196', '22', '7', '8198', '2', '1478854131', '');
INSERT INTO `yhyg_order_copy` VALUES ('6', '201611132761903845', '7', '2', '2800', '1', '1479017544', '');
INSERT INTO `yhyg_order_copy` VALUES ('7', '201611133108725964', '7', '2', '11967', '1', '1479026433', '');
INSERT INTO `yhyg_order_copy` VALUES ('10', '201611167205384196', '7', '10', '3269', '1', '1479275993', '');
INSERT INTO `yhyg_order_copy` VALUES ('11', '201611167019853426', '7', '2', '10999', '1', '1479276003', '');
INSERT INTO `yhyg_order_copy` VALUES ('14', '201611165198367042', '7', '2', '6399', '1', '1479276144', '');
INSERT INTO `yhyg_order_copy` VALUES ('15', '201611161298603547', '7', '16', '10999', '1', '1479283867', '');
INSERT INTO `yhyg_order_copy` VALUES ('21', '201611169641037258', '7', '2', '1298', '1', '1479284077', '');
INSERT INTO `yhyg_order_copy` VALUES ('40', '201611177819065324', '22', '7', '2399', '1', '1479382610', '');
INSERT INTO `yhyg_order_copy` VALUES ('41', '201611176251438079', '22', '7', '3269', '1', '1479384378', '');
INSERT INTO `yhyg_order_copy` VALUES ('64', '201611187489106532', '11', '21', '3999', '1', '1479469643', '');
INSERT INTO `yhyg_order_copy` VALUES ('65', '201611185678914032', '11', '21', '3999', '1', '1479469711', '');
INSERT INTO `yhyg_order_copy` VALUES ('66', '201611183428795106', '11', '21', '2699', '1', '1479470288', '');
INSERT INTO `yhyg_order_copy` VALUES ('67', '201611195189042367', '26', '4', '8915', '1', '1479529503', '');
INSERT INTO `yhyg_order_copy` VALUES ('68', '201611210428315976', '11', '21', '3269', '1', '1479725771', '');
INSERT INTO `yhyg_order_copy` VALUES ('69', '201611225038476921', '26', '4', '6969', '1', '1479790084', '');
INSERT INTO `yhyg_order_copy` VALUES ('70', '201611229572168043', '26', '4', '349', '1', '1479790108', '');
INSERT INTO `yhyg_order_copy` VALUES ('71', '201611228649173502', '26', '4', '949', '1', '1479790563', '');
INSERT INTO `yhyg_order_copy` VALUES ('72', '201611221420596738', '26', '4', '2699', '1', '1479790752', '');
INSERT INTO `yhyg_order_copy` VALUES ('73', '201611229631407258', '26', '4', '6399', '1', '1479790820', '');
INSERT INTO `yhyg_order_copy` VALUES ('74', '201611222930547861', '26', '4', '3699', '1', '1479793448', '');
INSERT INTO `yhyg_order_copy` VALUES ('75', '201611230243695781', '7', '16', '2180', '1', '1479884775', '');
INSERT INTO `yhyg_order_copy` VALUES ('76', '201611235603214789', '7', '16', '10999', '1', '1479884787', '');
INSERT INTO `yhyg_order_copy` VALUES ('77', '201611237358194602', '7', '16', '24906', '1', '1479884803', '');
INSERT INTO `yhyg_order_copy` VALUES ('78', '201611238960437152', '7', '16', '748', '1', '1479886368', '');
INSERT INTO `yhyg_order_copy` VALUES ('79', '201611242167904835', '13', '24', '2199', '1', '1479957971', '');
INSERT INTO `yhyg_order_copy` VALUES ('80', '201611248049625173', '13', '24', '1149', '1', '1479958000', '');
INSERT INTO `yhyg_order_copy` VALUES ('81', '201611246047928513', '13', '24', '7398', '1', '1479958616', '');
INSERT INTO `yhyg_order_copy` VALUES ('82', '201611246729810453', '26', '4', '1798', '1', '1479959901', '');
INSERT INTO `yhyg_order_copy` VALUES ('83', '201611247159630284', '26', '4', '11097', '1', '1479959944', '');
INSERT INTO `yhyg_order_copy` VALUES ('84', '201611241263089754', '26', '4', '21998', '1', '1479959974', '');
INSERT INTO `yhyg_order_copy` VALUES ('85', '201611243975204681', '26', '4', '3399', '1', '1479960002', '');
INSERT INTO `yhyg_order_copy` VALUES ('86', '201611242786491305', '26', '4', '2596', '1', '1479960078', '');
INSERT INTO `yhyg_order_copy` VALUES ('87', '201611241824390576', '26', '4', '6399', '1', '1479969308', '');
INSERT INTO `yhyg_order_copy` VALUES ('88', '201611257965043128', '22', '7', '2798', '1', '1480047983', '');
INSERT INTO `yhyg_order_copy` VALUES ('89', '201611251065389427', '22', '7', '1798', '1', '1480048266', '');
INSERT INTO `yhyg_order_copy` VALUES ('90', '201611257496531802', '7', '10', '13938', '1', '1480054434', '');
INSERT INTO `yhyg_order_copy` VALUES ('91', '201611257209861543', '7', '27', '6969', '1', '1480064170', '');
INSERT INTO `yhyg_order_copy` VALUES ('92', '201611255130486927', '7', '25', '3618', '1', '1480064224', '');
INSERT INTO `yhyg_order_copy` VALUES ('93', '201611261948032576', '31', '29', '3269', '1', '1480126211', '');
INSERT INTO `yhyg_order_copy` VALUES ('94', '201611287042581396', '13', '24', '6594', '1', '1480316154', '');
INSERT INTO `yhyg_order_copy` VALUES ('95', '201611286103259487', '13', '24', '12938', '1', '1480316354', '');
INSERT INTO `yhyg_order_copy` VALUES ('96', '201611289467532081', '26', '4', '14999', '1', '1480316816', '');
INSERT INTO `yhyg_order_copy` VALUES ('97', '201612012197630458', '26', '4', '5499', '1', '1480578330', '');
INSERT INTO `yhyg_order_copy` VALUES ('98', '201612016572081439', '26', '4', '2798', '1', '1480578405', '');
INSERT INTO `yhyg_order_copy` VALUES ('99', '201612018736512409', '26', '4', '1199', '1', '1480578507', '');
INSERT INTO `yhyg_order_copy` VALUES ('100', '201612016971483250', '26', '4', '2398', '1', '1480578514', '');
INSERT INTO `yhyg_order_copy` VALUES ('101', '201612019435610278', '26', '4', '5398', '1', '1480579058', '');
INSERT INTO `yhyg_order_copy` VALUES ('102', '201612011792348560', '26', '4', '19407', '1', '1480580021', '');
INSERT INTO `yhyg_order_copy` VALUES ('103', '201612010361845792', '26', '4', '698', '1', '1480582311', '');
INSERT INTO `yhyg_order_copy` VALUES ('104', '201612024078136259', '7', '26', '2399', '1', '1480640755', '');
INSERT INTO `yhyg_order_copy` VALUES ('105', '201612024708629531', '7', '31', '349', '1', '1480660782', '');
INSERT INTO `yhyg_order_copy` VALUES ('106', '201612029680412357', '7', '26', '6969', '1', '1480661097', '');

-- ----------------------------
-- Table structure for `yhyg_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_order_goods`;
CREATE TABLE `yhyg_order_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `oid` int(10) DEFAULT NULL,
  `gid` int(10) DEFAULT NULL,
  `buynum` int(10) DEFAULT NULL,
  `gidprice` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_order_goods
-- ----------------------------
INSERT INTO `yhyg_order_goods` VALUES ('2', '2', '40', '1', '3699');
INSERT INTO `yhyg_order_goods` VALUES ('3', '3', '49', '1', '8198');
INSERT INTO `yhyg_order_goods` VALUES ('5', '5', '9', '1', '4300');
INSERT INTO `yhyg_order_goods` VALUES ('6', '6', '4', '1', '2800');
INSERT INTO `yhyg_order_goods` VALUES ('7', '7', '9', '1', '4999');
INSERT INTO `yhyg_order_goods` VALUES ('8', '7', '51', '1', '3269');
INSERT INTO `yhyg_order_goods` VALUES ('9', '7', '40', '1', '3699');
INSERT INTO `yhyg_order_goods` VALUES ('10', '8', '37', '1', '2400');
INSERT INTO `yhyg_order_goods` VALUES ('13', '11', '47', '1', '10999');
INSERT INTO `yhyg_order_goods` VALUES ('14', '12', '23', '1', '699');
INSERT INTO `yhyg_order_goods` VALUES ('16', '14', '14', '1', '6399');
INSERT INTO `yhyg_order_goods` VALUES ('17', '15', '47', '1', '10999');
INSERT INTO `yhyg_order_goods` VALUES ('18', '16', '47', '1', '10999');
INSERT INTO `yhyg_order_goods` VALUES ('19', '18', '17', '1', '1149');
INSERT INTO `yhyg_order_goods` VALUES ('22', '23', '24', '1', '748');
INSERT INTO `yhyg_order_goods` VALUES ('26', '27', '18', '1', '2180');
INSERT INTO `yhyg_order_goods` VALUES ('27', '28', '48', '1', '6969');
INSERT INTO `yhyg_order_goods` VALUES ('28', '29', '25', '1', '349');
INSERT INTO `yhyg_order_goods` VALUES ('30', '31', '44', '1', '2198');
INSERT INTO `yhyg_order_goods` VALUES ('31', '32', '44', '1', '2198');
INSERT INTO `yhyg_order_goods` VALUES ('32', '33', '48', '1', '6969');
INSERT INTO `yhyg_order_goods` VALUES ('33', '34', '48', '1', '6969');
INSERT INTO `yhyg_order_goods` VALUES ('37', '35', '51', '1', '3269');
INSERT INTO `yhyg_order_goods` VALUES ('38', '36', '18', '2', '2180');
INSERT INTO `yhyg_order_goods` VALUES ('40', '38', '18', '1', '2180');
INSERT INTO `yhyg_order_goods` VALUES ('41', '39', '51', '1', '3269');
INSERT INTO `yhyg_order_goods` VALUES ('42', '40', '41', '1', '2399');
INSERT INTO `yhyg_order_goods` VALUES ('43', '41', '51', '1', '3269');
INSERT INTO `yhyg_order_goods` VALUES ('60', '53', '2', '3', '5499');
INSERT INTO `yhyg_order_goods` VALUES ('61', '54', '25', '1', '349');
INSERT INTO `yhyg_order_goods` VALUES ('71', '64', '13', '1', '3999');
INSERT INTO `yhyg_order_goods` VALUES ('72', '65', '13', '1', '3999');
INSERT INTO `yhyg_order_goods` VALUES ('73', '66', '37', '1', '2699');
INSERT INTO `yhyg_order_goods` VALUES ('76', '68', '51', '1', '3269');
INSERT INTO `yhyg_order_goods` VALUES ('82', '74', '45', '1', '3699');
INSERT INTO `yhyg_order_goods` VALUES ('83', '75', '18', '1', '2180');
INSERT INTO `yhyg_order_goods` VALUES ('85', '77', '48', '3', '6969');
INSERT INTO `yhyg_order_goods` VALUES ('86', '77', '13', '1', '3999');
INSERT INTO `yhyg_order_goods` VALUES ('87', '78', '24', '1', '748');
INSERT INTO `yhyg_order_goods` VALUES ('88', '79', '12', '1', '2199');
INSERT INTO `yhyg_order_goods` VALUES ('89', '80', '17', '1', '1149');
INSERT INTO `yhyg_order_goods` VALUES ('90', '81', '45', '2', '3699');
INSERT INTO `yhyg_order_goods` VALUES ('91', '82', '3', '1', '1798');
INSERT INTO `yhyg_order_goods` VALUES ('92', '83', '40', '3', '3699');
INSERT INTO `yhyg_order_goods` VALUES ('93', '84', '47', '2', '10999');
INSERT INTO `yhyg_order_goods` VALUES ('94', '85', '4', '1', '3399');
INSERT INTO `yhyg_order_goods` VALUES ('95', '86', '15', '2', '1298');
INSERT INTO `yhyg_order_goods` VALUES ('96', '87', '14', '1', '6399');
INSERT INTO `yhyg_order_goods` VALUES ('97', '88', '29', '1', '2798');
INSERT INTO `yhyg_order_goods` VALUES ('98', '89', '3', '1', '1798');
INSERT INTO `yhyg_order_goods` VALUES ('99', '90', '48', '2', '6969');
INSERT INTO `yhyg_order_goods` VALUES ('100', '91', '48', '1', '6969');
INSERT INTO `yhyg_order_goods` VALUES ('103', '93', '51', '1', '3269');
INSERT INTO `yhyg_order_goods` VALUES ('104', '94', '44', '3', '2198');
INSERT INTO `yhyg_order_goods` VALUES ('105', '95', '52', '2', '6469');
INSERT INTO `yhyg_order_goods` VALUES ('106', '96', '50', '1', '14999');
INSERT INTO `yhyg_order_goods` VALUES ('107', '97', '2', '1', '5499');
INSERT INTO `yhyg_order_goods` VALUES ('108', '98', '29', '1', '2798');
INSERT INTO `yhyg_order_goods` VALUES ('109', '99', '36', '1', '1199');
INSERT INTO `yhyg_order_goods` VALUES ('110', '100', '36', '2', '1199');
INSERT INTO `yhyg_order_goods` VALUES ('111', '101', '37', '2', '2699');
INSERT INTO `yhyg_order_goods` VALUES ('112', '102', '52', '3', '6469');
INSERT INTO `yhyg_order_goods` VALUES ('113', '103', '25', '2', '349');
INSERT INTO `yhyg_order_goods` VALUES ('114', '104', '41', '1', '2399');
INSERT INTO `yhyg_order_goods` VALUES ('115', '105', '25', '1', '349');
INSERT INTO `yhyg_order_goods` VALUES ('116', '106', '48', '1', '6969');

-- ----------------------------
-- Table structure for `yhyg_order_status`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_order_status`;
CREATE TABLE `yhyg_order_status` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `statusname` varchar(255) DEFAULT NULL,
  `memberopt` varchar(255) DEFAULT NULL,
  `adminopt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_order_status
-- ----------------------------
INSERT INTO `yhyg_order_status` VALUES ('1', '待付款', '付款', null);
INSERT INTO `yhyg_order_status` VALUES ('2', '已付款', null, '待发货');
INSERT INTO `yhyg_order_status` VALUES ('3', '已发货', '确认收货', null);
INSERT INTO `yhyg_order_status` VALUES ('4', '订单完成', '待评价', '');
INSERT INTO `yhyg_order_status` VALUES ('5', '已评价', '订单完成', null);

-- ----------------------------
-- Table structure for `yhyg_qd`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_qd`;
CREATE TABLE `yhyg_qd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mid` int(10) DEFAULT NULL,
  `total` tinyint(5) DEFAULT '0' COMMENT '用户本月签到总数',
  `str` varchar(300) DEFAULT '' COMMENT '用户签到日期字符串',
  `clear` tinyint(2) DEFAULT NULL COMMENT '代表下一个要清除的月',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_qd
-- ----------------------------
INSERT INTO `yhyg_qd` VALUES ('2', '22', '2', '1,2', '1');
INSERT INTO `yhyg_qd` VALUES ('4', '26', '1', '1', '1');
INSERT INTO `yhyg_qd` VALUES ('5', '5', '0', null, '1');
INSERT INTO `yhyg_qd` VALUES ('6', '18', '1', '1', '1');
INSERT INTO `yhyg_qd` VALUES ('8', '12', '1', '1', '1');
INSERT INTO `yhyg_qd` VALUES ('10', '9', '1', '1', '1');
INSERT INTO `yhyg_qd` VALUES ('11', '7', '2', '1,2', '1');
INSERT INTO `yhyg_qd` VALUES ('13', '20', '1', '1', '1');
INSERT INTO `yhyg_qd` VALUES ('14', '32', '1', '1', '1');

-- ----------------------------
-- Table structure for `yhyg_site`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_site`;
CREATE TABLE `yhyg_site` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `mid` int(11) unsigned DEFAULT NULL COMMENT '用户',
  `phone` varchar(20) DEFAULT NULL,
  `ps` varchar(255) DEFAULT NULL,
  `qs` varchar(255) DEFAULT NULL,
  `ws` varchar(255) DEFAULT NULL,
  `xyd` varchar(255) DEFAULT NULL,
  `addtime` int(255) DEFAULT NULL,
  `active` tinyint(4) unsigned DEFAULT '0' COMMENT '0默认，不启用地址，1启用地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_site
-- ----------------------------
INSERT INTO `yhyg_site` VALUES ('1', '吴保伟', '5', '15738770000', '河南省', '开封市', '龙亭区', '冬青街26号', '1478769415', '0');
INSERT INTO `yhyg_site` VALUES ('4', '高树刚', '26', '18736248989', '河南省', '信阳市', '市、县级市、县', '卢集乡100号', '1478845365', '1');
INSERT INTO `yhyg_site` VALUES ('6', 'wu', '28', '13465239871', '内蒙古', '乌海市', '乌达区', '####XXGFV', '1478846058', '0');
INSERT INTO `yhyg_site` VALUES ('7', 'wzywzy', '22', '13783038090', '河南省', '鹤壁市', '淇县', '311113', '1478846380', '0');
INSERT INTO `yhyg_site` VALUES ('15', '刘旗', '6', '18912341234', '西藏自治区', '林芝地区', '墨脱县 ', '￥￥￥￥DFD', '1479203999', '0');
INSERT INTO `yhyg_site` VALUES ('17', '小华', '9', '13212341234', '重庆市', '酉阳土家族苗族自治县', null, '科学大道100号', '1479365155', '0');
INSERT INTO `yhyg_site` VALUES ('18', '小明', '9', '13269586958', '海南省', '五指山市', null, '随便填写的', '1479365307', '0');
INSERT INTO `yhyg_site` VALUES ('19', '姚坤', '6', '15739853895', '云南省', '昆明市', '安宁市 ', '###在战争中v', '1479197796', '0');
INSERT INTO `yhyg_site` VALUES ('20', '刘旗', '9', '13200007890', '河北省', '石家庄市', '桥东区', '大大大大道', '1479366655', '0');
INSERT INTO `yhyg_site` VALUES ('21', '高树刚', '11', '18736242375', '河南省', '信阳市', '淮滨县', '卢集乡345号', '1479469640', '0');
INSERT INTO `yhyg_site` VALUES ('23', 'fcxjhb', '22', '15732143214', '河南省', '焦作市', '中站区', 'dghxfcgvhjkl;', '1479886578', '0');
INSERT INTO `yhyg_site` VALUES ('24', 'sdjg', '13', '13683030059', '河南省', '开封市', '顺河回族区', 'fhdshfdshf', '1479957967', '0');
INSERT INTO `yhyg_site` VALUES ('26', 'admin', '7', '15738770000', '西藏自治区', '那曲地区', '拉萨市 ', 'kddknkml', '1480504261', '0');
INSERT INTO `yhyg_site` VALUES ('28', 'admin1', '18', '15738770000', '河南省', '焦作市', '孟州市', '是地方vf的v', '1480067925', '0');
INSERT INTO `yhyg_site` VALUES ('29', '222', '31', '15093113666', '上海市', '上海市', '闵行区', '2222222222222', '1480126206', '0');
INSERT INTO `yhyg_site` VALUES ('30', 'root', '7', '15748771111', '河南省', '开封市', '龙亭区', 'ADSFFG', '1480660735', '1');
INSERT INTO `yhyg_site` VALUES ('31', 'VFCFBCB', '7', '13546781111', '北京市', '北京市', '西城区', 'FDGFDGFFDSH', '1480660767', '0');

-- ----------------------------
-- Table structure for `yhyg_site_copy`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_site_copy`;
CREATE TABLE `yhyg_site_copy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `mid` int(11) unsigned DEFAULT NULL COMMENT '用户',
  `phone` varchar(20) DEFAULT NULL,
  `ps` varchar(255) DEFAULT NULL,
  `qs` varchar(255) DEFAULT NULL,
  `ws` varchar(255) DEFAULT NULL,
  `xyd` varchar(255) DEFAULT NULL,
  `addtime` int(255) DEFAULT NULL,
  `active` tinyint(4) unsigned DEFAULT '0' COMMENT '0默认，不启用地址，1启用地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_site_copy
-- ----------------------------
INSERT INTO `yhyg_site_copy` VALUES ('1', '吴保伟', '5', '15738770000', '河南省', '开封市', '龙亭区', '冬青街26号', '1478769415', '1');
INSERT INTO `yhyg_site_copy` VALUES ('2', 'yhshop', '7', '13512345678', '河南省', '洛阳市', '西工区', ' sxbnnm,.', '1478776513', '1');
INSERT INTO `yhyg_site_copy` VALUES ('4', '高树刚', '26', '18736248989', '河南省', '信阳市', '市、县级市、县', '卢集乡100号', '1478845365', '1');
INSERT INTO `yhyg_site_copy` VALUES ('6', 'wu', '28', '13465239871', '内蒙古', '乌海市', '乌达区', '####XXGFV', '1478846058', '1');
INSERT INTO `yhyg_site_copy` VALUES ('7', 'wzywzy', '22', '13783038090', '河南省', '鹤壁市', '淇县', '311113', '1478846380', '1');
INSERT INTO `yhyg_site_copy` VALUES ('8', '小明', '6', '15738776352', '广东省', '梅州市', '大埔县 ', '四川大道100号', '1479120326', '1');
INSERT INTO `yhyg_site_copy` VALUES ('9', '吴保伟', '6', '13265236523', '四川省', '攀枝花市', '仁和区 ', '大河路20号', '1479172466', '1');
INSERT INTO `yhyg_site_copy` VALUES ('10', '吴保伟', '7', '15732103210', '山西省', '大同市', '新荣区', '京广路30号', '1479189782', '0');
INSERT INTO `yhyg_site_copy` VALUES ('12', 'admin1', '6', '13263216321', '广东省', '深圳市', '南山区', '的V刹V大', '1479197919', '0');
INSERT INTO `yhyg_site_copy` VALUES ('13', '将对方虑', '6', '13212341234', '贵州省', '贵阳市', '修文县 ', '地方vgbdfb', '1479199254', '1');
INSERT INTO `yhyg_site_copy` VALUES ('14', '姚坤', '6', '15739853895', '广东省', '深圳市', '南山区', '###在战争中v', '1479200976', '0');
INSERT INTO `yhyg_site_copy` VALUES ('15', '才得知', '6', '13212341234', '重庆市', '石柱土家族自治县', null, '地方V大的', '1479201093', '1');
INSERT INTO `yhyg_site_copy` VALUES ('16', '吴伟', '7', '13565236523', '河南省', '洛阳市', '涧西区', '科学大道100号', '1479276048', '0');
INSERT INTO `yhyg_site_copy` VALUES ('17', '小华', '9', '13212341234', '重庆市', '酉阳土家族苗族自治县', null, '科学大道100号', '1479365155', '0');
INSERT INTO `yhyg_site_copy` VALUES ('18', '小明', '9', '13269586958', '海南省', '五指山市', null, '随便填写的', '1479365307', '0');
INSERT INTO `yhyg_site_copy` VALUES ('19', '姚坤', '6', '15739853895', '云南省', '昆明市', '安宁市 ', '###在战争中v', '1479197796', '0');
INSERT INTO `yhyg_site_copy` VALUES ('20', '刘旗', '9', '13200007890', '河北省', '石家庄市', '桥东区', '大大大大道', '1479366655', '0');
INSERT INTO `yhyg_site_copy` VALUES ('21', '高树刚', '11', '18736242375', '河南省', '信阳市', '淮滨县', '卢集乡345号', '1479469640', '1');
INSERT INTO `yhyg_site_copy` VALUES ('22', '131', '22', '13783038090', '河南省', '郑州市', '中原区', '242342', '1479886561', '0');
INSERT INTO `yhyg_site_copy` VALUES ('23', 'fcxjhb', '22', '15732143214', '河南省', '焦作市', '中站区', 'dghxfcgvhjkl;', '1479886578', '0');
INSERT INTO `yhyg_site_copy` VALUES ('24', 'sdjg', '13', '13683030059', '河南省', '开封市', '顺河回族区', 'fhdshfdshf', '1479957967', '1');
INSERT INTO `yhyg_site_copy` VALUES ('25', '小高', '26', '15638600064', '河南省', '郑州市', '金水区', '地方玩儿人员太突', '1479959444', '0');
INSERT INTO `yhyg_site_copy` VALUES ('26', 'admin', '7', '15737870000', '吉林省', '通化市', '梅河口市', '的风格发帖公布', '1480054504', '0');
INSERT INTO `yhyg_site_copy` VALUES ('27', 'admin', '7', '15738770000', '福建省', '莆田市', '涵江区', '得分vfvdfv', '1480064119', '0');
INSERT INTO `yhyg_site_copy` VALUES ('28', '12333', '7', '15738770000', '河南省', '开封市', '龙亭区', '1234565', '1480064164', '0');
INSERT INTO `yhyg_site_copy` VALUES ('29', 'admin1', '18', '15738770000', '河南省', '焦作市', '孟州市', '是地方vf的v', '1480067925', '1');
INSERT INTO `yhyg_site_copy` VALUES ('30', '222', '31', '15093113666', '上海市', '上海市', '闵行区', '2222222222222', '1480126206', '1');
INSERT INTO `yhyg_site_copy` VALUES ('31', 'root', '7', '15748771111', '河南省', '开封市', '龙亭区', 'ADSFFG', '1480660735', '0');
INSERT INTO `yhyg_site_copy` VALUES ('32', 'VFCFBCB', '7', '13546781111', '北京市', '北京市', '西城区', 'FDGFDGFFDSH', '1480660767', '0');

-- ----------------------------
-- Table structure for `yhyg_zuji`
-- ----------------------------
DROP TABLE IF EXISTS `yhyg_zuji`;
CREATE TABLE `yhyg_zuji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `addtime` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yhyg_zuji
-- ----------------------------
INSERT INTO `yhyg_zuji` VALUES ('1', '3', '3', '1477885630');
INSERT INTO `yhyg_zuji` VALUES ('2', '3', '2', '1477916754');
INSERT INTO `yhyg_zuji` VALUES ('3', '3', '5', '1477885125');
INSERT INTO `yhyg_zuji` VALUES ('4', '3', '9', '1477886060');
INSERT INTO `yhyg_zuji` VALUES ('5', '3', '10', '1477915925');
INSERT INTO `yhyg_zuji` VALUES ('6', '3', '8', '1477886034');
INSERT INTO `yhyg_zuji` VALUES ('7', '3', '4', '1477914021');
INSERT INTO `yhyg_zuji` VALUES ('8', '3', '6', '1477899737');
INSERT INTO `yhyg_zuji` VALUES ('9', '15', '3', '1477883205');
INSERT INTO `yhyg_zuji` VALUES ('10', '15', '4', '1477903606');
INSERT INTO `yhyg_zuji` VALUES ('14', '15', '2', '1477879735');
INSERT INTO `yhyg_zuji` VALUES ('15', '15', '5', '1477890837');
INSERT INTO `yhyg_zuji` VALUES ('16', '3', '7', '1477915081');
INSERT INTO `yhyg_zuji` VALUES ('17', '15', '10', '1477890844');
INSERT INTO `yhyg_zuji` VALUES ('18', '15', '7', '1477890864');
INSERT INTO `yhyg_zuji` VALUES ('19', '15', '8', '1477890867');
INSERT INTO `yhyg_zuji` VALUES ('20', '3', '1', '1477893560');
INSERT INTO `yhyg_zuji` VALUES ('21', '3', '12', '1477916866');
INSERT INTO `yhyg_zuji` VALUES ('22', '3', '13', '1477915196');
INSERT INTO `yhyg_zuji` VALUES ('23', '15', '6', '1477900545');
INSERT INTO `yhyg_zuji` VALUES ('24', '7', '3', '1479873635');
INSERT INTO `yhyg_zuji` VALUES ('26', '10', '4', '1477916141');
INSERT INTO `yhyg_zuji` VALUES ('28', '10', '12', '1477918423');
INSERT INTO `yhyg_zuji` VALUES ('29', '5', '3', '1478764054');
INSERT INTO `yhyg_zuji` VALUES ('30', '5', '9', '1478766729');
INSERT INTO `yhyg_zuji` VALUES ('33', '7', '13', '1480056187');
INSERT INTO `yhyg_zuji` VALUES ('36', '7', '4', '1480661004');
INSERT INTO `yhyg_zuji` VALUES ('37', '7', '7', '1479873560');
INSERT INTO `yhyg_zuji` VALUES ('38', '7', '10', '1479885404');
INSERT INTO `yhyg_zuji` VALUES ('39', '7', '6', '1478826670');
INSERT INTO `yhyg_zuji` VALUES ('41', '0', '4', '1478004191');
INSERT INTO `yhyg_zuji` VALUES ('42', '0', '10', '1478003746');
INSERT INTO `yhyg_zuji` VALUES ('43', '0', '3', '1478003775');
INSERT INTO `yhyg_zuji` VALUES ('44', '9', '18', '1479437186');
INSERT INTO `yhyg_zuji` VALUES ('45', '9', '17', '1478053050');
INSERT INTO `yhyg_zuji` VALUES ('46', '9', '14', '1478066567');
INSERT INTO `yhyg_zuji` VALUES ('47', '5', '12', '1478775810');
INSERT INTO `yhyg_zuji` VALUES ('48', '5', '1', '1478762343');
INSERT INTO `yhyg_zuji` VALUES ('49', '7', '18', '1480056197');
INSERT INTO `yhyg_zuji` VALUES ('51', '5', '19', '1478313401');
INSERT INTO `yhyg_zuji` VALUES ('52', '5', '10', '1479434951');
INSERT INTO `yhyg_zuji` VALUES ('53', '7', '5', '1478758586');
INSERT INTO `yhyg_zuji` VALUES ('54', '7', '8', '1478768481');
INSERT INTO `yhyg_zuji` VALUES ('55', '5', '24', '1478159809');
INSERT INTO `yhyg_zuji` VALUES ('59', '7', '19', '1480054236');
INSERT INTO `yhyg_zuji` VALUES ('60', '5', '31', '1478164514');
INSERT INTO `yhyg_zuji` VALUES ('62', '5', '32', '1478164520');
INSERT INTO `yhyg_zuji` VALUES ('64', '22', '13', '1479439627');
INSERT INTO `yhyg_zuji` VALUES ('65', '7', '2', '1480054148');
INSERT INTO `yhyg_zuji` VALUES ('66', '7', '27', '1478826665');
INSERT INTO `yhyg_zuji` VALUES ('67', '7', '17', '1480053875');
INSERT INTO `yhyg_zuji` VALUES ('68', '7', '24', '1479437138');
INSERT INTO `yhyg_zuji` VALUES ('70', '22', '19', '1480417193');
INSERT INTO `yhyg_zuji` VALUES ('71', '7', '15', '1480505559');
INSERT INTO `yhyg_zuji` VALUES ('75', '7', '20', '1478758543');
INSERT INTO `yhyg_zuji` VALUES ('79', '22', '27', '1478769327');
INSERT INTO `yhyg_zuji` VALUES ('80', '26', '5', '1479303084');
INSERT INTO `yhyg_zuji` VALUES ('82', '26', '18', '1479452673');
INSERT INTO `yhyg_zuji` VALUES ('83', '26', '13', '1480059930');
INSERT INTO `yhyg_zuji` VALUES ('85', '22', '3', '1480048340');
INSERT INTO `yhyg_zuji` VALUES ('86', '22', '10', '1478519623');
INSERT INTO `yhyg_zuji` VALUES ('87', '22', '23', '1478258537');
INSERT INTO `yhyg_zuji` VALUES ('88', '22', '9', '1479215909');
INSERT INTO `yhyg_zuji` VALUES ('89', '22', '24', '1478258553');
INSERT INTO `yhyg_zuji` VALUES ('90', '22', '17', '1479440969');
INSERT INTO `yhyg_zuji` VALUES ('91', '22', '15', '1478258572');
INSERT INTO `yhyg_zuji` VALUES ('92', '26', '24', '1479436186');
INSERT INTO `yhyg_zuji` VALUES ('93', '26', '10', '1479870185');
INSERT INTO `yhyg_zuji` VALUES ('94', '26', '20', '1478773838');
INSERT INTO `yhyg_zuji` VALUES ('95', '26', '17', '1479441237');
INSERT INTO `yhyg_zuji` VALUES ('96', '26', '15', '1480316877');
INSERT INTO `yhyg_zuji` VALUES ('97', '26', '22', '1479386422');
INSERT INTO `yhyg_zuji` VALUES ('98', '26', '25', '1480578489');
INSERT INTO `yhyg_zuji` VALUES ('100', '26', '3', '1479870194');
INSERT INTO `yhyg_zuji` VALUES ('101', '26', '21', '1478517930');
INSERT INTO `yhyg_zuji` VALUES ('102', '26', '6', '1479267627');
INSERT INTO `yhyg_zuji` VALUES ('103', '26', '12', '1479790748');
INSERT INTO `yhyg_zuji` VALUES ('104', '7', '14', '1479276142');
INSERT INTO `yhyg_zuji` VALUES ('105', '22', '14', '1478417117');
INSERT INTO `yhyg_zuji` VALUES ('106', '7', '22', '1478424670');
INSERT INTO `yhyg_zuji` VALUES ('107', '7', '9', '1480064814');
INSERT INTO `yhyg_zuji` VALUES ('108', '7', '28', '1480595552');
INSERT INTO `yhyg_zuji` VALUES ('109', '7', '21', '1478740308');
INSERT INTO `yhyg_zuji` VALUES ('110', '7', '16', '1478758568');
INSERT INTO `yhyg_zuji` VALUES ('111', '7', '23', '1479276019');
INSERT INTO `yhyg_zuji` VALUES ('112', '26', '27', '1479368834');
INSERT INTO `yhyg_zuji` VALUES ('113', '26', '28', '1479458055');
INSERT INTO `yhyg_zuji` VALUES ('114', '26', '14', '1479969300');
INSERT INTO `yhyg_zuji` VALUES ('117', '22', '7', '1479385495');
INSERT INTO `yhyg_zuji` VALUES ('118', '22', '1', '1478679250');
INSERT INTO `yhyg_zuji` VALUES ('119', '22', '5', '1479802444');
INSERT INTO `yhyg_zuji` VALUES ('120', '22', '21', '1478519417');
INSERT INTO `yhyg_zuji` VALUES ('124', '22', '12', '1479438532');
INSERT INTO `yhyg_zuji` VALUES ('125', '26', '4', '1480063279');
INSERT INTO `yhyg_zuji` VALUES ('126', '5', '20', '1478679474');
INSERT INTO `yhyg_zuji` VALUES ('127', '22', '18', '1479438588');
INSERT INTO `yhyg_zuji` VALUES ('128', '9', '4', '1478685532');
INSERT INTO `yhyg_zuji` VALUES ('129', '5', '28', '1478745309');
INSERT INTO `yhyg_zuji` VALUES ('130', '5', '6', '1478757602');
INSERT INTO `yhyg_zuji` VALUES ('131', '26', '2', '1480572805');
INSERT INTO `yhyg_zuji` VALUES ('132', '5', '2', '1479437447');
INSERT INTO `yhyg_zuji` VALUES ('133', '22', '2', '1480062619');
INSERT INTO `yhyg_zuji` VALUES ('134', '26', '1', '1480591414');
INSERT INTO `yhyg_zuji` VALUES ('135', '5', '27', '1478767543');
INSERT INTO `yhyg_zuji` VALUES ('136', '5', '11', '1478758073');
INSERT INTO `yhyg_zuji` VALUES ('137', '5', '5', '1478758404');
INSERT INTO `yhyg_zuji` VALUES ('138', '7', '1', '1480056154');
INSERT INTO `yhyg_zuji` VALUES ('139', '5', '15', '1478758605');
INSERT INTO `yhyg_zuji` VALUES ('140', '5', '8', '1478762339');
INSERT INTO `yhyg_zuji` VALUES ('141', '22', '28', '1479450057');
INSERT INTO `yhyg_zuji` VALUES ('142', '5', '4', '1478770771');
INSERT INTO `yhyg_zuji` VALUES ('144', '22', '35', '1478774278');
INSERT INTO `yhyg_zuji` VALUES ('145', '22', '40', '1479437999');
INSERT INTO `yhyg_zuji` VALUES ('146', '26', '51', '1480582086');
INSERT INTO `yhyg_zuji` VALUES ('147', '7', '52', '1480055711');
INSERT INTO `yhyg_zuji` VALUES ('148', '22', '51', '1480579175');
INSERT INTO `yhyg_zuji` VALUES ('149', '26', '49', '1480591377');
INSERT INTO `yhyg_zuji` VALUES ('150', '26', '47', '1480578107');
INSERT INTO `yhyg_zuji` VALUES ('151', '13', '28', '1478843502');
INSERT INTO `yhyg_zuji` VALUES ('152', '22', '44', '1479440614');
INSERT INTO `yhyg_zuji` VALUES ('153', '26', '36', '1480578500');
INSERT INTO `yhyg_zuji` VALUES ('154', '22', '36', '1478844559');
INSERT INTO `yhyg_zuji` VALUES ('155', '28', '49', '1478845501');
INSERT INTO `yhyg_zuji` VALUES ('156', '26', '44', '1480316884');
INSERT INTO `yhyg_zuji` VALUES ('157', '28', '43', '1478845314');
INSERT INTO `yhyg_zuji` VALUES ('158', '28', '48', '1478847645');
INSERT INTO `yhyg_zuji` VALUES ('159', '26', '48', '1480315746');
INSERT INTO `yhyg_zuji` VALUES ('160', '26', '41', '1479471966');
INSERT INTO `yhyg_zuji` VALUES ('162', '28', '42', '1478845521');
INSERT INTO `yhyg_zuji` VALUES ('163', '28', '41', '1478846633');
INSERT INTO `yhyg_zuji` VALUES ('165', '28', '14', '1478846651');
INSERT INTO `yhyg_zuji` VALUES ('166', '26', '37', '1480579049');
INSERT INTO `yhyg_zuji` VALUES ('167', '5', '40', '1478848346');
INSERT INTO `yhyg_zuji` VALUES ('168', '22', '52', '1480585988');
INSERT INTO `yhyg_zuji` VALUES ('169', '7', '45', '1479283843');
INSERT INTO `yhyg_zuji` VALUES ('171', '7', '49', '1479370215');
INSERT INTO `yhyg_zuji` VALUES ('172', '7', '51', '1480065712');
INSERT INTO `yhyg_zuji` VALUES ('173', '7', '48', '1480661088');
INSERT INTO `yhyg_zuji` VALUES ('174', '7', '40', '1479284184');
INSERT INTO `yhyg_zuji` VALUES ('175', '7', '47', '1480054458');
INSERT INTO `yhyg_zuji` VALUES ('177', '2', '48', '1479207167');
INSERT INTO `yhyg_zuji` VALUES ('178', '7', '12', '1480064869');
INSERT INTO `yhyg_zuji` VALUES ('179', '26', '7', '1479381191');
INSERT INTO `yhyg_zuji` VALUES ('181', '26', '43', '1480591394');
INSERT INTO `yhyg_zuji` VALUES ('183', '26', '19', '1479364456');
INSERT INTO `yhyg_zuji` VALUES ('184', '26', '9', '1479350359');
INSERT INTO `yhyg_zuji` VALUES ('185', '26', '52', '1480315677');
INSERT INTO `yhyg_zuji` VALUES ('186', '9', '48', '1479372740');
INSERT INTO `yhyg_zuji` VALUES ('187', '26', '50', '1480315841');
INSERT INTO `yhyg_zuji` VALUES ('188', '22', '22', '1479468680');
INSERT INTO `yhyg_zuji` VALUES ('189', '9', '50', '1479354546');
INSERT INTO `yhyg_zuji` VALUES ('190', '9', '25', '1479439536');
INSERT INTO `yhyg_zuji` VALUES ('191', '26', '29', '1480578398');
INSERT INTO `yhyg_zuji` VALUES ('192', '26', '45', '1479793425');
INSERT INTO `yhyg_zuji` VALUES ('193', '7', '42', '1480059937');
INSERT INTO `yhyg_zuji` VALUES ('194', '9', '41', '1479372937');
INSERT INTO `yhyg_zuji` VALUES ('195', '9', '22', '1479437178');
INSERT INTO `yhyg_zuji` VALUES ('196', '9', '44', '1479434605');
INSERT INTO `yhyg_zuji` VALUES ('197', '26', '40', '1479959939');
INSERT INTO `yhyg_zuji` VALUES ('198', '18', '22', '1479373271');
INSERT INTO `yhyg_zuji` VALUES ('199', '22', '41', '1479382650');
INSERT INTO `yhyg_zuji` VALUES ('200', '18', '48', '1479384445');
INSERT INTO `yhyg_zuji` VALUES ('201', '26', '23', '1480315663');
INSERT INTO `yhyg_zuji` VALUES ('202', '26', '46', '1479432500');
INSERT INTO `yhyg_zuji` VALUES ('203', '5', '50', '1479434742');
INSERT INTO `yhyg_zuji` VALUES ('204', '9', '28', '1479434728');
INSERT INTO `yhyg_zuji` VALUES ('205', '5', '52', '1479436065');
INSERT INTO `yhyg_zuji` VALUES ('206', '9', '9', '1479434756');
INSERT INTO `yhyg_zuji` VALUES ('207', '9', '43', '1479437163');
INSERT INTO `yhyg_zuji` VALUES ('208', '22', '47', '1479437467');
INSERT INTO `yhyg_zuji` VALUES ('209', '22', '25', '1479437479');
INSERT INTO `yhyg_zuji` VALUES ('210', '22', '43', '1479437602');
INSERT INTO `yhyg_zuji` VALUES ('211', '22', '45', '1479468929');
INSERT INTO `yhyg_zuji` VALUES ('212', '26', '16', '1479790560');
INSERT INTO `yhyg_zuji` VALUES ('213', '11', '52', '1479468468');
INSERT INTO `yhyg_zuji` VALUES ('214', '11', '48', '1479467484');
INSERT INTO `yhyg_zuji` VALUES ('215', '11', '37', '1479468973');
INSERT INTO `yhyg_zuji` VALUES ('216', '11', '50', '1479469089');
INSERT INTO `yhyg_zuji` VALUES ('217', '11', '39', '1479468438');
INSERT INTO `yhyg_zuji` VALUES ('218', '11', '18', '1479468476');
INSERT INTO `yhyg_zuji` VALUES ('219', '11', '15', '1479468569');
INSERT INTO `yhyg_zuji` VALUES ('220', '11', '13', '1479469874');
INSERT INTO `yhyg_zuji` VALUES ('221', '11', '8', '1479469033');
INSERT INTO `yhyg_zuji` VALUES ('222', '11', '49', '1479470552');
INSERT INTO `yhyg_zuji` VALUES ('223', '11', '51', '1479725760');
INSERT INTO `yhyg_zuji` VALUES ('224', '22', '29', '1480658937');
INSERT INTO `yhyg_zuji` VALUES ('225', '26', '0', '1479797423');
INSERT INTO `yhyg_zuji` VALUES ('226', '7', '0', '1480056708');
INSERT INTO `yhyg_zuji` VALUES ('227', '19', '7', '1479873709');
INSERT INTO `yhyg_zuji` VALUES ('228', '19', '19', '1479873762');
INSERT INTO `yhyg_zuji` VALUES ('229', '19', '3', '1479873781');
INSERT INTO `yhyg_zuji` VALUES ('230', '19', '10', '1479885428');
INSERT INTO `yhyg_zuji` VALUES ('231', '7', '44', '1480504270');
INSERT INTO `yhyg_zuji` VALUES ('233', '13', '12', '1479957915');
INSERT INTO `yhyg_zuji` VALUES ('234', '13', '17', '1479957994');
INSERT INTO `yhyg_zuji` VALUES ('235', '13', '45', '1479958610');
INSERT INTO `yhyg_zuji` VALUES ('236', '29', '7', '1480591702');
INSERT INTO `yhyg_zuji` VALUES ('237', '29', '3', '1480591726');
INSERT INTO `yhyg_zuji` VALUES ('238', '29', '45', '1480049665');
INSERT INTO `yhyg_zuji` VALUES ('239', '29', '2', '1480660047');
INSERT INTO `yhyg_zuji` VALUES ('240', '29', '32', '1480050165');
INSERT INTO `yhyg_zuji` VALUES ('241', '29', '16', '1480573009');
INSERT INTO `yhyg_zuji` VALUES ('242', '29', '5', '1480591735');
INSERT INTO `yhyg_zuji` VALUES ('243', '29', '51', '1480595215');
INSERT INTO `yhyg_zuji` VALUES ('244', '29', '18', '1480315432');
INSERT INTO `yhyg_zuji` VALUES ('245', '29', '1', '1480050171');
INSERT INTO `yhyg_zuji` VALUES ('246', '29', '20', '1480050379');
INSERT INTO `yhyg_zuji` VALUES ('247', '29', '0', '1480056914');
INSERT INTO `yhyg_zuji` VALUES ('248', '22', '34', '1480062752');
INSERT INTO `yhyg_zuji` VALUES ('249', '29', '4', '1480315457');
INSERT INTO `yhyg_zuji` VALUES ('250', '19', '50', '1480067959');
INSERT INTO `yhyg_zuji` VALUES ('251', '31', '48', '1480126159');
INSERT INTO `yhyg_zuji` VALUES ('252', '31', '49', '1480126166');
INSERT INTO `yhyg_zuji` VALUES ('253', '31', '51', '1480126175');
INSERT INTO `yhyg_zuji` VALUES ('254', '31', '22', '1480126414');
INSERT INTO `yhyg_zuji` VALUES ('255', '31', '42', '1480126605');
INSERT INTO `yhyg_zuji` VALUES ('256', '29', '12', '1480299981');
INSERT INTO `yhyg_zuji` VALUES ('257', '29', '44', '1480591647');
INSERT INTO `yhyg_zuji` VALUES ('258', '13', '44', '1480316132');
INSERT INTO `yhyg_zuji` VALUES ('259', '13', '52', '1480316337');
INSERT INTO `yhyg_zuji` VALUES ('260', '13', '32', '1480572904');
INSERT INTO `yhyg_zuji` VALUES ('261', '29', '41', '1480573052');
INSERT INTO `yhyg_zuji` VALUES ('263', '18', '50', '1480589829');
INSERT INTO `yhyg_zuji` VALUES ('264', '29', '40', '1480591712');
INSERT INTO `yhyg_zuji` VALUES ('265', '34', '3', '1480594895');
INSERT INTO `yhyg_zuji` VALUES ('266', '34', '4', '1480594988');
INSERT INTO `yhyg_zuji` VALUES ('267', '34', '2', '1480595030');
INSERT INTO `yhyg_zuji` VALUES ('268', '35', '4', '1480595093');
INSERT INTO `yhyg_zuji` VALUES ('271', '22', '16', '1480659123');
INSERT INTO `yhyg_zuji` VALUES ('272', '29', '19', '1480660335');
