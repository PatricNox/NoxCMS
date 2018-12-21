CREATE DATABASE IF NOT EXISTS `noxcms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `account` (
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(32) NOT NULL,
    `sha_pass_hash` varchar(40),
    `sessionkey` varchar(80),
    `reg_mail` varchar(255),
    `user_mail` varchar(255),
    `online` tinyint(3),
    PRIMARY KEY (`id`)
);

CREATE TABLE `account_access` (
  `id` int NOT NULL,
  `staffgroup` tinyint(3) NOT NULL,
   PRIMARY KEY (`id`)
);

CREATE TABLE `post_body` (
    `post_id` int AUTO_INCREMENT,
    `author_id` int(10) NOT NULL,
    `post_title` varchar(255),
    `content` varchar(255),
    `public` tinyint(3),
     PRIMARY KEY (`post_id`)
);

CREATE TABLE `routes` (
    `route_id` int NOT NULL AUTO_INCREMENT,
    `route_name` varchar(255),
    `route_path` varchar(255) NOT NULL,
    `controller` varchar(255) NOT NULL,
    `public` tinyint(3),
    `active` tinyint(3),
    PRIMARY KEY (route_id)
);

CREATE TABLE `version` (
    `version` int NOT NULL,
    `hash` varchar(255) NOT NULL,
    `webname` varchar(255) NOT NULL,
    `stable` tinyint(3) NOT NULL,
    PRIMARY KEY (`version`)
);


