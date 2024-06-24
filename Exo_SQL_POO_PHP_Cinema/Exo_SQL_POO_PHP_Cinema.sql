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
INSERT INTO Personne(prenom, nom, sexe, date_naissance) VALUES
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

INSERT INTO Acteur(id_personne) VALUES
(1),
(2),
(3),
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
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187),
(188),
(189),
(190),
(191),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219),
(220),
(221),
(222),
(223),
(224),
(225),
(226),
(227),
(228),
(229),
(230),
(231),
(232),
(233),
(234),
(235),
(236),
(237),
(238),
(239),
(240),
(241),
(242),
(243),
(244),
(245),
(246),
(247),
(248),
(249),
(250),
(251),
(252),
(253),
(254),
(255),
(256),
(257),
(258),
(259),
(260),
(261),
(262),
(263),
(264),
(265),
(266),
(267),
(268),
(269),
(270),
(271),
(272),
(273),
(274),
(275),
(276),
(277),
(278),
(279),
(280),
(281),
(282),
(283),
(284),
(285),
(286),
(287),
(288),
(289),
(290),
(291),
(292),
(293),
(294),
(295),
(296),
(297),
(298),
(299),
(300),
(301),
(302),
(303),
(304),
(305),
(306),
(307),
(308),
(309),
(310),
(311),
(312),
(313),
(314),
(315),
(316),
(317),
(318),
(319),
(320),
(321),
(322),
(323),
(324),
(325),
(326),
(327),
(328),
(329),
(330),
(331),
(332),
(333),
(334),
(335),
(336),
(337),
(338),
(339),
(340),
(341),
(342),
(343),
(344),
(345),
(346),
(347),
(348),
(349),
(350),
(351),
(352),
(353),
(354),
(355),
(356),
(357),
(358),
(359),
(360),
(361),
(362),
(363),
(364),
(365),
(366),
(367),
(368),
(369),
(370),
(371),
(372),
(373),
(374),
(375),
(376),
(377),
(378),
(379),
(380),
(381),
(382),
(383),
(384),
(385),
(386),
(387),
(388),
(389),
(390),
(391),
(392),
(393),
(394),
(395),
(396),
(397),
(398),
(399),
(400),
(401),
(402),
(403),
(404),
(405),
(406),
(407),
(408),
(409),
(410),
(411),
(412),
(413),
(414),
(415),
(416),
(417),
(418),
(419),
(420),
(421),
(422),
(423),
(424),
(425),
(426),
(427),
(428),
(429),
(430),
(431),
(432),
(433),
(434),
(435),
(436),
(437),
(438),
(439),
(440),
(441),
(442),
(443),
(444),
(445),
(446),
(447),
(448),
(449),
(450),
(451),
(452),
(453),
(454),
(455),
(456),
(457),
(458),
(459),
(460),
(461),
(462),
(463),
(464),
(465),
(466),
(467),
(468),
(469),
(470),
(471),
(472),
(473),
(474),
(475),
(476),
(477),
(478),
(479),
(480),
(481),
(482),
(483),
(484),
(485),
(486),
(487),
(488),
(489),
(490),
(491),
(492),
(493),
(494),
(495),
(496),
(497),
(498),
(499),
(500),
(501),
(502),
(503),
(504),
(505),
(506),
(507),
(508),
(509),
(510),
(511),
(512),
(513),
(514),
(515),
(516),
(517),
(518),
(519),
(520),
(521),
(522),
(523),
(524),
(525),
(526),
(527),
(528),
(529),
(530),
(531),
(532),
(533),
(534),
(535),
(536),
(537),
(538),
(539),
(540),
(541),
(542),
(543),
(544),
(545),
(546),
(547),
(548),
(549),
(550),
(551),
(552),
(553),
(554),
(555),
(556),
(557),
(558),
(559),
(560),
(561),
(562),
(563),
(564),
(565),
(566),
(567),
(568),
(569),
(570),
(571),
(572),
(573),
(574),
(575),
(576),
(577),
(578),
(579),
(580),
(581),
(582),
(583),
(584),
(585),
(586),
(587),
(588),
(589),
(590),
(591),
(592),
(593),
(594),
(595),
(596),
(597),
(598),
(599),
(600),
(601),
(602),
(603),
(604),
(605),
(606),
(607),
(608),
(609),
(610),
(611),
(612),
(613),
(614),
(615),
(616),
(617),
(618),
(619),
(620),
(621),
(622),
(623),
(624),
(625),
(626),
(627),
(628),
(629),
(630),
(631),
(632),
(633),
(634),
(635),
(636),
(637),
(638),
(639),
(640),
(641),
(642),
(643),
(644),
(645),
(646),
(647),
(648),
(649),
(650),
(651),
(652),
(653),
(654),
(655),
(656),
(657),
(658),
(659),
(660),
(661),
(662),
(663),
(664),
(665),
(666),
(667),
(668),
(669),
(670),
(671),
(672);

INSERT INTO Realisateur(id_personne) VALUES
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

INSERT INTO Film(titre, date_sortie_fr_, duree, synopsis, id_realisateur_) VALUES
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


INSERT INTO Genre(nom_genre) VALUES
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
(28,17),
(3,21),
(22,9),
(20,17),
(29,3),
(17,4),
(26,5),
(25,17),
(32,13),
(4,11),
(4,7),
(8,5),
(24,1),
(38,21),
(37,19),
(5,19),
(16,17),
(38,12),
(16,3),
(33,17),
(22,17),
(18,1),
(25,21),
(25,21),
(33,20),
(6,21),
(38,16),
(29,5),
(11,11),
(28,11),
(35,1),
(36,12),
(35,17),
(36,8),
(35,13),
(38,14),
(12,19),
(21,4),
(30,5),
(18,5),
(19,18),
(6,14),
(22,17),
(2,3),
(1,1),
(2,10),
(3,11),
(4,15),
(5,7),
(6,18),
(7,13),
(8,12),
(9,14),
(10,9),
(11,5),
(12,21),
(13,2),
(14,3),
(15,12),
(16,19),
(17,19),
(18,10),
(19,7),
(20,11),
(21,7),
(22,19),
(23,19),
(24,21),
(25,21),
(26,7),
(27,7),
(28,10),
(29,11),
(30,13),
(31,3),
(32,21),
(33,2),
(34,6),
(35,8),
(36,16),
(37,7),
(38,17),
(1,5),
(2,13),
(3,12),
(4,20),
(5,8),
(6,8),
(7,13),
(8,21),
(9,6),
(10,11),
(11,8),
(12,9),
(13,19),
(14,1),
(15,15),
(16,5),
(17,6),
(18,21),
(19,3),
(20,12),
(21,2),
(22,10),
(23,17),
(24,9),
(25,6),
(26,20),
(27,11),
(28,10),
(29,11),
(30,3),
(31,3),
(32,13),
(33,13),
(34,14),
(35,15),
(36,17),
(37,16),
(38,9),
(1,12),
(2,2),
(3,19),
(4,8),
(5,10),
(6,5),
(7,8),
(8,10),
(9,12),
(10,14),
(11,17),
(12,13),
(13,15),
(14,9),
(15,11),
(16,2),
(17,15),
(18,12),
(19,14),
(20,12),
(21,18),
(22,15),
(23,4),
(24,8),
(25,18),
(26,5),
(27,14),
(28,15),
(29,11),
(30,15),
(31,9),
(32,15),
(33,14),
(34,19),
(35,14),
(36,15),
(37,10),
(38,7);


