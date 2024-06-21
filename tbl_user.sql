/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_inhouse_vehicle

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 20/06/2024 14:22:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `userlevel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` time NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'eeqwer', 'qerq', 'qerqwer', '$2y$10$.HPsUhAJJb/KkagUWfbs.eqbvO0wg1lGZ4UG12Ocisb', 'tech assoc', 0, '00:00:00');
INSERT INTO `tbl_user` VALUES (2, 'eeqwer', 'qerq', 'qerqwer11', '$2y$10$J4svuFcXZpb731LoJb4WF.fPOZlO7LlYRaoqhKwubvP', 'tech assoc', 0, '00:00:00');
INSERT INTO `tbl_user` VALUES (3, 'mahrex', 'bunagan', 'lerio', '$2y$10$bp7zxmrppBHPwpTnMkEOfuO93USfM9wMPSDIK182zQ.', 'tech assoc', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (10, 'admin', 'admin', 'admin', '$2y$10$FBwDsl7q/8XU7mv6buRLFOr9A9cYWUhOWwZF1vWsUPaSci9hHtL/W', 'admin', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (11, '1234', '1234', '1234', '$2y$10$4FEkUlIyhXrAFbLyq24FeOj/lp.ERZ94xyxznFXAAS.eexKmxkzIW', 'tech assoc', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (12, '1111', '1111', '1111', '$2y$10$ResD1exdsoiMLFgtYAeoiurVSUdSQuqhIlkI1ELbZRVCTKT.3qIrO', 'admin', 0, '00:00:00');
INSERT INTO `tbl_user` VALUES (13, '5555', '5555', '5555', '$2y$10$MDEhpVWcQPeQGoHwj/Kjs.LyyEfwukz39hpCcDBkjr2hL9aN85a/W', 'admin', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (14, 'ethan', 'fontanilla', 'fontanilla', '$2y$10$74wMdGbyWPEh2WHxb.v8SOQN84Bdc5V5FALfq5K1SZlGWXoypAQKq', 'admin', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (15, 'a', 'a', 'a', '$2y$10$Xd9VcesSKEs.XkVq69EQV.Swc5RniOzFs5XVbi3VDi6JovppJGaP.', 'admin', 0, '00:00:00');
INSERT INTO `tbl_user` VALUES (16, 'b', 'b', 'a', '$2y$10$ia5/0YHdfvY1uUg.Q9wrA.xDiogH/nfqbrpks21nRYykK.qvH45Oe', 'admin', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (17, 'c', 'c', 'c', '$2y$10$yXGwEXvnk6U5dM0dNm0Pleg369eQvJowjpiPi/pF.xbjSc5XVqmeO', 'admin', 0, '00:00:00');
INSERT INTO `tbl_user` VALUES (18, '', '', '', '$2y$10$2y5HtuV8wVPKpXjgJkw71eZagSEOQLsG3E/xDyTh4975opykeOm7u', 'admin', 1, '00:00:00');
INSERT INTO `tbl_user` VALUES (19, 'e', '', '', '$2y$10$rY9WuXMZSxyY/.7XbqIZWuJBXus53F7.FyYf9EORKiOnOdlmDmXZy', 'admin', 1, '00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
