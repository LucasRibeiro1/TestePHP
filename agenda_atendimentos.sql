-- Tabela de Agendamentos / Agenda de Atendimentos
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id`          INT(11) NOT NULL AUTO_INCREMENT,
  `titulo`      VARCHAR(255) NOT NULL,
  `cliente`     VARCHAR(255) NOT NULL,
  `descricao`   TEXT DEFAULT NULL,
  `data_inicio` DATETIME NOT NULL,
  `data_fim`    DATETIME NOT NULL,
  `cor`         VARCHAR(20) DEFAULT '#2563eb',
  `status`      ENUM('agendado','confirmado','concluido','cancelado') DEFAULT 'agendado',
  `usuario_id`  INT(11) DEFAULT NULL,
  `criado_em`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
