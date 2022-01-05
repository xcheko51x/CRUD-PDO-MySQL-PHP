create database pruebas;

use pruebas;

create table usuarios(
    idUsuario int primary key auto_increment,
    usuario varchar(50) not null,
    contrasena varchar(10) not null,
    email varchar(50) not null
);

insert into usuarios values('', "xcheko51x", "cheko1234", "cheko@local.com");
insert into usuarios values('', "lauralp", "laura1234", "laura@local.com");
insert into usuarios values('', "betozh", "beto1234", "beto@local.com");