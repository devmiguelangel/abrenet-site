--TABLAS
	--usuario
	--slider
	--carrousel

create database abrenet_db;
use abrenet_db;

drop table if exists cp_usuario;
create table if not exists cp_usuario(
	us_id int(255) not null primary key auto_increment,
	us_user varchar(50) not null unique key,
	us_pass text not null,
	us_permiso int(1) not null
);

drop table if exists cp_slider;
create table cp_slider(
	sl_id int(255) not null primary key auto_increment,
	sl_img text not null,
	sl_descripcion text not null,
	sl_orden int(255) not null,
	sl_user int(255),
	foreign key (sl_user) references cp_usuario(us_id)
);

drop table if exists cp_carrousel;
create table cp_carrousel(
	cr_id int(255) not null primary key auto_increment,
	cr_img text not null,
	cr_url text not null,
	cr_user int(255),
	foreign key (cr_user) references cp_usuario(us_id)
);

drop table if exists cp_textBanner;
create table cp_textBanner(
	tx_id int(255) not null primary key auto_increment,
	tx_texto text not null,
	tx_idioma varchar(2) not null,
	tx_user int(255),
	foreign key (tx_user) references cp_usuario(us_id)
);
