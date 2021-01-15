create table bill_detail(
    id_product int not null,
    id_bill int not null,
    primary key(id_product,id_bill),
    foreign key(id_product) references product(id),
    foreign key(id_bill) references bill(id),
    quantity int not null,
    money float not null,
    product_name varchar(200) not null,
    product_image varchar(255) not null
)