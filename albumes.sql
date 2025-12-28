USE login-php;

CREATE TABLE albumes (
    idAlbum INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    artista VARCHAR(100) NOT NULL,
    genero VARCHAR(50),
    fecha_lanzamiento DATE,
    num_canciones INT,
    es_explicit BOOLEAN DEFAULT 0
);

INSERT INTO albumes (titulo, artista, genero, fecha_lanzamiento, num_canciones, es_explicit) VALUES
('OK Computer', 'Radiohead', 'Rock alternativo', '1997-05-21', 12, 0),
('To Pimp a Butterfly', 'Kendrick Lamar', 'Hip Hop', '2015-03-15', 16, 1),
('Random Access Memories', 'Daft Punk', 'Electrónica', '2013-05-17', 13, 0),
('Back to Black', 'Amy Winehouse', 'Soul', '2006-10-27', 11, 1);