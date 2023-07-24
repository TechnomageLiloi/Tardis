CREATE TABLE `I60_logs` (
    `key_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(1000) NOT NULL,
    `data` json NOT NULL,
    PRIMARY KEY (`key_log`)
);

CREATE TABLE `I60_config` (
    `key_config` varchar(100) NOT NULL,
    `param` json NOT NULL,
    PRIMARY KEY (`key_config`)
);

CREATE TABLE `I60_diary` (
    `key_day` date NOT NULL,
    `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `program` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `data` json NOT NULL,
    PRIMARY KEY (`key_day`)
);

CREATE TABLE `I60_tickets` (
    `key_ticket` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `link` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `start` timestamp NULL DEFAULT NULL,
    `finish` timestamp NULL DEFAULT NULL,
    `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
    `difficulty` tinyint(3) unsigned NOT NULL DEFAULT '1',
    `program` text COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`key_ticket`)
);