drop table rzeczki.wojewodztwa cascade;
drop table rzeczki.powiaty cascade;
drop table rzeczki.gminy cascade;
drop table rzeczki.rzeki cascade;
drop table rzeczki.punkty_pomiarowe cascade;
drop table rzeczki.pomiary cascade;
drop table rzeczki.ostrzezenia cascade;
drop schema rzeczki CASCADE;
create schema rzeczki;

CREATE TABLE rzeczki.wojewodztwa (
    identyfikator INTEGER PRIMARY KEY,
    nazwa VARCHAR(30) NOT NULL
);
 
CREATE TABLE rzeczki.powiaty (
    identyfikator INTEGER PRIMARY KEY,
    nazwa VARCHAR(30) NOT NULL,
    id_wojewodztwa INTEGER NOT NULL REFERENCES rzeczki.wojewodztwa
);
 
CREATE TABLE rzeczki.gminy (
    identyfikator INTEGER PRIMARY KEY,
    nazwa VARCHAR(30) NOT NULL,
    id_powiatu INTEGER NOT NULL REFERENCES rzeczki.powiaty
);
 
CREATE TABLE rzeczki.rzeki (
    id_rzeki INTEGER PRIMARY KEY,
    nazwa VARCHAR(30)
);
 
CREATE TABLE rzeczki.punkty_pomiarowe (
    id_punktu INTEGER PRIMARY KEY,
    nr_porzadkowy INTEGER,
    id_gminy INTEGER NOT NULL REFERENCES rzeczki.gminy,
    id_rzeki INTEGER NOT NULL REFERENCES rzeczki.rzeki,
    dlugosc_geogr FLOAT NOT NULL,
    szerokosc_geogr FLOAT NOT NULL,
    stan_ostrzegawczy INTEGER,
    stan_alarmowy INTEGER
);
 
CREATE TABLE rzeczki.pomiary (
    id_pomiaru INTEGER PRIMARY KEY,
    id_punktu INTEGER NOT NULL REFERENCES rzeczki.punkty_pomiarowe,
    czas_pomiaru TIMESTAMP NOT NULL,
    poziom_wody INTEGER NOT NULL
);
 
CREATE TABLE rzeczki.ostrzezenia (
    id_ostrzezenia INTEGER PRIMARY KEY,
    id_punktu INTEGER NOT NULL REFERENCES rzeczki.punkty_pomiarowe,
    czas_ostrzezenia TIMESTAMP NOT NULL,
    przekroczony_stan_ostrz INTEGER,
    przekroczony_stan_alarm INTEGER,
    zmiana_poziomu FLOAT
);
