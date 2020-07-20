create database bookmarks;
use bookmarks;
create table user (
  username varchar(16) not null primary key,
  passwd char(40) not null,
  email varchar(100) not null
);

create table bookmark (
  username varchar(16) not null,
  bm_URL varchar(255) not null,
  index (username),
  index (bm_URL),
  primary key (username)
);

create table objavlenies (
  username varchar(16) not null,
  ipg_obyavl varchar(255) not null,
  coment_obyavl varchar(255) not null,
  index (username),
  index (ipg_obyavl)
);

create table lichniedanie (
  username varchar(16) not null,
  ipg_my varchar(255) not null,
  coment_my varchar(255) not null,
  index (username),
  index (ipg_my),
  primary key (username)
);

create table imgocenka (
  username varchar(16) not null,
  ipg_obyavl varchar(255) not null,
  coment_ocenki varchar(255) not null,
  ocenka varchar(16) not null,
  index (username),
  index (ipg_obyavl)
);

grant select, insert, update, delete
on bookmarks.*
to bm_user@localhost identified by 'password';
