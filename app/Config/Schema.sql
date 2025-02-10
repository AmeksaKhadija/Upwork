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

CREATE TABLE freelance_competence (
    freelance_id INT,
    competence_id INT,
    FOREIGN KEY (freelance_id) REFERENCES users (id),
    FOREIGN KEY (competence_id) REFERENCES competences (id),
    PRIMARY KEY (freelance_id, competence_id)
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

CREATE TYPE status AS ENUM ('à faire','en cours','terminé');
 CREATE TABLE projets(
    id SERIAL PRIMARY key ,
    titre VARCHAR(225),
    description text,
    budget DECIMAL,
    date_debut date,
    date_fin date,
    categorie_id INT,
    client_id int,
    status status,
    FOREIGN KEY (client_id) REFERENCES users (id),
    FOREIGN KEY (categorie_id) REFERENCES categories (id)
);
ALTER TABLE projets
ALTER COLUMN status SET DEFAULT 'à faire';

CREATE TABLE projets_tags (
    projet_id INT,
    tag_id INT,
    FOREIGN KEY (projet_id) REFERENCES projets (id),
    FOREIGN KEY (tag_id) REFERENCES tags (id),
    PRIMARY KEY (projet_id, tag_id)
) ;

create type paiement_status as ENUM ('Non payé','payé');
CREATE table paiements(
    int SERIAL PRIMARY key ,
    amount DECIMAL,
    status paiement_status ,
    type VARCHAR(225),
    paye_id int,
    payeur_id  INT,
    FOREIGN KEY (paye_id) REFERENCES users (id),
    FOREIGN KEY (payeur_id) REFERENCES users (id)
);
ALTER TABLE paiements
ALTER COLUMN  status SET DEFAULT 'Non payé';

create table messages(
    id SERIAL primary key ,
    contenu text ,
    sender_id int ,
    receiver_id int 
    FOREIGN KEY (sender_id) REFERENCES users (id),
    FOREIGN KEY (receiver_id) REFERENCES users (id)
);

create table reviews (
    id SERIAL PRIMARY key ,
    rating int CHECK (rating >= 0 AND rating <= 5),
    commentaire text,
    reviewer_id int ,
    FOREIGN KEY (reviewer_id) REFERENCES users (id)
);
create type propo_status as ENUM ('pending','accepted','rejected');
create  table propositions(
    id serial PRIMARY key ,
    amount DECIMAL,
    status propo_status,
    freelance_id int ,
    projet_id int ,
    FOREIGN KEY (freelance_id) REFERENCES users (id),
    FOREIGN KEY (projet_id) REFERENCES projets (id)

);
ALTER TABLE propositions
ALTER COLUMN status SET DEFAULT 'pending';

 insert into roles (role_name,description) values ('freelancer','role freelancer');

 
alter table users 
ADD COLUMN portfolio varchar(225);









