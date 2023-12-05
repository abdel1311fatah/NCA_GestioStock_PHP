-- Crear la base de datos PcComponentes_2.0
CREATE DATABASE IF NOT EXISTS PcComponentes_2;

-- Usar la base de datos recién creada
USE PcComponentes_2;

-- Crear las tablas
CREATE TABLE Llogater (
    id INT PRIMARY KEY,
    nom VARCHAR(50),
    cognoms VARCHAR(50)
);

CREATE TABLE Productes (
    id INT PRIMARY KEY,
    marca VARCHAR(50),
    model VARCHAR(50),
    foto VARCHAR(50),
    arxivat BOOLEAN,
    data DATE,
    categoria VARCHAR(50)
);

CREATE TABLE Prestec (
    id_llogater INT,
    id_producte INT,
    dataInici DATE,
    dataFi DATE,
    retornat BOOLEAN,
    FOREIGN KEY (id_llogater) REFERENCES Llogater(id),
    FOREIGN KEY (id_producte) REFERENCES Productes(id),
    PRIMARY KEY (id_llogater, id_producte)
);

CREATE TABLE Enmagatzematge (
    seccio VARCHAR(50),
    subseccio VARCHAR(50),
    id_producte INT,
    FOREIGN KEY (id_producte) REFERENCES Productes(id),
    PRIMARY KEY (id_producte)
);

CREATE TABLE Usuari (
    nomUsuari VARCHAR(50) PRIMARY KEY,
    nom VARCHAR(50),
    cognoms VARCHAR(50),
    dni VARCHAR(20),
    contrasenya VARCHAR(100)
);
