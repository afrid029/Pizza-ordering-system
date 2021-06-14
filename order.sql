create table orders (
	ID int not null AUTO_INCREMENT,
	Customer_name varchar(10),
	Phone_num varchar(10),
	NIC varchar(20),
	Delivery_date date,
	Pizza_type varchar(30),
	Pizza_size varchar(30),
	Quantity int,
	status varchar(20) default 'neworder',
	bill double,
	primary key(ID));
	
create table admins (
	username varchar(8),
	password varchar(10)
);
create table if not exists pricelist(
	Pizza_type varchar(30),
	Pizza_size varchar(30),
	price double
);
insert into pricelist values 
	("chicken" , "large" , 2000),
	("chicken" , "medium" , 1500),
	("chicken" , "small" , 1000),
	("mutton" , "large" , 2000),
	("mutton" , "medium" , 1600),
	("mutton" , "small" , 1100),
	("veg" , "large" , 1500),
	("veg" , "medium" , 1200),
	("veg" , "small" ,900);
	
create table delivered (
	ID int not null AUTO_INCREMENT,
	Customer_name varchar(10),
	Phone_num varchar(10),
	NIC varchar(20),
	Delivery_date date,
	Pizza_type varchar(30),
	Pizza_size varchar(30),
	Quantity int,
	status varchar(20) default 'neworder',
	bill double,
	primary key(ID));
