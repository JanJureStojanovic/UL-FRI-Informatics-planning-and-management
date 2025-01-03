-- Shema ep_project
DROP DATABASE IF EXISTS ep_project;

CREATE DATABASE ep_project;

USE ep_project;


-- Users Table
DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    priimek VARCHAR(50) NOT NULL,
    enaslov VARCHAR(100) UNIQUE NOT NULL,
    geslo VARCHAR(255) NOT NULL,
    naslov VARCHAR(255) NOT NULL,
    hisna_st INT NOT NULL,
    postna_st INT NOT NULL,
    active BOOLEAN DEFAULT TRUE,
);

-- Vendors Table
DROP TABLE IF EXISTS `users`;
CREATE TABLE vendors (
    vendor_id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    priimek VARCHAR(50) NOT NULL,
    enaslov VARCHAR(100) UNIQUE NOT NULL,
    geslo VARCHAR(255) NOT NULL,
    active BOOLEAN DEFAULT TRUE,
);

-- Admin Table
DROP TABLE IF EXISTS `admin`;
CREATE TABLE admin (
    ime VARCHAR(50) NOT NULL,
    priimek VARCHAR(50) NOT NULL,
    enaslov VARCHAR(100) UNIQUE NOT NULL,
    geslo VARCHAR(255) NOT NULL,
);

-- Items Table
DROP TABLE IF EXISTS `items`;
CREATE TABLE items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(100) NOT NULL,
    opis TEXT,
    price DECIMAL(10,2) NOT NULL,
    vendor_id INT NOT NULL,
    category INT NOT NULL,
    active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (vendor_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Transactions Table
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    vendor_id INT NOT NULL,
    item_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    status ENUM('Neobdelano', 'Potrjeno', 'Preklicano') DEFAULT 'Neobdelano',
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id),
    FOREIGN KEY (vendor_id) REFERENCES users(user_id),
    FOREIGN KEY (item_id) REFERENCES items(item_id) ON DELETE CASCADE
);

-- Insert Hardcoded Admin (Manual Insert)
INSERT INTO admin (ime, priimek, enaslov, geslo) 
VALUES ('admin', 'admin', 'admin@ep.com', 'admin');
