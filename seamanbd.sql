-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2017 às 20:55
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seamanbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `login`, `senha`) VALUES
(1010101, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `CPF` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dataNasci` varchar(10) NOT NULL,
  `unidade` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `dataCFPN` varchar(10) NOT NULL,
  `dataCBSN` varchar(10) NOT NULL,
  `turma` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`CPF`, `telefone`, `dataNasci`, `unidade`, `email`, `rg`, `nome`, `endereco`, `dataCFPN`, `dataCBSN`, `turma`) VALUES
('004.480.733-31', '(85) 99780-8075', '1984-2-10', 444444444, 'lustosa36@hotmail.com', '200.000.217.328-0', 'Thiago Lustosa Rocha', 'AV: Desembargador Gonzaga, nº 333 Cid Funcio / Fortaleza – CE Cep 60823-005 ', '', '2016-5-20', 2014),
('013.932.594-80', '(81) 99872-0742', '1988-3-8', 222222222, 'gguibel@gmail.com', '706.830-4', 'Guilherme de Almeida Lopes', 'Rua: Gervasio Pires, nº436 Boa Vista / Recife – PE Cep 50050-070 ', '2016-5-16', '2016-5-20', 1012),
('020.684.994-01', '(83) 98811-3692', '1977-7-13', 1111111111, 'raissa_28@outlook.com', '205.054-2', 'Fabio Palmeira Pinto', 'Rua: Dep. Balduino de Carvalho, nº68 Bessa / João Pessoa – Paraiba Cep 58038-000 ', '2016-5-16', '2016-5-20', 2021),
('032.252.864-00', '(81) 9982-01678', '1980-11-28', 1111111111, 'Sanmergulhao@gmail.com', '549.617-9', 'Alexsandra MergulhÃ£o AraÃºjo', 'Rua Livino de Carvalho, nÂº736 Altos / Fortaleza â€“ CE CEP: 60421-240', '', '2016-05-20', 1011),
('043.564.693-13', '(85) 99687-3388', '1991-4-28', 222222222, 'alvesjessica050@gmail.com', '200.701.028.360-7', 'Jessica Alves Lemos', 'Rua 69 Pirassate, nº1268 Pacaratuba – CE Cep 61800-000 ', '', '2016-5-20', 2022),
('056.209.054-11', '(81) 98431-0190', '1983-11-9', 333333333, 'marcoslopeslopes091983@gmail.com', '675.537-7', 'Marcos Lopes de Brito', 'Rua: Carmem Outra, nº245 Vila Popular / Olinda – PE Cep 53230-115 ', '2016-5-16', '2016-5-20', 2023),
('063.183.484-25', '(81) 99678-3321', '1987-6-21', 333333333, 'lisi.felix@hotmail.com', '691.629-8', 'Lisiane Lima Felix', 'Rua: João Clementino Montarroyos, nº211 Casa Caiada / Olinda – PE Cep 53130-390 ', '2016-5-16', '2016-5-20', 1023),
('070.650.584-09', '(81) 98649-7199', '1985-4-7', 444444444, 'polianabuarque@hotmail.com', '632.406-4', 'Poliana Buarque da Silva Cavalcanti ', 'Rua três, S/N Rio Doce / Olinda – PE Cep 53090-340', '2016-5-16', '2016-5-20', 1014),
('072.252.664-46', '(81) 98785-6985', '1990-8-7', 333333333, 'juliocesardelima@hotmail.com', '760.414-8', 'Julio Cesar Soares de Lima', 'Av: Vasconcelos, nº 1242 Dois unidos / Recife – PE Cep 52140-000 ', '2016-5-16', '2016-5-20', 1013),
('075.492.694-08', '(83) 98892-8511', '1995-7-15', 333333333, 'jessicanobre@hotmail.com.br', '379.959-9', 'Jéssica Ive Silva Nobre', 'Av: Umbuzeiro, nº235 Manaira / Joao Pessoa – PB Cep 58038-180 ', '2016-5-16', '2016-5-20', 1013),
('082.063.634-75', '(83) 99603-3148', '1988-11-18', 1111111111, 'eugenio.pacelli@hotmail.com', '265.582-4', 'Eugenio Pacelli da Silva Rodrigues Junior', 'Av: João da Mata, nº 256 Jaguaribe / João Pessoa – PB Cep 58015-020 ', '2016-5-16', '2016-5-20', 2011),
('088.724.094-11', '(81) 97908-0849', '1985-1-21', 222222222, 'guifrota2015@outlook.com', '713.638-3', 'Guilherme de Vasconcelos Frota ', 'Rua Bruno Veloso, nº 140 Boa Viagem / Recife – PE Cep 51021-280 ', '2016-5-16', '2016-5-20', 1022),
('089.085.444-02', '(81) 99271-2968', '1991-9-20', 444444444, 'renocv@hotmail.com', '797.869-1', 'Reniere da Silva Neri Filho', 'Rua Gaspar Perez ,nº 182 Iputinga / Recife – PE Cep 50670-350 ', '', '2016-5-20', 1014),
('092.460.184-19', '(81) 99652-0448', '1991-9-19', 1111111111, 'edrenanvc@hotmail.com', '840.984-8', 'Ed Renan Carrazzoni Vasconcelos', 'Rua Conde de Irajá, nº214 Torre / Recife – PE Cep 50710-310 ', '', '2016-05-20', 1021),
('093.667.934-44', '(81) 99503-1876', '1990-3-23', 444444444, 'barreeeeto@gmail.com', '684.028-2', 'Ytallo Barrêto dos Santos', 'Rua Argentina, nº209 Pilar / Itamaracá – PE Cep 53900-000 ', '2016-5-16', '2016-5-20', 2024),
('094.430.724-83', '(83) 98770-4169', '1989-11-13', 222222222, 'henriquemscbr@bol.com.br', '349.074-2', 'Henrique Bernardino dos Santos', 'Aldeia lagoa do mato, nº S/N Baia da Traíção – PB Cep 58295-000 ', '', '2016-5-20', 2012),
('185.768.038-00', '(81) 997654381', '1974-9-15', 444444444, 'cristinasilva.pasato@hotmail.com', '765.354-9', 'Severina Cristina da Silva', '3ª Trav. Mario Domingues, nº 36 Centro.  nº 36 Centro / Ribeirão – PE Cep 55520-000', '2016-5-16', '2016-5-20', 1024),
('645.405.883-20', '(81) 99917-8269', '1983-18-5', 1111111111, 'andreamartins2006@hotmail.com', '970.022.939-97', 'Andrea Martins Correia', 'Rua Livino de Carvalho, nº736 Altos / Fortaleza – CE Cep 60421-240 ', '', '2016-20-5', 1011),
('662.959.471-15', '(81) 99873-0016', '1973-12-3', 1111111111, 'brunoribeirocosta@gmail.com', '588.51-5', 'Bruno Ribeiro Correa da Costa', 'Rua Candido Mendes, nº35 Ibura / Recife – PE Cep 51240-070 ', '2016-05-16', '2016-05-20', 1011),
('818.595.970-68', '(84) 99176-8213', '1982-11-23', 1111111111, 'isadmsampaio@gmail.com', '316.338-6', 'Enisa Schild Sampaio Dantas', 'Rua Mata Grande, nº10 Neópolis / Natal – RN Cep 59086-040 ', '', '2016-5-20', 1021),
('828.356.245-20', '(71) 99282-6097', '1981-9-1', 333333333, 'luciane.amado1@gmail.com', '667.330.06-2', 'Luciane Amado Figueiredo da Silva', '2ª trav. Santo Antonio, nº 14 Vale dos lagos / Salvador – BA Cep 41250-460', '', '2016-5-20', 2013),
('857.619.153-91', '(88) 99921-4646', '1980-1-2', 222222222, 'anastacio.martins@yahoo.com.br', '960.310.522.0-1', 'Francisco Anastacio Martins  Rodrigues', 'Rua: Vereador Marcolino Olavo, nº495 Centro / Groairas – CE Cep 62190-000 ', '2016-5-16', '2016-5-20', 1012);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `duracao` varchar(100) NOT NULL,
  `unidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `duracao`, `unidade`) VALUES
