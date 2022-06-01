SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS auditoria.auditoria;
/*
CREATE TABLE auditoria.auditoria
(
   id         int NOT NULL AUTO_INCREMENT,
   type       varchar(255) DEFAULT NULL,
   tabla      varchar(255) DEFAULT NULL,
   old text,
   new text,
   valor_alterado text,
   usuario    varchar(255) DEFAULT NULL,
   ip         varchar(255) DEFAULT NULL,
   fecha      timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(),
   PRIMARY KEY(id)
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARSET = utf8;
*/

USE auditoria;
drop TABLE if exists auditoria.regaudit;
CREATE TABLE auditoria.regaudit
(
   fecha_cambio         TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   nombre_disparador    VARCHAR(30) NOT NULL,
   tipo_disparador      VARCHAR(15) NOT NULL,
   nivel_disparador     VARCHAR(15) NOT NULL,
   comando              VARCHAR(45) NOT NULL,
   tabla                VARCHAR(45) NOT NULL,
   usuario              VARCHAR(100) NOT NULL,
   iphost               VARCHAR(100) NOT NULL,
   old_info             LONGTEXT NOT NULL,
   new_info             LONGTEXT NOT NULL
);

SET FOREIGN_KEY_CHECKS = 1;