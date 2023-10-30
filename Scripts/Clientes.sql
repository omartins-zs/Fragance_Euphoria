CREATE DATABASE fragance_euphoria_bd;

CREATE TABLE `fragance_euphoria_bd`.`clientes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`senha` VARCHAR(200) NOT NULL,
	`endereco` VARCHAR(150) NOT NULL,
	`celular` BIGINT(14) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;