(1000000001, 'CURSO INTERNACIONAL - STCW / CFPN', '5 dias', 1111111111),
(1000000002, 'CURSO INTERNACIONAL - STCW / CFPN', '5 dias', 222222222),
(1000000003, 'CURSO INTERNACIONAL - STCW / CFPN', '5 dias', 333333333),
(1000000004, 'CURSO INTERNACIONAL - STCW / CFPN', '5 dias', 444444444),
(2000000001, 'CURSO INTERNACIONAL - STCW / CBSN', '5 dias', 1111111111),
(2000000002, 'CURSO INTERNACIONAL - STCW / CBSN', '5 dias', 222222222),
(2000000003, 'CURSO INTERNACIONAL - STCW / CBSN', '5 dias', 333333333),
(2000000004, 'CURSO INTERNACIONAL - STCW / CBSN', '5 dias', 444444444);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursomateria`
--

CREATE TABLE `cursomateria` (
  `materia` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursomateria`
--

INSERT INTO `cursomateria` (`materia`, `curso`) VALUES
(1000001, 1000000001),
(1000001, 1000000002),
(1000001, 1000000003),
(1000001, 1000000004),
(1000002, 1000000001),
(1000002, 1000000002),
(1000002, 1000000003),
(1000002, 1000000004),
(1000003, 1000000001),
(1000003, 1000000002),
(1000003, 1000000003),
(1000003, 1000000004),
(1000004, 1000000001),
(1000004, 1000000002),
(1000004, 1000000003),
(1000004, 1000000004),
(1000005, 1000000001),
(1000005, 1000000002),
(1000005, 1000000003),
(1000005, 1000000004),
(1000006, 1000000001),
(1000006, 1000000002),
(1000006, 1000000003),
(1000006, 1000000004);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE `instrutor` (
  `CPF` varchar(14) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`CPF`, `nome`, `email`, `telefone`) VALUES
