CREATE TABLE `categories`
(
    `id`         int(11) PRIMARY KEY NOT NULL,
    `name`       varchar(255)        NOT NULL,
    `created_at` datetime(6)         NOT NULL
);

CREATE TABLE `comments`
(
    `id`           int(11) PRIMARY KEY NOT NULL,
    `movie_id`     int(11)             NOT NULL,
    `writer`       varchar(255)        NOT NULL,
    `comment`      text                NOT NULL,
    `rating`       int(11)             NOT NULL,
    `commented_at` datetime            NOT NULL
);

CREATE TABLE `movies`
(
    `id`          int(11) PRIMARY KEY NOT NULL,
    `name`        varchar(400)        NOT NULL,
    `description` text                NOT NULL,
    `image`       varchar(200)        NOT NULL,
    `trailer`     varchar(200)        NOT NULL,
    `launched_at` datetime(6)         NOT NULL,
    `created_at`  datetime(6)         NOT NULL
);

CREATE TABLE `movie_categories`
(
    `movie_id`    int(11)     NOT NULL,
    `category_id` int(11)     NOT NULL,
    `related_at`  datetime(6) NOT NULL
);

CREATE TABLE `users`
(
    `id`         int(11) PRIMARY KEY NOT NULL,
    `name`       varchar(255)        NOT NULL,
    `lastname`   varchar(255)        NOT NULL,
    `email`      varchar(255)        NOT NULL,
    `password`   varchar(100)        NOT NULL,
    `image`      varchar(100)        NOT NULL,
    `type`       varchar(100)        NOT NULL,
    `created_at` datetime            NOT NULL
);

ALTER TABLE `categories`
    AUTO_INCREMENT = 5;
ALTER TABLE `comments`
    AUTO_INCREMENT = 10;
ALTER TABLE `movies`
    AUTO_INCREMENT = 13;
ALTER TABLE `users`
    AUTO_INCREMENT = 9;
