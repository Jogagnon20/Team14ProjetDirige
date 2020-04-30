use dbequipe14;

delimiter $$
DELETE FROM Billets;
DELETE FROM Clients;
DELETE FROM Sections;
DELETE FROM Representations;
DELETE FROM Salles;
DELETE FROM Spectacles;
DELETE FROM Categories;
$$

#a. Au moins 5 catégories
delimiter $$
insert into Categories values ('HUM', 'Humour');
insert into Categories values ('DRA', 'Drame');
insert into Categories values ('MAG', 'Magie');
insert into Categories values ('DAN', 'Danse');
insert into Categories values ('MUS', 'Musique');

#b. Au moins 3 spectacles par catégorie
ALTER TABLE Spectacles AUTO_INCREMENT = 1;
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('HUM', 'un humoriste sur scène!', 'Pierre Hébert', '55.00', 'Pierre_Hebert.jpg', 'Spectacle d''Hébert');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('HUM', 'L''humour avec le grand.', 'Jesus', '1550.00', 'Jesus.png', 'De l''humour supérieur');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('HUM', 'Pas bon pas cher.', 'Jaqueline', '25.00', 'Jacqueline.jpg', 'Un vrai cadeau');

insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('DRA', 'La tristesse de la vie en spectacle.', 'Ginette', '43.00', 'Ginette.jfif', 'La vie');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('DRA', 'L''histoire d''un prince.', 'Pat Trop', '52.00', 'Prince.jfif', 'Mon Dieu!');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('DRA', 'L''héritage de la mort.', 'Justin Malheure', '66.00', 'Infortune.jpeg', 'L''infortune');

insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('MAG', 'Magiquement magique.', 'Roussel', '34.00', 'Roussel.jpg', 'L''invisible');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('MAG', 'De la magie par un magicien.', 'Le magicien', '30.00', 'Magicien.png', 'Un magicien');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('MAG', 'Un spectacle d''école magique.', 'Ticlin', '6.00', 'EnfantMagie.jfif', 'L''enfant de magie');

insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('DAN', 'La danse au cirque.', 'Mousline', '22.00', 'DanseCircus.jpg', 'Un pas de danse');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('DAN', 'De la danse et du jazz, mixe parfait.', 'Michel', '25.00', 'DanseJazz.jpg', 'Danse jazz');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('DAN', 'La danse c''est pour tout le monde.', 'Les différents', '15.00', 'DanseTriste.jpg', 'Incapable');

insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('MUS', 'La vrai musique mise sur scène.', 'Badump', '45.00', 'LaVraiMusique.jfif', 'La vrai musique');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('MUS', 'Une démonstration de la culture musical du Québec.', 'Ben', '35.00', 'MusiqueQc.jpg', 'La musique québecoise');
insert into Spectacles (idCategorie, description, artiste, prix_de_base, Guid, nomSpectacle) values ('MUS', 'De la musique qui ramène tous les coeurs ensemble.', 'Benoit', '55.00', 'MusiquePTLM.jfif', 'Musique pour tout le monde');


#d. Au moins 5 salles
ALTER TABLE Salles AUTO_INCREMENT = 1;
insert into Salles (Adresse, Capacite, nomSalles) values ('56 rue du Spectacle', 100000, 'God''s place');
insert into Salles (Adresse, Capacite, nomSalles) values ('112 chemin des Salles', 2000, 'Le maudit');
insert into Salles (Adresse, Capacite, nomSalles) values ('1 monté Représentations', 1500, 'La salle des tous croches');
insert into Salles (Adresse, Capacite, nomSalles) values ('558 boulevard des Chansons', 6000, 'La salle du peuple');
insert into Salles (Adresse, Capacite, nomSalles) values ('43 avenue de l''art', 670, 'La salle du pape');
$$

#e. Au moins 3 sections par salles
delimiter $$
ALTER TABLE Sections AUTO_INCREMENT = 1;
insert into Sections (idSalle, Couleur, fm_Prix) values ('1', 'gris', '0.5');
insert into Sections (idSalle, Couleur, fm_Prix) values ('1', 'bleu', '1');
insert into Sections (idSalle, Couleur, fm_Prix) values ('1', 'rouge', '2');

insert into Sections (idSalle, Couleur, fm_Prix) values ('2', 'gris', '1');
insert into Sections (idSalle, Couleur, fm_Prix) values ('2', 'bleu', '2');
insert into Sections (idSalle, Couleur, fm_Prix) values ('2', 'rouge', '2.5');

insert into Sections (idSalle, Couleur, fm_Prix) values ('3', 'gris', '1');
insert into Sections (idSalle, Couleur, fm_Prix) values ('3', 'bleu', '1.5');
insert into Sections (idSalle, Couleur, fm_Prix) values ('3', 'rouge', '2.5');

