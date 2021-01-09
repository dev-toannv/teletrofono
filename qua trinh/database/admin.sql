create table superadmin(
	id int primary key auto_increment,
    admin_acc varchar(150) not null unique,
    admin_pass varchar(150) not null,
    admin_name varchar(50) not null,
    user_type int not null,
    FOREIGN KEY(user_type) REFERENCES user_type(user_type)
)