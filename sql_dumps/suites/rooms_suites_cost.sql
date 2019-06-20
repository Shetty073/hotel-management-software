CREATE DATABASE IF NOT EXISTS rooms;
USE rooms;
CREATE TABLE IF NOT EXISTS suites_cost
(
    room_cost_id int primary key not null auto_increment,
    room_type    varchar(64)     not null,
    cost         float(6, 2)     not null
);
INSERT INTO suites_cost
    (room_type, cost)
VALUES ('Sierra Cozy', 1000),
       ('Sierra Cozy XL', 1500),
       ('Sierra Grand', 2000),
       ('Sierra Sea View', 4000),
       ('Sierra Maharaja', 8000);
