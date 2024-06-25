CREATE DATABASE IF NOT EXISTS `cinema` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `cinema`;

CREATE TABLE Personne(
   id_personne INT AUTO_INCREMENT NOT NULL,
   prenom VARCHAR(255) NOT NULL,
   nom VARCHAR(255) NOT NULL,
   sexe VARCHAR(255) NOT NULL,
   date_naissance DATE NOT NULL,
   PRIMARY KEY(id_personne)
);

CREATE TABLE Acteur(
   id_acteur INT AUTO_INCREMENT NOT NULL,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_acteur),
   UNIQUE(id_personne),
   FOREIGN KEY(id_personne) REFERENCES Personne(id_personne)
);

CREATE TABLE Realisateur(
   id_realisateur_ INT AUTO_INCREMENT NOT NULL,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_realisateur_),
   UNIQUE(id_personne),
   FOREIGN KEY(id_personne) REFERENCES Personne(id_personne)
);

CREATE TABLE Film(
   id_film INT AUTO_INCREMENT NOT NULL,
   titre VARCHAR(255) NOT NULL,
   date_sortie_fr_ DATE NOT NULL,
   duree INT NOT NULL,
   synopsis TEXT NOT NULL,
   id_realisateur_ INT NOT NULL,
   PRIMARY KEY(id_film),
   FOREIGN KEY(id_realisateur_) REFERENCES Realisateur(id_realisateur_)
);

CREATE TABLE Genre(
   id_genre INT AUTO_INCREMENT NOT NULL,
   nom_genre VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_genre)
);

CREATE TABLE Role(
   id_role INT AUTO_INCREMENT NOT NULL,
   nom_personnage VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_role)
);

CREATE TABLE film_genres(
   id_film INT NOT NULL,
   id_genre INT NOT NULL,
   PRIMARY KEY(id_film, id_genre),
   FOREIGN KEY(id_film) REFERENCES Film(id_film),
   FOREIGN KEY(id_genre) REFERENCES Genre(id_genre)
);

CREATE TABLE Casting(
   id_acteur INT NOT NULL,
   id_film INT NOT NULL,
   id_role INT NOT NULL,
   PRIMARY KEY(id_acteur NOT NULL, id_film NOT NULL, id_role) NOT NULL,
   FOREIGN KEY(id_acteur) REFERENCES Acteur(id_acteur) NOT NULL,
   FOREIGN KEY(id_film) REFERENCES Film(id_film),
   FOREIGN KEY(id_role) REFERENCES Role(id_role)
);

