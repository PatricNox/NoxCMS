CREATE TABLE `post_body` (
    `post_id` int AUTO_INCREMENT,
    `author_id` int(10) NOT NULL,
    `post_title` varchar(255),
    `content` varchar(255),
    `public` tinyint(3),
     PRIMARY KEY (`post_id`)
);
