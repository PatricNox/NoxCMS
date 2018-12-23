-- DEFAULT ROUTES
INSERT INTO `routes` (`route_name`, `route_path`, `controller`, `public`, `active`) VALUES
('', '/', 'web', 1, 1),
('admin', '/admin', 'acp', 1, 1),
('home', '/', 'web', 1, 1),
('register', '/register', 'web', 1, 1),
('forum', '/forum', 'web', 1, 1);

-- WELCOME POST
INSERT INTO `post_body` (`author_id`, `post_title`, `content`, `public`) VALUES
(1, 'Welcome', 'Welcome to NoxCMS!\n\n to begin, visit /admin', 1),
(1, 'About', 'Did you know that this CMS is made by github.com/PatricNox?', 1),
(1, 'Fun fact', 'There are no third party libraries used so far whatsoever! \n\neven though it surely would\'ve helped alot..', 1);