insert into Sections (idSalle, Couleur, fm_Prix) values ('4', 'gris', '0.8');
insert into Sections (idSalle, Couleur, fm_Prix) values ('4', 'bleu', '1.2');
insert into Sections (idSalle, Couleur, fm_Prix) values ('4', 'rouge', '1.4');

insert into Sections (idSalle, Couleur, fm_Prix) values ('5', 'gris', '1');
insert into Sections (idSalle, Couleur, fm_Prix) values ('5', 'bleu', '2');
insert into Sections (idSalle, Couleur, fm_Prix) values ('5', 'rouge', '3');
$$

#c. Au moins 3 représentations par spectacles (dans des salles différentes)
delimiter $$
ALTER TABLE Representations AUTO_INCREMENT = 1;
insert into Representations (idSpectacle, idSalle, Date) values ('1', '1', '2020-12-23');
insert into Representations (idSpectacle, idSalle, Date) values ('1', '2', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('1', '3', '2020-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('2', '1', '2020-12-28');
insert into Representations (idSpectacle, idSalle, Date) values ('2', '4', '2020-07-13');
insert into Representations (idSpectacle, idSalle, Date) values ('2', '3', '2020-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('3', '1', '2020-12-12');
insert into Representations (idSpectacle, idSalle, Date) values ('3', '2', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('3', '5', '2020-10-01');

insert into Representations (idSpectacle, idSalle, Date) values ('4', '1', '2020-11-23');
insert into Representations (idSpectacle, idSalle, Date) values ('4', '3', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('4', '2', '2020-08-11');

insert into Representations (idSpectacle, idSalle, Date) values ('5', '5', '2021-03-23');
insert into Representations (idSpectacle, idSalle, Date) values ('5', '2', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('5', '3', '2020-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('6', '3', '2020-06-23');
insert into Representations (idSpectacle, idSalle, Date) values ('6', '2', '2021-02-07');
insert into Representations (idSpectacle, idSalle, Date) values ('6', '4', '2020-06-17');

insert into Representations (idSpectacle, idSalle, Date) values ('7', '2', '2020-12-23');
insert into Representations (idSpectacle, idSalle, Date) values ('7', '4', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('7', '3', '2020-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('8', '1', '2020-12-23');
insert into Representations (idSpectacle, idSalle, Date) values ('8', '2', '2020-11-23');
insert into Representations (idSpectacle, idSalle, Date) values ('8', '3', '2020-10-12');

insert into Representations (idSpectacle, idSalle, Date) values ('9', '3', '2020-12-01');
insert into Representations (idSpectacle, idSalle, Date) values ('9', '2', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('9', '1', '2020-05-05');

insert into Representations (idSpectacle, idSalle, Date) values ('10', '3', '2020-04-23');
insert into Representations (idSpectacle, idSalle, Date) values ('10', '2', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('10', '5', '2020-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('11', '3', '2020-12-23');
insert into Representations (idSpectacle, idSalle, Date) values ('11', '2', '2020-02-02');
insert into Representations (idSpectacle, idSalle, Date) values ('11', '1', '2020-07-11');

insert into Representations (idSpectacle, idSalle, Date) values ('12', '1', '2020-07-23');
insert into Representations (idSpectacle, idSalle, Date) values ('12', '4', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('12', '3', '2020-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('13', '5', '2020-06-23');
insert into Representations (idSpectacle, idSalle, Date) values ('13', '2', '2020-07-07');
insert into Representations (idSpectacle, idSalle, Date) values ('13', '3', '2020-03-25');

insert into Representations (idSpectacle, idSalle, Date) values ('14', '1', '2020-12-08');
insert into Representations (idSpectacle, idSalle, Date) values ('14', '2', '2020-09-01');
insert into Representations (idSpectacle, idSalle, Date) values ('14', '3', '2021-10-11');

insert into Representations (idSpectacle, idSalle, Date) values ('15', '1', '2020-12-23');
insert into Representations (idSpectacle, idSalle, Date) values ('15', '4', '2020-11-07');
insert into Representations (idSpectacle, idSalle, Date) values ('15', '3', '2020-10-11');
$$

#g. Au moins 3 clients
delimiter $$
ALTER TABLE Clients AUTO_INCREMENT = 1;
insert into Clients (nomClient, adresseClient, telephoneClient, email, password) values ('Bob', '23 rue Sacré', '567-345-1234', 'Bob@gmail.com', '123');
insert into Clients (nomClient, adresseClient, telephoneClient, email, password) values ('Jacques', '788 chemin Bateau', '342-415-7263', 'Jacquou36@hotmail.ca', '123');
insert into Clients (nomClient, adresseClient, telephoneClient, email, password) values ('Marielle', '156 monté Crouton', '436-908-8267', 'Mariemielle86@gmail.com', '123');
$$

#f. Au moins 3 billets par présentation. Les billets ne doivent pas être tous dans la même section
delimiter $$
ALTER TABLE Billets AUTO_INCREMENT = 1;
#Spectacle 1
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 1), '1', '1', '1');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 4), '4', '1', '2');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 7), '7', '1', '3');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 2), '2', '1', '1');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 5), '5', '1', '2');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 8), '8', '1', '3');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 3), '3', '1', '1');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 6), '6', '1', '2');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(1, 9), '9', '1', '3');

