-- create table customer2 (
--     id integer primary key auto_increment,
--     username varchar(30),
--     email varchar(60),
--     password varchar(60)
-- );
-- DESCRIBE customer2;
-- alter table customer2
-- add column(profile varchar(100));
create table admin(
    email VARCHAR(60) unique,
    password VARCHAR(60)
)