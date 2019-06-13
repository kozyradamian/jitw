CREATE TEMPORARY TABLE  IF NOT EXISTS cliInfo (
  zamowienie INTEGER,
  pudelka    CHAR(4),
  data       DATE
);
CREATE OR REPLACE FUNCTION clientInfo(in id INTEGER)
  RETURNS SETOF cliInfo AS 
$$

BEGIN
  RETURN QUERY SELECT
                 idzamowienia,
                 idpudelka,
                 datarealizacji
               FROM zamowienia
                 NATURAL JOIN artykuly
               WHERE idklienta = id;
END;
$$

LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION clientByLocation(in miejsce VARCHAR(15))
  RETURNS TABLE(imie_nazw VARCHAR(130), adres VARCHAR(30)) AS
$$

BEGIN
  RETURN QUERY SELECT
                 nazwa,
                 ulica
               FROM klienci
               WHERE miejscowosc = miejsce;
END;
$$
LANGUAGE plpgsql;
