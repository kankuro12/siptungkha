create table popups(
    id int auto_increment,
    link text,
    image text,
    active tinyint default 0,
    created_at timestamp default current_timestamp(),
    updated_at timestamp  default current_timestamp(),
    PRIMARY KEY (id)
);

