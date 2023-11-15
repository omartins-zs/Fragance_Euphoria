CREATE DATABASE fragance_euphoria_bd;

CREATE TABLE `fragance_euphoria_bd`.`marcas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(60) NOT NULL,
	`pais_origem` VARCHAR(60) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


INSERT INTO `marcas` (`id`, `nome`, `pais_origem`) VALUES (NULL, 'La Rive', 'Polônia'), (NULL, 'O Boticário', 'Brasil'), (NULL, 'Avon', 'Nova York - EUA');
