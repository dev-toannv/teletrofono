create table customer(
	id int primary key auto_increment,
	customer_account varchar(30) not null unique,
	customer_password varchar(50) not null,
	customer_name varchar(40) not null,
	customer_phonenumber varchar(15),
	customer_dob date,
	customer_sex tinyint,
	customer_address varchar(200),
	customer_avatar varchar(200),
	customer_type int not null,
    foreign key(customer_type) references cus_type(cus_type),
	user_type tinyint default 3
)