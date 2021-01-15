create table manager(
	id int primary key auto_increment,
	manager_code char(12) unique not null,
	manager_name varchar(40) not null,
	manager_password varchar(50) not null,
	manager_email varchar(100) not null unique,
	manager_sex tinyint not null,
	manager_dob date not null,
	manager_address varchar(200), -- dia chi hien tai
	manager_hometown varchar(200), -- que quan
	manager_avatar varchar(150),
	manager_timestart datetime not null,
	user_type tinyint not null,
	manager_salary_basic float,
	manager_allowance float -- luong phu cap
)