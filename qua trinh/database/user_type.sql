user_typecreate table user_type(
	id int primary key auto_increment,
    user_type int not null unique,
    type_name varchar(40) not null
)