CREATE DATABASE IF NOT EXISTS myenergy_db;
USE myenergy_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    pwd VARCHAR(100),
    type ENUM('cliente', 'azienda', 'admin')
);

CREATE TABLE IF NOT EXISTS tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    azienda VARCHAR(100),
    testo TEXT,
    status VARCHAR(20) DEFAULT 'aperto',
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    autore VARCHAR(100),
    voto INT,
    testo TEXT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
