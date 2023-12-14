CREATE DATABASE login;
USE login;

CREATE TABLE users (
    id INT PRIMARY KEY ,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);