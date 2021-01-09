create table active_bill(
	id_bill int not null,
    foreign key(id_bill) references bill(id),
    id_user int not null,
    user_type int not null,
    foreign key(user_type) references user_type(user_type),
    time_active datetime not null
)