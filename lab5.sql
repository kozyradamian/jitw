select p.idpudelka, sum(z.sztuk) from pudelka p inner join zawartosc z on p.idpudelka = z.idpudelka group by p.idpudelka 
order by 2 dasc
LIMIT 10;

select p.idpudelka, sum(z.sztuk*c.masa) from pudelka p inner join zawartosc z using (idpudelka) inner join czekoladki c using (idczekoladki) 
group by p.idpudelka;

select datarealizacji, count(idzamowienia) from zamowienia
group by datarealizacji;

select count(idzamowienia) from zamowienia;

select datarealizacji, count(idzamowienia) from zamowienia
group by datarealizacji;

select c.nazwa, count(z.idpudelka) as count from czekoladki c inner join zawartosc z using (idpudelka)
group by c.nazwa
order by 2;
