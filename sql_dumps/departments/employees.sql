-- This database will be altered later
CREATE DATABASE IF NOT EXISTS departments;
USE departments;
CREATE TABLE IF NOT EXISTS employees
(
    employee_id int         not null primary key auto_increment,
    fname       varchar(64) not null,
    lname       varchar(64) not null,
    username    varchar(64) not null,
    password    varchar(256) not null,
    email       varchar(64) not null,
    phone       varchar(24) not null,
    hiring_date date        not null,
    department  varchar(24) not null,
    post        text        not null,
    salary      double      not null
);
-- Temporary dummy data
INSERT INTO employees(fname, lname, username, password, email, phone, hiring_date, department, post, salary)
VALUES ("Temporary", "User", "temp", "$2y$10$MjDfB5.7mh8Kvm6s1K5xeOhw0O0Rz1wn1ORXY/ZljRZZm7zHYt58y", "temp@sierrahotels.com", "9191919191", "2019-06-21", "Management",
        "Manager", 40000.00);