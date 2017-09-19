/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50527
 Source Host           : localhost
 Source Database       : wishlist

 Target Server Type    : MySQL
 Target Server Version : 50527
 File Encoding         : utf-8

 Date: 09/08/2017 08:10:13 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1'), ('3', '2017_09_06_164537_create_wishes_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Micha', 'Hacka', 'mh@example.com', '$2y$10$edzhKhur6NG1kiyC1BcjTO/IAY3cF96MVp.NhOwLJXMjCWPSyfy7K', null, '2017-09-07 09:19:15', '2017-09-07 09:19:15'), ('2', 'Draneol', 'Yetolla', 'dy@example.com', '$2y$10$R0B4eo0zp3RyT5MbA0Rte.8Rb6fFnIN7FQ5IBwy0dCp3kRt9GwDMO', null, '2017-09-07 09:24:07', '2017-09-07 09:24:07'), ('3', 'Doni', 'Sleertyt', 'ds@example.com', '$2y$10$WuxHHiyyG.IQz48Hvna64uFZi5zRzS8LmQSxQW9aIrKgg0j/VQ0dW', null, '2017-09-07 09:25:09', '2017-09-07 09:25:09'), ('4', 'Abdul', 'ddswd', 'ad@email.com', '$2y$10$MjhDq7ue4p2uFEFZwQPeQuvdNT1U8f2qP5Xn97yEOWtUCi3yIYcyi', null, '2017-09-07 18:38:13', '2017-09-07 18:38:13');
COMMIT;

-- ----------------------------
--  Table structure for `wishes`
-- ----------------------------
DROP TABLE IF EXISTS `wishes`;
CREATE TABLE `wishes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `wish` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `wishes`
-- ----------------------------
BEGIN;
INSERT INTO `wishes` VALUES ('2', '1', 'I wish for an airline company', '2017-09-07 09:35:20', '2017-09-07 09:35:20'), ('3', '2', 'u want tah', '2017-09-07 09:36:01', '2017-09-07 12:40:56'), ('4', '2', 'I wish for a house', '2017-09-07 09:36:46', '2017-09-07 09:36:46'), ('5', '1', 'I wish for a house in Paris, big enough for ... just guess', '2017-09-07 09:37:17', '2017-09-07 09:37:17'), ('6', '3', 'I wish for a house in France, maybe in Pau', '2017-09-07 09:37:53', '2017-09-07 09:37:53'), ('7', '3', 'I wish Italians didn\'t have weird towns like Bra', '2017-09-07 09:38:34', '2017-09-07 09:38:34'), ('9', '1', 'A car,  a house and a horse', '2017-09-07 12:48:09', '2017-09-07 12:48:09');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
