create table articles
(
    id smallint auto_increment,
    title varchar(255) not null,
    url text not null,
    content longtext not null,
    constraint articles_pk
        primary key (id)
);

create table menus
(
    id smallint auto_increment,
    name varchar(150) not null,
    article_id smallint not null,
    parent_id smallint default NULL null,
    constraint menus_pk
        primary key (id),
    constraint menus_articles_id_fk
        foreign key (article_id) references articles (id)
            on update cascade on delete cascade
);

create table links
(
    id int auto_increment,
    title varchar(150) not null,
    anchor varchar(150) not null,
    article_id smallint not null,
    constraint links_pk
        primary key (id),
    constraint links_articles_id_fk
        foreign key (article_id) references articles (id)
            on delete cascade
);

create table tags
(
    id int auto_increment,
    name varchar(150) not null,
    `key` varchar(150) not null,
    constraint tag_pk
        primary key (id)
);
create unique index tag_key_uindex
    on tags (`key`);
create unique index tag_name_uindex
    on tags (name);

create table tags_articles
(
    tag_id int not null,
    article_id smallint not null,
    constraint tags_articles_articles_id_fk
        foreign key (article_id) references articles (id)
            on delete cascade,
    constraint tags_articles_tags_id_fk
        foreign key (tag_id) references tags (id)
            on delete cascade
);

create table `references`
(
    id int auto_increment,
    article_id smallint not null,
    link varchar(255) null,
    content varchar(255) not null,
    constraint references_pk
        primary key (id),
    constraint references_articles_id_fk
        foreign key (article_id) references articles (id)
            on delete cascade
);