-- Active: 1738615579685@@127.0.0.1@5432@upwork@public
CREATE DATABASE upwork ;

create Table users (
    id SERIAL PRIMARY key ,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    photo varchar(225),
    email varchar (225) UNIQUE,
    password VARCHAR(225),
    taux_horaire DECIMAL,
    role_id  INT ,
    Foreign Key (role_id) REFERENCES roles(id)
);

create Table roles (
    id SERIAL PRIMARY key ,
    role_name  varchar(225),
    description VARCHAR(225)
);

create table competences (
    id SERIAL PRIMARY key ,
    nom VARCHAR(225),
    description TEXT,
    level VARCHAR(225)
);

CREATE table categories (
     id SERIAL PRIMARY KEY ,
    name VARCHAR(50) UNIQUE,
    description TEXT
);

CREATE TABLE tags (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50) UNIQUE,
    description TEXT,
    logo VARCHAR(225)
) ;

create table projects(
    id SERIAL PRIMARY key ,
    titre VARCHAR(225),
    description text,
    budget DECIMAL,
    date_debut date,
    date_fin date,
    status 
)


CREATE TABLE projets_tags (
    projet_id INT,
    tag_id INT,
    FOREIGN KEY (projet_id) REFERENCES projets (id),
    FOREIGN KEY (tag_id) REFERENCES tags (id),
    PRIMARY KEY (projet_id, tag_id)
) ;


