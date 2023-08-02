CREATE DATABASE EisenDo;

USE EisenDo;

CREATE TABLE users(
	id int NOT null AUTO_INCREMENT,
    username varchar(255),
    email_id varchar(255),
    password varchar(255),
    created_at timestamp,
    updated_at timestamp,

    PRIMARY KEY(id)
);

CREATE TABLE categorys(
	id int NOT null AUTO_INCREMENT,
    category_name varchar(255),
    created_at timestamp,
    updated_at timestamp,

    PRIMARY KEY(id)
);

CREATE TABLE module_matrix(
	id int NOT null AUTO_INCREMENT,
    matrix_name varchar(255),
    created_at timestamp,
    updated_at timestamp,

    PRIMARY KEY(id)
);

CREATE TABLE tasks(
	id int NOT null AUTO_INCREMENT,
    task_name varchar(255),
    dates date,
    user_id int,
    category_id int,
    matrix_id int,
    comments varchar(255),
    created_at timestamp,
    updated_at timestamp,

    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(category_id) REFERENCES categorys(id),
    FOREIGN KEY(matrix_id) REFERENCES module_matrix(id)
);

create table addTask (
    id int not null AUTO_INCREMENT PRIMARY key,
    name varchar(250),
    created_at timestamp,
    updated_at timestamp
);

create table userAddedTask(
id int not null AUTO_INCREMENT PRIMARY KEY,
user_id int,
addTask_id int,
created_at timestamp,
updated_At timestamp,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (addTask_id) REFERENCES addTask(id)
    );



INSERT INTO `categorys` (`id`, `category_name`, `created_at`, `updated_at`) VALUES (NULL, 'professional', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'Personal', current_timestamp(), '0000-00-00 00:00:00.000000');


INSERT INTO `module_matrix` (`id`, `matrix_name`, `created_at`, `updated_at`) VALUES (NULL, 'do', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'defer', current_timestamp(), '0000-00-00 00:00:00.000000');

INSERT INTO `module_matrix` (`id`, `matrix_name`, `created_at`, `updated_at`) VALUES (NULL, 'delegate', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'delete', current_timestamp(), '0000-00-00 00:00:00.000000');


INSERT INTO `users` (`id`, `username`, `email_id`, `password`, `created_at`, `updated_at`) VALUES (NULL, 'sunil', 'sunil123@gmail.com', 'sunil123', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'srija', 'srija123@gmail.com', 'srija123', current_timestamp(), '0000-00-00 00:00:00.000000');

INSERT INTO `tasks` (`id`, `task_name`, `dates`, `user_id`, `category_id`, `matrix_id`, `comments`, `created_at`, `updated_at`) VALUES (NULL, 'drink water', '2023-07-12', '2', '2', '3', 'Every one hour i need to drink water ', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'Prepare PHP ', '2023-07-18', '1', '1', '1', 'I need to prepare for PHP assessment with in today night', current_timestamp(), '0000-00-00 00:00:00.000000');


INSERT INTO `tasks` (`task_name`, `dates`, `user_id`, `category_id`, `matrix_id`, `comments`, `created_at`, `updated_at`) VALUES ( 'walk', '2023-07-12', '2', '2', '1', 'Every one hour i need to drink water ', current_timestamp(), '0000-00-00 00:00:00.000000'), ('exercise', '2023-07-18', '2', '1', '1', 'I need to prepare for PHP assessment with in today night', current_timestamp(), '0000-00-00 00:00:00.000000');

INSERT INTO `addTask` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, 'Drink water, Keep healthy', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'Go Exercising', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'Go to bed Early', current_timestamp(), '0000-00-00 00:00:00.000000'), (NULL, 'Keep Reading', current_timestamp(), '0000-00-00 00:00:00.000000');

SELECT * from tasks where user_id = 2;

SELECT * from tasks where user_id = 2 AND matrix_id = 1;

SELECT * from tasks where user_id = 2 AND matrix_id = 1 AND category_id = 1;

SELECT id FROM `users` WHERE username = 'sunil';

