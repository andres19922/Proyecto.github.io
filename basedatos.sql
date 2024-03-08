create database basedatos;
use basedatos;

create table usuario(
cedulaU int not null primary key,
nombre varchar(30) not null,
apellido varchar(30) not null,
usuario varchar(30) not null,
password varchar(20) not null,
correo varchar(40) not null,
direccion varchar(40) not null,
ciudad varchar(30) not null ,
genero varchar(20) not null,
F_nacimiento date not null
);

INSERT INTO `usuario`(`cedulaU`, `nombre`, `apellido`, `usuario`, `password`, `correo`, `direccion`, `ciudad`, `genero`, `F_nacimiento`) VALUES ('1014284949','andres felipe','zuleta','andru9365','12345','andru9365@gmail.com','cll 75 n 85-49','bogota','masculino','1996/10/07');

create table productos(
id int primary key AUTO_INCREMENT,
nombre text not null,
descripcion text not null,
imagen text not null,
precio double not null
);
INSERT INTO `productos`(`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES ('1','Mac PRO','Pantalla de 13,3 pulgadas retroiluminado por led y resolucion 2560 x 1600', 'mac.png','1900000');
INSERT INTO `productos`(`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES ('2','Ipod','Este es un Ipod vercion 2017 color blanco con margen azul y audiculares', 'ipod.jpg','20000');
INSERT INTO `productos`(`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES ('3','Iphone','Pantalla Retina HD con 3D Touch Pantalla Retina HD de 4,7 pulgadas retroiluminada por LED Pantalla Multi-Touch', 'iphone.jpg','600000');

create table factura(
Num_factura int primary key AUTO_INCREMENT,
cedulaU int not null,
nombre varchar(40) not null,
apellido varchar(40) not null,
ciudad varchar(40) not null ,
direccion varchar(40) not null,
Tipo_tarjeta varchar(10)not null,
N_tarjeta varchar(15) not null,
F_caducidad date not null,
C_seguridad int (4) not null

);

create table compras(
id_Compra int primary key AUTO_INCREMENT,
numeroventa int not null,
nombre text not null,
imagen text not null,
precio text not null,
cantidad text not null,
subtotal text not null
);
