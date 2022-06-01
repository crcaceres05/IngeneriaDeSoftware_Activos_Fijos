DROP PROCEDURE IF EXISTS auditoria.sp_auditoria_log;
DELIMITER $$
CREATE PROCEDURE auditoria.sp_auditoria_log (
                                   IN disparador VARCHAR(30), 
                                   IN tipo VARCHAR(15), 
                                   IN nivel VARCHAR(15), 
                                   IN comando VARCHAR(45),
                                   IN tabla VARCHAR(45),
                                   IN oldInfo LONGTEXT, 
                                   IN newInfo LONGTEXT)
BEGIN
      -- Obtine la IP de la conexion
      select host as IP INTO @ipcl from information_schema.processlist WHERE ID=connection_id();
      
      --
      
      INSERT INTO auditoria.regaudit (nombre_disparador,tipo_disparador,
                                    nivel_disparador,comando,tabla,usuario,iphost,old_info,new_info) 
      VALUES (disparador, tipo, nivel, comando, tabla, CURRENT_USER, @ipcl,oldInfo, newInfo);
END $$