#Spectacle 2
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 1), '1', '1', '4');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 10), '10', '1', '5');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 7), '7', '1', '6');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 2), '2', '1', '4');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 11), '11', '1', '5');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 8), '8', '1', '6');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 3), '3', '1', '4');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 12), '12', '1', '5');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(2, 9), '9', '1', '6');

#Spectacle 3
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 1), '1', '1', '7');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 4), '4', '1', '8');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 13), '13', '1', '9');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 2), '2', '1', '7');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 5), '5', '1', '8');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 14), '14', '1', '9');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 3), '3', '1', '7');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 6), '6', '1', '8');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(3, 15), '15', '1', '9');

#Spectacle 4
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 1), '1', '1', '10');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 7), '7', '1', '11');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 4), '4', '1', '12');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 2), '2', '1', '10');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 8), '8', '1', '11');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 5), '5', '1', '12');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 3), '3', '1', '10');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 9), '9', '1', '11');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(4, 6), '6', '1', '12');

#Spectacle 5
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 13), '13', '1', '13');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 4), '4', '1', '14');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 7), '7', '1', '15');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 14), '14', '1', '13');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 5), '5', '1', '14');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 8), '8', '1', '15');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 15), '15', '1', '13');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 6), '6', '1', '14');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(5, 9), '9', '1', '15');

#Spectacle 6
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 7), '7', '1', '16');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 4), '4', '1', '17');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 10), '10', '1', '18');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 8), '8', '1', '16');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 5), '5', '1', '17');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 11), '11', '1', '18');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 9), '9', '1', '16');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 6), '6', '1', '17');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(6, 12), '12', '1', '18');

#Spectacle 7
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 4), '4', '2', '19');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 10), '10', '2', '20');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 7), '7', '2', '21');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 5), '5', '2', '19');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 11), '11', '2', '20');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 8), '8', '2', '21');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 6), '6', '2', '19');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 12), '12', '2', '20');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(7, 9), '9', '2', '21');

#Spectacle 8
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 1), '1', '2', '22');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 4), '4', '2', '23');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 7), '7', '2', '24');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 2), '2', '2', '22');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 5), '5', '2', '23');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 8), '8', '2', '24');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 3), '3', '2', '22');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 6), '6', '2', '23');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(8, 9), '9', '2', '24');

#Spectacle 9
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 7), '7', '2', '25');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 4), '4', '2', '26');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 1), '1', '2', '27');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 8), '8', '2', '25');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 5), '5', '2', '26');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 2), '2', '2', '27');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 9), '9', '2', '25');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 6), '6', '2', '26');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(9, 3), '3', '2', '27');

#Spectacle 10
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 7), '7', '2', '28');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 4), '4', '2', '29');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 12), '12', '2', '30');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 8), '8', '2', '28');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 5), '5', '2', '29');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 13), '13', '2', '30');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 9), '9', '2', '28');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 6), '6', '2', '29');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(10, 14), '14', '2', '30');

#Spectacle 11
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 7), '7', '2', '31');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 4), '4', '2', '32');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 1), '1', '2', '33');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 8), '8', '2', '31');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 5), '5', '2', '32');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 2), '2', '2', '33');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 9), '9', '2', '31');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 6), '6', '2', '32');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(11, 3), '3', '2', '33');

#Spectacle 12
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 1), '1', '3', '34');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 4), '4', '3', '35');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 3), '3', '3', '36');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 1), '1', '3', '34');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 4), '4', '3', '35');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 3), '3', '3', '36');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 1), '1', '3', '37');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 4), '4', '3', '38');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(12, 3), '3', '3', '39');

#Spectacle 13
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 5), '5', '3', '37');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 2), '2', '3', '38');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 3), '3', '3', '39');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 5), '5', '3', '37');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 2), '2', '3', '38');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 3), '3', '3', '39');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 5), '5', '3', '37');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 2), '2', '3', '38');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(13, 3), '3', '3', '39');

#Spectacle 14
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 1), '1', '3', '40');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 2), '2', '3', '41');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 3), '3', '3', '42');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 1), '1', '3', '40');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 2), '2', '3', '41');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 3), '3', '3', '42');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 1), '1', '3', '40');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 2), '2', '3', '41');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(14, 3), '3', '3', '42');

#Spectacle 15
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 1), '1', '3', '43');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 4), '4', '3', '44');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 3), '3', '3', '45');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 1), '1', '3', '43');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 4), '4', '3', '44');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 3), '3', '3', '45');

insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 1), '1', '3', '43');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 4), '4', '3', '44');
insert into Billets (prixBillet, idSection, idClient, idRepresentation) values (getTotalPrice(15, 3), '3', '3', '45');
$$



