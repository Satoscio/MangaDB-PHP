--
-- File generated with SQLiteStudio v3.3.3 on Thu Dec 8 21:10:11 2022
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: serie
CREATE TABLE serie (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    nome CHAR (120) NOT NULL,
    autore CHAR (60) NOT NULL,
    artista CHAR (60),
    genere CHAR (40) NOT NULL,
    editore CHAR (30) NOT NULL,
    lingua CHAR (20) NOT NULL,
    volumi INTEGER,
    ongoing BOOLEAN NOT NULL
);

-- Table: volume
CREATE TABLE volume (
    nvol INTEGER NOT NULL,
    idserie INTEGER NOT NULL,
    FOREIGN KEY (idserie) REFERENCES serie (id)
);

-- Trigger: insertVolNumber
CREATE TRIGGER insertVolNumber BEFORE INSERT ON volume BEGIN SELECT CASE WHEN NEW.nvol NOT BETWEEN 1 AND (SELECT volumi FROM serie WHERE id = NEW.idserie) THEN RAISE (ABORT, 'Numero volumi non valido!') END; END;

-- Trigger: updateVolNumber
CREATE TRIGGER updateVolNumber BEFORE UPDATE ON volume BEGIN SELECT CASE WHEN NEW.nvol NOT BETWEEN 1 AND (SELECT volumi FROM serie WHERE id = NEW.idserie) THEN RAISE (ABORT, 'Numero volumi non valido!') END; END;

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
