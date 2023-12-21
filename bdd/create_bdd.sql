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
   idRoom INT(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table : Messages
CREATE TABLE Messages (
   -- Primary key(s)
   idMessage INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   -- Table Content
   timeMessage DATETIME NOT NULL DEFAULT NOW(),
   message VARCHAR(50) NOT NULL,
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
   message VARCHAR(50) NOT NULL,
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

CREATE USER IF NOT EXISTS "lightninghubadmin"@"localhost"
IDENTIFIED BY "lightninghubcorporation";

GRANT ALL PRIVILEGES ON lightninghub.* TO "lightninghubadmin"@"localhost";

COMMIT;
SET AUTOCOMMIT = 1;