('204.219.428-2', 'Valdemiro da Conseissão', 'valconseissao@gmail.com', '(67) 98232-2424'),
('390.294.123-2', 'Roselandia Maria dos Santos', 'roseMsantos@gmail.com', '(67) 92384-2384'),
('474.244.244-4', 'Carol Castro', 'cacastro@gmail.com', '(67) 99999-9999'),
('645.234.123-1', 'Albert Esteves Wesker', 'aewesker@gmail.com', '(67) 98555-5555');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cargaHoraria` varchar(100) NOT NULL,
  `ementa` text NOT NULL,
  `instrutor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `nome`, `cargaHoraria`, `ementa`, `instrutor`) VALUES
(1000001, 'Controle de Multidão e Gerenciamento de Crise', '2 horas', '', '204.219.428-2'),
(1000002, 'Segurança dos Passageiros e da Carga', '4 horas', '', '390.294.123-2'),
(1000003, 'Segurança Pessoal e Responsabilidade Social', '4 horas', '', '474.244.244-4'),
(1000004, 'Técnicas de Sobrevivência Pessoal', '8 horas', '', '645.234.123-1'),
(1000005, 'Primeiros Socorros Elementares', '4 horas', '', '204.219.428-2'),
(1000006, 'Prevenção e Combate a Incêndio', '8 horas', '', '390.294.123-2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretaria`
--

CREATE TABLE `secretaria` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `unidade` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `secretaria`
--

INSERT INTO `secretaria` (`id`, `login`, `senha`, `unidade`, `admin`) VALUES
(1, 'secretariaUR', 'secur', 1111111111, 1010101),
(2, 'secretariaUC', 'secuc', 222222222, 1010101),
(3, 'secretariaURJ', 'securj', 333333333, 1010101),
(4, 'secretariaUSP', 'secusp', 444444444, 1010101);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `sala` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `horario`, `sala`, `curso`) VALUES
(1011, 'A1', '14:00', 8, 1000000001),
(1012, 'A1', '14:00', 10, 1000000002),
(1013, 'A1', '14:00', 4, 1000000003),
(1014, 'A1', '14:00', 2, 1000000004),
(1021, 'A2', '19:00', 1, 1000000001),
(1022, 'A2', '19:00', 5, 1000000002),
(1023, 'A2', '19:00', 3, 1000000003),
(1024, 'A2', '19:00', 8, 1000000004),
(1031, 'A3', '14:00', 9, 1000000001),
(2011, 'B1', '8:00', 9, 2000000001),
(2012, 'B1', '8:00', 6, 2000000002),
(2013, 'B1', '8:00', 3, 2000000003),
(2014, 'B1', '8:00', 4, 2000000004),
(2021, 'B2', '14:00', 5, 2000000001),
(2022, 'B2', '14:00', 8, 2000000002),
(2023, 'B2', '14:00', 9, 2000000003),
(2024, 'B2', '14:00', 3, 2000000004);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmainstrutor`
--

CREATE TABLE `turmainstrutor` (
  `turma` int(20) NOT NULL,
  `instrutor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidadeseaman`
--

CREATE TABLE `unidadeseaman` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidadeseaman`
--