-- Insertion des données
INSERT IGNORE INTO Personne(prenom, nom, sexe, date_naissance) VALUES
('Johnny', 'Depp', 'M', '1963-06-09'),
('Tom', 'Cruise', 'M', '1962-07-03'),
('Angelina', 'Jolie', 'F', '1975-06-04'),
('Steven', 'Spielberg', 'M', '1946-12-18'),
('James', 'Cameron', 'M', '1954-08-16'),
('Tim', 'Burton', 'M', '1958-08-25'),
('Quentin', 'Tarantino', 'M', '1963-03-27'),
('Meryl', 'Streep', 'F', '1949-06-22'),
('Cate', 'Blanchett', 'F', '1969-05-14'),
('Kate', 'Winslet', 'F', '1975-10-05'),
('Leonardo', 'DiCaprio', 'M', '1974-11-11'),
('Brad', 'Pitt', 'M', '1963-12-18'),
('George', 'Clooney', 'M', '1961-05-06'),
('Julia', 'Roberts', 'F', '1967-10-28'),
('Nicole', 'Kidman', 'F', '1967-06-20'),
('Robert', 'De Niro', 'M', '1943-08-17'),
('Al', 'Pacino', 'M', '1940-04-25'),
('Denzel', 'Washington', 'M', '1954-12-28'),
('Morgan', 'Freeman', 'M', '1937-06-01'),
('Clint', 'Eastwood', 'M', '1930-05-31'),
('Harrison', 'Ford', 'M', '1942-07-13'),
('Sigourney', 'Weaver', 'F', '1949-10-08'),
('Arnold', 'Schwarzenegger', 'M', '1947-07-30'),
('Bruce', 'Willis', 'M', '1955-03-19'),
('Sylvester', 'Stallone', 'M', '1946-07-06'),
('Jackie', 'Chan', 'M', '1954-04-07'),
('Jet', 'Li', 'M', '1963-04-26'),
('Michelle', 'Yeoh', 'F', '1962-08-06'),
('Lucy', 'Liu', 'F', '1968-12-02'),
('Zhang', 'Ziyi', 'F', '1979-02-09'),
('Chow', 'Yun-Fat', 'M', '1955-05-18'),
('Tony', 'Leung', 'M', '1962-06-27'),
('Stephen', 'Chow', 'M', '1962-06-22'),
('Andy', 'Lau', 'M', '1961-09-27'),
('Gong', 'Li', 'F', '1965-12-31'),
('Takeshi', 'Kitano', 'M', '1947-01-18'),
('Ken', 'Watanabe', 'M', '1959-10-21'),
('Hiroyuki', 'Sanada', 'M', '1960-10-12'),
('Rinko', 'Kikuchi', 'F', '1981-01-06'),
('Koji', 'Yakusho', 'M', '1956-01-01'),
('Tadanobu', 'Asano', 'M', '1973-11-27'),
('Ko', 'Shibasaki', 'F', '1981-08-05'),
('Yusuke', 'Iseya', 'M', '1976-05-29'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takayuki', 'Yamada', 'M', '1983-10-20'),
('Kazunari', 'Ninomiya', 'M', '1983-06-17'),
('Satoshi', 'Tsumabuki', 'M', '1980-12-13'),
('Masami', 'Nagasawa', 'F', '1987-06-03'),
('Kazuya', 'Kamenashi', 'M', '1986-02-23'),
('Kou', 'Shibasaki', 'F', '1981-08-05'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26'),
('Takuya', 'Kimura', 'M', '1972-11-13'),
('Yui', 'Aragaki', 'F', '1988-06-11'),
('Haruma', 'Miura', 'M', '1990-04-05'),
('Takeru', 'Sato', 'M', '1989-03-21'),
('Mao', 'Inoue', 'F', '1987-01-09'),
('Jun', 'Matsumoto', 'M', '1983-08-30'),
('Shun', 'Oguri', 'M', '1982-12-26');

INSERT IGNORE INTO Realisateur(id_personne) VALUES
(4),
(5),
(6),
(7),
(8),
(9),
(14),
(15),
(23),
(24);

INSERT IGNORE INTO Acteur(id_personne) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141);

INSERT IGNORE INTO Film(titre, date_sortie_fr_, duree, synopsis, id_realisateur_) VALUES
('Pirates des Caraïbes : La Malédiction du Black Pearl', '2003-07-13', 143, 'Le pirate Jack Sparrow part à la recherche du trésor du Black Pearl.', 1),
('Pirates des Caraïbes : Le Secret du coffre maudit', '2006-07-12', 150, 'Jack Sparrow est à la recherche du coffre de Davy Jones.', 1),
('Pirates des Caraïbes : Jusqu''au bout du monde', '2007-05-23', 168, 'Jack Sparrow et ses amis partent à la recherche de la Fontaine de Jouvence.', 1),
('Pirates des Caraïbes : La Fontaine de Jouvence', '2011-05-18', 136, 'Jack Sparrow est à la recherche de la Fontaine de Jouvence.', 1),
('Mission: Impossible', '1996-09-18', 110, 'L''agent secret Ethan Hunt est accusé d''avoir trahi son pays.', 2),
('Mission: Impossible 2', '2000-05-24', 123, 'Ethan Hunt doit affronter un ancien agent devenu terroriste.', 2),
('Mission: Impossible 3', '2006-05-03', 126, 'Ethan Hunt doit sauver sa femme des griffes d''un trafiquant d''armes.', 2),
('Mission: Impossible - Protocole Fantôme', '2011-12-14', 133, 'Ethan Hunt doit prouver l''innocence de son équipe.', 2),
('Mission: Impossible - Rogue Nation', '2015-07-30', 131, 'Ethan Hunt doit affronter une organisation secrète.', 2),
('Mission: Impossible - Fallout', '2018-08-01', 147, 'Ethan Hunt doit empêcher une catastrophe mondiale.', 2),
('Mr. & Mrs. Smith', '2005-06-15', 120, 'Un couple découvre que chacun est un agent secret.', 3),
('Les Aventures de Tintin : Le Secret de la Licorne', '2011-10-26', 107, 'Tintin part à la recherche d''un trésor caché.', 4),
('Inception', '2010-07-16', 148, 'Un voleur spécialisé dans l''extraction d''informations se retrouve embarqué dans un projet d''inception.', 5), 
('Interstellar', '2014-11-05', 169, 'Un groupe d''explorateurs voyage à travers l''espace pour trouver une nouvelle planète habitable.', 5), 
('The Dark Knight', '2008-07-16', 152, 'Batman affronte le Joker, un criminel psychopathe.', 6), 
('The Prestige', '2006-10-20', 130, 'Deux magiciens rivaux se lancent dans une compétition pour réaliser le meilleur tour.', 6), 
('Fight Club', '1999-10-15', 139, 'Un homme dépressif rejoint un club de combat clandestin.', 7), 
('Se7en', '1995-09-22', 127, 'Deux détectives traquent un tueur en série qui commet des meurtres en se basant sur les sept péchés capitaux.', 7), 
('Gone Girl', '2014-10-01', 149, 'Un homme devient le principal suspect dans la disparition de sa femme.', 8), 
('The Social Network', '2010-10-01', 120, 'L''histoire de la création de Facebook.', 8), 
('The Shawshank Redemption', '1994-09-23', 142, 'Un homme innocent est condamné à la prison à vie.', 9), 
('The Green Mile', '1999-12-10', 189, 'Les histoires des gardiens et des prisonniers d''une prison.', 9),
('The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', 178, 'Un jeune hobbit part en quête d''un anneau magique.', 10),
('The Lord of the Rings: The Two Towers', '2002-12-18', 179, 'Les aventures du hobbit Frodon et de ses compagnons se poursuivent.', 10),
('The Lord of the Rings: The Return of the King', '2003-12-17', 201, 'La bataille finale pour la Terre du Milieu.', 10),
('The Hobbit: An Unexpected Journey', '2012-12-12', 169, 'Le hobbit Bilbo Baggins part à l''aventure avec une compagnie de nains.', 10),
('The Hobbit: The Desolation of Smaug', '2013-12-11', 161, 'Bilbo et les nains affrontent le dragon Smaug.', 10),
('The Hobbit: The Battle of the Five Armies', '2014-12-17', 144, 'La bataille finale pour la Montagne Solitaire.', 10),
('The Curious Case of Benjamin Button', '2008-12-25', 166, 'Un homme naît vieux et rajeunit au fil des ans.', 11),
('Titanic', '1997-12-19', 195, 'L''histoire d''amour entre Jack et Rose à bord du Titanic.', 11),
('Revolutionary Road', '2008-12-30', 119, 'Un couple tente de fuir la banalité de la vie de banlieue.', 11),
('The Aviator', '2004-12-17', 170, 'La vie du magnat de l''aviation Howard Hughes.', 11),
('The Departed', '2006-10-06', 151, 'Un policier infiltré et un criminel se livrent une guerre sans merci.', 11),
('The Wolf of Wall Street', '2013-12-25', 180, 'L''ascension et la chute du courtier en bourse Jordan Belfort.', 11),
('Ocean''s Eleven', '2001-12-07', 116, 'Un groupe de braqueurs tente de voler trois casinos en une nuit.', 12),
('Ocean''s Twelve', '2004-12-10', 125, 'Un voleur doit rembourser un casino en volant des œuvres d''art.', 12),
('Ocean''s Thirteen', '2007-06-08', 122, 'Un groupe de braqueurs se venge d''un propriétaire de casino.', 12),
('Erin Brockovich', '2000-03-17', 131, 'Une mère célibataire se bat contre une compagnie d''énergie.', 13);


INSERT IGNORE INTO Genre(nom_genre) VALUES
('Action'),
('Aventure'),
('Comédie'),
('Drame'),
('Fantastique'),
('Science-fiction'),
('Thriller'),
('Horreur'),
('Romance'),
('Animation'),
('Biographie'),
('Documentaire'),
('Musical'),
('Mystère'),
('Guerre'),
('Western'),
('Policier'),
('Historique'),
('Sport'),
('Famille'),
('Fantasy');

INSERT IGNORE INTO film_genres(id_film, id_genre) VALUES
(1,1),
(1,12),
(1,5),
(10,11),
(10,14),
(10,9),
(11,11),
(11,17),
(11,5),
(11,8),
(12,13),
(12,19),
(12,21),
(12,9),
(13,15),
(13,19),
(13,2),
(14,1),
(14,3),
(14,9),
(15,11),
(15,12),
(15,15),
(16,17),
(16,19),
(16,2),
(16,3),
(16,5),
(17,15),
(17,19),
(17,4),
(17,6),
(18,1),
(18,10),
(18,12),
(18,21),
(18,5),
(19,14),
(19,18),
(19,3),
(19,7),
(2,10),
(2,13),
(2,2),
(2,3),
(20,11),
(20,12),
(20,17),
(21,18),
(21,2),
(21,4),
(21,7),
(22,10),
(22,15),
(22,17),
(22,19),
(22,9),
(23,17),
(23,19),
(23,4),
(24,1),
(24,21),
(24,8),
(24,9),
(25,17),
(25,18),
(25,21),
(25,6),
(26,20),
(26,5),
(26,7),
(27,11),
(27,14),
(27,7),
(28,10),
(28,11),
(28,15),
(28,17),
(29,11),
(29,3),
(29,5),
(3,11),
(3,12),
(3,19),
(3,21),
(30,13),
(30,15),
(30,3),
(30,5),
(31,3),
(31,9),
(32,13),
(32,15),
(32,21),
(33,13),
(33,14),
(33,17),
(33,2),
(33,20),
(34,14),
(34,19),
(34,6),
(35,1),
(35,13),
(35,14),
(35,15),
(35,17),
(35,8),
(36,12),
(36,15),
(36,16),
(36,17),
(36,8),
(37,10),
(37,16),
(37,19),
(37,7),
(38,12),
(38,14),
(38,16),
(38,17),
(38,21),
(38,7),
(38,9),
(4,11),
(4,15),
(4,20),
(4,7),
(4,8),
(5,10),
(5,19),
(5,7),
(5,8),
(6,14),
(6,18),
(6,21),
(6,5),
(6,8),
(7,13),
(7,8),
(8,10),
(8,12),
(8,21),
(8,5),
(9,12),
(9,14),
(9,6);

INSERT IGNORE INTO Role(nom_personnage) VALUES
('Jack Sparrow'),
('Will Turner'),
('Elizabeth Swann'),
('Davy Jones'),
('Barbossa'),
('Angelica'),
('Blackbeard'),
('Gibbs'),
('Bootstrap Bill'),
('Cutler Beckett'),
('Davy Jones'),
('Tia Dalma'),
('Joshamee Gibbs'),
('James Norrington'),
('Pintel'),
('Ragetti'),
('Marty'),
('Cotton'),
('Mullroy'),
('Murtogg'),
('Scratch'),
('Bootstrap Bill'),
('Cutler Beckett'),
('Davy Jones'),
('Tia Dalma'),
('Joshamee Gibbs'),
('James Norrington'),
('Pintel'),
('Ragetti'),
('Marty'),
('Cotton'),
('Mullroy'),
('Murtogg'),
('Scratch'),
('Bootstrap Bill'),
('Cutler Beckett'),
('Davy Jones'),
('Tia Dalma'),
('Joshamee Gibbs'),
('James Norrington'),
('Pintel'),
('Ragetti'),
('Marty'),
('Cotton'),
('Mullroy'),
('Murtogg'),
('Scratch'),
('Ethan Hunt'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade'),
('Owen Davian'),
('John Musgrave'),
('Eugene Kittridge'),
('Claire Phelps'),
('Luther Stickell'),
('Benji Dunn'),
('Ilsa Faust'),
('William Brandt'),
('Julia Meade');

-- code sql généré par le code le programme php insertIntoCasting.php
insertINSERT IGNORE INTO Casting (id_film, id_acteur, id_role ) VALUES
(1, 95, 268),
(1, 51, 154),
(1, 27, 128),
(1, 126, 102),
(1, 3, 39),
(1, 30, 156),
(1, 45, 164),
(1, 136, 266),
(1, 106, 230),
(1, 5, 4),
(1, 36, 161),
(1, 12, 132),
(1, 22, 27),
(1, 100, 56),
(1, 50, 162),
(1, 58, 234),
(1, 75, 24),
(1, 53, 193),
(1, 118, 207),
(1, 104, 210),
(1, 35, 171),
(2, 133, 134),
(2, 24, 118),
(2, 99, 95),
(2, 33, 244),
(2, 9, 124),
(2, 105, 30),
(2, 83, 89),
(2, 127, 43),
(2, 116, 225),
(2, 137, 53),
(2, 90, 198),
(2, 72, 73),
(2, 72, 172),
(2, 113, 89),
(2, 127, 80),
(2, 35, 213),
(2, 25, 71),
(2, 3, 125),
(2, 36, 220),
(2, 120, 194),
(2, 109, 235),
(2, 68, 18),
(2, 88, 232),
(2, 52, 185),
(2, 47, 211),
(2, 41, 7),
(2, 87, 13),
(2, 42, 73),
(3, 39, 224),
(3, 130, 196),
(3, 72, 166),
(3, 131, 126),
(3, 25, 113),
(3, 129, 198),
(3, 7, 161),
(3, 41, 99),
(3, 60, 174),
(3, 103, 221),
(3, 12, 158),
(3, 44, 90),
(3, 37, 98),
(3, 34, 238),
(3, 49, 228),
(3, 61, 2),
(3, 48, 266),
(3, 132, 212),
(3, 89, 147),
(3, 59, 84),
(3, 43, 244),
(3, 85, 223),
(3, 121, 119),
(3, 69, 10),
(3, 131, 228),
(3, 135, 108),
(3, 78, 4),
(3, 78, 195),
(3, 105, 213),
(3, 85, 182),
(3, 130, 148),
(4, 127, 81),
(4, 100, 113),
(4, 19, 35),
(4, 89, 118),
(4, 81, 84),
(4, 2, 196),
(4, 18, 13),
(4, 53, 31),
(4, 50, 3),
(4, 22, 194),
(4, 65, 187),
(4, 128, 64),
(4, 81, 34),
(4, 39, 49),
(4, 8, 263),
(4, 39, 30),
(4, 45, 80),
(4, 36, 55),
(4, 117, 233),
(4, 134, 258),
(4, 26, 7),
(4, 8, 183),
(4, 122, 169),
(4, 122, 38),
(4, 127, 139),
(4, 110, 99),
(4, 35, 220),
(4, 117, 35),
(4, 27, 215),
(4, 23, 196),
(4, 33, 51),
(4, 84, 41),
(4, 1, 219),
(4, 5, 222),
(4, 43, 63),
(4, 78, 166),
(4, 60, 26),
(4, 117, 221),
(4, 117, 115),
(4, 130, 113),
(4, 112, 123),
(4, 95, 88),
(4, 32, 15),
(4, 16, 84),
(4, 110, 111),
(4, 54, 242),
(4, 115, 190),
(4, 114, 138),
(4, 109, 203),
(5, 135, 46),
(5, 94, 135),
(5, 45, 122),
(5, 52, 248),
(5, 135, 12),
(5, 11, 175),
(5, 63, 63),
(5, 70, 187),
(5, 98, 121),
(5, 132, 118),
(5, 42, 214),
(5, 117, 57),
(5, 41, 35),
(5, 15, 57),
(5, 116, 234),
(5, 40, 120),
(5, 73, 1),
(5, 25, 242),
(5, 123, 269),
(5, 21, 135),
(5, 79, 67),
(5, 84, 76),
(5, 22, 162),
(5, 111, 177),
(5, 112, 136),
(5, 61, 248),
(5, 125, 202),
(5, 38, 219),
(5, 19, 34),
(5, 2, 175),
(5, 44, 167),
(5, 44, 178),
(5, 90, 265),
(5, 48, 141),
(5, 80, 104),
(5, 125, 219),
(5, 128, 139),
(5, 83, 132),
(5, 104, 14),
(5, 107, 161),
(5, 68, 75),
(5, 31, 131),
(5, 41, 169),
(5, 68, 132),
(5, 110, 39),
(5, 16, 69),
(5, 65, 201),
(5, 33, 141),
(5, 65, 129),
(5, 91, 149),
(5, 44, 178),
(5, 114, 120),
(5, 6, 19),
(5, 91, 70),
(6, 59, 245),
(6, 52, 263),
(6, 31, 256),
(6, 15, 79),
(6, 89, 50),
(6, 77, 129),
(6, 78, 127),
(6, 100, 168),
(6, 130, 102),
(6, 104, 60),
(6, 98, 236),
(6, 73, 163),
(6, 41, 86),
(6, 88, 59),
(6, 17, 144),
(6, 64, 171),
(6, 137, 65),
(6, 7, 3),
(6, 102, 49),
(6, 51, 76),
(6, 45, 196),
(6, 46, 198),
(6, 125, 165),
(6, 57, 68),
(6, 40, 138),
(7, 83, 38),
(7, 71, 210),
(7, 75, 101),
(7, 41, 78),
(7, 120, 55),
(7, 120, 170),
(7, 40, 1),
(7, 41, 165),
(7, 90, 33),
(7, 120, 118),
(7, 27, 125),
(7, 69, 161),
(7, 80, 175),
(7, 119, 264),
(7, 39, 243),
(7, 128, 170),
(7, 28, 39),
(7, 126, 6),
(7, 5, 55),
(7, 29, 256),
(7, 95, 236),
(7, 59, 27),
(7, 137, 28),
(7, 56, 58),
(7, 14, 173),
(7, 84, 157),
(7, 77, 257),
(7, 19, 237),
(7, 69, 169),
(7, 22, 241),
(7, 128, 65),
(7, 134, 191),
(7, 76, 71),
(7, 131, 57),
(7, 26, 113),
(7, 125, 37),
(7, 129, 209),
(7, 24, 190),
(7, 101, 17),
(7, 7, 97),
(7, 119, 249),
(7, 112, 48),
(7, 71, 2),
(7, 23, 55),
(7, 132, 251),
(7, 49, 155),
(7, 20, 6),
(7, 11, 115),
(7, 62, 255),
(7, 60, 175),
(7, 118, 216),
(7, 118, 22),
(7, 111, 86),
(7, 125, 157),
(7, 81, 103),
(7, 33, 113),
(7, 134, 257),
(7, 33, 169),
(8, 54, 19),
(8, 90, 58),
(8, 127, 72),
(8, 6, 130),
(8, 78, 241),
(8, 26, 145),
(8, 103, 185),
(8, 20, 152),
(8, 76, 128),
(8, 130, 145),
(8, 129, 268),
(8, 63, 186),
(8, 56, 45),
(8, 123, 113),
(8, 38, 113),
(8, 112, 181),
(8, 75, 174),
(8, 26, 176),
(8, 119, 239),
(8, 15, 29),
(9, 69, 203),
(9, 125, 190),
(9, 52, 243),
(9, 37, 103),
(9, 36, 225),
(9, 91, 231),
(9, 103, 226),
(9, 49, 246),
(9, 58, 218),
(9, 10, 223),
(9, 110, 110),
(9, 59, 256),
(9, 1, 232),
(9, 28, 27),
(9, 15, 44),
(9, 47, 188),
(9, 104, 3),
(9, 62, 37),
(9, 134, 212),
(9, 133, 162),
(9, 124, 212),
(9, 3, 106),
(9, 111, 35),
(9, 19, 38),
(9, 77, 28),
(9, 128, 204),
(9, 6, 59),
(9, 34, 37),
(9, 95, 172),
(9, 61, 240),
(9, 56, 80),
(9, 20, 148),
(9, 20, 229),
(9, 136, 250),
(9, 9, 202),
(9, 131, 246),
(9, 41, 82),
(9, 11, 268),
(9, 106, 210),
(9, 131, 232),
(9, 29, 13),
(9, 48, 25),
(9, 136, 180),
(9, 113, 38),
(9, 133, 248),
(9, 63, 112),
(9, 91, 121),
(9, 100, 241),
(9, 70, 58),
(9, 33, 74),
(9, 24, 76),
(10, 117, 141),
(10, 26, 131),
(10, 56, 154),
(10, 133, 199),
(10, 65, 213),
(10, 102, 216),
(10, 19, 7),
(10, 9, 248),
(10, 23, 201),
(10, 49, 121),
(10, 89, 104),
(10, 46, 91),
(10, 85, 158),
(10, 43, 95),
(10, 27, 40),
(10, 33, 82),
(10, 4, 216),
(10, 86, 178),
(10, 37, 85),
(10, 11, 29),
(10, 71, 136),
(10, 91, 123),
(10, 39, 241),
(10, 92, 178),
(10, 81, 117),
(10, 83, 231),
(10, 66, 82),
(10, 100, 73),
(10, 136, 250),
(10, 48, 235),
(11, 76, 166),
(11, 42, 150),
(11, 115, 15),
(11, 21, 50),
(11, 111, 251),
(11, 135, 107),
(11, 32, 15),
(11, 79, 133),
(11, 55, 229),
(11, 131, 267),
(11, 36, 62),
(11, 109, 209),
(11, 86, 213),
(11, 98, 208),
(11, 57, 249),
(11, 46, 171),
(11, 132, 146),
(11, 31, 111),
(11, 82, 68),
(11, 43, 163),
(11, 29, 148),
(12, 19, 116),
(12, 135, 233),
(12, 48, 142),
(12, 76, 45),
(12, 12, 19),
(12, 126, 223),
(12, 66, 163),
(12, 106, 215),
(12, 61, 252),
(12, 49, 216),
(12, 113, 11),
(12, 42, 102),
(12, 128, 105),
(12, 137, 190),
(12, 83, 188),
(12, 85, 12),
(12, 38, 230),
(12, 50, 115),
(12, 3, 160),
(12, 120, 117),
(12, 21, 251),
(12, 13, 259),
(12, 42, 229),
(12, 109, 232),
(12, 115, 163),
(12, 84, 161),
(12, 22, 122),
(12, 14, 133),
(12, 33, 221),
(13, 39, 102),
(13, 85, 207),
(13, 95, 96),
(13, 74, 79),
(13, 30, 264),
(13, 53, 15),
(13, 2, 133),
(13, 22, 126),
(13, 133, 241),
(13, 66, 238),
(13, 117, 140),
(13, 89, 57),
(13, 29, 121),
(13, 69, 167),
(13, 116, 11),
(13, 101, 28),
(13, 104, 147),
(13, 81, 61),
(13, 134, 234),
(13, 47, 148),
(13, 94, 19),
(13, 1, 123),
(13, 93, 250),
(13, 40, 201),
(13, 52, 193),
(13, 124, 179),
(13, 102, 129),
(13, 120, 178),
(13, 28, 241),
(13, 96, 256),
(13, 40, 147),
(13, 109, 63),
(13, 78, 61),
(13, 33, 267),
(13, 47, 71),
(14, 29, 19),
(14, 73, 231),
(14, 58, 161),
(14, 6, 64),
(14, 99, 62),
(14, 90, 252),
(14, 63, 125),
(14, 115, 25),
(14, 89, 123),
(14, 134, 11),
(14, 131, 251),
(14, 52, 87),
(14, 34, 196),
(14, 14, 231),
(14, 53, 254),
(14, 65, 142),
(14, 94, 202),
(14, 3, 184),
(14, 88, 58),
(14, 133, 190),
(14, 118, 227),
(15, 53, 91),
(15, 33, 183),
(15, 91, 130),
(15, 112, 242),
(15, 95, 153),
(15, 123, 172),
(15, 94, 229),
(15, 81, 223),
(15, 37, 148),
(15, 19, 87),
(15, 52, 58),
(15, 136, 166),
(15, 100, 112),
(15, 52, 118),
(15, 137, 167),
(15, 63, 250),
(15, 73, 200),
(15, 121, 238),
(15, 34, 194),
(15, 116, 11),
(15, 25, 130),
(15, 117, 124),
(15, 55, 114),
(15, 112, 214),
(15, 109, 111),
(15, 71, 206),
(15, 27, 167),
(15, 97, 97),
(15, 118, 57),
(15, 37, 16),
(15, 105, 90),
(15, 23, 26),
(15, 52, 253),
(15, 106, 219),
(15, 54, 82),
(15, 135, 79),
(16, 43, 234),
(16, 62, 33),
(16, 108, 192),
(16, 111, 228),
(16, 69, 262),
(16, 44, 221),
(16, 38, 187),
(16, 24, 242),
(16, 112, 152),
(16, 44, 64),
(16, 70, 114),
(16, 22, 121),
(16, 130, 141),
(16, 62, 230),
(16, 127, 207),
(16, 59, 259),
(16, 103, 221),
(16, 43, 197),
(16, 15, 92),
(16, 70, 202),
(16, 84, 267),
(16, 136, 112),
(16, 15, 200),
(16, 24, 260),
(16, 120, 134),
(16, 129, 65),
(16, 16, 109),
(16, 51, 111),
(16, 132, 84),
(16, 103, 158),
(16, 3, 126),
(16, 47, 82),
(16, 66, 233),
(16, 130, 253),
(16, 12, 175),
(16, 92, 31),
(16, 8, 135),
(16, 119, 110),
(16, 38, 115),
(16, 97, 172),
(16, 13, 51),
(16, 33, 65),
(16, 11, 3),
(16, 129, 116),
(16, 6, 268),
(16, 75, 236),
(16, 6, 251),
(16, 43, 120),
(16, 73, 225),
(16, 79, 36),
(17, 24, 65),
(17, 6, 109),
(17, 18, 58),
(17, 131, 102),
(17, 23, 29),
(17, 96, 47),
(17, 104, 263),
(17, 106, 143),
(17, 113, 4),
(17, 68, 79),
(17, 65, 41),
(17, 27, 22),
(17, 71, 57),
(17, 95, 246),
(17, 38, 75),
(17, 54, 170),
(17, 78, 64),
(17, 135, 35),
(17, 34, 245),
(17, 39, 130),
(17, 70, 128),
(17, 31, 154),
(17, 77, 133),
(17, 49, 159),
(17, 98, 131),
(17, 52, 269),
(17, 49, 186),
(17, 64, 251),
(17, 61, 65),
(17, 45, 30),
(17, 92, 117),
(17, 65, 88),
(17, 18, 14),
(17, 67, 78),
(17, 80, 55),
(17, 43, 175),
(17, 32, 250),
(17, 23, 92),
(17, 26, 161),
(17, 49, 1),
(17, 100, 15),
(17, 125, 29),
(17, 34, 29),
(17, 105, 269),
(17, 58, 131),
(17, 123, 228),
(17, 14, 208),
(17, 7, 99),
(17, 120, 5),
(18, 55, 52),
(18, 80, 97),
(18, 71, 80),
(18, 88, 59),
(18, 8, 30),
(18, 81, 256),
(18, 74, 52),
(18, 76, 77),
(18, 87, 199),
(18, 113, 117),
(18, 106, 242),
(18, 99, 4),
(18, 99, 93),
(18, 129, 106),
(18, 78, 232),
(18, 72, 171),
(18, 34, 88),
(18, 38, 68),
(18, 116, 105),
(18, 131, 267),
(18, 13, 86),
(19, 37, 219),
(19, 66, 71),
(19, 35, 176),
(19, 65, 183),
(19, 132, 135),
(19, 74, 158),
(19, 24, 149),
(19, 126, 18),
(19, 129, 44),
(19, 35, 26),
(19, 32, 230),
(19, 116, 213),
(19, 93, 206),
(19, 23, 67),
(19, 60, 110),
(19, 30, 105),
(19, 76, 1),
(19, 88, 68),
(19, 133, 82),
(19, 55, 233),
(19, 77, 129),
(19, 63, 248),
(19, 32, 3),
(19, 50, 195),
(19, 92, 250),
(19, 18, 222),
(19, 46, 126),
(19, 75, 254),
(19, 80, 64),
(19, 17, 103),
(19, 71, 112),
(19, 120, 71),
(19, 66, 148),
(20, 133, 145),
(20, 14, 24),
(20, 113, 87),
(20, 89, 170),
(20, 14, 268),
(20, 23, 15),
(20, 12, 200),
(20, 94, 86),
(20, 47, 263),
(20, 84, 13),
(20, 13, 59),
(20, 11, 237),
(20, 99, 194),
(20, 9, 139),
(20, 98, 128),
(20, 85, 167),
(20, 47, 184),
(20, 88, 25),
(20, 56, 32),
(20, 53, 21),
(20, 2, 207),
(20, 45, 99),
(20, 3, 168),
(20, 87, 203),
(20, 29, 18),
(20, 5, 20),
(20, 96, 97),
(20, 23, 76),
(20, 128, 37),
(20, 11, 225),
(20, 33, 73),
(20, 51, 123),
(20, 23, 68),
(20, 111, 236),
(20, 67, 37),
(20, 55, 139),
(20, 64, 237),
(20, 7, 165),
(20, 108, 154),
(20, 125, 154),
(20, 89, 3),
(20, 102, 224),
(20, 52, 212),
(20, 57, 210),
(20, 76, 45),
(20, 29, 6),
(20, 115, 9),
(20, 20, 80),
(20, 1, 241),
(20, 118, 15),
(20, 80, 218),
(20, 102, 45),
(20, 27, 124),
(20, 82, 215),
(20, 57, 210),
(21, 115, 36),
(21, 98, 187),
(21, 97, 4),
(21, 136, 59),
(21, 131, 233),
(21, 7, 141),
(21, 3, 63),
(21, 59, 207),
(21, 70, 143),
(21, 125, 78),
(21, 89, 267),
(21, 91, 127),
(21, 125, 267),
(21, 129, 219),
(21, 32, 247),
(21, 68, 239),
(21, 79, 20),
(21, 14, 183),
(21, 27, 112),
(21, 126, 165),
(21, 103, 244),
(21, 73, 189),
(21, 101, 145),
(21, 91, 213),
(21, 124, 262),
(22, 92, 109),
(22, 50, 137),
(22, 59, 216),
(22, 53, 178),
(22, 131, 41),
(22, 79, 136),
(22, 83, 257),
(22, 60, 191),
(22, 4, 6),
(22, 41, 103),
(22, 20, 53),
(22, 55, 159),
(22, 70, 84),
(22, 75, 137),
(22, 47, 12),
(22, 126, 83),
(22, 20, 54),
(22, 22, 13),
(22, 89, 15),
(22, 59, 93),
(22, 25, 203),
(22, 137, 58),
(22, 116, 131),
(22, 129, 69),
(22, 15, 8),
(22, 62, 260),
(22, 110, 195),
(22, 123, 135),
(22, 83, 141),
(22, 54, 268),
(23, 114, 162),
(23, 43, 229),
(23, 34, 253),
(23, 80, 200),
(23, 49, 28),
(23, 123, 187),
(23, 122, 211),
(23, 104, 68),
(23, 115, 198),
(23, 85, 106),
(23, 13, 118),
(23, 23, 68),
(23, 37, 1),
(23, 19, 269),
(23, 18, 266),
(23, 28, 123),
(23, 17, 172),
(23, 18, 127),
(23, 30, 205),
(23, 40, 96),
(23, 26, 195),
(23, 128, 68),
(23, 7, 228),
(23, 136, 62),
(23, 36, 266),
(23, 14, 197),
(23, 74, 160),
(23, 131, 112),
(23, 20, 100),
(23, 56, 134),
(23, 103, 62),
(23, 62, 210),
(23, 22, 82),
(23, 126, 267),
(23, 84, 156),
(23, 17, 42),
(23, 42, 100),
(23, 108, 224),
(23, 7, 239),
(23, 137, 66),
(23, 31, 41),
(23, 84, 237),
(23, 112, 71),
(23, 101, 29),
(23, 30, 232),
(23, 46, 162),
(24, 109, 65),
(24, 137, 187),
(24, 23, 15),
(24, 137, 79),
(24, 116, 92),
(24, 102, 266),
(24, 98, 69),
(24, 8, 46),
(24, 87, 26),
(24, 62, 61),
(24, 27, 25),
(24, 16, 88),
(24, 35, 150),
(24, 16, 94),
(24, 106, 47),
(24, 1, 208),
(24, 5, 223),
(24, 94, 70),
(24, 85, 125),
(24, 33, 121),
(24, 30, 172),
(24, 61, 7),
(24, 110, 234),
(24, 72, 137),
(24, 11, 100),
(24, 132, 263),
(24, 127, 188),
(24, 30, 113),
(24, 31, 122),
(24, 33, 123),
(24, 39, 230),
(24, 10, 204),
(24, 70, 37),
(24, 102, 108),
(24, 103, 34),
(24, 5, 226),
(24, 4, 236),
(24, 7, 230),
(24, 121, 175),
(24, 23, 248),
(24, 105, 174),
(24, 48, 215),
(24, 100, 147),
(24, 93, 162),
(24, 59, 248),
(24, 125, 227),
(24, 81, 112),
(24, 67, 223),
(24, 55, 18),
(24, 100, 204),
(24, 58, 52),
(24, 64, 130),
(24, 97, 231),
(24, 21, 94),
(24, 70, 76),
(24, 137, 230),
(25, 48, 118),
(25, 72, 128),
(25, 71, 259),
(25, 95, 122),
(25, 71, 155),
(25, 32, 249),
(25, 9, 58),
(25, 44, 253),
(25, 24, 259),
(25, 12, 175),
(25, 3, 245),
(25, 131, 269),
(25, 97, 250),
(25, 58, 3),
(25, 117, 186),
(25, 54, 231),
(25, 31, 127),
(25, 100, 217),
(25, 86, 223),
(25, 44, 31),
(25, 70, 257),
(25, 31, 102),
(25, 90, 32),
(25, 5, 76),
(25, 89, 184),
(25, 80, 84),
(25, 35, 217),
(25, 118, 109),
(25, 2, 12),
(25, 68, 264),
(25, 103, 145),
(25, 120, 44),
(25, 60, 22),
(25, 29, 178),
(25, 134, 263),
(25, 136, 146),
(25, 18, 89),
(25, 132, 179),
(25, 47, 75),
(25, 129, 198),
(25, 37, 261),
(25, 126, 197),
(25, 45, 91),
(25, 77, 232),
(25, 39, 40),
(25, 23, 83),
(25, 57, 154),
(25, 70, 98),
(25, 68, 106),
(26, 136, 267),
(26, 63, 93),
(26, 49, 223),
(26, 5, 184),
(26, 87, 4),
(26, 61, 110),
(26, 18, 92),
(26, 124, 44),
(26, 36, 227),
(26, 117, 82),
(26, 9, 133),
(26, 106, 28),
(26, 129, 216),
(26, 59, 190),
(26, 118, 140),
(26, 94, 155),
(26, 10, 62),
(26, 118, 98),
(26, 17, 177),
(26, 25, 39),
(26, 67, 14),
(26, 52, 247),
(26, 25, 208),
(26, 64, 151),
(26, 129, 201),
(26, 92, 224),
(26, 40, 84),
(26, 44, 44),
(26, 93, 34),
(26, 66, 118),
(26, 98, 124),
(26, 3, 196),
(26, 4, 152),
(26, 79, 123),
(26, 108, 22),
(26, 64, 154),
(26, 75, 159),
(26, 23, 95),
(27, 108, 253),
(27, 96, 70),
(27, 10, 81),
(27, 70, 24),
(27, 80, 30),
(27, 29, 165),
(27, 30, 86),
(27, 103, 15),
(27, 83, 228),
(27, 34, 53),
(27, 51, 165),
(27, 87, 189),
(27, 41, 204),
(27, 46, 151),
(27, 73, 211),
(27, 27, 96),
(27, 110, 195),
(27, 75, 194),
(27, 133, 152),
(27, 105, 143),
(27, 77, 165),
(27, 27, 227),
(27, 14, 136),
(27, 49, 114),
(27, 16, 149),
(27, 63, 100),
(27, 132, 11),
(27, 130, 196),
(27, 110, 141),
(27, 23, 194),
(27, 100, 184),
(27, 61, 59),
(27, 52, 51),
(27, 109, 258),
(27, 128, 151),
(27, 131, 248),
(27, 121, 179),
(27, 70, 216),
(27, 10, 39),
(27, 59, 87),
(27, 130, 163),
(27, 76, 40),
(28, 73, 67),
(28, 38, 213),
(28, 100, 88),
(28, 101, 102),
(28, 82, 186),
(28, 93, 192),
(28, 124, 185),
(28, 88, 233),
(28, 83, 77),
(28, 73, 38),
(28, 62, 85),
(28, 101, 126),
(28, 98, 160),
(28, 22, 176),
(28, 72, 191),
(28, 77, 64),
(28, 68, 9),
(28, 57, 165),
(28, 10, 133),
(28, 85, 129),
(28, 125, 198),
(28, 22, 169);


   
   