create table add_edit_product(
	id int primary key auto_increment,
	id_product int not null unique,
	foreign key(id_product) references product(id),
	type_user_add int not null,
	foreign key(type_user_add) references user_type(user_type),
	id_user_add int not null,
	type_user_edit_last int not null,
	foreign key(type_user_edit_last) references user_type(user_type),
	id_user_edit_last int not null,
	time_add datetime not null,
	time_edit_last datetime not null
)