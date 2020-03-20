-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Mar-2020 às 15:20
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisvtr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aquisicao`
--

CREATE TABLE `aquisicao` (
  `id` int(11) NOT NULL,
  `descricao` int(11) NOT NULL,
  `idProprietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id`, `descricao`) VALUES
(1, 'Renault'),
(2, 'Mitsubishi'),
(3, 'Toyota'),
(4, 'GM'),
(5, 'Volkswagen'),
(6, 'Fiat'),
(7, 'Yamaha'),
(8, 'Chevrolet'),
(9, 'Nissan'),
(10, 'Ford'),
(11, 'Honda'),
(12, 'Hyundai'),
(13, 'Jeep'),
(14, 'Citroën'),
(15, 'Peugeot');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id`, `descricao`, `idMarca`) VALUES
(1, 'Gol 1.6 TL', 5),
(2, 'Onix 1.6 Joy', 8),
(3, 'Lander XTZ 250cc', 7),
(4, 'Siena', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `sigla` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `idUnidadeSuperior` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `sigla`, `descricao`, `isActive`, `idUnidadeSuperior`) VALUES
(1, 'CPM', 'Comando do Policiamento Metropolitano', 1, NULL),
(2, 'CPI', 'Comando do Policiamento do Interior', 1, NULL),
(3, 'CPR-1', 'Primeiro Comando do Policiamento Regional', 1, 2),
(4, 'CPR-2', 'Segundo Comando do Policiamento Regional', 1, 2),
(5, '6º BPM', '6º Batalhão de Polícia Militar', 1, 4),
(6, '6º BPM / 1ª CIA', '6º BPM / 1ª CIA - Sede', 1, 5),
(7, '6º BPM / 2ª CIA', '6º BPM / 2ª CIA - Jardim do Seridó', 1, 5),
(8, '6º BPM / 3ª CIA', '6º BPM / 3ª CIA - Jucurutu', 1, 5),
(9, '6º BPM / 2ª CIA / DPM Cruzeta', '6º BPM / 2ª CIA / DPM Cruzeta', 1, 7),
(10, '6º BPM / 2ª CIA / DPM Ouro Branco', '6º BPM / 2ª CIA / DPM Ouro Branco', 1, 7),
(11, '6º BPM / 2ª CIA / DPM São José do Seridó', '6º BPM / 2ª CIA / DPM São José do Seridó', 1, 7),
(12, '6º BPM / 3ª CIA / DPM Santana do Matos', '6º BPM / 3ª CIA / DPM Santana do Matos', 1, 8),
(13, '6º BPM / 3ª CIA / DPM São Rafael', '6º BPM / 3ª CIA / DPM São Rafael', 1, 8),
(14, '6º BPM / 3ª CIA / DPM Florânia', '6º BPM / 3ª CIA / DPM Florânia', 1, 8),
(15, '10º BPM', '10º Batalhão de Polícia Militar - Assu', 1, 4),
(16, '10º BPM / 1ª CIA', '10º BPM / 1ª CIA - Sede', 1, 15),
(17, '10º BPM / 2ª CIA', '10º BPM / 2ª CIA - Angicos', 1, 15),
(18, '10º BPM / 3ª CIA', '10º BPM / 3ª CIA - Campo Grande', 1, 15),
(19, '10º BPM / 1ª CIA / DPM Carnaubais', '10º BPM / 1ª CIA / DPM Carnaubais', 1, 16),
(20, '10º BPM / 1ª CIA / DPM Ipanguaçu', '10º BPM / 1ª CIA / DPM Ipanguaçu', 1, 16),
(21, '10º BPM / 1ª CIA / DPM Itajá', '10º BPM / 1ª CIA / DPM Itajá', 1, 16),
(22, '10º BPM / 2ª CIA / DPM Afonso Bezerra', '10º BPM / 2ª CIA / DPM Afonso Bezerra', 1, 17),
(23, '10º BPM / 2ª CIA / DPM Fernando Pedrosa', '10º BPM / 2ª CIA / DPM Fernando Pedrosa', 1, 17),
(24, '10º BPM / 2ª CIA / DPM Pedro Avelino', '10º BPM / 2ª CIA / DPM Pedro Avelino', 1, 17),
(25, '10º BPM / 2ª CIA / Pel. Lages', '10º BPM / 2ª CIA / Pel. Lages', 1, 17),
(26, '10º BPM / 3ª CIA / DPM Janduís', '10º BPM / 3ª CIA / DPM Janduís', 1, 18),
(27, '10º BPM / 3ª CIA / DPM Paraú', '10º BPM / 3ª CIA / DPM Paraú', 1, 18),
(28, '10º BPM / 3ª CIA / DPM Triunfo Potiguar', '10º BPM / 3ª CIA / DPM Triunfo Potiguar', 1, 18),
(29, '3ª CIPM', '3ª CIPM - Currais Novos', 1, 4),
(30, '5ª CIPM', '5ª CIPM - Jardim de Piranhas', 1, 4),
(31, '3ª CIPM / DPM Acari', '3ª CIPM / DPM Acari', 1, 29),
(32, '3ª CIPM / DPM Bodó', '3ª CIPM / DPM Bodó', 1, 29),
(33, '3ª CIPM / DPM Carnaúba dos Dantas', '3ª CIPM / DPM Carnaúba dos Dantas', 1, 29),
(34, '3ª CIPM / DPM Cerro Corá', '3ª CIPM / DPM Cerro Corá', 1, 29),
(35, '3ª CIPM / DPM Equador', '3ª CIPM / DPM Equador', 1, 29),
(36, '3ª CIPM / DPM Lagoa Nova', '3ª CIPM / DPM Lagoa Nova', 1, 29),
(37, '3ª CIPM / DPM Parelhas', '3ª CIPM / DPM Parelhas', 1, 29),
(38, '3ª CIPM / DPM Santana do Seridó', '3ª CIPM / DPM Santana do Seridó', 1, 29),
(39, '3ª CIPM / DPM São Vicente', '3ª CIPM / DPM São Vicente', 1, 29),
(40, '5ª CIPM / DPM Ipueira', '5ª CIPM / DPM Ipueira', 1, 30),
(41, '5ª CIPM / DPM São Fernando', '5ª CIPM / DPM São Fernando', 1, 30),
(42, '5ª CIPM / DPM Timbaúba', '5ª CIPM / DPM Timbaúba', 1, 30),
(43, '5ª CIPM / 1º Pel', '5ª CIPM / 1º Pelotão - Sede', 1, 30),
(44, '5ª CIPM / 2º Pel', '5ª CIPM / 2º Pelotão - Serra Negra do Norte', 1, 30),
(45, '5ª CIPM / 3º Pel', '5ª CIPM / 3º Pelotão - São João do Sabugi', 1, 30),
(46, 'teste', 'teste', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura`
--

CREATE TABLE `viatura` (
  `id` bigint(20) NOT NULL,
  `chassi` varchar(17) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `prefixo` varchar(10) DEFAULT NULL,
  `ano` int(11) NOT NULL,
  `isOperant` tinyint(1) NOT NULL DEFAULT '1',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `observacoes` varchar(200) NOT NULL,
  `recebimento` date NOT NULL,
  `baixa` date DEFAULT NULL,
  `efetivo` int(11) NOT NULL,
  `idModelo` int(11) NOT NULL,
  `idAquisicao` int(11) NOT NULL,
  `idUnidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aquisicao`
--
ALTER TABLE `aquisicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aquisicao_proprietario` (`idProprietario`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modelo_marca` (`idMarca`);

--
-- Indexes for table `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_unidade_superior` (`idUnidadeSuperior`);

--
-- Indexes for table `viatura`
--
ALTER TABLE `viatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_viatura_unidade` (`idUnidade`),
  ADD KEY `fk_viatura_modelo` (`idModelo`),
  ADD KEY `fk_viatura_aquisicao` (`idAquisicao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aquisicao`
--
ALTER TABLE `aquisicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aquisicao`
--
ALTER TABLE `aquisicao`
  ADD CONSTRAINT `fk_aquisicao_proprietario` FOREIGN KEY (`idProprietario`) REFERENCES `proprietario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `fk_modelo_marca` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `unidade`
--
ALTER TABLE `unidade`
  ADD CONSTRAINT `fk_unidade_superior` FOREIGN KEY (`idUnidadeSuperior`) REFERENCES `unidade` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `viatura`
--
ALTER TABLE `viatura`
  ADD CONSTRAINT `fk_viatura_aquisicao` FOREIGN KEY (`idAquisicao`) REFERENCES `aquisicao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_viatura_modelo` FOREIGN KEY (`idModelo`) REFERENCES `modelo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_viatura_unidade` FOREIGN KEY (`idUnidade`) REFERENCES `unidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
