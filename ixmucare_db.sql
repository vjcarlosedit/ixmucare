-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS ixmucare_db;

-- Usar la base de datos
USE ixmucare_db;

-- Crear la tabla de usuarios con los cambios solicitados
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY, -- ID autoincremental único
    nombre VARCHAR(50) NOT NULL,               -- Nombre del usuario
    correo VARCHAR(100) NOT NULL UNIQUE,       -- Correo único
    telefono VARCHAR(15),                      -- Teléfono del usuario
    contrasena VARCHAR(255) NOT NULL,          -- Contraseña del usuario
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha de creación
);
