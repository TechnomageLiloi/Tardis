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
    `key_day` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `program` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `data` json NOT NULL,
    `status` tinyint unsigned not null default 1,
    `start` timestamp not null,
    `finish` timestamp not null,
    PRIMARY KEY (`key_day`)
);

create table I60_plans
(
    key_plan tinyint unsigned auto_increment,
    title varchar(100) COLLATE utf8mb4_unicode_ci not null,
    program mediumtext COLLATE utf8mb4_unicode_ci not null,
    status tinyint unsigned default 1 not null,
    constraint I60_plans_pk
        primary key (key_plan)
)