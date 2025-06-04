CREATE DATABASE blog;

USE blog;

CREATE TABLE
    user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fisrt_name VARCHAR(100),
        last_name VARCHAR(100),
        avatar VARCHAR(255),
        description TEXT,
        email VARCHAR(50),
        password VARCHAR(50)
    );

CREATE TABLE
    post (
        id INT AUTO_INCREMENT PRIMARY KEY,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        created_by_user_id INT NOT NULL,
        likes INTEGER
    );

CREATE TABLE
    images(
        post_id INT,
        image VARCHAR(255)
    );