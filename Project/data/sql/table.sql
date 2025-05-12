CREATE DATABASE blog;

USE blog;

CREATE TABLE
    user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        avatar VARCHAR(255),
        description TEXT,
        posts INTEGER
    );

CREATE TABLE
    post (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(255),
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        created_by_user_id INT NOT NULL,
        likes INTEGER
    );