CREATE DATABASE IF NOT EXISTS banco;
USE banco;

CREATE TABLE `Usuario` (
    `ID` int NOT NULL auto_increment,
    `nome` varchar(100)  NOT NULL ,
    `email` varchar(50)  NOT NULL ,
    `senha` varchar(50)  NOT NULL ,
    `telefone` varchar(50)  NOT NULL ,
    PRIMARY KEY (`ID`)
);