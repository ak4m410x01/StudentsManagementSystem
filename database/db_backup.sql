-- DB backup --
CREATE DATABASE student_management_system;

USE student_management_system;

CREATE TABLE students_credentials (
    student_id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    student_username VARCHAR(50) NOT NULL UNIQUE,
    student_password VARCHAR(100) NOT NULL
);

CREATE TABLE students_info (
    student_id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL,
    student_number VARCHAR(11) NOT NULL,
    parent_number VARCHAR(11) NOT NULL,
    signin_date DATE NOT NULL,
    day1 BOOLEAN NOT NULL,
    day2 BOOLEAN NOT NULL,
    day3 BOOLEAN NOT NULL,
    day4 BOOLEAN NOT NULL,
    day5 BOOLEAN NOT NULL,
    day6 BOOLEAN NOT NULL,
    day7 BOOLEAN NOT NULL,
    level INT NOT NULL
);