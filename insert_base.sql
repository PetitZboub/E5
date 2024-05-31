USE Canardsound;

INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, est_admin)
VALUES
('Enzo', 'Rouch', 'enzo.rouch@lycee-pardailhan.fr', 'btssio32', 1),
('Hadrien', 'Ah-Kang', 'hadrien.ah-kang@lycee-pardailhan.fr', 'btssio32', 1),
('Aaron', 'Sall', 'aaron.sall@lycee-pardailhan.fr', 'btssio32', 1),
('Red', 'Hot', 'redhotchilipeppers@email.com', 'motdepasse1', 0),
('Milky', 'Chance', 'milkychance@email.com', 'motdepasse2', 0),
('Massive', 'Attack', 'massiveattack@email.com', 'motdepasse3', 0),
('Paul', 'McCartney', 'thebeatles@email.com', 'motdepasse3', 0),
('Vitalic', 'Vitalic', 'Vitalic@email.com', 'motdepasse3', 0);


INSERT INTO Titres (titre, artiste, url_musique, utilisateur_id,cover_album_id)
VALUES
('Californication', 'Red Hot Chili Peppers', 'mp3/Californication.mp3', 4,1),
('Scar Tissue', 'Red Hot Chili Peppers', 'mp3/Scar_Tissue.mp3', 4,2),
('Stolen Dance', 'Milky Chance', 'mp3/Stolen_Dance.mp3', 5,3),
('Cocoon', 'Milky Chance', 'mp3/Cocoon.mp3', 5,4),
('Teardrop', 'Massive Attack', 'mp3/Teardrop.mp3', 6,5),
('Angel', 'Massive Attack', 'mp3/Teardrop.mp3', 6,6),
('Come Together', 'The Beatles', 'mp3/Come_Together.mp3', 7,7),
('Lucy in the Sky with Diamond', 'The Beatles', 'mp3/Lucy_In_The_Sky_With_Diamonds.mp3', 7,8),
('Poney Part 1', 'Vitalic', 'mp3/Poney_part_1.mp3', 8,9),
('Stamina', 'Vitalic', 'mp3/Stamina.mp3', 8,10);


INSERT INTO CoverAlbum (titre_album, url_image)
VALUES
('Californication', 'img/califonication.jpg'),
('Scar Tissue', 'img/by_the_way.jpg'),
('Stolen Dance', 'img/stolen_dance.jpg'),
('Cocoon', 'img/cocoon.jpg'),
('Teardrop', 'img/teardrop.jpg'),
('Angel', 'img/Angel.jpg'),
('Come Together', 'img/come_together.jpg'),
('Lucy in the Sky with Diamond', 'img/Sgt_Peppers_Lonely_Hearts_Club_Band.jpg'),
('Poney Part 1', 'img/ok_cowboy.jpg'),
('Stamina', 'img/rave_age.jpg');