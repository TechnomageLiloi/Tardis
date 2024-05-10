create table i60_quests
(
    key_quest bigint unsigned auto_increment,
    title varchar(100) not null,
    summary text not null,
    start timestamp null,
    finish timestamp null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned default 1 not null,
    karma smallint signed default 0 not null,
    constraint artifacts_quests_pk
        primary key (key_quest)
);

create table i60_plan
(
    key_plan date not null,
    status tinyint unsigned default 1 not null,
    plan text not null,
    title varchar(250) not null,
    constraint i60_plan_pk
        primary key (key_plan)
);