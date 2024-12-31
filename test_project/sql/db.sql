-- Shema ep_project
DROP DATABASE IF EXISTS ep_project;

CREATE DATABASE ep_project;

USE ep_project;


-- Users Table (Vendors and Customers)
DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
    id_uporabnika INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    priimek VARCHAR(50) NOT NULL,
    enaslov VARCHAR(100) UNIQUE NOT NULL,
    geslo VARCHAR(255) NOT NULL,
    tip ENUM('Vendor', 'Customer') NOT NULL,
    aktiven BOOLEAN DEFAULT TRUE,
    datum_ustvarjanja TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Items Table
DROP TABLE IF EXISTS `items`;
CREATE TABLE items (
    id_izdelka INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(100) NOT NULL,
    opis TEXT,
    cena DECIMAL(10,2) NOT NULL,
    id_prodajalca INT NOT NULL,
    aktiven BOOLEAN DEFAULT TRUE,
    datum_dodajanja TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_prodajalca) REFERENCES uporabniki(id_uporabnika) ON DELETE CASCADE
);

-- Transactions Table
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE transactions (
    id_transakcije INT AUTO_INCREMENT PRIMARY KEY,
    id_stranke INT NOT NULL,
    id_prodajalca INT NOT NULL,
    id_izdelka INT NOT NULL,
    kolicina INT NOT NULL,
    skupna_cena DECIMAL(10,2) NOT NULL,
    status ENUM('Neobdelano', 'Potrjeno', 'Preklicano') DEFAULT 'Neobdelano',
    datum_transakcije TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_stranke) REFERENCES uporabniki(id_uporabnika),
    FOREIGN KEY (id_prodajalca) REFERENCES uporabniki(id_uporabnika),
    FOREIGN KEY (id_izdelka) REFERENCES izdelki(id_izdelka) ON DELETE CASCADE
);

-- Insert Hardcoded Admin (Manual Insert)
INSERT INTO uporabniki (ime, priimek, enaslov, geslo, tip, aktiven) 
VALUES ('Admin', 'Admin', 'admin@prodajalna.com', 'admin123', 'Prodajalec', TRUE);
