create table add_edit_product(
	id_product int not null,
	id_user_add int not null,
	id_user_edit_last int not null,
	primary key(id_product,id_user_add,id_user_edit_last),
	foreign key(id_user_add) references manager(id),
	foreign key(id_product) references product(id),
	foreign key(id_user_edit_last) references manager(id),
	time_add datetime not null,
	time_edit_last datetime not null
)