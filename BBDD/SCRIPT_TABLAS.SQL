DROP TABLE IF EXISTS PRODUCTO;
DROP TABLE IF EXISTS PAGINA;

CREATE TABLE IF NOT EXISTS PAGINA (
	ID INT AUTO_INCREMENT,
	URL VARCHAR(250) NOT NULL,
	PRIMARY KEY (ID,URL)
	);

CREATE TABLE IF NOT EXISTS PRODUCTO ( 
	ID INT AUTO_INCREMENT NOT NULL, 
	MARCA VARCHAR(250) NOT NULL, 
	LINEA VARCHAR(250) NOT NULL, 
	MODELO VARCHAR(250) NOT NULL,  
	DESCRIPCION VARCHAR(500), 
	PRECIO FLOAT NOT NULL,
	FECHA_SALIDA DATETIME, 
	IMAGEN VARCHAR(255), 
	ID_PAGINA INT NOT NULL, 
	PRIMARY KEY (ID,MARCA,LINEA,MODELO),
	FOREIGN KEY (ID_PAGINA) REFERENCES pagina(ID) ON DELETE CASCADE 
	);
	
/*Mostrar fecha en la web*/
SELECT date_format(FECHA_SALIDA, "%d-%m-%Y %H:%i") from producto;

/*Trigger para eliminar producto cuando se elimine su pagina de referencia*/
DROP TRIGGER IF EXISTS `eliminar_producto`;

CREATE DEFINER=`root`@`localhost` TRIGGER `eliminar_producto` 
	AFTER DELETE ON `pagina` 
		FOR EACH ROW 
		DELETE from producto where id_pagina=old.id;


SET @num:=0;

UPDATE pagina SET id = @num:=(@num+1);

ALTER TABLE pagina AUTO_INCREMENT = 1;

