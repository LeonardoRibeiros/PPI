CREATE DATABASE IF NOT EXISTS ppidatabase;
USE ppidatabase;

CREATE TABLE `animal` (
    `id` int  NOT NULL auto_increment,
    `nome` varchar(100)  NOT NULL ,
    `raca` varchar(50)  NOT NULL ,
    `idade` int  NOT NULL ,
    `peso` float  NOT NULL ,
    PRIMARY KEY (`id`)
);

