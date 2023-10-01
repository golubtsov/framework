create table notes
(
    id int primary key AUTO_INCREMENT,
    user_id int not null,
    title varchar(255) not null unique,
    text varchar(255) not null,
    updated_at timestamp default CURRENT_TIMESTAMP,
    created_at timestamp default CURRENT_TIMESTAMP
);

insert into notes (user_id, title, text) VALUES (1, 'Note 1', 'Some text for note');