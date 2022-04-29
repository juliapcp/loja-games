-- loja.categoria definition

CREATE TABLE `categoria` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `descricao` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- loja.cliente definition

CREATE TABLE `cliente` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) DEFAULT NULL,
    `celular` varchar(100) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- loja.produto definition

CREATE TABLE `produto` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `descricao` varchar(100) DEFAULT NULL,
    `tipo` varchar(100) DEFAULT NULL,
    `valorBase` float DEFAULT NULL,
    `quantidade` int(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- loja.categoriagame definition

CREATE TABLE `categoriagame` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idCategoria` int(11) NOT NULL,
    `idGame` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `categoriagame_un` (`idCategoria`,`idGame`),
    KEY `categoriagame_FK` (`idGame`),
    CONSTRAINT `categoriagame_FK` FOREIGN KEY (`idGame`) REFERENCES `produto` (`id`),
    CONSTRAINT `categoriagame_FK_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- loja.venda definition

CREATE TABLE `venda` (
    `idCliente` int(11) DEFAULT NULL,
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `datavenda` datetime DEFAULT NULL,
    `observacao` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `venda_FK` (`idCliente`),
    CONSTRAINT `venda_FK` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- loja.vendaitem definition

CREATE TABLE `vendaitem` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idvenda` int(11) NOT NULL,
    `idProduto` int(11) NOT NULL,
    `valorUnitario` float DEFAULT NULL,
    `quantidade` float DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `vendaItem_FK` (`idvenda`),
    KEY `vendaitem_FK1` (`idProduto`),
    CONSTRAINT `vendaItem_FK` FOREIGN KEY (`idvenda`) REFERENCES `venda` (`id`) ON DELETE CASCADE,
    CONSTRAINT `vendaitem_FK1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;