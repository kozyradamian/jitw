SELECT idmeczu, CONCAT(
     (case when gospodarze[1] > goscie[1] then 1 else 0 end)
    +(case when gospodarze[2] > goscie[2] then 1 else 0 end)
    +(case when gospodarze[3] > goscie[3] then 1 else 0 end)
    +(case when gospodarze[4] > goscie[4] then 1 else 0 end)
    +(case when gospodarze[5] > goscie[5] then 1 else 0 end)
    , ':',
     (case when gospodarze[1] < goscie[1] then 1 else 0 end)
    +(case when gospodarze[2] < goscie[2] then 1 else 0 end)
    +(case when gospodarze[3] < goscie[3] then 1 else 0 end)
    +(case when gospodarze[4] < goscie[4] then 1 else 0 end)
    +(case when gospodarze[5] < goscie[5] then 1 else 0 end) 
 ) as wynik FROM statystyki;
