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
    `type` tinyint unsigned not null default 1,
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
);

create table I60_degrees
(
    key_degree bigint unsigned auto_increment,
    uid varchar(100) not null,
    title varchar(250) null,
    program text null,
    status tinyint unsigned not null,
    constraint I60_degrees_pk
        primary key (key_degree)
);

create unique index I60_degrees_uid_uindex
    on I60_degrees (uid);

insert into I60_degrees(uid, title, program, status) values("protos", "Protos", "// content", 1);

create table I60_problems
(
    key_problem bigint unsigned auto_increment,
    key_degree bigint unsigned not null,
    title varchar(250) not null,
    program text not null,
    type tinyint unsigned not null,
    mark tinyint unsigned default 0 not null,
    constraint I60_problems_pk
        primary key (key_problem),
    constraint I60_problems_I60_degrees_key_degree_fk
        foreign key (key_degree) references I60_degrees (key_degree)
            on update cascade on delete cascade
);

create table I60_lessons
(
    key_lesson bigint unsigned auto_increment,
    key_problem bigint unsigned not null,
    comment varchar(250) not null,
    mark tinyint unsigned default 0 not null,
    status tinyint unsigned default 1 not null,
    start timestamp not null,
    finish timestamp not null,
    data json not null,
    constraint I60_lessons_pk
        primary key (key_lesson),
    constraint I60_lessons_I60_problems_key_problem_fk
        foreign key (key_problem) references I60_problems (key_problem)
            on update cascade on delete cascade
)