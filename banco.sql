create database cadastro_livros;
drop table livros;

use cadastro_livros;
create table livros(
id INT auto_increment primary key,
nome varchar(100) not null,
tipo varchar (150) not null,
autor varchar (150) not null,
editora varchar(150) not null
);