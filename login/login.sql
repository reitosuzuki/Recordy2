drop database if exists recordy;
create datebase recordy default character set utf8_general_ci;
grant all on recordy.*to 'staff'@'localhost' identified by 'reito417'
use recordy;

create table customer (
    id int auto_increment primary key,
    login varchar(100) not null unique,
    password varchar(100) not null
    );

create table studytoday ( id int auto_increment primary key, customer_id int, math int, english int, society int, science int, others int, sum int, foreign key(customer_id) references customer(id) );

create table study_week (
    id int auto_increment primary key,
    math int,
    english int,
    society int,
    science int,
    others int,
    foreign key(customer_id) references customer(id)
    );

create table to_do (
     id int auto_increment primary key,
     to_do_1 varchar(100),
     to_do_2 varchar(100),
     to_do_3 varchar(100),
     foreign key(customer_id) references customer(id)
    );
