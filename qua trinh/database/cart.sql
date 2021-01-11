create table cart(
	id int primary key auto_increment,
	cart_idproduct int not null,
	foreign key(cart_idproduct) references product(id),
	cart_idcustomer int not null,
	foreign key(cart_idcustomer) references customer(id)
)