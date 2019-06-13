SELECT r.nazwa
        FROM rzeczki r
        WHERE r.id_rzeki != all(
SELECT id_rzeki 
FROM rzeczki 
NATURAL JOIN punkty_pomiarowe
NATURAL JOIN ostrzeżenia);
