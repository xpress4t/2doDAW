/* TODO EN phpMyAdmin */
-- Primero ejecuto esto, hasta la línea 7
CREATE TABLE usuarios(
    id SMALLINT UNSIGNED AUTO_INCREMENT,
    user VARCHAR(50) UNIQUE NOT NULL,
    pass BLOB UNIQUE NOT NULL,
    PRIMARY KEY(id)
)ENGINE = InnoDB;

--AES

--Insertar en la tabla
/*
INSERT INTO usuarios(user,pass)
VALUES('pepe@hotmail.com',AES_ENCRYPT('1234qwerty','almandrullos'));

INSERT INTO usuarios(user,pass)
VALUES('juan@hotmail.com',AES_ENCRYPT('hijkqwerty','almandrullos'));
*/
-- NO FUNCIONA ASÌ **********
SELECT * FROM usuarios
WHERE user = 'pepe@hotmail.com'
AND pass = '1234qwerty';

-- Luego ejecuto esto, de la línea 26 a la 28
-- FUNCIONA ASÌ **********
-- Ejecutando esto se puede ver la contraseña cifrada
SELECT * FROM usuarios
WHERE user = 'pepe@hotmail.com'
AND AES_DECRYPT(pass,'almandrullos') = '1234qwerty';


-- Finalmente, ejecuto de la línea 32 a la 35
-- Ejecutando esto, se puede ver la contraseña desencriptada
SELECT user, CAST(AES_DECRYPT(pass,'almandrullos') AS CHAR)
FROM usuarios
WHERE user = 'pepe@hotmail.com'
AND AES_DECRYPT(pass,'almandrullos') = '1234qwerty'


/*
CREATE TABLE libros(
    id_libro SMALLINT UNSIGNED,
    titulo VARCHAR(100) NOT NULL,
    etc...,
    id_autor con los mismos
    PRIMARY KEY(id),
    FOREIGN KEY(id_autor) REFERENCES autores(id_autor) ON UPDATE CASCADE ON DELETE NO ACTION
);
*/