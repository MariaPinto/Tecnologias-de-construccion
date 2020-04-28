CREATE USER 'maria'@'localhost' IDENTIFIED BY '12345678';

GRANT ALL PRIVILEGES ON * . * TO 'maria'@'localhost';

FLUSH PRIVILEGES;

create database tds;

use tds;

create table usuarios(
	usuario_id int,
	cont varchar(100),
	token varchar(100),
	act bool,
	created datetime
);

insert into usuarios(usuario_id, cont, token, act, created) values(1, '12345', 'pruebatoken', true, now());
insert into usuarios(usuario_id, cont, token, act, created) values(2, 'pswdamigo', 'pruebatoken', true, now());
