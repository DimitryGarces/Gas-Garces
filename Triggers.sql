--Borrar triggers--
DROP TRIGGER IF EXISTS nombre_del_trigger;

--Ver los triggers--
SHOW TRIGGERS;

CREATE TRIGGER CREARUSUARIO
AFTER INSERT ON DATOSPERSONALES
FOR EACH ROW
-- Insertar un nuevo usuario asociado al Id_Datos recién insertado
INSERT INTO Usuario (Id_Datos) VALUES (NEW.Id_Datos);


