CREATE DATABASE examen_final;
CREATE TABLE usuario(
    usuario_id SERIAL NOT NULL,
    usuario_nombre VARCHAR (50),
    usuario_telefono VARCHAR (15),
    usuario_correo VARCHAR (20),
    PRIMARY KEY (usuario_id)
);