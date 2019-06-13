select distinct p.nazwa, p.opis, p.cena
from pudelka p natural join zawartosc z join czekoladki c using (idczekoladki)
where p.nazwa in (select p.nazwa
                  from pudelka p natural join zawartosc z join czekoladki c using (idczekoladki)
where c.nadzienie is null);
