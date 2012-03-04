/*
Navicat MySQL Data Transfer

Source Server         : local (WAMP)
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : qubit

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-03-03 21:03:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `frags`
-- ----------------------------
DROP TABLE IF EXISTS `frags`;
CREATE TABLE `frags` (
`id`  int(11) NOT NULL ,
`game_id`  int(11) NOT NULL ,
`fragger`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fragged`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`time`  varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`type`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `games`
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
`id`  int(11) NOT NULL ,
`parse_time`  int(10) NOT NULL ,
`hostname`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fraglimit`  int(11) NOT NULL ,
`timelimit`  int(11) NOT NULL ,
`mapname`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`version`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`gametype`  int(11) NOT NULL ,
`gamename`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
`id`  int(11) NOT NULL ,
`game_id`  int(11) NOT NULL ,
`player_id`  int(11) NOT NULL ,
`item`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`time`  varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `players`
-- ----------------------------
DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
`id`  int(11) NOT NULL ,
`game_id`  int(11) NOT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`model`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`is_bot`  tinyint(1) NOT NULL ,
`player_id`  int(11) NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `rankings`
-- ----------------------------
DROP TABLE IF EXISTS `rankings`;
CREATE TABLE `rankings` (
`id`  int(11) NOT NULL ,
`player`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`ranking`  float NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- View structure for `games_by_player`
-- ----------------------------
DROP VIEW IF EXISTS `games_by_player`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `games_by_player` AS select `games`.`id` AS `id`,`games`.`parse_time` AS `parse_time`,`games`.`hostname` AS `hostname`,`games`.`fraglimit` AS `fraglimit`,`games`.`timelimit` AS `timelimit`,`games`.`mapname` AS `mapname`,`games`.`version` AS `version`,`games`.`gametype` AS `gametype`,`players`.`name` AS `name`,`games`.`gamename` AS `gamename` from (`games` join `players` on((`players`.`game_id` = `games`.`id`))) ;

-- ----------------------------
-- Indexes structure for table rankings
-- ----------------------------
CREATE UNIQUE INDEX `player` ON `rankings`(`player`) USING BTREE ;
