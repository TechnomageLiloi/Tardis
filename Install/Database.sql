create table artifacts_quests
(
    key_quest bigint unsigned auto_increment,
    title varchar(100) not null,
    summary text not null,
    start timestamp null,
    finish timestamp null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned default 1 not null,
    constraint artifacts_quests_pk
        primary key (key_quest)
);
