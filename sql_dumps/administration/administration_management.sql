CREATE DATABASE IF NOT EXISTS administration;
USE administration;
CREATE TABLE IF NOT EXISTS management(employee_id int not null primary key auto_increment, fullname varchar(256) not null, username varchar(100) not null, password varchar(16) not null, post text not null);