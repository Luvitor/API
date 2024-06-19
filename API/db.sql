
create database android;

use android;

create table Usuario(
idUsu int not null auto_increment,
nome varchar(100),
senha varchar(100),
primary key(codUsu)
);
create table Rating(
idRat int not null auto_increment,
rating int(5) not null,
codUsu int not null,
primary key(idRat),
foreign key (codUsu) references Usuario(idUsu)
);
