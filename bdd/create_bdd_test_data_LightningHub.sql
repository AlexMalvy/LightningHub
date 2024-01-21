SET AUTOCOMMIT = 0;
START TRANSACTION;

DROP DATABASE
    IF EXISTS LightningHub;
CREATE DATABASE LightningHub
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;
USE LightningHub;


-- Database : Lightning Hub

-- Table : Games
CREATE TABLE Games (
   -- Primary key(s)
   idGame INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   nameGame VARCHAR(50) NOT NULL,
   tag VARCHAR(5) NOT NULL DEFAULT "",
   descriptionShort VARCHAR(255) NOT NULL DEFAULT "",
   description VARCHAR(2000) NOT NULL DEFAULT "",
   twitch VARCHAR(255) NOT NULL DEFAULT "",
   reddit VARCHAR(255) NOT NULL DEFAULT "",
   officialWebsite VARCHAR(255) NOT NULL DEFAULT "",
   image VARCHAR(255) NOT NULL DEFAULT ""
   -- Constraints / Foreign Key(s)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Gamemodes
CREATE TABLE Gamemodes (
   -- Primary key(s)
   idGamemode INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   nameGamemode VARCHAR(50) NOT NULL,
   -- Constraints / Foreign key(s)
   idGame INT(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Faq
CREATE TABLE Faq (
   -- Primary key(s)
   idFaq INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   question VARCHAR(2000) NOT NULL,
   answer VARCHAR(5000) NOT NULL
   -- Constraints / Foreign key(s)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : BanTypes
CREATE TABLE BanTypes (
   -- Primary key(s)
   idBanType INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   nameBan VARCHAR(50) NOT NULL DEFAULT ""
   -- Constraints / Foreign key(s)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Rooms
CREATE TABLE Rooms (
   -- Primary key(s)
   idRoom INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   title VARCHAR(50) NOT NULL,
   description VARCHAR(255) NOT NULL DEFAULT "",
   maxMembers INT(11) NOT NULL DEFAULT 5,
   dateCreation DATETIME NOT NULL DEFAULT NOW(),
   isEnabled BOOLEAN NOT NULL DEFAULT TRUE,
   -- Constraints / Foreign key(s)
   idGamemode INT(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Users
CREATE TABLE Users (
   -- Primary key(s)
   idUser INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   username VARCHAR(50) NOT NULL,
   password VARCHAR(300) NOT NULL,
   mail VARCHAR(50) UNIQUE NOT NULL,
   profilePicture VARCHAR(255) DEFAULT "",
   SignUpDate DATETIME NOT NULL DEFAULT NOW(),
   lastConnection DATETIME NOT NULL DEFAULT NOW(),
   notificationsEnabled BOOLEAN NOT NULL DEFAULT FALSE,
   isAdmin BOOLEAN NOT NULL DEFAULT FALSE,
   isRoomOwner BOOLEAN NOT NULL DEFAULT FALSE,
   -- Constraints / Foreign key(s)
   idRoom INT(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Messages
CREATE TABLE Messages (
   -- Primary key(s)
   idMessage INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   timeMessage DATETIME NOT NULL DEFAULT NOW(),
   message VARCHAR(2000) NOT NULL,
   isReported BOOLEAN NOT NULL DEFAULT FALSE,
   -- Constraints / Foreign key(s)
   idRoom INT(11) UNSIGNED NOT NULL,
   idUser INT(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Moderations
CREATE TABLE Moderations (
   -- Primary key(s)
   idModeration INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   description VARCHAR(500) DEFAULT "",
   startingDate DATETIME NOT NULL DEFAULT NOW(),
   duration INT(11) UNSIGNED,
   -- Constraints / Foreign key(s)
   idBanType INT(11) UNSIGNED NOT NULL,
   idUser INT(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : RequestToJoin
CREATE TABLE requestToJoin (
   -- Primary key(s)
   idUser INT(11) UNSIGNED NOT NULL,
   idRoom INT(11) UNSIGNED NOT NULL,
   -- Table Content
   timeRequest DATETIME DEFAULT NOW(),
   -- Constraints / Foreign key(s)
   CONSTRAINT requestToJoin_pk PRIMARY KEY (idUser, idRoom)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : plays
CREATE TABLE plays (
   -- Primary key(s)
   idUser INT(11) UNSIGNED NOT NULL,
   idGame INT(11) UNSIGNED NOT NULL,
   -- Table Content
   inGameUsername VARCHAR(50) DEFAULT NULL,
   -- Constraints / Foreign key(s)
   CONSTRAINT plays_pk PRIMARY KEY (idUser, idGame)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : isFriend
CREATE TABLE isFriend (
   -- Primary key(s)
   idUser1 INT(11) UNSIGNED NOT NULL,
   idUser2 INT(11) UNSIGNED NOT NULL,
   -- Table Content
   accepted BOOLEAN NOT NULL DEFAULT FALSE,
   -- Constraints / Foreign key(s)
   CONSTRAINT isFriend_pk PRIMARY KEY (idUser1, idUser2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : sendPrivateMessages
CREATE TABLE sendPrivateMessages (
   -- Primary key(s)
   idUser1 INT(11) UNSIGNED NOT NULL,
   idUser2 INT(11) UNSIGNED NOT NULL,
   timeMessage DATETIME NOT NULL DEFAULT NOW(),
   -- Table Content
   message VARCHAR(2000) NOT NULL,
   isReported BOOLEAN NOT NULL DEFAULT FALSE,
   -- Constraints / Foreign key(s)
   CONSTRAINT sendPrivateMessages_pk PRIMARY KEY (idUser1, idUser2, timeMessage)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table Index

ALTER TABLE Gamemodes
   ADD KEY idGame (idGame);


-- Table Constraints

ALTER TABLE Gamemodes
   ADD CONSTRAINT gamemodes_fk FOREIGN KEY (idGame) REFERENCES Games (idGame);

ALTER TABLE Rooms
   ADD CONSTRAINT rooms_fk FOREIGN KEY (idGamemode) REFERENCES Gamemodes (idGamemode);

ALTER TABLE Users
   ADD CONSTRAINT users_fk FOREIGN KEY (idRoom) REFERENCES Rooms (idRoom);

ALTER TABLE Messages
   ADD CONSTRAINT message_room_fk FOREIGN KEY (idRoom) REFERENCES Rooms (idRoom),
   ADD CONSTRAINT message_user_fk FOREIGN KEY (idUser) REFERENCES Users (idUser);
   
ALTER TABLE Moderations
   ADD CONSTRAINT moderation_banType_fk FOREIGN KEY (idBanType) REFERENCES BanTypes (idBanType),
   ADD CONSTRAINT moderation_user_fk FOREIGN KEY (idUser) REFERENCES Users (idUser);

ALTER TABLE RequestToJoin
   ADD CONSTRAINT join_user_fk FOREIGN KEY (idUser) REFERENCES Users (idUser),
   ADD CONSTRAINT join_room_fk FOREIGN KEY (idRoom) REFERENCES Rooms (idRoom);
   
ALTER TABLE plays
   ADD CONSTRAINT play_user_fk FOREIGN KEY (idUser) REFERENCES Users (idUser),
   ADD CONSTRAINT play_game_fk FOREIGN KEY (idGame) REFERENCES Games (idGame);
   
ALTER TABLE isFriend
   ADD CONSTRAINT friend_user1_fk FOREIGN KEY (idUser1) REFERENCES Users (idUser),
   ADD CONSTRAINT friend_user2_fk FOREIGN KEY (idUser2) REFERENCES Users (idUser);

ALTER TABLE sendPrivateMessages
   ADD CONSTRAINT privateMessage_user1_fk FOREIGN KEY (idUser1) REFERENCES Users (idUser),
   ADD CONSTRAINT privateMessage_user2_fk FOREIGN KEY (idUser2) REFERENCES Users (idUser);


-- Insert Data
INSERT INTO Games (idGame, nameGame, tag, descriptionShort, description, twitch, reddit, officialWebsite, image)
VALUES
   (1, "League Of Legends", "LoL", "League of Legends est un jeu de stratégie en équipe dans lequel deux équipes de cinq champions s'affrontent pour détruire la base adverse.", "League of Legends est un jeu de stratégie en équipe dans lequel deux équipes de cinq champions s'affrontent pour détruire la base adverse.<br>
Faites votre choix parmi plus de 140 champions disponibles, partez au combat, éliminez vos adversaires avec adresse et abattez les tourelles ennemies pour décrocher la victoire.", "https://www.twitch.tv/directory/category/league-of-legends", "https://www.reddit.com/r/leagueoflegends/", "https://www.leagueoflegends.com/fr-fr/", "assets/images/Leagues-of-legends.png"),
   (2, "World Of Warcraft", "WoW", "World of Warcraft est un jeu vidéo de rôle massivement multijoueur se déroulant dans l'univers développé dans les trois premiers Warcraft.", "World of Warcraft est un jeu vidéo de rôle massivement multijoueur se déroulant dans l'univers développé dans les trois premiers Warcraft. Le joueur y incarne un personnage, dont il peut choisir la race et la classe, devant explorer des donjons et des environnements peuplés de monstres.", "https://www.twitch.tv/directory/category/world-of-warcraft", "https://www.reddit.com/r/wow/", "https://worldofwarcraft.blizzard.com/fr-fr/", "assets/images/world-of-warcraft.png"),
   (3, "Valorant", "Valo", "Dans Valorant, chaque joueur joue le rôle d'un « agent » aux compétences uniques.", "Dans Valorant, chaque joueur joue le rôle d'un « agent » aux compétences uniques.
Dans le mode de jeu principal, deux équipes de cinq joueurs s'affrontent et les agents utilisent un système économique pour acheter des utilitaires et des armes.", "https://www.twitch.tv/directory/category/valorant", "https://www.reddit.com/r/VALORANT/", "https://playvalorant.com/fr-fr/", "assets/images/valorant.png"),
   (4, "Warzone", "WZ", "Call of Duty: Warzone est un jeu vidéo de battle royale mettant en scène jusqu'à 150 joueurs par partie.", "Call of Duty: Warzone est un jeu vidéo de battle royale mettant en scène jusqu'à 150 joueurs par partie (et jusqu'à 200 joueurs dans certains modes).<br>
Le jeu propose plusieurs armes, certaines sont issues du jeu Modern Warfare, d'autres de la série Black Ops.", "https://www.twitch.tv/directory/category/call-of-duty-warzone", "https://www.reddit.com/r/CODWarzone/", "https://www.callofduty.com/fr/playnow/warzone", "assets/images/call-of-duty-warzone.png"),
   (5, "FC 24", "FC24", "", "", "https://www.twitch.tv/directory/category/ea-sports-fc-24", "https://www.reddit.com/r/EASportsFC", "https://www.ea.com/fr-fr/games/ea-sports-fc/fc-24?setLocale=fr-fr", "");

INSERT INTO Gamemodes (nameGamemode, idGame)
VALUES
   -- League Of Legends Modes
   ("Normal", 1),
   ("Ranked", 1),
   ("Custom", 1),
   -- World Of Warcraft Modes
   ("Dungeon", 2),
   ("Mythic +", 2),
   ("Raid", 2),
   ("Arena", 2),
   ("Battlegrounds", 2),
   ("Custom", 2),
   -- Valorant Modes
   ("Deathmatch", 3),
   ("Normal", 3),
   ("Ranked", 3),
   -- Warzone Modes
   ("Battle Royal", 4),
   ("Online", 4),
   ("Custom", 4),
   -- FC 24
   ("All", 5);

INSERT INTO Faq (question, answer)
VALUES
   ("Qu’est-ce que Lightning Hub considère comme un comportement haineux ?", "Les comportements haineux, qui désignent tout contenu ou activité qui favorise, encourage ou met en avant la discrimination, le dénigrement, l’objectivation, le harcèlement ou la violence."),
   ("Dans quelle mesure suis-je responsable de ma communauté ?", "Les créateurs de salons et leaders des communautés qu’ils créent ou entretiennent. C’est pourquoi ils doivent tenir compte des conséquences de leurs déclarations et des actions de leur public"),
   ("Que dois-je faire dans le cas où quelqu'un se rendrait coupable de comportements haineux", "Nous demandons aux streamers d’agir en toute bonne foi pour modérer leur chat , la mise sur pied d’une équipe de modération et/ou le recours à un des nombreux outils tiers à votre disposition.");

INSERT INTO Users (username, password, mail, isRoomOwner)
VALUES
   ("Fatality67", "azerty", "fatality67@lh.com", TRUE),
   ("IsmaGod", "aqwzsxedc", "ismagod@lh.com", FALSE),
   ("ChadSteph", "oklm", "chadsteph@lh.com", TRUE),
   ("RedMorgane", "azertyuiop", "redmorgane@lh.com", FALSE),
   ("Kevin92", "azerqsdf", "kevin92@banme.com", FALSE),

   ("NickyLarson", "azertyuiop", "nickyls@lh.com", TRUE),
   ("Vegeta", "azertyuiop", "vgtaDBZ@lh.com", TRUE),
   ("Azir", "azertyuiop", "pigeon.king@lh.com", TRUE),
   ("Pantheon", "azertyuiop", "pantheon@targon.com", FALSE),
   ("Chad", "azertyuiop", "chad@lh.com", FALSE),

   ("Naruto", "azertyuiop", "sasukelover@lh.com", FALSE);

INSERT INTO Rooms (idRoom, title, description ,idGamemode)
VALUES
   (1, "Fatality67's Room", "Chuck Norris can see at least 3 extra colors. Chuck Norris doesn't read books. He stares them down until he gets the information he wants.", 2),
   (2, "ChadSteph gang", "Chuck Norris wears contacts. Not to see better mind you, but so he won't burn a hole through whatever it is he is looking at.", 12),
   (3, "Larson", "Chuck Norris designed and created two series of cars. These are now known as Autobots and Decepticons.", 5),
   (4, "DBZ lovers", "Remember the Soviet Union? They decided to quit after watching a DeltaForce marathon on Satellite TV.", 4),
   (5, "Champions", "Chuck Norris doesn't wear a watch. HE decides what time it is.", 2);

INSERT INTO Messages (message, idRoom, idUser)
VALUES
   ("Hello", 1, 4),
   ("is this live ?", 1, 1);

INSERT INTO BanTypes (nameBan)
VALUES
   ("Avertissement 1"),
   ("Avertissement 2"),
   ("Ban Temporaire"),
   ("Ban Permanent");

INSERT INTO Moderations (description, duration, idBanType, idUser)
VALUES
   ("Must be ban because I am the Law", 60*60*24*365, 3, 5);

INSERT INTO requestToJoin (idUser, idRoom)
VALUES
   (2, 1);

INSERT INTO plays (idUser, idGame, inGameUsername)
VALUES
   (1, 1, "Fatality67"),
   (1, 2, "Raylian"),
   (2, 1, "IsmaGod"),
   (3, 1, "ChadSteph"),
   (4, 4, "RedMorgane");

INSERT INTO isFriend (idUser1, idUser2, accepted)
VALUES
   (1, 2, FALSE),
   (1, 3, TRUE),
   (1, 4, TRUE),
   (4, 3, FALSE),
   (4, 2, TRUE);

INSERT INTO sendPrivateMessages (idUser1, idUser2, message)
VALUES
   (1, 2, "Yo"),
   (1, 4, "Ayo"),
   (2, 1, "Salutation !");

-- Adds Fatality67 to his room
UPDATE Users
SET idRoom = 1
WHERE idUser = 1;

-- Adds ChadSteph to his room
UPDATE Users
SET idRoom = 2
WHERE idUser = 3;

-- Adds RedMorgane to Fatality67's room
UPDATE Users
SET idRoom = 1
WHERE idUser = 4;

-- Adds NickyLarson to his room
UPDATE Users
SET idRoom = 3
WHERE idUser = 6;

-- Adds Vegeta to his room
UPDATE Users
SET idRoom = 4
WHERE idUser = 7;

-- Adds Azir to his room
UPDATE Users
SET idRoom = 5
WHERE idUser = 8;

-- Adds Pantheon to Azir's room
UPDATE Users
SET idRoom = 5
WHERE idUser = 9;

-- Adds Chad to Azir's room
UPDATE Users
SET idRoom = 5
WHERE idUser = 10;


CREATE USER IF NOT EXISTS "lightninghubadmin"@"localhost"
IDENTIFIED BY "lightninghubcorporation";

GRANT ALL PRIVILEGES ON lightninghub.* TO "lightninghubadmin"@"localhost";


COMMIT;
SET AUTOCOMMIT = 1;