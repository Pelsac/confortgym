create database confortgym;
use confortgym;

create table roles(
    id int auto_increment not null,
    rol varchar(40) not null,
    primary key(id)
);
create table clientes(
    id int not null auto_increment,
    nombres varchar(70) not null,
    apellidos varchar(250) not null,
    fecha_nacimiento datetime not null,
    edad int not null,
    genero varchar(60) not null,
    cod_ingreso varchar(255) not null,
    primary key(id)
);
create table usuarios(
    id int not null auto_increment,
    nombre varchar(60) not null,
    password varchar(255) not null,
    correo varchar(200) not null,
    last_session datetime ,
    token varchar(130) not null,
    password_token varchar(130),
    password_request int(11) ,
    activo int(11) not null,
    id_rol int(11) not null,
    id_cliente int(11) not null,
    primary key(id),
    foreign key (id_rol) references roles(id),
    foreign key (id_cliente) references clientes(id));


create table sesiones_entrenamiento(
    id_sesion int not null auto_increment,
    fecha datetime not null,
    hora_ingreso time not null,
)