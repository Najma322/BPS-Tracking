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

 Date: 13/01/2023 13:37:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kabupaten
-- ----------------------------
DROP TABLE IF EXISTS `kabupaten`;
CREATE TABLE `kabupaten`  (
  `id_provinsi_fk` int NOT NULL,
  `id_kabupaten` int NOT NULL,
  `nama_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kabupaten`) USING BTREE,
  INDEX `kabupaten_id_provinsi_fk_foreign`(`id_provinsi_fk` ASC) USING BTREE,
  CONSTRAINT `kabupaten_id_provinsi_fk_foreign` FOREIGN KEY (`id_provinsi_fk`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kabupaten
-- ----------------------------
INSERT INTO `kabupaten` VALUES (35, 14, 'Pasuruan', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
