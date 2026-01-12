-- Database: dbtiket
-- Ticketing Application Database Schema

CREATE DATABASE IF NOT EXISTS dbtiket;
USE dbtiket;

-- Table: users
CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(50) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    akses ENUM('Admin', 'User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: kategori
CREATE TABLE IF NOT EXISTS kategori (
    kodekategori VARCHAR(20) PRIMARY KEY,
    kategori VARCHAR(100) NOT NULL,
    warna VARCHAR(20) DEFAULT '#007bff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: tiket
CREATE TABLE IF NOT EXISTS tiket (
    notiket VARCHAR(50) PRIMARY KEY,
    tanggal DATETIME NOT NULL,
    judul VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    kodekategori VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    status ENUM('Open', 'In Progress', 'Closed') NOT NULL DEFAULT 'Open',
    FOREIGN KEY (kodekategori) REFERENCES kategori(kodekategori) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user (username: admin@admin.com, password: admin)
INSERT INTO users (username, nama, pass, akses) VALUES 
('admin@admin.com', 'Administrator', MD5('admin'), 'Admin');

-- Insert sample categories
INSERT INTO kategori (kodekategori, kategori, warna) VALUES 
('TI', 'Teknologi Informasi', '#17a2b8'),
('HR', 'Human Resources', '#28a745'),
('FIN', 'Finance', '#ffc107'),
('OPS', 'Operations', '#dc3545');

-- Insert sample user (username: user@user.com, password: user)
INSERT INTO users (username, nama, pass, akses) VALUES 
('user@user.com', 'Regular User', MD5('user'), 'User');
