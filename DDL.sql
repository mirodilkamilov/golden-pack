USE `golden-pack`;

CREATE TABLE advantages
(
    id          BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    title       JSON         NOT NULL,
    description JSON         NOT NULL,
    image       VARCHAR(255) NOT NULL,
    position    INT UNSIGNED NOT NULL
)
    COLLATE = utf8mb4_unicode_ci;

CREATE TABLE applications
(
    id         BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    name       VARCHAR(255) NOT NULL,
    phone      VARCHAR(255) NOT NULL,
    email      VARCHAR(255) NULL,
    created_at TIMESTAMP    NULL,
    updated_at TIMESTAMP    NULL
)
    COLLATE = utf8mb4_unicode_ci;

create table if not exists company_details
(
    id bigint unsigned auto_increment
        primary key,
    title json null,
    description json null,
    image varchar(255) null,
    about_title json null,
    about_description json null,
    about_image varchar(255) null,
    address json null,
    phone json null,
    email json null,
    google_map text null,
    social_media json null
)
    collate=utf8mb4_unicode_ci;

CREATE TABLE cooperations
(
    id    BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    list  JSON         NOT NULL,
    image VARCHAR(255) NOT NULL
)
    COLLATE = utf8mb4_unicode_ci;

CREATE TABLE equipment
(
    id          BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    title       JSON         NOT NULL,
    description JSON         NOT NULL,
    image       VARCHAR(255) NOT NULL,
    position    INT UNSIGNED NOT NULL
)
    COLLATE = utf8mb4_unicode_ci;

CREATE TABLE portfolios
(
    id          BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    title       JSON         NOT NULL,
    description JSON         NOT NULL,
    image       VARCHAR(255) NOT NULL,
    position    INT UNSIGNED NOT NULL
)
    COLLATE = utf8mb4_unicode_ci;

CREATE TABLE processes
(
    id          BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    title       JSON         NOT NULL,
    description JSON         NOT NULL,
    image       VARCHAR(255) NOT NULL,
    position    INT UNSIGNED NOT NULL
)
    COLLATE = utf8mb4_unicode_ci;

CREATE TABLE testimonials
(
    id          BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    name        VARCHAR(255) NOT NULL,
    title       JSON         NOT NULL,
    description JSON         NOT NULL,
    image       VARCHAR(255) NOT NULL,
    position    INT UNSIGNED NOT NULL
)
    COLLATE = utf8mb4_unicode_ci;

CREATE TABLE users
(
    id                BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    name              VARCHAR(255) NOT NULL,
    email             VARCHAR(255) NOT NULL,
    email_verified_at TIMESTAMP    NULL,
    password          VARCHAR(255) NOT NULL,
    remember_token    VARCHAR(100) NULL,
    created_at        TIMESTAMP    NULL,
    updated_at        TIMESTAMP    NULL,
    CONSTRAINT users_email_unique
        UNIQUE (email)
)
    COLLATE = utf8mb4_unicode_ci;

