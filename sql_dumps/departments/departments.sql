CREATE DATABASE IF NOT EXISTS departments;
USE departments;
CREATE TABLE IF NOT EXISTS departments
(
    department_id   int         not null primary key auto_increment,
    department_name varchar(24) not null
);
INSERT INTO departments(department_name)
VALUES ("Management"),
       ("IT services"),
       ("Accounting"),
       ("Massage services"),
       ("Laundry services"),
       ("Room services");
