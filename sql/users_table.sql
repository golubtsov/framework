create table users
(
    id int primary key AUTO_INCREMENT,
    name varchar(255) not null,
    email varchar(255) not null unique,
    password varchar(255) not null,
    avatar varchar(255) default null,
    status varchar(255) default 'Новый пользователь',
    updated_at timestamp default CURRENT_TIMESTAMP,
    created_at timestamp default CURRENT_TIMESTAMP
);

insert into users (name, email, password) VALUES ('Admin', 'admin@admin.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');