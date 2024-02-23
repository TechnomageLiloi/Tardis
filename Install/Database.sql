create table tardis_degrees
(
    key_degree bigint unsigned auto_increment,
    uid varchar(100) not null,
    title varchar(250) null,
    program mediumtext null,
    status tinyint unsigned not null,
    constraint tardis_degrees_pk
        primary key (key_degree)
);

create unique index tardis_degrees_uid_uindex
    on tardis_degrees (uid);

insert into tardis_degrees(uid, title, program, status) values("protos", "Protos", "-", 1);

create table tardis_lessons
(
    key_lesson bigint unsigned auto_increment,
    comment text not null,
    mark tinyint unsigned default 0 not null,
    status tinyint unsigned default 1 not null,
    start date not null,
    data json not null,
    type tinyint unsigned default 1 not null,
    constraint tardis_lessons_pk
        primary key (key_lesson)
);

create table tardis_problems
(
    key_problem bigint unsigned auto_increment,
    key_degree bigint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    summary text not null,
    constraint tardis_problems_pk
        primary key (key_problem),
    constraint tardis_problems_tardis_degrees_key_degree_fk
        foreign key (key_degree) references tardis_degrees (key_degree)
            on update cascade on delete cascade
);

alter table tardis_lessons
    add key_degree bigint unsigned default 1 not null;

alter table tardis_lessons
    add constraint tardis_lessons_tardis_degrees_key_degree_fk
        foreign key (key_degree) references tardis_degrees (key_degree)
            on update cascade on delete cascade;

create table tardis_tickets
(
    key_ticket bigint unsigned auto_increment,
    key_lesson bigint unsigned not null,
    title varchar(250) not null,
    start time not null,
    finish time not null,
    power smallint unsigned default 1 not null,
    constraint tardis_tickets_pk
        primary key (key_ticket),
    constraint tardis_tickets_tardis_lessons_key_lesson_fk
        foreign key (key_lesson) references tardis_lessons (key_lesson)
            on update cascade on delete cascade
);

create table tardis_quests
(
    key_quest bigint unsigned auto_increment,
    title varchar(100) not null,
    summary text not null,
    start timestamp null,
    finish timestamp null,
    status tinyint unsigned default 1 not null,
    constraint tardis_quests_pk
        primary key (key_quest)
);
