-- This database will be altered later
CREATE DATABASE IF NOT EXISTS departments;
USE departments;
CREATE TABLE IF NOT EXISTS management
(
    employee_id int          not null primary key auto_increment,
    fullname    varchar(256) not null,
    username    varchar(100) not null,
    password    varchar(16)  not null,
    email       varchar(64)  not null,
    phone       varchar(24)  not null,
    salary      float        not null,
    hiring_date date         not null,
    post        text         not null
);
-- Dummy data
INSERT INTO management(fullname, username, password, email, phone, salary, hiring_date, post)
VALUES ("Ashish Shetty", "ashish", "shetty", "shettyashish@sierrahotels.com", "9865321245", 40000.00, "2017-09-10",
        "Manager");