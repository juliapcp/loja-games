CREATE DATABASE `loja`;

-- loja.categoria definition

CREATE table `loja`.`categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


-- loja.cliente definition

CREATE TABLE `loja`.`cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


-- loja.produto definition

CREATE TABLE `loja`.`produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `valorBase` float DEFAULT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;


-- loja.categoriagame definition

CREATE TABLE `loja`.`categoriagame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `idGame` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoriagame_un` (`idCategoria`,`idGame`),
  KEY `categoriagame_FK` (`idGame`),
  CONSTRAINT `categoriagame_FK` FOREIGN KEY (`idGame`) REFERENCES `produto` (`id`),
  CONSTRAINT `categoriagame_FK_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;


-- loja.venda definition

CREATE TABLE `loja`.`venda` (
  `idCliente` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataCompra` date DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` float DEFAULT NULL,
  `valorUnitario` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_FK` (`idCliente`),
  KEY `venda_FK` (`idProduto`),
  CONSTRAINT `compra_FK` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `venda_FK` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `loja`.`categoria` (id,descricao) VALUES
	 (7,'SIMULAÇÃO'),
	 (8,'ESPORTE'),
	 (9,'TERROR'),
	 (10,'RPG'),
	 (11,'SUSPENSE'),
	 (12,'PLATAFORMA');

INSERT INTO `loja`.`produto` (id,descricao,tipo,valorBase,quantidade) VALUES
	 (14,'THE SIMS 4','GAME',65.0,9),
	 (15,'OUTLAST','GAME',30.0,24),
	 (16,'FIFA 21','GAME',200.0,19),
	 (17,'SUPER MÁRIO WORLD','GAME',300.0,15);

INSERT INTO `loja`.`categoriagame` (id,idCategoria,idGame) VALUES
	 (30,7,14),
	 (33,7,16),
	 (34,8,16),
	 (31,9,15),
	 (32,11,15),
	 (35,12,17);

INSERT INTO `loja`.`cliente` (id,nome,celular,email) VALUES
	 (5,'JULIA PONTES','53999381416','JULIA.P.C@GMAIL.COM'),
	 (6,'ARTHUR','5332326541','ARTHUR@ARTHUR.COM'),
	 (7,'BRIÃO','5398985426','BRIAO@BRIAO.COM');

INSERT INTO `loja`.`venda` (idCliente,id,dataCompra,observacao,idProduto,quantidade,valorUnitario) VALUES
	 (5,10,'2022-05-15','CARTÃO DE CRÉDITO',14,2.0,100.0),
	 (6,11,'2022-05-14','CARTÃO DE DÉBITO',15,1.0,300.0),
	 (5,12,'2022-05-10','BOLETO',16,1.0,200.0);