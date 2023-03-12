--start serve in shell pgsql 
php -S localhost:8000 -t public/
-- create DATABASE
 create database mini_facebook;
--  create ROLE
create role fenosoa login password '123';
-- connect database
\c mini_facebook feno; 
-- get Access db for user or role
alter database mini_facebook owner to fenosoa;

-- mofidify access in config database -- enter folder config -- database.php pgsql 

CREATE TABLE membres (
    id_mb serial PRIMARY KEY not null,
    nom VARCHAR(60),
    mail VARCHAR(50) NOT NULL UNIQUE,
    dtn DATE NOT NULL,
    mot_de_pass VARCHAR(20)
);
CREATE TABLE amis (
    id_mb1 INTEGER NOT NULL,
    id_mb2 INTEGER NOT NULL,
    dhdmd timestamp NOT NULL,
    dhaccp timestamp,
    FOREIGN KEY (id_mb1) REFERENCES membres(id_mb),
    FOREIGN KEY (id_mb2) REFERENCES membres(id_mb)
);
CREATE TABLE publication (
    id_pub serial PRIMARY KEY not null,
    dhpub timestamp NOT NULL,
    articlepub TEXT,
    typeaffiche VARCHAR(20),
    id_mbr INTEGER NOT NULL,
    FOREIGN KEY(id_mbr) REFERENCES membres(id_mb)
);
CREATE TABLE commentaires (
    id_com serial PRIMARY KEY not null,
    dhcom timestamp NOT NULL,
    commtext TEXT NOT NULL,
    id_publi INTEGER NOT NULL,
    id_mb_cm INTEGER NOT NULL,
    FOREIGN KEY(id_publi) REFERENCES publication(id_pub),
    FOREIGN KEY(id_mb_cm) REFERENCES membres(id_mb)
);
CREATE TABLE typereaction (
    nom_reaction VARCHAR(15),
    id_react serial PRIMARY KEY not null
);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('j_aime',1);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('j_adore',2);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('haha',3);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('solidaire',4);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('triste',5);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('colere',6);
INSERT INTO typereaction (nom_reaction,id_react) VALUES ('wow',7);
CREATE TABLE reactions (
    id_pbl INTEGER NOT NULL,
    id_m INTEGER NOT NULL,
    id_typereaction INTEGER NOT NULL,
    FOREIGN KEY(id_pbl) REFERENCES publication(id_pub),
    FOREIGN KEY(id_m) REFERENCES membres(id_mb),
    FOREIGN KEY(id_typereaction) REFERENCES typereaction(id_react)
);
-- jointure cmmemtaire , publication , reaction
CREATE VIEW breactions as SELECT * FROM reactions 
JOIN publication ON reactions.id_pbl = publication.id_pub 
JOIN membres ON reactions.id_m = membres.id_mb 
JOIN typereaction ON reactions.id_typereaction = typereaction.id_react;

-- jointure publication et membres
CREATE view pubmembre as SELECT * FROM publication 
JOIN membres ON publication.id_mbr = membres.id_mb;

-- jointure commentaire et publication
CREATE view comspub as SELECT * FROM commentaires 
JOIN publication ON commentaires.id_publi = publication.id_pub 
JOIN membres ON commentaires.id_mb_cm = membres.id_mb;

-- jointure amis et membres
CREATE view amive as SELECT * FROM amis
JOIN membres ON amis.id_mb1 = membres.id_mb or amis.id_mb2 = membres.id_mb;

-- jointure messages et membres
CREATE VIEW messmembre as SELECT * FROM messages 
JOIN membres on messages.id_p1 = membres.id_mb
or messages.id_p2 = membres.id_mb;  

INSERT INTO membres (nom, mail, dtn, mot_de_pass) VALUES
('feno', 'feno1@gmail.com', '2022-05-15', '2323'),
('rojo', 'rojo1@gmail.com', '2022-05-05', '012'),
('hasina', 'hasina1@gmail.com', '2022-04-27', '123'),
('sammu', 'sammu1@gmail.com', '2022-05-10', '0123');

CREATE TABLE messages (
    id_mess serial PRIMARY KEY not null,
    id_p1 INTEGER NOT NULL,
    id_p2 INTEGER NOT NULL,
    mess TEXT NOT NULL,
    dhmess timestamp NOT NULL,
    FOREIGN KEY(id_p1)REFERENCES membres (id_mb),
    FOREIGN KEY(id_p2)REFERENCES membres (id_mb)
);

CREATE TABLE pdp (
    id_pdp serial PRIMARY KEY not null,
    pdp VARCHAR(100),
    id_user INTEGER NOT NULL,
    FOREIGN KEY (id_user) REFERENCES membres(id_mb) 
);

CREATE TABLE pubimage (
    id_img serial PRIMARY KEY not null,
    dhpub_img timestamp NOT NULL,
    nom_image VARCHAR(100),
    titrepub TEXT,
    typeaffiche VARCHAR(20),
    id_mpub INTEGER NOT NULL,
    FOREIGN KEY(id_mpub) REFERENCES membres(id_mb)
);
CREATE VIEW pub_image_membre 
as SELECT * FROM pubimage JOIN membres ON pubimage.id_mpub = membres.id_mb;
-- show tables 
\dt;
-- show views
\dv;