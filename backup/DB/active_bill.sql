create table active_bill(
	id_bill int not null,
    id_user int not null,
    primary key(id_bill,id_user ),
    foreign key(id_bill) references bill(id),
    time_active datetime not null
)