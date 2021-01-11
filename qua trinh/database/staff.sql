create table staff(
id int primary key auto_increment,
staff_code char(12) unique not null,
staff_name varchar(40) not null,
staff_password varchar(50) not null,
staff_email varchar(100) not null unique,
staff_sex tinyint not null,
staff_dob date not null,
staff_address varchar(200), -- dia chi hien tai
staff_hometown varchar(200), -- que quan
staff_avatar varchar(150),
staff_timestart datetime not null,
user_type int not null,
foreign key(user_type) references user_type(user_type),
staff_salary_basic float,
salary_allowance float -- luong phu cap
)
