/*
 Navicat Premium Data Transfer

 Source Server         : Mysql Local
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 18/04/2022 22:40:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for orang
-- ----------------------------
DROP TABLE IF EXISTS `orang`;
CREATE TABLE `orang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jeniskelamin` enum('Laki laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `parent` smallint NULL DEFAULT NULL,
  `level` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of orang
-- ----------------------------
INSERT INTO `orang` VALUES (1, 'Budi', 'Laki laki', 0, 1);
INSERT INTO `orang` VALUES (2, 'Dedi', 'Laki laki', 1, 2);
INSERT INTO `orang` VALUES (3, 'Dodi', 'Laki laki', 1, 2);
INSERT INTO `orang` VALUES (4, 'Dede', 'Laki laki', 1, 2);
INSERT INTO `orang` VALUES (5, 'Dewi', 'Perempuan', 1, 2);
INSERT INTO `orang` VALUES (6, 'Feri', 'Laki laki', 2, 3);
INSERT INTO `orang` VALUES (7, 'Farah', 'Perempuan', 2, 3);
INSERT INTO `orang` VALUES (8, 'Gugus', 'Laki laki', 3, 3);
INSERT INTO `orang` VALUES (9, 'Gandi', 'Laki laki', 3, 3);
INSERT INTO `orang` VALUES (10, 'Hani', 'Perempuan', 4, 3);
INSERT INTO `orang` VALUES (11, 'Hana', 'Perempuan', 4, 3);

SET FOREIGN_KEY_CHECKS = 1;
