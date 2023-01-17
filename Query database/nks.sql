/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100424 (10.4.24-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : bps_web_tracking

 Target Server Type    : MySQL
 Target Server Version : 100424 (10.4.24-MariaDB)
 File Encoding         : 65001

 Date: 16/01/2023 15:26:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for nks
-- ----------------------------
DROP TABLE IF EXISTS `nks`;
CREATE TABLE `nks`  (
  `kode_nks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_nks`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nks
-- ----------------------------
INSERT INTO `nks` VALUES ('100179', NULL, NULL);
INSERT INTO `nks` VALUES ('100466', NULL, NULL);
INSERT INTO `nks` VALUES ('100736', NULL, NULL);
INSERT INTO `nks` VALUES ('101086', NULL, NULL);
INSERT INTO `nks` VALUES ('101277', NULL, NULL);
INSERT INTO `nks` VALUES ('150084', NULL, NULL);
INSERT INTO `nks` VALUES ('150342', NULL, NULL);
INSERT INTO `nks` VALUES ('150625', NULL, NULL);
INSERT INTO `nks` VALUES ('150896', NULL, NULL);
INSERT INTO `nks` VALUES ('151147', NULL, NULL);
INSERT INTO `nks` VALUES ('151398', NULL, NULL);
INSERT INTO `nks` VALUES ('151648', NULL, NULL);
INSERT INTO `nks` VALUES ('151896', NULL, NULL);
INSERT INTO `nks` VALUES ('152134', NULL, NULL);
INSERT INTO `nks` VALUES ('152371', NULL, NULL);
INSERT INTO `nks` VALUES ('152654', NULL, NULL);
INSERT INTO `nks` VALUES ('152912', NULL, NULL);
INSERT INTO `nks` VALUES ('153200', NULL, NULL);
INSERT INTO `nks` VALUES ('153449', NULL, NULL);
INSERT INTO `nks` VALUES ('153669', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
