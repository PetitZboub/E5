CREATE DATABASE Canardsound;

USE Canardsound;

CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(500) NOT NULL,
    est_admin BOOLEAN DEFAULT 0
);

CREATE TABLE Titres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    artiste VARCHAR(255) NOT NULL,
    url_musique VARCHAR(255) NOT NULL,
    utilisateur_id INT,
    cover_album_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (cover_album_id) REFERENCES CoverAlbum(id)
);

CREATE TABLE CoverAlbum (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre_album VARCHAR(255) NOT NULL,
    url_image VARCHAR(255) NOT NULL
);
