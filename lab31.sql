select idmeczu, gospodarze[1] + gospodarze[2] + gospodarze[3] + coalesce(gospodarze[4], 0) + coalesce (gospodarze[5], 0) as gospodarze, goscie[1] + goscie[2] + goscie[3] + coalesce(goscie[4], 0) + coalesce(goscie[5], 0) as goscie
from statystyki
where goscie[5] is not null and (gospodarze[5]>15 or goscie[5]>15);
