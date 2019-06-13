SELECT distinct kk.idklienta from artykuly aa join zamowienia zz on zz.idzamowienia = aa.idzamowienia join klienci kk on kk.idklienta = zz.idklienta where aa.idpudelka in (select a.idpudelka from artykuly a join zamowienia z on z.idzamowienia = a.idzamowienia join klienci k on k.idklienta = z.idklienta where k.nazwa like 'Górka Alicja');
/* 
WITH pudelka_gorka as (select a.idpudelka from artykuly a join zamowienia z on z.idzamowienia = a.idzamowienia join klienci k on k.idklienta = z.idklienta where k.nazwa like 'Górka Alicja')
SELECT distinct kk.idklienta from artykuly aa join zamowienia zz on zz.idzamowienia = aa.idzamowienia join klienci kk on kk.idklienta = zz.idklienta where aa.idpudelka in (select idpudelka from pudelka_gorka);
*/
