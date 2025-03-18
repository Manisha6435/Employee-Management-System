CREATE DATABASE employee_db;
USE employee_db;

-- Employee Table
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    position VARCHAR(100),
    salary DECIMAL(10,2)
);

-- Users Table (HR & Employees)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('HR', 'Employee') NOT NULL
);

-- Insert Default HR User (Password: admin123)
INSERT INTO users (username, password, role) 
VALUES ('admin', MD5('admin123'), 'HR');
ALTER TABLE employees ADD COLUMN image VARCHAR(255) NULL;