INSERT INTO `unidadeseaman` (`id`, `nome`, `email`, `endereco`, `telefone`) VALUES
(222222222, 'Unidade Curitiba', 'curitiba@seaman.com.br', 'Rua Eduardo Carlos Pereira, 2808, Portão, Curitiba-PR, CEP: 80610-170', '+55 (41) 3352-1001'),
(333333333, 'Unidade Rio de Janeiro', 'rio@seaman.com.br', 'Av. Nossa Senhora de Copacabana, 330, Sala 502, Copacabana, Rio de Janeiro-RJ, CEP: 22020-001', ''),
(444444444, 'Unidade São Paulo', 'saopaulo@seaman.com.br', 'Av. Pedro Bueno, 169, Jabaquara, São Paulo-SP, CEP: 04342-010', '+55 (11) 3758-6674'),
(1111111111, 'Unidade Recife', 'recife@seaman.com.br', 'Rua Henrique Dias, 675, Sala 09, Derby, Recife-PE, CEP: 52010-100', '+55 (81) 9583.3967');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`CPF`),
  ADD KEY `turma` (`turma`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unidade` (`unidade`);

--
-- Indexes for table `cursomateria`
--
ALTER TABLE `cursomateria`
  ADD KEY `materia` (`materia`),
  ADD KEY `curso` (`curso`);

--
-- Indexes for table `instrutor`
--
ALTER TABLE `instrutor`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instrutor` (`instrutor`);

--
-- Indexes for table `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secretaria_ibfk_1` (`admin`),
  ADD KEY `unidade` (`unidade`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_ibfk_1` (`curso`);

--
-- Indexes for table `turmainstrutor`
--
ALTER TABLE `turmainstrutor`
  ADD KEY `turma` (`turma`),
  ADD KEY `instrutor` (`instrutor`);

--
-- Indexes for table `unidadeseaman`
--
ALTER TABLE `unidadeseaman`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma`) REFERENCES `turma` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`unidade`) REFERENCES `unidadeseaman` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cursomateria`
--
ALTER TABLE `cursomateria`
  ADD CONSTRAINT `cursomateria_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cursomateria_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`instrutor`) REFERENCES `instrutor` (`CPF`);

--
-- Limitadores para a tabela `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `secretaria_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `secretaria_ibfk_2` FOREIGN KEY (`unidade`) REFERENCES `unidadeseaman` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turmainstrutor`
--
ALTER TABLE `turmainstrutor`
  ADD CONSTRAINT `turmainstrutor_ibfk_1` FOREIGN KEY (`instrutor`) REFERENCES `instrutor` (`CPF`) ON UPDATE CASCADE,
  ADD CONSTRAINT `turmainstrutor_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turma` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
