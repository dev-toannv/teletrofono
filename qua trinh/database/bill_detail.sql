create table bill_detail(
	id int primary key auto_increment,
    id_product int not null,
    foreign key(id_product) references product(id),
    id_bill int not null,
    foreign key(id_bill) references bill(id),
    quantity int not null,
    money float not null,
    product_name varchar(200) not null,
    product_image varchar(255) not null
)
