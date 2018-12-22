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
