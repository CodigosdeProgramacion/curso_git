DROP DATABASE IF EXISTS curso_git;
CREATE DATABASE curso_git;
USE curso_git;

DROP TABLE IF EXISTS message_history;
CREATE TABLE message_history (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(128) NOT NULL,
    message TEXT NULL,

    PRIMARY KEY(id)
);

INSERT INTO message_history (name, email, message) 
VALUES ('ElWazy', 'mi_correo@example.com', 'Hola Mundo'),
('ElWazy', 'mi_correo@example.com', 'Que tal'),
('ElWazy', 'mi_correo@example.com', 'Mensaje de prueba'),
('ElWazy', 'mi_correo@example.com', 'Hola mundo');

SELECT * FROM message_history;