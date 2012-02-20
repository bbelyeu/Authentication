CREATE TABLE `users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL COMMENT 'Users email address',
    `password` char(40) DEFAULT NULL COMMENT 'Sha1 hash of email',
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Default users table for authentication';

insert into users values (1, 'admin@brandrea.com', 'a13967f901f6f2cead8e897fc5514ee9741f74fb', NOW(), NOW());
