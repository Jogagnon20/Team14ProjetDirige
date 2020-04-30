use dbequipe14;

################################Selects
delimiter $$
drop procedure if exists SelectFromAchat
$$
delimiter $$
create procedure SelectFromAchat()
BEGIN
select * from achat;
end
$$
delimiter $$
drop procedure if exists SelectFromAchatsReels
$$
delimiter $$
create procedure SelectFromAchatsReels()
BEGIN
select * from achatsreels;
end
$$
delimiter $$
drop procedure if exists SelectFromBillets
$$
delimiter $$
create procedure SelectFromBillets()
BEGIN
select * from billets;
end
$$
delimiter $$
drop procedure if exists SelectFromCategories
$$
delimiter $$
create procedure SelectFromCategories()
BEGIN
select * from Categories;
end
$$
delimiter $$
drop procedure if exists SelectFromClients
$$
delimiter $$
create procedure SelectFromClients()
BEGIN
select * from Clients;
end
$$
delimiter $$
drop procedure if exists SelectFromRepresentations
$$
delimiter $$
create procedure SelectFromRepresentations()
BEGIN
select * from Representations;
end
$$
delimiter $$
drop procedure if exists SelectFromSalles
$$
delimiter $$
create procedure SelectFromSalles()
BEGIN
select * from Salles;
end
$$
delimiter $$
drop procedure if exists SelectFromSections
$$
delimiter $$
create procedure SelectFromSections()
BEGIN
select * from Sections;
end
$$
delimiter $$
drop procedure if exists SelectFromSpectacles
$$
delimiter $$
create procedure SelectFromSpectacles()
BEGIN
select * from Spectacles;
end
$$

################################Inserts
delimiter $$
drop procedure if exists InsertClient
$$
delimiter $$
create procedure InsertClient(
in nomClient varchar(50),
in adresse varchar(50),
in telephone varchar(12),
in email varchar(50),
in motDePasse varchar(40)
)
BEGIN
insert into Clients (nomClient, adresseClient, telephoneClient, email, password)
values(nomClient, adresse, telephone, email, motDePasse);
commit;
end;
$$

delimiter $$
drop procedure if exists InsertSpectacle
$$
delimiter $$
create procedure InsertSpectacle(
in nomSpectacle varchar(50),
in idCategorie char(3),
in description varchar(45),
in artiste varchar(45),
in prix_de_base decimal(10,0),
in Guid varchar(100)
)
BEGIN
insert into Spectacles (nomSpectacle, idCategorie, description, artiste, prix_de_base, Guid)
values(nomSpectacle, idCategorie, description, artiste, prix_de_base, Guid);
commit;
end;
$$

delimiter $$
drop procedure if exists InsertSalles
$$
delimiter $$
create procedure InsertSalles(
in Adresse varchar(45),
in Capacite integer
)
BEGIN
insert into Salles (Adresse, Capacite)
values(Adresse, Capacite);
commit;
end;
$$

delimiter $$
drop procedure if exists InsertRepresentations
$$
delimiter $$
create procedure InsertRepresentations(
in idSpectacle integer,
in idSalle integer,
in Date datetime
)
BEGIN
insert into Representations (idSpectacle, idSalle, Date)
values(idSpectacle, idSalle, Date);
commit;
end;
$$

delimiter $$
drop procedure if exists InsertBillets
$$
delimiter $$
create procedure InsertBillets(
in Prix_de_base integer,
in idSection integer,
in idClient integer,
in idRepresentation integer,
in idSalle integer
)
BEGIN
insert into Billets (Prix_de_base, idSection, idClient,idRepresentation, idSalle)
values(Prix_de_base, idSection, idClient, idRepresentation, idSalle);
commit;
end;
$$

delimiter $$
drop procedure if exists InsertSections
$$
delimiter $$
create procedure InsertSections(
in idSalle integer,
in Couleur varchar(45),
in fm_Prix decimal(10,0)
)
BEGIN
insert into Billets (idSalle,Couleur, fm_Prix )
values(idSalle,Couleur, fm_Prix);
commit;
end;
$$
delimiter $$
drop procedure if exists InsertBillets
$$
delimiter $$
create procedure InsertBillets(
in Prix_de_base integer,
in idSection integer,
in idClient integer,
in idRepresentation integer,
in idSalle integer
)
BEGIN
insert into Billets (Prix_de_base, idSection, idClient,idRepresentation, idSalle)
values(Prix_de_base, idSection, idClient, idRepresentation, idSalle);
commit;
end;
$$

delimiter $$
drop procedure if exists BaseSortSpectacle
$$
delimiter $$
create procedure BaseSortSpectacle()
BEGIN
	select s.idSpectacle, s.idCategorie, s.description, r.idSalle from Spectacles s inner join Representations r on s.idSpectacle = r.idSpectacle
    group by s.idCategorie, s.description, r.idSalle order by s.idSpectacle;
commit;
end;
$$




