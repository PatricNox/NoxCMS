CREATE TABLE `version` (
    `version` int NOT NULL,
    `hash` varchar(255) NOT NULL,
    `webname` varchar(255) NOT NULL,
    `stable` tinyint(3) NOT NULL,
    PRIMARY KEY (`version`)
);
