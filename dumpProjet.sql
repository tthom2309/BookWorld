create database projetWeb;
use projetWeb;

create table `role`(
	id_role int(11),
	name varchar(50),
	primary key(id_role)
)engine=InnoDB default charset=utf8;

create table `user`(
	id_user int(11) auto_increment,
	login varchar(50),
	password varchar(255),
	name varchar(50),
	surname varchar(50),
	adress varchar(255),
	mail varchar(100),
	role int(11),
	primary key(id_user),
	foreign key (role) references `role`(id_role)
)engine=InnoDB default charset=utf8;

create table `category`(
	id_category int(11) auto_increment,
	name_cat varchar(50),
	primary key(id_category)
)engine=InnoDB default charset=utf8;

create table `publisher`(
	id_publisher int(11) auto_increment,
	name varchar(100),
	primary key(id_publisher)
)engine=InnoDB default charset=utf8;

create table `author`(
	id_author int(11) auto_increment,
	name varchar(255),
	primary key(id_author)
)engine=InnoDB default charset=utf8;

create table `book`(
	isbn varchar(17),
	label varchar(100),
	publisher int(11),
	author int(11),
	category int(11),
	price float(5,2),
	quantity_available int(11),
	primary key(isbn),
	foreign key (publisher) references `publisher`(id_publisher),
	foreign key (author) references `author`(id_author),
	foreign key (category) references `category`(id_category)
)engine=InnoDB default charset=utf8;

create table `status`(
	id_status int(11),
	name varchar(20),
	primary key(id_status)
)engine=InnoDB default charset=utf8;

create table `order`(
	id_order int(11) auto_increment,
	`user` int(11),
	`status` int(11),
	primary key(id_order),
	foreign key (`user`) references `user`(id_user),
	foreign key (`status`) references `status`(id_status)
)engine=InnoDB default charset=utf8;

create table `bookOrder`(
	id_book_order int(11) auto_increment,
	num_order int(11),
	book varchar(17),
	price float(5,2),
	quantity int(3),
	primary key(id_book_order),
	foreign key (num_order) references `order`(id_order),
	foreign key (book) references `book`(isbn)
)engine=InnoDB default charset=utf8;





insert into `role` values(1,'Admin'),(2,'Worker'),(3,'Customer');

insert into `status` values(1,'En cours'),(2,'Validée'),(3,'Annulée');

insert into `category`(name_cat) values('Science-fiction'),('Fantasy'),('Médiéval-fantasy'),
('Littérature classique'),('Sciences'),('Histoire'),('BD'),('Comics'),('Manga'),('Policier et thriller');

insert into `publisher`(name) values('FOLIO SCIENCE-FICTION'),('J''AI LU'),('GF Flammarion'),('POCKET'),
('Librio'),('Milady'),('Bragelonne');

insert into `author`(name) values('Isaac Asimov'),('Machiavel'),('Drew Karpyshyn'),('Markus Heitz');

insert into `user`(login,password,name,surname,adress,mail,role) values
('Admin','$2y$10$5VDpCmr1DfBzsi9dq9VtjuEfA2YFo.EeVE3rKoYnx8HogRgHQ0DoG','Tratskas','Thomas','Rue fictive 12, 3000 VilleFictive','emailTest1@test.com',1),
('EmployeTest','$2y$10$whPG2Gejtk5Hs7y6hPc0pOJ8o7/0UwPrbCOBo1En5qLOSZPeRvqS6','NomEmploye','PrenomEmploye','Rue fictive 22, 3000 VilleFictive','emailTest2@test.com',2),
('ClientTest','$2y$10$1eiB/v5uI9GKb/xmde0eFu6AqgYS/KmoJeM5tFZo5H.qaLjXQPfze','NomCustomer','PrenomCustomer','Rue fictive 32, 3000 VilleFictive','emailTest3@test.com',3);