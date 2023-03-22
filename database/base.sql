CREATE TABLE categorie(
   id serial primary key,
   nom varchar
);

CREATE TABLE article(
   id serial primary key,
   "resume" text,
   categorieId int,
   contenu text,
   foreign key (categorieId)references categorie(Id)

);
-- insert into `article`(nom,email,mdp) values('admin','admin','admin');

    alter table article add column created_at timestamp;
        alter table article add column updated_at timestamp;
    alter table categorie add column created_at timestamp;
        alter table categorie add column updated_at timestamp;
