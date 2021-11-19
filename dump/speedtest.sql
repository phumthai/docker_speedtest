CREATE TABLE IF NOT EXISTS `speedtest_users` (
	`id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ispinfo` text,
    `extra` text,
    `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ip` text NOT NULL,
    `ua` text NOT NULL,
    `lang` text NOT NULL,
    `dl` text,
    `ul` text,
    `ping` text,
    `jitter` text,
    `log` longtext,
    `userid` text NULL,
    `subnet` text NULL,
    `apname` text
)
ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `user_ap` (
	`id` text,
    `user` text,
    `apname` text
)
ENGINE=InnoDB;