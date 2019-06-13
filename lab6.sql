insert into pudelka values
('evio','Everything in one','Niczego w tym pudełku nie brakuje.','30.00','100'),
('nieb','Niebiańskie','Niebiańskie czekoladki z dostawą nawet do nieba','77.77','777');
insert into zawartosc select
'evio', idczekoladki, 1 from czekoladki;
insert into zawartosc select
'nieb', idczekoladki, 7 from czekoladki where opis like '%nie%';







