DROP SCHEMA IF EXISTS gestioEscola;
CREATE SCHEMA gestioEscola;
USE gestioEscola;
DROP TABLE IF EXISTS assignatures_estudiants;
DROP TABLE IF EXISTS estudiants;
DROP TABLE IF EXISTS assignatures;
DROP TABLE IF EXISTS aules;
DROP TABLE IF EXISTS professors;
CREATE TABLE estudiants
(
    id     INT PRIMARY KEY AUTO_INCREMENT,
    nom    VARCHAR(100) NOT NULL,
    cognom varchar(100),
    edat   INT CHECK ( edat > 15 ),
    curs   varchar(10)  NOT NULL
);
CREATE TABLE professors
(
    id   INT PRIMARY KEY AUTO_INCREMENT,
    nom  VARCHAR(100) NOT NULL,
    edat INT CHECK ( edat > 21 )
);
CREATE TABLE aules
(
    id  INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);
CREATE TABLE assignatures
(
    id        INT PRIMARY KEY AUTO_INCREMENT,
    nom       VARCHAR(100) NOT NULL,
    professor INT          NOT NULL,
    aula      INT          NOT NULL REFERENCES aules (id),
    CONSTRAINT FK_assignatura_professor
        FOREIGN KEY (professor) REFERENCES professors (id),
    CONSTRAINT FK_assignatura_aula
        FOREIGN KEY (aula) REFERENCES aules (id)

);

CREATE TABLE assignatures_estudiants
(
    id_estudiant      INT NOT NULL,
    id_assignatura INT NOT NULL,
    PRIMARY KEY (id_estudiant, id_assignatura),
    CONSTRAINT FK_assignatures_estudiants
        FOREIGN KEY (id_estudiant) REFERENCES estudiants (id)
            ON DELETE CASCADE,
    CONSTRAINT FK_estudiants_assignatures
        FOREIGN KEY (id_assignatura) REFERENCES assignatures (id)
            ON DELETE CASCADE
);


INSERT INTO professors (nom, edat)
VALUES ('Joan', 25),
       ('Maria', 32),
       ('Jordi', 38),
       ('Anna', 27),
       ('Arnau', 35),
       ('Laura', 29),
       ('Montserrat', 43),
       ('Pau', 41),
       ('Rosa', 30),
       ('Toni', 40),
       ('Mireia', 39),
       ('Pere', 36),
       ('Martina', 34),
       ('David', 45),
       ('Sergi', 31);


INSERT INTO estudiants (nom, cognom, edat, curs)
VALUES ('Joan', 'Costa', 20, 'Curs1'),
       ('Maria', 'Garcia', 19, 'Curs2'),
       ('Jordi', 'Martinez', 22, 'Curs3'),
       ('Anna', 'Abad', 23, 'Curs1'),
       ('Arnau', 'Pau', 24, 'Curs2'),
       ('Laura', 'Munt', 26, 'Curs3'),
       ('Montserrat', 'Sol', 27, 'Curs1'),
       ('Pau', 'Puig', 28, 'Curs2'),
       ('Rosa', 'Pla', 29, 'Curs3'),
       ('Toni', 'Marc', 30, 'Curs1'),
       ('Mireia', 'Riu', 31, 'Curs2'),
       ('Pere', 'Sole', 32, 'Curs3'),
       ('Martina', 'Vidal', 33, 'Curs1'),
       ('David', 'Roca', 34, 'Curs2'),
       ('Sergi', 'Guell', 35, 'Curs3'),
       ('Ines', 'Freixas', 36, 'Curs1'),
       ('Bernat', 'Miros', 37, 'Curs2'),
       ('Nuria', 'Camp', 38, 'Curs3'),
       ('Lluis', 'Roure', 39, 'Curs1'),
       ('Aina', 'Amat', 40, 'Curs2'),
       ('Quim', 'Escar', 41, 'Curs3'),
       ('Narcis', 'Riu', 42, 'Curs1'),
       ('Sandra', 'Camp', 43, 'Curs2'),
       ('Judit', 'Casablanca', 44, 'Curs3'),
       ('Joana', 'Roure', 45, 'Curs1'),
       ('Marta', 'Creu', 46, 'Curs2'),
       ('Ferran', 'Casals', 47, 'Curs3'),
       ('Laia', 'Serradell', 48, 'Curs1'),
       ('Damià', 'Casals', 49, 'Curs2'),
       ('Gisela', 'Casellas', 50, 'Curs3');

INSERT INTO aules (nom)
VALUES ('Aula101'),
       ('Aula102'),
       ('Aula103'),
       ('Aula201'),
       ('Aula202'),
       ('Aula203'),
       ('Aula301'),
       ('Aula302'),
       ('Aula303'),
       ('Aula401'),
       ('Aula402'),
       ('Aula403'),
       ('Aula501'),
       ('Aula502'),
       ('Aula503');

INSERT INTO assignatures (nom, professor, aula)
VALUES ('Matematiques', 1, 1),
       ('Fisica', 2, 2),
       ('Quimica', 3, 3),
       ('Biologia', 4, 4),
       ('Geologia', 5, 5),
       ('Informatica', 6, 6),
       ('Historia', 7, 7),
       ('Geografia', 8, 8),
       ('Filosofia', 9, 9),
       ('Arts', 10, 10),
       ('Musica', 11, 11),
       ('Dret', 12, 12),
       ('Economia', 12, 13),
       ('Psicologia', 13, 14),
       ('Sociologia', 14, 15);

INSERT INTO assignatures_estudiants (id_estudiant, id_assignatura)
VALUES (15, 13),
       (22, 6),
       (4, 4),
       (23, 11),
       (11, 5),
       (15, 8),
       (16, 5),
       (5, 6),
       (9, 11),
       (18, 2),
       (20, 10),
       (27, 13),
       (29, 13),
       (2, 8),
       (17, 5),
       (28, 8),
       (12, 12),
       (16, 12),
       (28, 15),
       (12, 10),
       (14, 5),
       (21, 6),
       (18, 10),
       (25, 8),
       (6, 11),
       (18, 14),
       (3, 5),
       (9, 5),
       (18, 1),
       (13, 13),
       (9, 13),
       (24, 15),
       (29, 3),
       (3, 14),
       (29, 10),
       (3, 9),
       (4, 2),
       (15, 5),
       (11, 10),
       (6, 8),
       (26, 11),
       (9, 9),
       (19, 12),
       (8, 1),
       (30, 5),
       (17, 2),
       (8, 14),
       (8, 5);