create table bill(
	id int primary key auto_increment,
	customer_id int not null,
	foreign key(customer_id) references cart(cart_idcustomer),
	bill_time datetime not null,
	bill_namecustomer varchar(40) not null,
	bill_address varchar(200) not null,
	bill_phonenumber varchar(15),
	bill_money float not null
)
