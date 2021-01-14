create table image(
	product_id int not null,
    image_name varchar(200) not null,
    primary key(product_id,image_name),
    foreign key(product_id) references product(id)
)