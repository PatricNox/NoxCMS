CREATE TABLE `routes` (
    `route_id` int NOT NULL AUTO_INCREMENT,
    `route_name` varchar(255),
    `route_path` varchar(255) NOT NULL,
    `controller` varchar(255) NOT NULL,
    `public` tinyint(3),
    `active` tinyint(3),
    PRIMARY KEY (route_id)
);
