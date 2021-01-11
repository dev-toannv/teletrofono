create table count_bill_customer(
	id int primary key auto_increment,
	id_cus int not null,
	foreign key(id_cus) references customer(id),
    quantity_bill int not null
)