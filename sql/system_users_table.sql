create table system_users
(
    id int primary key AUTO_INCREMENT,
    name varchar(255) not null,
    email varchar(255) not null unique,
    password varchar(255) not null,
    avatar varchar(255) default null,
    role integer default 0,
    updated_at timestamp default CURRENT_TIMESTAMP,
    created_at timestamp default CURRENT_TIMESTAMP
);

insert into system_users (name, email, password) VALUES ('Пользователь 1', 'user1@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
insert into system_users (name, email, password) VALUES ('Пользователь 2', 'use2r@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
insert into system_users (name, email, password) VALUES ('Пользователь 3', 'user3@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
insert into system_users (name, email, password) VALUES ('Администратор', 'admin@admin.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');