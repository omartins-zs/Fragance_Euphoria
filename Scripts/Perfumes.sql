CREATE DATABASE fragance_euphoria_bd;

CREATE TABLE `fragance_euphoria_bd`.`perfumes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`descricao` VARCHAR(100) NOT NULL,
	`marca` INT NOT NULL,
	`tipo` ENUM ('Masculino', 'Feminino', 'Unissex'),
	`volume` INT NOT NULL,
	`preco` DECIMAL(10, 2) NOT NULL,
	`estoque` INT NOT NULL,
	`imagem` blob NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;
