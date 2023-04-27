CREATE DATABASE IF NOT EXISTS traccia_esame_2019;

USE traccia_esame_2019;

CREATE TABLE IF NOT EXISTS poi
(
    id   INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS info_point
(
    id   INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS pagina
(
    id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    poi INT NOT NULL REFERENCES poi (id)
);

CREATE TABLE IF NOT EXISTS immagine
(
    id     INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pagina INT         NOT NULL REFERENCES pagina (id),
    url    VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS descrizione_immagine
(
    immagine    INT          NOT NULL REFERENCES immagine (id),
    lingua      VARCHAR(4)   NOT NULL,
    descrizione VARCHAR(512) NOT NULL,

    PRIMARY KEY (immagine, lingua)
);

CREATE TABLE IF NOT EXISTS video
(
    id     INT         NOT NULL AUTO_INCREMENT,
    pagina INT         NOT NULL REFERENCES pagina (id),
    url    VARCHAR(64) NOT NULL,

    PRIMARY KEY (id, pagina)
);

CREATE TABLE IF NOT EXISTS descrizione_video
(
    video       INT          NOT NULL REFERENCES video (id),
    lingua      VARCHAR(4)   NOT NULL,
    descrizione VARCHAR(512) NOT NULL,

    PRIMARY KEY (video, lingua)
);

CREATE TABLE IF NOT EXISTS pagina_base
(
    pagina INT NOT NULL PRIMARY KEY REFERENCES pagina (id),
    video  INT NOT NULL REFERENCES video (id)
);

CREATE TABLE IF NOT EXISTS pagina_avanzata
(
    pagina INT NOT NULL PRIMARY KEY REFERENCES pagina (id),
    video  INT NOT NULL REFERENCES video (id)
);

CREATE TABLE IF NOT EXISTS biglietto
(
    id               INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
    giorno_emissione DATE NOT NULL DEFAULT NOW(),
    documento        VARCHAR(64),
    carta_credito    VARCHAR(64),
    info_point       INT  NOT NULL REFERENCES info_point (id),
    dispositivo      INT  NOT NULL
);

CREATE TABLE IF NOT EXISTS biglietto_base
(
    biglietto INT NOT NULL PRIMARY KEY REFERENCES biglietto (id)
);

CREATE TABLE IF NOT EXISTS biglietto_intermedio
(
    biglietto INT NOT NULL PRIMARY KEY REFERENCES biglietto (id)
);

CREATE TABLE IF NOT EXISTS biglietto_pieno
(
    biglietto INT NOT NULL PRIMARY KEY REFERENCES biglietto (id)
);

CREATE TABLE IF NOT EXISTS visite
(
    biglietto_intermedio INT NOT NULL REFERENCES biglietto (id),
    poi                  INT NOT NULL REFERENCES poi (id),

    PRIMARY KEY (biglietto_intermedio, poi)
);