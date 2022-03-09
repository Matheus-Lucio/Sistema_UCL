create database UCL;

CREATE TABLE `agenda` (
  `age_id` int(11) NOT NULL,
  `age_data` date NOT NULL,
  `age_horario` time NOT NULL,
  `med_id` int(11) NOT NULL,
  `pac_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `for_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `agenda` (`age_id`, `age_data`, `age_horario`, `med_id`, `pac_id`, `con_id`, `for_id`) VALUES
(2, '2020-06-25', '07:44:00', 12, 12, 19, 17),
(38, '2020-06-22', '15:40:00', 23, 20, 20, 18),
(40, '2020-06-18', '11:40:00', 13, 12, 13, 17),
(41, '2020-06-20', '15:00:00', 22, 19, 13, 18);


CREATE TABLE `convenios` (
  `con_id` int(11) NOT NULL,
  `con_nome` varchar(45) NOT NULL,
  `con_status` int(1) NOT NULL DEFAULT 1,
  `con_ANS` int(6) NOT NULL,
  `con_tempo_fatura` int(3) NOT NULL,
  `con_particular` varchar(3) NOT NULL,
  `con_principal` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `convenios` (`con_id`, `con_nome`, `con_status`, `con_ANS`, `con_tempo_fatura`, `con_particular`, `con_principal`) VALUES
(12, 'Assim', 1, 741852, 50, 'Não', 'Sim'),
(13, 'Saúde Rio', 1, 951478, 40, 'Sim', 'Não'),
(14, 'Rede Sul', 1, 789456, 60, 'Sim', 'Sim'),
(19, 'Unimed', 1, 123456, 30, 'Sim', 'Não'),
(20, 'United Class', 1, 745896, 20, 'Sim', 'Sim');


CREATE TABLE `formas_pagamento` (
  `for_id` int(11) NOT NULL,
  `for_nome` varchar(255) NOT NULL,
  `for_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `formas_pagamento` (`for_id`, `for_nome`, `for_status`) VALUES
(17, 'Crédito', 1),
(18, 'Debito', 1),
(19, 'Dinheiro', 1);

CREATE TABLE `medicos` (
  `med_id` int(11) NOT NULL,
  `med_nome` varchar(45) NOT NULL,
  `med_CRM` varchar(50) NOT NULL,
  `med_especialidade` varchar(50) NOT NULL,
  `med_especialidade2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `medicos` (`med_id`, `med_nome`, `med_CRM`, `med_especialidade`, `med_especialidade2`) VALUES
(12, 'Matheus Lucio', '123456', 'Farmacêutico', 'Cardiologista'),
(13, 'Orlando B.', '963852', 'Cardiologista', ''),
(22, 'Alinson Lopes', '741852', 'Cardiologista', ''),
(23, 'Claudio Gimenez', '456789', 'Pediatra', '');


CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_nome` varchar(45) NOT NULL,
  `pac_telefone` bigint(11) NOT NULL,
  `pac_CPF` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pacientes` (`pac_id`, `pac_nome`, `pac_telefone`, `pac_CPF`) VALUES
(12, 'Harry', 985724582, 12345678910),
(13, 'Lucas', 0, 0),
(14, 'Luiz', 0, 0),
(16, 'Roberto', 0, 0),
(18, 'Danielle', 0, 0),
(19, 'Rodrigo', 0, 0),
(20, 'Felipe', 0, 0),
(24, 'Bruno', 30154142, 17245268811),
(25, 'Fabio', 30190484, 11122233310);


CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(45) NOT NULL,
  `usu_email` varchar(45) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `usuarios` (`usu_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_tipo`) VALUES
(27, 'Matheus Lucio', 'matheuslucio10@live.com', '99cac301fcbcd8ed44a8680b270fad51', 'Adm'),
(29, 'Claudio Gimenez', 'claudiogimenez@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Usuário'),
(32, 'Geral', 'geral@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Usuário'),
(33, 'Orlando Bendelack', 'orlando@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Adm'),
(34, 'Alinson Lopes', 'alinsonlopes@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Adm');

ALTER TABLE `agenda`
  ADD PRIMARY KEY (`age_id`),
  ADD KEY `medicos_fk` (`med_id`) USING BTREE,
  ADD KEY `pacientes_fk` (`pac_id`) USING BTREE,
  ADD KEY `formas_pagamento_fk` (`for_id`) USING BTREE,
  ADD KEY `convenios_fk` (`con_id`) USING BTREE;

ALTER TABLE `convenios`
  ADD PRIMARY KEY (`con_id`);

ALTER TABLE `formas_pagamento`
  ADD PRIMARY KEY (`for_id`);

ALTER TABLE `medicos`
  ADD PRIMARY KEY (`med_id`);

ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pac_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

ALTER TABLE `agenda`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `convenios`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `formas_pagamento`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `medicos`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `agenda`
  ADD CONSTRAINT `covenant_fk` FOREIGN KEY (`con_id`) REFERENCES `convenios` (`con_id`),
  ADD CONSTRAINT `medic_fk` FOREIGN KEY (`med_id`) REFERENCES `medicos` (`med_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pacient_fk` FOREIGN KEY (`pac_id`) REFERENCES `pacientes` (`pac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `payments_fk` FOREIGN KEY (`for_id`) REFERENCES `formas_pagamento` (`for_id`);
COMMIT;
